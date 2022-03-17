<?php
if(isset($_POST['find'])){
    $data = new FlightController();
    $flight=$data->findflights();
}   else{
    $data = new FlightController();
    $flight=$data->getAllFlights();
}

    if(isset($_POST['reserve'])){
        $data = new FlightController();
        $flights = $data->reserveFlight();
    } 
    $data = new FlightController();
    $flights = $data->getAllFlights();
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
                    <a href="<?php echo BASE_URL;?>home" class="btn btn-sm btn-primary mr-2 mt-1">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                </li>
                <li class="nav-item dropdown">
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


                <a href="" title="" class="btn btn-sm btn-outline-primary mr-2 mb-2">
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
        <div class="col-md-10 mx-auto">
            <?php // include('./views/includes/alerts.php');?>
            <div class="card">
            <?php include('./views/includes/alerts.php'); ?>
                <div class="card-body bg-light">
                    <div class="table-responsive">
                        <table class="table table-hover ">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"><i class="fa fa-plane-departure"></i> Origine</th>
                                    <th scope="col"><i class="fa fa-map-marked-alt"></i> Destination</th>
                                    <th scope="col"><i class="fa fa-clock"></i> Heure de départ</th>
                                    <th scope="col"><i class="fa fa-clock"></i> Heure de retour</th>
                                    <th scope="col"><i class="fa fa-chair "></i> Places</th>
                                    <th scope="col"><i class="fa fa-location-arrow"></i> Type de vol</th>
                                    <th scope="col">Reserver</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($flights as $flight) : ?>
                                <tr>
                                    <th></th>
                                    <th scope="row" hidden><?php echo $flight['id']; ?></th>
                                    <td><?php echo $flight['origin']; ?></td>
                                    <td><?php echo $flight['destination']; ?></td>
                                    <td><?php echo $flight['dep_time']; ?></td>
                                    <td><?php echo $flight['return_time']?></td>
                                    <td><?php echo $flight['seats']; ?></td>
                                    <td>
                                        <?php echo $flight['flighttype'] == "One Way"
                                        ?
                                        '<h5><span class="badge bg-primary"><i class="fa fa-location-arrow"></i> One Way</span></h5>'
                                        :
                                        '<h5><span class="badge bg-secondary"><i class="fa fa-exchange-alt"></i> Round Trip</span></h5>'
                                    ?>
                                    </td>
                                    <td class="d-flex flex-row">
                                        <form method="post"  class="me-2">
                                            <input type="text" hidden name="id" value="<?php echo $flight['id']; ?>">
                                            <input type="text" hidden name="origin"
                                                value="<?php echo $flight['origin']; ?>">
                                            <input type="text" hidden name="destination"
                                                value="<?php echo $flight['destination']; ?>">
                                            <input type="text" hidden name="dep_time"
                                                value="<?php echo $flight['dep_time']; ?>">
                                            <input type="text" hidden name="return_time"
                                                value="<?php echo $flight['return_time']; ?>">
                                            <input type="text" hidden name="flighttype"
                                                value="<?php echo $flight['flighttype']; ?>">
                                            <button class="btn btn btn-info" type="submit" name="reserve">
                                            <i class='fa fa-fighter-jet'></i> Réservez maintenant</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>