/*==============================================================*/
/* DBMS name:      PostgreSQL 8                                 */
/* Created on:     10/10/2012 03:34:33 p.m.                     */
/*==============================================================*/

drop index CARPETA_PK;
drop table CARPETA;

/*==============================================================*/
/* Table: CARPETA                                                */
/*==============================================================*/
create table CARPETA (
   NOMBRE_C             VARCHAR(30)          not null,
   FECHA_CREACION_C     DATETIME             not null,
   ID_CARPETA           INT4                 not null,
   constraint PK_CARPETA primary key (ID_CARPETA)
);


