CREATE TABLE Language
  (
    languageID   NUMBER (8) NOT NULL ,
    languageCode VARCHAR2 (3) ,
    personID     NUMBER (3) NOT NULL
  ) ;
ALTER TABLE Language ADD CONSTRAINT LanguagePK PRIMARY KEY ( languageID ) ;

ALTER TABLE Language ADD CONSTRAINT language_Person_FK FOREIGN KEY ( personID ) REFERENCES Person ( personID ) ;
