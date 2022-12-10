<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/maincss.css') ?>">
    <title>Affordawash: Website</title>
</head>

<body>
    <?php if (isset($_SESSION['user_data'])) { ?>
        <form id="" class="transact button" action="<?= base_url('main/viewCustomerTransact') ?>" method="post"><input type="submit" value="VIEW CUSTOMER TRANSACTION LIST"></form>
        <form action="<?= base_url('main/profile') ?>" method="post"><input type="submit" value="PROFILE"></form>
        <form action="<?= base_url('main/changePass') ?>" method="post"><input type="submit" value="CHANGE PASSWORD"></form>
        <form action="<?= base_url('main/about') ?>" method="post"><input type="submit" value="ABOUT US"></form>
        <form action="<?= base_url('main/logout') ?>" method="post"><input type="submit" value="LOGOUT"></form>
    <?php } ?>