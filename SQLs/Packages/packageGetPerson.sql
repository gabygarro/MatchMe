create or replace package getperson is
       procedure FirstName(pUserID in number, pFirstName out varchar2);
       procedure LastName1(pUserID in number, pLastName1 out varchar2);
       procedure LastName2(pUserID in number, pLastName2 out varchar2);
       procedure Birthday(pUserID in number, pBirthday out date);
       procedure NickName(pUserID in number, pNickName out varchar2);
       procedure Address(pUserID in number, pAddress out varchar2);
       procedure TagLine(pUserID in number, pTagLine out varchar2);
       procedure HighSchool(pUserID in number, pHighSchool out varchar2);
       procedure University(pUserID in number, pUniversity out varchar2);
       procedure WorkPlace(pUserID in number, pWorkPlace out varchar2);
       procedure Salary(pUserID in number, pSalary out Number);
       procedure Height(pUserID in number, pHeight out Number);
       procedure Smoker(pUserID in number, pSmoker out Number);
       procedure NumberOfKids(pUserID in number, pNumberOfKids out Number);
       procedure InterestedInKids(pUserID in number, pInterestedInKids out Number);
       procedure LikesPets(pUserID in number, pLikesPets out Number);
       procedure EyeColor(pUserID in number, pEyeColor out Varchar2, pEyeColorID out number);
       procedure Gender(pUserID in number, pGender out Varchar2, pGenderID out number);
       procedure Orientation(pUserID in number, pOrientation out Varchar2, pOrientationID out number);
       procedure Age_Range(pUserID in number, pAgeRange out Varchar2, pAgeRangeID out number);
       procedure SkinColor(pUserID in number, pSkinColor out Varchar2, pSkinColorID out number);
       procedure HairColor(pUserID in number, pHairColor out Varchar2, pHairColorID out number);
       procedure Religion(pUserID in number, pReligion out Varchar2, pReligionID out number);
       procedure ZodiacSign(pUserID in number, pZodiacSign out Varchar2, pZodiacSignID out number);
       procedure RelationShipStatus(pUserID in number, pRelationShipStatus out Varchar2, pRelationShipStatusID out number);
       procedure BodyType(pUserID in number, pBodyType out Varchar2, pBodyTypeID out number);
       procedure ExerciseFreq(pUserID in number, pExerciseFreq out Varchar2, pExerciseFreqID out number);
       procedure City_Country(pUserID in number, pCity out Varchar2,pCountry out Varchar2);
       procedure FoundPartner(pUserID in number, pFoundPartner out Number);
       procedure Got_Married(pUserID in number, pGotMarried out Number);
       procedure Drinker(pUserID in number, pDrinker out Number);
       procedure interests (pUserNameID in number, pInterestName out sys_refcursor);
       
       procedure Email (pEmail in varchar2, pUserNameIDs  out sys_refcursor);
       procedure findName (pName in varchar2, pUserIDs  out sys_refcursor);
       procedure hobbies (pUserNameID in number, pHobbieName out sys_refcursor);
       procedure findLastName2 (pLastName2 in varchar2, pUserIDs  out sys_refcursor);
       procedure findLastName1 (pLastName1 in varchar2, pUserIDs  out sys_refcursor);
       procedure findNickName (pNickName in varchar2, pNickNameIDs  out sys_refcursor);
       procedure Languages (pUserNameID in number, pLanguages out sys_refcursor);
       
       procedure checkHobbie(pUserID IN number, phobbieID in number, phobbieCheck out number);
       procedure checkInterest(pUserID IN number, pinterestID in number, pInterestCheck out number);
       procedure checkLanguage(pUserID IN number, pLanguageCode in varchar2, pLanguageCheck out number);
       
      
 END getperson;
