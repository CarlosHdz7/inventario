#DROP DATABASE inventario;
CREATE DATABASE inventario;
USE inventario;
show tables;

#Tablas
CREATE TABLE usuarios(
	id int(255) auto_increment PRIMARY KEY,
    nombre varchar(255) not null,
    apellido varchar(255) not null,
    usuario varchar(100)  not null,
    email varchar(255) not null,
    pass varchar(255) not null,
    fecha_registro date not null
)ENGINE=InnoDb;

select * from usuarios;

CREATE TABLE categorias(
	id int(255) auto_increment PRIMARY KEY,
    id_usuario int(255),
    categoria varchar(100) not null,
    fecha_registro date not null,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);

select * from categorias;

CREATE TABLE productos(
	id int(255) auto_increment PRIMARY KEY,
    id_usuario int(255),
    id_categoria int(255),
    producto varchar(100) unique not null,
    descripcion varchar(255) not null,
    cantidad int(100),
    precio float not null,
    fecha_registro date not null,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY (id_categoria) REFERENCES categorias(id)
)ENGINE=InnoDb;

select * from productos;

CREATE TABLE clientes(
	id int(255) auto_increment PRIMARY KEY,
    id_usuario int(255),
    cliente varchar(255) not null,
    direccion varchar(255) null,
    email varchar(255) null,
    telefono varchar(15) null,
    fecha_registro date not null,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
)ENGINE=InnoDb;

select * from clientes; 

CREATE TABLE ventas(
	id int(255) auto_increment PRIMARY KEY,
    id_usuario int(255),
    id_producto int(255),
    id_cliente int(255),
    precio float not null,
    fecha_registro date not null,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY (id_producto) REFERENCES productos(id),
    FOREIGN KEY (id_cliente) REFERENCES clientes(id)
)ENGINE=InnoDb;

select * from ventas;

CREATE TABLE facturas(
	id int(255) auto_increment PRIMARY KEY,
	id_usuario int(255),
    cliente varchar(100),
    total_vendido float,
    productos_vendidos varchar(255),
    fecha_registro date not null
)ENGINE=InnoDb;

select * from facturas;

insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 1','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 2','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 3','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 4','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 5','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 6','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 7','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 8','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 9','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 10','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 11','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 12','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 13','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 14','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 15','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 16','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 17','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 18','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 19','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 20','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 21','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 22','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 23','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 24','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 25','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 26','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 27','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 28','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 29','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 30','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 31','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 32','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 33','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 34','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 35','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 36','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 37','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 38','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 39','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 40','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 41','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 42','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 43','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 44','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 45','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 46','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 47','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 48','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 49','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 50','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 51','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 52','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 53','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 54','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 55','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 56','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 57','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 58','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 59','2019-2-16');
insert into categorias (id_usuario,categoria,fecha_registro) values (1,'categoria 60','2019-2-16');


