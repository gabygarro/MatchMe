-- check tupla in matched person 
create or replace procedure checkMatch (pMatcher number, pMatched number, pCheck out number) as
begin 
  select 1 into pCheck from matchedpersons mp
  where mp.matchedperson = pMatched and mp.matcher = pMatcher;
        Exception
         WHEN NO_DATA_FOUND THEN
              pCheck:=0;
         
         commit;
  
end;
  
