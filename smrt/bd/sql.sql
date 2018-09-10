
CREATE DATABASE smrt DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
use smrt;
drop database smrt;

create table usuario(
  id int PRIMARY KEY AUTO_INCREMENT,
  nome varchar(100),
  sobrenome varchar(100),
  senha varchar(100),
  email varchar(100) unique,
  adm boolean default FALSE,
  bloqueado boolean default FALSE
  );
drop table usuario;
select * from usuario;
select nome,adm,bloqueado from usuario;
insert into usuario (nome, sobrenome ,email, senha, adm) values  ('admin', 'admin', 'admin@admin','123', TRUE);
insert into usuario (nome, sobrenome ,email, senha) values  ('a', 'a', 'a@a','123');
insert into usuario (nome, sobrenome ,email, senha) values  ('b', 'b', 'b@b','123');
insert into usuario (nome, sobrenome ,email, senha) values  ('c', 'c', 'c@c','123');
insert into usuario (nome, sobrenome ,email, senha) values  ('d', 'd', 'd@d','123');
insert into usuario (nome, sobrenome ,email, senha) values  ('e', 'e', 'e@e','123');
insert into usuario (nome, sobrenome ,email, senha) values  ('f', 'f', 'f@f','123');
insert into usuario (nome, sobrenome ,email, senha) values  ('g', 'g', 'g@g','123');
insert into usuario (nome, sobrenome ,email, senha) values  ('h', 'h', 'h@h','123');
insert into usuario (nome, sobrenome ,email, senha) values  ('i', 'i', 'i@i','123');
insert into usuario (nome, sobrenome ,email, senha) values  ('j', 'j', 'j@j','123');
insert into usuario (nome, sobrenome ,email, senha) values  ('k', 'k', 'k@k','123');
insert into usuario (nome, sobrenome ,email, senha) values  ('l', 'l', 'l@l','123');
insert into usuario (nome, sobrenome ,email, senha) values  ('m', 'm', 'm@m','123');
insert into usuario (nome, sobrenome ,email, senha) values  ('n', 'n', 'n@n','123');
insert into usuario (nome, sobrenome ,email, senha) values  ('o', 'o', 'o@o','123');
insert into usuario (nome, sobrenome ,email, senha) values  ('p', 'p', 'p@p','123');
insert into usuario (nome, sobrenome ,email, senha) values  ('q', 'q', 'q@q','123');
insert into usuario (nome, sobrenome ,email, senha) values  ('r', 'r', 'r@r','123');
insert into usuario (nome, sobrenome ,email, senha) values  ('s', 's', 's@s','123');
insert into usuario (nome, sobrenome ,email, senha) values  ('t', 't', 't@t','123');
insert into usuario (nome, sobrenome ,email, senha) values  ('u', 'u', 'u@u','123');
insert into usuario (nome, sobrenome ,email, senha) values  ('v', 'v', 'v@v','123');
insert into usuario (nome, sobrenome ,email, senha) values  ('w', 'w', 'w@w','123');
insert into usuario (nome, sobrenome ,email, senha) values  ('x', 'x', 'x@x','123');
insert into usuario (nome, sobrenome ,email, senha) values  ('y', 'y', 'y@y','123');
insert into usuario (nome, sobrenome ,email, senha) values  ('z', 'z', 'z@z','123');


create table materia(
    id int PRIMARY KEY AUTO_INCREMENT,
    titulo varchar(100),
    descricao varchar(100),
    conteudo varchar(255),
    capa blob not null,
    autor int REFERENCES usuario(id)
);
drop table materia;
select * from materia;
select titulo, autor from materia;
insert into materia (titulo, descricao, conteudo, autor, capa) values  ('Os Rios', 'Algo sobre os rios','Os rios são molhados!', 1, '../img/m1.jpg');

create table publicacao(
    id int PRIMARY KEY AUTO_INCREMENT,
    titulo varchar(100),
    descricao varchar(100),
    conteudo varchar(255),
-------- localização -----------
    capa blob not null
);