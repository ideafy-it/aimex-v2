<br>
<div class="container">
<?php
    if(isset($user_data)) {
        if($user_data->num_rows() > 0) {
            foreach ($user_data->result() as $row) {
?>
        <div class="card">
            <h5 class="card-header"><?php echo $row->clientFirstName ." ". $row->clientLastName; ?></h5>
            <div class="card-body row">
                <div class="col-5">
                    <p class="card-text">Birth Date: <?php echo $row->birthDate; ?></p>
                    <p class="card-text">Client Address: <?php echo $row->clientAddress; ?></p>
                    <p class="card-text">Contact Number: <?php echo $row->contactNumber; ?></p>
                    <p class="card-text">Bank: <?php echo $row->bank; ?></p>
                </div>
                <div class="col-5">
                    <p class="card-text">Pension Type: <?php echo $row->pensionType; ?></p>
                    <p class="card-text">Pension Number: <?php echo $row->pensionNumber; ?></p>
                    <p class="card-text">Withdrawal Date: <?php echo $row->withdrawalDate; ?></p>
                    <p class="card-text">Branch: <?php echo $row->branch; ?></p>
                </div>
                <div class="col-2">
                    <button class="btn btn-primary">Add New Loan</button>
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