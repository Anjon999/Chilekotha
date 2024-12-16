<?php 

session_start(); 

include "db_conn.php";

if (isset($_POST['username']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $username = validate($_POST['username']);

    $password = validate($_POST['password']);

    if (empty($username)) {

        header("Location: 404.html?error=Email is required");

        exit();

    }else if(empty($password)){

        header("Location: 404.html?error=Password is required");

        exit();

    }else{

        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['username'] === $username && $row['password'] === $password) {

                echo "Logged in!";

                header("Location: update.html");

                exit();

            }else{

                header("Location: 404.html?error=Incorect email or password");

                exit();

            }

        }else{

            header("Location: 404.html?error=Incorect email or password");

            exit();

        }

    }

}else{

    header("Location: 404.html");

    exit();

}