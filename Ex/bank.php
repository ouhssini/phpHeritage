<?php

class CompteBancaire
{
    // attributs : numeroCompte, nom et solde. 
    protected $numeroCompte;
    protected $nom;
    protected $solde;


    public function __construct($num, $nom, $solde)
    {
        $this->numeroCompte = $num;
        $this->nom = $nom;
        $this->solde = $solde;
    }

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
        if (property_exists($this, $attr) && $attr != "solde") {
            $this->$attr = $value;
        }
    }



    public function  verser($montant)
    {
        try {
            if ($montant > 0) {
                $this->solde = $this->solde + $montant;
                echo "Le solde de votre compte est alimenté de: " . $montant . " DH";
            } else {
                echo "le montant doit être supérieur à 0";
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function retirer($montant)
    {
        try {
            if ($montant > 0 && $montant <= $this->solde) {
                $this->solde = $this->solde - $montant;
                echo "Vous avez retiré un montant de: " . $montant . " DH";
            } elseif ($montant == 0) {
                echo "le montant doit être supérieur à 0";
            } else {
                echo "votre solde est inssuffisant";
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function __toString()
    {
        return "Bonjour Monsieur  $this->nom, le numéro de votre compte est: $this->numeroCompte et votre solde est de $this->solde DH.\n";
    }
}



$compte1 = new CompteBancaire("123456", "Ahmed Ouhssini", 1000);
echo $compte1;
// $compte1->nom = "Mohamed Ouhssini";
$compte1->verser(20000);
$compte1->retirer(1020);