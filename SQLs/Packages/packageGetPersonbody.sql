CREATE OR REPLACE PACKAGE BODY getperson AS
-------------------------------------------------------------------------------
procedure FirstName(pUserID in number, pFirstName out varchar2) as
       BEGIN
         select firstname into pFirstName
         from person where
         userNameID = pUserID;
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
       END;
-------------------------------------------------------------------------------
procedure LastName1(pUserID in number, pLastName1 out varchar2) as
       BEGIN
         select LastName1 
         into pLastName1
         from person
         where userNameID = pUserID;
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
       END;
-------------------------------------------------------------------------------
procedure LastName2(pUserID in number, pLastName2 out varchar2) as
       BEGIN
         select LastName2 
         into pLastName2
         from person
         where userNameID = pUserID;
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
       END;
-------------------------------------------------------------------------------
procedure Birthday(pUserID in number, pBirthday out date) as
       BEGIN
         select Birthday 
         into pBirthday
         from person
         where userNameID = pUserID;
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
       END;

-------------------------------------------------------------------------------
procedure NickName(pUserID in number, pNickName out varchar2) as
       BEGIN
         select NickName 
         into pNickName
         from person
         where userNameID = pUserID;
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
       END;
-------------------------------------------------------------------------------
procedure Address(pUserID in number, pAddress out varchar2) as
       BEGIN
         select Address 
         into pAddress
         from person
         where userNameID = pUserID;
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
       END;
-------------------------------------------------------------------------------
procedure TagLine(pUserID in number, pTagLine out varchar2) as
       BEGIN
         select TagLine 
         into pTagLine
         from person
         where userNameID = pUserID;
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
       END;
-------------------------------------------------------------------------------
procedure HighSchool(pUserID in number, pHighSchool out varchar2) as
       BEGIN
         select HighSchool 
         into pHighSchool
         from person
         where userNameID = pUserID;
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
       END;
-------------------------------------------------------------------------------
procedure University(pUserID in number, pUniversity out varchar2) as
       BEGIN
         select University 
         into pUniversity
         from person
         where userNameID = pUserID;
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
       END;
-------------------------------------------------------------------------------
procedure WorkPlace(pUserID in number, pWorkPlace out varchar2) as
       BEGIN
         select WorkPlace 
         into pWorkPlace
         from person
         where userNameID = pUserID;
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
       END;
-------------------------------------------------------------------------------
procedure Salary(pUserID in number, pSalary out Number) as
       BEGIN
         select Salary 
         into pSalary
         from person
         where userNameID = pUserID;
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
       END;
-------------------------------------------------------------------------------
procedure Height(pUserID in number, pHeight out Number) as
       BEGIN
         select Height 
         into pHeight
         from person
         where userNameID = pUserID;
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
       END;
-------------------------------------------------------------------------------
procedure Smoker(pUserID in number, pSmoker out Number) as
       BEGIN
         select Smoker 
         into pSmoker
         from person
         where userNameID = pUserID;
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
       END;
-------------------------------------------------------------------------------
procedure NumberOfKids(pUserID in number, pNumberOfKids out Number) as
       BEGIN
         select NumberOfKids 
         into pNumberOfKids
         from person
         where userNameID = pUserID;
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
       END;
-------------------------------------------------------------------------------
procedure InterestedInKids(pUserID in number, pInterestedInKids out Number) as
       BEGIN
         select InterestedInKids 
         into pInterestedInKids
         from person
         where userNameID = pUserID;
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
       END;
-------------------------------------------------------------------------------
procedure LikesPets(pUserID in number, pLikesPets out Number) as
       BEGIN
         select LikesPets 
         into pLikesPets
         from person
         where userNameID = pUserID;
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
       END;
-------------------------------------------------------------------------------
procedure EyeColor(pUserID in number, pEyeColor out Varchar2) as
       BEGIN
         select EyeColor 
         into pEyeColor
         from EyeColorCatalog ECC
         where ECC.eyecolorid = (select eyescolorid
                                 from person P
                                 Where p.userNameID =pUserID);
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
       END;
-------------------------------------------------------------------------------
procedure Gender(pUserID in number, pGender out Varchar2) as
       BEGIN
         select Gender 
         into pGender
         from GenderCatalog GC
         where GC.genderid = (select genderId
                                 from person P
                                 Where p.userNameID = pUserID);
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
       END;
-------------------------------------------------------------------------------
procedure Orientation(pUserID in number, pOrientation out Varchar2) as
       BEGIN
         select OrientationName 
         into pOrientation
         from Sexualorientationcatalog SOC
         where SOC.OrientationId = (select OrientationId
                                 from person P
                                 Where p.userNameID = pUserID);
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
       END;
-------------------------------------------------------------------------------
procedure Age_Range(pUserID in number, pAgeRange out Varchar2) as
       BEGIN
         select AgeRange 
         into pAgeRange
         from AgeRangeCatalog ARC
         where ARC.RangeId = (select RangeId
                                 from person P
                                 Where p.userNameID = pUserID);
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
       END;
-------------------------------------------------------------------------------
procedure SkinColor(pUserID in number, pSkinColor out Varchar2) as
       BEGIN
         select SkinColor 
         into pSkinColor
         from SkinColorCatalog ECC
         where ECC.SkinColorId = (select SkinColorId
                                 from person P
                                 Where p.userNameID = pUserID);
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
       END;
-------------------------------------------------------------------------------
procedure HairColor(pUserID in number, pHairColor out Varchar2) as
       BEGIN
         select HairColor 
         into pHairColor
         from Haircolorcatalog HCC
         where HCC.HairColorId = (select HairColorId
                                  from person P
                                  Where p.userNameID = pUserID);
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
       END;
