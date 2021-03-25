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
    /* Demande à mysqli de lancer une exception si une erreur survient */
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $mysqli = new mysqli("localhost", "m152_admin", "Super2021", "m152");

    /* Démarre la transaction */
    $mysqli->begin_transaction();

    try {
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
    } catch (mysqli_sql_exception $exception) {
        $mysqli->rollback();
        throw $exception;
    }
}

function addPost($commentaire, $creationDate, $modificationDate)
{
    /* Demande à mysqli de lancer une exception si une erreur survient */
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $mysqli = new mysqli("localhost", "m152_admin", "Super2021", "m152");

    /* Démarre la transaction */
    $mysqli->begin_transaction();

    try {
        $sql = "INSERT INTO post (commentaire, creationDate, modificationDate) VALUES (:commentaire, :creationDate, :modificationDate)";

        $query = connect()->prepare($sql);

        $query->execute([
            ':commentaire' => $commentaire,
            ':creationDate' => $creationDate,
            ':modificationDate' => $modificationDate,
        ]);
        $id = connect()->lastInsertId();
        return array($query->fetchAll(PDO::FETCH_ASSOC), $id);
    } catch (mysqli_sql_exception $exception) {
        $mysqli->rollback();
        throw $exception;
    }
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

function deletePost($id){

    $sql = "DELETE FROM post WHERE idPost = :id";

    $query = connect()->prepare($sql);

    $query->execute([
        ':id' => $id,
    ]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
function deleteMedia($id){

    $sql = "DELETE FROM media WHERE idMedia = :id";

    $query = connect()->prepare($sql);

    $query->execute([
        ':id' => $id,
    ]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

?>