
 -------------------------------------------------------
 CREATE TABLE picture (           
    pictureID number(5),
    MIMETYPE VARCHAR2(255 BYTE),
    FILELocation  VARCHAR2(255 BYTE),
    LAST_UPDATE DATE,
    CHARSET_ VARCHAR2(128 BYTE),
    PHOTO BLOB,
    NAME_ VARCHAR2(30 BYTE),
    CONSTRAINT PK_picture PRIMARY KEY (pictureID)

);

insert into picture (pictureID,mimetype,filelocation,last_update,charset_,name_)
         values(pictureid_seq.nextval,'imagen de prueba','D:\IMAGEN_PRUEBA',sysdate,'prueba de fotos','Penguins.jpg');
commit



---------------------------------------------------------------------------------
CREATE TABLE blob_test (PERSON_NAME VARCHAR2(10), PHOTO BLOB);

--Table created.

 
   /

