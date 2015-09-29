CREATE TABLE Picture
(pictureID     VARCHAR2(6)   not null,
 fileLocation VARCHAR2(100) not null,
 BIN            BLOB              null,
 FX_ALTA        DATE              null,
 CONSTRAINT PK_ARCHIVOS PRIMARY KEY (CO_ARCHIVO)
 ) 
 -------------------------------------------------------
 CREATE TABLE picture (           
    pictureID integer(5),
    MIMETYPE VARCHAR2(255 BYTE),
    FILELocation  VARCHAR2(255 BYTE),
    LAST_UPDATE DATE,
    CHARSET_ VARCHAR2(128 BYTE),
    PHOTO BLOB,
    NAME_ VARCHAR2(30 BYTE),
    CONSTRAINT PK_picture PRIMARY KEY (pictureID);

);
