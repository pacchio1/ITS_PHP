<?php
include 'boat.php';

function inizializePersonalBoard()
{
    for ($i = 0; $i < 10; $i++) {
        for ($j = 0; $j < 10; $j++) {
            $personalBoard[$i][$j] = 0;
        }
    }
    return $personalBoard;
}
//creo le navi
$personalBoard = inizializePersonalBoard();

// input del utente

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Battleship</title>
    <style>
        table {
            border-collapse: collapse;
        }

        td {
            width: 30px;
            height: 30px;
            border: 1px solid black;
        }

        .selected {
            background-color: blue;
        }
    </style>
</head>

<body>
    <div id="tabellone">
        <table>
            <?php
            for ($i = 0; $i < 10; $i++) {
                echo "<tr>";
                for ($j = 0; $j < 10; $j++) {
                    echo "<td class='cella' ></td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
    </div>
    <div id="nave">
        <form action="placeShip.php" method="post">
            <input type="radio" name="nave" value="1">Incrociatore
            <input type="radio" name="nave" value="2">Sottomarino 1
            <input type="radio" name="nave" value="3">Sottomarino 2
            <input type="radio" name="nave" value="4">Cacciatorpediniere 1
            <input type="radio" name="nave" value="5">Cacciatorpediniere 2
            <input type="radio" name="nave" value="6">Cacciatorpediniere 3
            <input type="submit" value="posiziona">
        </form>

        <script>
            const cells = document.querySelectorAll("td");
            let selectedCell = null;
            let selectedShip = null;

            const ships = document.querySelectorAll("input[type=radio]");
            ships.forEach(ship => {
                ship.addEventListener("dragstart", () => {
                    selectedShip = ship.value;
                });
            });

            cells.forEach(cell => {
                cell.addEventListener("dragover", e => {
                    e.preventDefault();
                });

                cell.addEventListener("drop", () => {
                    if (selectedCell) {
                        selectedCell.classList.remove("selected");
                    }
                    selectedCell = cell;
                    selectedCell.classList.add("selected");
                    selectedCell.innerHTML = selectedShip;
                });
            });

            const form = document.querySelector("form");
            form.addEventListener("submit", e => {
                e.preventDefault();
                const formData = new FormData(form);
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "game.php");
                xhr.send(formData);
            });
        </script>
</body>

</html>
