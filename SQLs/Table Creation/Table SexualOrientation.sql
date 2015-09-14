CREATE TABLE sexualOrientationCatalog
  (
    orientationID   NUMBER (3) NOT NULL ,
    orientationName VARCHAR2 (20) NOT NULL
  ) ;
ALTER TABLE sexualOrientationCatalog ADD CONSTRAINT sexualOrientationPK PRIMARY KEY ( orientationID ) ;
