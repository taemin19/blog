<?php
namespace Core\Entity; 

use \Core\Entity;

/**
* Class Post
*/ 
class Post extends Entity
{
  
  protected $author,
            $title,
            $lead,
            $content,
            $addDate,
            $updateDate;

  const INVALID_AUTHOR = 1;
  const INVALID_TITLE = 2;
  const INVALID_LEAD = 3;
  const INVALID_CONTENT = 4;

  /**
  * @return bool
  */
  public function isValid()
  {
    return !(empty($this->author) || empty($this->title) || empty($this->lead) || empty($this->content));
  }
 
  /**
  * Setters
  */
  public function setAuthor($author)
  {
    if (!is_string($author) || empty($author))
    {
      $this->errors[] = self::INVALID_AUTHOR;
    }
 
    $this->author = $author;
  }
 
  public function setTitle($title)
  {
    if (!is_string($title) || empty($title))
    {
      $this->errors[] = self::INVALID_TITLE;
    }
 
    $this->title = $title;
  }

  public function setLead($lead)
  {
    if (!is_string($lead) || empty($lead))
    {
      $this->errors[] = self::INVALID_LEAD;
    }
 
    $this->lead = $lead;
  }

  public function setContent($content)
  {
    if (!is_string($content) || empty($content))
    {
      $this->errors[] = self::INVALID_CONTENT;
    }
 
    $this->content = $content;
  }
 
  public function setAddDate($addDate)
  {
    $this->addDate = $addDate;
  }
 
  public function setUpdateDate($updateDate)
  {
    $this->updateDate = $updateDate;
  }

 	/**
  * Getters
  */
  public function author()
  {
    return $this->author;
  }
 
  public function title()
  {
    return $this->title;
  }

  public function lead()
  {
    return $this->lead;
  }
 
  public function content()
  {
    return $this->content;
  }
 
  public function addDate()
  {
    return $this->addDate;
  }

  public function updateDate()
  {
    return $this->updateDate;
  }
}