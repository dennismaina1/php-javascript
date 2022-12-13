<?php  //this is also too simple. just connect the database, control input values and response
   session_start();
   require 'sql.php';

if(isset($_POST['username']) && isset($_POST['password'])){

    $username = $_POST["username"];
    $password = $_POST["password"];
    $passwordhash=password_hash($password,PASSWORD_DEFAULT);
    $sql = "SELECT * FROM users WHERE username = '$username'";

    $result = mysqli_query($connect, $sql);
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    
    if($count == 1){
        
        $passworddb=$row['passwords'];
        $username=$row['username'];
        if (password_verify($password,$passworddb)){
            $_SESSION['username']=$username;
            exit($row['username']);
        }else{
            exit('username or password invalid');
        }
    }
    else {
        exit('username or password invalid');
    }
}

?>