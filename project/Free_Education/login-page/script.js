let icon = document.getElementById('pass-icon');
let password = document.getElementById('pass');
icon.onclick = function(){
    if(password.type =='password'){
        password.type="text";
        icon.classList.replace("bx-hide","bx-show");
    }else{
        password.type = 'password';
        icon.classList.replace("bx-show","bx-hide")
    }
}

let reicon = document.getElementById('repass-icon');
let repassword = document.getElementById('repass');
reicon.onclick = function(){
    if(repassword.type =='password'){
        repassword.type="text";
        reicon.classList.replace("bx-hide","bx-show");
    }else{
        repassword.type = 'password';
        reicon.classList.replace("bx-show","bx-hide")
    }
}