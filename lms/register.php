<?php
    include './conn.php';

    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $cno = $_POST['cno'];
        $psw = $_POST['psw'];
        if(mysqli_query($conn,"INSERT INTO `users` (`id`, `name`,`email`, `cno`, `psw`) VALUES (NULL, '$name', '$email','$cno', '$psw')")){
            echo "OK";
        }else{
            echo (mysqli_query($conn,"INSERT INTO `users` (`id`, `name`,`email`, `cno`, `psw`) VALUES (NULL, '$name', '$email','$cno', '$psw')"));
        }
    }

?>