function validar(){
    var nome = formuser.nome.value
    var email = formuser.email.value
    var telefone = formuser.telefone.value

    if(nome == ""){
        alert ('Preencha o campo nome');
        formuser.nome.focus();
        return false;
    }
    if(email == ""){
        alert ('Preencha o campo email');
        formuser.email.focus();
        return false;
    }
    if(telefone == ""){
        alert ('Preencha o campo telefone');
        formuser.telefone.focus();
        return false;
    }
}