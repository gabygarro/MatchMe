CREATE TABLE username
  (
    usernameID      NUMBER (5) NOT NULL ,
    userEmail       VARCHAR2 (30) NOT NULL ,
    usernamePassword VARCHAR2 (50) NOT NULL ,
    userTypeID       NUMBER (1) NOT NULL
  ) ;
ALTER TABLE username ADD CONSTRAINT usernamePK PRIMARY KEY ( usernameID ) ;

ALTER TABLE username ADD CONSTRAINT username_userTypeCatalog_FK FOREIGN KEY ( userTypeID ) REFERENCES userTypeCatalog ( userTypeID ) ;

alter table username
modify useremail add constraint useremail_uk unique(useremail);
