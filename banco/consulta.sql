SELECT tarefa.titulo as nome_tarefa, tarefa.descricao as descricao_tarefa, projeti.tema as grupo_projeti FROM tarefa join projeti on tarefa.fk_projeti = projeti.id_projeti  WHERE fk_projeti = 1 


SELECT tarefa.titulo as nome_tarefa, tarefa.descricao as descricao_tarefa, projeti.tema as grupo_projeti  FROM tarefa join projeti on tarefa.fk_projeti = projeti.id_projeti  WHERE fk_ref_aluno_projeti = 1 

SELECT tarefa.titulo as nome_tarefa, tarefa.descricao as descricao_tarefa, projeti.tema as grupo_projeti , tarefa.fk_ref_aluno_projeti as aluno_projeti FROM tarefa join projeti on tarefa.fk_projeti = projeti.id_projeti  WHERE fk_ref_aluno_projeti = 1 

select * from ref_aluno_projeti join tarefa on ref_aluno_projeti.id_ref_a
luno_projeti = tarefa.fk_ref_aluno_projeti where ref_aluno_projeti.fk_projeti =
1;