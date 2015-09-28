create or replace procedure insertAgeRangeCat (pRangeID number, pAgeRange varchar2)
as
       BEGIN
         insert into agerangecatalog (rangeID,ageRange)
         values(pRangeID,pAgeRange);

        Exception
         WHEN INVALID_NUMBER THEN
              DBMS_OUTPUT.PUT_LINE ('Age Range ID error ');
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;
