<?php

use PHPUnit_Framework_TestCase as PHPUnit;

require_once 'class.alunoTesteAutomatizado.php';

class AlunoTest extends PHPUnit{

    //Função de teste de tipo - Compara tipo da variável Matricula
    public function testType() {
        $aluno = new Aluno("Jose", "B", 12, 001);
        $this->assertInternalType('int', $aluno->getMatricula());
    }

    //Função de teste de número de matricula - Verifica numero de alunos cadastrados
    public function testNumeroMatricula() {
        $aluno = new Aluno("Jose", "B", 12, 001);
        $this->assertEquals(001, $aluno->getMatricula());
    }
    //Função de teste que verifica turma do aluno
    public function testTurma() {
        $aluno = new Aluno("Maria", "C", 10, 002);
        $this->assertEquals("C", $aluno->getTurma());
    }

    //Função que compara nota do aluno atual com nota esperada
    public function testNota() {
        $aluno = new Aluno("Joao", "C", 10, 002);
        $aluno->atribuirNota(10,7,9);
        $this->assertEquals(25, $aluno->getNotaGeral());
    }
}
?>
