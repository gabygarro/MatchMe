Create or replace procedure updatePersonNickName (pPersonID number, pNickName varchar2)
as
       BEGIN        
           UPDATE Person
           SET NickName = pNickName
           WHERE pPersonID = personID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;
