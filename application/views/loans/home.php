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
        <div style="overflow-y: scroll; height:200px;">
        <table class = "table">
                <tr>
                <th>Reference Number</th>
                <th>Loan Type</th>
                <th>Loan Kind</th>
                <th>Loan Amount</th>
                <th>Monthly Payment</th>
                <th>Payment Terms</th>
                </tr>
<?php
        };
        foreach ($loan_data->result() as $row) {
?>
                <tr>
                <td><a href="<?php echo base_url();?>loans/Loandetails/<?php echo $row->id ?>"><?php echo $row->referenceNumber; ?></a></td>
                <td><?php echo $row->loanType; ?></td>
                <td><?php echo $row->loanKind; ?></td>
                <td><?php echo $row->monthlyPayment * $row->loanTerms; ?></td>
                <td><?php echo $row->monthlyPayment; ?></td>
                <td><?php echo $row->loanTerms; ?></td>
                </tr>          
<?php
        }
?>
        </table>
<?php
    } else {
        redirect(base_url().'clients/home');
    }
}
?>
</div>
</div>