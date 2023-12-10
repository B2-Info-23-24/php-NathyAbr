<?php
require_once 'vendor/autoload.php';
$faker = Faker\Factory::create();

function generateFakeLogement() {
    global $faker;

    $typesLogement = ['Appartement', 'Maison', 'Chalet', 'Villa', 'Péniche', 'Yourte', 'Cabane', 'Igloo', 'Tente', 'Car'];
    $equipements = ['Connexion Wi-Fi', 'Climatiseur', 'Chauffage', 'Machine à laver', 'Sèche-linge', 'Télévision', 'Fer à repasser / Planche à repasser', 'Nintendo Switch', 'PS5', 'Terrasse', 'Balcon', 'Piscine', 'Jardin'];
    $services = ['Transferts aéroport', 'Petit-déjeuner', 'Service de ménage', 'Location de voiture', 'Visites guidées', 'Cours de cuisine', 'Loisirs'];

    $logement = [
        'nom' => $faker->word . ' ' . $faker->word,
        'ville' => $faker->city,
        'type_logement' => $typesLogement[array_rand($typesLogement)],
        'photo_url' => $faker->imageUrl(),
        'prix_nuit' => $faker->randomFloat(2, 50, 500),
        'equipements' => $faker->randomElements($equipements, $faker->numberBetween(1, count($equipements))),
        'services' => $faker->randomElements($services, $faker->numberBetween(1, count($services))),
    ];

    return $logement;
}

$nombreDeLogements = 10;
$fauxLogements = [];

for ($i = 0; $i < $nombreDeLogements; $i++) {
    $fauxLogements[] = generateFakeLogement();
}

echo '<pre>';
print_r($fauxLogements);
echo '</pre>';
