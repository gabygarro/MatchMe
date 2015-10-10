 -- return tupla with matched person id´s where intersection at least one hobbie
 --one interest and one language. 
create or replace procedure Match (puserID number, pNames out sys_refcursor) as

begin 
  open pNames for
  select p.usernameid as UNID
  from person p
  
  intersect
---------------------------------------
 --hobbies
       select unique hbp.personid
       from hobbiesbyperson hbp
       where  hbp.hobbieid in (  
                                select  hbp.hobbieid 
                                from hobbiesbyperson hbp
                                where hbp.personid = puserID
                                group by  hbp.personid,hbp.hobbieid)
       and hbp.personid <> puserID 
       
 intersect
--------------------------------------
--interest
select unique ibp.personid
       from interestsbyperson ibp
       where  ibp.interestid in (  
                                select  ibp.interestid 
                                from interestsbyperson ibp
                                where ibp.personid = puserID
                                group by  ibp.personid,ibp.interestid)
       and ibp.personid <> puserID 

intersect
----------------------------------------
--language
select unique lbp.personid
       from languagesbyperson lbp
       where  lbp.languagecode in (  
                                select  lbp.languagecode 
                                from languagesbyperson lbp
                                where lbp.personid = puserID
                                group by  lbp.personid,lbp.languagecode)
       and lbp.personid <> puserID;


------------------------------------------------------------------------------
------------------------------------------------------------------------------
  
end;
  


       
    
