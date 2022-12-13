<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
    <script src="<?= base_url('assets/script.js') ?>"></script>
    <title>Affordawash: Website</title>
    <style>
        body {

            background-repeat: no-repeat;
            background-position: top center;
            height: 100%;
            width: 100%;
            margin: 0;
        }
    </style>
</head>

<body>
    <div id="nav">
        <?php if (isset($_SESSION['user_data'])) { ?>
            <form class="nav" action="<?= base_url('main/viewCustomerTransact') ?>" method="post"><input type="submit" value="VIEW CUSTOMER TRANSACTION LIST"></form>
            <form class="nav" action="<?= base_url('main/profile') ?>" method="post"><input type="submit" value="PROFILE"></form>
            <form class="nav" action="<?= base_url('main/changePass') ?>" method="post"><input type="submit" value="CHANGE PASSWORD"></form>
            <form class="nav" action="<?= base_url('main/about') ?>" method="post"><input type="submit" value="ABOUT US"></form>
            <form class="nav" action="<?= base_url('main/logout') ?>" method="post"><input type="submit" value="LOGOUT"></form>
        <?php } ?>
    </div>