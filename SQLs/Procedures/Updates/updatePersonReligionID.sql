Create or replace procedure updatePersonReligionID (pPersonID number, pReligionID number)
as
       BEGIN        
           UPDATE Person
           SET ReligionID = pReligionID
           WHERE pPersonID = personID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;
