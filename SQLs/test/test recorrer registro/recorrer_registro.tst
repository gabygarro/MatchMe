PL/SQL Developer Test script 3.0
19
-- Created on 24/09/2015 by AARGUEDAS 
declare 
  -- Local variables here
  i integer;
begin
  -- Test statements here
  get_empleados(i,empleados);}
  loop
     fetch empleados
     into vfirst_name,
          vlast_name,
          vemployee_id,
          vdepartment_id;
      exit when empleados %notfound;
      dbms_output.put.line(vfirst_name ||' | ' || vlast_name ||' | ' || vemployee_id);
  end loop;
  close empleados;
  
end;
0
0
