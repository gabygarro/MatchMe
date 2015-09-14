create or replace procedure insertZodiacSignCat (pZodiacSignName varchar2)
as
       BEGIN
         insert into zodiacSignCatalog (zodiacSignID,zodiacSignName)
         values(ZodiacSignID_seq.nextval, pZodiacSignName);

        Exception
         WHEN INVALID_NUMBER THEN
              DBMS_OUTPUT.PUT_LINE ('Zodiac Sign ID error ');
         WHEN OTHERS THEN
              DBMS_OUTPUT.PUT_LINE ('Unexpected error');
              RAISE;
         commit;

       END;
