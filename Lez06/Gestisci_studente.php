<?php
class Studente
{
    protected string $Nome;
    protected string $Cognome;
    protected string $Classe;
    protected string $Email;
    protected DateTime $DataNascita;
    protected array $Voti;
    protected const MAX_VOTO = 30;
    protected const MIN_VOTO = 0;
    protected const MAX_ESAMI = 30;



    public function __construct(
        string $nome,
        string $cognome,
        string $classe,
        string $email,
        DateTime $data_nascita,
        array $voti
    ) {
        $this->Nome = $nome;
        $this->Cognome = $cognome;
        $this->Classe = $classe;
        $this->Email = $email;
        $this->DataNascita = $data_nascita;
        $this->Voti = $voti;
    }

    public function getMediaEsami(): ?float
    {
        if (empty($this->Voti)) {
            return null;
        }
        return array_sum($this->Voti) / sizeof($this->Voti);
    }
    public function aggiungiVoto($voto): void
    {
        if (sizeof($this->Voti) < Studente::MAX_ESAMI) {
            if ($voto >= Studente::MIN_VOTO   && $voto <= Studente::MAX_VOTO) {
                array_push($this->Voti, $voto);
                echo " voto aggiunto: " . $voto;
            } else {
                echo " non puoi aggiungere questo valore: " . $voto;
            }
        }
    }
} ?>

<?php
$voti = [28, 24, 25.20, 28, 26, 22, 29, 26, 25, 19];
$al1 = new Studente(
    nome: "Marco",
    cognome: "Pacchiotti",
    classe: "backend",
    email: "mp@gmail.com",
    data_nascita: new DateTime('2002-09-11'),
    voti: $voti
);
echo $al1->getMediaEsami();
$al1->aggiungiVoto(30);
