<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 29/11/2017
 * Time: 21:18
 */

require_once("db.php");

 $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
 if($mysqli->connect_errno > 0){
     die("Imposible conectarse con la base de datos [" . $mysqli->connect_error . "]");
 }
require_once ("header.php");
?>

<body>

<div class="container">
    <h1>Alta de tarifas</h1>
    <br>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <form action="alta.php">
                <div class="row">
                    <div class="form-group">
                        <label for="habitacion">Habitacion:</label>
                        <select class="form-control" id="habitacion" name="habitacion">
                            <option value="4">Buhardilla</option>
                            <option value="7">Caribe</option>
                            <option value="12">Isla</option>
                            <option value="27">Oasis</option>
                            <option value="28">Playa</option>
                            <option value="30">Paraiso</option>
                            <option value="31">Nordico</option>
                            <option value="29">Oasis Premium</option>
                            <option value="32">Parcela</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="temporada">Fechas:</label>
                        <select class="form-control" id="temporada" name="temporada">
                            <option value="1">09/04 - 18/04</option>
                            <option value="2">08/07 - 22/08</option>
                            <option value="3">01/07 - 07/07</option>
                            <option value="4">23/08 - 31/08</option>
                            <option value="5">01/09 - 30/09</option>
                            <option value="6">01/10 - 23/12</option>
                            <option value="7">19/04 - 31/05</option>
                            <option value="8">01/06 - 31/06</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-2">
                        <label for="min-days">Dias Minimos:</label>
                        <input class="form-control" id="min-days" name="min-days[]">
                    </div>
                    <div class="col-xs-2">
                        <label for="max-days">Dias Maximos:</label>
                        <input class="form-control" id="max-days" name="max-days[]">
                    </div>
                    <div class="col-xs-2">
                        <label for="pvp">Precio:</label>
                        <input class="form-control" id="pvp" name="pvp[]">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-2">
                        <label for="min-days">Dias Minimos:</label>
                        <input class="form-control" id="min-days" name="min-days[]">
                    </div>
                    <div class="col-xs-2">
                        <label for="max-days">Dias Maximos:</label>
                        <input class="form-control" id="max-days" name="max-days[]">
                    </div>
                    <div class="col-xs-2">
                        <label for="pvp">Precio:</label>
                        <input class="form-control" id="pvp" name="pvp[]">
                    </div>
                </div>

                <br>
                <div class="row">
                    <button class="btn btn-default">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require_once ("footer.php");
?>
