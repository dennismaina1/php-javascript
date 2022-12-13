
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
                ?></div>

			<h1>Kuingia</h1>
			<h3>Hati Ya Utambulisho</h3>
            
            

			<!--signup form-->
			<form class="login-form" action="signup.php" method="post" name="signup" id="signup">
				<div class="text-container">
						<input
							spellcheck="false"
							class= "control"
							type= "email"
							name="uname"
							placeholder="Email"
							id="uname"
							onkeyup="return email()"
						/>
						<span id="gtick1"></span>
				</div>
				<div class="text-container">
                <input
					spellcheck="false"
					class= "control"
					type= "number"
					name="id"
					placeholder="Id Number"
					id="id"
					onkeyup=""
				/>
				<span id="gtickid"></span>
				</div>
				<div class="text-container">
                <input
					spellcheck="false"
					class= "control"
					type= "date"
					name="dob"
					id="date"
					
				/>
				<span id="gtickgen"></span>
				</div>
                <select name="gender" class="control" name="gender" id="gender">
                        <option value=""style="background:black">pick a gender</option>
                        <option value="Male"style="background:black">Male</option>
                        <option value="Female"style="background:black">Female</option>
                </select>
				<div class="text-container">
				<input
					class="control"
					id="password"
					type="password"
					name="password"
					placeholder="Password"
					onkeyup="yourElemOnKeyup(this.id)"
					
				
					
					
				/>
				<span id="gtickp"></span>
				</div>
				<div class="text-container">
				<input
					class="control"
					id="confirms"
					type="password"
					name="confirm"
					placeholder="Confirm Password"
					onkeyup="return match()"
					
					
				/>
				<span id="gtickcon"></span>
				</div>

				
				
				<div class="submit">

				<!--password and email validation-->
				<div class="errors">
					<ul>
						<li id="emaill"></li>
						<li id="eight"></li>
						<li id="upper"></li>
						<li id="lower"></li>
						<li id="numerical"></li>
						<li id="special"></li>
						<li id="confirmm"></li>
						
						
					</ul>
				</div>

				<input type="submit" name='submit' class="control2" value="SIGNUP" id="submit">
				</div>
				</form>
				<div class="signup">
					<a href="index.php">login</a>
				</div>
			</div>

				

			</div>
			<script src="vendor/jquery/jquery.min.js"></script>
			<script>
				function yourElemOnKeyup(id){
     		  validate(id);
     		 
					}
			</script>
			<script type="text/javascript">

	
					//email validation
					function email(){
						var email=document.getElementById('uname');
						var validRegex = /^[a-z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-z0-9-]+(?:\.[a-z0-9-]+)*$/;
						if(email.value.match(validRegex)){
							
							document.getElementById("gtick1").innerHTML = "<span style='color:green'>✔</span>";
							document.getElementById("emaill").innerHTML ="";
							submit.disabled=true;

						}else{
							document.getElementById("gtick1").innerHTML = "<span style='color:red'>X</span>";
							document.getElementById("emaill").innerHTML ="<li style='color:red'=>Enter a valid email address</li>";
							submit.disabled=true;

						}

					}

					function idno(){

						var idno=document.getElementById('id');
						if(idno.value.length<8){

							document.getElementById("gtickid").innerHTML = "<span style='color:red'>X</span>";
						}else{
							document.getElementById("gtickid").innerHTML = "<span style='color:green'>✔</span>";
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
							
							document.getElementById("eight").innerHTML ="<li style='color:red'=>Minumum password length is 8 characters</li>";
							submit.disabled=true;
						}else{
							document.getElementById("eight").innerHTML ="";
							submit.disabled=true;
							
						}
						//number
						if (pass.value.match(/[0-9]/)){
							document.getElementById("numerical").innerHTML ="";
							submit.disabled=true;
							

						}else{
							document.getElementById("numerical").innerHTML ="<li style='color:red'=>Password must have atleast one number</li>";
							submit.disabled=true;
							
						}
						//uppercase
						if (pass.value.match(/[A-Z]/)){
							document.getElementById("upper").innerHTML ="";
							submit.disabled=true;
							

						}else{
							
							document.getElementById("upper").innerHTML ="<li style='color:red'=>Password:use atleast uppercase character</li>";
							submit.disabled=true;
						}
						//lower case
						if (pass.value.match(/[a-z]/)){
							document.getElementById("lower").innerHTML ="";
							submit.disabled=true;
							

						}else{
							document.getElementById("lower").innerHTML ="<li style='color:red'=>Password:use atleast one lowercase character</li>";
							submit.disabled=true;
							
						}
						//special char
						if (pass.value.match(/[!/@/#/$/%/^/&/*/?/_/./-/+]/)){
							document.getElementById("special").innerHTML ="";
							return (true)
						
						}else{
							document.getElementById("special").innerHTML ="<li style='color:red'=>Password must have atleast one special character</li>";
							submit.disabled=true;
							
						}
				
						
					}
			</script>
			<script>
				//match password with confirm password
					function match(){
						var pass=document.getElementById('password');
							var confirm=document.getElementById('confirms');

						//passwords match
						if (confirm.value===pass.value){
							document.getElementById("gtickcon").innerHTML = "<span style='color:green'>✔</span>";
							submit.disabled=false;

						}else{
							document.getElementById("gtickcon").innerHTML = "<span style='color:red'>X</span>";

							submit.disabled=true;
							
						}
					}
			</script>
			<script>
					
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
				
					if(name.length == "" ){
					$('#response').html("All fields are required !!!").css('color','red');
					$('.text-container').css('box-shadow', '0px 0px 0px 1px red');
					
				}
					else if(password.length==""){

					$('#response').html("All fields are required !!!").css('color','red');
					$('.text-container').css('box-shadow', '0px 0px 0px 1px red');
				}
					else{

					$.ajax({

						url:"logic.php",
						method:"POST",
						data:{uname:name,id:id,dob:dob,gender:gender,password:password},
						beforeSend: function(){
							// Show image container
							$("#response").html("<img src='https://i.imgur.com/pKopwXp.gif&#39' width='32px' height='32px'>");
						},
						success:function(data){

						$('#response').html("");
						window.location.href = "http://localhost/Login-Form/index.php?Succesful";
						}
						, complete:function(data){
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
