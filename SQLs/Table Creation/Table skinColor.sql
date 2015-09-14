CREATE TABLE skinColorCatalog
  (
    skinColorID NUMBER (3) NOT NULL ,
    skinColor   VARCHAR2 (15) NOT NULL
  ) ;
ALTER TABLE skinColorCatalog ADD CONSTRAINT skinColorPK PRIMARY KEY ( skinColorID ) ;
