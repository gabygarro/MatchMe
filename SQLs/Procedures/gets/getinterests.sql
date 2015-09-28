create or replace function getinterests (pUserNameID NUMBER)
       RETURN sys_refcursor is interestsName varchar2(50);
       BEGIN
         SELECT department_name
         into pDepartmentName
         from department
         where department_id = pDepartment_id;
         RETURN (pDepartmentName);
       END;
       
        open pInterestName for
  select interestName --as interest
         from interestcatalog, InterestsByPerson
         where InterestCatalog.InterestID = InterestsByPerson.interestID
               and personID = pinterestID
         order by interestName;
