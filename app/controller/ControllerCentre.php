
<!-- ----- debut ControllerVaccin -->
<?php
require_once '../model/ModelCentre.php';

class ControllerCentre {

 // --- Liste des vins
 public static function centreReadAll() {
  $results = ModelCentre::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/centre/viewAll.php';
  if (DEBUG)
   echo ("ControllerCentre : centreReadAll : vue = $vue");
  require ($vue);
 }
 
 public static function centreAdd() {
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/centre/viewInsert.php';
  if (DEBUG)
   echo ("ControllerCentre : centreAdd : vue = $vue");
  require ($vue);
 }
 
 public static function centreCreated() {
  // ----- Construction chemin de la vue
  $results = ModelCentre::insert(
      htmlspecialchars($_GET['label']), htmlspecialchars($_GET['adresse'])
  );
  include 'config.php';
  $vue = $root . '/app/view/centre/viewInserted.php';
  if (DEBUG)
   echo ("ControllerCentre : centreCreate : vue = $vue");
  require ($vue);
 }
 

 
}
?>
<!-- ----- fin ControllerCentre -->


