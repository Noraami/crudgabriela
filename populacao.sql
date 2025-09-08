-- Inserindo professores
INSERT INTO professor (nome_professor, email_professor, senha_professor) VALUES
('Carlos Silva', 'carlos.silva@escola.com', '12345'),
('Maria Oliveira', 'maria.oliveira@escola.com', 'senha123'),
('João Pereira', 'joao.pereira@escola.com', 'abc123');

-- Inserindo turmas
INSERT INTO turma (nome_turma, fk_professor) VALUES
('Matemática 1A', 1),
('História 2B', 2),
('Física 3C', 3);

-- Inserindo atividades
INSERT INTO atividade (descricao_atividade, fk_turma) VALUES
('Prova de Álgebra', 1),
('Trabalho sobre Revolução Francesa', 2),
('Experimento de Movimento Uniforme', 3);