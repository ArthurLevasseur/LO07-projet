
<!-- ----- debut ControllerProducteur -->
<?php

class ControllerCave {
 // --- page d'acceuil
 public static function caveAccueil() {
  include 'config.php';
  $vue = $root . '/app/view/viewCaveAccueil.php';
  if (DEBUG)
   echo ("ControllerVin : caveAccueil : vue = $vue");
  require ($vue);
 }
 
 public static function doc() {
  include 'config.php';
  $vue = $root . '/app/view/doc.php';
  require ($vue);

 // --- Liste des producteurs
 }
 
}
?>
<!-- ----- fin ControllerVin -->


