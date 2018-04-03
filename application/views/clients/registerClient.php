<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">New Client Application Page</h1>
        <hr class="my-4">
        <p class="lead">Please input the basic information needed</p>
    </div>
</div>

<div class="container">
    <form action="<?php echo base_url(); ?>clients/function/client_validation" method="post" enctype="multipart/form-data" class="toValidate">
        <div class="card-group">
                <div class="card">
                    <div class="card-header">Basic Information</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="ClientFirstName">Enter First Name</label>
                            <input type="text" name="clientFirstName" id="ClientFirstName" class="form-control <?php if(form_error('clientFirstName')){echo 'is-invalid';}?>" value="<?php echo set_value('clientFirstName'); ?>">
                            <span class="invalid-feedback"><?php echo form_error('clientFirstName'); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="ClientLastName">Enter Last Name</label>
                            <input type="text" name="clientLastName" id="ClientLastName" class="form-control <?php if(form_error('clientLastName')){echo 'is-invalid';}?>" value="<?php echo set_value('clientLastName'); ?>">
                            <span class="invalid-feedback"><?php echo form_error('clientLastName'); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="ClientPhoto">Upload Image</label>
                            <input type="file" name="clientPhoto" id="ClientPhoto" class="form-control-file <?php if(form_error('clientPhoto')){echo 'is-invalid';}?>" accept=".jpeg, .jpg, .png, .gif" value="<?php echo set_value('clientPhoto'); ?>">
                            <span class="invalid-feedback"><?php echo form_error('image'); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="Bank">Bank</label>
                            <select name="bank" id="Bank" class="form-control">
                                <option value="BPI">BPI - Bank of the Philippine Islands</option>
                                <option value="LBP">LBP - Land Bank of the Philippines</option>
                                <option value="UCPB">UCPB - United Coconut Planters Bank</option>
                                <option value="MetroBank">MetroBank - Metropolitan Bank and Trust Company</option>
                                <option value="Bank of Commerce">Bank of Commerce</option>
                                <option value="ChinaBank">ChinaBank - China Banking Corporation </option>
                                <option value="UBP">UBP - UnionBank of the Philippines</option>
                                <option value="Porac Bank">Porac Bank</option>
                                <option value="RCBC">RCBC - Rizal Commercial Banking Corporation</option>
                                <option value="Security Bank">Security Bank - Security Banking Corporation</option>
                                <option value="PNB">PNB - Philippine National Bank</option>
                                <option value="BDO">BDO - BDO Unibank</option>
                                <option value="PS Bank">PS Bank - Philippine Savings Bank</option>
                                <option value="Maybank">Maybank - Maybank Philippines Inc.</option>
                                <option value="Others">Others - Please Enter your Bank</option>
                            </select>
                        </div>
                        <div class="form-group" id="Others">
                            <label for="Others">Please enter your bank</label>
                            <input type="text" name="others" id="Others" class="form-control" value="<?php echo set_value('others'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="Branch">Branch</label>
                            <input type="text" name="branch" id="Branch" class="form-control <?php if(form_error('branch')){echo 'is-invalid';}?>" value="<?php echo set_value('branch'); ?>">
                            <span class="invalid-feedback"><?php echo form_error('branch'); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="PensionType">Enter Pension Type</label>
                            <select name="pensionType" id="PensionType" class="form-control">
                                <option value="SSS">SSS</option>
                                <option value="GSIS">GSIS</option>
                                <option value="PVAO">PVAO</option>
                                <option value="Foreign">Foreign</option>
                                <option value="Salary">Salary</option>
                                <option value="Double Check">Double Check</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="PensionNumber">Pension Number</label>
                            <input type="text" name="pensionNumber" id="PensionNumber" class="form-control <?php if(form_error('pensionNumber')){echo 'is-invalid';}?>" value="<?php echo set_value('pensionNumber'); ?>">
                            <span class="invalid-feedback"><?php echo form_error('pensionNumber'); ?></span>
                        </div>
                    </div>
                </div>
            <!-- End of First Column - Basic Client Information -->
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="Asof">As of</label>
                            <input type="date" name="asOf" id="Asof" class="form-control <?php if(form_error('asOf')){echo 'is-invalid';}?>" value="<?php echo set_value('asOf'); ?>">
                            <span class="invalid-feedback"><?php echo form_error('asOf'); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="WithdrawalDate">Withdrwal Date</label>
                            <input type="date" name="withdrawalDate" id="WithdrawalDate" class="form-control <?php if(form_error('withdrawalDate')){echo 'is-invalid';}?>" value="<?php echo set_value('withdrawalDate'); ?>">
                            <span class="invalid-feedback"><?php echo form_error('withdrawal'); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="BirthDate">Birth Date</label>
                            <input type="date" name="birthDate" id="BirthDate" class="form-control <?php if(form_error('birthDate')){echo 'is-invalid';}?>" value="<?php echo set_value('birthDate'); ?>">
                            <span class="invalid-feedback"><?php echo form_error('birthdate'); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="ClientAddress">Address</label>
                            <input type="text" name="clientAddress" id="ClientAddress" class="form-control <?php if(form_error('clientAddress')){echo 'is-invalid';}?>" value="<?php echo set_value('clientAddress'); ?>">
                            <span class="invalid-feedback"><?php echo form_error('cliendAddress'); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="ContactNumber">Contact Number</label>
                            <input type="text" name="contactNumber" id="ContactNumber" class="form-control <?php if(form_error('contactNumber')){echo 'is-invalid';}?>" value="<?php echo set_value('contactNumber'); ?>">
                            <span class="invalid-feedback"><?php echo form_error('contactNumber'); ?></span>
                        </div> 
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input type="radio" name="hasSpouse" id="HasSpouse" class="form-check-input" value="y" <?php echo set_radio('hasSpouse', 'y', true); ?>>
                                <label for="HasSpouse" class="form-check-label">Has Spouse</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="hasSpouse" id="HasNoSpouse" class="form-check-input" value="n" <?php echo set_radio('hasSpouse', 'n'); ?>>
                                <label for="HasNoSpouse" class="form-check-label">No Spouse</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="SpouseName">Spouse Name</label>
                            <input type="text" name="spouseName" id="SpouseName" class="form-control <?php if(form_error('spouseName')){echo 'is-invalid';}?>" value="<?php echo set_value('spouseName'); ?>" <?php if($this->input->post('hasSpouse') == 'n') { echo "disabled"; }?>>
                            <span class="invalid-feedback"><?php echo form_error('spouseName'); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="SpouseBirthDate">Spouse Birthdate</label>
                            <input type="date" name="spouseBirthDate" id="SpouseBirthDate" class="form-control <?php if(form_error('spouseBirthDate')){echo 'is-invalid';}?>" value="<?php echo set_value('spouseBirthDate'); ?>" <?php if($this->input->post('hasSpouse') == 'n') { echo "disabled"; }?>>
                            <span class="invalid-feedback"><?php echo form_error('spouseBirthDate'); ?></span>
                        </div>
                    </div>
                </div>
            <!-- End of Second Column - Basic Client Infomation -->
        </div>
        <!-- End of Card Group - Basic Client Information -->
        <br/>
        <div class="card-group">
            <div class="card">
                <div class="card-header">CoMaker Information</div>
                <div class="card-body">
                   <div class="form-group">
                       <label for="CoMakerName">CoMaker Name</label>
                       <input type="text" class="form-control <?php if(form_error('coMakerName')){echo 'is-invalid';}?>" name="coMakerName" id="CoMakerName" value="<?php echo set_value('coMakerName'); ?>">
                       <span class="invalid-feedback"><?php echo form_error('coMakerName'); ?></span>
                   </div>
                   <div class="form-group">
                       <label for="CoMakerAddress">CoMaker Address</label>
                       <input type="text" class="form-control <?php if(form_error('coMakerAddress')){echo 'is-invalid';}?>" name="coMakerAddress" id="CoMakerAddress" value="<?php echo set_value('coMakerAddress'); ?>">
                       <span class="invalid-feedback"><?php echo form_error('coMakerAddress'); ?></span>
                   </div>
                   <div class="form-group">
                       <label for="CoMakerContact">CoMaker Contact Number</label>
                       <input type="text"class="form-control <?php if(form_error('coMakerContact')){echo 'is-invalid';}?>" name="coMakerContact" id="CoMakerContact" value="<?php echo set_value('coMakerContact'); ?>">
                       <span class="invalid-feedback"><?php echo form_error('coMakerContact'); ?></span>
                   </div>
                   <div class="form-group">
                       <label for="CoMakerRelation">CoMaker Relation</label>
                       <input type="text"class="form-control <?php if(form_error('coMakerRelation')){echo 'is-invalid';}?>" name="coMakerRelation" id="CoMakerRelation" value="<?php echo set_value('coMakerRelation'); ?>">
                       <span class="invalid-feedback"><?php echo form_error('coMakerRelation'); ?></span>
                   </div> 
                </div>
            </div>
            <!-- End of First Column - CoMaker -->
            <div class="card">
                <div class="card-header">Personal Reference</div>
                <div class="card-body">
                   <div class="form-group">
                       <label for="RefenrenceName">Reference Name</label>
                       <input type="text" name="referenceName" id="ReferenceName" class="form-control <?php if(form_error('referenceName')){echo 'is-invalid';}?>" value="<?php echo set_value('referenceName'); ?>">
                       <span class="invalid-feedback"><?php echo form_error('referenceName'); ?></span>
                   </div>
                   <div class="form-group">
                       <label for="ReferenceAddress">Reference Address</label>
                       <input type="text" name="referenceAddress" id="ReferenceAddress" class="form-control <?php if(form_error('referenceAddress')){echo 'is-invalid';}?>" value="<?php echo set_value('referenceAddress'); ?>">
                       <span class="invalid-feedback"><?php echo form_error('referenceAddress'); ?></span>
                   </div>
                   <div class="form-group">
                       <label for="ReferenceContact">Reference Contact</label>
                       <input type="text" name="referenceContact" id="ReferenceContact" class="form-control <?php if(form_error('referenceContact')){echo 'is-invalid';}?>" value="<?php echo set_value('referenceContact'); ?>">
                       <span class="invalid-feedback"><?php echo form_error('referenceContact'); ?></span>
                   </div>
                   <div class="form-group">
                       <label for="RefenceRelation">Reference Relation</label>
                       <input type="text" name="referenceRelation" id="ReferenceRelation" class="form-control <?php if(form_error('referenceRelation')){echo 'is-invalid';}?>" value="<?php echo set_value('referenceRelation'); ?>">
                       <span class="invalid-feedback"><?php echo form_error('referenceRelation'); ?></span>
                   </div> 
                </div>
            </div>
            <!-- End of Second Column - Personal Reference -->
        </div>
        <!-- End of Card Group - CoMaker and Personal Reference-->
        <br/>
        <div class="card-group">
            <div class="card">
                <div class="card-header">Employment Details</div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Employment Type</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="employmentType" id="Employed" class="form-check-input" value="Employed" <?php echo set_radio('employmentType', 'Employed', true); ?>>
                            <label for="Employed" class="form-check-label">Employed</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="employmentType" id="SelfEmployed" class="form-check-input" value="Self Employed" <?php echo set_radio('employmentType', 'Self Employed'); ?>>
                            <label for="SelfEmployed" class="form-check-label">Self Employed</label>
                        </div>
                    </div>
                    <div clss="form-group">
                        <label for="EmployerName">Employer's Name</label>
                        <input type="text" name="employerName" id="EmployerName" class="form-control <?php if(form_error('employerName')){echo 'is-invalid';}?>" value="<?php echo set_value('employerName'); ?>" <?php if($this->input->post('employment') == 'Self Employed') { echo disabled;} ?>>
                        <span class="invalid-feedback"><?php echo form_error('employerName'); ?></span>
                    </div>
                    <div class="form-group">
                        <label for="EmploymentAddress">Employer's Address</label>
                        <input type="text" name="employmentAddress" id="EmploymentAddress" class="form-control <?php if(form_error('employmentAddress')){echo 'is-invalid';}?>" value="<?php echo set_value('employmentAddress'); ?>">
                        <span class="invalid-feedback"><?php echo form_error('employmentAddress'); ?></span>
                    </div>
                    <div class="form-group">
                        <label for="Occupation">Occupation</label>
                        <input type="text" name="occupation" id="Occupation" class="form-control <?php if(form_error('occupation')){echo 'is-invalid';}?>" value="<?php echo set_value('occupation'); ?>">
                        <span class="invalid-feedback"><?php echo form_error('occupation'); ?></span>
                    </div>
                    <div class="form-group">
                        <label for="HomeType">Home Type</label>
                        <input type="text" name="homeType" id="HomeType" class="form-control <?php if(form_error('homeType')){echo 'is-invalid';}?>" value="<?php echo set_value('homeType'); ?>">
                        <span class="invalid-feedback"><?php echo form_error('homeType'); ?></span>
                    </div>
                    <div class="form-group">
                        <label for="MonthlyBill">Monthly Bill</label>
                        <input type="text" name="monthlyBill" id="MonthlyBill" class="form-control <?php if(form_error('monthlyBill')){echo 'is-invalid';}?>" value="<?php echo set_value('monthlyBill'); ?>">
                        <span class="invalid-feedback"><?php echo form_error('monthlyBill'); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Card Group - Employment Details -->
        <br>
        <div class="form-group">
            <input type="submit" class="btn btn-primary btn-lg btn-block" value="Enroll Client">
        </div>
    </form>
    <!-- End of Form Class -->
</div>