-------------------------------------------------------------------------------
procedure Religion(pUserID in number, pReligion out Varchar2) as
       BEGIN
         select ReligionName 
         into pReligion
         from Religioncatalog RC
         where RC.ReligionId = (select ReligionId
                                  from person P
                                  Where p.userNameID = pUserID);
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
       END;
-------------------------------------------------------------------------------
procedure ZodiacSign(pUserID in number, pZodiacSign out Varchar2) as
       BEGIN
         select ZODIACSIGNNAME 
         into pZodiacSign
         from Zodiacsigncatalog ZSC
         where ZSC.ZODIACSIGNID = (select ZODIACSIGNID
                                  from person P
                                  Where p.userNameID = pUserID);
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
       END;
-------------------------------------------------------------------------------
procedure RelationShipStatus(pUserID in number, pRelationShipStatus out Varchar2) as
       BEGIN
         select RelationShipNAME 
         into pRelationShipStatus
         from RelationShipStatusCatalog RSS
         where RSS.RelationShipStatusId = (select RelationShipStatusId
                                  from person P
                                  Where p.userNameID = pUserID);
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
       END;
-------------------------------------------------------------------------------
procedure BodyType(pUserID in number, pBodyType out Varchar2) as
       BEGIN
         select BodyTypeName 
         into pBodyType
         from BodyTypecatalog BT
         where BT.BodyTypeId = (select BodyTypeId
                                  from person P
                                  Where p.userNameID = pUserID);
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
       END;
-------------------------------------------------------------------------------
procedure ExerciseFreq(pUserID in number, pExerciseFreq out Varchar2) as
       BEGIN
         select ExerciseFreqName 
         into pExerciseFreq
         from ExerciseFrequencycatalog EFC
         where EFC.ExerciseFreqId = (select ExerciseFreqId
                                  from person P
                                  Where p.userNameID = pUserID);
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
       END;
-------------------------------------------------------------------------------
procedure City_Country(pUserID in number, pCity out Varchar2, pCountry out Varchar2) as
       BEGIN
         select CityName 
         into pCity
         from Citycatalog CC
         where CC.CityId = (select CityId
                                  from person P
                                  Where p.userNameID = pUserID);
               
         -------
         
         select CountryName 
         into pCountry
         from Countrycatalog CC
         where CC.CountryId = (select CountryId
                                  from CityCatalog CityC, Person p
                                  Where CityC.Cityid = p.Cityid  and p.userNameID = pUserID);
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
     
              
       END;
-------------------------------------------------------------------------------
procedure FoundPartner(pUserID in number, pFoundPartner out Number) as
       BEGIN
         select FoundPartner 
         into pFoundPartner
         from person
         where userNameID = pUserID;
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
       END;
-------------------------------------------------------------------------------
procedure Got_Married(pUserID in number, pGotMarried out Number) as
       BEGIN
         select GotMarried 
         into pGotMarried
         from person
         where userNameID = pUserID;
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
       END;

-------------------------------------------------------------------------------
procedure Person_Drinker(pUserID in number, pDrinker out Number) as
       BEGIN
         select Drinker 
         into pDrinker
         from person
         where userNameID = pUserID;
         Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pUserID);
       END;

-------------------------------------------------------------------------------
procedure interests (pUserNameID in number, pInterestName out sys_refcursor) as
begin
  open pInterestName for
  select interestName as interest
         from interestcatalog, InterestsByPerson
         where InterestCatalog.InterestID = InterestsByPerson.interestID
               and personID = pUserNameID
         order by interestName;
end interests;

-------------------------------------------------------------------------------
procedure Email (pEmail in varchar2, pUserNameIDs  out sys_refcursor) as
begin
  open pUserNameIDs for
  select userNameID
  from username
  where pEmail = userEmail or userEmail like '%' || userEmail || '%'
  order by userNameID;

end email;

-------------------------------------------------------------------------------
procedure userName (pName in varchar2, pUserIDs  out sys_refcursor) as
begin
  open pUserIDs for
  select userNameID, firstName
  from person
  where pName = firstName or firstName like '%' || pName || '%'
  order by userNameID;

end userName;
-------------------------------------------------------------------------------
procedure hobbies (pUserNameID in number, pHobbieName out sys_refcursor) as
begin
  open pHobbieName for
  select hobbieName as hobbie
         from hobbiecatalog HC, hobbiesByPerson HP
         where HC.hobbieID = HP.hobbieID
               and personID = pUserNameID
         order by hobbieName;
end hobbies;
-------------------------------------------------------------------------------
procedure lastName2 (pLastName2 in varchar2, pUserIDs  out sys_refcursor) as
begin
  open pUserIDs for
  select userNameID, lastName2
  from person
  where pLastName2 = lastName2 or lastName1 like '%' || pLastName2 || '%'
  order by userNameID;

end lastName2;
-------------------------------------------------------------------------------
procedure lastName1 (pLastName1 in varchar2, pUserIDs  out sys_refcursor) as
begin
  open pUserIDs for
  select userNameID, lastName1
  from person
  where pLastName1 = lastName1 or lastName1 like '%' || pLastName1 || '%'
  order by userNameID;

end lastName1;
-------------------------------------------------------------------------------
procedure nickName (pNickName in varchar2, pNickNameIDs  out sys_refcursor) as
begin
  open pNickNameIDs for
  select userNameID
  from person
  where pNickName = nickName or nickName like '%' || nickName || '%'
  order by userNameID;

end nickName;
-------------------------------------------------------------------------------
-------------------------------------------------------------------------------
END getperson;