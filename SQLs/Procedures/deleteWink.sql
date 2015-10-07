create or replace procedure deleteWink (pwinker number, pWinkedPerson number)
as
  --delete a tuple in the table Winkperson
       BEGIN
         delete  from winkperson wp
         where wp.winker = pwinker and wp.winkedperson = pWinkedPerson;

        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Invalid ID ');
         commit;

       END;
       
