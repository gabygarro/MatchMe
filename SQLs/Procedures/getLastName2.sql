create or replace procedure getLastName2(pUserID in number, pLastName2 out varchar2) as
       BEGIN
         select LastName2 
         into pLastName2
         from person
         where personID = pUserID;
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
       END;
