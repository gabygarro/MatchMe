CREATE TABLE hobbiesByPerson
  (
    hobbieID        NUMBER (3) NOT NULL ,
    personID        NUMBER (5) NOT NULL
  ) ;

ALTER TABLE hobbiesByPerson ADD CONSTRAINT hobbiesByPerson_Person_FK FOREIGN KEY ( personID ) REFERENCES Person ( personID ) ;

ALTER TABLE hobbiesByPerson ADD CONSTRAINT hobbiesByPerson_hobbieID_FK FOREIGN KEY ( hobbieID ) REFERENCES hobbieCatalog ( hobbieID ) ;
