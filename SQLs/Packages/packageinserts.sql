create or replace package inserts is
    procedure AgeRangeCat (pRangeID number, pAgeRange varchar2);
    procedure BodyTypeCat (pBodyTypeID number, pBodyTypeName varchar2);     
    procedure CityCat(pCityName varchar2, pCountryID varchar2);
    procedure Country (pCountryID varchar2, pCountryName varchar2);
    procedure EmailsByPerson ( pEmail varchar2, pPersonID number);
    procedure Event ( pEventName varchar2, pEventDate date, pCityID number);
    procedure eventsbyperson (pEventID number, pPersonID number);
    procedure ExerciseFrequencyCat (pexercisefreqName varchar2);
    procedure EyeColorCat (pEyeColor varchar2);
    procedure GenderCat ( pGender varchar2);
    procedure HairColorCat (pHairColor varchar2);
    procedure HobbieCat (pHobbieName varchar2);
    procedure HobbiesByPerson (pHobbieID number,pPersonID number);
    procedure InterestCat (pInterestName varchar2);
    procedure Interestsbyperson (pInterestID number, pPersonID number);
    procedure LanguageCat (pLanguageCode varchar2, pLanguageName varchar2);
    procedure LanguagesByPerson (pLanguageCode varchar2, pPersonID number);
    procedure MatchedPersons (pMatchedPerson number, pMatcher number);
    procedure Parameter (pParameterID number, pParameterName varchar2, pParameterValue number, pParameterDescription varchar2);
    procedure RelationShipStatusCat (pRelationShipStatusName varchar2);
    procedure ReligionCat (pReligionName varchar2);
    procedure SexualOrientationCat (pOrientationName varchar2);
    procedure SkinColorCat (pSkinColor varchar2);
    procedure Visitlog (logDate date, pVisitor number, pVisitedPerson number);
    procedure Winkperson (pwinker number, pWinkedPerson number);
    procedure ZodiacSignCat (pZodiacSignName varchar2);
    procedure userTypeCat (pUserTypeName Varchar2, puserTypeID number);
    procedure Person (puserNameID number, pFirstName varchar2, pLastName1 varchar2,
                  pLastName2 varchar2, pBirthday varchar2,
                  pNickName varchar2,pAddress varchar2,pTagline varchar2,
                  pHighSchool varchar2,pUniversity varchar2,pWorkPlace varchar2,  
                  pSalary number,pHeight number,pSmoker number, pNumberOfKids number, 
                  pInterestedInKids number, pLikesPets number,pEyeColorID number,
                  pGenderID number, pOrientationID number, pRangeID number, 
                  pSkinColorID number, pHairColorID number, pReligionID number,
                  pZodiacSignID number, pRelationShipStatusID number, pBodyTypeID number,
                  pExerciseFreqID number, pCityID number,pfoundpartner number,pgotmarried number,
                  pdrinker number);       
    
    
    
    
    
    
    
    
    
 END inserts;
