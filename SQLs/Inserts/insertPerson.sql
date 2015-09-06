create or replace procedure insertPerson (pPersonId number, pPersonName varchar2, pLastName1 varchar2,
                                          pLastName2 varchar2, pBirthday date, pRegisterDate date,
                                          pNickName varchar2, pZodiacSign varchar2, pGender varchar2,
                                          pCountry varchar2, pAddress varchar2, pTagline varchar2,
                                          pEducation varchar2, pHighSchool varchar2, pUniversity varchar2,
                                          pWorkPlace varchar2, pSalary number, pRelationShipStatus varchar2,
                                          pReligion varchar2, pHeight number, pSkinColor varchar2,
                                          pEyeColor varchar2, pHairColor varchar2, pBodyType varchar2,
                                          pSmoker char, pDrinker varchar2, pExerciseFrequency varchar2,
                                          pKids char, pInterestedKids char, pLikesPets char)
as
       BEGIN
         insert into person (personId, personName, lastName1,lastName2, birthday, registerDate,
                               nickName, zodiacSign, gender, country, address, tagline,
                               education, highSchool, university, workPlace, salary, relationShipStatus,
                               religion, height, skinColor, eyeColor, hairColor, bodyType,
                               smoker, drinker, exerciseFrequency, kids, interestedKids, likesPets)
         
         values(pPersonId, pPersonName, pLastName1,pLastName2, pBirthday, pRegisterDate,
                pNickName, pZodiacSign, pGender, pCountry, pAddress, pTagline,
                pEducation, pHighSchool, pUniversity, pWorkPlace, pSalary, pRelationShipStatus ,
                pReligion, pHeight, pSkinColor, pEyeColor, pHairColor, pBodyType,
                pSmoker, pDrinker, pExerciseFrequency, pKids, pInterestedKids, pLikesPets);

       --Exception
         --WHEN NO_DATA_FOUND THEN
              --DBMS_OUTPUT.PUT_LINE ('No Data found for SELECT on ' || emailId);
        -- WHEN OTHERS THEN
              --DBMS_OUTPUT.PUT_LINE ('Unexpected error');
              --RAISE;
         commit;

       END;
