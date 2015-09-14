create or replace procedure insertWinkperson (pWinkID number, pwinker number, pWinkedPerson number)
as
       BEGIN
         insert into winkPerson (WinkID,winker,winkedPerson)
         values(pWinkID,pwinker,pWinkedPerson);

        Exception
         WHEN INVALID_NUMBER THEN
              DBMS_OUTPUT.PUT_LINE ('Wink ID error ');
         WHEN OTHERS THEN
              DBMS_OUTPUT.PUT_LINE ('Unexpected error');
              RAISE;
         commit;

       END;
