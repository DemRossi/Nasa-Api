<?php 
    //Connectie classes
    require_once 'bootstrap/bootstrap.php';

    $test = new Test();
    $text = $test->getTest();
    
?><!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once 'includes/head.inc.php'; ?>
</head>
<body>
    <h1><?php echo $text; ?></h1>
</body>
</html>