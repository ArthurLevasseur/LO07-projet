
<!-- ----- debut ControllerVaccin -->
<?php
require_once '../model/ModelVaccin.php';

class ControllerVaccin {

 // --- Liste des vins
 public static function vaccinReadAll() {
  $results = ModelVaccin::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vaccin/viewAll.php';
  if (DEBUG)
   echo ("ControllerVaccin : vaccinReadAll : vue = $vue");
  require ($vue);
 }
 
 public static function vaccinAdd() {
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vaccin/viewInsert.php';
  if (DEBUG)
   echo ("ControllerVaccin : vaccinAdd : vue = $vue");
  require ($vue);
 }
 
 public static function vaccinCreated() {
  // ----- Construction chemin de la vue
  $results = ModelVaccin::insert(
      htmlspecialchars($_GET['label']), htmlspecialchars($_GET['doses'])
  );
  include 'config.php';
  $vue = $root . '/app/view/vaccin/viewInserted.php';
  if (DEBUG)
   echo ("ControllerVaccin : vaccinCreate : vue = $vue");
  require ($vue);
 }
 
 public static function vaccinUpdate() {
  // ----- Construction chemin de la vue
  $results = ModelVaccin::getAllLabel() ;
  include 'config.php';
  $vue = $root . '/app/view/vaccin/viewLabel.php';
  if (DEBUG)
   echo ("ControllerVaccin : vaccinUpdate : vue = $vue");
  require ($vue);
 }
 
 public static function vaccinChangeDoses($label) {
  // ----- Construction chemin de la vue
  $results = $label;
  include 'config.php';
  $vue = $root . '/app/view/vaccin/changeDoses.php';
  if (DEBUG)
   echo ("ControllerVaccin : vaccinChangeDoses : vue = $vue");
  require ($vue);
 }
 
 public static function vaccinDosesUpdated() {
  // ----- Construction chemin de la vue
  $results = ModelVaccin::updateDoses(htmlspecialchars($_GET['label']), htmlspecialchars($_GET['doses'])) ;
  include 'config.php';
  $vue = $root . '/app/view/vaccin/viewUpdated.php';
  if (DEBUG)
   echo ("ControllerVaccin : vaccinDosesUpdated : vue = $vue");
  require ($vue);
 }
 
}
?>
<!-- ----- fin ControllerVaccin -->


