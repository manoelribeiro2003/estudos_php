<?php
class Aluno
{
    public $nota1 = 0;
    public $nota2 = 0;
    public $nota3 = 0;
    public $nome = "";
}

class Turma
{
    public function calc_med(Aluno $aluno)
    {
        $media = ($aluno->nota1 + $aluno->nota2 + $aluno->nota3) / 3;
        echo ("
        Aluno $aluno->nome <br>
        nota1: $aluno->nota1, <br>
        nota2: $aluno->nota2, <br>
        nota3: $aluno->nota3, <br>
        Média: $media
        ");
    }
    public function realizar_chamada()
    {
        
    }
}

$aluno1 = new Aluno();
$aluno1->nome = "Joaozinho";
$aluno1->nota1 = 10;
$aluno1->nota2 = 4;
$aluno1->nota3 = 7;

$turma = new Turma();
$turma->calc_med($aluno1);
