$(document).ready(function () {
    $('#tbl_processos').DataTable({
        processing: true,
        serverSide: true,
        ajax: public_path + '/processos/listar-todos',
        autoWidth: false,
        language: {
            url: public_path + config_lang_json
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'numero', name: 'numero'},
            {data: 'cliente', name: 'cliente'},
            {data: 'reu', name: 'reu'},
            {data: 'created_at', name: 'created_at', render: function(d){
                    return moment(d).format("DD/MM/YYYY");
                }
            },
            {data: 'updated_at', name: 'updated_at', render: function(d){
                    return moment(d).format("DD/MM/YYYY");
                }
            },
            {data: 'id', name: 'id', width: '120px', render: function(id){
                    return '' +
                        '<a href="'+public_path+'/'+emp_atual+'/usuarios/editar/'+id+'" class="btn btn-primary"><i class="fa fa-edit" title="Editar"></i></a>&nbsp;' +
                        '<a href="'+public_path+'/'+emp_atual+'/usuarios/excluir/'+id+'" class="btn btn-danger"><i class="fa fa-trash" title="Excluir"></i></a>&nbsp;' +
                        '';
                }
            }
        ]
    });
});