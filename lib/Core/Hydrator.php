<?php
namespace Core;
 
trait Hydrator
{
  /**
  * Data to assign via setters
  * @param array $data
  * @return void
  */
  public function hydrate($data)
  {
    foreach ($data as $key => $value)
    {
      $method = 'set'.ucfirst($key);
 
      if (is_callable([$this, $method]))
      {
        $this->$method($value);
      }
    }
  }
}