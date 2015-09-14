CREATE TABLE eyesColor
  (
    eyesColorId NUMBER (3) NOT NULL ,
    eyesColor   VARCHAR2 (15) NOT NULL
  );
ALTER TABLE eyesColor ADD CONSTRAINT eyesColor_PK PRIMARY KEY ( eyesColorId ) ;
ALTER TABLE Person ADD CONSTRAINT eyesColor_FK FOREIGN KEY ( eyesColorId ) REFERENCES eyesColor ( eyesColorId ) ;
