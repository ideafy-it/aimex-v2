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
			</div>
			 <div class="col-6">
			 	<?php
			 		$loanAmount = $row->monthlyPayment * $row->$availMonths;
		            $rm = $row->remainingMonths * 2;
		            $newmonth = $rm + $availMonths;
		            $fullinterest = $newmonth * $row->interest;
		            $fullcash = $loanAmount * $fullinterest;
		            $withoutded =  $loanAmount - $fullcash;
		            $deductions = $row->serviceFee + $row->notarialFee;
		            $cashout = $withoutded - $deductions;
		           ?>
				<p class="card-text">
					<?php echo $loanAmount; ?></p>
				</p> 
			</div>
		</div>
		<table class = "table">
	             <tr>
	                <th>Interest</th>
	                <th>Service Charge</th>
	                <th>Notarial Fee</th>
                </tr>
                <tr>
	                <td><?php echo $row->interest; ?></td>
	                <td><?php echo $row->serviceFee; ?></td>
	                <td><?php echo $row->notarialFee; ?></td>
               	</tr>
            
            </table>
         <div class="card-body row">
			<div class="col-6">
				<p class="card-text">Cashout </p>
			</div>
			<div class="col-6">
				<p class="card-text"><?php echo $cashout; ?></p>
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