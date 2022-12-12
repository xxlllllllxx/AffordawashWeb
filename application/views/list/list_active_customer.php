<div class="active_customer">
    <?php foreach ($data as $info) { ?>
    <form action="<?= base_url('main/edit/') ?>" method="post">
        <?= $info['name'] ?>
            <input type="number" name="payment" value="<?=(isset($info['payment'])) ? $info['payment'] : 0 ?>">
            <input formaction="<?= base_url('main/editCustomer/' . $info['id']) ?>" type="submit" value="EDIT">
            <input formaction="<?= base_url('main/deleteCustomer/' . $info['id']) ?>" type="submit" value="DELETE">
            <input formaction="<?= base_url('main/completeTransact/' . $info['id']) ?>" type="submit"
                value="COMPLETE TRANSACTION">

            <br>
    </form>
    <?php } ?>
</div>

<style>
    .active_customer {
        background-color: #0099ff;
    }
</style>