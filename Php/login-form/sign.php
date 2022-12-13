
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Log Yourself In</title>
		<link rel="stylesheet" href="css/styles.css">

	</head>
	<body style="background-image: url('images/back.jpg');" >

	
		<div class="login-card">

		<!--server validation response-->
        <div class="response" id="response">
                <?php
                $url="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                if(strpos($url,"sign=empty")==true){
                        echo "<H4 class='error'>Enter all details required!<H4>";
                }
                ?>

			<h1>Kuingia</h1>
			<h3>Hati Ya Utambulisho</h3>
            
            </div>

			<!--signup form-->
			<form class="login-form" action="signup.php" method="post" name="signup" id="signup">
				<input
					spellcheck="false"
					class= "control"
					type= "email"
					name="uname"
					placeholder="Email"
					id="uname"
					onkeyup="return email()"
				/>
                <input
					spellcheck="false"
					class= "control"
					type= "text"
					name="id"
					placeholder="Id Number"
					id="id"
				/>
                <input
					spellcheck="false"
					class= "control"
					type= "date"
					name="dob"
					id="date"
					
				/>
                <select name="gender" class="control" name="gender" id="gender">
                        <option value=""style="background:black">pick a gender</option>
                        <option value="Male"style="background:black">Male</option>
                        <option value="Female"style="background:black">Female</option>
                </select>
				<div class="password">
				<input
					class="control"
					id="password"
					type="password"
					name="password"
					placeholder="Password"
					onkeyup="return validate()"
				/>
				
				</div>
				<div class="password2">
				<input
					class="control"
					id="confirms"
					type="password"
					name="confirm"
					placeholder="Confirm Password"
					onkeyup="return match()"
					
					
				/>
				
				</div>

				
				
				<div class="submit">

				<!--password and email validation-->
				<div class="errors">
					<ul>
						<li id="emaill">Enter a valid email address</li>
						<li id="eight">Password:  Length must be Atleast 8 Characters</li>
						<li id="upper">Password:  Aleast One Upper Case Character</li>
						<li id="lower">Password:  Atleast One Lpper Case Character</li>
						<li id="numerical">Password:  Atleast One Numerical Character</li>
						<li id="special">Password:  Atleast One Special Character</li>
						<li id="confirmm">Passwords are a match</li>
						
						
					</ul>
				</div>

				<input type="submit" name='submit' class="control" value="SIGNUP" id="submit">
				</div>
				</form>
				<div class="signup">
					<a href="index.php">login</a>
				</div>
			</div>

				

			</div>
			<script src="vendor/jquery/jquery.min.js"></script>
			
			<script type="text/javascript">

	
					//email validation
					function email(){
						var email=document.getElementById('uname');
						var validRegex = /^[a-z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-z0-9-]+(?:\.[a-z0-9-]+)*$/;
						if(email.value.match(validRegex)){
							emaill.style.color='green';
							submit.disabled=true;

						}else{
							emaill.style.color='red';
							submit.disabled=true;

						}

					}

					function validate(){

						
							var pass=document.getElementById('password');
							var confirm=document.getElementById('confirm');
							var submit=document.getElementById('submit');
							var eight=document.getElementById('eight');
							var upper=document.getElementById('upper');
							var lower=document.getElementById('lower');
							var special=document.getElementById('special');
							var numerical=document.getElementById('numerical');
							
												
						//length
						if (pass.value.length<8){
							eight.style.color='red';
							submit.disabled=true;
							
						}else{
							eight.style.color='green';
					
						}
						//number
						if (pass.value.match(/[0-9]/)){
							numerical.style.color='green';
							


						}else{
							numerical.style.color='red';
							submit.disabled=true;
							
						}
						//uppercase
						if (pass.value.match(/[A-Z]/)){
							upper.style.color='green';
							

						}else{
							upper.style.color='red';
							submit.disabled=true;
							
						}
						//lower case
						if (pass.value.match(/[a-z]/)){
							lower.style.color='green';
							

						}else{
							lower.style.color='red';
							submit.disabled=true;
							
						}
						//special char
						if (pass.value.match(/[!/@/#/$/%/^/&/*/?/_/./-/+]/)){
							special.style.color='green';
						
						}else{
							special.style.color='red';
							submit.disabled=true;
							
						}
						
						
					}
					function match(){
						var pass=document.getElementById('password');
							var confirm=document.getElementById('confirms');

						//passwords match
						if (confirm.value==pass.value){
							confirmm.style.color='green';
							submit.disabled=false;

						}else{
							confirmm.style.color='red';
							submit.disabled=true;
							
						}
					}

					

					
					
						//min date 70yrs ago max date 10years ago
						
						var dtToday=new Date();
						var month = dtToday.getMonth()+1;
						var day= dtToday.getDate();
						var year =dtToday.getUTCFullYear()-10;
						var yearm =dtToday.getUTCFullYear()-70;
						
						if (month<10){
						month='0'+month
						}
						if(day<10){
						day='0'+day;}
						
						var maxDate =year+'-'+month+'-'+day;
						var minDate =yearm+'-'+month+'-'+day;

						document.getElementById('date').setAttribute('max',maxDate);
						document.getElementById('date').setAttribute('min',minDate);

					
			
					
			</script>
			
			<!--submit data to server -->
			<script>
			$(document).ready(function(){
					$("#signup").submit(function(e){

					e.preventDefault();
					var name=$("#uname").val();
					var dob=$("#date").val();
					var gender=$("#gender").val();
					var id=$("#id").val();
					var password=$("#password").val();

					var errors = 0;
					$("#signup:input").map(function(){
					if( !$(this).val() ) {
						$(this).parents('td').addClass('warning');
						errors++;
					} else if ($(this).val()) {
						$(this).parents('td').removeClass('warning');
					}   
				});
				if(errors > 0){
					$('#response').text("All fields are required");
					return false;

				}else{

					$.ajax({

						url:"signup.php",
						method:"POST",
						data:{uname:name,id:id,dob:dob,gender:gender,password:password},
						success:function(data){

						$('#response').html("");
						window.location.href = "http://localhost/Login-Form/index.php?Succesful";
						}
						});
					}

				})
			})

	
</script>
			
	</body>
	
</html>
