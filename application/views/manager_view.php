<div id="manager">
    <h1><?= $name ?></h1>
    <p>AFFORDAWASH <?= $title ?></p>
    <p>Employees <?= $employee_count ?></p>
    <p>Items <?= $item_count ?></p>
    <p>Services <?= $service_count ?></p>
    <div id="manager_buttons">
        <form method="POST" action="<?= base_url('main/manager/addEmployee'); ?>">
            <input class="red" type="submit" value="ADD EMPLOYEE">
        </form>
        <form method="POST" action="<?= base_url('main/manager/addItem'); ?>" ?>
            <input class="red" type="submit" value="ADD ITEM">
        </form>
        <form method="POST" action="<?= base_url('main/manager/addService'); ?>" ?>
            <input type="submit" value="ADD SERVICE">
        </form>
        <form method="POST" action="<?= base_url('main/manager/viewEmployees'); ?>" ?>
            <input type="submit" value="VIEW EMPLOYEES">
        </form>
        <form method="POST" action="<?= base_url('main/manager/viewItems'); ?>" ?>
            <input type="submit" value="VIEW ITEMS">
        </form>
        <form method="POST" action="<?= base_url('main/manager/viewServices'); ?>" ?>
            <input type="submit" value="VIEW SERVICES">
        </form>
    </div>
</div>

<style>
    body {
        background-image: url("<?= base_url('assets/res/login.jpg') ?>");
    }

    #manager {
        width: 60%;

        padding: 10px;
    }

    #manager h1 {
        margin-top: 10px;
        font-size: 40px;
        color: white;
        text-shadow: 3px 3px 10px #0099ff;
    }

    #manager p {
        color: white;
        text-shadow: 3px 3px 10px #0099ff;
    }

    #manager_buttons {
        max-width: 600px;
        display: flex;
        flex-wrap: wrap;
        margin-right: 0px;
        margin-left: auto;
    }

    #manager_buttons form input {
        height: 50px;
        width: 160px;
        color: white;
        background-color: #0099ff;
        border: 3px solid white;
        border-radius: 10px;
        margin: 10px;
    }
</style>

<script>

</script>