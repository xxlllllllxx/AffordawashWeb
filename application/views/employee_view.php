<h1>Employee <?= $name ?> </h1>
<p>AFFORDAWASH <?= $title ?></p>

<form action="<?= base_url('main/employee/addCustomer') ?>" method="post">
    <input type="text" value="Enter Customer name">
    <input type="submit" value="ADD CUSTOMER">
</form>