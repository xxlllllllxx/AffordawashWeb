<h1>ADD EMPLOYEE</h1>
<form method="POST" action="<?= base_url('main/saveEmployee'); ?>">
    <input type="text" name="employee_name" placeholder="Enter Employee Name" required="required">
    <input type="text" name="employee_username" placeholder="Enter Employee Username" required="required">
    <input type="password" name="employee_password" placeholder="Enter Employee Password" required="required">
    <input type="number" name="employee_salary" placeholder="Enter Employee Salary" required="required">
    <input type="submit" value="ADD EMPLOYEE">
</form>