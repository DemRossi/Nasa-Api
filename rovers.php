<?php
//Connectie classes
require_once 'bootstrap/bootstrap.php';

if (!empty($_POST)) {
    if (empty($_POST['date'])) {
        $error = "Fill in all fields!";
    }

    try {
        $rover = new Rover();
        $rover->setName($_POST['name']);
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
    <div class="container">
        <div class="parameters parameters__wrapper">
            <form action="" method="post" class="form">
                <?php if (isset($error)) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="form-group col">
                        <div class="parameters__name">
                            <label for="name">Choose rover: </label>
                            <select name="name">
                                <option value="curiosity">Curiosity</option>
                                <option value="opportunity">Opportunity</option>
                                <option value="spirit">Spirit</option>
                            </select>
                        </div>

                        <div class="parameters__camera-type">
                            <label for="cameraType">Camera Type:</label>
                            <select name="cameraType">
                                <!-- TODO: add other camera's by input of the rover  -->
                                <option value="all">All Camera's</option>
                                <option value="FHAZ">Front Hazard Avoidance Camera</option>
                                <option value="RHAZ">Rear Hazard Avoidance Camera</option>
                                <option value="NAVCAM">Navigation Camera</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col">
                        <div class="parameters__data-type">
                            <label for="dateType">Day Type:</label>
                            <select name="dateType">
                                <option value="sol">Sol</option>
                                <option value="earth_date">Earth day</option>
                            </select>
                        </div>

                        <div class="parameters__date">
                            <label for="date">Date or Sol value:</label>
                            <input class="input__settings" type="text" name="date">
                        </div>
                    </div>
                </div>
                <div class="parameters__btn">
                    <input class="btn btn-primary" type="submit" name="submit" value="Show Rover">
                </div>
            </form>
        </div>

        
        <?php if (isset($obj)) : ?>
            <div class="data__wrapper card-columns">
                <?php foreach ($obj as $o) : ?>
                <div class="card">
                    <img class="card-img-top" src="<?php echo $o['img_src']; ?>" alt="Rover image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $o['rover']['name']; ?></h5>
                    </div>
                </div>

            <?php endforeach; ?>
            </div>
            
        <?php endif; ?>
    </div>
</body>

</html>