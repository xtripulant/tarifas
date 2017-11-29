<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 29/11/2017
 * Time: 21:20
 */

require_once("db.php");
 $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
 if($mysqli->connect_errno > 0){
     die("Imposible conectarse con la base de datos [" . $mysqli->connect_error . "]");
 }

$habitacion=$_GET['habitacion'];
#$nombre=$_GET['nombre'];
#$descripcion=$nombre;
#$descripcion=$_GET['descripcion'];

#$desde=$_GET['desde'];
#$hasta=$_GET['hasta'];

#$min_people=$_GET['min-people'];
$min_people='1';
$temporada=$_GET['temporada'];
switch ($habitacion){
    case 4: //Buhardilla
        $max_people=4;
        break;
    case 7: // Caribe
        $max_people=6;
        break;
    case 12: //Isla
        $max_people=3;
        break;
    case 27: //Oasis
        $max_people=4;
        break;
    case 28: //playa
        $max_people=2;
        break;
    case 30: //Paraiso
        $max_people=8;
        break;
    case 31: //Nordico
        $max_people=4;
        break;
    case 29: //Oasis Premium
        $max_people=4;
        break;
    case 32: //PARCELA
        $max_people=2;
        break;
}

switch ($temporada){
    case 1: //Temporada Alta
        $nombre="Temporada Alta";
        $descripcion=$nombre;
        $desde="2017-04-09";
        $hasta="2017-04-18";
        break;
    case 2: // Temporada Alta
        $nombre="Temporada Alta";
        $descripcion=$nombre;
        $desde="2017-07-08";
        $hasta="2017-08-22";
        break;
    case 3: //Temporada Media Alta
        $nombre="Temporada Media Alta";
        $descripcion=$nombre;
        $desde="2017-07-01";
        $hasta="2017-07-07";
        break;
    case 4: //Temporada Media Alta
        $nombre="Temporada Media Alta";
        $descripcion=$nombre;
        $desde="2017-08-23";
        $hasta="2017-08-31";
        break;
    case 5: //Temporada Especial
        $nombre="Temporada Especial";
        $descripcion=$nombre;
        $desde="2017-09-01";
        $hasta="2017-09-30";
        break;
    case 6: //Temporada Baja
        $nombre="Temporada Baja";
        $descripcion=$nombre;
        $desde="2017-10-01";
        $hasta="2017-12-23";
        break;
    case 7: //Temporada Baja
        $nombre="Temporada Baja";
        $descripcion=$nombre;
        $desde="2017-04-19";
        $hasta="2017-05-31";
        break;
    case 8: //Temporada Media Baja
        $nombre="Temporada Media Baja";
        $descripcion=$nombre;
        $desde="2017-06-01";
        $hasta="2017-06-31";
        break;
}

$cadena="INSERT INTO `demo7`.`lys74_sr_tariffs` (`id`, `currency_id`, `customer_group_id`, `valid_from`, `valid_to`, `room_type_id`, `title`, `description`, `d_min`, `d_max`, `p_min`, `p_max`, `type`, `limit_checkin`, `state`, `mode`) VALUES (   NULL,    '2',    NULL,   '$desde',       '$hasta', '$habitacion', '$nombre','$descripcion',";
$fechas="','".$min_people."','".$max_people."','0', '[\"0\",\"1\",\"2\",\"3\",\"4\",\"5\",\"6\"]',  '1',   '0'      );";
$tarifa=array();
#$tarifa[1]="";
#$tarifa[2]="";
#$tarifa[3]="";
$valores=$_GET['pvp'];
$total=count($valores);
for($cont=0;$cont<$total;$cont++){
    if($_GET['pvp'][$cont]!=""){
        $min_days=$_GET['min-days'][$cont];
        $max_days=$_GET['max-days'][$cont];
        $pvp=$_GET['pvp'][$cont];
        $pvp = $pvp/1.1;
        $sql=$cadena."'".$min_days."','".$max_days.$fechas;
        if ($mysqli->query($sql) === TRUE) {
            $last_id = $mysqli->insert_id;
            echo "New record created successfully. Last inserted ID is: " . $last_id."<br>";
            for ($cont2=0;$cont2<7;$cont2++){
                $sql2="INSERT INTO `demo7`.`lys74_sr_tariff_details` (`id`, `tariff_id`, `price`, `w_day`, `guest_type`, `from_age`, `to_age`, `date`) VALUES (NULL, '".$last_id."', '".$pvp."', '".$cont2."', NULL, NULL, NULL, NULL);";
                $mysqli->query($sql2);
                if($mysqli->errno) die($mysqli->error);
            }
        } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }
    }
}

?>
