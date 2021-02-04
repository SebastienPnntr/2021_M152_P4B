<?php

// NE FONCTIONNE PAS

$host = '127.0.0.1';
$db   = 'm152';
$user = 'm152_admin';
$pass = 'Super2021';
$port = "3306";

$options = [
    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES   => false,
];
$dsn = "mysql:host=$host;dbname=$db;port=$port";
try {
     $pdo = new \PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

function insertImage($type, $nom, $creationDate, $modificationDate){
    $data = [
        'typeMedia' => $$type,
        'nomMedia' => $nom,
        'creationDate' => $creationDate,
        'modificationDate' => $modificationDate,
    ];
    $sql = "INSERT INTO media (typeMedia, nomMedia, creationDate, modificationDate) VALUES (:typeMedia, :nomMedia, :creationDate, :modificationDate)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute($data);
}

?>