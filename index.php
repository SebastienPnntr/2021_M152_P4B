<?php
    include('database.php');

    $listPost = getAllPost();
    
    
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
    <nav class="navbar navbar-dark navbar-expand-md bg-info navigation-clean-search">
        <div class="container"><a class="navbar-brand" href="index.php"><i class="fa fa-picture-o"></i>&nbsp;Blog</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="index.php"><i class="icon ion-android-home"></i>&nbsp;Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="post.php"><i class="fa fa-plus"></i>&nbsp;Post</a></li>
                    <li class="nav-item"></li>
                </ul>
                <form class="form-inline mr-auto" target="_self">
                    <div class="form-group"><label for="search-field"><i class="fa fa-search"></i></label><input class="form-control search-field" type="search" id="search-field" name="search"></div>
                </form><a class="btn btn-light action-button" role="button" href="#"><i class="typcn typcn-user"></i></a>
            </div>
        </div>
    </nav>
    <div></div>
    <div style="margin-top: 1%;">
        <div class="container">
            <div class="row">
                <div class="col-md-6"><img style="width: 250px;height: 250px;" src="assets/img/profile.png"></div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Bienvenue</h4>
                            <h6 class="text-muted card-subtitle mb-2">Administrateur</h6>
                            <p class="card-text">Bienvenue sur le blog. Vous êtes actuellement sur la page d'accueil, vous pouvez poster de nouveau post depuis la page "Post" en cliquant sur celle ci depuis la navigation.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
    <?php
    foreach($listPost as $item){
        $image = getAllMediaById($item['idPost']);
        echo '<div class="container">
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <div class="card">';
                foreach($image as $imageToPost){
                    if($imageToPost["typeMedia"]=="mp4"){
                        echo '<video width="538" height="538" autoplay muted controls loop>
                        <source src="medias/'.$imageToPost['nomMedia'].'" type="video/mp4">
                      </video>';
                    }
                    else if($imageToPost["typeMedia"]=="mp3"){
                        echo '<audio controls>
                        <source src="medias/'.$imageToPost['nomMedia'].'" type="audio/mpeg">
                      Your browser does not support the audio element.
                      </audio>';
                    }
                    else{
                        echo '<img class="card-img-top w-100 d-block" src="medias/'.$imageToPost['nomMedia'].'">';
                    }
                }
                echo '
                    <div class="card-body">
                        <h4 class="card-title">'.$item["commentaire"].'</h4>
                        <i class="bi bi-trash"></i>
                    </div>
                <form action="edit.php" method="post">
                    <input type="hidden" value="'.$item["idPost"].'" name="postIdEdit">
                    <button class="btn btn-warning action-button" role="button" type="submit"><i class="typcn typcn-pen"></i></button>
                </form>
                <form action="delete.php" method="post">
                    <input type="hidden" value="'.$item["idPost"].'" name="postIdDelete">
                    <button class="btn btn-danger action-button" role="button" type="submit"><i class="typcn typcn-trash"></i></button>
                </form>
                </div>
            </div>
        </div>
    </div>';
    }
    ?>
        
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>