create or replace procedure getLastName1(pUserID in number, pLastName1 out varchar2) as
       BEGIN
         select LastName1 
         into pLastName1
         from person
         where personID = pUserID;
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
       END;
