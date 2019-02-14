DROP DATABASE inventario;
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


CREATE TABLE categorias(
	id int(255) auto_increment PRIMARY KEY,
    id_usuario int(255),
    categoria varchar(100) not null,
    fecha_registro date not null,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);


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

CREATE TABLE facturas(
	id int(255) auto_increment PRIMARY KEY,
	id_usuario int(255),
    cliente varchar(100),
    total_vendido float,
    productos_vendidos varchar(255),
    fecha_registro date not null
)ENGINE=InnoDb;

select sum(total_vendido) as total_ventas from facturas;
select * from facturas;
select * from clientes;
select * from productos;
select * from productos where cantidad <= 10;
SET SQL_SAFE_UPDATES = 0;
delete from clientes;
SET SQL_SAFE_UPDATES = 1;

select * from productos;
select * from productos where id_categoria = 1;
select p.id, c.categoria, p.producto, p.descripcion, p.cantidad, p.precio from productos  p inner join categorias c on p.id_categoria = c.id;

insert into clientes (id,id_usuario,cliente,direccion,email,telefono,fecha_registro) values (null, 1, 'Sin cliente','-','-','-','2019-01-31');
insert into clientes values (null,'1','Carlos','Colonia bosques del rio','carlos@gmail.com','22584367');
insert into clientes values (null,'1','Melissa','Colonia las margaritas','melisa@gmail.com','22588888');
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
insert into clientes values (null,'1','Marta','Colonia prados de veneci','marta@gmail.com','22224478','2019-01-26');











