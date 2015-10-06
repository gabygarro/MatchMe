

CREATE TABLE picture (
  pictureID     NUMBER(5)    NOT NULL,
  fileLocation  varchar(300) NOT NULL,
  CONSTRAINT picture_pk PRIMARY KEY (pictureID),
  CONSTRAINT userNameID_FK FOREIGN KEY ( pictureID ) REFERENCES person ( userNameID ) ); 


