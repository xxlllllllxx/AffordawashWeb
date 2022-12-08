<h1>Employee List</h1>
<table>
    <?php foreach ($list as $employee) { ?>
        <tr>
            <form method="POST" action="<?= base_url('main/updateEmployee'); ?>">
                <td><input type="hidden" name="id" value="<?= $employee['id']; ?>"><b><?= $employee['name']; ?></b></td>
                <td>@<?= $employee['username']; ?></td>
                <td><input type="number" name="salary" placeholder="<?= $employee['salary']; ?>" value="<?= $employee['salary']; ?>"></td>
                <td><?= $employee['customer_served']; ?></td>
                <td><input type="submit" value="UPDATE EMPLOYEE DATA"></td>
            </form>
        </tr>
    <?php } ?>
</table>