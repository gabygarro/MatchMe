select count(*)
from person

SELECT P.personid, C.CITYNAME, Co.Countryname
from person P
inner join citycatalog C on  C.CITYID = P.Cityid
inner join countrycatalog Co on Co.Countryid = C.COUNTRYID

SELECT Co.Countryid, count(*)
from person P
inner join citycatalog C on  C.CITYID = P.Cityid
inner join countrycatalog Co on Co.Countryid = C.COUNTRYID
Group by Co.Countryid

SELECT C.Cityid, count(*)
from person P
inner join citycatalog C on  C.CITYID = P.Cityid
group by c.cityid


select genderId, count(*)
from person 
group by genderId  

select  relationshipstatusId, count(*)
from person
group by relationshipstatusId

select  hobbieId, count (*)
from hobbiesbyperson
group by hobbieId

select  interestId, count (*)
from interestsbyperson
group by interestId

SELECT   Hc.Hobbiename, hp.personid
from hobbiesbyperson Hp
inner join hobbiecatalog Hc on   Hc.hobbieid = Hp.Hobbieid 

SELECT Hc.hobbieid, count(*)
from hobbiesbyperson hp
inner join hobbiecatalog  Hc on  Hc.hobbieid = hp.hobbieid
group by hc.hobbieid

SELECT   Ic.Interestname, Ip.personid
from interestsbyperson Ip
inner join interestcatalog Ic on   Ic.interestId = Ip.interestId 

SELECT Ic.interestid, count(*)
from interestsbyperson Ip
inner join interestcatalog  Ic on  Ic.interestid = Ip.interestid
group by Ic.interestid


select count (*) 
from person p
where p.foundpartner = 1

select count (*) 
from person p
where p.foundpartner = 0


select count (*)
from person p
where p.gotmarried = 0

select count (*)
from person p
where p.gotmarried = 1

select 
