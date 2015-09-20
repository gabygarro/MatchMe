create or replace procedure getBirthday(pUserID in number, pBirthday out date) as
       BEGIN
         select Birthday 
         into pBirthday
         from person
         where personID = pUserID;
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
       END;
