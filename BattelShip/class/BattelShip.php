<?php class BattelShip
{
    public $tabella_A;
    public $tabella_B;
    public function __construct()
    {
        //TODO: usare oggetto board
        $this->tabella_A =
            array(
                array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
                array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
                array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
                array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
                array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
                array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
                array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
                array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
                array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
                array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O')
            );
        $this->tabella_B =
            array(
                array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
                array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
                array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
                array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
                array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
                array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
                array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
                array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
                array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
                array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O')
            );
    }
    public function get_tabA()
    {
        return $this->tabella_A;
    }
    public function get_tabB()
    {
        return $this->tabella_B;
    }
    public function set_tabA($tabella_A)
    {
        $this->tabella_A = $tabella_A;
    }
    public function set_tabB($tabella_B)
    {
        $this->tabella_B = $tabella_B;
    }
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
        //TODO: usare l' oggetti boat
        $lunghezza = 0;
        //DEBUG: echo $x . " " . $y . " " . $orientamento . " " . $boat_type . " " . $tabella_su_cui_posizionare;
        switch ($boat_type) {
            case 'portaerei':
                $lunghezza = 6;
                break;
            case 'corazzata':
                $lunghezza = 5;
                break;
            case 'incrociatore':
                $lunghezza = 4;
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
                    //echo "Nave posizionata con successo!\n";
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
        $output="";
        if ($x >= 0 && $x < 10 && $y >= 0 && $y < 10) {
            if ($tabella_da_attaccare[$x][$y] == 'X') {
                $output="Colpito!";
                $tabella_da_attaccare[$x][$y] = 'H';
            } else {

                $output="Mancato!";
                $tabella_da_attaccare[$x][$y] = 'M';
            }
        } else {
            $output="Posizione non valida!";

        }
        return [$tabella_da_attaccare,$output];
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
    public function salvaStatoGioco($tabella_da_salvare, $nickname, $db)
    {
        $tabella_da_salvare=json_encode($tabella_da_salvare);
        $sql = "UPDATE giocatori SET tabella = '$tabella_da_salvare' WHERE nickname = '$nickname'";
        $db->query($sql);
    }
    public function SalvaVincitore($nickname_host,$nickname_sfidante, $nickname, $db){
        $sql = "UPDATE partita SET vincitore = '$nickname'  WHERE nicknameHost = '$nickname_host' and nicknameSfidante='$nickname_sfidante'";
        $db->query($sql);
    }
}
