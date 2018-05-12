<div class="container">
	<?php
	    if(isset($loan_details)) {
	        if($loan_details->num_rows() > 0) {
	            foreach ($loan_details->result() as $row) {
	?>
	<div class="card">
            <div class="card-header">
                <div class="row">
                    <span class="col-7"><h5>Reference Number: <?php echo $row->referenceNumber; ?></h5></span>
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
				<p class="col-1">Interest</p>
				Unearned Interest 
				Service Charge 
				Notarial Fee </p>
			</div>
			 <div class="col-6">
				<p class="card-text"><?php $loanAmount = $row->monthlyPayment * $row->loanTerms; echo $loanAmount; ?></p>
				 <p class="card-text">
				 <?php echo $row->interest ;?> 
				 <?php  $fullinterest = $row->interest * $row->loanTerms;
				 echo $fullinterest;?>
				 <?php echo $row->serviceFee ;?> 
				 <?php echo $row->notarialFee ;?>
				</p> 
			</div>
			
		</div>
	</div>
	<?php } 
	} 
	else {
        redirect(base_url().'clients/home');
    }
}
?>

</div>