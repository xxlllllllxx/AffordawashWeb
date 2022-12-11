<h1>Employee <?= $name ?> </h1>
<p>AFFORDAWASH <?= $title ?></p>

<form action="<?= base_url('main/employee/addCustomer') ?>" method="post">
    <input type="text" placeholder="Enter Customer name" name="customer_name" required="required">
    <input type="submit" value="ADD CUSTOMER">
</form>