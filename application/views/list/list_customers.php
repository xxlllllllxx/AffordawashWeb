<div class="panel">
    <h3 class="add">CUSTOMER LIST</h3>
    <?php foreach ($list as $customer) { ?>
    <div class="customer_list">
        <input type="hidden" name="id" value="<?= $customer['id']; ?>">
        <div class="update_form">
            <h2 class="cname">
                <?= $customer['name']; ?>
            </h2>
            <div class="date_time">
                <?= $customer['date'] ?>
            </div>
            <div class="label">ASSISTED BY: <?= $customer['employee']; ?>
            </div>
            <div class="label">MACHINE USED: <p>
                    <?= $customer['machine_used'] ?>
                </p>
            </div>
            <div class="label">ITEMS: <p>
                    <?= $customer['items_bought'] ?>
                </p>

            </div>
            <div class="label">TOTAL PAYMENT: <?= $customer['total_payment'] ?>
            </div>

            <form class="back_form" action="<?= base_url('main/' . $_SESSION['user_data']['login']) ?>" method="post">
                <input class="back" type="submit" value="BACK">
            </form>
        </div>
    </div>
    <?php } ?>
</div>

<style>
    .label {
        margin-left: 50px;
        margin-top: 5px;
        color: white;
        font-family: Arial, Helvetica, sans-serif;


    }

    .date_time {
        margin-top: px;
        margin-bottom: 0px;
        margin-left: 350px;
        color: white;
        font-family: Arial, Helvetica, sans-serif;


    }

    .cname {
        margin-left: 10px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        color: white;
    }

    .add {
        margin-top: 40px;
        text-align: center;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        color: white;
    }

    .customer_list {
        width: 90%;
        height: 70%;
        background: #0099ff;
        margin: 20px;
        border-radius: 10px;
        border: 3px solid white;
        display: flex;
        flex-direction: row;
        align-items: flex-end;
    }

    .update_form {

        flex-direction: column;
        align-items: center;
        height: 100%;
        width: 100%;
    }

    .back {
        background-color: transparent;
        border-radius: 10px;
        color: red;
        border-color: red;
        padding: 10px;
        margin-bottom: 5px;
        margin-right: 20px;

    }

    .back_form {
        width: fit-content;
        display: flex;
        align-items: flex-end;
        margin-left: 350px;

    }
</style>