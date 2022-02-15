<?php 

class User 
{ 
	
	public $name; 

	function __construct($name) 
	{ 
		// This is initializing the class properties 
		$this->name=$name; 
    }	
     
	function getName() 
	{ 
		return $this->name; 
	} 
} 
	
$user= new User("Pero"); 
echo $user->getName();
