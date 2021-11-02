<?php
   include ("../DataAccessLayer/PatientVO.php");
      include ("../DataAccessLayer/DatesRdvDAO.php");

   
   // Cette classe permet d'executer les requete concernant la table client 
   class PatientDAO {
       
   protected $connect;
   protected $db;
   protected $id;	// Variable qui va contenir le id entrer par l'user
   protected $lastId; // Variable qui va contenir le dernier id inserer dans la bd
   
       
   // Initialisation de la base de données
   public function PatientDAO() {
   $this->connect = mysqli_connect("localhost", "root", "") or die("Erreur de connexion".mysqli_error());
   $this->db = mysqli_select_db($this->connect,"cliniquesb");
   
   }
       // Execution de la requite SQL.
   protected function execute($sql) {
   $res = mysqli_query($this->connect, $sql) or die(mysqli_error($this->connect));
      
   }

       // Execution de la requete pour avoir les infos d'un patient
   protected function executeInfosClient($sql) {
       $res = mysqli_query($this->connect, $sql) or die(mysqli_error($this->connect));
           
       if(mysqli_num_rows($res) > 0) {
       for($i = 0; $i < mysqli_num_rows($res); $i++) {
       $row = mysqli_fetch_assoc($res);
           
       $patientvo[$i] = new PatientVO();
       $patientvo[$i]->setNumeroPatient($row['NumeroPatient']);
       $patientvo[$i]->setNom($row['NomPrenom']);
       $patientvo[$i]->setDate($row['DateNaissance']);
       $patientvo[$i]->setLieuNaissance($row['LieuNaissance']);
       $patientvo[$i]->setSexe($row['Sexe']);
       $patientvo[$i]->setTelephone($row['Telephone']);
       $patientvo[$i]->setEmail($row['Email']);
       $patientvo[$i]->setAdresse($row['Adresse']);
    
       }
   }
   return $patientvo;
   }

          // Execution de la requete pour avoir les infos d'un patient
   protected function executeInfosClient2($sql) {
       $res = mysqli_query($this->connect, $sql) or die(mysqli_error($this->connect));
           
       if(mysqli_num_rows($res) > 0) {
       for($i = 0; $i < mysqli_num_rows($res); $i++) {
       $row = mysqli_fetch_assoc($res);
           
       $patientvo[$i] = new PatientVO();
       $patientvo[$i]->setNumeroPatient($row['NumeroPatient']);
       $patientvo[$i]->setNom($row['NomPrenom']);
       $patientvo[$i]->setDate($row['DateNaissance']);
       $patientvo[$i]->setLieuNaissance($row['LieuNaissance']);
       $patientvo[$i]->setSexe($row['Sexe']);
       $patientvo[$i]->setTelephone($row['Telephone']);
       $patientvo[$i]->setEmail($row['Email']);
       $patientvo[$i]->setAdresse($row['Adresse']);
  
       }
   }
   return $patientvo;
   }


        // Execution de la requete pour avoir les infos d'un client
   protected function executeRdv($sql) {
       $res = mysqli_query($this->connect, $sql) or die(mysqli_error($this->connect));
           
       if(mysqli_num_rows($res) > 0) {
       for($i = 0; $i < mysqli_num_rows($res); $i++) {
       $row = mysqli_fetch_assoc($res);
           
       $patientvo[$i] = new PatientVO();

      // $patientvo[$i]->setNumeroRdv($row['NumeroRdv']);
       $patientvo[$i]->setNom($row['Nom']);
       $patientvo[$i]->setNumRdv($row['NumeroRdv']);
       $patientvo[$i]->setNumeroTypeConsultation($row['NumeroTypeConsultation']);
       $patientvo[$i]->setNomConsultation($row['Consultation']);
       $patientvo[$i]->setDateRdv($row['DateRdv']);
       $patientvo[$i]->setNomConsultation($row['Consultation']);
       $patientvo[$i]->setNumeroDocteur($row['NumeroDocteur']);
       $patientvo[$i]->setPayement($row['Payement']);
       $patientvo[$i]->setMessage($row['MessagePatient']);
   
       }
   }
   return $patientvo;
   }
   
   
     //requete qui Retourne les infos d'un patient apres l'envoie du formulaire
   public function getInfosPatient(){
    $sql = "SELECT * FROM patient INNER JOIN rendezvous ON patient.NumeroPatient = rendezvous.NumeroPatient ORDER BY rendezvous.NumeroPatient DESC LIMIT 1";
   
       return $this->executeInfosClient2($sql);
   } 

      // requete pour avoir les infos d'un patient dans la page espace client
   public function getInfos_espacePatient(){
     if(isset($_SESSION['NumeroPatient'])){
       $id = mysqli_real_escape_string($this->connect, ($_SESSION['NumeroPatient']));
       $sql = "SELECT *FROM patient WHERE NumeroPatient='$id'";
     }      
          return $this->executeInfosClient($sql);   

   }



   // requete qui retoure les infos du rdv d'un patient
   public function getInfosRdv(){
   
       $id = mysqli_real_escape_string($this->connect, ($_SESSION['NumeroPatient']));
       $sql = "SELECT * FROM rendezvous WHERE NumeroPatient='$id'";
                 return $this->executeRdv($sql); 

   }

   
       // Requete qui Retourne les infos d'un ancien client apres sa nouvelle commande
   public function getInfosAncienClient(){
           $id = mysqli_real_escape_string($this->connect, $_POST['num']);
           $sql = "SELECT *FROM patient INNER JOIN rendezvous ON patient.NumeroPatient = rendezvous.NumeroPatient WHERE patient.NumeroPatient='".$id."' ";

           return $this->executeInfosClient2($sql);

   }



       // Requete pour un inserer la nouvelle consultation d'un ancien patient dans la table rendez-vous
   public function newRdv_AncienPatient(PatientVO $patient, ConsultationVO $consultation){
       if(isset($_SESSION['NumeroPatient'])){
       $id = mysqli_real_escape_string($this->connect, ($_SESSION['NumeroPatient']));

          $sql = "INSERT INTO rendezvous (NumeroPatient, Nom, NumeroTypeConsultation, Consultation, DateRdv, Payement, MessagePatient) 
          SELECT '". $_SESSION['NumeroPatient'].
                 "', patient.NomPrenom'". 
                "','" . $consultation->getNumeroTypeConsultation().
                "','" . $consultation->getNomConsultation().
                "','" . $patient->getDateRdv().
                "','" . $patient->getPayement().
                "','" . $patient->getMessage(). "' 
          FROM patient INNER JOIN rendezvous ON patient.NumeroPatient = rendezvous.NumeroPatient WHERE patient.NumeroPatient='$id'";
              return $this->execute($sql);

       }
   }



     // Requete pour inserer un nouveau patient dans la table patient  
   public function Create_Patient(PatientVO $patient){
       $sql = "INSERT INTO patient (NomPrenom, DateNaissance, LieuNaissance, Sexe, Telephone, Email, Adresse, Password)"
           . "VALUES(
                '" . $patient->getNom()
           . "','" . $patient->getDate()
           . "','" . $patient->getLieuNaissance()
           . "','" . $patient->getSexe()
           . "','" . $patient->getTelephone()
           . "','" . $patient->getEmail()
           . "','" . $patient->getAdresse()
           . "','" . $patient->getPassword()
           . "');" ;
           $lastId = mysqli_insert_id($this->connect);
   
       return $this->execute($sql);
   }

       
     // Requete pour insert les informations d'un patient dans la table rendezvous 
   public function insert_Into_rdv(PatientVO $patient, ConsultationVO $consultation){
   // $val =  mysqli_real_escape_string($this->connect, $patient->getNumeroTypeConsultation() );
    $a =  $consultation->getNumeroTypeConsultation();
    $sql = "INSERT INTO rendezvous (NumeroPatient, Nom, NumeroTypeConsultation, Consultation, DateRdv, Payement, MessagePatient) "
           . "VALUES('". mysqli_insert_id($this->connect)
           . "','" . $patient->getNom()    
           . "','" . $consultation->getNumeroTypeConsultation()          
           . "','" . $consultation->getNomConsultation()  
           . "','" . $patient->getDateRdv()    
           . "','" . $patient->getPayement()
           . "','" . $patient->getMessage()
           . "');" ;

       return $this->execute($sql);     
   }
   
   
   }
   ?>