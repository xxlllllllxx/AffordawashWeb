<div class="login_panel">
    <div id="wrapper">
        <h1 class="title">ABOUT US</h1>
        <form action="<?= base_url('main/' . $_SESSION['user_data']['login']) ?>" method="post">
            <h4 class="names">ESTRELLA, DIERO RENEEL</h4>
            <h4 class="names">MASALLO, LEWIS DAVERIEL</h4>
            <h4 class="names">CALIM, ARWYN</h4>
            <h4 class="names">SANTOS, EONRICO</h4>
            <h4 class="names">SEGGUEP, CHRISTIAN</h4>
            <h4 class="names">BERNARDO JOHN LUIS</h4>
            <input id="btnOK" type="submit" value="OK">
        </form>
    </div>
</div>
<style>
    body {
        background-image: url("<?= base_url('assets/res/login.jpg') ?>");
    }

    .login_panel {
        display: flex;
        justify-content: center;
        align-items: center;

    }

    #wrapper {
        margin-top: 50px;
        text-align: center;
        background-color: rgba(0, 153, 255, .2);
        backdrop-filter: blur(6px);
        border: 2px solid #0000ff;
        padding: 50px 30px;

        border-radius: 10px;
    }

    .title {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 30px;
        margin-bottom: 50px;
        color: white;
        text-shadow: 3px 3px 10px #0033ff;

    }

    .names {
        color: white;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }

    #btnOK {
        font-family: 'Arial black', sans-serif;
        border: 3px solid #0099ff;
        background-color: transparent;
        border-radius: 10px;
        width: 100px;
        color: white;

    }
</style>