select CT.countryname,cc.cityname
   from countrycatalog CT,citycatalog CC 
   where  ct.countryid = cc.countryid
   order by CT.countryname, cc.cityname;
   
   
select ct.countryid,CT.countryname,cc.cityid,cc.cityname
   from countrycatalog CT inner join citycatalog CC 
   on ct.countryid = cc.countryid
   order by CT.countryname, cc.cityid;  
