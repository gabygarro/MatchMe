CREATE TABLE event
  (
    eventID     NUMBER (3) NOT NULL ,
    eventName   VARCHAR2 (30) NOT NULL ,
    eventDate   DATE NOT NULL ,
    cityId      NUMBER (3) NOT NULL
  ) ;
ALTER TABLE event ADD CONSTRAINT eventPK PRIMARY KEY ( eventID ) ;

ALTER TABLE event ADD CONSTRAINT event_city_FK FOREIGN KEY ( cityId ) REFERENCES cityCatalog ( cityID ) ;

alter table event
add eventLocation varchar2 (300);

alter table event
add eventDescription varchar2 (300);

alter table event
modify cityId number (4);

 
