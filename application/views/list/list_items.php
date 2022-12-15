<div class="panel">
    <h3 class="add">ITEM LIST</h3>
    <?php if (isset($list)) {
        foreach ($list as $item) { ?>
            <div class="item_record">
                <form class="update_form" method="POST" action="<?= base_url('main/updateItem'); ?>">
                    <input class="input" type="hidden" name="id" value="<?= $item['id']; ?>">
                    <h2 class="iname">
                        <?= $item['name']; ?>
                    </h2>
                    <div class="text_white">
                        <div> STOCK: <input class="input" type="number" name="quantity" value="<?= $item['quantity']; ?>" placeholder="<?= $item['quantity']; ?>"></div>
                        <div>COST: <input class="input" type="number" name="cost" value="<?= $item['cost']; ?>" placeholder="<?= $item['cost']; ?>"></div>
                        <div>LOWEST PRICE: <input class="input" type="number" name="lprice" value="<?= $item['lowest_price']; ?>" placeholder="<?= $item['lowest_price']; ?>"></div>
                        <div>SELLING PRICE<input class="input" type="number" name="sprice" value="<?= $item['selling_price']; ?>" placeholder="<?= $item['selling_price']; ?>"></div>
                    </div>
                    <input class="update_data" type="submit" value="UPDATE ITEM DATA">
                </form>
                <form action="<?= base_url('main/delete/item/' . $item['id']) ?>" method="POST">
                    <input class="delete_data" type="submit" value="DELETE">
                </form>
            </div>
    <?php }
    } ?>
</div>

<style>
    .add {
        margin-top: 50px;
        text-align: center;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        color: white;
    }

    .text_white {
        color: white;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
    }

    .item_record {
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

    .update_form {
        flex-direction: column;
        align-items: flex-end;
        height: 100%;
        width: 100%;
    }

    .delete_form {
        width: fit-content;
        display: flex;
        align-items: flex-end;
    }

    .iname {
        color: white;
        font-family: 'Arial', sans-serif;
        margin-left: 10px;
        margin-top: 5px;
        margin-bottom: 0px;
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

    .input {
        border-radius: 10px;
        border: 3px solid white;
        background: transparent;
        padding: 15px 10px;
        width: 150px;
        margin: auto;
        left: 0px;
        right: 0px;
        color: white;
        margin: 5px;
    }
</style>