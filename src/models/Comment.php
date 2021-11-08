<?php

namespace App\src\models;

class Comment extends AbstractManager {

    /**
     * @var int $com_id comment ID
     */
    private $idCom;

    /**
     * @var string $content_com comment content
     */
    private $contentCom;

    /**
     * @var string $autor_com comment autor
     */
    private $autorCom;

    /**
     * @var string $date_com comment date
     */
    private $dateCom;

    /**
     * @var string $dateUpdate_com comment dateUpdate
     */
    private $dateUpdateCom;

    /**
     * @var bool $statut_com comment statut
     */
    private $statutCom;

    /**
     * @var bool $isDeleted_com comment isDeleted
     */
    private $isDeletedCom;

    /**
     * @var int $id_art comment id article
     */
    private $idArt;

    /**
     * @var int id_user comment id user
     */
    private $idUser;

    public function __construct($datas = [])
    {
        // Nous définissons la table par défaut de ce modèle
        $this->table = "comment";
            
        // Nous ouvrons la connexion à la base de données
        $this->getConnection();

        if (!empty($datas)) {
            $this->hydrate($datas);
        }
    }

    public function hydrate($datas)
    {

        foreach ($datas as $key => $value) {
            $key = lcfirst(str_replace('_', '', ucwords($key, '_')));
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getIdCom()
    {
        return $this->idCom;
    }

    /**
     * @param mixed $id_com
     * @return Comment
     */
    public function setIdCom($idCom)
    {
        $this->idCom = $idCom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContentCom()
    {
        return $this->contentCom;
    }

    /**
     * @param mixed $content_com
     * @return Comment
     */
    public function setContentCom($contentCom)
    {
        $this->contentCom = $contentCom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAutorCom()
    {
        return $this->autorCom;
    }

    /**
     * @param mixed $autor_com
     * @return Comment
     */
    public function setAutorCom($autorCom)
    {
        $this->autorCom = $autorCom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateCom()
    {
        return $this->dateCom;
    }

    /**
     * @param mixed $date_com
     * @return Comment
     */
    public function setDateCom($dateCom)
    {
        $this->dateCom = $dateCom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateUpdateCom()
    {
        return $this->dateUpdateCom;
    }

    /**
     * @param mixed $dateUpdate_com
     * @return Comment
     */
    public function setDateUpdateCom($dateUpdateCom)
    {
        $this->dateUpdateCom = $dateUpdateCom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatutCom()
    {
        return $this->statutCom;
    }

    /**
     * @param mixed $statut_com
     * @return Comment
     */
    public function setStatutCom($statutCom)
    {
        $this->statutCom = $statutCom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsDeletedCom()
    {
        return $this->isDeletedCom;
    }

    /**
     * @param mixed $isDeleted_com
     * @return Comment
     */
    public function setIsDeletedCom($isDeletedCom)
    {
        $this->isDeletedCom = $isDeletedCom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdArt()
    {
        return $this->idArt;
    }

    /**
     * @param mixed $id_art
     * @return Comment
     */
    public function setIdArt($idArt)
    {
        $this->idArt = $idArt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param mixed $id_user
     * @return Comment
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
        return $this;
    }
}