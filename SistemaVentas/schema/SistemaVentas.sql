/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     22/10/2017 4:21:15 p. m.                     */
/*==============================================================*/

drop database if exists SistemaVentas;
create database if not exists SistemaVentas default character set utf8 collate utf8_general_ci;
use SistemaVentas;

/*==============================================================*/
/* Table: CATEGORIA                                             */
/*==============================================================*/
create table CATEGORIA
(
   CATEGORIAID          int not null,
   NOMBRECATEGORIA      varchar(50) not null,
   DESCRIPCIONCATEGORIA varchar(255),
   CONDICIONCATEGORIA   bool not null,
   primary key (CATEGORIAID)
);

/*==============================================================*/
/* Table: ARTICULO                                              */
/*==============================================================*/
create table ARTICULO
(
   ARTICULOID           int not null,
   CATEGORIAID          int not null,
   CODIGOARTICULO       varchar(50) not null,
   NOMBREARTICULO       varchar(100) not null,
   STOCKARTICULO        int not null,
   DESCRIPCIONARTICULO  varchar(255),
   ESTADOARTICULO       varchar(20),
   IMAGENARTICULO       varchar(50),
   primary key (ARTICULOID),
   constraint FK_CATEGORIA_ARTICULO foreign key (CATEGORIAID)
      references CATEGORIA (CATEGORIAID)
);

/*==============================================================*/
/* Table: PERSONA                                               */
/*==============================================================*/
create table PERSONA
(
   PERSONAID            int not null,
   TIPOPERSONA          varchar(20) not null,
   NOMBREPERSONA        varchar(100) not null,
   TIPODOCUMENTOPERSONA varchar(15),
   NUMERODOCUMENTOPERSONA varchar(20),
   DIRECCIONPERSONA     varchar(255),
   TELEFONOPERSONA      varchar(15),
   EMAILPERSONA         varchar(20),
   primary key (PERSONAID)
);

/*==============================================================*/
/* Table: INGRESO                                               */
/*==============================================================*/
create table INGRESO
(
   INGRESOID            int not null,
   PROVEEDORID          int not null,
   TIPOCOMPROBANTEINGRESO varchar(20) not null,
   SERIECOMPROBANTEINGRESO varchar(7),
   NUMEROCOMPROBANTEINGRESO varchar(10) not null,
   FECHAHORAINGRESO     datetime not null,
   IMPUESTOINGRESO      decimal(4,2) not null,
   ESTADOINGRESO        varchar(20) not null,
   primary key (INGRESOID),
   constraint FK_PERSONA_INGRESO foreign key (PROVEEDORID)
      references PERSONA (PERSONAID)
);

/*==============================================================*/
/* Table: DETALLEINGRESO                                        */
/*==============================================================*/
create table DETALLEINGRESO
(
   DETALLEINGRESOID     int not null,
   INGRESOID            int not null,
   ARTICULOID           int not null,
   CANTIDADARTICULO     int not null,
   PRECIOCOMPRAARTICULO decimal(11,2) not null,
   PRECIOVENTAARTICULO  decimal(11,2) not null,
   primary key (DETALLEINGRESOID),
   constraint FK_ARTICULO_DETALLEINGRESO foreign key (ARTICULOID)
      references ARTICULO (ARTICULOID),
   constraint FK_INGRESO_DETALLEINGRESO foreign key (INGRESOID)
      references INGRESO (INGRESOID)
);

/*==============================================================*/
/* Table: VENTA                                                 */
/*==============================================================*/
create table VENTA
(
   VENTAID              int not null,
   CLIENTEID            int not null,
   TIPOCOMPROBANTEVENTA varchar(20) not null,
   SERIECOMPROBANTEVENTA varchar(7) not null,
   NUMEROCOMPROBANTEVENTA varchar(10) not null,
   FECHAHORAVENTA       datetime not null,
   IMPUESTOVENTA        decimal(4,2) not null,
   TOTALVENTA           decimal(11,2) not null,
   ESTADOVENTA          varchar(20) not null,
   primary key (VENTAID),
   constraint FK_PERSONA_VENTA foreign key (CLIENTEID)
      references PERSONA (PERSONAID)
);

/*==============================================================*/
/* Table: DETALLEVENTA                                          */
/*==============================================================*/
create table DETALLEVENTA
(
   DETALLEVENTAID       int not null,
   VENTAID              int not null,
   ARTICULOID           int not null,
   CANTIDADVENTA        int not null,
   PRECIOVENTA          decimal(11,2) not null,
   DESCUENTOVENTA       decimal(11,2),
   primary key (DETALLEVENTAID),
   constraint FK_ARTICULO_DETALLEVENTA foreign key (ARTICULOID)
      references ARTICULO (ARTICULOID),
   constraint FK_VENTA_DETALLEVENTA foreign key (VENTAID)
      references VENTA (VENTAID)
);

