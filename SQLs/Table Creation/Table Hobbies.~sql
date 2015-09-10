CREATE TABLE Hobbie
  (
    hobbieID  NUMBER (8) NOT NULL ,
    hobbie    VARCHAR2 (30) ,
    personID NUMBER (3) NOT NULL
  ) ;
ALTER TABLE Hobbie ADD CONSTRAINT hobbiePK PRIMARY KEY ( hobbieID ) ;

ALTER TABLE Hobbie ADD CONSTRAINT hobbie_Person_FK FOREIGN KEY ( personID ) REFERENCES Person ( personID ) ;
