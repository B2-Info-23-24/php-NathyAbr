<?php

function renderTemplate($twig, $template, $data = [])
{
    $template = $twig->load($template);
    echo $template->render($data);
}

function connectToDatabase()
{
    require_once __DIR__ . '/db.php';
    return $conn;
}

function getHousings($conn)
{
    $sql = "SELECT * FROM logement";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $housings = $stmt->fetchAll();
    return $housings;
}

