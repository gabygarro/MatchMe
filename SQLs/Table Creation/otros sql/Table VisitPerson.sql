CREATE TABLE visit_Person
  (
    visitor  NUMBER (3) NOT NULL ,
    visitedPerson NUMBER (3) NOT NULL
  ) ;
  
ALTER TABLE visit_Person ADD CONSTRAINT visit_Person__IDX PRIMARY KEY ( visitor, visitedPerson );

ALTER TABLE visit_Person ADD CONSTRAINT visitor_FK FOREIGN KEY ( visitor ) REFERENCES Person ( personID ) ;

ALTER TABLE visit_Person ADD CONSTRAINT visitedPerson_FK FOREIGN KEY ( visitedPerson ) REFERENCES Person ( personID ) ;
