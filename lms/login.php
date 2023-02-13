<?php
  include('./conn.php');
  session_start();
  
  if(isset($_SESSION['user'])){
    header("Location: dashboard.php");
  }else if(isset($_SESSION['admin'])){
    header("Location: adminDashboard.php");
  }
  
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
          }
          body{
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: black;
          }
          .wrapper{
            position: relative;
            max-width: 400px;
            width: 100%;
            background: #fff;
            padding: 34px;
            border-radius: 6px;
            box-shadow: 0 5px 10px rgba(0,0,0,0.2);
          }
          .wrapper .title{
              font-size: 25px;
              /* text-align: center; */
              line-height: 20px;
              border-bottom: 24px;
              
              user-select: none;
            }
          .wrapper h2{
            position: relative;
            font-size: 22px;
            font-weight: 600;
            color: #333;
          }
          .wrapper h2::before{
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            height: 3px;
            width: 28px;
            border-radius: 12px;
            background: #4070f4;
          }
          .wrapper form{
            margin-top: 30px;
          }
          .wrapper form .input-box{
            height: 52px;
            margin: 18px 0;
          }
          form .input-box input{
            height: 100%;
            width: 100%;
            outline: none;
            padding: 0 15px;
            font-size: 17px;
            font-weight: 400;
            color: #333;
            border: 1.5px solid #C7BEBE;
            border-bottom-width: 2.5px;
            border-radius: 6px;
            transition: all 0.3s ease;
          }
          .input-box input:focus,
          .input-box input:valid{
            border-color: #4070f4;
          }
          form .policy{
            display: flex;
            align-items: center;
          }
          form h3{
            color: #707070;
            font-size: 14px;
            font-weight: 500;
            margin-left: 10px;
          }
          .input-box.button input{
            color: #fff;
            letter-spacing: 1px;
            border: none;
            background: #4070f4;
            cursor: pointer;
          }
          .input-box.button input:hover{
            background: #0e4bf1;
          }
          form .text {
           color: #333;
           width: 100%;
           text-align: center;
          }
          form .text  a{
            color: #4070f4;
            text-decoration: none;
          }
          form .text  a:hover{
            text-decoration: underline;
            text-align: center;
          }
    </style>

</head>

<body>
    <div class="wrapper">
        <div class="title">LMS|| User Login</div>
        <form action="#" method="post">
            <div class="input-box">
                <input type="text" placeholder="Email" name="email" required>
            </div>
            <div class="input-box">
                <input type="password" placeholder=" password"  name="psw" required>
            </div>
            <div class="input-box button">
                <input type="submit" name="login"></a>
            </div>
            <div class="text">
                <a href="Registration.php">New user Registration!</a><br>
                <!-- <a href="#">Forgot password?</a> -->
            </div>
        </form>
    </div>
</body>

</html>

<?php
if(isset($_POST['login'])){
  $email = $_POST['email'];
  $psw = $_POST['psw'];

  if($email === "ADMIN" && $psw === "ADMIN"){
    $_SESSION['admin'] = true;
    header("Location: adminDashboard.php");
  }else{
    if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `users` WHERE `email` = '$email' AND `psw` = '$psw';"))>0){

      $_SESSION['user'] = true;

      $userDetails = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `users` WHERE `email` = '$email' AND `psw` = '$psw';"));
      $_SESSION['userId'] = $userDetails['id'];
      header("Location: dashboard.php");
    }else{
      ?>
        <script>
          $(document).ready(function(){
            swal("Invalid Credentials","Try again","error");
          });
        </script>
      <?php
    }
  }

}
?>