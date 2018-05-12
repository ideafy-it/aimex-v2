<div class="container">
	<?php
	    if(isset($loan_data)) {
	        if($loan_data->num_rows() > 0) {
	            foreach ($loan_data->result() as $row) {
	?>
	<div class="card">
            <div class="card-header">
                <div class="row">
                    <span class="col-7"><h5><?php echo $row->clientFirstName ." ". $row->clientLastName; ?></h5></span>
                </div>
            </div>
            <div class="card-body row">
                <div class="col-6">
                    <p class="card-text">Loan Type: <?php echo $row->loanType; ?></p>
                    <p class="card-text">Loan Kind: <?php echo $row->loanKind; ?></p>
                </div>
                <div class="col-6">
                    <p class="card-text">Loan Terms: <?php echo $row->loanTerms; ?></p>
                    <p class="card-text">Monthly Payment: <?php echo $row->monthlyPayment; ?></p>
                </div>
            </div>
        </div>

      <br><br>
	
	<div>
		<div class="card-body row">
			<div class="col-6">
				<p class="card-text">Loan Amount </p>
			</div>
			 <div class="col-6">
				<p class="card-text"><?php echo $row->monthlyPayment * $row->loanTerms ;?></p>
			</div>
		</div>
	</div>
	<?php } ?>

</div>