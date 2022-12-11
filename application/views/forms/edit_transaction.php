<h3>CUSTOMER TRANSACTION</h3>

<?= $data[$_SESSION['customer_edit_id']]['name']; ?>
<form autocomplete="off" action="" method="POST">
    <h3>Services</h3>
    <?php foreach ($_SESSION['services']['list'] as $service) { ?>
        <div>
            <input type="radio" name="service_radio" value="<?= $service['id']; ?> <?= $service['wash_price'] + $service['dry_price'] ?>">

            <input type="checkbox" onclick="return false" <?= ($service['has_wash'] == 'true') ? 'checked' : '' ?>>wash
            <input type="checkbox" onclick="return false" <?= ($service['has_dry'] == 'true') ? 'checked' : '' ?>>dry
            === <input type="number" value="<?= $service['wash_price'] + $service['dry_price'] ?>" readonly="readonly">
            <?= $service['name'] ?>
        </div>
    <?php } ?>
    <h3>Items</h3>
    <?php foreach ($_SESSION['items']['list'] as $item) { ?>
        <div>
            <input id="id<?= $item['id'] ?>" name="id_<?= $item['id'] ?>" type="number" value="0" readonly="readonly">
            <input id="quantity<?= $item['id'] ?>" name="quantity_<?= $item['id'] ?>" type="number" value="0" readonly="readonly">

            <?= $item['name'] ?>
            <span onclick="add(<?= $item['id'] ?>, <?= $item['selling_price']; ?>,<?= $item['quantity'] ?>)">ADD</span>
            <span onclick="minus(<?= $item['id'] ?>, <?= $item['selling_price']; ?>)">MINUS</span>
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
    <input formaction="<?= base_url('main/saveCustomerInfo') ?>" type="submit" value="SAVE">
    <input formaction="<?= base_url('main/employee'); ?>" type="submit" value="BACK">
</form>