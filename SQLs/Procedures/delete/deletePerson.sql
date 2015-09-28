Create or replace procedure deletePerson (pPersonID number)
as
       BEGIN        
           DELETE FROM Person
           WHERE pPersonID = personID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person not found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;
