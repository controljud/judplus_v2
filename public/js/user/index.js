$(document).ready(function () {
    $('#tbl_usuarios').DataTable({
        processing: true,
        serverSide: true,
        ajax: public_path + '/usuarios/listar-todos',
        autoWidth: false,
        language: {
            url: public_path + config_lang_json
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'tipo_usuario', name: 'tipo_usuario', render: function(tipo){
                    if(tipo == 'Super Administrador' || tipo == 'Administrador'){
                        return '<span class="label label-primary">'+tipo+'</span>';
                    }else if(tipo == 'Editor'){
                        return '<span class="label label-warning">'+tipo+'</span>';
                    }else{
                        return '<span class="label label-default">'+tipo+'</span>';
                    }
                }
            },
            {data: 'created_at', name: 'created_at', render: function(d){
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