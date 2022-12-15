<div id="panel">
    <?php
    foreach ($data as $info) { ?>
        <form class="container" action="<?= base_url('main/edit/') ?>" method="post">
            <h3 class="customer_name"><?= $info['name'] ?></h3>
            <div class="payment">PAYMENT
                <input type="number" name="payment" value="<?= (isset($info['payment'])) ? $info['payment'] : 0 ?>" class="input" style="width: 120px">
            </div>
            <br>
            <input formaction="<?= base_url('main/editCustomer/' . $info['id']) ?>" type="submit" value="EDIT" id="finalsubs">
            <input formaction="<?= base_url('main/deleteCustomer/' . $info['id']) ?>" type="submit" value="DELETE" id="finalsubs">
            <input formaction="<?= base_url('main/completeTransact/' . $info['id']) ?>" type="submit" value="COMPLETE TRANSACTION" id="completetransaction">

            <br>
        </form>
    <?php } ?>
</div>
<style>
    body {
        background-image: url("<?= base_url('assets/res/Login.jpg') ?>");
    }

    .container {
        border: 5px solid #0099ff;
        max-width: 40%;
        width: 40%;
        min-width: 400px;
        margin: 5px;
    }

    .customer_name {
        display: inline;
        color: #ffffff;
        text-shadow: 0px 0px 3px #0099ff;
        background-color: #0099ff;
        font-size: 20px;
        padding: 5px;
        border-radius: 4px;
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
        left: 0px;
        right: 0px;
        color: white;
    }

    #completetransaction {
        cursor: pointer;
        border-color: #ffffff;
        margin-bottom: 9px;
        border-radius: 10px;
        font-weight: bold;
        color: #ffffff;
        padding: 10px;
        margin-left: 12px;
        border-width: 0;
        margin-bottom: 5px;
        background-color: #0099ff;
    }




    #finalsubs {
        margin-top: 8px;
        cursor: pointer;
        border-color: #ffffff;
        margin-bottom: 9px;
        border-radius: 10px;
        font-weight: bold;
        color: #ffffff;
        border-width: 0;
        padding: 10px;
        margin-left: 8px;
        margin-bottom: 5px;
        background-color: #0099ff;
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
</style>