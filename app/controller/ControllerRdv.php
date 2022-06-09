
<!-- ----- debut ControllerStock -->
<?php
require_once '../model/ModelRdv.php';

class ControllerRdv {

 // --- Liste des vins
 public static function dossierVaccination() {
  $results = ModelRdv::getListePatient();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/rdv/viewPatients.php';
  if (DEBUG)
   echo ("ControllerStock : stockReadAll : vue = $vue");
  require ($vue);
 }
 
 public static function situationVaccinale() {
  $results = ModelRdv::getSituationVaccinale(htmlspecialchars($_GET['nom']));
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/rdv/viewSituation.php';
  if (DEBUG)
   echo ("ControllerStock : stockReadAll : vue = $vue");
  require ($vue);
 }
 
 public static function completerrdv() {
  $results = ModelRdv::getListeCentreDispos(htmlspecialchars($_GET['vaccin']));
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/rdv/viewRdvCompleterPV.php';
  if (DEBUG)
   echo ("ControllerStock : stockReadAll : vue = $vue");
  require ($vue);
 }
 
  public static function prendrerdv() {
  $results = ModelRdv::getListeCentre();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/rdv/viewRdvCompleterPV.php';
  if (DEBUG)
   echo ("ControllerStock : stockReadAll : vue = $vue");
  require ($vue);
 }
 
 public static function ajouterRdvSuivant() {
  $results = ModelRdv::ajouterRdv(htmlspecialchars($_GET['centre_selectionne']), htmlspecialchars($_GET['patient']), htmlspecialchars($_GET['injection']), htmlspecialchars($_GET['vaccin']));
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/rdv/viewAdded.php';
  if (DEBUG)
   echo ("ControllerStock : stockReadAll : vue = $vue");
  require ($vue);
 }
 
 public static function rdvParCentre() {
  $results = ModelRdv::getRdvParCentre();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/rdv/viewAll.php';
  if (DEBUG)
   echo ("ControllerStock : rdvReadAll : vue = $vue");
  require ($vue);
 }
 
 
}
?>
<!-- ----- fin ControllerStock -->


