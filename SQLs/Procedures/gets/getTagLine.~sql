create or replace procedure getTagLine(pUserID in number, pTagLine out varchar2) as
       BEGIN
         select TagLine 
         into pTagLine
         from person
         where personID = pUserID;
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
       END;
