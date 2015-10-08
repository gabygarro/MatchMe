select distinct (ibp.personid) 
from interestsbyperson ibp, person p
where ibp.interestid in (select ibp.interestid from interestsbyperson
                          where p.usernameid = 21)
                          and p.usernameid <> 21;
                          

