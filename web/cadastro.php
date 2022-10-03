<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convite</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Alice&display=swap');
    </style>
    <style>@import url('https://fonts.googleapis.com/css2?family=Alice&display=swap');

html{
    margin: 0;
    padding: 0;
}

body{
    background-image: linear-gradient(to right, rgb(153, 216, 241), hsl(221, 47%, 59%));


}
.convite {

    height: auto;
    color: rgb(19 54 118);
    font-size: clamp(1.75em, 1em + 3vw, 2.5em);
    text-align: center;
    display: block;
    margin-bottom: 10px;
    font-family: 'Open Sans', sans-serif;
    font-family: Alice;
    @media only screen and (max-width: 600px) 
    {   
        font-size:10px;
        margin-bottom: 25px;
    }

}


.foto{
    width: 300px;
    height: 400px;
    margin: -14px auto 35px;
    border-radius: 30px;

    align-items: center;

}
form{

    width:100%;

    margin: auto;
    border-radius: 30px;



}
.container{
    display: flex;
    align-items: center;
    justify-content: center;
}

fieldset{
    display: flex;
    align-items: center;
    justify-content: center;
    border: 3px solid;
    border-radius: 10px;
    box-shadow: 0 0 1em white;
    color: #157be5;
    width: 600px;
    max-width: 700px;
}

.inputUser{
    background: none;
    border: none;
    border-bottom: 1px solid rgb(255 255 255);
    outline: none;
    color: #ffffff;
    font-size: 20px;
    font-weight: bold;
    width: 100%;
    
    font-family: Alice;
}

.labelInput{
    position: relative;
    top: 0px;
    left: 0px;
    pointer-events: none;
    transition: .5s;
    color: black;
    font-size: 20px;
    font-weight: bold;
    font-family: Alice;
}

.mensagem{
    
    color: rgb(12, 0, 80);
    font-size: 24px !important;
    text-align: center;
    margin: auto;
    font-family: Alice;
    font-weight: bold;
    display: block;
    margin-bottom: 50px;
    
    
}

.button {
    font-size: 15px;
    font-family: Alice;
    width: 140px;
    height: 50px;
    border-width: 1px;
    color: #fff;
    border-color: #18ab29;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
    border-bottom-left-radius: 12px;
    border-bottom-right-radius: 12px;
    text-shadow: 1px 1px 0px #2f6627;
    background: blue;
    font-family: 'Open Sans', sans-serif;
}

.button:hover {
  background: #2F80ED;
}
input::placeholder {
  color: #DCDCDC;
}
</style>

</head>
<body>

    <Div class="convite">
        <legend> <b>Informe seus dados para confirmação de presença!</b></legend>
    </Div>


    <div class="container">



        <fieldset class>
            <form  action="" id='cadastro' method="POST">
                <br></br>
                <div class="mensagem">
                <p> A tolerância de chegada para a nossa reserva será até 20:30.
                    <br/>
                    <br/>
                    É de extrema importância que confirme sua presença com o email correto, para receber as informações do local por lá.
                    <br/>
                    
 </p>

                </div>
                    
                <div class="InputBox">
                <label for="nome" class="labelInput">Digite seu nome:</label>

                <input type="text" name="nome" id='nome' class="inputUser" placeholder="Por exemplo: João da Silva" >

                </div>
                <br>

                <div class="InputBox">
                <label for="email" class="labelInput">Digite seu Email:</label>
                <input type="email" name="email" id='email' class="inputUser" placeholder="Por exemplo: joão.silva@gmail.com">
                </div>

                <br>
                <div class="InputBox">
                    <label for="telefone" class="labelInput" >Digite seu telefone com DDD</label>
                    <input type="tel" name="telefone" id='telefone' class="inputUser" minlength="11" maxlength="11" data-mask="(00) 0000-0000" data-mask-selectonfocus="true" placeholder="Por exemplo: 11912345678">



                </div>
                <br>
                <div class="InputBox">
                    <label class="labelInput">Abaixo, selecione a quantidade de acompanhantes que virão com você (Ex.: Namorado(a), Esposo(a) e/ou filho(s))</label><br/><br/>
                    <input type="number" name="acompanhante" id="acompanhante" class="inputUser" value="0" min="0">
                </div>

                <br></br>
                <div >
                <input type="submit" name='submit' id='submit' onclick="validar()" class="button">
                </div>


            </form>
        </fieldset>
    </div>


</body>

    <script type="text/javascript" language="javascript">
        function validar(){
            var nome = cadastro.nome
            var email = cadastro.email
            var telefone = cadastro.telefone
            if (nome.value ==''){
                alert("Nome não informado")
            }
            if (email.value ==''){
                alert("Email não informado")
            }
            if (telefone.value ==''){
                alert("Telefone não informado")
            }
        }




    </script>
</html>

<?php
setlocale(LC_ALL, "pt_BR", "pt_BR.utf-8", "portuguese");
// session_start(); Entender como funciona

// puta merda atomica alterada aqui!
if ($_SERVER['REQUEST_METHOD'] == "POST"){


include_once('../library/conexaohomo.php');


//pegando dados do formulario
$nome =      (empty($_POST['nome']))? false : $_POST['nome'];
$email =     (empty($_POST['email']))? false : $_POST['email'];
$telefone =  (empty($_POST['telefone']))? false : $_POST['telefone'];
$acompanhante = (empty($_POST['acompanhante']))? false : $_POST['acompanhante'];
$data =      date('d-m-Y H:i:s');
$pegar_ip = $_SERVER["REMOTE_ADDR"];





$consulta = mysqli_query($conexao,"SELECT telefone from confirmacao where telefone = '$telefone'");
$verifica = mysqli_num_rows($consulta);



if((!empty($nome) && ($email) && ($telefone)) && $verifica == 0){
    $insert = mysqli_query($conexao, "INSERT INTO confirmacao(nome, email, telefone, ip_usuario, acompanhantes) VALUES ('$nome', '$email', '$telefone', '$pegar_ip', '$acompanhante')");
    //echo "Presença confirmada com sucesso! :)";
    echo  "<script>alert('Presença confirmada com sucesso! :)');</script>";
    echo "<meta http-equiv=\"refresh\" content=\"1; url=/\">";
}else{
    echo  "<script>alert('Sua presença ja consta em nossa base de dados');</script>";
    echo "<meta http-equiv=\"refresh\" content=\"1; url=/\">";
}

include_once('mail.php');


}

/*if (!empty($nome) && ($email) && ($telefone)){
    $result = mysqli_query($conexao, "INSERT INTO confirmacao(nome, email, telefone, ip_usuario) VALUES ('$nome', '$email', '$telefone', '$pegar_ip')");
    echo "Presença confirmada com sucesso! :)";
    } else {
        echo "Preencha todos os dados corretamente.";
    }

*/
?>
