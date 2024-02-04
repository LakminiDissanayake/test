function ChangeView() {
var SignUpBox = document.getElementById("SignUpBox");
var SignInBox = document.getElementById("SignInBox");

SignUpBox.classList.toggle("d-none");
SignInBox.classList.toggle("d-none");

}

function signUp(){

    var fn = document.getElementById("fname");
    var ln = document.getElementById("lname");
    var e = document.getElementById("email");
    var pw = document.getElementById("password");
    var m = document.getElementById("mobile");
    var g = document.getElementById("gender");

    var f = new FormData();
    f.append("fname",fn.value);
    f.append("lname",ln.value);
    f.append("email",e.value);
    f.append("password",pw.value);
    f.append("mobile",m.value);
    f.append("gender",g.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function (){
        if(r.readyState == 4 && r.status == 200){
            var t = r.responseText;

            if(t == "success"){

                document.getElementById("msg").innerHTML = t;
                document.getElementById("msg").className = "alert alert-success";
                document.getElementById("msgdiv").className = "d-block";

            }else{

                document.getElementById("msg").innerHTML = t;
                document.getElementById("msgdiv").className = "d-block";
                
            }
            
        }
    }

    r.open("POST","signUpProcess.php",true);
    r.send(f);

}

function signin(){
    var email = document.getElementById("email2");
    var password = document.getElementById("password2");
    var rememberme = document.getElementById("rememberme");

    var f = new FormData();
    f.append ("e",email.value);
    f.append ("p",password.value);
    f.append ("r",rememberme.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4 && r.status == 200){
            var t = r.responseText;
            if(t == "success"){
                window.location = "index.html";
            }else{
                alert (t);
            }
            
        }
    }
    
    r.open("POST","signinProcess.php",true);
    r.send(f);
}

var bm;
function forgotPassword(){

    var email = document.getElementById("email2");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function (){
        if(r.readyState == 4 && r.status == 200){
            var t = r.responseText;
            if(t == "success"){

                var m = document.getElementById("forgotPasswordModal");
                bm = new bootstrap.Modal(m);
                bm.show();

            }else{
                alert (t);
            }
            
        }
    }

    r.open("GET","forgotPasswordProcess.php?e="+email.value,true);
    r.send();
    
}

function resetPassword(){
    
    var email = document.getElementById("email2");
    var np = document.getElementById("np");
    var rnp = document.getElementById("rnp");
    var vc = document.getElementById("vc");

    var f = new FormData();
    f.append("e",email.value);
    f.append("np",np.value);
    f.append("rnp",rnp.value);
    f.append("vc",vc.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function (){
        if(r.readyState == 4 && r.status == 200){
            var t = r.responseText;

            if(t == "success"){

                bm.hide();
                alert ("Your password has been updated.");
                window.location.reload();

            }else{
                alert (t);
            }
        }
    }

    r.open("POST","resetPasswordProcess.php",true);
    r.send(f);
    
}

function showPassword(){

    var np = document.getElementById("np");
    var npb = document.getElementById("npb");

    if(np.type == "password"){
        np.type = "text";
        npb.innerHTML = '<i class="bi bi-eye-slash-fill"></i>';
    }else{
        np.type = "password";
        npb.innerHTML = '<i class="bi bi-eye"></i>';
    }

}

function showPassword2(){

    var rnp = document.getElementById("rnp");
    var rnpb = document.getElementById("rnpb");

    if(rnp.type == "password"){
        rnp.type = "text";
        rnpb.innerHTML = '<i class="bi bi-eye-slash-fill"></i>';
    }else{
        rnp.type = "password";
        rnpb.innerHTML = '<i class="bi bi-eye"></i>';
    }

}