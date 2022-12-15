<div class="panel">
    <h3 class="add">SERVICES LIST</h3>

    <?php if (isset($list)) {
        foreach ($list as $service) { ?>

            <div class="servicerecord">
                <form class="update_form" method="POST" action="<?= base_url('main/updateService'); ?>">
                    <input type="hidden" name="id" value="<?= $service['id']; ?>">
                    <h2 class="sname">
                        <?= $service['name']; ?>
                    </h2>
                    <div class="check"><span>WASHING</span><input class="cbox" type="checkbox" name="has_wash" value="true" <?= ($service['has_wash'] == 'true') ? "checked='checked'" : "unchecked='unchecked'"; ?>>
                        <input class="input" type="number" name="wash_price" placeholder="<?= $service['wash_price']; ?>" value="<?= $service['wash_price']; ?>">
                    </div>
                    <div class="check"><span>DRYING</span><input class="cbox" type="checkbox" name="has_dry" value="true" <?= ($service['has_dry'] == 'true') ? "checked='checked'" : "unchecked='unchecked'"; ?>>
                        <input class="input" type="number" name="dry_price" placeholder="<?= $service['dry_price']; ?>" value="<?= $service['dry_price']; ?>">
                    </div>
                    <input class="update_data" type="submit" value="UPDATE SERVICE">
                </form>

                <form class="delete_form" action="<?= base_url('main/delete/service/' . $service['id']) ?>" method="POST">
                    <input class="delete_data" type="submit" value="DELETE">
                </form>
            </div>
    <?php }
    } ?>

</div>

<style>
    .update_form {
        flex-direction: column;
        align-items: flex-end;
        height: 100%;
        width: 100%;
    }

    .delete_form {
        width: fit-content;
    }

    .add {
        margin-top: 50px;
        text-align: center;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        color: white;
    }

    .sname {
        color: white;
        font-family: 'Arial', sans-serif;
        margin-left: 10px;
        margin-top: 5px;
        margin-bottom: 0px;
    }

    .servicerecord {
        padding: 10px;
        width: 90%;
        background: #0099ff;
        margin: 20px;
        border-radius: 10px;
        border: 3px solid white;
        box-sizing: border-box;
        display: flex;
        flex-direction: row;
        align-items: flex-end;
    }

    .check {
        width: 300px;
        display: flex;
    }

    .check span {
        width: 50px;
        font-family: 'Arial Black', sans-serif;
        color: white;
        font-size: 12px;
        margin-left: 70px;
    }

    .input {
        border-radius: 10px;
        border: 3px solid white;
        background: transparent;
        padding: 15px 10px;
        width: 50%;
        margin: 10px auto;
        left: 0px;
        right: 0px;
        color: white;
    }

    .cbox {
        width: 17px;
        height: 17px;
        margin-top: 20px;
    }

    .delete_data {
        background-color: transparent;
        border-radius: 10px;
        color: red;
        border-color: red;
        padding: 10px;
        margin-bottom: 5px;
        margin-right: 20px;
    }

    .update_data {
        background-color: transparent;
        border-radius: 10px;
        color: white;
        border-color: white;
        padding: 10px;
        margin-left: 20px;
        margin-bottom: 5px;
    }
</style>