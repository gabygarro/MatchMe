Create or replace procedure updatePersonFirstname (pPersonID number, pFirstName varchar2)
as
       BEGIN        
           UPDATE Person
           SET firstname = pFirstName
           WHERE pPersonID = personID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;
