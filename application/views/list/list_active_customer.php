<div id="panel">
    <?php
    foreach ($data as $info) { ?>
    <form class="container" action="<?= base_url('main/edit/') ?>" method="post">
        <h3 class="customer_name">
            <?= $info['name'] ?>
        </h3>
        <div class="payment">PAYMENT
            <input type="number" name="payment" value="<?=(isset($info['payment'])) ? $info['payment'] : 0 ?>"
                class="input" style="width: 120px">
        </div>
        <br>
        <input formaction="<?= base_url('main/editCustomer/' . $info['id']) ?>" type="submit"
            value="ADD ITEMS AND SERVICE" id="finalsubs">
        <input formaction="<?= base_url('main/deleteCustomer/' . $info['id']) ?>" type="submit" value="DELETE"
            id="delete">
        <input formaction="<?= base_url('main/completeTransact/' . $info['id']) ?>" type="submit"
            value="COMPLETE TRANSACTION" id="completetransaction">

        <br>
    </form>
    <?php } ?>
</div>
<style>
    body {
        background-image: url("<?= base_url('assets/res/Login.jpg') ?>");
    }

    .container {
        margin-top: 10px;
        border-radius: 20px;
        padding: 5px;
        border: 5px solid #0099ff;
        max-width: 40%;
        width: 35%;
        min-width: 400px;
        margin-left: 50px;
    }

    .customer_name {
        font-family: Arial, Helvetica, sans-serif;
        display: inline;
        color: black;
        font-size: 20px;
        padding: 5px;
        margin-left: 5px;

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
    }



    #addcustomer {
        cursor: pointer;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 9px;
        padding: 17px;
        width: 250px;
        color: #ffffff;
        font-weight: bold;
        border-radius: 8px;
        border-width: 0;
        background-color: #0099ff;
    }

    .input {
        border-radius: 10px;
        border: 3px solid white;
        background: transparent;
        padding: 15px 10px;
        width: 50%;
        margin: auto;
        margin-left: 20px;
        margin-right: 20px;
        color: white;
    }

    #completetransaction {
        cursor: pointer;
        border-color: #ffffff;
        margin-bottom: 10px;
        border-radius: 10px;
        font-weight: bold;
        color: #ffffff;
        padding: 10px;
        margin-left: 12px;
        border-width: 0;
        background-color: #0099ff;
        margin-left: 20px;
    }




    #finalsubs {
        margin-top: 15px;
        cursor: pointer;
        border-color: #ffffff;
        border-radius: 10px;
        font-weight: bold;
        color: #ffffff;
        border-width: 0;
        padding: 10px;
        margin-left: 8px;
        background-color: #0099ff;
        margin-left: 25px;
        margin-bottom: 10px;
    }

    #delete {
        margin-top: 15px;
        cursor: pointer;
        border-color: #ffffff;
        margin-bottom: 10px;
        border-radius: 10px;
        font-weight: bold;
        color: #ffffff;
        border-width: 0;
        padding: 10px;
        margin-left: 8px;
        background-color: #0099ff;
        margin-left: 20px;
    }



    #newcustomer {
        cursor: pointer;
        border-color: #ffffff;
        margin-bottom: 9px;
        border-radius: 10px;
        font-weight: bold;
        color: #ffffff;
        width: 250px;
        padding: 10px;
        margin-left: 12px;
        border-width: 0;
        margin-bottom: 5px;
        background-color: #0099ff;
    }

    .payment {
        margin-top: 20px;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: lighter;
        margin-left: 80px;
    }
</style>