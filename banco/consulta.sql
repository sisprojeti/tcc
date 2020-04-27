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
where aluno.fk_pessoa = '2' and ref_aluno_projeti.fk_projeti in 
(SELECT fk_projeti FROM ref_aluno_projeti)

/* ID PESSOA */
SELECT pessoa.nome as nome_aluno, aluno.id_aluno as id_aluno, ref_aluno_projeti.fk_projeti as id_projeti
FROM pessoa 
JOIN aluno on pessoa.id_pessoa = aluno.fk_pessoa
JOIN ref_aluno_projeti on aluno.id_aluno = ref_aluno_projeti.fk_aluno
WHERE pessoa.id_pessoa = 2;

/* ID PROJETI */
SELECT pessoa.nome as nome_aluno, aluno.id_aluno as id_aluno, ref_aluno_projeti.fk_projeti as id_projeti
FROM pessoa 
JOIN aluno on pessoa.id_pessoa = aluno.fk_pessoa
JOIN ref_aluno_projeti on aluno.id_aluno = ref_aluno_projeti.fk_aluno
WHERE ref_aluno_projeti.fk_projeti = 1;


SELECT pessoa.nome as nome_aluno, aluno.id_aluno as id_aluno, 
FROM ref_aluno_projeti JOIN alu