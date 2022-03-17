<?php
    if($_SESSION['role'] == 1){
        Redirect::to(BASE_URL); }
    
    if(isset($_POST['reserve'])){
        $data = new FlightController();
        $flights = $data->reserveFlight();
    }else{
        $data = new FlightController();
        $flights = $data->getAllreservations();
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
        <div class="col-md-8 mx-auto"></div>
        <div class="card">
            <?php include('./views/includes/alerts.php'); ?>
            <div class="table-responsive">
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"><i class="fa fa-location-arrow"></i> Origine</th>
                                <th scope="col"><i class="fa fa-map-marked-alt"></i> Destination</th>
                                <th scope="col"><i class="fa fa-clock"></i>Heure de départ</th>
                                <th scope="col"><i class="fa fa-plane-departure"></i> Type de vol</th>
                                <th scope="col"><i class='fa fa-user-plus'></i>passagère</th>
                                <th scope="col"><i class='fa fa-trash'></i> effacer reservation</th>
                                <th scope="col"><i class="fas fa-eye"></i> Voir les passager</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($flights as $flight) : ?>
                            <tr>
                                <td></td>
                                <td><?php echo $flight['origin']; ?></td>
                                <td><?php echo $flight['destination']; ?></td>
                                <td><?php echo $flight['dep_time']; ?></td>
                                <td>
                                    <?php echo $flight['flight_type'] == "One Way"
                                        ?
                                        '<h5><span class="badge bg-primary"><i class="fa fa-location-arrow"></i> One Way</span></h5>'
                                        :
                                        '<h5><span class="badge bg-secondary"><i class="fa fa-exchange-alt"></i> Round Trip</span></h5>'
                                    ?>
                                </td>
                                <td class="d-flex flex-row">
                                    <form method="post" class="me-2" action="addpassenger">
                                        <input type="hidden" name="id" value="<?php echo $flight['id']; ?>">
                                        <button class="btn btn btn-info  ms-4"><i class="fa fa-users"></i> <i
                                                class="fa fa-plus"></i></button>
                                    </form>
                                    <td>
                                    <form method="post" class="me-2" action="deleterev">
                                        <input type="text" hidden name="id" value="<?php echo $flight['id']; ?>">
                                        <button class="btn btn btn-danger ms-5"><i
                                                class="fa fa-trash la la-trash"></i></button>
                                    </form> 
                                    </td>
                                    <td>
                                    <form method="post" class="me-2" action="addpassenger">
                                        <input type="text" hidden name="id" value="<?php  echo $flight['id']; ?>">
                                        <button class="btn btn btn-success ms-4"> Voir les passager
                                         </button>
                                    </form>
                                    </td>
                                   
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