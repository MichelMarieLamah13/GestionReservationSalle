<?php
/**
 * Created by PhpStorm.
 * User: lamah
 * Date: 5/4/2019
 * Time: 6:17 PM
 */
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <style>
        div.info-message {
            margin-bottom: 15px;
            padding: 4px 12px;
        }
        .info-message {
            background-color: #e7f3fe;
            border-left: 6px solid #2196F3;
        }
        .btn-message {
            background-color: DodgerBlue;
            border: none;
            color: white;
            padding: 12px 16px;
            font-size: 16px;
            cursor: pointer;
        }

        /* Darker background on mouse-over */
        .btn-message:hover {
            background-color: RoyalBlue;
        }
        .info-message+a{
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>
<div class="info-message">
    <h1>Activation de comptes!</h1>
    <p><strong>Chèr(e)! </strong><?=$login?></p>
    <p>Vous avez été inscrit sur le site web de la gestion des salles de réunion de <strong>Ensa Tétouan</strong>
        avec les paramètres suivants:</p>
    <p><strong>Login: </strong><?=$login?></p>
    <p><strong>Mot de pass: </strong><?=$mdp?></p>
    <p> Pour <strong>activer</strong> votre compte, veuillez cliquer sur le lien ci-dessous</p>
</div>
<a href="<?=WEBSITE_URL.'/projet/activation.php?p='.$login.'&amp;token='.$token?>" title="Activer">
    <button class="btn-message">Activer</button></a>
</body>
</html>