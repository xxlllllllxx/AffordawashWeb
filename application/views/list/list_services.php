<h1>Services List</h1>
<table>
    <?php foreach ($list as $service) { ?>
        <tr>
            <td><b><?= $service['name']; ?></b></td>
            <form action="#">
                <?php if ($service['has_wash'] == 'true') { ?>
                    <td><input type="checkbox" name="<?= $service['name']; ?>" checked="checked"></td>
                <?php } else { ?>
                    <td><input type="checkbox" name="<?= $service['name']; ?>" unchecked="unchecked"></td>
                <?php } ?>
                <td><input type="number" placeholder="<?= $service['wash_price']; ?>"></td>
                <?php if ($service['has_dry'] == 'true') { ?>
                    <td><input type="checkbox" name="<?= $service['name']; ?>" checked="checked"></td>
                <?php } else { ?>
                    <td><input type="checkbox" name="<?= $service['name']; ?>" unchecked="unchecked"></td>
                <?php } ?>
                <td><input type="number" placeholder="<?= $service['dry_price']; ?>"></td>
                <td><input type="submit" value="UPDATE SERVICE"></td>
                <td><input type="submit" value="DELETE SERVICE"></td>
            </form>
        </tr>
    <?php } ?>
</table>