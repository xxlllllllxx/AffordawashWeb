<form method="POST" action="<?= base_url() ?>login/login">
	<input type="text" name="username" placeholder="Enter username">
	<br>
	<input type="password" name="password" placeholder="Enter password">
	<br>
	<input type="submit" value="SUBMIT">
</form>
<?= date('F j, Y h:i:s'); ?>