<div class="panel">
<h1>Services List</h1>
<table>
    <?php foreach ($list as $service) { ?>
        <tr>
            <form method="POST" action="<?= base_url('main/updateService'); ?>">
                <td><input type="hidden" name="id" value="<?= $service['id']; ?>"><b><?= $service['name']; ?></b></td>
                <td><input type="checkbox" name="has_wash" value="true" <?= ($service['has_wash'] == 'true') ? "checked='checked'" : "unchecked='unchecked'"; ?>></td>
                <td><input type="number" name="wash_price" placeholder="<?= $service['wash_price']; ?>" value="<?= $service['wash_price']; ?>"></td>
                <td><input type="checkbox" name="has_dry" value="true" <?= ($service['has_dry'] == 'true') ? "checked='checked'" : "unchecked='unchecked'"; ?>></td>
                <td><input type="number" name="dry_price" placeholder="<?= $service['dry_price']; ?>" value="<?= $service['dry_price']; ?>"></td>
                <td><input type="submit" value="UPDATE SERVICE"></td>
            </form>
            <form action="<?= base_url('main/delete/service/' . $service['id']) ?>" method="POST">
                <td><input type="submit" value="DELETE"></td>
            </form>
        </tr>
    <?php } ?>
</table></div>