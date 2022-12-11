<h1>Customer List</h1>
<table>
    <?php foreach ($list as $customer) { ?>
        <tr>
            <td><input type="hidden" name="id" value="<?= $customer['id']; ?>"><b><?= $customer['name']; ?></b></td>
            <td><?= $customer['employee']; ?></td>
            <td><?= $customer['machine_used'] ?></td>
            <td><?= $customer['items_bought'] ?></td>
            <td><?= $customer['total_payment'] ?></td>
            <td><?= $customer['date'] ?></td>
        </tr>
    <?php } ?>
</table>
<form action="<?= base_url('main/' . $_SESSION['user_data']['login']) ?>" method="post"><input type="submit" value="BACK"></form>