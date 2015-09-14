CREATE TABLE matchedPersons
  (
    matchedPerson NUMBER (3) NOT NULL ,
    matcher       NUMBER (3) NOT NULL
  ) ;

ALTER TABLE matchedPersons ADD CONSTRAINT matchedPersons_Person_FK FOREIGN KEY ( matchedPerson ) REFERENCES Person ( personID ) ;

ALTER TABLE matchedPersons ADD CONSTRAINT matchedPersons_Person_FKv1 FOREIGN KEY ( matcher ) REFERENCES Person ( personID ) ;
