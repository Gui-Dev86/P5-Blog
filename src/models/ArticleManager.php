<?php

namespace App\src\models;

use PDO;

/**
 * ArticleManager for articles and comments 
 */
class ArticleManager extends AbstractManager {

    public function __construct()
    {
        // Nous définissons la table par défaut de ce modèle
        $this->table = "articleManager";
    
        // Nous ouvrons la connexion à la base de données
        $this->getConnection();
    }

    /**
     * Read all active articles for the page article
     *
     * @return void
     */
    public function readAllArticles($firstArticle, $articlesParPage){
        $sql = 'SELECT * FROM articles WHERE isActive_art = 1 ORDER BY dateUpdate_art DESC LIMIT :firstArticle, :articlesParPage';
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':firstArticle', $firstArticle, PDO::PARAM_INT);
        $query->bindValue(':articlesParPage', $articlesParPage, PDO::PARAM_INT);
        $query->execute();
        $dataArticles = $query->fetchAll();
        return $dataArticles;
    }

    /**
     * Count the active articles number for the pagination in the page article
     *
     * @return void
     */
    public function countAllArticles(){
        $sql = 'SELECT COUNT(*) AS nbArticles FROM articles WHERE isActive_art = 1';
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        $articlesCount = $query->fetch(PDO::FETCH_ASSOC);
        return $articlesCount;
    }
    
    /**
     * Read one article for open a page with a single article
     *
     * @return void
     */
    public function readArticle($idArt){
        $sql = 'SELECT * FROM articles where id_art = :id_art';
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':id_art', $idArt, PDO::PARAM_INT);
        $query->execute();
        $dataArticles = $query->fetchAll();
        return $dataArticles;
    }

     /**
     * Read all articles visible or not for the page admin article
     *
     * @return void
     */
    public function readAllArticlesAdmin($firstArticle, $articlesParPage){
        $sql = 'SELECT SUBSTR(title_art, 1, 30) AS title_art, autor_art, date_art, dateUpdate_art, isActive_art, id_art 
        FROM articles ORDER BY dateUpdate_art DESC LIMIT :firstArticle, :articlesParPage';
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':firstArticle', $firstArticle, PDO::PARAM_INT);
        $query->bindValue(':articlesParPage', $articlesParPage, PDO::PARAM_INT);
        $query->execute();
        $dataArticles = $query->fetchAll();
        return $dataArticles;
    }

     /**
     * Count the active articles number, visible or not for the pagination in the page article admin
     *
     * @return void
     */
    public function countAllArticlesAdmin(){
        $sql = 'SELECT COUNT(*) AS nbArticles FROM articles';
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        $articlesCount = $query->fetch(PDO::FETCH_ASSOC);
        return $articlesCount;
    }

    /**
     * Save new article
     *
     * @return void
     */
    public function newArticle(Article $article){
    $sql = 'INSERT INTO articles (title_art,chapo_art,content_art,autor_art,date_art,dateUpdate_art,image_art,altImage_art,isActive_art,id_user)
        VALUES (:title_art,:chapo_art,:content_art,:autor_art,:date_art,:dateUpdate_art,:image_art,:altImage_art,1,:id_user)';
        
        $query = $this->_connexion->prepare($sql);
        $query->bindValue('title_art',$article->getTitle_art(), PDO::PARAM_STR);
        $query->bindValue('chapo_art',$article->getChapo_art(), PDO::PARAM_STR);
        $query->bindValue('content_art',$article->getContent_art(), PDO::PARAM_STR);
        $query->bindValue('autor_art',$article->getAutor_art(), PDO::PARAM_STR);
        $query->bindValue('date_art',$article->getDate_art(), PDO::PARAM_STR);
        $query->bindValue('dateUpdate_art',$article->getDateUpdate_art(), PDO::PARAM_STR);
        $query->bindValue('image_art',$article->getImage_art(), PDO::PARAM_STR);
        $query->bindValue('altImage_art',$article->getAltImage_art(), PDO::PARAM_STR);
        $query->bindValue('id_user',$article->getId_user(), PDO::PARAM_INT);
        $query->execute();
    }

    /**
     * Read validate comments per article
     *
     * @return void
     */
    public function readComments($idArt, $firstComment, $commentsParPage){
        $sql = 'SELECT * FROM comments WHERE id_art = :id_art AND statut_com = 1 AND isDeleted_com = 0 ORDER BY dateUpdate_com DESC LIMIT :firstComment, :commentsParPage';
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':id_art', $idArt, PDO::PARAM_INT);
        $query->bindValue(':firstComment', $firstComment, PDO::PARAM_INT);
        $query->bindValue(':commentsParPage', $commentsParPage, PDO::PARAM_INT);
        $query->execute();
        $dataComments = $query->fetchAll();
        return $dataComments;
    }

    /**
     * Count the validate comments number in the article for the pagination
     *
     * @return void
     */
    public function countComments($idArt){
        $sql = 'SELECT COUNT(*) AS nbComments FROM comments WHERE id_art = :id_art AND statut_com = 1 AND isDeleted_com = 0';
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':id_art', $idArt, PDO::PARAM_INT);
        $query->execute();
        $commentsCount = $query->fetch(PDO::FETCH_ASSOC);
        return $commentsCount;
    }

    /**
     * Count the comments number of an user, validate and not validate for the pagination in the user options
     *
     * @return void
     */
    public function countCommentsUser($idUser){
        $sql = 'SELECT COUNT(*) AS nbCommentUser FROM comments WHERE id_user = :id_user AND isDeleted_com = 0';
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':id_user', $idUser, PDO::PARAM_INT);
        $query->execute();
        $userCommentsCount = $query->fetch(PDO::FETCH_ASSOC);
        return $userCommentsCount;
    }

     /**
     * Read all comments per article validate or not for the validate comments page
     *
     * @return void
     */
    public function readAllComments($idArt, $firstComment, $commentsParPage){
        $sql = 'SELECT * FROM comments WHERE id_art = :id_art AND isDeleted_com = 0 ORDER BY dateUpdate_com DESC LIMIT :firstComment, :commentsParPage';
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':id_art', $idArt, PDO::PARAM_INT);
        $query->bindValue(':firstComment', $firstComment, PDO::PARAM_INT);
        $query->bindValue(':commentsParPage', $commentsParPage, PDO::PARAM_INT);
        $query->execute();
        $dataComments = $query->fetchAll();
        return $dataComments;
    }

    /**
     * Read all comments and article title for the admin list
     *
     * @return void
     */
    public function readAllCommentsAdmin($firstComment, $commentsParPage){
        $sql = 'SELECT articles.id_art, SUBSTR(title_art, 1, 30) AS title_art, id_com, content_com, autor_com, date_com, dateUpdate_com, statut_com, isDeleted_com FROM comments, articles WHERE comments.id_art = articles.id_art AND isDeleted_com = 0 ORDER BY dateUpdate_com DESC LIMIT :firstComment, :commentsParPage';
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':firstComment', $firstComment, PDO::PARAM_INT);
        $query->bindValue(':commentsParPage', $commentsParPage, PDO::PARAM_INT);
        $query->execute();
        $dataComments = $query->fetchAll();
        return $dataComments;
    }

    /**
     * Read all comments per user for the comment list in the user options
     *
     * @return void
     */
    public function readUserComments($idUser, $firstComment, $commentsParPage){
        $sql = 'SELECT * FROM comments WHERE id_user = :id_user ORDER BY dateUpdate_com DESC LIMIT :firstComment, :commentsParPage';
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':id_user', $idUser, PDO::PARAM_INT);
        $query->bindValue(':firstComment', $firstComment, PDO::PARAM_INT);
        $query->bindValue(':commentsParPage', $commentsParPage, PDO::PARAM_INT);
        $query->execute();
        $dataComments = $query->fetchAll();
        return $dataComments;
    }

    /**
     * Count all comments number in the article
     *
     * @return void
     */
    public function countAllComments($idArt){
        $sql = 'SELECT COUNT(*) AS nbComments FROM comments WHERE id_art = :id_art AND isDeleted_com = 0';
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':id_art', $idArt, PDO::PARAM_INT);
        $query->execute();
        $commentsCount = $query->fetch(PDO::FETCH_ASSOC);
        return $commentsCount;
    }

    /**
     * Count all comments number for the admin list
     *
     * @return void
     */
    public function countAllCommentsAdmin(){
        $sql = 'SELECT COUNT(*) AS nbCommentsAdmin FROM comments WHERE isDeleted_com = 0';
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        $commentsCount = $query->fetch(PDO::FETCH_ASSOC);
        return $commentsCount;
    }

    /**
     * Save new comment for user
     *
     * @return void
     */
    public function newCommentUser(Comment $comment) {
        $sql = 'INSERT INTO comments (content_com,autor_com,date_com,dateUpdate_com,statut_com,isDeleted_com,id_art,id_user)
        VALUES (:content_com,:autor_com,:date_com,:dateUpdate_com,NULL,0,:id_art,:id_user)';
        $query = $this->_connexion->prepare($sql);
        $query->bindValue('content_com',$comment->getContent_com(), PDO::PARAM_STR);
        $query->bindValue('autor_com',$comment->getAutor_com(), PDO::PARAM_STR);
        $query->bindValue('date_com',$comment->getDate_com(), PDO::PARAM_STR);
        $query->bindValue('dateUpdate_com',$comment->getDateUpdate_com(), PDO::PARAM_STR);
        $query->bindValue('id_art',$comment->getId_art(), PDO::PARAM_INT);
        $query->bindValue('id_user',$comment->getId_user(), PDO::PARAM_INT);
        $query->execute();
    }

    /**
     * Save new comment for admin
     *
     * @return void
     */
    public function newCommentAdmin(Comment $comment) {
        $sql = 'INSERT INTO comments (content_com,autor_com,date_com,dateUpdate_com,statut_com,isDeleted_com,id_art,id_user)
        VALUES (:content_com,:autor_com,:date_com,:dateUpdate_com,1,0,:id_art,:id_user)';
        $query = $this->_connexion->prepare($sql);
        $query->bindValue('content_com',$comment->getContent_com(), PDO::PARAM_STR);
        $query->bindValue('autor_com',$comment->getAutor_com(), PDO::PARAM_STR);
        $query->bindValue('date_com',$comment->getDate_com(), PDO::PARAM_STR);
        $query->bindValue('dateUpdate_com',$comment->getDateUpdate_com(), PDO::PARAM_STR);
        $query->bindValue('id_art',$comment->getId_art(), PDO::PARAM_INT);
        $query->bindValue('id_user',$comment->getId_user(), PDO::PARAM_INT);
        $query->execute();
    }

    /**
     * Read one comment
     *
     * @return void
     */
    public function readComment($idCom) {
        $sql = 'SELECT * FROM comments where id_com = :id_com';
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':id_com', $idCom, PDO::PARAM_INT);
        $query->execute();
        $dataComment = $query->fetchAll();
        return $dataComment;
    }

    /**
     *User modify his own comment
     *
     */
    public function updateCommentUser(Comment $comment, $idCom)
    {
        $sql = 'UPDATE comments SET content_com = :content_com, dateUpdate_com = :dateUpdate_com, statut_com = NULL WHERE id_com = :id_com';
        $query = $this->_connexion->prepare($sql);
        $query->bindValue('content_com',$comment->getContent_com(), PDO::PARAM_STR);
        $query->bindValue('dateUpdate_com',$comment->getDateUpdate_com(), PDO::PARAM_STR);
        $query->bindValue(':id_com', $idCom, PDO::PARAM_INT);
        $data = $query->execute();    
        return $data;
    }

    /**
     *Admin modify his own comment it is immediatly validate
     *
     */
    public function updateCommentAdmin(Comment $comment, $idCom)
    {
        $sql = 'UPDATE comments SET content_com = :content_com, dateUpdate_com = :dateUpdate_com WHERE id_com = :id_com';
        $query = $this->_connexion->prepare($sql);
        $query->bindValue('content_com',$comment->getContent_com(), PDO::PARAM_STR);
        $query->bindValue('dateUpdate_com',$comment->getDateUpdate_com(), PDO::PARAM_STR);
        $query->bindValue(':id_com', $idCom, PDO::PARAM_INT);
        $data = $query->execute();    
        return $data;
    }

    /**
     *"Delete" a comment comment, always in the database but hide
     *
     */
    public function deleteComment($idCom)
    {
        $sql = 'UPDATE comments SET isDeleted_com = 1 WHERE id_com = :id_com';
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':id_com', $idCom, PDO::PARAM_INT);
        $data = $query->execute();    
        return $data;
    }

    /**
     *Validate a comment
     *
     */
    public function adminValidateComment($idCom)
    {
        $sql = 'UPDATE comments SET statut_com = 1 WHERE id_com = :id_com';
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':id_com', $idCom, PDO::PARAM_INT);
        $data = $query->execute();    
        return $data;
    }

    /**
     *Refuse a comment
     *
     */
    public function adminRefuseComment($idCom)
    {
        $sql = 'UPDATE comments SET statut_com = 0 WHERE id_com = :id_com';
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':id_com', $idCom, PDO::PARAM_INT);
        $data = $query->execute();    
        return $data;
    }

    /**
     *Initialise a comment to restart the comment management
     *
     */
    public function adminInitialiseComment($idCom)
    {
        $sql = 'UPDATE comments SET statut_com = NULL WHERE id_com = :id_com';
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':id_com', $idCom, PDO::PARAM_INT);
        $data = $query->execute();    
        return $data;
    }

    /**
     *Show the article
     *
     */
    public function adminShowArticle($idArt)
    {
        $sql = 'UPDATE articles SET isActive_art = 1 WHERE id_art = :id_art';
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':id_art', $idArt, PDO::PARAM_INT);
        $data = $query->execute();    
        return $data;
    }

    /**
     *Hide the article
     *
     */
    public function adminHideArticle($idArt)
    {
        $sql = 'UPDATE articles SET isActive_art = 0 WHERE id_art = :id_art';
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':id_art', $idArt, PDO::PARAM_INT);
        $data = $query->execute();    
        return $data;
    }

    /**
     *Modify an article
     *
     */
    public function updateArticle($article, $idArt) 
    {
        $sql = 'UPDATE articles SET title_art = :title_art, chapo_art = :chapo_art, content_art = :content_art, dateUpdate_art = :dateUpdate_art, image_art = :image_art,
        altImage_art = :altImage_art WHERE id_art = :id_art';
        $query = $this->_connexion->prepare($sql);
        $query->bindValue('title_art',$article->getTitle_art(), PDO::PARAM_STR);
        $query->bindValue('chapo_art',$article->getChapo_art(), PDO::PARAM_STR);
        $query->bindValue('content_art',$article->getContent_art(), PDO::PARAM_STR);
        $query->bindValue('dateUpdate_art',$article->getDateUpdate_art(), PDO::PARAM_STR);
        $query->bindValue('image_art',$article->getImage_art(), PDO::PARAM_STR);
        $query->bindValue('altImage_art',$article->getAltImage_art(), PDO::PARAM_STR);
        $query->bindValue('id_art',$idArt, PDO::PARAM_INT);
        $data = $query->execute();    
        return $data;
    }
}