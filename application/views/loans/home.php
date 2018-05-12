<br>
<div class="container">
<?php
    if(isset($user_data)) {
        if($user_data->num_rows() > 0) {
            foreach ($user_data->result() as $row) {
?>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <span class="col-7"><h5><?php echo $row->clientFirstName ." ". $row->clientLastName; ?></h5></span>
                    <span class="col-5 text-center">
                        <a href="<?php echo base_url(); ?>loans/addNewLoan/<?php echo $row->id; ?>" class="col-1">New</a>|
                        <a href="<?php echo base_url(); ?>loans/addRenewLoan/<?php echo $row->id; ?>" class="col-1">Renewal</a>|
                        <a href="<?php echo base_url(); ?>loans/addExtensionLoan/<?php echo $row->id; ?>" class="col-1">Extension</a>|
                        <a href="<?php echo base_url(); ?>loans/addAdditionalLoan/<?php echo $row->id; ?>" class="col-2">Additional</a>
                    </span>
                </div>
            </div>
            <div class="card-body row">
                <div class="col-6">
                    <p class="card-text">Birth Date: <?php echo $row->birthDate; ?></p>
                    <p class="card-text">Client Address: <?php echo $row->clientAddress; ?></p>
                    <p class="card-text">Contact Number: <?php echo $row->contactNumber; ?></p>
                    <p class="card-text">Bank: <?php echo $row->bank; ?></p>
                </div>
                <div class="col-6">
                    <p class="card-text">Pension Type: <?php echo $row->pensionType; ?></p>
                    <p class="card-text">Pension Number: <?php echo $row->pensionNumber; ?></p>
                    <p class="card-text">Withdrawal Date: <?php echo $row->withdrawalDate; ?></p>
                    <p class="card-text">Branch: <?php echo $row->branch; ?></p>
                </div>
            </div>
        </div>
<?php
        } 
    } else {
        redirect(base_url().'clients/home');
    }
}
?>
</div>