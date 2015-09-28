create or replace procedure insertReligionCat (pReligionName varchar2)
as
       BEGIN
         insert into religionCatalog (ReligionID,ReligionName)
         values(ReligionID_seq.nextval,pReligionName);

        Exception
         WHEN INVALID_NUMBER THEN
              DBMS_OUTPUT.PUT_LINE ('Religion ID error ');
         WHEN OTHERS THEN
              DBMS_OUTPUT.PUT_LINE ('Unexpected error');
              RAISE;
         commit;

       END;
