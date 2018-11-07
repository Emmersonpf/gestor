<?php 

/**
* 
*/
class ClassName
{
	
	var $nome;

	function Ola()
	{
		echo "olar ". $this->nome;
	}
}

$obj = new ClassName();
$obj-> nome = "Emmerson";
$obj-> Ola();

?>