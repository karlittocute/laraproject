<?php 

// resume.add.php

var_dump($_POST['visa']);

if (!(empty($_POST['visa']))) {
	echo "Visa is not empty!";
}
else {
	echo "Visa is empty!";
}
