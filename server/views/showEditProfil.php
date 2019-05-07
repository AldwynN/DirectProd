<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/DirectProd/server/inc/headerLinks.php'; ?>
    <title>Édition du profil</title>
</head>

<body>
    <?php include_once 'showNavigation.php'; ?>
    <div class='container'>
        <div class="d-flex justify-content-center testMarginVertical">
            <div class="media testPadding" style="width: 80%;">
                <div class="media-body">
                    <form method="POST" action="<?= $path = $_SERVER['DOCUMENT_ROOT'] . '/DirectProd/server/controllers/editProfil.php?idUser=' . $_SESSION['idUser'] ?>">
                        <div class="form-group">
                            <label for="newPassword" class="corps">Nouveau mot de passe</label>
                            <input type="password" class="form-control" name="newPassword" id="newPassword">
                        </div>
                        <div class="form-group">
                            <label for="repeatNewPassword" class="corps">Confirmer le nouveau mot de passe</label>
                            <input type="password" class="form-control" name="repeatNewPassword" id="repeatNewPassword">
                        </div>
                        <div class="form-group">
                            <label for="name" class="corps">Nom</label>
                            <input type="text" class="form-control" name="name" id="name" value="<?= $user[0]->name ?>">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="canton" class="corps">Canton</label>
                                    <input type="text" class="form-control" name="canton" id="canton" value="<?= $user[0]->canton ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="city" class="corps">Ville</label>
                                    <input type="text" class="form-control" name="city" id="city" value="<?= $user[0]->city ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="postCode" class="corps">Code postal</label>
                                    <input type="text" class="form-control" name="postCode" id="postCode" value="<?= $user[0]->postCode ?>">
                                </div>
                                <div class="col-md-9">
                                    <label for="streetAndNumber" class="corps">Rue et numéro</label>
                                    <input type="text" class="form-control" name="streetAndNumber" id="streetAndNumber" value="<?= $user[0]->streetAndNumber ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="corps">Description</label>
                            <textarea name="description" class="form-control" rows="5" cols="40" id="description"><?= $user[0]->description ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="password" class="corps">Entrez votre mot de passe</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <button type="submit" class="btn btn-primary" name="send">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>