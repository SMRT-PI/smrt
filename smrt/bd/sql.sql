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
--     sobre varchar(220),
--     experiencias varchar(220),
--     hobbies varchar(220),
--     endereco varchar(220),
--     cidade varchar(220),
--     estado varchar(220),
--     foto varchar(220)
);
-- /USUÁRIO --

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

-- BLOQUEIO --
create table bloqueio(
    id int PRIMARY KEY AUTO_INCREMENT,
    bloqueador int REFERENCES administrador(id),
    bloqueado int unique REFERENCES usuario(id),
    dataa date
);
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
    id_pub int PRIMARY KEY AUTO_INCREMENT,
    legenda varchar(400),
    imagem varchar(220),
    autor int references usuario(id),
    dataa datetime,
    lat float,
    lng float,
    likes int
);
drop table pub;
select * from pub;
SELECT pub.id_pub,pub.legenda,pub.imagem,pub.autor,pub.dataa,usuario.id,usuario.nome,usuario.sobrenome,
date_format(dataa, '%d-%m-%Y %H:%i:%s') as dataa FROM pub inner join usuario on pub.autor = usuario.id order by dataa Desc;
-- /PUBLICACAO --

-- COMENTARIO --
create table comentario(
    idc int PRIMARY KEY AUTO_INCREMENT,
    id_postagem int references pub(id),
    comentario varchar(500),
    autor varchar(300),
    dataa date
);
-- /COMENTARIO --


-- LIKE --
create table likes(
    id_like int PRIMARY KEY AUTO_INCREMENT,
    id_user int references usuario(id),
    id_post int references pub(id),
    dataa date
);
-- LIKE --

-- DENUNCIAR PUBLICACAO --
create table denuncia_pub(
    id int PRIMARY KEY AUTO_INCREMENT,
    id_post int references pub(id),
    id_user int references usuario(id),
    id_denunciado int,
    nome_denunciador varchar(400),
    sobrenome_denunciador varchar(400),
    nome_denunciado varchar(400),
    sobrenome_denunciado varchar(400)
);
-- /DENUNCIAR PUBLICACAO --

-- ALERTAS --
-- create table alerta(
--     id int PRIMARY KEY AUTO_INCREMENT,
--     lat float,
--     lng float
-- );
-- -- /ALERTAS --
-- 
-- insert into alerta (lat,lng) values ('-28.477013','-49.001140');
-- insert into alerta (lat,lng) values ('-28.477475',' -49.002342');
-- insert into alerta (lat,lng) values ('-28.481936','-49.009477');
-- insert into alerta (lat,lng) values ('-28.477013','-49.001140');


