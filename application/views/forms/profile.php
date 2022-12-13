<div class="panel">
    <h3 class="add">PROFILE SETTINGS</h3>
    <form class="add_form" action="<?= base_url('main/profile/') ?>" method="POST">
        <input class="input" type="text" name="name" value="<?= $name ?>">
        <input class="input" type="text" name="username" value="<?= $username ?>">
        <input class="input" type="text" name="title" value="<?= $title ?>" <?=($login == 'manager') ? '' :
    "disabled='disabled'" ?>>
        <?php if ($login == 'employee')
            echo "<input type='text' value='$salary' disabled='disabled'>" ?>
        <input class="send input" type="submit" value="SAVE" formaction="<?= base_url('main/profile/save') ?>">
        <input class="send input" type="submit" formaction="<?= base_url('main/profile/back') ?>" value="BACK">
    </form>
</div>

<style>
    .add {
        margin-top: 50px;
        text-align: center;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        color: white;
    }

    .add_form {
        display: flex;
        flex-direction: column;
    }

    .input {
        border-radius: 10px;
        border: 3px solid white;
        background: transparent;
        padding: 15px 10px;
        width: 50%;
        margin: auto;
        left: 0px;
        right: 0px;
        color: white;
        margin-top: 20px;
    }

    .send {
        font-weight: bold;
        font-family: 'Arial Black', sans-serif;
        background-color: #0099ff;
        border-color: #0099ff;
        cursor: pointer;
        width: 200px;
    }
</style>