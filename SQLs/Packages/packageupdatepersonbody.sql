CREATE OR REPLACE PACKAGE BODY updateperson AS
-------------------------------------------------------------------------------
procedure address (pPersonID number, pAddress varchar2)
as
       BEGIN        
           UPDATE Person
           SET Address = pAddress
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;
-------------------------------------------------------------------------------
procedure Birthday (pPersonID number, pBirthday date)
as
       BEGIN        
           UPDATE Person
           SET Birthday = pBirthday
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;

-------------------------------------------------------------------------------
procedure BodyTypeID (pPersonID number, pBodyTypeID number)
as
       BEGIN        
           UPDATE Person
           SET BodyTypeID = pBodyTypeID
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;

-------------------------------------------------------------------------------
procedure CityID (pPersonID number, pCityID number)
as
       BEGIN        
           UPDATE Person
           SET CityID = pCityID
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;

-------------------------------------------------------------------------------
procedure ExerciseFreqID (pPersonID number, pExerciseFreqID number)
as
       BEGIN        
           UPDATE Person
           SET ExerciseFreqID = pExerciseFreqID
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;

-------------------------------------------------------------------------------
procedure EyesColorID (pPersonID number, pEyesColorID number)
as
       BEGIN        
           UPDATE Person
           SET EyesColorID = pEyesColorID
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;

-------------------------------------------------------------------------------
procedure Firstname (pPersonID number, pFirstName varchar2)
as
       BEGIN        
           UPDATE Person
           SET firstname = pFirstName
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;

-------------------------------------------------------------------------------
procedure GenderID (pPersonID number, pGenderID number)
as
       BEGIN        
           UPDATE Person
           SET GenderID = pGenderID
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;

-------------------------------------------------------------------------------
procedure HairColorID (pPersonID number, pHairColorID number)
as
       BEGIN        
           UPDATE Person
           SET HairColorID = pHairColorID
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;

-------------------------------------------------------------------------------
procedure Height (pPersonID number, pHeight number)
as
       BEGIN        
           UPDATE Person
           SET Height = pHeight
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;

-------------------------------------------------------------------------------
procedure HighSchool (pPersonID number, pHighSchool varchar2)
as
       BEGIN        
           UPDATE Person
           SET HighSchool = pHighSchool
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;

-------------------------------------------------------------------------------
procedure InterestedInKids (pPersonID number, pInterestedInKids number)
as
       BEGIN        
           UPDATE Person
           SET InterestedInKids = pInterestedInKids
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;


-------------------------------------------------------------------------------
procedure Lastname1 (pPersonID number, pLastName1 varchar2)
as
       BEGIN
           UPDATE Person
           SET LastName1 = pLastName1
           WHERE pPersonID = userNameID;

        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;

-------------------------------------------------------------------------------
procedure Lastname2 (pPersonID number, pLastName2 varchar2)
as
       BEGIN
           UPDATE Person
           SET LastName2 = pLastName2
           WHERE pPersonID = userNameID;

        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;

-------------------------------------------------------------------------------
procedure LikesPets (pPersonID number, pLikesPets number)
as
       BEGIN        
           UPDATE Person
           SET LikesPets = pLikesPets
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;

-------------------------------------------------------------------------------
procedure NickName (pPersonID number, pNickName varchar2)
as
       BEGIN        
           UPDATE Person
           SET NickName = pNickName
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;

-------------------------------------------------------------------------------
procedure NumberOfKids (pPersonID number, pNumberOfKids number)
as
       BEGIN        
           UPDATE Person
           SET NumberOfKids = pNumberOfKids
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;

-------------------------------------------------------------------------------
procedure OrientationID (pPersonID number, pOrientationID number)
as
       BEGIN        
           UPDATE Person
           SET OrientationID = pOrientationID
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;

-------------------------------------------------------------------------------
procedure RangeID (pPersonID number, pRangeID number)
as
       BEGIN        
           UPDATE Person
           SET RangeID = pRangeID
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;

-------------------------------------------------------------------------------
procedure relationShipStatusID (pPersonID number, pRelationShipStatusID number)
as
       BEGIN        
           UPDATE Person
           SET RelationShipStatusID = pRelationShipStatusID
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;

-------------------------------------------------------------------------------
procedure ReligionID (pPersonID number, pReligionID number)
as
       BEGIN        
           UPDATE Person
           SET ReligionID = pReligionID
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;
-------------------------------------------------------------------------------
procedure Salary (pPersonID number, pSalary number)
as
       BEGIN
           UPDATE Person
           SET Salary = pSalary
           WHERE pPersonID = userNameID;

        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;

-------------------------------------------------------------------------------
procedure SkinColorID (pPersonID number, pSkinColorID number)
as
       BEGIN        
           UPDATE Person
           SET SkinColorID = pSkinColorID
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;

-------------------------------------------------------------------------------
procedure Smoker (pPersonID number, pSmoker number)
as
       BEGIN        
           UPDATE Person
           SET Smoker = pSmoker
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;

-------------------------------------------------------------------------------
procedure TagLine (pPersonID number, pTagLine varchar2)
as
       BEGIN        
           UPDATE Person
           SET TagLine = pTagLine
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;

-------------------------------------------------------------------------------
procedure University (pPersonID number, pUniversity varchar2)
as
       BEGIN        
           UPDATE Person
           SET University = pUniversity
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;



-------------------------------------------------------------------------------
procedure ZodiacSignID (pPersonID number, pZodiacSignID number)
as
       BEGIN        
           UPDATE Person
           SET ZodiacSignID = pZodiacSignID
           WHERE pPersonID = userNameID;
         
        Exception
         WHEN NO_DATA_FOUND THEN
              DBMS_OUTPUT.PUT_LINE ('Person no found:' || pPersonID);
         --WHEN OTHERS THEN
           --   DBMS_OUTPUT.PUT_LINE ('Unexpected error');
             -- RAISE;
         commit;

       END;

-------------------------------------------------------------------------------

-------------------------------------------------------------------------------

-------------------------------------------------------------------------------

-------------------------------------------------------------------------------

-------------------------------------------------------------------------------

-------------------------------------------------------------------------------

-------------------------------------------------------------------------------

END updateperson;
