CREATE TABLE emailsByPerson
  (
    emailID         NUMBER (4) NOT NULL ,
    email           VARCHAR2 (30) CONSTRAINT email_nn NOT NULL ,
    personID        NUMBER (3) NOT NULL
  ) ;
ALTER TABLE emailsByPerson ADD CONSTRAINT emailUN UNIQUE ( email ) ;

ALTER TABLE emailsByPerson ADD CONSTRAINT email_Person_FK FOREIGN KEY ( personID ) REFERENCES Person ( personID ) ;
