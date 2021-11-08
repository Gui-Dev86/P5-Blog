<?php

namespace App\src\models;

class Article extends AbstractManager {

    /**
     * @var int $art_id art ID
     */
    private $idArt;

     /**
     * @var string $art_title art title
     */
    private $titleArt;

     /**
     * @var string $art_chapo art chapo
     */
    private $chapoArt;

     /**
     * @var string $art_content art content
     */
    private $contentArt;

     /**
     * @var string $art_autor art autor
     */
    private $autorArt;

     /**
     * @var string $art_date art date
     */
    private $dateArt;

     /**
     * @var string $art_dateUpdate art dateUpdate
     */
    private $dateUpdateArt;

     /**
     * @var string $art_image art image
     */
    private $imageArt;

    /**
     * @var string $art_altImage art altImage
     */
    private $altImageArt;

     /**
     * @var bool $art_isActive art isActive
     */
    private $isActiveArt;

     /**
     * @var int $user_id art ID user
     */
    private $idUser;

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
    public function getIdArt()
    {
        return $this->idArt;
    }

    /**
     * @param mixed $id_art
     * @return Article
     */
    public function setIdArt($idArt)
    {
        $this->idArt = $idArt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitleArt()
    {
        return $this->titleArt;
    }

    /**
     * @param mixed $title_art
     * @return Article
     */
    public function setTitleArt($titleArt)
    {
        $this->titleArt = $titleArt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getChapoArt()
    {
        return $this->chapoArt;
    }

    /**
     * @param mixed $chapo_art
     * @return Article
     */
    public function setChapoArt($chapoArt)
    {
        $this->chapoArt = $chapoArt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContentArt()
    {
        return $this->contentArt;
    }

    /**
     * @param mixed $content_art
     * @return Article
     */
    public function setContentArt($contentArt)
    {
        $this->contentArt = $contentArt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAutorArt()
    {
        return $this->autorArt;
    }

    /**
     * @param mixed $autor_art
     * @return Article
     */
    public function setAutorArt($autorArt)
    {
        $this->autorArt = $autorArt;
        return $this;
    }

      /**
     * @return mixed
     */
    public function getDatArt()
    {
        return $this->dateArt;
    }

    /**
     * @param mixed $date_art
     * @return Article
     */
    public function setDateArt($dateArt)
    {
        $this->dateArt = $dateArt;
        return $this;
    }

      /**
     * @return mixed
     */
    public function getDateUpdateArt()
    {
        return $this->dateUpdateArt;
    }

    /**
     * @param mixed $dateUpdate_art
     * @return Article
     */
    public function setDateUpdateArt($dateUpdateArt)
    {
        $this->dateUpdateArt = $dateUpdateArt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImageArt()
    {
        return $this->imageArt;
    }

    /**
     * @param mixed $image_art
     * @return Article
     */
    public function setImageArt($imageArt)
    {
        $this->imageArt = $imageArt;
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getAltImageArt()
    {
        return $this->altImageArt;
    }

    /**
     * @param mixed $altImage_art
     * @return Article
     */
    public function setaltImageArt($altImageArt)
    {
        $this->altImageArt = $altImageArt;
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getIsActiveArt()
    {
        return $this->isActiveArt;
    }

    /**
     * @param mixed $isActive_art
     * @return Article
     */
    public function setIsActiveArt($isActiveArt)
    {
        $this->isActiveArt = $isActiveArt;
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idAser;
    }

    /**
     * @param mixed $id_user
     * @return Article
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
        return $this;
    }
}