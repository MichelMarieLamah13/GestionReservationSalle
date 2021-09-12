<?php
session_start();
require_once("includes/constants.php");
require_once('config/database.php');
require_once('includes/functions.php');
require_once('includes/init.php');
require_once('filters/auth.filter.php');
?>
<?php
class Date{
    var $days=array('Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche');
    var $months=array('Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Decembre');

    function getEvents($year){
        global $db;
        $req=$db->query('SELECT id,motif,id_prof,date_r FROM reservation WHERE YEAR(date_r)='.$year);
        $r=array();
        while($d=$req->fetch(PDO::FETCH_OBJ)){
            $req1=$db->prepare("SELECT nom,prenom FROM professeur WHERE id=?");
            $req1->execute([$d->id_prof]);
            $d2=$req1->fetch(PDO::FETCH_OBJ);
            $r[strtotime($d->date_r)][$d->id]=$d->motif.' - '.$d2->nom.' '.$d2->prenom;
        }
        return $r;
    }
    function getAll($year){
        $r=array();
        $date=new DateTime($year.'-01-01');
        while($date->format('Y')<=$year){
            $y=$date->format('Y');
            $m=$date->format('n');
            $d=$date->format('j');
            $w=str_replace('0','7',$date->format('w'));
            $r[$y][$m][$d]=$w;
            $date->add(new DateInterval('P1D'));
        }
        return $r;
    }
}
?>
<?php
require_once("views/index.next.view.php");
