CREATE DATABASE crud;

USE crud;

CREATE TABLE professor(
    pk_professor INT PRIMARY KEY AUTO_INCREMENT,
    nome_professor VARCHAR(50),
    email_professor VARCHAR(50),
    senha_professor VARCHAR(50)
);

CREATE TABLE turma(
    pk_turma INT PRIMARY KEY AUTO_INCREMENT,
    nome_turma VARCHAR(50),
    fk_professor INT NOT NULL,
    FOREIGN KEY (fk_professor) REFERENCES professor(pk_professor)
);

CREATE TABLE atividade(
    pk_atividade INT PRIMARY KEY AUTO_INCREMENT,
    descricao_atividade VARCHAR(50),
    fk_turma INT NOT NULL,
    FOREIGN KEY (fk_turma) REFERENCES turma(pk_turma)
);