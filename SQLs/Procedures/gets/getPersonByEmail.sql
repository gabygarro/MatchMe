create or replace procedure getPersonByEmail (pEmail in varchar2, pUserNameIDs  out sys_refcursor) as
begin
  open pUserNameIDs for
  select userNameID
  from username
  where pEmail = userEmail or userEmail like '%' || userEmail || '%'
  order by userNameID;

end getPersonByemail;

