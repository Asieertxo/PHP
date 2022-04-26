-- Creamos la base de datos
create database ejercicio1;
-- La seleccionamos
use ejercicio1 ;
 -- Creamos las Tablas --
 create table jugadores(
    id int auto_increment primary key,
    nombre varchar(40) not null,
    apellidos varchar(60) not null,
    dorsal int unique,
    posicion enum('Portero', 'Defensa', 'Lateral Izquierdo', 'Lateral Derecho', 'Central', 'Delantero')
    
 );
/*
insert into jugadores(nombre, apellidos, dorsal, posicion) values('Antonio','Gil Gil', 1, 1);
insert into jugadores(nombre, apellidos, dorsal, posicion) values('Ana','Hernandez Perez', 2, 2);
 insert into jugadores(nombre, apellidos, dorsal, posicion) values('Juan','Valdemoro Gil', 3, 2);
 insert into jugadores(nombre, apellidos, dorsal, posicion) values('Maria','Ruano Perez', 4, 2);*/


