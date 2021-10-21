<?php

namespace App\src\models;

class Comment extends AbstractManager {

    /**
     * @var int $com_id comment ID
     */
    private $id_com;

    /**
     * @var string $content_com comment content
     */
    private $content_com;

    /**
     * @var string $autor_com comment autor
     */
    private $autor_com;

    /**
     * @var string $date_com comment date
     */
    private $date_com;

    /**
     * @var string $dateUpdate_com comment dateUpdate
     */
    private $dateUpdate_com;

    /**
     * @var bool $statut_com comment statut
     */
    private $statut_com;

    /**
     * @var bool $isDeleted_com comment isDeleted
     */
    private $isDeleted_com;

    /**
     * @var int $id_art comment id article
     */
    private $id_art;

    /**
     * @var int id_user comment id user
     */
    private $id_user;

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
        return $this->id_com;
    }

    /**
     * @param mixed $id_com
     * @return Comment
     */
    public function setId_com($id_com)
    {
        $this->id_com = $id_com;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContent_com()
    {
        return $this->content_com;
    }

    /**
     * @param mixed $content_com
     * @return Comment
     */
    public function setContent_com($content_com)
    {
        $this->content_com = $content_com;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAutor_com()
    {
        return $this->autor_com;
    }

    /**
     * @param mixed $autor_com
     * @return Comment
     */
    public function setAutor_com($autor_com)
    {
        $this->autor_com = $autor_com;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate_com()
    {
        return $this->date_com;
    }

    /**
     * @param mixed $date_com
     * @return Comment
     */
    public function setDate_com($date_com)
    {
        $this->date_com = $date_com;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateUpdate_com()
    {
        return $this->dateUpdate_com;
    }

    /**
     * @param mixed $dateUpdate_com
     * @return Comment
     */
    public function setDateUpdate_com($dateUpdate_com)
    {
        $this->dateUpdate_com = $dateUpdate_com;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatut_com()
    {
        return $this->statut_com;
    }

    /**
     * @param mixed $statut_com
     * @return Comment
     */
    public function setStatut_com($statut_com)
    {
        $this->statut_com = $statut_com;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsDeleted_com()
    {
        return $this->isDeleted_com;
    }

    /**
     * @param mixed $isDeleted_com
     * @return Comment
     */
    public function setIsDeleted_com($isDeleted_com)
    {
        $this->isDeleted_com = $isDeleted_com;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId_art()
    {
        return $this->id_art;
    }

    /**
     * @param mixed $id_art
     * @return Comment
     */
    public function setId_art($id_art)
    {
        $this->id_art = $id_art;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * @param mixed $id_user
     * @return Comment
     */
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;
        return $this;
    }
}