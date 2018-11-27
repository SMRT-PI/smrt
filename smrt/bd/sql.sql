CREATE DATABASE smrt DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
use smrt;
drop database smrt;


-- USUÁRIO --
create table usuario(
    id int primary key NOT NULL AUTO_INCREMENT,
    nome varchar(100),
    sobrenome varchar(100),
    senha varchar(100),
    adm boolean default FALSE,
    email varchar(100) unique,
    sobre varchar(220),
    experiencias varchar(220),
    hobbies varchar(220),
    endereco varchar(220),
    cidade varchar(220),
    estado varchar(220),
    foto varchar(220)
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

-- Area informativa --
create table area_info(
    id int PRIMARY KEY AUTO_INCREMENT,
    titulo varchar(400),
    descricao varchar(600),
    conteudo varchar(20000),
    capa varchar(220),
    autor integer references usario(id),
    dataa datetime
);


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
    likes integer references likes(id_like)
);
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
    nome varchar(220),
    sobrenome varchar(220)
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

-- CREATE TABLE `smrt`.`friends` (
--   `id` INT NOT NULL AUTO_INCREMENT,
--   `idUser` INT NOT NULL,
--   `IdFriend` INT NOT NULL,
--   PRIMARY KEY (`id`),
--   INDEX `idFriend_idx` (`IdFriend` ASC),
--   INDEX `idUser_idx` (`idUser` ASC),
--   CONSTRAINT `idUser_fk`
--     FOREIGN KEY (`idUser`)
--     REFERENCES `smrt`.`usuario` (`id`)
--     ON DELETE NO ACTION
--     ON UPDATE NO ACTION,
--   CONSTRAINT `idFriend_fk`
--     FOREIGN KEY (`IdFriend`)
--     REFERENCES `smrt`.`usuario` (`id`)
--     ON DELETE NO ACTION
--     ON UPDATE NO ACTION);
-- 
-- ALTER TABLE usuario ADD COLUMN ext VARCHAR(4) NULL AFTER email;


select * from usuario;


insert into area_info (titulo,descricao,conteudo,capa,autor,dataa) values ('Titulo Teste','Descricao teste','asdasdasd',
'../img/pub1.jpg',1,'2018-11-27 13:30:17.000');

insert into area_info (titulo,descricao,conteudo,capa,autor,dataa) values ('Titulo Teste','Descricao teste','asdasdasd',
'../img/pub2.jpg',1,'2018-11-27 13:30:17.000');

insert into area_info (titulo,descricao,conteudo,capa,autor,dataa) values ('Titulo Teste','Descricao teste','asdasdasd',
'../img/pub3.jpg',1,'2018-11-27 13:30:17.000');

insert into area_info (titulo,descricao,conteudo,capa,autor,dataa) values ('Titulo Teste','Descricao teste','asdasdasd',
'../img/pub4.jpg',1,'2018-11-27 13:30:17.000');

insert into area_info (titulo,descricao,conteudo,capa,autor,dataa) values ('Titulo Teste','Descricao teste','asdasdasd',
'../img/pub5.jpg',1,'2018-11-27 13:30:17.000');


-- /Area informativa --

-- INSERTS --

insert into usuario (nome, sobrenome ,email, senha, adm, sobre, experiencias, hobbies, endereco, cidade, estado, foto) values  ('admin', 'admin', 'admin@gmail.com',md5('12345678'), TRUE, 'shuashuha', 'hsauhsau', 'hsuhuashusha', 'hsahsuahsu', 'shuahsuahsa', 'hsuahsuahs','foto.jpg');
insert into usuario (nome, sobrenome ,email, senha, adm) values  ('Admin', 'Admin', 'admin@gmail.com',md5('12345678'), TRUE);

insert into usuario (nome, sobrenome ,email, senha) values  ('Alison', 'Araujo', 'alison@gmail.com',md5('12345678'));
insert into usuario (nome, sobrenome ,email, senha) values  ('Barney', 'Boleslau', 'barney@gmail.com',md5('12345678'));
insert into usuario (nome, sobrenome ,email, senha) values  ('Carlos', 'Cunha', 'carlos@gmail.com',md5('12345678'));
insert into usuario (nome, sobrenome ,email, senha) values  ('Douglas', 'Demetrio', 'douglas@gmail.com',md5('12345678'));
insert into usuario (nome, sobrenome ,email, senha) values  ('Eduardo', 'Eriberto', 'eduardo@gmail.com',md5('12345678'));
insert into usuario (nome, sobrenome ,email, senha) values  ('Fabricio', 'Felix', 'fabricio@gmail.com',md5('12345678'));
insert into usuario (nome, sobrenome ,email, senha) values  ('Gabriel', 'Garcia', 'gabriel@gmail.com',md5('12345678'));
insert into usuario (nome, sobrenome ,email, senha) values  ('Henrique', 'Hunter', 'henrique@gmail.com',md5('12345678'));
insert into usuario (nome, sobrenome ,email, senha) values  ('Igor', 'Ismael', 'igor@gmail.com',md5('12345678'));
insert into usuario (nome, sobrenome ,email, senha) values  ('Juca', 'Jacubino', 'juca@gmail.com',md5('12345678'));

