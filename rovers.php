<?php
//Connectie classes
require_once 'bootstrap/bootstrap.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rovers</title>
</head>

<body>
    <div class="input__rover-settings-wrapper">
        <form action="" method="post">
            <div class="input__rover-setting--rover">
                <label for="rover">Choose rover: </label>
                <select name="rover">
                    <option value="curiosity">Curiosity</option>
                    <option value="opportunity">Opportunity</option>
                    <option value="spirit">Spirit</option>
                </select>
            </div>
            <div class="input__rover-setting--date-type">
                <label for="dateType">Day Type</label>
                <select name="dateType">
                    <option value="sol">Sol</option>
                    <option value="earth">Earth day</option>
                </select>
            </div>
            <div class="input__rover-setting--date">
                <label for="date">Date of Sol value </label>
                <input class="input__settings" type="text" name="date" placeholder="">
            </div>
            <div class="input__rover-setting--camera-type">
                <label for="cameraType">Camera Type</label>
                <select name="cameraType">
                    <!-- TODO: add other camera's by input of the rover  -->
                    <option value="all">All Camera's</option>
                    <option value="FHAZ">Front Hazard Avoidance Camera</option>
                    <option value="RHAZ">Rear Hazard Avoidance Camera</option>
                    <option value="NAVCAM">Navigation Camera</option>
                </select>
            </div>
        </form>
    </div>

</body>

</html>