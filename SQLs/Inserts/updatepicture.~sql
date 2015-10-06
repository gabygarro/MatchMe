create or replace procedure upDatePicture (pUserID number, pFileLocation varchar2)
  --update the column FileLocation on the table Picture using the parameter pFileLocation
as
       BEGIN        
           UPDATE Picture
           SET FileLocation = pFileLocation
           WHERE pUserID = picture.pictureid;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
         commit;

       END;
-------------------------------------------------------------------------------
