CREATE TABLE educationLevel
  (
    educationLevelId NUMBER (3) NOT NULL ,
    educationLevel   VARCHAR2 (20) NOT NULL
  );
ALTER TABLE educationLevel ADD CONSTRAINT educationLevel_PK PRIMARY KEY ( educationLevelId ) ;

ALTER TABLE Person ADD CONSTRAINT educationLevel_FK FOREIGN KEY ( educationLevelId ) REFERENCES educationLevel ( educationLevelId )  ;
