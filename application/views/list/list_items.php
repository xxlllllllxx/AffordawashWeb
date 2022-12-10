<h1>Item List</h1>
<table>
    <?php foreach ($list as $item) { ?>
        <tr>
            <form method="POST" action="<?= base_url('main/updateItem'); ?>">
                <td><input type="hidden" name="id" value="<?= $item['id']; ?>"><b><?= $item['name']; ?></b></td>
                <td><input type="number" name="quantity" value="<?= $item['quantity']; ?>" placeholder="<?= $item['quantity']; ?>" va></td>
                <td><input type="number" name="cost" value="<?= $item['cost']; ?>" placeholder="<?= $item['cost']; ?>"></td>
                <td><input type="number" name="lprice" value="<?= $item['lowest_price']; ?>" placeholder="<?= $item['lowest_price']; ?>"></td>
                <td><input type="number" name="sprice" value="<?= $item['selling_price']; ?>" placeholder="<?= $item['selling_price']; ?>"></td>
                <td><input type="submit" value="UPDATE ITEM DATA"></td>
            </form>
            <form action="<?= base_url('main/delete/item/' . $item['id']) ?>" method="POST">
                <td><input type="submit" value="DELETE"></td>
            </form>
        </tr>
    <?php } ?>
</table>