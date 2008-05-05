<?php require(AT_INCLUDE_PATH.'header.inc.php'); ?>

<script language="JavaScript" src="sha-1factory.js" type="text/javascript"></script>

<script type="text/javascript">
/* 
 * Encrypt login password with sha1
 */
function encrypt_password() {
	document.form.form_password_hidden.value = hex_sha1(document.form.form_password.value);
	document.form.form_password.value = "";
	return true;
}

</script>
<div class="container">

	<div class="column">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="form">
		<input type="hidden" name="form_login_action" value="true" />
		<input type="hidden" name="form_course_id" value="<?php echo $this->course_id; ?>" />
		<input type="hidden" name="form_password_hidden" value="" />
		<fieldset class="group_form"><legend class="group_form"><?php echo _AT('login') ;?></legend>
			<p><?php echo _AT('login_text') ;?></p>
			<div class="input-form" style="background-color:white;">

				<?php if ($_GET['course']): ?>
					<div class="row">
						<h3><?php echo _AT('login'). ' ' . $this->title; ?></h3>
					</div>
				<?php endif;?>

				<label for="login"><?php echo _AT('login_name_or_email'); ?></label><br />
				<input type="text" name="form_login" size="50" style="max-width: 100%; width: 100%;" id="login" /><br />

				<label for="pass"><?php echo _AT('password'); ?></label><br />
				<input type="password" class="formfield" name="form_password" style="max-width: 100%; width: 100%;" id="pass" />
				<br /><br />
				<input type="submit" name="submit" value="<?php echo _AT('login'); ?>" class="button" onclick="return encrypt_password();" />
			</div>
		</form>
	</fieldset>
	</div>


	<div class="column">
	<fieldset class="group_form"><legend class="group_form"><?php echo _AT('new_user') ;?></legend>
		<form action="registration.php" method="get">

			<p><?php echo _AT('registration_text'); ?></p>

			<?php if (defined('AT_EMAIL_CONFIRMATION') && AT_EMAIL_CONFIRMATION): ?>
				<p><?php echo _AT('confirm_account_text'); ?></p>
			<?php endif; ?>

			<input type="submit" name="register" value="<?php echo _AT('register'); ?>" class="button" />
			<br /><br /><br /><br /><br /><br /><br /><br />
		</form>
	</fieldset>
	</div>
<?php require(AT_INCLUDE_PATH.'footer.inc.php'); ?>