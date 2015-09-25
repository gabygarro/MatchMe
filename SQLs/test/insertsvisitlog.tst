PL/SQL Developer Test script 3.0
13
-- Created on 24/09/2015 by ADMINISTRADOR 
declare 
  -- Local variables here
  i integer;
begin
  -- Test statements here
  inserts.Visitlog(sysdate,5,8);
  inserts.Visitlog(sysdate,5,9);
  inserts.Visitlog(sysdate,5,7);
  inserts.Visitlog(sysdate,8,10);
  inserts.Visitlog(sysdate,8,10);
  
end;
0
0
