<h1>Manager <?= $name ?></h1>
<p>AFFORDAWASH <?= $title ?></p>
<p>Employees <?= $employee_count ?></p>
<p>Items <?= $item_count ?></p>
<p>Services <?= $service_count ?></p>
<form method="POST" action="<?= base_url('main/manager/addEmployee'); ?>">
    <input type="submit" value="ADD EMPLOYEE">
</form>
<form method="POST" action="<?= base_url('main/manager/addItem'); ?>" ?>
    <input type="submit" value="ADD ITEM">
</form>
<form method="POST" action="<?= base_url('main/manager/addService'); ?>" ?>
    <input type="submit" value="ADD SERVICE">
</form>
<form method="POST" action="<?= base_url('main/manager/viewEmployees'); ?>" ?>
    <input type="submit" value="VIEW EMPLOYEES">
</form>
<form method="POST" action="<?= base_url('main/manager/viewItems'); ?>" ?>
    <input type="submit" value="VIEW ITEMS">
</form>
<form method="POST" action="<?= base_url('main/manager/viewServices'); ?>" ?>
    <input type="submit" value="VIEW SERVICES">
</form>