
CREATE DATABASE smrt DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
use smrt;
drop database smrt;

-- DROP TABLES --
drop table usuario;
drop table administrador;
drop table denuncia;
drop table bloqueio;
drop table pub;
-- /DROP TABLES --

-- USUÁRIO --
create table usuario(
    id int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(100),
    sobrenome varchar(100),
    senha varchar(100),
    adm boolean default FALSE,
    email varchar(100) unique,
    foto varchar(220)
  );
-- /USUÁRIO --
select * from usuario;
-- ADMNISTRADOR --
create table administrador(
    id int PRIMARY KEY AUTO_INCREMENT,
    adm int REFERENCES usuario(id) 
);
-- /ADMNISTRADOR --

-- DENUNCIA --
create table denuncia(
    id int PRIMARY KEY AUTO_INCREMENT,
    denunciador int REFERENCES usuario(id),
    denunciado int REFERENCES usuario(id),
    dataa date
);
-- /DENUNCIA --
select * from denuncia;
-- BLOQUEIO --
create table bloqueio(
    id int PRIMARY KEY AUTO_INCREMENT,
    bloqueador int REFERENCES administrador(id),
    bloqueado int unique REFERENCES usuario(id),
    dataa date
);
select distinct denuncia.denunciado, denuncia.dataa, usuario.nome, usuario.id, usuario.sobrenome, usuario.email from denuncia inner join usuario on denuncia.denunciado= usuario.id order by nome;
select * from bloqueio;
-- /BLOQUEIO --

-- MATÉRIA --
create table materia(
    id int PRIMARY KEY AUTO_INCREMENT,
    titulo varchar(100),
    descricao varchar(100),
    conteudo varchar(10000),
    capa blob not null,
    autor int REFERENCES usuario(id)
);
-- /MATÉRIA --

-- PUBLICACAO --
create table pub(
    id int PRIMARY KEY AUTO_INCREMENT,
    legenda varchar(400),
    imagem varchar(220),
    autor varchar(200),
    dataa date
);

-- ALERTAS --
create table alertas(
    id int PRIMARY KEY AUTO_INCREMENT,
    titulo varchar(400),
    lat varchar(220),
    lon varchar(200),
    dataa date
);

select * from pub;
-- SELECT pub.id,pub.legenda,pub.comentarios,pub.imagem,pub.autor,pub.dataa,usuario.id,usuario.nome,usuario.sobrenome
-- FROM pub inner join usuario on pub.autor = usuario.id order by dataa DESC;
-- /PUBLICACAO --

-- COMENTARIO --
create table comentario(
    id int PRIMARY KEY AUTO_INCREMENT,
    id_postagem int references pub(id),
    comentario varchar(500),
    autor varchar(200),
    dataa date
);
INSERT INTO comentario (publicacao ,conteudo, autor, dataa) VALUES ('1','asd','a','2018/05/03')
select * from comentario
drop table comentario
-- /COMENTARIO --


-- select id, nome from usuario;
-- select administrador.id as adm, usuario.id as usuario from administrador inner join usuario on usuario.id = administrador.adm;
-- select denuncia.denunciador, denuncia.denunciado, usuario.nome from usuario inner join denuncia on denuncia.denunciado = usuario.id order by denunciador;
-- select * from bloqueio;
-- 
-- select distinct denuncia.denunciado, usuario.nome, usuario.sobrenome, usuario.email, denuncia.data from denuncia inner join usuario on denuncia.denunciado= usuario.id where nome != "admin" order by data;
-- select count(*) from denuncia where denunciado = 7;
-- 
-- 
-- select distinct usuario from usuario inner join usuario on usuario.id = denunciado;
-- 
-- select administrador.id as adm_id, usuario.id as usuario_id, usuario.nome from administrador inner join usuario on administrador.adm = 1;
-- select administrador.id from administrador where adm = 1;
-- select distinct denuncia.denunciado, denuncia.data, usuario.nome, usuario.id, usuario.sobrenome, usuario.email from denuncia inner join usuario on denuncia.denunciado= usuario.id order by nome;
-- 
-- select usuario.nome, usuario.sobrenome, usuario.email, 
-- 
-- select * from bloqueio;
-- 
-- select * from denuncia order by denunciador;
-- update denuncia set data = '2018-09-28' where id = 3;

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

