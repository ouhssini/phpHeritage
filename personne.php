<?php

// Définition de la classe abstraite "Personne"
abstract class Personne
{
    // Propriétés protégées de la classe
    protected $numero; // Numéro de la personne
    protected $nom; // Nom de la personne
    protected $prenom; // Prénom de la personne
    protected $heursup; // Heures supplémentaires de la personne
    protected $salaireHoraire; // Salaire horaire de la personne

    // Constructeur de la classe
    public function __construct($numero, $nom, $prenom, $heursup, $salaireHoraire)
    {
        // Initialisation des propriétés avec les valeurs fournies en paramètres
        $this->numero = $numero;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->heursup = $heursup;
        $this->salaireHoraire = $salaireHoraire;
    }

    // Méthode magique pour obtenir la valeur d'une propriété
    public function __get($attr)
    {
        // Vérification de l'existence de la propriété
        if (property_exists($this, $attr)) {
            return $this->$attr;
        } else {
            return null;
        }
    }

    // Méthode magique pour définir la valeur d'une propriété
    public function __set($attr, $value)
    {
        // Vérification de l'existence de la propriété
        if (property_exists($this, $attr)) {
            $this->$attr = $value;
        }
    }

    // Méthode magique pour obtenir une représentation sous forme de chaîne de caractères de l'objet
    public function __toString()
    {
        return $this->numero . '-' . $this->nom  . ' ' . $this->prenom;
    }

    // Méthode abstraite pour calculer le salaire (doit être implémentée dans les classes filles)
    abstract public function calcSalaire();

}

