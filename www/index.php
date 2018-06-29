<?php

//var_dump($_GET);
//var_dump($_POST);

//echo $_POST ["firstname"];
//echo $_POST ["lastname"];
//echo $_POST ["spende"];
//echo $_POST ["telefon"];


$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$spende = $_POST["spende"];
$telefon = $_POST["telefon"];

// file_put_contents("/tmp/daten.txt", $firstname);
// echo __DIR__ . "/daten.txt"; exit;
if ( $_POST["spende"] <> "" && preg_match("/^[0-9,.]$/", $spende)) {
    $handle = fopen (__DIR__ . "/daten.txt", "a" );
    fwrite($handle, "\n");
    fwrite($handle, $_POST["firstname"]);
    fwrite($handle, "|");
    fwrite($handle, $_POST["lastname"]);
    fwrite($handle, "|");
    fwrite($handle, $_POST["spende"]);
    fwrite($handle, "|");
    fwrite($handle, $_POST["telefon"]);
    fclose($handle);

    echo "Der Name: ", $_POST["firstname"]," ", $_POST["lastname"], " wurde gespeichert.\n";
    echo "Die Spende in Höhe von: ", $_POST["spende"], " € wurde gespeichert.\n";
 if($_POST["telefon"] <> "")   {
     echo "Die Telefonnummer: ", $_POST["telefon"], " wurde gespeichert.\n";
     }

    echo "Danke für Ihre Spende!\n";
    echo "Ihre Daten wurden gespeichert in >daten.txt<.";

    exit;

}

//$read = fopen (__DIR__ . "/daten.txt", "r");

    $dateninhalt = file_get_contents(__DIR__ . "/daten.txt");



//echo "Der Name: $firstname $lastname wurde gespeichert, ";
//echo "Die Summe in Höhe von: $spende EURO wurde gespeichert, ";
//echo "Die Telefonnummer: $telefon wurde gespeichert: ...danke für Ihre Spende!   ";
//echo "Ihre Daten wurden gespeichert in daten.txt";
?>


<!DOCTYPE html>
<html lang="de">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Konstitut - Bildung von versoffenen Praktikanten</title>


<!--Datum & Uhrzeit - Script-->
    <script type="text/javascript">
        function startTime() {
            var today = new Date();
            var dd = today.getDate();
            var mm  = today.getMonth()
            var yy = today.getFullYear()
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('Date/Time - Today').innerHTML =
               dd +"."+ checkTime(mm) +"."+ yy + " - " + h + ":" + m + ":" + s;
            var t = setTimeout(startTime, 500);
        }
        function checkTime(i) {
            if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
            return i;
        }
    </script>

    <style type="text/css">

        #container {width: 720px; padding: 2px;
            margin-left: auto;
            margin-right:auto; background-color:#CEE;}

        #logo {
            width: 720px;
            height: 110px;
            background-color: #CDD;

        }

        #logo img {
            margin: auto;
            width: 256px;
            height: 100px;

        }



        #navi {
            float: left;
            width: 100%;
            height: 50px;
            background-color: #CCC;
            padding-bottom: 10px;
        }

        #inhalt {
            float: left;
            width: 100%;
            height: 500px;
            background-color: #CBB;
        }

        #impressum {
            float: left;
            width: 100%;
            height: 50px;
            background-color: #CAA;
        }

        /*Dropdown*/

        .dropdown {
            display: block;
            margin-bottom: 10px;
            float: left;
         }

        .dropdown li {
            list-style: none;
        }
        .dropdown > li {
            float: left;
            width: 10em;
            border: 1px solid;
            text-align: center;
            padding: 5px;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #008800;
            min-width: 140px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            padding: 15px 16px;
            z-index: 1;
        }

        .dropdown > li:hover .dropdown-content {
            display: block;
        }

    </style>


</head>
<body onload="startTime()">




<div id="container"> <!--Hauptcontainer-->

    <div id="logo">
        <img src="/Bilder/Konstitut-Logo.png">
    </div>

    <div id="navi">
        <ul class="dropdown">
            <li>
                Dropdown-navi-1.0
                <ul class="dropdown-content">
                    <li>dropdown-navi-1.1</li>
                    <li>dropdown-navi-1.2</li>
                </ul>
            </li>
            <li>Drop</li>
            <li>Drop2</li>
        </ul>
    </div>

    <!--EingabeFelder zum absenden. -->
    <div id="inhalt">
        <form action="" method="post">
            <label>Vorname:*</label><br>
            <input type="text" name="firstname" value="<?=$firstname?>"><br>
            <label>Nachname:*</label><br>
            <input type="text" name="lastname" value="<?=$lastname?>"><br>

            <?php
            if ( ! preg_match("/^[0-9,.]$/", $spende)) {
                $spende = 0;
                echo "<br><span style='color: darkred;'>Bitte nur Zahlen eingeben</span><br>";
            }
            ?>
            <label>Spendenbetrag in Euro:*</label><br>
            <input type="text" name="spende" value="<?=$spende?>"><br><br>

            <label>Telefon:</label><br>
            <input type="tel" name="telefon" value="<?=$telefon?>">
            <input type="submit" value="Abschicken">

        </form>



    </div>
    <div id="impressum">
        impressum/ desgin by..
        <div id="Date/Time - Today"></div>
    </div>
</div>

</body>
