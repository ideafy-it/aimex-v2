<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
    <a class="navbar-brand" href="<?php echo base_url(); ?>clients/home">Aimex</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownClients" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Clients                
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownClients">
                    <a href="<?php echo base_url(); ?>clients/home" class="dropdown-item">Clients Application</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownLoans" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Loans                
                </a> 
                <div class="dropdown-menu" aria-labelledby="navbarDropdownLoans">
                    <a href="<?php echo base_url(); ?>loans/home" class="dropdown-item">Loans</a>
                </div>
            </li>
            <?php if($role == "Manager") { ?>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownCollections" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Collections                
                </a> 
                <div class="dropdown-menu" aria-labelledby="navbarDropdownCollections">
                    <a href="<?php echo base_url(); ?>collections/home" class="dropdown-item">Collection</a>
                </div>
            </li>
            <?php } ?>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownUser" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $name; ?>
                </a> 
                <div class="dropdown-menu" aria-labelledby="navbarDropdownUser">
                    <a href="<?php echo base_url(); ?>pages/logout" class="dropdown-item">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>