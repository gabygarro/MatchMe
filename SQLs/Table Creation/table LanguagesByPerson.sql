CREATE TABLE languagesByPerson
  (
    languageCode VARCHAR2 (3) NOT NULL ,
    personID     NUMBER (5) NOT NULL
  ) ;
  
ALTER TABLE languagesByPerson ADD CONSTRAINT languagesByPerson_Person_FK FOREIGN KEY ( personID ) REFERENCES Person ( personID );

ALTER TABLE languagesByPerson ADD CONSTRAINT languagesByPersonlanguageIDFK FOREIGN KEY ( languageCode ) REFERENCES languageCatalog ( languageCode );
