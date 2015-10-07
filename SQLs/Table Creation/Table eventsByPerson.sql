CREATE TABLE eventsByPerson
  (
    eventId   NUMBER (3) NOT NULL ,
    personID  NUMBER (5) NOT NULL
  ) ;

ALTER TABLE eventsByPerson ADD CONSTRAINT EventPerson_Person_FK FOREIGN KEY ( personID ) REFERENCES Person ( personID ) ;

ALTER TABLE eventsByPerson ADD CONSTRAINT EventPerson_event_FK FOREIGN KEY ( eventId ) REFERENCES event ( eventID );
