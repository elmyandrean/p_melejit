<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
Use App\Branch;
use Validator;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $branches = Branch::all();

        return view('users.index', ['users'=>$users, 'branches'=>$branches]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::all();
        return view('users.create', ['branches'=>$branches]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'nip' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'position' => 'required',
        ]);
        
        if ($validator->fails())
        {
            return response()->json([
                'status'=>'errors',
                'message'=>$validator->errors()->all(),
            ]);
        } else {
            $user = new User;
            $user->nip = $request->nip;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = bcrypt('123456');
            $user->position = $request->position;
            $user->branch_id = $request->branch_id;
            if ($request->position == 'Kepala Cabang') {
                $user->type = '2';
            } elseif($request->position == 'Administrator') {
                $user->type = '3';
            } else {
                $user->type = '1';
            }

            $user->save();
            
            return response()->json([
                'status'=>'success', 
                'message'=>'Record is successfully added',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $branches = Branch::all();

        return view('users.edit', ['user'=>$user, 'branches'=>$branches]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'nip' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'position' => 'required',
        ]);
        
        if ($validator->fails())
        {
            return response()->json([
                'status'=>'errors',
                'message'=>$validator->errors()->all(),
            ]);
        } else {
            $user = User::find($id);
            $user->nip = $request->nip;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->position = $request->position;
            $user->branch_id = $request->branch_id;
            if ($request->position == 'Kepala Cabang') {
                $user->type = '2';
            } elseif($request->position == 'Administrator') {
                $user->type = '3';
            } else {
                $user->type = '1';
            }

            $user->save();
            
            return response()->json([
                'status'=>'success', 
                'message'=>'Record is successfully edited',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        $user = User::find($id);
        $user->status = 'Deactive';
        $user->save();

        return response()->json([
            'status'=>'success', 
            'message'=>'Record is successfully deleted',
        ]);
    }

    public function reset_password($id)
    {
        $user = User::find($id);
        $user->password = bcrypt('123456');
        $user->save();

        return response()->json([
            'status'=>'success', 
            'message'=>'Record is successfully deleted',
        ]);
    }

    public function edit_profile($id)
    {
        $user = User::find($id);
        $branches = Branch::all();
        return view('users.edit_profile', ['user'=>$user, 'branches'=>$branches]);
    }

    public function update_profile(Request $request, $id)
    {
        if ($request->change_password) {
            $validator = \Validator::make($request->all(), [
                'nip' => 'required|unique:users,nip,'.$id,
                'name' => 'required',
                'old_password' => ['required',
                    function($attribute, $value, $fail){
                        $user = User::find(Auth::user()->id);
                        if(Hash::check($value, $user->password)){
                            
                        } else {
                            $fail($attribute.' is invalid.');
                        }
                    }
                ],
                'new_password' => 'required|min:8|confirmed',
                'email' => 'required|email',
                'phone' => 'required|numeric',
                'position' => 'required',
                'branch_id' => 'required',
            ]);
        } else { 
            $validator = \Validator::make($request->all(), [
                'nip' => 'required|unique:users,nip,'.$id,
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required|numeric',
                'position' => 'required',
                'branch_id' => 'required',
            ]);
        }

        if ($validator->fails()) {
            return response()->json([
                'status'=>'errors',
                'message'=>$validator->errors()->all(),
            ]);
        } else {
            $user = User::find($id);
            $user->nip = $request->nip;
            $user->name = $request->name;
            if ($request->change_password) {
                $user->password = bcrypt($request->new_password);
            }
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->position = $request->position;
            $user->branch_id = $request->branch_id;
            if ($request->position == 'Kepala Cabang') {
                $user->type = '2';
            } elseif($request->position == 'Administrator') {
                $user->type = '3';
            } else {
                $user->type = '1';
            }

            $user->save();
            
            return response()->json([
                'status'=>'success', 
                'message'=>'Record is successfully edited',
            ]);
        }
    }
}
