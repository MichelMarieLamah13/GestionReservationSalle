<?php
session_start();
/**
 * Created by PhpStorm.
 * User: lamah
 * Date: 5/5/2019
 * Time: 1:24 PM
 */
?>
<?php include('filters/guest_filter.php');?>
<?php
require('config/database.php');
require('includes/functions.php');
if (!empty($_GET['p']) && is_already_in_use('login', $_GET['p'], 'professeur')
    && !empty($_GET['token'])
) {
    $login = $_GET['p'];
    $token = $_GET['token'];

    $q = $db->prepare('SELECT email, mot_de_pass FROM professeur WHERE login = ?');
    $q->execute([$login]);

    $data = $q->fetch(PDO::FETCH_OBJ);

    $token_verif = sha1($login. $data->email . $data->mot_de_pass);
    if ($token == $token_verif) {
        $q = $db->prepare('UPDATE professeur SET active= ? WHERE login=?');
        $q->execute(['1',$login]);
        redirect('login.php');
    } else {
        set_flash('Jeton de sécurité invalide', 'danger');
        redirect('index.php');
    }
} else {
    redirect('index.php');
}