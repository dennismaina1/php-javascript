<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Log Yourself In</title>
		<link rel="stylesheet" href="css/styles.css">
	</head>
	<body style="background-image: url('images/back.jpg');" >
		<div class="login-card" id="login-card">
        <div class="response" id="response">
		
                <?php
                $url="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                if(strpos($url,"Succesful")==true){
                        echo "<H4 class='success'>Sign up successful, Please login<H4>";
                }
				elseif(strpos($url,"Fail")==true){
						echo "<H4 style='color:red'>Invalid username or password <H4>";
					
				}
                ?></div>
			<h1>Kuingia</h1>
			<h3>Hati Ya Utambulisho</h3>
		<form class="login-form" id="login" action="logic1.php">
				<input
					spellcheck="false"
					class= "control"
					type= "text"
					placeholder="Username"
					name="username"
					id="username"
				/>
				<div class="password">
				<input
					class="control"
					id="password"
					type="password"
					placeholder="Password"
					name="password"
					id="password"
				/>
				
				</div>
				<div class="submit">
				<input type="submit" name='login' class="control2" value="LOGIN" id="submit">
				</div>
		</form>
				<div class="signup">
					<a href="signup.php">Sign Up</a>
				</div>
			<script src="vendor/jquery/jquery.min.js"></script>
		   <script type="text/javascript" >

		$(document).ready(function(){
					$(".login-form").submit(function(e){

					e.preventDefault();
					var name=$("#username").val();
					var password=$("#password").val();
					var session;

					
				if(name.length == "" || password.length==""){
					$('#response').html("All fields are required !!!").css('color','red');
					$('.control').css('box-shadow', '3px 3px 3px 3px red');
					return false;}

				else{
					// ajax method to validate uname and pass to logic 1 server 
					$.ajax({

						url:"logic1.php",
						method:"POST",
						data:{username:name ,password:password},
						beforeSend: function(){
							// Show image container
							$("#response").html("<img src='https://i.imgur.com/pKopwXp.gif&#39' width='32px' height='32px'>");
						},
						success:function(data){
							
							if(data=="username or password invalid"){
						window.location.href = "http://localhost/Login-Form/index.php?Fail";	
						
							}
							else{
						window.location.href = "http://localhost/Login-Form/home.php";					
							    }
									
						}, complete:function(data){
									// Hide image container
									$("#response").hide();
								}						
						});
					}

				})
			})


		</script>
	</body>
</html>
