<?php

class Pokemon
{
    private $id;
    private $numero;
    private $nom;
    private $evolution;
    private $sexe;
    private $xp;
    private $niveau;
    private $prixVente;
    private $enVente;
    private $types;
    private $courbeXp;
    private $dernierEntrainement;

    /**
     * Pokemon constructor.
     * @param $id
     * @param $numero
     * @param $nom
     * @param $evolution
     * @param $sexe
     * @param $xp
     * @param $niveau
     * @param $prixVente
     * @param $enVente
     * @param $types
     * @param $courbeXp
     * @param $dernierEntrainement
     */
    public function __construct($id, $numero, $nom, $evolution, $sexe, $xp, $niveau, $prixVente, $enVente, $types, $courbeXp, $dernierEntrainement)
    {
        $this->id = $id;
        $this->numero = $numero;
        $this->nom = $nom;
        $this->evolution = $evolution;
        $this->sexe = $sexe;
        $this->xp = $xp;
        $this->niveau = $niveau;
        $this->prixVente = $prixVente;
        $this->enVente = $enVente;
        $this->types = $types;
        $this->courbeXp = $courbeXp;
        $this->dernierEntrainement = $dernierEntrainement;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getEvolution()
    {
        return $this->evolution;
    }

    /**
     * @param mixed $evolution
     */
    public function setEvolution($evolution)
    {
        $this->evolution = $evolution;
    }

    /**
     * @return mixed
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * @param mixed $sexe
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
    }

    /**
     * @return mixed
     */
    public function getXp()
    {
        return $this->xp;
    }

    /**
     * @param mixed $xp
     */
    public function setXp($xp)
    {
        $this->xp = $xp;
    }

    /**
     * @return mixed
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * @param mixed $niveau
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;
    }

    /**
     * @return mixed
     */
    public function getPrixVente()
    {
        return $this->prixVente;
    }

    /**
     * @param mixed $prix_vente
     */
    public function setPrixVente($prixVente)
    {
        $this->prixVente = $prixVente;
    }

    /**
     * @return mixed
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * @param mixed $types
     */
    public function setTypes($types)
    {
        $this->types = $types;
    }

    /**
     * @return mixed
     */
    public function getEnVente()
    {
        return $this->enVente;
    }

    /**
     * @param mixed $enVente
     */
    public function setEnVente($enVente)
    {
        $this->enVente = $enVente;
    }

    /**
     * @return mixed
     */
    public function getCourbeXp()
    {
        return $this->courbeXp;
    }

    /**
     * @param mixed $courbeXp
     */
    public function setCourbeXp($courbeXp)
    {
        $this->courbeXp = $courbeXp;
    }

    /**
     * @return mixed
     */
    public function getDernierEntrainement()
    {
        return $this->dernierEntrainement;
    }

    /**
     * @param mixed $dernierEntrainement
     */
    public function setDernierEntrainement($dernierEntrainement)
    {
        $this->dernierEntrainement = $dernierEntrainement;
    }


    
}