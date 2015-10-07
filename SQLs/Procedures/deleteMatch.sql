--delete a tupla in macthedpersons using both parameters
create or replace procedure deleteMatch (pMatcher number, pMatched number) as
begin 
  delete from matchedpersons mp
  where mp.matchedperson = pMatched and mp.matcher = pMatcher;
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Invalid ID ');
         
         commit;
  
end;
  
