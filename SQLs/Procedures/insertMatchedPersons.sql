create or replace procedure insertMatchedPersons (pMatchedPerson number, pMatcher number)
as
       BEGIN
         insert into matchedPersons (matchedPerson, matcher)
         values(pMatchedPerson,pMatcher);

        Exception
         WHEN INVALID_NUMBER THEN
              DBMS_OUTPUT.PUT_LINE ('Matched Person ID error ');
         WHEN OTHERS THEN
              DBMS_OUTPUT.PUT_LINE ('Unexpected error');
              RAISE;
         commit;

       END;
