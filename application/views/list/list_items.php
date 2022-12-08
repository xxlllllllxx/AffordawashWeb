<h1>Item List</h1>
<table>
    <?php foreach ($list as $item) { ?>
        <tr>
            <form action="#">
                <td><b><?= $item['name']; ?></b></td>
                <td><input type="number" placeholder="<?= $item['quantity']; ?>"></td>
                <td><input type="number" placeholder="<?= $item['cost']; ?>"></td>
                <td><input type="number" placeholder="<?= $item['lowest_price']; ?>"></td>
                <td><input type="number" placeholder="<?= $item['selling_price']; ?>"></td>
                <td><input type="submit" value="UPDATE ITEM"></td>
                <td><input type="submit" value="DELETE ITEM"></td>
            </form>
        </tr>
    <?php } ?>
</table>