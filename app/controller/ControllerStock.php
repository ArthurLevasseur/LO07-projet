
<!-- ----- debut ControllerStock -->
<?php
require_once '../model/ModelStock.php';

class ControllerStock {

 // --- Liste des vins
 public static function stockReadAll() {
  $results = ModelStock::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/stock/viewAll.php';
  if (DEBUG)
   echo ("ControllerStock : stockReadAll : vue = $vue");
  require ($vue);
 }
 
  public static function stockReadSum() {
  $results = ModelStock::getSum();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/stock/viewSum.php';
  if (DEBUG)
   echo ("ControllerStock : stockReadSum : vue = $vue");
  require ($vue);
 }
 
 public static function attributionVaccin() {
  $results = ModelStock::getListeCentres();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/stock/viewLabel.php';
  if (DEBUG)
   echo ("ControllerStock : attributionVaccin : vue = $vue");
  require ($vue);
 }
 
 public static function selectionnerVaccin($centre_selectionne) {
  $results = ModelStock::getVaccinsAssocies(htmlspecialchars($_GET['centre_selectionne']));
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/stock/viewInsert.php';
  if (DEBUG)
   echo ("ControllerStock : selectionnerVaccin : vue = $vue");
  require ($vue);
 }
 
  public static function attribuerDoses($info) {
  $results = ModelStock::updateVaccins($_GET);
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/stock/viewUpdated.php';
  if (DEBUG)
   echo ("ControllerStock : attribuerDoses : vue = $vue");
  require ($vue);
 }
 
 public static function stats() {
  $results = ModelStock::getStats();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/stock/viewStats.php';
  if (DEBUG)
   echo ("ControllerStock : stats : vue = $vue");
  require ($vue);
 }
 
 public static function choixVaccinEtCentre() {
  $results = ModelStock::getVaccins();
  $results2 = ModelStock::getCentres();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/stock/viewInitStock.php';
  if (DEBUG)
   echo ("ControllerStock : stats : vue = $vue");
  require ($vue);
 }
 
 public static function initStock($info) {
  $results = ModelStock::initialiserStock($_GET['centre'], $_GET['vaccin']);
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/stock/viewInitConfirmed.php';
  if (DEBUG)
   echo ("ControllerStock : stats : vue = $vue");
  require ($vue);
 }
 
 
}
?>
<!-- ----- fin ControllerStock -->


