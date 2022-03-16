<?php

if ($_SESSION['role'] == 0) {
    Redirect::to(BASE_URL);
}

if (isset($_POST['find'])) {
    $data = new FlightController();
    $flights = $data->findFlights();
} else {
    $data = new FlightController();
    $flights = $data->getAllFlights();
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a href="<?php echo BASE_URL;?>dashadmin" class="btn btn-sm btn-primary mr-2 mt-1 ms-2">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                </li>
                <li class="nav-item">
                <a href="<?php echo BASE_URL; ?>add" class="btn btn-sm btn-secondary m-2 mt-1">
                    <i class="fas fa-plus"></i> Ajouter un nouveau vol
                </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL;?>dashadmin">Passerelle d'administration</a>
                </li> -->
            </ul>
            <form class="d-flex float-start me-4">
                <input class="form  me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary" type="submit" name="search"><i
                        class="fas fa-search"></i></button>
            </form>
            <div class=" float-end mt-2">


                <a href="<?php echo BASE_URL;?>" title="" class="btn btn-sm btn-outline-primary mr-2 mb-2">
                    <i class="fas fa-user mr-2"> <?php echo $_SESSION['username'];?></i>
                </a>
                <a href="<?php echo BASE_URL;?>logout" title="Logout" class="btn btn-sm btn-outline-primary mb-2   ">
                    <i class="fas fa-user"></i> Logout
                </a>

            </div>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto"></div>
        <div class="card">
            <div class="card-body bg-light">

                <h2 class="mb-4"><i class="fa fa-user-shield"></i> Tableau de bord administrateur</h2>
                
              

                
                  

                </div>

                <div class="table-responsive">

                    <table class="table table-hover mt-4">
                        <thead>
                            <tr>
                                <th scope="col"><i class="fa fa-passport"></i> ID</th>
                                <th scope="col"><i class="fa fa-location-arrow"></i> Origine</th>
                                <th scope="col"><i class="fa fa-map-marked-alt"></i> Destination</th>
                                <th scope="col"><i class="fa fa-clock"></i> Temps de départ</th>
                                <th scope="col"><i class="fa fa-clock"></i>Temps de révision </th>
                                <th scope="col"><i class="fa fa-chair"></i> Places</th>
                                <th scope="col"><i class="fa fa-plane-departure"></i> Type de vol</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($flights as $flight) : ?>
                            <tr>
                                <th scope="row"><?php echo $flight['id']; ?></th>
                                <td><?php echo $flight['origin']; ?></td>
                                <td><?php echo $flight['destination']; ?></td>
                                <td><?php echo $flight['dep_time']; ?></td>
                                <td><?php echo $flight['return_time'] ?></td>
                                <td><?php echo $flight['seats']; ?></td>
                                <td>
                                    <?php echo $flight['flighttype'] == "One Way"
                                        ?
                                        '<h5><span class="badge bg-primary"><i class="fa fa-location-arrow"></i> One Way</span></h5>'
                                        :
                                        '<h5><span class="badge bg-secondary"><i class="fa fa-exchange-alt"></i> Round Trip</span></h5>'
                                    ?>
                                </td>
                                </td>
                                <td class="d-flex flex-row">
                                    <form method="post" class="me-2" action="update">
                                        <input type="hidden" name="id" value="<?php echo $flight['id']; ?>">
                                        <button class="btn btn btn-warning"><i
                                                class="la la-edit fa fa-edit"></i></button>
                                    </form>
                                    <form method="post" class="me-2" action="delete">
                                        <input type="hidden" name="id" value="<?php echo $flight['id']; ?>">
                                        <button class="btn btn btn-danger"><i
                                                class="fa fa-trash la la-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <a href="<?php echo BASE_URL;?>allres" class="btn btn-sm btn-primary mb-4" title="allres" > <i class="fas fa-plane"></i> Toutes les réservations</a>

                </div>

            </div>
           
        </div>
        
    </div>



</div>