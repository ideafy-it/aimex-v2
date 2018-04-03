<div class="container">
    <h2>Register Page</h2>
        <form action="<?php echo base_url(); ?>pages/register_validation" method="post" class="toValidate">
        <div class="form-group">
            <label for="Employee_firstname">Enter First Name</label>
            <input type="text" name="employee_firstname" id="Employee_firstname" class="form-control" data-parsley-required data-parsley-maxlength="50">
            <span class="invalid-feedback"><?php echo form_error('employee_firstname'); ?></span>
        </div>
        <div class="form-group">
            <label for="Employee_lastname">Enter Last Name</label>
            <input type="text" name="employee_lastname" id="Employee_lastname" class="form-control" data-parsley-required data-parsley-maxlength="50">
            <span class="invalid-feedback"><?php echo form_error('employee_lastname'); ?></span>
        </div>
        <div class="form-group">
            <label for="Employee_username">Enter Username</label>
            <input type="text" name="employee_username" id="Employee_username" class="form-control" data-parsley-required data-parsley-maxlength="50">
            <span class="invalid-feedback"><?php echo form_error('employee_username'); ?></span>
        </div>
        <div class="form-group">
            <label for="Employee_password">Enter Password</label>
            <input type="password" name="employee_password" id="Employee_password" class="form-control" data-parsley-required data-parsley-minlength="8">
            <span class="invalid-feedback"><?php echo form_error('employee_password'); ?></span>
        </div>
        <div class="form-group">
            <label for="Confirm_password">Enter Password Again</label>
            <input type="password" name="confirm_password" id="Confirm_password" class="form-control" data-parsley-required data-parsley-minlength="8" data-parsley-equalto="#Employee_password">
            <span class="invalid-feedback"><?php echo form_error('confirm_password'); ?></span>
        </div>
        <div class="form-group">
            <label for="Employee_position">Select Position</label>
            <select name="employee_position" id="Employee_position" class="form-control">
                <option value="Loans Processor">Loans Processor</option>
                <option value="Loans Collector">Loans Collector</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>
</form>   
</div>
