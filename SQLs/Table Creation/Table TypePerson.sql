CREATE TABLE typeUser
  (
    type_Id           NUMBER(3) NOT NULL ,
    typeAdministrator CHAR (1) ,
    username_nickname VARCHAR2 (30) NOT NULL
  );

ALTER TABLE typeUser ADD CONSTRAINT typeUser_PK PRIMARY KEY ( type_Id ) ;

ALTER TABLE typeUser ADD CONSTRAINT typeUser_username_FK FOREIGN KEY ( type_Id ) REFERENCES username ( usernameid );
