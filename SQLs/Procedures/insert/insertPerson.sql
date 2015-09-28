create or replace procedure insertPerson (pPersonID number, pFirstName varchar2, pLastName1 varchar2,
                                          pLastName2 varchar2, pBirthday date, pRegisterDate date,
                                          pNickName varchar2,pAddress varchar2,pTagline varchar2,
                                          pHighSchool varchar2,pUniversity varchar2,pWorkPlace varchar2,  
                                          pSalary number,pHeight number,pSmoker number, pNumberOfKids number, 
                                          pInterestedInKids number, pLikesPets number,pEyesColorID number,
                                          pGenderID number, pUserNameID number, pOrientationID number,
                                          pRangeID number, pSkinColorID number, pHairColorID number,
                                          pReligionID number, pZodiacSignID number, pRelationShipStatusID number,
                                          pBodyTypeID number, pExerciseFreqID number, pCityID number)
                                          
                                       
as
       BEGIN
         insert into person (personID, firstName, lastName1,
                             lastName2, birthday, registerDate,
                             nickName, address, tagline,
                             highSchool, university, workPlace,  
                             salary, height, smoker, numberOfKids, 
                             interestedInKids, likesPets, eyesColorID,
                             genderID, userNameID, orientationID,
                             rangeID, skinColorID, hairColorID,
                             religionID, zodiacSignID, relationShipStatusID,
                             bodyTypeID, exerciseFreqID, cityID)

         values(pPersonID, pFirstName, pLastName1,
                pLastName2, pBirthday, pRegisterDate,
                pNickName,pAddress,pTagline,
                pHighSchool,pUniversity,pWorkPlace,  
                pSalary,pHeight,pSmoker, pNumberOfKids, 
                pInterestedInKids, pLikesPets,pEyesColorID,
                pGenderID, pUserNameID, pOrientationID,
                pRangeID, pSkinColorID, pHairColorID,
                pReligionID, pZodiacSignID, pRelationShipStatusID,
                pBodyTypeID, pExerciseFreqID, pCityID);

       Exception
         WHEN INVALID_NUMBER THEN
              DBMS_OUTPUT.PUT_LINE ('Person ID error ');
         WHEN OTHERS THEN
              DBMS_OUTPUT.PUT_LINE ('Unexpected error');
              RAISE;
         commit;

       END;
