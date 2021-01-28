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
                    <input type="button" name="dendangkydn" class="account" value="Not registered yet??" onclick="location.href='<?php echo URLROOT; ?>/users/register';" >
				</div>
			</div>
			<form class="form-detail" action="<?php echo URLROOT; ?>/users/login" method="post" id="myform">
				<h2>SIGN IN</h2>
				<div class="form-row">
					<label for="your_email">Email</label>
                    <input type="text" name="email" id="your_email" class="input-text" value="<?php echo $data['email']; ?>">
                     <span class="invalidFeedback">
                <?php echo $data['emailError']; ?>
            </span>
				</div>
				<div class="form-row ">
					<label for="matkhaudn">Password</label>
                    <input type="password" name="password" id="matkhaudn" class="input-text">
                     <span class="invalidFeedback">
                <?php echo $data['passwordError']; ?>
            </span>
				</div>
				
				<div class="form-row"><p><a href="<?php echo URLROOT; ?>/users/forgetPassword" class="text"><b>Forgot password</b></a></p></div>
				<br>
				<div class="form-row-last">
					<input type="submit" name="login" class="register" value="Submit">
				</div>
			</form>
		</div>
	</div>

<?php
    require APPROOT . '/views/includes/footer.php';
?>