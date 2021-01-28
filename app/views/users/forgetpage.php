<?php
   require APPROOT . '/views/includes/header.php';
?>

<?php
    require APPROOT . '/views/includes/navigation.php';
?>
<div class="col-5 mx-auto">
<p>Please enter your email address, we will send your email to this email address.</p>
<form method="post" action="<?php echo URLROOT; ?>/users/forgetPassword">
<div class="mb-3">
  <input name="emailqmk" type="email" class="form-control" id="emailqmk">
</div>
<div class="form-row-last">
    <input type="submit" value="Submit" class="btn btn-primary mt-1">
</div>
</form>
<p><?php echo $data['error']!='' ? $data['error'] : ''; ?></p>
<p><?php echo $data['notification']!='' ? $data['notification'] : ''; ?></p>
<?php if($data['notification']){ ?>
<a class="btn btn-warning" href="<?php echo URLROOT; ?>/users/login" ><i class="fa fa-user"></i><b>Log in</b></a>
<?php } else { ?> 
<a class="btn btn-warning" href="<?php echo URLROOT; ?>/users/register"><i class="fa fa-user"></i><b>Go Back to Register</b></a>
<?php } ?>
</div>


