<h1>PROFILE SETTINGS</h1>

<form action="<?= base_url('main/profile/') ?>" method="POST">
    <input type="text" name="name" value="<?= $name ?>">
    <input type="text" name="username" value="<?= $username ?>">
    <input type="text" name="title" value="<?= $title ?>" <?= ($login == 'manager') ? '' : "disabled='disabled'" ?>>
    <?php if ($login == 'employee') echo "<input type='text' value='$salary' disabled='disabled'>" ?>
    <input type="submit" value="SAVE" formaction="<?= base_url('main/profile/save') ?>">
    <input type="submit" formaction="<?= base_url('main/profile/back') ?>" value="BACK">
</form>