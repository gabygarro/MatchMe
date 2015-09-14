CREATE TABLE countryCatalog
  (
    countryID   VARCHAR2 (3) NOT NULL ,
    countryName VARCHAR2 (50) NOT NULL
  );
ALTER TABLE countryCatalog ADD CONSTRAINT countryPK PRIMARY KEY ( countryID ) ;
