CREATE OR REPLACE PROCEDURE getPicture(pUserID IN number, pfileLocation OUT varchar) as
       BEGIN
         SELECT fileLocation
         INTO pfileLocation
         FROM picture
         WHERE pUserID = picture.pictureid;
       END;
