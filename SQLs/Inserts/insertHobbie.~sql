create or replace procedure insertHobbie (pHobbieId number, pHobbie varchar2, pPersonId number)
as
       BEGIN
         insert into hobbie (hobbieId,hobbie,personId)
         values(pHobbieId, pHobbie,pPersonId);

       --Exception
         --WHEN NO_DATA_FOUND THEN
              --DBMS_OUTPUT.PUT_LINE ('No Data found for SELECT on ' || emailId);
        -- WHEN OTHERS THEN
              --DBMS_OUTPUT.PUT_LINE ('Unexpected error');
              --RAISE;
         commit;

       END;