insert into denuncia(denunciador, denunciado,dataa) values (1,4,'2018-09-28');
insert into denuncia(denunciador, denunciado,dataa) values (2,4,'2018-09-28');
insert into denuncia(denunciador, denunciado,dataa) values (3,4,'2018-09-28');
insert into denuncia(denunciador, denunciado,dataa) values (1,5,'2018-09-28');
insert into denuncia(denunciador, denunciado,dataa) values (2,5,'2018-09-28');
insert into denuncia(denunciador, denunciado,dataa) values (3,5,'2018-09-28');
insert into denuncia(denunciador, denunciado,dataa) values (1,6,'2018-09-28');
insert into denuncia(denunciador, denunciado,dataa) values (2,6,'2018-09-28');
insert into denuncia(denunciador, denunciado,dataa) values (3,6,'2018-09-28');
insert into denuncia(denunciador, denunciado,dataa) values (1,7,'2018-09-28');
insert into denuncia(denunciador, denunciado,dataa) values (2,7,'2018-09-28');
insert into denuncia(denunciador, denunciado,dataa) values (3,7,'2018-09-28');
insert into denuncia(denunciador, denunciado,dataa) values (1,8,'2018-09-28');
insert into denuncia(denunciador, denunciado,dataa) values (2,8,'2018-09-28');
insert into denuncia(denunciador, denunciado,dataa) values (3,8,'2018-09-28');
insert into denuncia(denunciador, denunciado,dataa) values (1,9,'2018-09-28');
insert into denuncia(denunciador, denunciado,dataa) values (2,9,'2018-09-28');
insert into denuncia(denunciador, denunciado,dataa) values (3,9,'2018-09-28');
insert into denuncia(denunciador, denunciado,dataa) values (1,10,'2018-09-28');
insert into denuncia(denunciador, denunciado,dataa) values (2,10,'2018-09-28');
insert into denuncia(denunciador, denunciado,dataa) values (3,10,'2018-09-28');
insert into denuncia(denunciador, denunciado,dataa) values (1,11,'2018-09-28');
insert into denuncia(denunciador, denunciado,dataa) values (2,11,'2018-09-28');
insert into denuncia(denunciador, denunciado,dataa) values (3,11,'2018-09-28');
insert into denuncia(denunciador, denunciado,dataa) values (1,12,'2018-09-28');
insert into denuncia(denunciador, denunciado,dataa) values (2,12,'2018-09-28');
insert into denuncia(denunciador, denunciado,dataa) values (3,12,'2018-09-28');
insert into denuncia(denunciador, denunciado,dataa) values (1,13,'2018-09-28');
insert into denuncia(denunciador, denunciado,dataa) values (2,13,'2018-09-28');
insert into denuncia(denunciador, denunciado,dataa) values (3,13,'2018-09-28');
insert into denuncia(denunciador, denunciado,dataa) values (1,14,'2018-09-28');
insert into denuncia(denunciador, denunciado,dataa) values (2,14,'2018-09-28');
insert into denuncia(denunciador, denunciado,dataa) values (3,14,'2018-09-28');
insert into denuncia(denunciador, denunciado,dataa) values (1,15,'2018-09-28');
insert into denuncia(denunciador, denunciado,dataa) values (2,15,'2018-09-28');
insert into denuncia(denunciador, denunciado,dataa) values (3,15,'2018-09-28');
insert into denuncia(denunciador, denunciado,dataa) values (1,16,'2018-09-28');
insert into denuncia(denunciador, denunciado,dataa) values (2,16,'2018-09-28');
insert into denuncia(denunciador, denunciado,dataa) values (3,16,'2018-09-28');
