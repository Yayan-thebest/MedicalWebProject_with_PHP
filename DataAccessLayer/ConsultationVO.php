<?php
   class ConsultationVO {
   protected $nomConsultation;
   protected $numeroTypeConsultation;
   protected $prix;
   protected $horaireConsultation;
   protected $horaire1, $horaire2, $horaire3, $horaire4;

   protected $nomDocteur;
   protected $numeroDocteur;
   protected $salaireDocteur;
   protected $birthDocteur;
   protected $lieuNDocteur;
   protected $telDocteur;
   protected $emailDocteur;


       public function setNumeroTypeConsultation($numeroTypeConsultation) {
       $this->numeroTypeConsultation = $numeroTypeConsultation;
       }
       public function getNumeroTypeConsultation() {
       return $this->numeroTypeConsultation;
       }

       public function setNomConsultation($nomConsultation)
       {
       $this->nomConsultation = $nomConsultation;
       }
       public function getNomConsultation() {
       return $this->nomConsultation;
       }

       public function setPrix($prix)
       {
       $this->prix = $prix;
       }
       public function getPrix() {
       return $this->prix;
       }
       public function setHoraire1($horaire1)
       {
       $this->horaire1 = $horaire1;
       }
       public function getHoraire1() {
       return $this->horaire1;
       }

        public function setHoraire2($horaire2)
       {
       $this->horaire2 = $horaire2;
       }
       public function getHoraire2() {
       return $this->horaire2;
       }
        public function setHoraire3($horaire3)
       {
       $this->horaire3 = $horaire3;
       }
       public function getHoraire3() {
       return $this->horaire3;
       }

       public function setHoraire4($horaire4)
       {
       $this->horaire4 = $horaire4;
       }
       public function getHoraire4() {
       return $this->horaire4;
       }


       public function setHoraireConsultation($horaireConsultation)
       {
       $this->horaireConsultation = $horaireConsultation;
       }
       public function getHoraireConsultation() {
       return $this->horaireConsultation;
       }

       // info docteur
       public function setNomDocteur($nomDocteur)
       {
       $this->nomDocteur = $nomDocteur;
       }
       public function getNomDocteur() {
       return $this->nomDocteur;
       }

       public function setNumeroDocteur($numeroDocteur)
       {
       $this->numeroDocteur = $numeroDocteur;
       }
       public function getNumeroDocteur() {
       return $this->numeroDocteur;
       }

       public function setSalaireDocteur($salaireDocteur)
       {
       $this->salaireDocteur = $salaireDocteur;
       }
       public function getSalaireDocteur() {
       return $this->salaireDocteur;
       }

       public function setBirthDocteur($birthDocteur)
       {
       $this->birthDocteur = $birthDocteur;
       }
       public function getBirthDocteur() {
       return $this->birthDocteur;
       }

       public function setLieuNDocteur($lieuNDocteur)
       {
       $this->lieuNDocteur = $lieuNDocteur;
       }
       public function getLieuNDocteur() {
       return $this->lieuNDocteur;
       }

       public function setTelDocteur($telDocteur)
       {
       $this->telDocteur = $telDocteur;
       }
       public function getTelDocteur() {
       return $this->telDocteur;
       }
       public function setEmailDocteur($emailDocteur)
       {
       $this->emailDocteur = $emailDocteur;
       }
       public function getEmailDocteur() {
       return $this->emailDocteur;
       }
       
   }
   ?>