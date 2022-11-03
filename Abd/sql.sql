create database AUTOMOTORA;

use AUTOMOTORA;


create table CLIENTE 
    (Ci int NOT NULL, 
    Nombre varchar(25) NOT NULL, 
    Nacimiento date NOT NULL, 
    Ciudad varchar(15) NOT NULL, 
    Dirección varchar(35) NOT NULL, 
    Telefono char(8) NOT NULL);

create table SUCURSAL 
    (IdSucursal int NOT NULL, 
    Nombre varchar(25) NOT NULL, 
    Dirección varchar(35) NOT NULL);

create table VEHICULO 
    (Matricula char(7) NOT NULL, 
    Marca varchar(10) NOT NULL, 
    Modelo varchar(10) NOT NULL, 
    Año smallint NOT NULL, 
    Sucursal int NOT NULL);

create table AUTOS 
    (Matricula char(7) NOT NULL, 
    Puertas int NOT NULL);

create table CAMIONETA 
    (Matricula char(7) NOT NULL, 
    Pasajeros int NOT NULL);

create table FUNCIONARIO 
    (IdFuncionario int NOT NULL, 
    Nombre varchar(25) NOT NULL, 
    Dirección varchar(35) NOT NULL, 
    Telefono char(8) NOT NULL, 
    email varchar(35) NOT NULL, 
    añoIngreso smallint NOT NULL, 
    Salario int NOT NULL, 
    Sucursal int NOT NULL);

create table ALQUILERES 
    (Vehiculo char(7) NOT NULL, 
    Cliente int NOT NULL, 
    fechaEntrega date NOT NULL, 
    fechaDevolucion date NOT NULL);

create table VENTAS 
    (Vehiculo char(7) NOT NULL, 
    Cliente int NOT NULL, 
    fechaEntrega date NOT NULL, 
    Funcionario int NOT NULL);