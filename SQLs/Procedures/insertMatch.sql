create or replace procedure insertMatch (pMatcher number, pMatched number) as
begin 
  insert into matchedpersons (matchedPerson,Matcher)
         values(pMatched,pMatcher);

        Exception
         WHEN INVALID_NUMBER THEN
              DBMS_OUTPUT.PUT_LINE ('Invalid ID ');
         
         commit;
  
end;
  
