create or replace procedure insertLanguagesByPerson (pLanguageCode varchar2, pPersonID number)
as
       BEGIN
         insert into languagesByPerson (languageCode,personID)
         values(pLanguageCode,pPersonID);

        Exception
         WHEN INVALID_NUMBER THEN
              DBMS_OUTPUT.PUT_LINE ('Language ID error ');
         WHEN OTHERS THEN
              DBMS_OUTPUT.PUT_LINE ('Unexpected error');
              RAISE;
         commit;

       END;
