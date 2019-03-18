function load_data_user(url)
{
	$('#data_user').DataTable( {
    destroy: true,
    ajax: url,
    columns: [
      {"data" : "nip"},
      {"data" : "name"},
      {"data" : "email"},
      {"data" : "position"},
      {
        "data" : "id",
        "mRender": function(data, type, row, meta) {
          var edit_button = '<a href="#" onclick="showModalEditUser(\''+row.id+'\'); return false;"><small class="label bg-yellow"><i class="fa fa-edit"></i> Edit</small></a>';
          var delete_button = '<form method="POST"></form>';
          return '<div class="text-center">'+edit_button+' | '+delete_button+'</div>';
        }
      },
    ]
  });
}