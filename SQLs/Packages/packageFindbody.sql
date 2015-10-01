CREATE OR REPLACE PACKAGE BODY find AS
-------------------------------------------------------------------------------
-------------------------------------------------------------------------------
procedure findName (pName in varchar2, pUserIDs  out sys_refcursor) as
   --obtein through the parameter pname all person when pname is in firstName
   --and return for the out parameter sys_refcursor with the next data
   --Name, lastName, lastName2, age, tagline, city and country .
begin
  open pUserIDs for
  select person.userNameID as UNID, person.firstName as fName, person.lastName1 as lname, person.lastName2 as lName2,
         FLOOR(months_between(TRUNC(sysdate),birthday)/12) as age,
         person.tagline as tag, citycatalog.cityname as city,
         countrycatalog.countryname as country        
  from person, citycatalog, countrycatalog
  where firstName like '%' || pName || '%'
  and citycatalog.cityid = person.cityid
  and countrycatalog.countryid = (select countryid from citycatalog where citycatalog.cityid = person.cityid)
  order by fName;
  
   Exception
     WHEN NO_DATA_FOUND THEN
      DBMS_OUTPUT.PUT_LINE (' ');


end findName;
-------------------------------------------------------------------------------
-------------------------------------------------------------------------------
procedure LastName2 (pLastName2 in varchar2, pUserIDs  out sys_refcursor) as
   --obtein through the userid the  lastName2 and return for the out parameter sys_refcursor.
begin
  open pUserIDs for
  select userNameID, lastName2
  from person
  where pLastName2 = lastName2 or lastName2 like '%' || pLastName2 || '%'
  order by userNameID;

end LastName2;
-------------------------------------------------------------------------------
procedure LastName (pLastName in varchar2, pUserIDs  out sys_refcursor) as
   --obtein through the userid the  lastName1 and return for the out parameter sys_refcursor.
begin
  open pUserIDs for
  select p.usernameid, p.lastname1
  from person p
  where plastname = p.lastname1 or p.lastname1 like '%' || pLastName || '%'
  order by userNameID;

end LastName;
-------------------------------------------------------------------------------
procedure NickName (pNickName in varchar2, pNickNameIDs  out sys_refcursor) as
   --obtein through the userid the  nickName and return for the out parameter sys_refcursor.
begin
  open pNickNameIDs for
  select userNameID
  from person
  where pNickName = nickName or nickName like '%' || pnickName || '%'
  order by userNameID;

end NickName;
-------------------------------------------------------------------------------
-------------------------------------------------------------------------------
END find;