CREATE TABLE `smrt`.`friends` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `idUser` INT NOT NULL,
  `IdFriend` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `idFriend_idx` (`IdFriend` ASC),
  INDEX `idUser_idx` (`idUser` ASC),
  CONSTRAINT `idUser_fk`
    FOREIGN KEY (`idUser`)
    REFERENCES `smrt`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idFriend_fk`
    FOREIGN KEY (`IdFriend`)
    REFERENCES `smrt`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

ALTER TABLE usuario ADD COLUMN ext VARCHAR(4) NULL AFTER email;

-- Area informativa --
create table area_info(
    id_info int PRIMARY KEY AUTO_INCREMENT,
    titulo varchar(400),
    descricao varchar(600),
    conteudo varchar(20000),
    imagem varchar(220),
    autor integer references usario(id),
    dataa datetime
);
select * from area_info

SELECT area_info.id_info,area_info.titulo,area_info.descricao,area_info.conteudo,area_info.imagem,area_info.autor,area_info.dataa,usuario.id,usuario.nome,usuario.sobrenome,date_format(dataa, '%d-%m-%Y %H:%i:%s') as dataa FROM area_info inner join usuario on area_info.autor = usuario.id order by dataa Desc;
drop table area_info
-- /Area informativa --

-- INSERTS --
insert into usuario (nome, sobrenome ,email, senha, adm, sobre, experiencias, hobbies, endereco, cidade, estado, foto) values  ('admin', 'admin', 'admin@admin',md5('123'), TRUE, 'shuashuha', 'hsauhsau', 'hsuhuashusha', 'hsahsuahsu', 'shuahsuahsa', 'hsuahsuahs','foto.jpg');

insert into usuario (nome, sobrenome ,email, senha, adm) values  ('admin', 'admin', 'admin@admin',md5('123'), TRUE);

insert into usuario (nome, sobrenome ,email, senha) values  ('a', 'a', 'a@a',md5('123'));
insert into usuario (nome, sobrenome ,email, senha) values  ('b', 'b', 'b@b',md5('123'));
insert into usuario (nome, sobrenome ,email, senha) values  ('c', 'c', 'c@c',md5('123'));
insert into usuario (nome, sobrenome ,email, senha) values  ('d', 'd', 'd@d',md5('123'));
insert into usuario (nome, sobrenome ,email, senha) values  ('e', 'e', 'e@e',md5('123'));
insert into usuario (nome, sobrenome ,email, senha) values  ('f', 'f', 'f@f',md5('123'));
insert into usuario (nome, sobrenome ,email, senha) values  ('g', 'g', 'g@g',md5('123'));
insert into usuario (nome, sobrenome ,email, senha) values  ('h', 'h', 'h@h',md5('123'));
insert into usuario (nome, sobrenome ,email, senha) values  ('i', 'i', 'i@i',md5('123'));
insert into usuario (nome, sobrenome ,email, senha) values  ('j', 'j', 'j@j',md5('123'));
insert into usuario (nome, sobrenome ,email, senha) values  ('k', 'k', 'k@k',md5('123'));
insert into usuario (nome, sobrenome ,email, senha) values  ('l', 'l', 'l@l',md5('123'));
insert into usuario (nome, sobrenome ,email, senha) values  ('m', 'm', 'm@m',md5('123'));
insert into usuario (nome, sobrenome ,email, senha) values  ('n', 'n', 'n@n',md5('123'));
insert into usuario (nome, sobrenome ,email, senha) values  ('o', 'o', 'o@o',md5('123'));
insert into usuario (nome, sobrenome ,email, senha) values  ('p', 'p', 'p@p',md5('123'));
insert into usuario (nome, sobrenome ,email, senha) values  ('q', 'q', 'q@q',md5('123'));
insert into usuario (nome, sobrenome ,email, senha) values  ('r', 'r', 'r@r',md5('123'));
insert into usuario (nome, sobrenome ,email, senha) values  ('s', 's', 's@s',md5('123'));
insert into usuario (nome, sobrenome ,email, senha) values  ('t', 't', 't@t',md5('123'));
insert into usuario (nome, sobrenome ,email, senha) values  ('u', 'u', 'u@u',md5('123'));
insert into usuario (nome, sobrenome ,email, senha) values  ('v', 'v', 'v@v',md5('123'));
insert into usuario (nome, sobrenome ,email, senha) values  ('w', 'w', 'w@w',md5('123'));
insert into usuario (nome, sobrenome ,email, senha) values  ('x', 'x', 'x@x',md5('123'));
insert into usuario (nome, sobrenome ,email, senha) values  ('y', 'y', 'y@y',md5('123'));
insert into usuario (nome, sobrenome ,email, senha) values  ('z', 'z', 'z@z',md5('123'));
insert into usuario (nome, sobrenome ,email, senha) values  ('Ezequias', 'Serafim', 'serafimezequias@gmail.com',md5('123'));


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
-- INSERTS --













-- SELECTS --

SELECT pub.id,pub.legenda,pub.imagem,pub.autor,pub.dataa,usuario.id,usuario.nome,usuario.sobrenome,
date_format(dataa, '%d-%m-%Y %H:%i:%s') as dataa FROM pub inner join usuario on pub.autor = usuario.id order by dataa Desc;

SELECT pub.id,pub.legenda,pub.imagem,pub.autor,pub.dataa,usuario.id,usuario.nome,usuario.sobrenome,comentario.idc,comentario.comentario,comentario.dataa,comentario.id_postagem,comentario.autor,
date_format(dataa, '%d-%m-%Y %H:%i:%s') as dataa FROM pub,comentario inner join usuario,comentario on pub.autor = usuario.id, comentario.id_postagem = pub.id order by dataa Desc;

SELECT comentario.idc,comentario.comentario,comentario.id_postagem

SELECT comentario.id,comentario.comentario,comentario.dataa,comentario.id_postagem,comentario.autor,pub.id FROM comentario inner join pub on comentario.id_postagem = pub.id;


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

-- /SELECTS --
