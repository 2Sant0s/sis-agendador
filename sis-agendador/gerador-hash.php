<?php
$senha = "abcde";
$senhaCrip = hash('sha256', $senha);

var_dump($senha);
echo "<br>";
var_dump($senhaCrip);

?>