<div class="panel">
    <h3 class="add">EMPLOYEE LIST</h3>
    <?php foreach ($list as $employee) { ?>
    <div class="employee_record">
        <form class="update_form" method="POST" action="<?= base_url('main/updateEmployee'); ?>">
            <input type="hidden" name="id" value="<?= $employee['id']; ?>">
            <h3 class="ename">
                <?= $employee['name']; ?>
            </h3>
            <h4 class="uname">@ <?= $employee['username']; ?>
            </h4>
            <div class="salary">SALARY: <input class="input" type="number" name="salary"
                    placeholder="<?= $employee['salary']; ?>" value="<?= $employee['salary']; ?>"></div>
            <div class="served">CUSTOMER SERVED: <?= $employee['customer_served']; ?>
            </div>
            <input class="update_data" type="submit" value="UPDATE EMPLOYEE DATA">
        </form>
        <form class="delete_form" action="<?= base_url('main/delete/employee/' . $employee['id']) ?>" method="POST">
            <input class="delete_data" type="submit" value="DELETE">
        </form>
    </div>
    <?php } ?>
</div>

<style>
    .add {
        margin-top: 50px;
        text-align: center;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        color: white;
    }

    .employee_record {
        width: 90%;
        background: #0099ff;
        margin: 20px;
        border-radius: 10px;
        border: 3px solid white;
        display: flex;
        flex-direction: row;
        align-items: flex-end;
    }

    .update_form {
        flex-direction: column;
        align-items: flex-end;
        height: 100%;
        width: 100%;
    }

    .delete_form {
        width: fit-content;
        display: flex;
        align-items: flex-end;
    }

    .ename {
        color: white;
        font-family: 'Arial', sans-serif;
        margin-left: 10px;
        margin-top: 5px;
        margin-bottom: 0px;
    }

    .uname {
        margin-top: 3px;
        margin-left: 10px;
        font-style: italic;
        font-family: Arial, Helvetica, sans-serif;
        color: white;
        margin-bottom: 5px;
    }

    .salary {
        margin-left: 10px;
        margin-top: 30px;
        color: white;
        font-family: Arial, Helvetica, sans-serif;
        margin-bottom: 10px;
    }

    .served {
        margin-left: 10px;
        color: white;
        font-family: Arial, Helvetica, sans-serif;
        margin-bottom: 10px;
    }

    .delete_data {
        background-color: transparent;
        border-radius: 10px;
        color: red;
        border-color: red;
        padding: 10px;
        margin-bottom: 5px;
        margin-right: 20px;
    }

    .update_data {
        background-color: transparent;
        border-radius: 10px;
        color: white;
        border-color: white;
        padding: 10px;
        margin-left: 20px;
        margin-bottom: 5px;
    }

    .input {
        border-radius: 10px;
        border: 3px solid white;
        background: transparent;
        padding: 15px 10px;
        width: 50%;
        margin: auto;
        left: 0px;
        right: 0px;
        color: white;
    }
</style>