insert into usuario (nome, sobrenome ,email, senha) values  ('a', 'a', 'a@a',md5('12345678'));
insert into usuario (nome, sobrenome ,email, senha) values  ('b', 'b', 'b@b',md5('12345678'));
insert into usuario (nome, sobrenome ,email, senha) values  ('c', 'c', 'c@c',md5('12345678'));
insert into usuario (nome, sobrenome ,email, senha) values  ('d', 'd', 'd@d',md5('12345678'));
insert into usuario (nome, sobrenome ,email, senha) values  ('e', 'e', 'e@e',md5('12345678'));
insert into usuario (nome, sobrenome ,email, senha) values  ('f', 'f', 'f@f',md5('12345678'));
insert into usuario (nome, sobrenome ,email, senha) values  ('g', 'g', 'g@g',md5('12345678'));
insert into usuario (nome, sobrenome ,email, senha) values  ('h', 'h', 'h@h',md5('12345678'));
insert into usuario (nome, sobrenome ,email, senha) values  ('i', 'i', 'i@i',md5('12345678'));
insert into usuario (nome, sobrenome ,email, senha) values  ('j', 'j', 'j@j',md5('12345678'));
insert into usuario (nome, sobrenome ,email, senha) values  ('k', 'k', 'k@k',md5('12345678'));
insert into usuario (nome, sobrenome ,email, senha) values  ('l', 'l', 'l@l',md5('12345678'));
insert into usuario (nome, sobrenome ,email, senha) values  ('m', 'm', 'm@m',md5('12345678'));
insert into usuario (nome, sobrenome ,email, senha) values  ('n', 'n', 'n@n',md5('12345678'));
insert into usuario (nome, sobrenome ,email, senha) values  ('o', 'o', 'o@o',md5('12345678'));
insert into usuario (nome, sobrenome ,email, senha) values  ('p', 'p', 'p@p',md5('12345678'));
insert into usuario (nome, sobrenome ,email, senha) values  ('q', 'q', 'q@q',md5('12345678'));
insert into usuario (nome, sobrenome ,email, senha) values  ('r', 'r', 'r@r',md5('12345678'));
insert into usuario (nome, sobrenome ,email, senha) values  ('s', 's', 's@s',md5('12345678'));
insert into usuario (nome, sobrenome ,email, senha) values  ('t', 't', 't@t',md5('12345678'));
insert into usuario (nome, sobrenome ,email, senha) values  ('u', 'u', 'u@u',md5('12345678'));
insert into usuario (nome, sobrenome ,email, senha) values  ('v', 'v', 'v@v',md5('12345678'));
insert into usuario (nome, sobrenome ,email, senha) values  ('w', 'w', 'w@w',md5('12345678'));
insert into usuario (nome, sobrenome ,email, senha) values  ('x', 'x', 'x@x',md5('12345678'));
insert into usuario (nome, sobrenome ,email, senha) values  ('y', 'y', 'y@y',md5('12345678'));
insert into usuario (nome, sobrenome ,email, senha) values  ('z', 'z', 'z@z',md5('12345678'));

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

insert into pub(legenda,imagem ,autor,dataa,lat,lng) VALUES ('PUB 1','../img/pub1.jpg',2,'2018-11-27 13:30:17.000',-28.472917,-48.995733);
insert into pub(legenda,imagem ,autor,dataa,lat,lng) VALUES ('PUB 2','../img/pub2.jpg',3,'2018-11-27 13:30:40.000',-28.474083,-48.999714);
insert into pub(legenda,imagem ,autor,dataa,lat,lng) VALUES ('PUB 3','../img/pub3.jpg',4,'2018-11-27 13:31:10.000',-28.476279,-49.000498);
insert into pub(legenda,imagem ,autor,dataa,lat,lng) VALUES ('PUB 4','../img/pub4.jpg',5,'2018-11-27 13:31:34.000',-28.485326,-49.026181);
insert into pub(legenda,imagem ,autor,dataa,lat,lng) VALUES ('PUB 5','../img/pub5.jpg',6,'2018-11-27 13:31:53.000',-28.483893,-49.016466);