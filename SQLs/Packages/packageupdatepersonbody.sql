CREATE OR REPLACE PACKAGE BODY updateperson AS
-------------------------------------------------------------------------------
procedure address (pPersonID number, pAddress varchar2)
  --update the column address on the table person using the parameter pAddress
as
       BEGIN        
           UPDATE Person
           SET Address = pAddress
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         commit;

       END;
-------------------------------------------------------------------------------
procedure Birthday (pPersonID number, pBirthday varchar2)
  --update the column Birthday on the table person using the parameter pBirthday
as
       BEGIN        
           UPDATE Person
           SET Birthday = to_date(pBirthday,'DD/MM/YYYY')
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         commit;

       END;

-------------------------------------------------------------------------------
procedure BodyTypeID (pPersonID number, pBodyTypeID number)
  --update the column BodyTypeID on the table person using the parameter pBodyTypeID
as
       BEGIN        
           UPDATE Person
           SET BodyTypeID = pBodyTypeID
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         commit;

       END;

-------------------------------------------------------------------------------
procedure CityID (pPersonID number, pCityID number)
  --update the column CityID on the table person using the parameter pCityID
as
       BEGIN        
           UPDATE Person
           SET CityID = pCityID
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         commit;

       END;

-------------------------------------------------------------------------------
procedure ExerciseFreqID (pPersonID number, pExerciseFreqID number)
  --update the column ExerciseFreqID on the table person using the parameter pExerciseFreqID
as
       BEGIN        
           UPDATE Person
           SET ExerciseFreqID = pExerciseFreqID
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         commit;

       END;

-------------------------------------------------------------------------------
procedure EyeColorID (pPersonID number, pEyeColorID number)
  --update the column EyeColorID on the table person using the parameter pEyeColorID
as
       BEGIN        
           UPDATE Person
           SET EyeColorID = pEyeColorID
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         commit;

       END;

-------------------------------------------------------------------------------
procedure Firstname (pPersonID number, pFirstName varchar2)
  --update the column Firstname on the table person using the parameter pFirstName
as
       BEGIN        
           UPDATE Person
           SET firstname = pFirstName
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         commit;

       END;

-------------------------------------------------------------------------------
procedure GenderID (pPersonID number, pGenderID number)
  --update the column GenderID on the table person using the parameter pGenderID
as
       BEGIN        
           UPDATE Person
           SET GenderID = pGenderID
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         commit;

       END;

-------------------------------------------------------------------------------
procedure HairColorID (pPersonID number, pHairColorID number)
  --update the column HairColorID on the table person using the parameter pHairColorID
as
       BEGIN        
           UPDATE Person
           SET HairColorID = pHairColorID
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         commit;

       END;

-------------------------------------------------------------------------------
procedure Height (pPersonID number, pHeight number)
  --update the column Height on the table person using the parameter pHeight
as
       BEGIN        
           UPDATE Person
           SET Height = cast(pHeight as number(3,2))
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         commit;

       END;
-------------------------------------------------------------------------------
procedure HighSchool (pPersonID number, pHighSchool varchar2)
  --update the column HighSchool on the table person using the parameter pHighSchool
as
       BEGIN        
           UPDATE Person
           SET HighSchool = pHighSchool
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
        commit;

       END;

-------------------------------------------------------------------------------
procedure InterestedInKids (pPersonID number, pInterestedInKids number)
  --update the column InterestedInKids on the table person using the parameter pInterestedInKids
as
       BEGIN        
           UPDATE Person
           SET InterestedInKids = pInterestedInKids
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         commit;

       END;


-------------------------------------------------------------------------------
procedure Lastname1 (pPersonID number, pLastName1 varchar2)
  --update the column Lastname1 on the table person using the parameter pLastName1
as
       BEGIN
           UPDATE Person
           SET LastName1 = pLastName1
           WHERE pPersonID = userNameID;

        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         commit;

       END;

-------------------------------------------------------------------------------
procedure Lastname2 (pPersonID number, pLastName2 varchar2)
  --update the column Lastname2 on the table person using the parameter pLastName2
as
       BEGIN
           UPDATE Person
           SET LastName2 = pLastName2
           WHERE pPersonID = userNameID;

        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         commit;

       END;

-------------------------------------------------------------------------------
procedure LikesPets (pPersonID number, pLikesPets number)
  --update the column LikesPets on the table person using the parameter pLikesPets
as
       BEGIN        
           UPDATE Person
           SET LikesPets = pLikesPets
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         commit;

       END;

-------------------------------------------------------------------------------
procedure NickName (pPersonID number, pNickName varchar2)
  --update the column NickName on the table person using the parameter pNickName
