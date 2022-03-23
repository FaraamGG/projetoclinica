<?php

session_start();

echo "<input type='text' value='".$_SESSION['nome']."'>";

echo "Esta é a página do ".$_SESSION['nome'];


?>