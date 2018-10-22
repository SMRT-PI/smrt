
CREATE DATABASE smrt DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
use smrt;
drop database smrt;


-- USUÁRIO --
create table usuario(
    id int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(100),
    sobrenome varchar(100),
    senha varchar(100),
    adm boolean default FALSE,
    email varchar(100) unique
  );
-- /USUÁRIO --

-- ADMNISTRADOR --
create table administrador(
    id int PRIMARY KEY AUTO_INCREMENT,
    adm int REFERENCES usuario(id) 
);

select count(*) from administrador where adm = 5;

-- /ADMNISTRADOR --

-- DENUNCIA --
create table denuncia(
    id int PRIMARY KEY AUTO_INCREMENT,
    denunciador int REFERENCES usuario(id),
    denunciado int REFERENCES usuario(id),
    dataa date
);

drop table denuncia;

select distinct denuncia.denunciado, denuncia.data, usuario.nome, 
usuario.id, usuario.sobrenome, usuario.email from denuncia inner join usuario on 
denuncia.denunciado= usuario.id order by nome;
-- /DENUNCIA --

-- BLOQUEIO --
create table bloqueio(
    id int PRIMARY KEY AUTO_INCREMENT,
    bloqueador int REFERENCES administrador(id),
    bloqueado int unique REFERENCES usuario(id),
    dataa date
);


select distinct denuncia.denunciado, denuncia.data, usuario.nome, 
usuario.id, usuario.sobrenome, usuario.email, bloqueio.bloqueado from usuario 
inner join denuncia on denuncia.denunciado = usuario.id inner join bloqueio on denuncia.denunciado = bloqueio.bloqueado order by nome;


select id from usuario where email = "admin@admin";
select * from bloqueio;
select bloqueado from bloqueio;
insert into bloqueio (bloqueador,bloqueado,dataa) values (1,6,'2018-10-04'); 
delete from bloqueio where bloqueado = 0;
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
drop table materia;
select * from materia;

insert into materia (titulo,descricao,conteudo,autor,capa) values ('Os Rios são Molhados','Algo sobre os Rios','Rio é um curso de água que 
corre naturalmente de uma área mais alta para uma mais baixa do relevo, geralmente deságua em outro rio, lago ou no mar.
Esses cursos de água se formam a partir da chuva, que é absorvida pelo solo até atingir áreas impermeáveis no subsolo 
onde se acumula, constituindo o que chamamos de lençol freático. 
Quando o lençol freático aflora na superfície dá origem à nascente de um rio. Apesar dessa definição, há rios que se formam de outras maneiras, como por exemplo, a partir do degelo em picos montanhosos, além de alguns originarem de águas de lagos.
Os rios apresentam características diversas, podendo ser perene, ou seja, que não seca em nenhum período do ano, nem mesmo com severas secas. Além disso, podem ser também temporários ou intermitentes, neste caso, se trata de rios que secam em determinado período do ano, quase sempre na época da seca ou estiagem.
', 1, 'm1.jpg');

select titulo, autor from materia;
-- /MATÉRIA --

-- PUBLICACAO --
create table pub(
    id int PRIMARY KEY AUTO_INCREMENT,
    legenda varchar(400),
    comentarios varchar(400),
    imagem varchar(220),
    autor varchar(200),
    dataa date
);
drop table pub;

SELECT pub.id,pub.legenda,pub.comentarios,pub.imagem,pub.autor,pub.dataa,usuario.id,usuario.nome,usuario.sobrenome
FROM pub inner join usuario on pub.autor = usuario.id order by dataa DESC;


insert into pub values (default, 'adasd', 'asdasdasd');
INSERT INTO pub (comentarios, imagem)
VALUES ('teste legenda', 'este.png'); 

INSERT INTO pub (legenda, imagem, nametest) VALUES ('asdasd', 'iasdasdmagem','adada');
-- /PUBLICACAO --


-- DROP TABLES --
drop table usuario;
drop table administrador;
drop table denuncia;
drop table bloqueio;
-- /DROP TABLES --

select id, nome from usuario;
select administrador.id as adm, usuario.id as usuario from administrador inner join usuario on usuario.id = administrador.adm;
select denuncia.denunciador, denuncia.denunciado, usuario.nome from usuario inner join denuncia on denuncia.denunciado = usuario.id order by denunciador;
select * from bloqueio;

select distinct denuncia.denunciado, usuario.nome, usuario.sobrenome, usuario.email, denuncia.data from denuncia inner join usuario on denuncia.denunciado= usuario.id where nome != "admin" order by data;
select count(*) from denuncia where denunciado = 7;


select distinct usuario from usuario inner join usuario on usuario.id = denunciado;

select administrador.id as adm_id, usuario.id as usuario_id, usuario.nome from administrador inner join usuario on administrador.adm = 1;
select administrador.id from administrador where adm = 1;
select distinct denuncia.denunciado, denuncia.data, usuario.nome, usuario.id, usuario.sobrenome, usuario.email from denuncia inner join usuario on denuncia.denunciado= usuario.id order by nome;

select usuario.nome, usuario.sobrenome, usuario.email, 

select * from bloqueio;

select * from denuncia order by denunciador;
update denuncia set data = '2018-09-28' where id = 3;

insert into usuario (nome, sobrenome ,email, senha, adm) values  ('admin', 'admin', 'admin@admin','123', TRUE);
insert into usuario (nome, sobrenome ,email, senha, adm) values  ('admin', 'admin', 'admin1@admin','123', TRUE);
insert into usuario (nome, sobrenome ,email, senha, adm) values  ('admin', 'admin', 'admin2@admin','123', TRUE);
insert into usuario (nome, sobrenome ,email, senha, adm) values  ('admin', 'admin', 'admin3@admin','123', TRUE);

insert into denuncia(denunciador, denunciado,data) values (1,7,'2018-09-28');
insert into denuncia(denunciador, denunciado,data) values (2,7,'2018-09-28');
insert into denuncia(denunciador, denunciado,data) values (3,7,'2018-09-28');



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
insert into usuario (nome, sobrenome ,email, senha) values  ('Luca', 'Biagi', 'luca@luca','123');
