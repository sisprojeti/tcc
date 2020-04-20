SELECT tarefa.titulo as nome_tarefa, tarefa.descricao as descricao_tarefa, projeti.tema as grupo_projeti FROM tarefa join projeti on tarefa.fk_projeti = projeti.id_projeti  WHERE fk_projeti = 1 


SELECT tarefa.titulo as nome_tarefa, tarefa.descricao as descricao_tarefa, projeti.tema as grupo_projeti  FROM tarefa join projeti on tarefa.fk_projeti = projeti.id_projeti  WHERE fk_ref_aluno_projeti = 1 

SELECT tarefa.titulo as nome_tarefa, tarefa.descricao as descricao_tarefa, projeti.tema as grupo_projeti , tarefa.fk_ref_aluno_projeti as aluno_projeti FROM tarefa join projeti on tarefa.fk_projeti = projeti.id_projeti  WHERE fk_ref_aluno_projeti = 1 

select * from ref_aluno_projeti join tarefa on ref_aluno_projeti.id_ref_a
luno_projeti = tarefa.fk_ref_aluno_projeti where ref_aluno_projeti.fk_projeti =
1;

select * from aluno where NOT EXISTS (SELECT * FROM ref_aluno_projeti
                    WHERE ref_aluno_projeti.fk_aluno = aluno.id_aluno);


SELECT ref_aluno_projeti.fk_projeti as fk_projeti,aluno.id_aluno as id_aluno,aluno.fk_pessoa 
as id_pessoa, pessoa.nome as nome_aluno FROM aluno
join pessoa on aluno.fk_pessoa = pessoa.id_pessoa
join ref_aluno_projeti on aluno.id_aluno = ref_aluno_projeti.fk_aluno
where aluno.fk_pessoa = '1' and ref_aluno_projeti.fk_projeti in (SELECT fk_projeti FROM ref_aluno_projeti where fk_aluno = aluno.id_aluno)