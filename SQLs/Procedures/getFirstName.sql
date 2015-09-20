create or replace procedure getFirstName(pUserID in number, pFirstName out varchar2) as
       BEGIN
         select firstname into pFirstName
         from person where
         personID = pUserID;
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
       END;
