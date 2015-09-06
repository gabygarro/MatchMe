create or replace procedure insertInterest (pInterestId number, pInterest varchar2, pPersonId number)
as
       BEGIN
         insert into interest (interestId,interest,personId)
         values(pInterestId, pInterest,pPersonId);

       --Exception
         --WHEN NO_DATA_FOUND THEN
              --DBMS_OUTPUT.PUT_LINE ('No Data found for SELECT on ' || emailId);
        -- WHEN OTHERS THEN
              --DBMS_OUTPUT.PUT_LINE ('Unexpected error');
              --RAISE;
         commit;

       END;
