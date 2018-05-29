<?php
if(isset($_GET['action']) && $_GET['action'] !== 'index'){
	@include($_GET['action'].'.php');
}else{
	header("Location: index.php?action=upload");
}
