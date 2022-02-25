<?php 
	if(isset($_POST['submit'])){
		$logUser = new UserController();
		$logUser->log();
	}
?>

<style>
    .container{
        padding-top: 250px;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="accueil" class="btn btn-sm btn-primary mr-2 mt-1">
                        <i class="fas fa-home"></i> Accueil
                    </a>
                </li>
                </li>
                <li class="nav-item">
                    <a href="<?php echo BASE_URL; ?>add" class="btn btn-sm btn-primary mr-2 mt-1 ms-2">
                        <i class="fas fa-plus"></i> Ajouter 
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL;?>dashadmin">Passerelle d'administration</a>
                </li> -->
                <li class="nav-item dropdown">
                    <a class="nav-link" href="<?php echo BASE_URL;?>dashadmin">Passerelle d'administration</a>


                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL;?>reserve"> Vos réservations</a>
                </li>

            </ul>
            <form class="d-flex float-start me-4">
                <input class="form  me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary" type="submit" name="search"><i
                        class="fas fa-search"></i></button>
            </form>
            <div class=" float-end mt-2">


               

            </div>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row my-4">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header bg-primary background-btn">
                    <h3 class="text-center text-white"><i class="fa fa-sign-in-alt"></i> Login</h3>
                </div>
                <div class="card-body bg-light">
                    <form method="post" class="me-2">
                        <div class="form-group">
                            <input type="text" name="username" placeholder="Username" class="form-control m-2">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Password" class="form-control m-2">
                        </div>
                        <button name="submit" class="btn btn btn-primary m-2">Login</button>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="<?php echo BASE_URL;?>register" class="btn btn-link">Register</a>
                </div>
            </div>
        </div>
    </div>
</div>