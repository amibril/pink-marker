/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     23/11/2012 15:43:01                          */
/*==============================================================*/


drop table if exists SESION;

drop table if exists USUARIO;

/*==============================================================*/
/* Table: SESION                                                */
/*==============================================================*/
create table SESION
(
   ID_USUARIO           int not null,
   ID_SESION            int not null,
   FECHA_SESION         datetime not null,
   primary key (ID_USUARIO, ID_SESION)
);

/*==============================================================*/
/* Table: USUARIO                                               */
/*==============================================================*/
create table USUARIO
(
   ID_USUARIO           int not null auto_increment,
   LOGIN_USUARIO        varchar(100) not null,
   PASSWORD_USUARIO     varchar(100) not null,
   NOMBRE_USUARIO       varchar(100) not null,
   APELLIDO_MATERNO     varchar(100) not null,
   APELLIDO_PATERNO     varchar(100) not null,
   EMAIL_USUARIO        varchar(100) not null,
   primary key (ID_USUARIO)
);

alter table SESION add constraint FK_R_1 foreign key (ID_USUARIO)
      references USUARIO (ID_USUARIO) on delete restrict on update restrict;

