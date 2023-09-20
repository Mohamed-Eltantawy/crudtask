<?php 
    require_once '../includes/connection.php';

    $errors =  array();

    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);

        if(empty($email)){
            array_push($errors , "Email is required");
        }
        if(empty($password)){
            array_push($errors , "Password is required");
        }

        if(count($errors) == 0){
            //encypt password
            $password = md5($password);
            $selectUser = "SELECT * FROM users WHERE email='$email' AND password='$password'";
            $res = mysqli_query($conn , $selectUser);
            $userResult = mysqli_fetch_assoc($res);
            if($userResult){
                $_SESSION['username'] = $userResult['username'];
                header('location:index.php');
            }else{
                array_push($errors , "Wrong email or password");
            }
        }
    }else{
        header('location:login.php');
    }
?>