<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Registration.css">
    
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>
    <div class="wrapper">
        <div class="title">LMS|| User registration</div>
        <form>
            <div class="input-box">
                <input type="text" placeholder="Full name" id="name" name="name" required>
            </div>
            <div class="input-box">
                <input type="email" placeholder="Email" id="email" name="email" required>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Mobile Number" id="cno" name="cno" required>
            </div>
            <div class="input-box">
                <input type="password" id="psw" placeholder="password" name="password" required>
            </div>
            <div class="input-box">
                <input type="password" id="cPsw" placeholder="confirm password" name="password" required>
            </div>
            <!-- <div class="policy">
                <input type="checkbox"> 
                <h3>I accept all terms & condition</h3>
            </div> -->
            <p id="message"></p>
            <div class="input-box button">
                <input type="submit" id="registerNow" value="Register Now">
            </div>
            <div class="text">
                <a href="login.php">Login page</a><br>
                <!-- <a href="#">Forgot password?</a> -->
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function(){
            $("#registerNow").on("click",function(event){
                event.preventDefault();

                let name = $("#name").val();
                let email = $("#email").val();
                let cno = $("#cno").val();
                let password = $("#psw").val();
                let confirmPassword = $("#cPsw").val();

                if(name == "" || email == "" || cno =="" || password == "" || confirmPassword == ""){
                    swal("Fields cannot be empty","","warning");
                }else if(password===confirmPassword){
                    $.ajax({
                        url: "register.php",
                        method: "post",
                        data: {
                            name:name,
                            email:email,
                            cno:cno,
                            psw:password
                        },
                        success: function (data) {
                        if (data === "OK") {
                            swal("Registration Success","Please login to continue","success").then(()=>{
                                window.location.href = "login.php";
                            });
                        }else{
                            swal("Registration failed","","error");
                        }
                        },
                    });
                }

            });
        });
    </script>
</body>

</html>