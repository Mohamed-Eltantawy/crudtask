<?php 
    require_once '../includes/connection.php';

    $errors =  array();

    if(isset($_POST['register'])){
        $user = mysqli_real_escape_string($conn,$_POST['username']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        $confirmPassword = mysqli_real_escape_string($conn,$_POST['confirm_password']);

        if(empty($user)){
            array_push($errors , "Username is required");
        }
        if(empty($email)){
            array_push($errors , "Email is required");
        }
        if(empty($password)){
            array_push($errors , "Password is required");
        }
        if($password != $confirmPassword){
            array_push($errors , "Password is not match");
        }

        $selectUser = "SELECT * FROM users WHERE email='$email'";
        $res = mysqli_query($conn , $selectUser);
        $userResult = mysqli_fetch_assoc($res);


        if($userResult){
            if($userResult['email'] == $email){
                array_push($errors , "Email already exists");
            }
        }

        if(count($errors) == 0){
            //encypt password
            $password = md5($password);
            $insertUser = "INSERT INTO users  (username , email , password)
            VALUES('$user' , '$email' , '$password')";
            }
            mysqli_query($conn , $insertUser);
            //save user session
            $_SESSION['username'] = $user;
            header('location:index.php');
    }else{
        header('location:register.php');
    }
?>