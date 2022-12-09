<h1>ADD SERVICE</h1>

<form action="<?= base_url('main/saveService'); ?>" method="POST">
    <input type="text" name="service_title" placeholder="Service name" require="required">
    <input type="checkbox" name="wash" value="true"> WASHING
    <input type="number" name="wash_price" placeholder="Washing Price">
    <input type="checkbox" name="dry" value="true"> DRYING
    <input type="number" name="dry_price" placeholder="Drying Price">
    <input type="submit" value="ADD SERVICE">
</form>