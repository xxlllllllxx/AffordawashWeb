<h1>CHANGE PASSWORD</h1>
<form action="<?= base_url('main/changePass/') ?>" method="POST">
    <input type="password" name="oldpass" placeholder="Enter Old Password" required="required">
    <input type="password" name="newpass" placeholder="Enter New Password" required="required">
    <input type="password" name="confirmpass" placeholder="Confirm New Password" required="required">
    <input type="submit" value="SAVE" formaction="<?= base_url('main/changePass/save') ?>">
    <input type="submit" value="BACK" formaction="<?= base_url('main/changePass/back') ?>">
</form>