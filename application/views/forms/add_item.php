<h1>ADD ITEM</h1>

<form action="<?= base_url('main/saveItem'); ?>" method="POST">
    <input type="text" name="item_name" placeholder="Item Name" require="required">
    <input type="number" name="stock" placeholder="Stock Quantity">
    <input type="number" name="cost" placeholder="Cost">
    <input type="number" name="lowest" placeholder="Lowest Price">
    <input type="number" name="selling" placeholder="Selling Price">
    <input type="submit" value="ADD ITEM">
</form>