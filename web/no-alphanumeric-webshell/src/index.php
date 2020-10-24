<?php
if(isset($_GET['evil'])) {
	if(strlen($_GET['evil'])>25||preg_match("/[\w$=()<>'\"]/",$_GET['evil'])) {
		die("danger!!!!!");
	}
	eval($_GET['evil']);
} else {
	highlight_file(__FILE__);
}
