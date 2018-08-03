$(document).ready(function () {
    $('#tbl_clientes').DataTable({
        processing: true,
        serverSide: true,
        ajax: public_path + '/clientes/listar-todos',
        autoWidth: false,
        language: {
            url: public_path + config_lang_json
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'nome', name: 'nome'},
            {data: 'email', name: 'email'},
            {data: 'documento', name: 'documento'},
            {data: 'created_at', name: 'created_at', render: function(d){
                    return moment(d).format("DD/MM/YYYY");
                }
            },
            {data: 'id', name: 'id', width: '120px', render: function(id){
                    return '' +
                        '<a href="'+public_path+'/'+emp_atual+'/clientes/editar/'+id+'" class="btn btn-info"><i class="fa fa-folder-open" title="Processos"></i></a>&nbsp;' +
                        '<a href="'+public_path+'/'+emp_atual+'/clientes/editar/'+id+'" class="btn btn-primary"><i class="fa fa-edit" title="Editar"></i></a>&nbsp;' +
                        '<a href="'+public_path+'/'+emp_atual+'/clientes/editar/'+id+'" class="btn btn-danger"><i class="fa fa-trash" title="Excluir"></i></a>&nbsp;' +
                        '';
                }
            }
        ]
    });
});