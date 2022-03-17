<?php 
// require_once './views/includes/alerts.php';
require_once './views/includes/header.php';
require_once './autoload.php';
require_once './controllers/HomeController.php';

$home = new HomeController();

$pages = ['home','add','update','delete','login', 'register', 'logout', 'dashadmin', 'reserve', 'deleterev', 'homecopy', 'addpassenger', 'allres'];

if(isset($_SESSION['logged']) && $_SESSION['logged'] === true){
    if(isset($_GET['page'])){
        if(in_array($_GET['page'], $pages)){
            $page = $_GET['page'];
            $home->index($page); 
        }else{
            include('views/includes/404.php');
        }
    }else if ($_SESSION['role'] == 0) {
        $home->index('home');
    } else if ($_SESSION['role'] == 1) {
        $home->index('dashadmin');
    }
    require_once './views/includes/footer.php';
        
}else if (isset($_GET['page']) && $_GET['page'] === 'register'){
    $home->index('register');
}else{
    $home->index('login');
}
?>
