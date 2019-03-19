<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS & JS -->
        <link href="../../css/bootstrap-4.2.1-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="../../css/bootstrap-4.2.1-dist/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Personnal CSS -->
        <link href="../../css/test.css" rel="stylesheet" type="text/css"/>
        <title>Profil</title>
    </head>
    <body>
        <?php include_once 'showNavigation.php'; ?>
        <div class='container'>
            <div class="d-flex justify-content-center testMarginVertical">
                <div class="card" style="width: 65%;">
                    <?php if (/* $_SESSION['idUser'] */1 == $userDetails[0]->idUser): ?>
                        <div class="d-flex justify-content-end">
                            <a href="#" class="btn btn-info testWidth">M</a>
                            <a href="#" class="btn btn-danger testWidth">S</a>
                        </div>
                    <?php endif; ?>
                    <div class="d-flex justify-content-center">
                        <img src="http://www.laboiteafromages37.com/photo/pagecontent/5/goat-image_0.jpg" style="width: 60%; height: 50%; object-fit: cover;" class="card-img-top" alt="">
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-center"><h5 class="card-title"><?= $userDetails[0]->name ?></h5></div>
                        <p class="card-text" style="text-align: justify;"><?= $userDetails[0]->description ?></p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