insert into clientes (id,id_usuario,cliente,direccion,email,telefono,fecha_registro) values (null, 1, 'Sin cliente','-','-','-','2019-01-31');
insert into clientes values (null,'1','Andrea','Colonia prados de venecia','andrea@gmail.com','2256278','2019-01-26');
insert into clientes values (null,'1','Estefany','Colonia guadalupe','estefany@gmail.com','22588778','2019-01-26');
insert into clientes values (null,'1','Erickson','Colonia bosques del rio','erickson@gmail.com','23588778','2019-01-26');
insert into clientes values (null,'1','Claridad','Colonia las margaritas','claridad@gmail.com','27588578','2019-01-26');
insert into clientes values (null,'1','Maggie','Colonia montes 3','maggie@gmail.com','22588778','2019-01-26');
insert into clientes values (null,'1','David','Colonia el escalon','david@gmail.com','22588778','2019-01-26');
insert into clientes values (null,'1','Roberto','Colonia bosques del rio','roberto@gmail.com','22588778','2019-01-26');
insert into clientes values (null,'1','Cecilia','Colonia bosques del rio','cecilia@gmail.com','22588778','2019-01-26');
insert into clientes values (null,'1','Victoria','Colonia montes 3','victoria@gmail.com','22588778','2019-01-26');
insert into clientes values (null,'1','Armando','Colonia las margaritas','armando@gmail.com','22905774','2019-01-26');
insert into clientes values (null,'1','Elias','Colonia bosques del rio','elias@gmail.com','22588778','2019-01-26');
insert into clientes values (null,'1','Ester','Colonia bosques del rio','ester@gmail.com','22182545','2019-01-26');
insert into clientes values (null,'1','Diana','Colonia el escalon','diana@gmail.com','22588778','2019-01-26');
insert into clientes values (null,'1','Rosita','Colonia bosques del rio','rosita@gmail.com','22231264','2019-01-26');
insert into clientes values (null,'1','Belen','Colonia el escalon','belen@gmail.com','22588778','2019-01-26');
insert into clientes values (null,'1','Rosy','Colonia prados de veneci','marta@gmail.com','22224478','2019-01-26');
insert into clientes values (null,'1','Pedro','Colonia prados de veneci','marta@gmail.com','22224478','2019-01-26');
insert into clientes values (null,'1','Julio','Colonia prados de veneci','marta@gmail.com','22224478','2019-01-26');
insert into clientes values (null,'1','Carlos','Colonia prados de veneci','marta@gmail.com','22224478','2019-01-26');
insert into clientes values (null,'1','Eduardo','Colonia prados de veneci','marta@gmail.com','22224478','2019-01-26');
insert into clientes values (null,'1','Walter','Colonia prados de veneci','marta@gmail.com','22224478','2019-01-26');
insert into clientes values (null,'1','Rosa','Colonia prados de veneci','marta@gmail.com','22224478','2019-01-26');
insert into clientes values (null,'1','Madely','Colonia prados de veneci','marta@gmail.com','22224478','2019-01-26');
insert into clientes values (null,'1','Victoria','Colonia prados de veneci','marta@gmail.com','22224478','2019-01-26');
insert into clientes values (null,'1','Estefany','Colonia prados de veneci','marta@gmail.com','22224478','2019-01-26');
insert into clientes values (null,'1','Gabriela','Colonia prados de veneci','marta@gmail.com','22224478','2019-01-26');
insert into clientes values (null,'1','Luis','Colonia prados de veneci','marta@gmail.com','22224478','2019-01-26');
insert into clientes values (null,'1','David','Colonia prados de veneci','marta@gmail.com','22224478','2019-01-26');
insert into clientes values (null,'1','Melissa','Colonia prados de veneci','marta@gmail.com','22224478','2019-01-26');
insert into clientes values (null,'1','Erickson','Colonia prados de veneci','marta@gmail.com','22224478','2019-01-26');
insert into clientes values (null,'1','Stanley','Colonia prados de veneci','marta@gmail.com','22224478','2019-01-26');
insert into clientes values (null,'1','Marta','Colonia prados de veneci','marta@gmail.com','22224478','2019-01-26');
insert into clientes values (null,'1','Erickson','Colonia prados de veneci','marta@gmail.com','22224478','2019-01-26');
insert into clientes values (null,'1','Cesar','Colonia prados de veneci','marta@gmail.com','22224478','2019-01-26');
insert into clientes values (null,'1','Melissa','Colonia prados de veneci','marta@gmail.com','22224478','2019-01-26');
insert into clientes values (null,'1','Josue','Colonia prados de veneci','marta@gmail.com','22224478','2019-01-26');
insert into clientes values (null,'1','Daniel','Colonia prados de veneci','marta@gmail.com','22224478','2019-01-26');
insert into clientes values (null,'1','Ismael','Colonia prados de veneci','marta@gmail.com','22224478','2019-01-26');
insert into clientes values (null,'1','Adilio','Colonia prados de veneci','marta@gmail.com','22224478','2019-01-26');
insert into clientes values (null,'1','Rene','Colonia prados de veneci','marta@gmail.com','22224478','2019-01-26');
insert into clientes values (null,'1','Estefany','Colonia prados de veneci','marta@gmail.com','22224478','2019-01-26');
insert into clientes values (null,'1','Marta','Colonia prados de veneci','marta@gmail.com','22224478','2019-01-26');
insert into clientes values (null,'1','Diana','Colonia prados de veneci','marta@gmail.com','22224478','2019-01-26');
insert into clientes values (null,'1','Walter','Colonia prados de veneci','marta@gmail.com','22224478','2019-01-26');
insert into clientes values (null,'1','Josue','Colonia prados de veneci','marta@gmail.com','22224478','2019-01-26');
insert into clientes values (null,'1','Marta','Colonia prados de veneci','marta@gmail.com','22224478','2019-01-26');
insert into clientes values (null,'1','Clari','Colonia prados de veneci','marta@gmail.com','22224478','2019-01-26');


/*select sum(total_vendido) as total_ventas from facturas;
select * from facturas;
select * from clientes;
select * from productos;
select * from productos where cantidad <= 10;
SET SQL_SAFE_UPDATES = 0;
delete from clientes;
SET SQL_SAFE_UPDATES = 1;

select * from clientes;
select * from productos where id_categoria = 1;
select p.id, c.categoria, p.producto, p.descripcion, p.cantidad, p.precio from productos  p inner join categorias c on p.id_categoria = c.id;*/






