
<!-- ----- debut Modelatient -->

<?php
require_once 'Model.php';

class ModelStock {
 private $centre_id, $vaccin_id, $quantite;

 // pas possible d'avoir 2 constructeurs
 function __construct($centre_id, $vaccin_id, $quantite) {
     $this->centre_id = $centre_id;
     $this->vaccin_id = $vaccin_id;
     $this->quantite = $quantite;
 }

 function getCentre_id() {
     return $this->centre_id;
 }

 function getVaccin_id() {
     return $this->vaccin_id;
 }

 function getQuantite() {
     return $this->quantite;
 }

 function setCentre_id($centre_id) {
     $this->centre_id = $centre_id;
 }

 function setVaccin_id($vaccin_id) {
     $this->vaccin_id = $vaccin_id;
 }

 function setQuantite($quantite) {
     $this->quantite = $quantite;
 }

 


 
 public static function getAll() {
  try {
   $database = Model::getInstance();
   $query = "select centre.label as centrelabel, vaccin.label as vaccinlabel, stock.quantite from centre join stock on centre.id = stock.centre_id join vaccin on vaccin.id = stock.vaccin_id";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll();
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 
 public static function getSum() {
  try {
   $database = Model::getInstance();
   $query = "select vaccin.label, sum(stock.quantite) as total from stock join vaccin where stock.vaccin_id = vaccin.id group by vaccin.id order by sum(stock.quantite) desc";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll();
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

  public static function getListeCentres() {
  try {
   $database = Model::getInstance();
   $query = "select label from centre";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 public static function getVaccinsAssocies($centre_selectionne) {
  try {
   $database = Model::getInstance();
   $query = "select vaccin.label from stock join vaccin on stock.vaccin_id = vaccin.id join centre on stock.centre_id = centre.id where centre.label = :label";
   $statement = $database->prepare($query);
   $statement->execute([
     'label' => $centre_selectionne
   ]);
   $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
  public static function updateVaccins($info_get) {
  try {
   $database = Model::getInstance();
   $centre = $info_get['centre_selectionne'];
   
   foreach ($info_get as $key => $value) {
       if ($key != 'centre_selectionne' AND $key != 'action') {
           $query = "UPDATE stock JOIN vaccin on stock.vaccin_id = vaccin.id JOIN centre on stock.centre_id = centre.id SET stock.quantite = stock.quantite + :quantite WHERE centre.label = :centre AND vaccin.label = :vaccin";
           $statement = $database->prepare($query);
           $statement->execute([
               'quantite' => $value,
           'centre' => $centre,
           'vaccin' => $key
           ]);
           $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
       }
   }
   
   
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
  public static function getStats() {
  try {
   $database = Model::getInstance();
   $query = "select vaccin.label, sum(stock.quantite) as total from stock join vaccin where stock.vaccin_id = vaccin.id group by vaccin.id";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll();
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 public static function getVaccins() {
  try {
   $database = Model::getInstance();
   $query = "select * from vaccin";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll();
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 public static function getCentres() {
  try {
   $database = Model::getInstance();
   $query = "select * from centre";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll();
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
  public static function initialiserStock($centre_id, $vaccin_id) {
  try {
   $database = Model::getInstance();
   $query = "insert into stock values (:centre_id, :vaccin_id, 0)";
   $statement = $database->prepare($query);
   $statement->execute([
           'centre_id' => $centre_id,
           'vaccin_id' => $vaccin_id
           ]);
   $results = $statement->fetchAll();
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

}
?>
<!-- ----- fin ModelPatient -->
