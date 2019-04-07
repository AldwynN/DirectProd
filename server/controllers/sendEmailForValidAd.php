<?php
// Using PHPMailer Namespace as specified PHPMailer developers
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$idUser = filter_input(INPUT_GET, 'idUser', FILTER_VALIDATE_INT);
$valid = filter_input(INPUT_GET, 'valid', FILTER_VALIDATE_INT);

require_once '../inc/inc.all.php';
require '../../PHPMailer/src/PHPMailer.php';

$user = UserManager::GetUserDetailsById($idUser);

$mail = new PHPMailer;
$mail->setFrom('alduinsorn@gmail.com', 'Admin de DirectProd');
$mail->addAddress($user->email, $user->name);
if ($valid == 1) {
    $mail->Subject  = 'La validation de votre annonce';
    $mail->Body     = 'Bonjour, ce mail est un message de confirmation que votre annonce a bel et bien été validé par l\'administrateur du site.';
} else {
    $mail->Subject  = 'L\'annulation de votre annonce';
    $mail->Body     = 'Bonjour, ce mail est un message pour vous prévenir que votre annonce a été supprimé par l\'administrateur du site, car votre annonce n\'était pas conforme au attente.';
}
if (!$mail->send()) {
    echo '<div class="alert alert-danger" role="alert">Message d\'erreur : "Erreur lors de l\'envoie du mail"</div>';
    //echo 'Message was not sent.';
    //echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
    echo '<div class="alert alert-info" role="alert">Message de confirmation : "L\'email a bien été envoyé"</div>';
}

echo '<meta http-equiv="refresh" content="3;URL=admin.php">';