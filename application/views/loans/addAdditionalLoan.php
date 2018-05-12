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
<br>
<div class="card">
    <h5 class="card-header">Additional Loan</h5>
    <div class="card-body">
        <form action="<?php echo base_url();?>loans/function/loan_validation" method="post">
            <div class="row col-12">
                <div class="col-6">
                    <div class="form-group">
                        <label for="LoanType">Loan Type</label>
                        <select name="loanType" id="LoanType" class="form-control">
                            <option value="SSS">SSS</option>
                            <option value="GSIS ">GSIS</option>
                            <option value="PVAO">PVAO</option>
                            <option value="Foreign">Foreign</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="PaymentTerms">Payment Terms (In Months)</label>
                        <input type="number" name="paymentTerms" id="PaymentTerms" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="InterestRate">Interest Rate</label>
                        <select name="interestRate" id="InterestRate" class="form-control">
                            <option value="0.015">1.5%</option>
                            <option value="0.0175">1.75%</option>
                            <option value="0.02">2%</option>
                            <option value="0.025">2.5%</option>
                            <option value="0.03">2%</option>
                            <option value="0.035">3.5%</option>
                            <option value="0.4">4%</option>
                            <option value="0.045">4.5%</option>
                            <option value="0.5">5%</option>
                            <option value="0.6">6%</option>
                            <option value="0.7">7%</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ServiceCharge">Service Charge</label>
                        <select name="serviceCharge" id="ServiceCharge" class="form-control">
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="150">150</option>
                            <option value="200">200</option>
                            <option value="250">250</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="NotarialFee">Notarial Fee</label>
                        <select name="notarialFee" id="NotarialFee" class="form-control">
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="150">150</option>
                            <option value="200">200</option>
                            <option value="250">250</option>
                            <option value="500">500</option>
                            <option value="550">550</option>
                            <option value="1000">1000</option>
                            <option value="1500">1500</option>
                            <option value="2000">2000</option>
                            <option value="2500">2500</option>
                            <option value="3000">3000</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="LoanAmountToAdd">Loan Amount To Add</label>
                        <input type="number" name="loanAmountToAdd" id="LoanAmountToAdd" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                <div class="form-group">
                        <label for="MonthlyPayment">Monthly Payment</label>
                        <input type="number" name="monthlyPayment" id="MonthlyPayment" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="PaymentSchedule">Payment Schedule</label>
                        <select name="paymentSchedule" id="PaymentSchedule" class="form-control">
                            <option value="Monthly">Monthly</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ReleaseDate">Release Date</label>
                        <input type="date" name="releaseDate" id="ReleaseDate" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="EffectiveDate">Effective Date</label>
                        <input type="date" name="effectiveDate" id="EffectiveDate" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="ReferenceCheck">Reference Check</label>
                        <input type="text" name="referenceCheck" id="ReferenceCheck" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="PostAccount">Post to Account</label>
                        <input type="text" name="postAccount" id="PostAccount" class="form-control">
                    </div>
                    
                </div>
            </div> 
            <div class="form-group col-1 offset-11">
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>        
        </form>
    </div>
</div>
</div>