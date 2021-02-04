<?php
    // Erreur 0 = premier chargement de la page
    // Erreur 1 = Pas d'erreur, succès de l'envois des images
    // Erreur 2 = Une erreur est survenue
    $error = 0;
    if (!empty($_POST)){
        include("database.php");
        try{
            // Count # of uploaded files in array
            $total = count($_FILES['file']['name']);

            // Loop through each file
            for( $i=0 ; $i < $total ; $i++ ) {

                //Get the temp file path
                $tmpFilePath = $_FILES['file']['tmp_name'][$i];

                // get new name
                $newName = uniqid().".".pathinfo($_FILES['file']['name'][$i], PATHINFO_EXTENSION);

                //Make sure we have a file path
                if ($tmpFilePath != ""){
                    //Setup our new file path
                    $newFilePath = "images/" . $newName;

                    //Upload the file into the temp dir
                    if(move_uploaded_file($tmpFilePath, $newFilePath)){

                    }
                }
            }
            $error=1;
        }
    catch(Exception $e){
        $error = 2;
        }
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
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-md bg-info navigation-clean-search">
        <div class="container"><a class="navbar-brand" href="index.php"><i class="fa fa-picture-o"></i>&nbsp;Blog</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="index.php"><i class="icon ion-android-home"></i>&nbsp;Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="post.php"><i class="fa fa-plus"></i>&nbsp;Post</a></li>
                    <li class="nav-item"></li>
                </ul>
                <form class="form-inline mr-auto" target="_self">
                    <div class="form-group"><label for="search-field"><i class="fa fa-search"></i></label><input class="form-control search-field" type="search" id="search-field" name="search"></div>
                </form><a class="btn btn-light action-button" role="button" href="#"><i class="typcn typcn-user"></i></a>
            </div>
        </div>
    </nav>
    <div class="contact-clean">
        <form method="post" action="#" enctype="multipart/form-data">
            <h2 class="text-center">Poster quelque chose</h2>
            <?php
            if($error==1){
                header("Location: index.php");
            }
            else
                if($error==2){
                    echo '<div class="alert alert-danger" role="alert">
                    Une erreur est surevenue.
                  </div>';
            }
            ?>
            <div class="form-group"><textarea class="form-control" name="description" placeholder="Description..." rows="14" required=""></textarea></div>
            <div class="form-group"><input type="file" name="file[]" required="" accept="image/*" multiple></div>
            <div class="form-group"><button class="btn btn-primary" type="submit">Publier</button></div>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>