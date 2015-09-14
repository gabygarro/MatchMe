create or replace procedure insertLanguageCat (pLanguageCode varchar2, pLanguageName varchar2)
as
       BEGIN
         insert into languagecatalog (LanguageCode,LanguageName)
         values(pLanguageCode,pLanguageName);

        Exception
         WHEN VALUE_ERROR THEN
              DBMS_OUTPUT.PUT_LINE ('Language Code error ');
         WHEN OTHERS THEN
              DBMS_OUTPUT.PUT_LINE ('Unexpected error');
              RAISE;
         commit;

       END;
