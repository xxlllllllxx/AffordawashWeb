<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
    <script>
        function clickRed(e) {
            e.style.backgroundColor = 'red';
            console.log('hello')
        }

        window.onload = (event) => {
            console.log("page is fully loaded");
        };
    </script>
    <title>Affordawash: Website</title>
    <style>
        body {
            background-repeat: no-repeat;
            background-size: cover;
            background-position: top center;
            margin: 0;
        }

        div.panel {
            position: absolute;
            top: 60px;
            bottom: 10px;
            right: 10px;
            max-width: 40%;
            background-color: rgba(0, 153, 255, .1);
            height: auto;
            width: 40%;
            min-width: 400px;
            border: 3px solid #ffffff;
            overflow: scroll;
            backdrop-filter: blur(6px);
        }

        ::placeholder {
            color: white;
        }

        .pointer {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div id="nav">
        <?php if (isset($_SESSION['user_data'])) { ?>
            <form class="nav pointer pointer" action="<?= base_url('main/viewCustomerTransact') ?>" method="post"><input type="submit" value="VIEW CUSTOMER TRANSACTION LIST"></form>
            <form class="nav pointer" action="<?= base_url('main/profile') ?>" method="post"><input type="submit" value="PROFILE"></form>
            <form class="nav pointer" action="<?= base_url('main/changePass') ?>" method="post"><input type="submit" value="CHANGE PASSWORD"></form>
            <form class="nav pointer" action="<?= base_url('main/about') ?>" method="post"><input type="submit" value="ABOUT US"></form>
            <form class="nav pointer" action="<?= base_url('main/logout') ?>" method="post"><input type="submit" value="LOGOUT"></form>
        <?php } ?>
    </div>