<?php 
require_once 'vendor/autoload.php'; 
$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/models/');
$twig = new \Twig\Environment($loader);

$isAuthenticated = true;  
$isAdministrator = true; 
if(isset($_SESSION['email'])){
	$isAuthenticated = true;
	$isAdministrator = true;
}
else{
	$isAuthenticated = false;
	$isAdministrator = false;
}


if (!$isAuthenticated || !$isAdministrator) {
    header('Location: login.php');
    exit();
}
$logements = [
    ['id' => 1, 'nom' => 'Logement A', 'ville' => 'Paris', 'type_logement' => 'Appartement', 'prix_nuit' => 100.0],
    ['id' => 2, 'nom' => 'Logement B', 'ville' => 'Lyon', 'type_logement' => 'Maison', 'prix_nuit' => 150.0],
   
];
echo $twig->render('admin.twig', ['logements' => $logements]);

$admin_id='';
$email='';
$password='';

$errors=array();

$db = new mysqli('localhost','root','','trocmontoit');

if($db->connect_error){
	echo "Error connecting database";
}

if(isset($_POST['admin_login'])){
	admin_login();
}


function admin_login(){
	global $email,$db;
	$email=validate($_POST['email']);
	$password=validate($_POST['password']);

		$sql = "SELECT * FROM admin where email='$email' AND password='$password' LIMIT 1";
		$result = $db->query($sql);
		if($result->num_rows==1){
			$data = $result-> fetch_assoc();
			$logged_user = $data['email'];
			session_start();
			$_SESSION['email']=$email;
			header('location:admin/index.php');
    

		}
		else{
            $logged_user = $db->query('');
            $logged_user = $logged_user->fetch_assoc();
            $logged_user['email']=$email;
            $logged_user['password']=$password;
        }
     }
    ?>
<?php

