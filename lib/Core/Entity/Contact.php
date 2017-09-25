<?php
namespace Core\Entity; 

use \Core\Entity;

/**
* Class Contact
* Represents contact form informations
*/ 
class Contact extends Entity
{
  
  protected $name;
  protected $email;
  protected $subject;
  protected $message;

  const INVALID_NAME = 1;
  const INVALID_EMAIL = 2;
  const INVALID_SUBJECT = 3;
  const INVALID_MESSAGE = 4;

  /**
  * @return bool
  */
  public function isValid()
  {
    return !(empty($this->name) || empty($this->email) || empty($this->subject) || empty($this->message));
  }
 
  /**
  * Setters
  */
  public function setName($name)
  {
    if (!is_string($name) || empty($name))
    {
      $this->errors[] = self::INVALID_NAME;
    }
 
    $this->name = $name;
  }
 
  public function setEmail($email)
  {
    if (!is_string($email) || empty($email))
    {
      $this->errors[] = self::INVALID_EMAIL;
    }
 
    $this->email = $email;
  }

  public function setSubject($subject)
  {
    if (!is_string($subject) || empty($subject))
    {
      $this->errors[] = self::INVALID_SUBJECT;
    }
 
    $this->subject = $subject;
  }

  public function setMessage($message)
  {
    if (!is_string($message) || empty($message))
    {
      $this->errors[] = self::INVALID_MESSAGE;
    }
 
    $this->message = $message;
  }

 	/**
  * Getters
  */
  public function name()
  {
    return $this->name;
  }
 
  public function email()
  {
    return $this->email;
  }

  public function subject()
  {
    return $this->subject;
  }
 
  public function message()
  {
    return $this->message;
  }
 
}