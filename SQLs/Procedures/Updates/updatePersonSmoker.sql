Create or replace procedure updatePersonSmoker (pPersonID number, pSmoker number)
as
       BEGIN        
           UPDATE Person
           SET Smoker = pSmoker
           WHERE pPersonID = personID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;
