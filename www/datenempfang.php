<?php
/**
 * Created by PhpStorm.
 * User: konstinue
 * Date: 28.06.18
 * Time: 09:43
 */


/**
var_dump($_GET);
var_dump($_POST);

echo $_POST [$firstname];
echo $_POST [$lastname];
echo $_POST [$spende];
echo $_POST [$telefon];


$handle = fopen ("datenablage.txt", w);
fwrite( $handle, $firstname);
fclose( $handle);

echo "Der Wert $firstname wurde gespeichert ";
echo "in der Datei daten.txt";

?>


<?php



//var_dump($_GET);
//var_dump($_POST);

//$firstname = $_POST["firstname"];
//$lastname = $_POST["lastname"];
//$Spende = $_POST["Spendenbetrag in EURO"];
//*$telefonnummer = $_POST ["Telefonnummer"];

//echo $firstname
//$myVar  = $firstname;
?>
