<?php

function connect()
{
    static $myDb = null;
    $dbName = "m152";
    $dbUser = "m152_admin";
    $dbPass = "Super2021";
    if ($myDb === null) {
        try {
            $myDb = new PDO(
                "mysql:host=localhost;dbname=$dbName;charset=utf8",
                $dbUser,
                $dbPass,
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_PERSISTENT => true
                )
            );
        } catch (Exception $e) {
            die("Impossible de se connecter à la base " . $e->getMessage());
        }
    }
    return $myDb;
}

function addMedia($type, $nom, $creationDate, $modificationDate, $idPost)
{

    $sql = "INSERT INTO media (typeMedia, nomMedia, creationDate, modificationDate, idPost) VALUES (:typeMedia, :nomMedia, :creationDate, :modificationDate, :idPost)";

    $query = connect()->prepare($sql);

    $query->execute([
        ':typeMedia' => $type,
        ':nomMedia' => $nom,
        ':creationDate' => $creationDate,
        ':modificationDate' => $modificationDate,
        ':idPost' => $idPost,
    ]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function addPost($commentaire, $creationDate, $modificationDate)
{

    $sql = "INSERT INTO post (commentaire, creationDate, modificationDate) VALUES (:commentaire, :creationDate, :modificationDate)";

    $query = connect()->prepare($sql);

    $query->execute([
        ':commentaire' => $commentaire,
        ':creationDate' => $creationDate,
        ':modificationDate' => $modificationDate,
    ]);
    $id = connect()->lastInsertId();
    return array($query->fetchAll(PDO::FETCH_ASSOC), $id);
}

function getAllPost(){

    $sql = "SELECT * FROM post ORDER BY idPost DESC";

    $query = connect()->prepare($sql);

    $query->execute([
        
    ]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getAllMediaById($id){

    $sql = "SELECT * FROM media WHERE idPost = :id";

    $query = connect()->prepare($sql);

    $query->execute([
        ':id' => $id,
    ]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

?>