as
       BEGIN        
           UPDATE Person
           SET NickName = pNickName
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         commit;

       END;

-------------------------------------------------------------------------------
procedure NumberOfKids (pPersonID number, pNumberOfKids number)
  --update the column NumberOfKids on the table person using the parameter pNumberOfKids
as
       BEGIN        
           UPDATE Person
           SET NumberOfKids = pNumberOfKids
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
        commit;

       END;

-------------------------------------------------------------------------------
procedure OrientationID (pPersonID number, pOrientationID number)
  --update the column OrientationID on the table person using the parameter pOrientationID
as
       BEGIN        
           UPDATE Person
           SET OrientationID = pOrientationID
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         commit;

       END;

-------------------------------------------------------------------------------
procedure RangeID (pPersonID number, pRangeID number)
  --update the column RangeID on the table person using the parameter pRangeID
as
       BEGIN        
           UPDATE Person
           SET RangeID = pRangeID
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         commit;

       END;
-------------------------------------------------------------------------------
procedure relationShipStatusID (pPersonID number, pRelationShipStatusID number)
  --update the column relationShipStatusID on the table person using the parameter pRelationShipStatusID
as
       BEGIN        
           UPDATE Person
           SET RelationShipStatusID = pRelationShipStatusID
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
        commit;

       END;
-------------------------------------------------------------------------------
procedure ReligionID (pPersonID number, pReligionID number)
  --update the column ReligionID on the table person using the parameter pReligionID
as
       BEGIN        
           UPDATE Person
           SET ReligionID = pReligionID
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         commit;

       END;
-------------------------------------------------------------------------------
procedure Salary (pPersonID number, pSalary number)
    --update the column Salary on the table person using the parameter pSalary 
as
       BEGIN
           UPDATE Person
           SET Salary = pSalary
           WHERE pPersonID = userNameID;

        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         commit;

       END;

-------------------------------------------------------------------------------
procedure SkinColorID (pPersonID number, pSkinColorID number)
    --update the column SkinColorID on the table person using the parameter SkinColorID 
as
       BEGIN        
           UPDATE Person
           SET SkinColorID = pSkinColorID
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         commit;

       END;

-------------------------------------------------------------------------------
procedure Smoker (pPersonID number, pSmoker number)
    --update the column Smoker on the table person using the parameter pSmoker 
as
       BEGIN        
           UPDATE Person
           SET Smoker = pSmoker
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         commit;

       END;
-------------------------------------------------------------------------------
procedure TagLine (pPersonID number, pTagLine varchar2)
    --update the column TagLine on the table person using the parameter pTagLine 
as
       BEGIN        
           UPDATE Person
           SET TagLine = pTagLine
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         commit;

       END;
-------------------------------------------------------------------------------
procedure University (pPersonID number, pUniversity varchar2)
    --update the column University on the table person using the parameter pUniversity 
as
       BEGIN        
           UPDATE Person
           SET University = pUniversity
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         commit;

       END;



-------------------------------------------------------------------------------
procedure ZodiacSignID (pPersonID number, pZodiacSignID number)
    --update the column ZodiacSignID on the table person using the parameter pZodiacSignID 
as
       BEGIN        
           UPDATE Person
           SET ZodiacSignID = pZodiacSignID
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         commit;

       END;

-------------------------------------------------------------------------------
procedure WorkPlace (pPersonID number, pWorkPlace varchar2)
  --update the column workplace on the table person using the parameter pWorkPlace
as
       BEGIN
           UPDATE Person p
           SET p.workplace = pWorkPlace
           WHERE pPersonID = p.usernameid;

        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         commit;

       END;
-------------------------------------------------------------------------------
procedure Drinker (pPersonID number, pDrinker number)
    --update the column Drinker on the table person using the parameter pDrinker 
as
       BEGIN
           UPDATE Person p
           SET p.drinker = pDrinker
           WHERE pPersonID = p.usernameid;

        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         commit;

       END;
-------------------------------------------------------------------------------
procedure foundPartner (pPersonID number, pfoundPartner number)
    --update the column Partner on the table person using the parameter pfoundPartner 
as
       BEGIN
           UPDATE Person p
           SET p.foundpartner = pfoundPartner
           WHERE pPersonID = p.usernameid;

        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         commit;

       END;
-------------------------------------------------------------------------------
procedure gotMarried (pPersonID number, pgotMarried number)
    --update the column gotMarrried on the table person using the parameter pgotMarrried 
as
       BEGIN
           UPDATE Person p
           SET p.gotmarried = pgotMarried
           WHERE pPersonID = p.usernameid;

        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         commit;

       END;
-------------------------------------------------------------------------------



END updateperson;
