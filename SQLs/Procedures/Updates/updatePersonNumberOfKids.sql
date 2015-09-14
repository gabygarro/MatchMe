Create or replace procedure updatePersonNumberOfKids (pPersonID number, pNumberOfKids number)
as
       BEGIN        
           UPDATE Person
           SET NumberOfKids = pNumberOfKids
           WHERE pPersonID = personID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;
