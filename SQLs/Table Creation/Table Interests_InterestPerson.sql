CREATE TABLE Interest
  (
    interestID NUMBER (8) NOT NULL ,
    interest   VARCHAR2 (30) ,
    personID  NUMBER (3) NOT NULL
  ) ;
ALTER TABLE Interest ADD CONSTRAINT interestPK PRIMARY KEY ( interestID ) ;

ALTER TABLE Interest ADD CONSTRAINT interest_PersonFK FOREIGN KEY ( personID ) REFERENCES Person ( personID ) ;


CREATE TABLE interest_Person
  (
    personID     NUMBER (3) NOT NULL ,
    interestID NUMBER (8) NOT NULL
  ) ;
ALTER TABLE interest_Person ADD CONSTRAINT interest_Person__IDX PRIMARY KEY ( personID, interestID );

ALTER TABLE interest_Person ADD CONSTRAINT person_Interest_FK FOREIGN KEY ( personID ) REFERENCES Person ( personID );

ALTER TABLE interest_Person ADD CONSTRAINT interest_Person_FK FOREIGN KEY ( interestID ) REFERENCES Interest ( interestID );
