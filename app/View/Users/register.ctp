
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100" style="height: 650px">
				<div class="login100-form validate-form p-l-55 p-r-55 p-t-178">
					<span class="login100-form-title" style="background-color: #343a40">
						Registration
					</span>
					<?php echo $this->Form->create('Users')?>
				 
				
  					    <p id="param" style="color: green;text-align: center"><?php echo (isset($success) ? $success : '')?></p>
					
					 <p id="error_para" ></p>
					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
						<input class="input100" type="text" name="name" placeholder="Name" id="name"  required>
						<span class="focus-input100"></span>
						<p style="color:red"><?php  echo (isset($this->validationErrors['User']['name']) ? $this->validationErrors['User']['name'][0] : '') ?></p>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Please enter email" >
						<input class="input100" type="email" name="email" placeholder="Email" required>
						<span class="focus-input100"></span>
						<p style="color:red"><?php  echo (isset($this->validationErrors['User']['email']) ? $this->validationErrors['User']['email'][0] : '') ?></p>
					</div>
	                 <div class="wrap-input100 validate-input" data-validate = "Please enter password" style="margin-top: 20px">
						<input class="input100" type="password" name="password" placeholder="Password" id="pas"required>
						<span class="focus-input100"></span>
						<p style="color:red"><?php  echo (isset($this->validationErrors['User']['password']) ? $this->validationErrors['User']['password'][0] : '') ?></p>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Please enter password" style="margin-top: 20px">
						<input class="input100" type="password" name="conpassword" placeholder="Confirm Password" id="conpas" onChange="checkPasswordMatch();">
						<span class="focus-input100" style="color:green"></span>
							<!-- <input type="hidden" type="text" name="created_ip"  > -->
					</div>
					<div class="text-right p-t-13 p-b-23">
				     <span class="txt1"  id="divCheckPasswordMatch">
							
						</span>

					
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="login"  style="background-color: #343a40" >
							Register
						</button>
					</div>
				<?php echo $this->Form->end()?>
					<div class="flex-col-c p-t-170 p-b-40" style="margin-top: -150px">
						<span class="txt1 p-b-9">
							Do have an account?
						</span>

						<a href="login" class="txt3">
							Login
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script type="text/javascript">
	function checkPasswordMatch() {

    var password        = $("#pas").val();
    var confirmPassword = $("#conpas").val();

    if (password != confirmPassword){
        $("#divCheckPasswordMatch").html("Passwords do not match!");
    }else{
        $("#divCheckPasswordMatch").html("Passwords match.");
    }
  
 
		$(document).ready(function () {
		   $("#txtConfirmPassword").keyup(checkPasswordMatch);
		});
}


function validate()
{

 var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
 var char;   
 var error ="";
 var name = document.getElementById("name");
 cha = document.getElementById("name").value.length;


 if(name.value == "" )
 {
	
	 if(cha >= 5 || cha <= 20){
	  error = "Name is required and should 5-20 Characters ";
	  document.getElementById( "error_para" ).innerHTML = error;
	  document.getElementById("error_para").style.color = "#ff0000";
	 }else{
	   error = " You Have To Enter Your Name. ";
	  document.getElementById( "error_para" ).innerHTML = error;
	  document.getElementById("error_para").style.color = "#ff0000";

	 }
  
  return false;
 }

 else
 {
 	
  return true;
 }

}
</script>
	
