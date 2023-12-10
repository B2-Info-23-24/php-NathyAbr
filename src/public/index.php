<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../includes/functions.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/../templates');
$twig = new Environment($loader);

$conn = connectToDatabase();
$housings = getHousings($conn);

renderTemplate($twig, 'index.html.twig', ['housings' => $housings]);
