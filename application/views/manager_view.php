<div id="manager">
    <div id="managersname">
    <h1><?= $name ?></h1>
    <p>AFFORDAWASH <?= $title ?></p>
    </div>
    <div id="managerinfo">
    <p>Employees <?= $employee_count ?></p>
    <p>Items <?= $item_count ?></p>
    <p>Services <?= $service_count ?></p>
    </div>
    <div id="manager_buttons">
        <form method="POST" action="<?= base_url('main/manager/addEmployee'); ?>">
            <input class="pointer" type="submit" value="ADD EMPLOYEE">
        </form>
        <form method="POST" action="<?= base_url('main/manager/addItem'); ?>" ?>
            <input class="pointer" type="submit" value="ADD ITEM">
        </form>
        <form method="POST" action="<?= base_url('main/manager/addService'); ?>" ?>
            <input class="pointer"type="submit" value="ADD SERVICE">
        </form>
        <form method="POST" action="<?= base_url('main/manager/viewEmployees'); ?>" ?>
            <input class="pointer"type="submit" value="VIEW EMPLOYEES">
        </form>
        <form method="POST" action="<?= base_url('main/manager/viewItems'); ?>" ?>
            <input class="pointer"type="submit" value="VIEW ITEMS">
        </form>
        <form method="POST" action="<?= base_url('main/manager/viewServices'); ?>" ?>
            <input class="pointer"type="submit" value="VIEW SERVICES">
        </form>
    </div>
</div>

<style>
    body {
        background-image: url("<?= base_url('assets/res/login.jpg') ?>");
    }

    #manager {
        width: 60%;
        min-width: 500;
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
        margin-right: auto;
        margin-left: auto;
    }

    #manager_buttons form input {
        height: 80px;
        width: 160px;
        color: white;
        background-color: #0099ff;
        border: 3px solid white;
        border-radius: 10px;
        margin: 10px;
        font-family: 'Arial Black', sans-serif;
    }
    #managerinfo{
        max-width: 600px;
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 20px;
        margin-top: 50px;
        margin-right: auto;
        margin-left: auto;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
    #managerinfo p{
        width: 160px;
        padding: 10px 0px;
        background-color: #0099ff;
        margin: 10px;
        text-align: center;
        border-radius: 50px;
    }
    #managersname{
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        margin-left: 30px;
    }
</style>

<script>

</script>