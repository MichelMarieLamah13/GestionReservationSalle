<!--
    Fonction permettant de verifier
    Si un champ n'est pas vide et gère aussi le cas des espaces
-->
<?php
if (!function_exists('not_empty')) {
    function not_empty($fields = [])
    {
        //--Si le tableau contient des elemnts
        if (count($fields) != 0) {
            //--Parcourt
            foreach ($fields as $field) {
                //--Est vide ou ne contient que des espaces
                if (empty($field) || trim($field) == "") return false;
            }
            return true;
        }
    }
}
?>

<!--
    Fonction permettant de verifier
    l'unicité du pseudo et de l'email
-->
<?php
if (!function_exists('is_already_in_use')) {
    function is_already_in_use($field, $value, $table)
    {
        //--Utiliser une variable de la fonction principal
        //--dans une autre fonction
        global $db;
        //--Selection ligne ayant ces infos
        $q = $db->prepare("SELECT id FROM $table
                         WHERE $field=?");
        $q->execute([$value]);
        //--On compte le nombre de ligne
        $count = $q->rowCount();
        $q->closeCursor();
        //--On retourne ce nombre soit 1 soit 0
        return $count;
    }
}
?>
<!--
    Fonction permettant de definir les variables
    de session pour les messages qui seront affichés
    dans une autre page
-->
<?php
if (!function_exists('set_flash')) {
    function set_flash($message, $type = 'info')
    {
        $_SESSION['notification']['message'] = $message;
        $_SESSION['notification']['type'] = $type;
    }
}
?>

<!--
    Fonction permettant de faire
    la redirection vers une page
-->
<?php
if (!function_exists('redirect')) {
    function redirect($page)
    {
        header("Location: $page");
        exit();
    }
}
?>

<!--
    Fonction permettant de sauvegarder
    les valeurs des inputs dans des sessions
    pour les preremplir à en cas d'erreurs
-->
<?php
if (!function_exists('save_input_data')) {
    function save_input_data()
    {
        foreach ($_POST as $key => $value) {
            if (strpos($key, 'password') === false) {
                $_SESSION['input'][$key] = $value;
            }
        }

    }
}
?>


<!--
    Fonction permettant d'afficher
    les valeurs des inputs stocker dans les sessions
    pour les preremplir à en cas d'erreurs
-->
<?php
if (!function_exists('get_input')) {
    function get_input($key)
    {
        return !empty($_SESSION['input'][$key])
            ? e($_SESSION['input'][$key])
            : null;
    }
}
?>

<!--
    Fonction permettant de supprimer
    les valeurs des inputs stocker dans les sessions
    Pour ne pas les afficher lorsqu'on revient sur
    la page
-->
<?php
if (!function_exists('clear_input_data')) {
    function clear_input_data()
    {
        if (isset($_SESSION['input'])) {
            $_SESSION['input'] = [];
        }
    }
}
?>

<!--
    Fonction permettant de resoudre le
    problème des faille XSS
-->
<?php
if (!function_exists('e')) {
    function e($string)
    {
        if ($string) {
            return strip_tags($string);
        }
    }
}
?>

<!--
Fonction permettant de retourner la classe active
ce qui permettra de mettre un background sur la
page sur laquelle nous nous trouverons
-->
<?php
if (!function_exists('set_active')) {
    function set_active($file)
    {
        //Recuperer la page sur laquelle nous sommes
        $temp = explode('/', $_SERVER['SCRIPT_NAME']);
        $page = array_pop($temp);

        return ($page == $file)
            ? "active"
            : "";
    }
}

?>

<!--
    Fonction permettant de
    les valeurs des $_SESSION['..'] stocker dans les sessions
    pour ne pas à chaque fois avoir à mettre $_SESSION['..']
-->
<?php
if (!function_exists('get_session')) {
    function get_session($key)
    {
        if ($key) {
            return !empty($_SESSION[$key])
                ? e($_SESSION[$key])
                : null;
        }
    }
}
?>

<!--
    Fonction permettant de retrouver un user
    dans la bd possedant dond $field correspond
    $value dans $table
-->
<?php
if (!function_exists('find_user')) {
    function find_user($field, $value, $table)
    {
        //--Utiliser une variable de la fonction principal
        //--dans une autre fonction
        global $db;
        //--Selection ligne ayant ces infos
        $q = $db->prepare("SELECT * FROM $table
                         WHERE $field=?");
        $q->execute([$value]);
        //--On recupère les données sous forme d'objet
        //--Ici on en aura qu'une
        $data = $q->fetch(PDO::FETCH_OBJ);
        $q->closeCursor();
        //--On retourne ce nombre soit 1 soit 0
        return $data;
    }
}
?>

<!--
    Fonction permettant de savoir si un user
    est connecté ou non
-->
<?php
if (!function_exists('is_logged_in')) {
    function is_logged_in()
    {
        return isset($_SESSION['user_id']) || isset($_SESSION['login']);
    }
}
?>

<!--
    Fonction permettant de verifier
    si l'email ou le pseudo n'ont pas été modifié
-->
<?php
if (!function_exists('is_already_him')) {
    function is_already_him($field1, $value1, $table, $value2, $field2)
    {
        //--Utiliser une variable de la fonction principal
        //--dans une autre fonction
        global $db;
        //--Selection ligne ayant ces infos
        $q = $db->prepare("SELECT $field1 FROM $table
                         WHERE $field1=? AND $field2=?");
        $q->execute([$value1, $value2]);
        $count = $q->rowCount();
        $q->closeCursor();
        //--On retourne true ou false
        return $count;
    }
}
?>

<!--
    Fonction permettant de verifier
    l'unicité d'une demande
-->
<?php
if (!function_exists('is_already_sent')) {
    function is_already_sent($field1, $value1, $field2, $value2, $field3, $table)
    {
        //--Utiliser une variable de la fonction principal
        //--dans une autre fonction
        global $db;
        //--Selection ligne ayant ces infos
        $q = $db->prepare("SELECT id FROM $table
                         WHERE $field1=:value1 AND $field2=:value2 AND ($field3=:value3 OR $field3=:value4) ");
        $q->execute([
            'value1' => $value1,
            'value2' => $value2,
            'value3' => 0,
            'value4' => 2
        ]);
        //--On compte le nombre de ligne
        $count = $q->rowCount();
        $q->closeCursor();
        //--On retourne ce nombre soit 1 soit 0
        return $count;
    }
}
?>

<!--
    Fonction permettant de savoir si un user
    est admin ou non
-->
<?php
if (!function_exists('is_admin')) {
    function is_admin()
    {
        return $_SESSION['user_id'] == ADMIN_ID;
    }
}
?>

<!--
    Fonction permettant de savoir si une date est correcte
    ou deux heures correcte
-->
<?php
if (!function_exists('is_correct')) {
    function is_correct($date1, $date2, $del)
    {
            $dateTest =str_replace($del,'',$date1);
            $dateLimit =str_replace($del,'',$date2);
        return ($dateTest < $dateLimit);
    }
}
?>