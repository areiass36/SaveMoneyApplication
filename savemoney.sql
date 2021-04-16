create database saveMoney;

use saveMoney;

create table usuario(
idUsuario int(2) primary key auto_increment,
nomeUsuario varchar(60) not null,
loginUsuario varchar(15) not null,
senhaUsuario char(8) not null);

create table tipoDespesa(
idTipo int(2) primary key,
nomeTipo varchar(20) not null);

insert into tipoDespesa values
(1, 'ALTA'),
(2, 'MEDIA'),
(3, 'BAIXA');

create table despesa(
idDespesa int(2) primary key auto_increment,
nomeDespesa varchar(20) not null,
valorDespesa float(5,2) not null,
vencDespesa int(2) not null,
qtdParcelas int(2) not null,
tipoDespesa int(2) not null,
idUsuario int(2) not null);

alter table despesa add constraint foreign key(idUsuario) references usuario(idUsuario);
alter table despesa add constraint foreign key(tipoDespesa) references tipoDespesa(idTipo);

create table meta(
idMeta int(2) primary key auto_increment,
nomeMeta varchar(20) not null,
dtiMeta date not null,
dtfMeta date not null,
vltMeta float(6,2),
vlaMeta float(6,2) not null,
idUsuario int(2) not null);

alter table meta add constraint foreign key(idUsuario) references usuario(idUsuario);

create table lucro(
idLucro int(2) primary key auto_increment,
nomeLucro varchar(20) not null,
valorLucro float(5,2) not null,
dataLucro int(2) not null,
idUsuario int(2) not null);

alter table lucro add constraint foreign key(idUsuario) references usuario(idUsuario);
