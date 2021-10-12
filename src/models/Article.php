<?php

namespace App\src\models;

class Article extends AbstractManager {

    /**
     * @var int $art_id art ID
     */
    private $id_art;

     /**
     * @var string $art_title art title
     */
    private $title_art;

     /**
     * @var string $art_chapo art chapo
     */
    private $chapo_art;

     /**
     * @var string $art_content art content
     */
    private $content_art;

     /**
     * @var string $art_autor art autor
     */
    private $autor_art;

     /**
     * @var string $art_date art date
     */
    private $date_art;

     /**
     * @var string $art_dateUpdate art dateUpdate
     */
    private $dateUpdate_art;

     /**
     * @var string $art_image art image
     */
    private $image_art;

    /**
     * @var string $art_altImage art altImage
     */
    private $altImage_art;

     /**
     * @var bool $art_isActive art isActive
     */
    private $isActive_art;

     /**
     * @var int $user_id art ID user
     */
    private $id_user;

    public function __construct($datas = [])
    {
        // Nous définissons la table par défaut de ce modèle
        $this->table = "article";
            
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
    public function getId_art()
    {
        return $this->id_art;
    }

    /**
     * @param mixed $id_art
     * @return Article
     */
    public function setId_art($id_art)
    {
        $this->id_art = $id_art;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle_art()
    {
        return $this->title_art;
    }

    /**
     * @param mixed $title_art
     * @return Article
     */
    public function setTitle_art($title_art)
    {
        $this->title_art = $title_art;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getChapo_art()
    {
        return $this->chapo_art;
    }

    /**
     * @param mixed $chapo_art
     * @return Article
     */
    public function setChapo_art($chapo_art)
    {
        $this->chapo_art = $chapo_art;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContent_art()
    {
        return $this->content_art;
    }

    /**
     * @param mixed $content_art
     * @return Article
     */
    public function setContent_art($content_art)
    {
        $this->content_art = $content_art;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAutor_art()
    {
        return $this->autor_art;
    }

    /**
     * @param mixed $autor_art
     * @return Article
     */
    public function setAutor_art($autor_art)
    {
        $this->autor_art = $autor_art;
        return $this;
    }

      /**
     * @return mixed
     */
    public function getDate_art()
    {
        return $this->date_art;
    }

    /**
     * @param mixed $date_art
     * @return Article
     */
    public function setDate_art($date_art)
    {
        $this->date_art = $date_art;
        return $this;
    }

      /**
     * @return mixed
     */
    public function getDateUpdate_art()
    {
        return $this->dateUpdate_art;
    }

    /**
     * @param mixed $dateUpdate_art
     * @return Article
     */
    public function setDateUpdate_art($dateUpdater_art)
    {
        $this->dateUpdate_art = $dateUpdate_art;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImage_art()
    {
        return $this->image_art;
    }

    /**
     * @param mixed $image_art
     * @return Article
     */
    public function setImage_art($image_art)
    {
        $this->image_art = $image_art;
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getAltImage_art()
    {
        return $this->altImage_art;
    }

    /**
     * @param mixed $altImage_art
     * @return Article
     */
    public function setaltImage_art($altImage_art)
    {
        $this->altImage_art = $altImage_art;
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getIsActive_art()
    {
        return $this->isActive_art;
    }

    /**
     * @param mixed $isActive_art
     * @return Article
     */
    public function setIsActive_art($isActive_art)
    {
        $this->isActive_art = $isActive_art;
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
     * @return Article
     */
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;
        return $this;
    }
}