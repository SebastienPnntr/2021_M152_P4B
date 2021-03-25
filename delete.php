<?php
    include("database.php");
    // Récupère l'id du post
    $id = filter_input(INPUT_POST, "postIdDelete", FILTER_SANITIZE_STRING);
    // Récupère les médias de l'id
    $media = getAllMediaById($id);
    $error = 0;
    try{
        if($media != null){
            foreach($media as $item){
                // Supprime le media du serveur
                unlink("medias/".$item["nomMedia"]);

                // Supprime le media de la db
                deleteMedia($item["idMedia"]);
            }
        }
        // Supprime le post dans la DB
        deletePost($id);
    }
    catch(Exception $e){
        $error = 1;
    }
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>M152</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/typicons.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
      <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"><?php if($error == 1){echo "Erreur";}else{echo "Felicitation";}?></h5>
          </div>
          <div class="modal-body">
            <p><?php if($error == 1){echo "Une erreur est survenue!";}else{echo"Votre post a bien été supprimé!";}?></p>
          </div>
          <div class="modal-footer">
            <a href="index.php" type="button" class="btn btn-success">OK</a>
          </div>
        </div>
      </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>