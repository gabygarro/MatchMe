CREATE TABLE hobbieCatalog
  (
    hobbieID   NUMBER (3) NOT NULL ,
    hobbieName VARCHAR2 (30) NOT NULL
  ) ;
ALTER TABLE hobbieCatalog ADD CONSTRAINT HobbiePK PRIMARY KEY ( hobbieID ) ;
