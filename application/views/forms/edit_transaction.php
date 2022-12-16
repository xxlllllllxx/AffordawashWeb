<div class="panel">
    <h3 class="add">CUSTOMER TRANSACTION</h3>
    <p class="customername">
        <?= $data[$_SESSION['customer_edit_id']]['name']; ?>
            </h2>
            <form autocomplete="off" action="" method="POST">

                <h3 class="service">Services</h3>
                <div id="">
                    <?php foreach ($_SESSION['services']['list'] as $service) { ?>
                    <div id="services">
                        <h2 class="service_title">
                            <?= $service['name'] ?>
                        </h2>
                        <input type="radio" name="service_radio" id="cbox"
                            value="<?= $service['id']; ?> <?= $service['wash_price'] + $service['dry_price'] ?>">

                        <input type="checkbox" id="cbox1" onclick="return false" <?=($service['has_wash'] == 'true') ? 
                            'checked' : '' ?>>
                        <p id="cbox2"> WASH</p>
                        <input type="checkbox" id="cbox1" onclick="return false" <?=($service['has_dry'] == 'true') ? 
                            'checked' : '' ?>>
                        <p id="cbox2">DRY
                        </p><input type="number" id="cbox3"
                            value="<?= $service['wash_price'] + $service['dry_price'] ?>" readonly="readonly">

                    </div>
                    <?php } ?>
                </div>
                <h3 class="service">Items</h3>
                <?php foreach ($_SESSION['items']['list'] as $item) { ?>
                <div id="services_items">
                    <h3 class="service_title">
                        <?= $item['name'] ?>
                    </h3>
                    <input class="ID" id="id<?= $item['id'] ?>" name="id_<?= $item['id'] ?>" type="number" value="0"
                        readonly="readonly">
                    <input class="ID" id="quantity<?= $item['id'] ?>" name="quantity_<?= $item['id'] ?>" type="number"
                        value="0" readonly="readonly">

                    <span onclick="add(<?= $item['id'] ?>, <?= $item['selling_price']; ?>,<?= $item['quantity'] ?>)"
                        class="span">ADD</span>
                    <span onclick="minus(<?= $item['id'] ?>, <?= $item['selling_price']; ?> )"
                        class="span1">MINUS</span>
                    <script>
                        function add(id, price, stock) {
                            const counter = document.querySelector("#id" + id);
                            const cost = document.querySelector("#quantity" + id);
                            if (counter.value >= stock) {
                                alert('Stock limit reached');
                            } else {
                                counter.value = parseInt(counter.value) + 1;
                                cost.value = parseInt(price) * parseInt(counter.value);
                            }
                        }

                        function minus(id, price) {
                            const counter = document.querySelector("#id" + id);
                            const cost = document.querySelector("#quantity" + id);
                            if (counter.value != 0) {
                                counter.value = parseInt(counter.value) - 1;
                                cost.value = parseInt(price) * parseInt(counter.value);
                            } else {
                                alert('Negative value error');
                            }
                        }
                    </script>
                </div>
                <?php } ?>
                <input formaction="<?= base_url('main/saveCustomerInfo') ?>" type="submit" value="SAVE" id="saveback">
                <input formaction="<?= base_url('main/employee'); ?>" type="submit" value="BACK" id="saveback2">

</div>


<style>
    .ID {
        width: 30px;
        border-radius: 10px;
        margin-left: 10px;
        padding: 10px;
    }

    .customername {
        text-align: left;
        margin-left: 23px;
        font-size: 100%;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-weight: bold;
        color: white;

    }

    .service_title {
        margin-right: 10px;
        color: white;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;

    }

    .service {
        text-align: left;
        margin-left: 4%;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        color: white;
    }

    body {
        background-image: url("<?= base_url('assets/res/Login.jpg') ?>");
    }


    #boxform {
        flex-direction: column;
        align-items: flex-end;
        height: 100%;
        width: 100%;
    }


    #employee_record {
        width: 120%;
        background: #0099ff;
        margin: 20px;
        border-radius: 10px;
        border: 3px solid white;
        display: flex;
        flex-direction: row;
        align-items: flex-end;
        flex-direction: column;
        align-items: flex-end;
        height: 100%;
        width: 100%;
    }

    .add {
        margin-top: 50px;
        text-align: center;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        color: white;
    }

    #cbox {
        width: 20px;
        height: 20px;
        margin-right: 8px;
        padding: 5px;
        margin-top: 10px;
        margin-bottom: 39px;

    }

    #cbox1 {
        width: 17px;
        height: 17px;
        margin-right: 8px;
        padding: 5px;
        margin-top: 10px;



    }

    #cbox2 {
        width: 17px;
        font-size: 17px;
        color: white;
        height: 17px;
        margin-right: 35px;
        margin-top: 20px;
        font-family: Arial, Helvetica, sans-serif;
        margin-bottom: 0%;
        margin-top: 20px;
    }

    #cbox3 {
        border-radius: 10px;
        margin-right: 20px;
        height: 12px;
        width: 45%;
        padding: 10px;
        margin-top: 10px;
        margin-bottom: 35px;
    }

    #services {
        margin-top: 40px;
        width: 80%;
        color: blue;
        background: #0099ff;
        margin: 10px;
        border-radius: 10px;
        border: 3px solid white;
        display: flex;
        flex-direction: row;
        align-items: flex-end;
        padding: 20px;
        margin-bottom: 0px;
    }

    #saveback {
        background-color: transparent;
        border-radius: 10px;
        color: white;
        border-color: white;
        background-color: #0099ff;
        padding: 10px;
        margin-left: 130px;
        margin-bottom: 5px;
        margin-right: 0px;
        margin-top: 10px;
    }

    #saveback2 {
        background-color: transparent;
        border-radius: 10px;
        color: white;
        border-color: white;
        background-color: #0099ff;
        padding: 10px;
        margin-left: 100px;
        margin-bottom: 5px;
        margin-right: 0px;
        margin-top: 10px;
    }

    .span {
        cursor: pointer;
        padding: 10px;
        margin-left: 30px;
        border: 1px solid;
        background-color: solid;
        border-radius: 20px;
        color: white;
        border-color: white;
        background-color: #0099ff;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;

    }

    .span1 {
        margin-left: 20px;
        cursor: pointer;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
        padding: 10px;
        border: 1px solid;
        background-color: solid;
        border-radius: 30px;
        color: white;
        border-color: white;
        background-color: #0099ff;

    }

    #services_items {
        margin-top: 40px;
        width: 80%;
        color: blue;
        background: #0099ff;
        margin: 10px;
        border-radius: 10px;
        border: 3px solid white;
        display: flex;
        flex-direction: row;
        align-items: flex-end;
        padding: 20px;
        margin-bottom: 20px;
    }
</style>
</form>