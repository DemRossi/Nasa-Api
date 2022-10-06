<?php
//Connectie classes
require_once 'bootstrap/bootstrap.php';

if (!empty($_POST)) {
    if (empty($_POST['date'])) {
        $error = "Fill in all fields!";
    }

    try {
        $rover = new Rover();
        $rover->setName($_POST['rover']);
        $rover->setDateType($_POST['dateType']);
        $rover->setDateValue($_POST['date']);
        $rover->setCameraType($_POST['cameraType']);

        $obj = $rover->getData()['photos'];

    } catch (Throwable $t) {
        echo $t;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'includes/head.inc.php'; ?>
    <title>Nasa Api - Rovers</title>
</head>

<body>
    <div class="input__rover-settings-wrapper">
        <form action="" method="post">
            <?php if (isset($error)) : ?>
                <div class="form__error">
                    <p>
                        <?php echo $error; ?>
                    </p>
                </div>
            <?php endif; ?>
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
                    <option value="earth_date">Earth day</option>
                </select>
            </div>
            <div class="input__rover-setting--date">
                <label for="date">Date of Sol value </label>
                <input class="input__settings" type="text" name="date">
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
            <div class="form--btn">
                <input type="submit" name="submit" value="Show Rover">
            </div>
        </form>
    </div>

    <?php if (isset($obj)) : ?>
        <?php foreach ($obj as $o) : ?>
            <div class="test">
                <img src="<?php echo $o['img_src']; ?>" alt="test">
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</body>

</html>