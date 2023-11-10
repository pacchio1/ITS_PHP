<?php
$turno = 0;
require_once 'class/SqlConnection.php';
require_once 'class/BattelShip.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corazzata Cucuzza - Game</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Corazzata Cucuzza</h1>
    <table class="red">
        <?php for ($i = 0; $i < 10; $i++) { ?>
        <tr>
            <?php for ($j = 0; $j < 10; $j++) { ?>
            <td id="<?php echo ($i . '_' . $j) ?>" onclick="shoot(<?php echo ($i . ',' . $j) ?>)" <?php if ($turno != 0) {
                                                                                                                echo 'disabled';
                                                                                                            } ?>></td>
            <?php } ?>
        </tr>
        <?php } ?>
    </table>
    <br>
    <table class="blu">
        <?php for ($i = 0; $i < 10; $i++) { ?>
        <tr>
            <?php for ($j = 0; $j < 10; $j++) { ?>
            <td></td>
            <?php } ?>
        </tr>
        <?php } ?>
    </table>
    <script>
    function shoot(i, j) {
        console.log("sparato a: " + i + " " + j);
        var tdElement = document.getElementById(i + "_" + j);
        tdElement.removeAttribute("onclick");
        tdElement.setAttribute("class", "blu");
        <?php
            if ($turno == 0) {
                echo '$turno = 1;';
            } else {
                echo '$turno = 0;';
            }
            ?>
    }
    </script>
</body>


</html>