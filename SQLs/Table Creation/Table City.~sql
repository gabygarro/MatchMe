CREATE TABLE cityCatalog
  (
    cityID                   NUMBER (4) NOT NULL ,
    cityName                 VARCHAR2 (50) NOT NULL ,
    countryID                VARCHAR2 (3)
  ) ;
ALTER TABLE cityCatalog ADD CONSTRAINT cityPK PRIMARY KEY ( cityID ) ;

ALTER TABLE cityCatalog ADD CONSTRAINT cityCatalog_countryCatalog_FK FOREIGN KEY ( countryID ) REFERENCES countryCatalog ( countryID );
