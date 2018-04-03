<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Client Search</h1>
        <hr class="my-4">
        <p class="lead">Insert the data needed to search the Client</p>
    </div>
</div>

<div class="container">
    <div class="d-flex justify-content-center">
        <form action="<?php echo base_url(); ?>clients/home" method="post" class="form-inline">
            <div class="form-group">
                <label for="Filter">Filter by:</label>
                &nbsp;
                <select name="filter" id="Filter" class="form-control">
                    <option value='clientFirstName'>First Name</option>
                    <option value='clientLastName'>Last Name</option>
                    <option value="pensionType">Pension Type</option>
                </select>
            </div>
            &nbsp;
            <div class="form-group">
                <label for="Search">Search: </label>
                &nbsp;
                <input type="text" name="search" id="Search" class="form-control">
            </div>
            &nbsp;
            <input type="submit" value="Search" class="btn btn-primary">
        </form>
    </div>
    <br>
    <div style="overflow-y: scroll; height:200px;">
    <table class="table">
        <thead>
            <tr>
                <th>Client ID</th>
                <th>Full Name</th>
                <th>Client Number</th>
                <th>Pension Type</th>
                <th>Pension Number</th>
                <th>Action</th>
            </tr>
        </thead>
     <tbody>
        <?php 
        if(isset($searched)){
            if($searched->num_rows() > 0) {
                foreach($searched->result() as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row->id; ?></td>
                        <td><?php echo $row->clientFirstName ." ". $row->clientLastName; ?></td>
                        <td><?php echo $row->contactNumber; ?></td>
                        <td><?php echo $row->pensionType; ?></td>
                        <td><?php echo $row->pensionNumber; ?></td>
                        <td><a href="<?php echo base_url(); ?>loans/home">Check Loans</a></td>
                    </tr>
                    <?php
                }
            } else {
        ?>
                <tr>
                    <td class="col">No Data Found</td>
                </tr>
        <?php
            }
        } else {
            if($view_clients->num_rows() > 0){
                foreach($view_clients->result() as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row->id; ?></td>
                        <td><?php echo $row->clientFirstName ." ". $row->clientLastName; ?></td>
                        <td><?php echo $row->contactNumber; ?></td>
                        <td><?php echo $row->pensionType; ?></td>
                        <td><?php echo $row->pensionNumber; ?></td>
                        <td><a href="<?php echo base_url(); ?>loans/home">Check Loans</a></td>
                    </tr> 
                    <?php
                }
            }
        }
        ?>
        </tbody>
    </table>
    </div>
</div>
