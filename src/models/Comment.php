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
    public function getId_com()
    {
        return $this->idCom;
    }

    /**
     * @param mixed $id_com
     * @return Comment
     */
    public function setId_com($idCom)
    {
        $this->idCom = $idCom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContent_com()
    {
        return $this->contentCom;
    }

    /**
     * @param mixed $content_com
     * @return Comment
     */
    public function setContent_com($contentCom)
    {
        $this->contentCom = $contentCom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAutor_com()
    {
        return $this->autorCom;
    }

    /**
     * @param mixed $autor_com
     * @return Comment
     */
    public function setAutor_com($autorCom)
    {
        $this->autorCom = $autorCom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate_com()
    {
        return $this->dateCom;
    }

    /**
     * @param mixed $date_com
     * @return Comment
     */
    public function setDate_com($dateCom)
    {
        $this->dateCom = $dateCom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateUpdate_com()
    {
        return $this->dateUpdateCom;
    }

    /**
     * @param mixed $dateUpdate_com
     * @return Comment
     */
    public function setDateUpdate_com($dateUpdateCom)
    {
        $this->dateUpdateCom = $dateUpdateCom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatut_com()
    {
        return $this->statutCom;
    }

    /**
     * @param mixed $statut_com
     * @return Comment
     */
    public function setStatut_com($statutCom)
    {
        $this->statutCom = $statutCom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsDeleted_com()
    {
        return $this->isDeletedCom;
    }

    /**
     * @param mixed $isDeleted_com
     * @return Comment
     */
    public function setIsDeleted_com($isDeletedCom)
    {
        $this->isDeletedCom = $isDeletedCom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId_art()
    {
        return $this->idArt;
    }

    /**
     * @param mixed $id_art
     * @return Comment
     */
    public function setId_art($idArt)
    {
        $this->idArt = $idArt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId_user()
    {
        return $this->idUser;
    }

    /**
     * @param mixed $id_user
     * @return Comment
     */
    public function setId_user($idUser)
    {
        $this->idUser = $idUser;
        return $this;
    }
}