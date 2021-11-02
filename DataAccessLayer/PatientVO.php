<?php
   class PatientVO {
   protected $numClient;   
   protected $numeroPatient;  
   protected $nom;
   protected $adresse;
   protected $birth;
   protected $email;
   protected $lieuNaissance;
   protected $sexe;
   protected $tel;
   protected $date;

   // rdv
   protected $dateRdv;
   protected $payement;
   protected $numeroTypeConsultation;
   protected $consultation;
   protected $numeroDocteur;
   protected $password;
   protected $numRdv;
   protected $message;


   // id doc
   public function setNumeroDocteur($numeroDocteur) {
   $this->numeroDocteur = $numeroDocteur;
   }
   public function getNumeroDocteur() {
   return $this->numeroDocteur;
   } 
   

    // id client
   public function setNumeroPatient($numeroPatient) {
   $this->numeroPatient = $numeroPatient;
   }
   public function getNumeroPatient() {
   return $this->numeroPatient;
   } 
   
   // nom
   public function setNom($nom) {
   $this->nom = $nom;
   }
   public function getNom() {
   return $this->nom;
   }

   // Birth
   public function setDate($birth) {
   $this->birth = $birth;
   }
   public function getDate() {
   return $this->birth;
   } 

   /// lieu naissance
   public function setLieuNaissance($lieuNaissance) {
   $this->lieuNaissance = $lieuNaissance;
   }
   public function getLieuNaissance() {
   return $this->lieuNaissance;
   }    
 
  // sexe
   public function setSexe($sexe) {
   $this->sexe = $sexe;
   }
   public function getSexe() {
   return $this->sexe;
   }

   // Adresse
   public function setAdresse($adresse) {
   $this->adresse = $adresse;
   }
   public function getAdresse() {
   return $this->adresse;
   }
       
    // email
   public function setEmail($email) {
   $this->email = $email;
   }
   public function getEmail() {
   return $this->email;
   }  
    
    // tel
   public function setTelephone($tel) {
   $this->tel = $tel;
   }
   public function getTelephone() {
   return $this->tel;
   }

  
   // payement
   public function setPayement($payement) {
   $this->payement = $payement;
   }
   public function getPayement() {
   return $this->payement;
   } 

   // message
   public function setMessage($message) {
   $this->message = $message;
   }
   public function getMessage() {
   return $this->message;
   } 

    // message
   public function setPassword($password) {
   $this->password = $password;
   }
   public function getPassword() {
   return $this->password;
   } 

   public function setNomConsultation($consultation) {
   $this->consultation = $consultation;
   }
   public function getNomConsultation() {
   return $this->consultation;
   }

   // consultation
   public function setNumRdv($numRdv) {
   $this->numRdv = $numRdv;
   }
   public function getNumRdv() {
   return $this->numRdv;
   }


    public function setNumeroTypeConsultation($numeroTypeConsultation) {
   $this->numeroTypeConsultation = $numeroTypeConsultation;
   }
   public function getNumeroTypeConsultation() {
   return $this->numeroTypeConsultation;
   }

    // date rdv
   public function setDateRdv($dateRdv) {
   $this->dateRdv = $dateRdv;
   }
   public function getDateRdv() {
   return $this->dateRdv;
   }




   }
   
   
   ?>