/*==============================================================*/
/* DBMS name:      PostgreSQL 8                                 */
/* Created on:     10/10/2012 03:34:33 p.m.                     */
/*==============================================================*/


drop index ENLACE_PK;

drop table ENLACE;

/*==============================================================*/
/* Table: ENLACE                                                */
/*==============================================================*/


create table ENLACE (
   ID_ENLACE            SERIAL                 not null,
   NOMBRE_E             VARCHAR(30)          not null,
   DIRECCION_E          VARCHAR(250)         not null,
   DESCRIPCION_E        TEXT                 null,
   constraint PK_ENLACE primary key (ID_ENLACE)
);


