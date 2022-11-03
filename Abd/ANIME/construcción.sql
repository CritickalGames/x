create database anime;

use anime;

create table ANIME(
    IdAnime char(1) not null,
    IdNumero int not null,
    nombre varchar(55) not null
);
create table GENERO(
    Nombre varchar(15),
    IdGen varchar(11) not null
);
create table GEN_ANIME(
    IdA char(1) not null,
    IdN int not null,
    IdGen varchar(11) not null
);
create table OPINION(
    IdA char(1) not null,
    IdN int not null,
    Opinion varchar(40) not null
);
create table ESTADO(
    VecesVista smallint not null,
    IdA char(1) not null,
    IdN int not null,
    Capitulo int not null,
    Estado char(3) not null,
    Temporada int not null
);

create table FRANQUICIA(
    IdA char(1) not null,
    IdN int not null,
    Franquicia varchar(20) not null
);