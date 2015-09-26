create or replace procedure get_empleados(pdeptno in employee.deparment_id%type,
                                          p_recorset out sys_refcursor) as
                                         
begin
  open p_recorset for
       select first_name,
              last_name,
              employee_id,
              department_id
       from employee
       where deptno = pdeptno
       order by first_name;

end get_empleados;       
