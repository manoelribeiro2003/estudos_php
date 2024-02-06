<?php
class Aluno
{

    private $nota1;
    private $nota2;
    private $nota3;
    private $nome;

    public function getNota1()
    {
        return $this->nota1;
    }
    public function setNota1($nota)
    {
        $this->nota1 = $nota;
    }

    public function getNota2()
    {
        return $this->nota2;
    }
    public function setNota2($nota)
    {
        $this->nota2 = $nota;
    }

    public function getNota3()
    {
        return $this->nota3;
    }
    public function setNota3($nota)
    {
        $this->nota3 = $nota;
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function __construct($n1, $n2, $n3, $nome)
    {
        $this->nota1 = $n1;
        $this->nota2 = $n2;
        $this->nota3 = $n3;
        $this->nome = $nome;
    }
}

class Turma
{
    public function calc_med_aluno(Aluno $aluno)
    {
        $media = ($aluno->getNota1() + $aluno->getNota2() + $aluno->getNota3()) / 3;
        echo (
            'Aluno ' . $aluno->getNome() . '<br>' .
            'nota1: ' . $aluno->getNota1() . '<br>' .
            'nota2: ' . $aluno->getNota2() . '<br>' .
            'nota3: ' . $aluno->getNota3() . '<br>' .
            'Média: ' . round($media, 2) . '<br><hr>'
        );
        return $media;
    }

    public function calc_med_turma()
    {
        $alunos = func_get_args();
        $qtd_notas = func_num_args();
        $media = 0;

        for ($i = 0; $i < $qtd_notas; $i++) {
            $media += $this->calc_med_aluno($alunos[$i]);
        }
        return round(($media / $qtd_notas), 2);
    }
}

$aluno1 = new Aluno(10, 4.5, 7, "Joãozinho");
$aluno2 = new Aluno(8, 8, 9, "Maria");
$aluno3 = new Aluno(7, 9, 6, "Carlos");
$aluno4 = new Aluno(4, 10, 9, "Pedro");

$turma = new Turma();
echo 'Media da Turma: ' . $turma->calc_med_turma($aluno1, $aluno2, $aluno3, $aluno4);
