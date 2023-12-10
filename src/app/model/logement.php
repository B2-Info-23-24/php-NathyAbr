<?php
require_once 'vendor/autoload.php';  // Incluez le fichier d'autoloading de Twig
$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/templates');
$twig = new \Twig\Environment($loader);
$twig->addExtension(new \Twig\Extension\DebugExtension());
$logement = [
    'nom' => 'Logement Exemple',
    'ville' => 'Paris',
    'type_logement' => 'Appartement',
    'prix_nuit' => 100.0,
    'equipements' => [
        ['nom' => 'Connexion Wi-Fi'],
        ['nom' => 'Climatiseur'],
        ['nom' => 'Télévision'],
        ['nom'=> 'PS5'],
        
     
    ],
    'services' => [
        ['nom' => 'Petit-déjeuner'],
        ['nom' => 'Service de ménage'],
        
    ],

];
$nouveauxEquipements = [
    'Machine à laver', 'Sèche-linge', 'Télévision', 'Fer à repasser / Planche à repasser',
    'Nintendo Switch', 'PS5', 'Terrasse', 'Balcon', 'Piscine', 'Jardin'
];

foreach ($nouveauxEquipements as $equipement) {
    $logement['equipements'][] = ['nom' => $equipement];
}

$nouveauxServices = [
    'Transferts aéroport', 'Petit-déjeuner', 'Service de ménage', 'Location de voiture',
    'Visites guidées', 'Cours de cuisine', 'Loisirs'
];

foreach ($nouveauxServices as $service) {
    $logement['services'][] = ['nom' => $service];
}

echo $twig->render('logement.twig', ['logement' => $logement]);
