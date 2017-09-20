function messagem(msg){
    alert(msg);
}
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imgUsr').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
$(document).ready(function(){
    //Máscaras
    $('#txCep').mask('99999-999');

    //Usuários
    $("#flUser").change(function(){
        readURL(this);
    });
    $('#txNome').blur(function(){
        $('#ttUsuario').text($(this).val());
    });
    $('.viewUsr').click(function(){
        id = $(this).attr('id');
        $.ajax({
            url:'/infobase/usuarios/view',
            method:'post',
            data:{
                id_usr:id
            },
            success:function(ret){
                if(ret != '') {
                    retorno = JSON.parse(ret);
                    alert(ret);
                    //$('#titViewImg').attr('src', 'image/users/infobase/'+retorno.image);
                }
            }
        });
    });

    $('#txCep').blur(function(){
        cep = $(this).val();
        if(cep != ''){
            $.getJSON('https://viacep.com.br/ws/'+cep+'/json/', function(dados){
                if(!("erro" in dados)){
                    $('#txRua').val(dados.logradouro);
                    $('#txBairro').val(dados.bairro);
                    $('#txCidade').val(dados.localidade);
                    $('#selEstado').val(dados.uf);
                    $('#txNumero').focus();
                }else{
                    $('#txRua').val('');
                    $('#txBairro').val('');
                    $('#txCidade').val('');
                    $('#selEstado').val('');
                    $('txNumero').val('');
                    $('txComplemento').val('');
                }
            });
        }
    });
});