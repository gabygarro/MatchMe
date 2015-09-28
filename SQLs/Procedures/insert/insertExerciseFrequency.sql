create or replace procedure insertExerciseFrequencyCat (pexercisefreqName varchar2)
as
       BEGIN
         insert into Exercisefrequencycatalog (exercisefreqID,exercisefreqName)
         values(exercisefrequency_seq.nextval,pexercisefreqName);

        Exception
         WHEN INVALID_NUMBER THEN
              DBMS_OUTPUT.PUT_LINE ('Exercise Frequency error ');
         WHEN OTHERS THEN
              DBMS_OUTPUT.PUT_LINE ('Unexpected error');
              RAISE;
         commit;

       END;
