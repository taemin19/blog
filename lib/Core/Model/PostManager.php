<?php
namespace Core\Model;
 
use \Entity\Post;
use \Core\Manager;

/**
* Class PostManager
*/ 
class PostManager extends Manager
{
  /**
  * Add a post
  * @param Post $post the post to be add
  * @return void
  */
  protected function add(Post $post)
  {
    $req = $this->dao->prepare('INSERT INTO post SET author = :author, title = :title, lead = :lead, content = :content, addDate = NOW(), updateDate = NOW()');
 
    $req->bindValue(':author', $post->author());
    $req->bindValue(':title', $post->title());
    $req->bindValue(':lead', $post->lead());
    $req->bindValue(':content', $post->content());
 
    $req->execute();
  }
  
  /**
  * Count total number of post
  * @return int
  */
  public function count()
  {
    return $this->dao->query('SELECT COUNT(*) FROM post')->fetchColumn();
  }
  
  /**
  * Delete a post
  * @param int $id post ID
  * @return void
  */
  public function delete($id)
  {
    $this->dao->exec('DELETE FROM post WHERE id = '.(int) $id);
  }
 
  /**
  * Get a list of post
  * @param int $offset first post to select
  * @param int $limit total number of post to select
  * @return array
  */
  public function getList($offset = -1, $limit = -1)
  {
    $sql = 'SELECT id, author, title, lead, content, addDate, updateDate FROM post ORDER BY id DESC';
 
    if ($offset != -1 || $limit != -1)
    {
      $sql .= ' LIMIT '.(int) $limit.' OFFSET '.(int) $offset;
    }
 
    $req = $this->dao->query($sql);
    $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Post');
    $listPost = $req->fetchAll();
    $req->closeCursor();
 
    return $listPost;
  }
 
  /**
  * Get a specific post
  * @param int $id post ID
  * @return array
  */
  public function getUnique($id)
  {
    $req = $this->dao->prepare('SELECT id, author, title, lead, content, addDate, updateDate FROM post WHERE id = :id');
    $req->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $req->execute();
 
    $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Post');
    $post = $req->fetch();
    $req->closeCursor();
    
    return $post;
  }
  
   /**
  * Edit a post
  * @param Post $post post to edit
  * @return void
  */
  protected function update(Post $post)
  {
    $req = $this->dao->prepare('UPDATE post SET author = :author, title = :title, lead = :lead, content = :content, updateDate = NOW() WHERE id = :id');
 
    $req->bindValue(':author', $post->author());
    $req->bindValue(':title', $post->title());
    $req->bindValue(':lead', $post->lead());
    $req->bindValue(':content', $post->content());
    $req->bindValue(':id', $post->id(), \PDO::PARAM_INT);
 
    $req->execute();
  }

  /**
  * Save a post
  * @param Post $post post to save
  * @return void
  */
  public function save(Post $post)
  {
    if ($post->isValid())
    {
      $post->isNew() ? $this->add($post) : $this->update($post);
    }
    else
    {
      throw new \RuntimeException('The post must be validated to be saved');
    }
  }
}