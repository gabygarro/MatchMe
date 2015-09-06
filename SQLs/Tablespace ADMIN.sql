CREATE TABLESPACE Admin_Data
  DATAFILE 'D:\app\datic\oradata\matchdb\admindata01.dbf'
  SIZE 10M
  REUSE
  AUTOEXTEND ON
  NEXT 512k
  MAXSIze 200M;
  
  CREATE TABLESPACE Admin_Ind
   DATAFILE 'D:\app\datic\oradata\matchdb\adminind01.dbf'
   SIZE 10M
   REUSE
   AUTOEXTEND ON
   NEXT 512k
   MAXSIZE 200M;
