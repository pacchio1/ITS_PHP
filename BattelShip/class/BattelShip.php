<?php

class BattelShip
{
    public function visualizzaTabella($tabella_da_visualizzare)
    {
        for ($i = 0; $i < 10; $i++) {
            for ($j = 0; $j < 10; $j++) {
                echo $tabella_da_visualizzare[$i][$j] . " ";
            }
            echo "\n";
        }
    }
    public function posizionaNave($x, $y, $orientamento, $boat_type, $tabella_su_cui_posizionare)
    {
        $lunghezza = 0;
        //DEBUG: echo $x . " " . $y . " " . $orientamento . " " . $boat_type . " " . $tabella_su_cui_posizionare;


        switch ($boat_type) {
            case 'portaerei':
                $lunghezza = 5;
                break;
            case 'corazzata':
                $lunghezza = 4;
                break;
            case 'incrociatore':
                $lunghezza = 3;
                break;
            case 'sottomarino':
                $lunghezza = 3;
                break;
            case 'cacciatorpediniere':
                $lunghezza = 2;
                break;
            default:
                echo "Tipo di nave non valido!\n";
                return;
        }


        if ($x >= 0 && $x < 10 && $y >= 0 && $y < 10) {
            if ($orientamento == 'orizzontale') {
                if ($y + $lunghezza <= 10) {
                    for ($i = $y; $i < $y + $lunghezza; $i++) {
                        $tabella_su_cui_posizionare[$x][$i] = 'X';
                    }
                    echo "Nave posizionata con successo!\n";
                } else {
                    echo "Posizione non valida! La nave non può essere posizionata in questa posizione.\n";
                }
            } elseif ($orientamento == 'verticale') {
                if ($x + $lunghezza <= 10) {
                    for ($i = $x; $i < $x + $lunghezza; $i++) {
                        $tabella_su_cui_posizionare[$i][$y] = 'X';
                    }
                    echo "Nave posizionata con successo!\n";
                } else {
                    echo "Posizione non valida! La nave non può essere posizionata in questa posizione.\n";
                }
            } else {
                echo "Orientamento non valido!\n";
            }
        } else {
            echo "Posizione non valida!\n";
        }
        return $tabella_su_cui_posizionare;
    }

    public function attacca($x, $y, $tabella_da_attaccare)
    {
        if ($x >= 0 && $x < 10 && $y >= 0 && $y < 10) {
            if ($tabella_da_attaccare[$x][$y] == 'X') {
                echo "Colpito!\n";
                $tabella_da_attaccare[$x][$y] = 'H';
            } else {
                echo "Mancato!\n";
                $tabella_da_attaccare[$x][$y] = 'M';
            }
        } else {
            echo "Posizione non valida!\n";
        }
        return $tabella_da_attaccare;
    }
    public function controllaVittoria($tabella_da_controllare)
    {
        for ($i = 0; $i < 10; $i++) {
            for ($j = 0; $j < 10; $j++) {
                if ($tabella_da_controllare[$i][$j] == 'X') {
                    return false;
                }
            }
        }
        return true;
    }
}
