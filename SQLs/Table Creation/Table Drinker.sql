CREATE TABLE Drinker
  (
    drinkerId   NUMBER (3) NOT NULL ,
    drinkerType VARCHAR2 (20) NOT NULL
  ) ;
  
ALTER TABLE Drinker ADD CONSTRAINT Drinker_PK PRIMARY KEY ( drinkerId ) ;

ALTER TABLE Person ADD CONSTRAINT Drinker_FK FOREIGN KEY ( drinkerId ) REFERENCES Drinker ( drinkerId );
