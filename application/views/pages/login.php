<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Log in</h1>
        <hr class="my-4">
        <p class="lead">Welcome to the Aimex Loaning System</p>
    </div>
</div>

<div class="container">
    <div class="col-sm-10 col-sm-offset-1">
        <span class="text-danger"><?php echo $this->session->flashdata('error'); ?></span>
        <form method="post" action="<?php echo base_url();?>pages/login_validation">
            <div class="form-group">
                <label for="Username">Enter Username</label>
                <input type="text" name="username" id="Username" class="form-control" value="<?php echo set_value('username'); ?>">
                <span class="text-danger"><?php echo form_error('username'); ?></span>
            </div>
            <div class="form-group">
                <label for="Password">Enter Password</label>
                <input type="password" name="password" id="Password" class="form-control">
                <span class="text-danger"><?php echo form_error('password'); ?></span>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>