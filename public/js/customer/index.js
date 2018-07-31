$(document).ready(function () {
    $('#tbl_clientes').DataTable({
        processing: true,
        serverSide: true,
        ajax: public_path + '/clientes/listar-todos',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'nome', name: 'nome'},
            {data: 'email', name: 'email'},
            {data: 'documento', name: 'documento'},
            {data: 'created_at', name: 'created_at'}
        ]
    });
});