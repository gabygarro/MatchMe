CREATE TABLE interestsByPerson
  (
    interestID  NUMBER (3) NOT NULL ,
    personID    NUMBER (5) NOT NULL
  ) ;

ALTER TABLE interestsByPerson ADD CONSTRAINT interestsByPerson_Person_FK FOREIGN KEY ( personID ) REFERENCES Person ( personID );

ALTER TABLE interestsByPerson ADD CONSTRAINT interestsXPersoninterestIDFK FOREIGN KEY ( interestID ) REFERENCES interestCatalog ( interestID );
