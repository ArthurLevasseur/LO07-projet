
<!-- ----- debut ControllerPatient -->
<?php
require_once '../model/ModelPatient.php';

class ControllerPatient {

 // --- Liste des vins
 public static function patientReadAll() {
  $results = ModelPatient::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/patient/viewAll.php';
  if (DEBUG)
   echo ("ControllerPatient : patientReadAll : vue = $vue");
  require ($vue);
 }
 
 public static function patientAdd() {
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/patient/viewInsert.php';
  if (DEBUG)
   echo ("ControllerPatient : patientAdd : vue = $vue");
  require ($vue);
 }
 
 public static function patientCreated() {
  // ----- Construction chemin de la vue
  $results = ModelPatient::insert(
      htmlspecialchars($_GET['nom']), htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['adresse'])
  );
  include 'config.php';
  $vue = $root . '/app/view/patient/viewInserted.php';
  if (DEBUG)
   echo ("ControllerCentre : patientCreate : vue = $vue");
  require ($vue);
 }
 
}
?>
<!-- ----- fin ControllerCentre -->


