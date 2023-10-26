<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Equilateral Tables</title>
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
        <table class="red">
            <?php for ($i = 0; $i < 10; $i++) { ?>
                <tr>
                    <?php for ($j = 0; $j < 10; $j++) { ?>
                        <td onclick=""></td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </table>
        <br>
        <table class="blu">
            <?php for ($i = 0; $i < 10; $i++) { ?>
                <tr>
                    <?php for ($j = 0; $j < 10; $j++) { ?>
                        <td><button></td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </table>
    </body>

    </html>
</body>

</html>
