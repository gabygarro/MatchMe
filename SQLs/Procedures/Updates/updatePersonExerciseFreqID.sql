Create or replace procedure updatePersonExerciseFreqID (pPersonID number, pExerciseFreqID number)
as
       BEGIN        
           UPDATE Person
           SET ExerciseFreqID = pExerciseFreqID
           WHERE pPersonID = personID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;
