Create or replace procedure updatePersonHighSchool (pPersonID number, pHighSchool varchar2)
as
       BEGIN        
           UPDATE Person
           SET HighSchool = pHighSchool
           WHERE pPersonID = personID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;
