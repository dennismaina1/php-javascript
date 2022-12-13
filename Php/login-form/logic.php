<?php
require('sql.php');

if(isset($_POST['uname']) && isset($_POST['password'])){


//pick data from forms and save them to variables
$uname=$_POST['uname'];
$id=$_POST['id'];
$dob=$_POST['dob'];
$gender=$_POST['gender'];
$password=$_POST['password'];

//check if variables are empty 
if(empty($uname)||empty($id)||empty($dob)||empty($gender)||empty($password)){

    header('location:sign.php?sign=empty');
    exit();
}else{
//hash the password before storing it to the database
$password=password_hash($password,PASSWORD_DEFAULT);

//save data to database
$query="INSERT INTO users(username,dob,gender,passwords,idnumber)VALUES
('$uname','$dob','$gender','$password','$id')";

//connect and execute query
if ($connect->query($query) === TRUE) {
   
    exit();
  } else {
    echo "Error: " . $query . "<br>" . $connect->error;
  }
  
  $connect->close();
}}
else echo "no data";

?>

