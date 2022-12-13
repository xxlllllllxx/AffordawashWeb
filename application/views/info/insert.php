<div class="info-container">
    <form method="POST" action="<?= base_url('main/' . $_SESSION['user_data']['login']) ?>">
        <input type="submit" class="xmark" value="" alt="">
    </form>
    <h3 id="info">
        <?= $text ?>
    </h3>
</div>

<style>
    .info-container {
        position: fixed;
        display: flex;
        flex-direction: row;
        bottom: 20px;
        left: 20px;
        background-color: #0099ff;
        align-items: center;
        padding-right: 30px;
        border-radius: 10px;
        border: 3px solid white;
    }

    .xmark {
        background: url("<?= base_url('assets/res/close.png') ?>");
        height: 45px;
        width: 45px;
        border: 0px solid transparent;
        margin-right: 10px;
    }

    #info {
        color: white;
        margin: 0px;
        display: inline-block;
        font-size: 18px;
        text-align: right;
    }
</style>

<script>
    var header = document.querySelector("#info");
    header.innerHTML = header.innerHTML.toUpperCase();
</script>