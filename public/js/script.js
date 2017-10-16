numEndereco = 0;
numTelefone = 0;
function apagaEndereco(){
    $('#txCep').val('');
    $('#txRua').val('');
    $('#txNumero').val('');
    $('#txComplemento').val('');
    $('#txBairro').val('');
    $('#selEstado').val('');
    $('#txCidade').val('');
}
function apagaTelefone(){
    $('#txDDD').val('');
    $('#txNumeroTel').val('');
    $('#txRamal').val('');
}
function fechaModal(){
    $('.modal').fadeOut();
    $('.modal-backdrop').fadeOut();
    $('body').removeClass('modal-open');
    $('body').attr('style', '');
}
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
    $('#txNumeroTel').mask('9999-9999?9');
    $('#txDDD').mask('99');
    $('#txDocumento').mask('999.999.999-99');
    //Usuários
    $("#flUser").change(function(){
        readURL(this);
    });
    $('#txNome').blur(function(){
        $('#ttUsuario').text($(this).val());
    });
    $('.btViewFechar').click(function(){
        $('#titViewUsuario').text('Usuário');
        $('#titViewEmail').text('');
        $('#titViewTipoUsuario').text('');
        $('#titViewImg').attr('src', '/image/user.jpg');
    });
    $('.viewUsr').click(function(){
        id = $(this).attr('id');
        empresa = $(this).attr('data-company');
        $.ajax({
            url:'/'+empresa+'/usuarios/view?id_usr='+id,
            method:'get',
            complete: function (data) {
                if(data.responseText != '') {
                    response = JSON.parse(data.responseText);

                    $('#titViewUsuario').text(response.name);
                    $('#titViewEmail').text(response.email);
                    $('#titViewTipoUsuario').text(response.tipo);
                    if(response.image != null) {
                        $('#titViewImg').attr('src', '/image/users/'+empresa+'/'+response.image);
                    }else{
                        $('#titViewImg').attr('src', '/image/user.jpg');
                    }
                }
            },
            error:function(ret){
                $('#titViewUsuario').text('Erro desconhecido ao buscar usuário');
                $('#titViewEmail').text('');
                $('#titViewTipoUsuario').text('');
                $('#titViewImg').attr('src', '/image/user.jpg');
            }
        });
    });

    //Clientes
    //Endereço
    $('#dvAddEndereco').click(function(){
        $('#txCep').focus();
    });
    $('#btAddEnderecoCliente').click(function(){
        dados = new Array();
        cep = $('#txCep').val();
        rua = $('#txRua').val();
        numero = $('#txNumero').val();
        complemento = $('#txComplemento').val();
        bairro = $('#txBairro').val();
        estado = $('#selEstado').val();
        cidade = $('#txCidade').val();

        if(dados[2] != '') {
            txt = '<tr>';
            tam = dados.length;
            txt = txt + '<td><input type="hidden" name="endereco[cep]['+(numEndereco)+']" value="'+cep+'"/>'+cep+'</td>';
            txt = txt + '<td><input type="hidden" name="endereco[rua]['+(numEndereco)+']" value="'+rua+'"/>'+rua+'</td>';
            txt = txt + '<td><input type="hidden" name="endereco[numero]['+(numEndereco)+']" value="'+numero+'"/>'+numero+'</td>';
            txt = txt + '<td><input type="hidden" name="endereco[complemento]['+(numEndereco)+']" value="'+complemento+'"/>'+complemento+'</td>';
            txt = txt + '<td><input type="hidden" name="endereco[bairro]['+(numEndereco)+']" value="'+bairro+'"/>'+bairro+'</td>';
            txt = txt + '<td><input type="hidden" name="endereco[estado]['+(numEndereco)+']" value="'+estado+'"/>'+estado+'</td>';
            txt = txt + '<td><input type="hidden" name="endereco[cidade]['+(numEndereco)+']" value="'+cidade+'"/>'+cidade+'</td>';
            txt = txt + '<td><div class="removeDado"><i class="fa fa-minus-circle text-red m-cursor"></i></div></td>';
            txt = txt + '</tr>';
            numEndereco++;

            $('#tblEnderecos').append(txt);
            $('.removeDado').click(function(){
                $(this).parent().parent().remove();
            });

            //Fechar moddal
            apagaEndereco();
            fechaModal();
        }else{
            alert('Digite um número válido');
        }
    });
    $('#btFecharEndereco').click(function(){
        apagaEndereco();
    });
    $('.removeDado').click(function(){
        $(this).parent().parent().remove();
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
    //Cep
    $('#btAddTelefone').click(function(){
        dados = new Array();
        ddd = $('#txDDD').val();
        numero = $('#txNumeroTel').val();
        ramal = $('#txRamal').val();

        txt = '<tr>';
        txt = txt + '<td><input type="hidden" name="telefone[ddd]['+(numTelefone)+']" value="'+ddd+'"/>'+ddd+'</td>';
        txt = txt + '<td><input type="hidden" name="telefone[numero]['+(numTelefone)+']" value="'+numero+'"/>'+numero+'</td>';
        txt = txt + '<td><input type="hidden" name="telefone[ramal]['+(numTelefone)+']" value="'+ramal+'"/>'+ramal+'</td>';
        txt = txt + '<td><div class="removeDado"><i class="fa fa-minus-circle text-red m-cursor"></i></div></td>';
        txt = txt + '</tr>';

        $('#tblTelefones').append(txt);
        $('.removeDado').click(function(){
            $(this).parent().parent().remove();
        });

        //Fechar moddal
        apagaTelefone();
        fechaModal();
    });
});