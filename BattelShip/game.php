<?php
$turno = 0;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corazzata Cucuzza - Game</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 0 auto;
        }

        td {
            width: 30px;
            height: 30px;
            border: 1px solid black;
        }

        .red {
            background-color: red;
        }

        .blu {
            background-color: lightblue;
        }
    </style>
</head>

<body>
    <h1>Corazzata Cucuzza</h1>
    <table class="red">
        <?php for ($i = 0; $i < 10; $i++) { ?>
            <tr>
                <?php for ($j = 0; $j < 10; $j++) { ?>
                    <td id="<?php echo ($i . '_' . $j) ?>" onclick="shoot(<?php echo ($i . ',' . $j) ?>)"></td>
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
            console.log("sparatoa a: " + i + " " + j);
            var tdElement = document.getElementById(i + "_" + j);
            tdElement.removeAttribute("onclick");
        }
    </script>
</body>


</html>
<?php
