<h1>Employee List</h1>
<table>
    <?php foreach ($list as $employee) { ?>
        <tr>
            <form action="#">
            <td><b><?= $employee['name']; ?></b></td>
            <td>@<?= $employee['username']; ?></td>
            <td><input type="number" placeholder="<?= $employee['salary']; ?>"></td>
            <td><?= $employee['customer_served']; ?></td>
            <td><input type="submit" value="UPDATE EMPLOYEE DATA"></td>
            <td><input type="submit" value="REMOVE EMPLOYEE DATA"></td>
            </form>
        </tr>
    <?php } ?>
</table>