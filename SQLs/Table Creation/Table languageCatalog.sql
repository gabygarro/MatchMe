CREATE TABLE languageCatalog
  (
    languageCode VARCHAR2 (3) NOT NULL ,
    languageName VARCHAR2 (50) NOT NULL
  ) ;
ALTER TABLE languageCatalog ADD CONSTRAINT LanguagePK PRIMARY KEY ( languageCode ) ;
