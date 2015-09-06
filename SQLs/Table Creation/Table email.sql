CREATE TABLE email
  (
    emailID   NUMBER (4) NOT NULL ,
    email     VARCHAR2 (30) CONSTRAINT email_nn NOT NULL ,
    CONSTRAINT email_unique UNIQUE(email),
    personID NUMBER (3) NOT NULL
  ) ;

ALTER TABLE email
      ADD CONSTRAINT email_Person_FK FOREIGN KEY ( personID ) REFERENCES Person ( PersonID ) ;
