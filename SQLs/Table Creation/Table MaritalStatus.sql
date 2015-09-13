CREATE TABLE maritalStatus
  (
    maritalStatusId NUMBER (3) NOT NULL ,
    maritalStatus   VARCHAR2 (20) NOT NULL
  ) ;
ALTER TABLE maritalStatus ADD CONSTRAINT maritalStatus_PK PRIMARY KEY ( maritalStatusId ) ;
ALTER TABLE Person ADD CONSTRAINT maritalStatus_FK FOREIGN KEY ( maritalStatusId ) REFERENCES maritalStatus ( maritalStatusId ) ;
