<?php
namespace Core;

/**
* Class FormValidator
* Check if form fields are valid
*/
class FormValidator
{
	/**
	* @var array $data
	* @var array $errors
	*/
	protected $data; // represents post datas
	protected $errors = [];

	/**
	* @param array $data
	*/
	public function __construct($data)
	{
		$this->setData($data);
	}

	/**
	* Check if the form has no errors
	* @return bool
	*/
	public function isValid()
	{
		return empty($this->errors);
	}

	/**
	* Check a field with a specific rule
	* @param string $name field name
	* @param string $rule rule to apply
	* @param $option option to apply
	*/
	public function check($name, $rule, $option = false)
	{
		$validator = 'validate'.ucfirst($rule);
		$this->$validator($name, $option); 
	}

	/**
	* Required rule
	* @param string $name
	*/
	public function validateRequired($name)
	{
		if (empty($this->data[$name])) 
		{
			$this->errors[$name] = ucfirst($name).' is required';
		}
	}

	/**
	* Email Rule 
	* @param string $name
	*/
	public function validateEmail($name)
	{
		if (!empty($this->data[$name]) && !filter_var($this->data[$name], FILTER_VALIDATE_EMAIL)) {
			$this->errors[$name] = 'Invalid email format';
		}
	}

	/**
	* Maximum length rule
	* @param string $name
	* @param int $option
	*/
	public function validateMaxLength($name, $option)
	{
		$maxLength = (int) $option;
		if (strlen($this->data[$name]) > $maxLength) 
		{
			$this->errors[$name] = ucfirst($name).' must be '.$maxLength.' characters max';
		}
	}

	/**
	* Setters
	*/
	public function setData($data)
	{
		$this->data = $data;
	}

	/**
	* Getters
	*/
	public function errors()
	{
		return $this->errors;
	}
}