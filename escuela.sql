create database escuela;
use escuela;
create table alumnos (
    id int not null auto_increment,
    nombre varchar(50) not null,
    apellido varchar(50) not null,
    edad int not null,
    primary key (id)
);
-- insertar datos
insert into alumnos (nombre, apellido, edad) values ('Juan', 'Perez', 20);


