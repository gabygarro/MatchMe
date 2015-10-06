Create or replace procedure insertPicture(pUserID in number, pFileLocation in varchar2) as
begin
  insert into picture(pictureId,fileLocation)
         values(pUserID,pFileLocation);

       Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('No Data found for SELECT on ' || pUserID);
   commit;
 
end ;
