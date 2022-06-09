
<!-- ----- debut ModelRdv -->

<?php
require_once 'Model.php';

class ModelRdv {
 private $centre_id, $patient_id, $injection, $vaccin_d;

 function __construct($centre_id, $patient_id, $injection, $vaccin_id) {
     $this->centre_id = $centre_id;
     $this->patient_id = $patient_id;
     $this->injection = $injection;
     $this->vaccin_d = $vaccin_d;
 }

 function getCentre_id() {
     return $this->centre_id;
 }

 function getPatient_id() {
     return $this->patient_id;
 }

 function getInjection() {
     return $this->injection;
 }

 function getVaccin_id() {
     return $this->vaccin_id;
 }

 function setCentre_id($centre_id) {
     $this->centre_id = $centre_id;
 }

 function setPatient_id($patient_id) {
     $this->patient_id = $patient_id;
 }

 function setInjection($injection) {
     $this->injection = $injection;
 }

 function setVaccin_id($vaccin_d) {
     $this->vaccin_id = $vaccin_id;
 }

public static function getListePatient() {
  try {
   $database = Model::getInstance();
   $query = "select id, nom, prenom from patient";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll();
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 public static function getSituationVaccinale($patient_id) {
  try {
   $database = Model::getInstance();
   $query = "select centre_id, injection, vaccin_id from rendezvous where patient_id = :id";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $patient_id
   ]);
   $results = $statement->fetchAll();
   
   $i = 0;
   $vaccin_realise = array();
   $compare_injection = array();
   
   if (empty($results['vaccin_id'])) {
          $results['vaccin_id'] = 0;
      }
   
   foreach ($results as $data) {
       
       $compare_injection[$i] = $data['injection'];
       $vaccin_realise[$i] = $data['vaccin_id'];
       $i = $i+1;
   }
   
  $info_return['injections_realisees'] = max($compare_injection);
  $info_return['vaccin_id'] = $vaccin_realise[0];
  
  $query = "select doses from vaccin where id = :id";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $info_return['vaccin_id']
   ]);
   
   $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
   
   $info_return['doses_necessaires'] = $results;
   
   return $info_return;
   
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 public static function getListeCentre() {
  try {
   $database = Model::getInstance();
   $query = "select id, label, adresse from centre";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll();
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 public static function getListeCentreDispos($id) {
  try {
   $database = Model::getInstance();
   $query = "select centre.id, centre.label, centre.adresse from centre join stock on centre.id = stock.centre_id where stock.vaccin_id = :id and stock.quantite>0";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id
   ]);
   $results = $statement->fetchAll();
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 public static function ajouterRdv($centre_id, $patient_id, $injection, $vaccin_id) {
  try {
   $database = Model::getInstance();
   
   if ($vaccin_id == "nd") {
       $query = "select vaccin_id, quantite from stock where centre_id = :centre_id and quantite = (select max(quantite) from stock where centre_id = :centre_id)";
       $statement = $database->prepare($query);
       $statement->execute([
          'centre_id' => $centre_id
       ]);
       $results = $statement->fetchAll();
       print_r($results);
       $vaccin_id = $results[0]['vaccin_id'];
       echo $vaccin_id;
   }


   $query = "insert into rendezvous value (:centre_id, :patient_id, :injection, :vaccin_id)";
   $statement = $database->prepare($query);
   $statement->execute([
     'centre_id' => $centre_id,
     'patient_id' => $patient_id,
     'injection' => $injection+1,
     'vaccin_id' => $vaccin_id
   ]);
   $results = $statement->fetchAll();
   
   
   $query = "update stock set quantite = quantite-1 where centre_id = :centre_id and vaccin_id = :vaccin_id";
   $statement = $database->prepare($query);
   $statement->execute([
     'centre_id' => $centre_id,
     'vaccin_id' => $vaccin_id
   ]);
   
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

  public static function getRdvParCentre() {
  try {
   $database = Model::getInstance();
   $query = "select centre.label, count(*) as total from rendezvous join centre on rendezvous.centre_id = centre.id group by centre.label";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll();
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 public static function getTotalPersonnesVaccinees() {
  try {
   $database = Model::getInstance();
   $query = "";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll();
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
}
?>
<!-- ----- fin ModelRdv -->
