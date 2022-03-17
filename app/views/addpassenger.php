<?php
 if (isset($_POST['id'])) { 
    // die(var_dump($_POST['id']));
    $exitFlight = new FlightController();
    $flight = $exitFlight->getOneFlight();
} else {
    // Redirect::to('home');
}
$id=$_SESSION['id'];
$resvation = new UserController();
$res=$resvation->getResvation($id);

if (isset($_POST['submit'])) {
    // die(var_dump($_POST['lastname']));
    $addPassenger = new FlightController();
    $addPassenger->addPassenger();
}
//  die(var_dump($_POST['idres']));

$data = new FlightController();
$passangers = $data->AfficherPas($id);
// die(var_dump($passangers));

?>
<div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                <?php include('./views/includes/alerts.php'); ?>

                    <div class="card-header">
                        <h1>Ajouter des passagers</h1>
                    </div>
                    <div class="card-body bg-light">
                        <div>
                            <a href="<?php echo BASE_URL; ?>" class="btn btn btn-secondary mr-2 mb-2">
                                <i class="fas fa-home"></i>
                            </a>
                            <a href="<?php echo BASE_URL; ?>logout" title="Logout" class="btn btn-outline-primary float-end">
                                <i class="fas fa-user"></i> <?php echo $_SESSION['username']; ?> | Logout
                            </a>
                        </div>
                        <div class="form-group">
                                <!-- <label class="text-white" for="fname">Please enter your passenger's Full name and his/her birthday</label> -->
                                <form method="POST" action="addpassenger">
                                    <input type="text" hidden name="user_id" value="<?php  echo $id ; ?>">
                                    <input type="text"  name="fullname" class="form-control mb-4 col-md-6" placeholder="Prenom">
                                    <input type="text"  name="lastname" class="form-control mb-4 col-md-6" placeholder="Nom">
                                    <input type="date" class="form-control mb-4 col-md-6" name="birthday" placeholder="Date de naissance" >
                                    <input type="hidden" name="idres" value="<?=$res->id ?>">
                                    <button type="submit" class="btn btn-primary mt-3" name="submit">Ajouter un passager au vol</button>
                                </form>
                                <div class="table-responsive">
                        <table class="table table-success table-striped table-hover mt-4">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"> Client </th>
                                    <th scope="col">passanger </th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prenom</th>
                                    <th scope="col">Date de naissance</th>
                                    
                                </tr>
                            </thead>
                                <tbody>
                                <?php foreach ($passangers as $passanger) : ?>
                                <tr>
                                    <th></th>
                                    <th scope="row" ><?php echo $passanger['user_id']; ?></th>
                                    <th scope="row" ><?php echo $passanger['reservation_id']; ?></th>
                                    <td><?php echo $passanger['fullname']; ?></td>
                                    <td><?php echo $passanger['lastname']; ?></td>
                                    <td><?php echo $passanger['birthday']; ?></td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                            </div>

                        <div class="form-group">
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>