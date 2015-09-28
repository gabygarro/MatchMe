create or replace procedure getAddress(pUserID in number, pAddress out varchar2) as
       BEGIN
         select Address 
         into pAddress
         from person
         where personID = pUserID;
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
       END;
