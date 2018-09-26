
CREATE DATABASE smrt DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
use smrt;
drop database smrt;

<!-- USUÁRIO -->
create table usuario(
    id int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(100),
    sobrenome varchar(100),
    senha varchar(100),
    email varchar(100) unique
  );
<!-- /USUÁRIO -->

<!-- ADMNISTRADOR -->
create table administrador(
    id int PRIMARY KEY AUTO_INCREMENT,
    adm int REFERENCES usuario(id) 
);
<!-- /ADMNISTRADOR -->

<!-- DENUNCIA -->
create table denuncia(
    id int PRIMARY KEY AUTO_INCREMENT,
    denunciador int REFERENCES usuario(id),
    denunciado int REFERENCES usuario(id),
    data date
);
<!-- /DENUNCIA -->

<!-- BLOQUEIO -->
create table bloqueio(
    id int PRIMARY KEY AUTO_INCREMENT,
    bloqueador int REFERENCES adm(id),
    bloqueado int REFERENCES usuario(id),
    data date
);
<!-- /BLOQUEIO -->

drop table usuario;
drop table administrador;
drop table denuncia;
drop table bloqueio;

select * from usuario;
select administrador.id as adm, usuario.id as usuario from administrador inner join usuario on usuario.id = administrador.adm;
select denuncia.denunciador, denuncia.denunciado, usuario.nome from ;
select * from bloqueio;

select administrador.id as adm_id, usuario.id as usuario_id,usuario.nome from administrador inner join usuario on administrador.adm = 1;
select administrador.id from administrador where adm = 1;

insert into usuario (nome, sobrenome ,email, senha) values  ('admin', 'admin', 'admin@admin','123');
insert into usuario (nome, sobrenome ,email, senha) values  ('admin', 'admin', 'admin1@admin','123');
insert into usuario (nome, sobrenome ,email, senha) values  ('admin', 'admin', 'admin2@admin','123');
insert into usuario (nome, sobrenome ,email, senha) values  ('admin', 'admin', 'admin3@admin','123');
insert into administrador (adm) values (1);
insert into administrador (adm) values (2);
insert into administrador (adm) values (3);
insert into administrador (adm) values (4);

insert into denuncia(denunciador, denunciado) values (1,2);
insert into denuncia(denunciador, denunciado) values (1,3);
insert into denuncia(denunciador, denunciado) values (1,4);


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

<!-- MATÉRIA -->
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

create table publicacao(
    id int PRIMARY KEY AUTO_INCREMENT,
    titulo varchar(100),
    descricao varchar(100),
    conteudo varchar(255),
-------- localização -----------
    capa blob not null
);