CREATE TABLE Interest
  (
    interestID NUMBER (8) NOT NULL ,
    interest   VARCHAR2 (30) ,
    personID  NUMBER (3) NOT NULL
  ) ;
ALTER TABLE Interest ADD CONSTRAINT interestPK PRIMARY KEY ( interestID ) ;

ALTER TABLE Interest ADD CONSTRAINT interest_Person_FK FOREIGN KEY ( personID ) REFERENCES Person ( personID ) ;
