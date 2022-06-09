
<!-- ----- debut Router1 -->
<?php
require ('../controller/ControllerVaccin.php');
require ('../controller/ControllerCentre.php');
require ('../controller/ControllerPatient.php');
require ('../controller/ControllerCave.php');
require ('../controller/ControllerStock.php');
require ('../controller/ControllerRdv.php');

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);

$action = $param['action'];
unset($param['action']);
$args = $param;

// --- Liste des méthodes autorisées
switch ($action) {
 case "caveAccueil" :
 case "propositions" :
  ControllerCave::$action($args);
     break;
 case "vaccinReadAll" :
 case "vaccinAdd" :
 case "vaccinCreated" :
 case "vaccinUpdate" :
 case "vaccinChangeDoses" :
 case "vaccinChangeDoses" :
 case "vaccinDosesUpdated" :
     ControllerVaccin::$action($args);
     break;
 case "centreReadAll" :
 case "centreReadMap" :
 case "centreAdd" :
 case "centreCreated" :
     ControllerCentre::$action($args);
     break;
 case "patientReadAll" :
 case "patientAdd" :
 case "patientCreated" :
     ControllerPatient::$action($args);
     break;
 case "stockReadAll" :
 case "stockReadSum" :
 case "attributionVaccin" :
 case "selectionnerVaccin" :
 case "attribuerDoses" :
      case "choixVaccinEtCentre" :
          case "initStock" :
     case "stats" :
     ControllerStock::$action($args);
         break;
 case "dossierVaccination" :
 case "situationVaccinale" :
 case "completerrdv" :
 case "ajouterRdvSuivant" :
 case "prendrerdv" :
 case "rdvParCentre" :
     ControllerRdv::$action($args);
     break;
 case "doc" :
     ControllerCave::$action($args);
     break;
    default:
  $action = "caveAccueil";
  ControllerCave::$action(); 

 
}


?>
<!-- ----- Fin Router1 -->

