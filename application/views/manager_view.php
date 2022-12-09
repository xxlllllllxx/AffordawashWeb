<form action="<?= base_url('main/viewCustomerTransact') ?>" method="post"><input type="submit" value="VIEW CUSTOMER TRANSACTION LIST"></form>
<form action="<?= base_url('main/profile') ?>" method="post"><input type="submit" value="PROFILE"></form>
<form action="<?= base_url('main/changePass') ?>" method="post"><input type="submit" value="CHANGE PASSWORD"></form>
<form action="<?= base_url('main/about') ?>" method="post"><input type="submit" value="ABOUT US"></form>
<form action="<?= base_url('main/logout') ?>" method="post"><input type="submit" value="LOGOUT"></form>


<h1>Manager <?= $name ?></h1>
<p>AFFORDAWASH <?= $title ?></p>

<p>Employees <?= $employee_count ?></p>
<p>Items <?= $item_count ?></p>
<p>Services <?= $service_count ?></p>
<div>
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
</div>