create or replace procedure insertInterestCat (pInterestName varchar2)
as
       BEGIN
         insert into interestCatalog (InterestID,InterestName)
         values(InterestID_seq.nextval,pInterestName);

        Exception
         WHEN VALUE_ERROR THEN
              DBMS_OUTPUT.PUT_LINE ('Interest ID error ');
         WHEN OTHERS THEN
              DBMS_OUTPUT.PUT_LINE ('Unexpected error');
              RAISE;
         commit;

       END;
