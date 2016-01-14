<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>
</head>
<body>
        <?php
        /**
         * Created by PhpStorm.
         * User: alvin
         * Date: 1/12/2016
         * Time: 4:09 PM
         */

        require_once('Game.php');

        if(!isset($_GET['board'])){
            $position = '---------';
        } else {
            $position = $_GET['board'];
        }

        $game = new Game($position);

        ?>
</body>
</html>
