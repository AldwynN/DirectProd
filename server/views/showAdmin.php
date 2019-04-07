<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS & JS -->
    <link href="../../css/bootstrap-4.2.1-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../../css/bootstrap-4.2.1-dist/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Personnal CSS -->
    <link href="../../css/test.css" rel="stylesheet" type="text/css" />
    <title>Admin</title>
</head>

<body>
    <?php include_once 'showNavigation.php'; ?>
    <div class='container'>
        <div class="d-flex justify-content-center testMarginVertical">
            <div class="media testPadding">
                <?php if(count($ads) > 0): ?>
                <table class="table corps">
                    <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Code postal et canton</th>
                            <th scope="col">Titre</th>
                            <th scope="col">Organic</th>
                            <th scope="col">Date</th>
                            <th scope="col"></th>
                            <th scole="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ads as $ad) :
                            $user = UserManager::GetUserDetailsById($ad->idUser);
                            ?>
                            <tr>
                                <td><?= $user[0]->name ?></td>
                                <td><?= $user[0]->postCode . " - " . $user[0]->canton ?></td>
                                <td><?= $ad->title ?></td>
                                <td><?= $ad->organic ?></td>
                                <td><?= date_format(date_create($ad->date), 'd.m.Y') . " à " .  date_format(date_create($ad->date), 'H:i:s') ?></td>
                                <td><a href="../controllers/sendEmailForValidAd?idUser=<?= $ad->idUser ?>&valid=1" class="btn btn-primary">Valider</a></td>
                                <td><a href="../controllers/deleteAd.php?idAd=<?= $ad->idAdvertisement ?>" class="btn btn-danger">Supprimer</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                        <?php else:?>
                        <h2 class="corps">Aucunes annonces en attente de validation</h2>
            <?php endif;?>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        $('#valid').click(function() {
            var val = $(this).val();
            $.ajax({
                type: "POST",
                data: {
                    idAdvertisement: val
                },
                url: "../controllers/validAd.php",
                dataType: "json",
            }); //End ajax
        });
    });
</script>

</html>