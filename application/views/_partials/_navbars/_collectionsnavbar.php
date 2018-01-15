<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
    <a class="navbar-brand" href="<?php echo base_url(); ?>collections/home">Aimex</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link"><?php echo $username; ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>pages/logout">Logout</a>
            </li>
        </ul>
    </div>
</nav>