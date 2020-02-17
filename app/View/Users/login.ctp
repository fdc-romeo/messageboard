	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100" style="height: 550px">
				<div class="login100-form validate-form p-l-55 p-r-55 p-t-178">
					<span class="login100-form-title" style="background-color: #343a40">
						LogIn
					</span>

					<?php echo $this->Flash->render('auth'); ?>
				    <?php echo $this->Form->create('Users'); ?>
				       <p id="param" style="color: red;text-align: center"><?php echo (isset($success) ? $success : '')?></p>
				       <p id="param" style="color: red;text-align: center"><?php echo (isset($this->Session->read('Message')['flash'][0]['message']) ? $this->Session->read('Message')['flash'][0]['message'] : '')?></p>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter email">
						<?php  echo (isset($this->validationErrors['User']['email']) ? $this->validationErrors['User']['name'][0] : '') ?>
						<input class="input100" type="email" name="email" placeholder="Email" id="email" required>
						<span class="focus-input100"></span>
						<p style="color:red"><?php  echo (isset($this->validationErrors['User']['email']) ? $this->validationErrors['User']['email'][0] : '') ?></p>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Please enter password">
						<input class="input100" type="password" name="password" placeholder="Password" id="password" required>
						<span class="focus-input100"></span>
						<p style="color:red"><?php  echo (isset($this->validationErrors['User']['password']) ? $this->validationErrors['User']['password'][0] : '') ?></p>
					</div>

					<div class="text-right p-t-13 p-b-23">
					<!-- 	<span class="txt1">
							Forgot
						</span>

						<a href="#" class="txt2">
							Username / Password?
						</a> -->
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" onclick="validate()" style="background-color: #343a40">
							login
						</button>
					</div>
             <?php echo $this->Form->end()?>
					<div class="flex-col-c p-t-170 p-b-40" style="margin-top: -135px">
						<span class="txt1 p-b-9">
							<b>Don’t have an account?</b>
						</span>

						<a href="register" class="txt3" style="color:#343a40">
							Register  now
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
	

	</script>