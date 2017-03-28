<?php

class Dresseur
{
    private $id;
    private $nom;
    private $nbPieces;

    /**
     * Dresseur constructor.
     * @param $id
     * @param $nom
     * @param $nbPieces
     */
    public function __construct($id, $nom, $nbPieces)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->nbPieces = $nbPieces;
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
     * @return int
     */
    public function getNbPieces()
    {
        return $this->nbPieces;
    }

    /**
     * @param int $nbPieces
     */
    public function setNbPieces($nbPieces)
    {
        $this->nbPieces = $nbPieces;
    }


}