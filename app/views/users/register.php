<?php
   require APPROOT . '/views/includes/header.php';
?>

<?php
    require APPROOT . '/views/includes/navigation.php';
?>

	<div class="page-content">
		<div class="form-v4-content mt-0">
			<div class="form-left">
				<h2>Welcome <br> to OURBOOKS</h2>
				<h3><b>Register to:</b></h3>
				<h3>- Buy books</h3>
				<h3>- Add books</h3>
				<h3>- Add blogs</h3>
				<h3>- Manage orders</h3>
				<div class="form-left-last">
					<input type="button" name="dendangnhap" class="account" value="Adready had account?" onclick="location.href='<?php echo URLROOT; ?>/users/login';">
				</div>
			</div>
			
			<form class="form-detail"  action="<?php echo URLROOT; ?>/users/register" method="post" id="myform">
				<h2>REGISTER</h2>
				<div class="form-group">
					<div class="form-row form-row-1">
						<label for="first_name">First name</label>
						<input type="text" name="first" id="first_name" class="input-text" value="<?php echo $data['firstnameError']== '' ? $data['first'] : '';?>"
						/>
                          <span class="invalidFeedback">
                <?php echo $data['firstnameError']; ?>
            </span>
					</div>
					<div class="form-row form-row-1">
						<label for="last_name">Last name</label>
						<input type="text" name="last" id="last_name" class="input-text" value="<?php echo $data['lastnameError']== '' ? $data['last'] : '';?>"/>
                         <span class="invalidFeedback">
                <?php echo $data['lastnameError']; ?>
            </span>
					</div>
				</div>
				<div class="form-row">
					<label for="your_email">Email</label>
					<input type="text" name="email" id="your_email" class="input-text" value="<?php echo $data['emailError']== '' ? $data['email'] : '';?>" />
                     <span class="invalidFeedback">
                <?php echo $data['emailError']; ?>
            </span>
				</div>
				<div class="form-row">
					<label for="your_phone">Phone number</label>
					<input type="text" name="phone" id="your_phone" class="input-text" value="<?php echo $data['phoneError']== '' ? $data['phone'] : '';?>" />
                     <span class="invalidFeedback">
                <?php echo $data['phoneError']; ?>
            </span>
				</div>
				<div class="form-group">
					<div class="form-row form-row-1 ">
						<label for="your_password">Password</label>
						<input type="password" name="password" id="your_password" class="input-text">
                         <span class="invalidFeedback">
                <?php echo $data['passwordError']; ?>
            </span>
					</div>
					<div class="form-row form-row-1">
						<label for="comfirm_password">Confirm password</label>
						<input type="password" name="cfpassword" id="comfirm_password" class="input-text" />
                         <span class="invalidFeedback">
                <?php echo $data['cfPasswordError']; ?>
            </span>
					</div>
				</div>
				<div class="form-row-last">
					<input type="submit" name="register" class="register" value="Regsiter">
				</div>
			</form>
		</div>
	</div>

<?php
    require APPROOT . '/views/includes/footer.php';
?>


