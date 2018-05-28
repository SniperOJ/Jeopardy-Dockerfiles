<?php 
class calc{
	function __construct__(){
		calc();
	}

	function calc($args1,$method,$args2){
		$args1=intval($args1);
		$args2=intval($args2);
		switch ($method) {
			case 'a':
				$method="+";
				break;

			case 'b':
				$method="-";
				break;

			case 'c':
				$method="*";
				break;

			case 'd':
				$method="/";
				break;
			
			default:
				die("invalid input");
		}
		$Expression=$args1.$method.$args2;
		eval("\$r=$Expression;");
		die("Calculation results:".$r);
	}
}
?>