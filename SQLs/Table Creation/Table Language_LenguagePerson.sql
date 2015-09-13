CREATE TABLE TLanguage
  (
    languageID   NUMBER (8) NOT NULL ,
    languageCode VARCHAR2 (3)
    
  ) ;
  
ALTER TABLE TLanguage ADD CONSTRAINT TLanguage_PK PRIMARY KEY ( languageID ) ;

CREATE TABLE Language_Person
  (
    personID     NUMBER (3) NOT NULL ,
    languageID NUMBER (8) NOT NULL
  );
  
ALTER TABLE Language_Person ADD CONSTRAINT Language_Person__IDX PRIMARY KEY ( personID,languageID ) ;

ALTER TABLE Language_Person ADD CONSTRAINT Person_Language_FK FOREIGN KEY ( personID ) REFERENCES Person ( personID );

ALTER TABLE Language_Person ADD CONSTRAINT Language_Person_FK FOREIGN KEY ( languageID ) REFERENCES TLanguage ( languageID );
