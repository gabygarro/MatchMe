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
       procedure EyeColor(pUserID in number, pEyeColor out Varchar2);
       procedure Gender(pUserID in number, pGender out Varchar2);
       procedure Orientation(pUserID in number, pOrientation out Varchar2);
       procedure Age_Range(pUserID in number, pAgeRange out Varchar2);
       procedure SkinColor(pUserID in number, pSkinColor out Varchar2);
       procedure HairColor(pUserID in number, pHairColor out Varchar2);
       procedure Religion(pUserID in number, pReligion out Varchar2);
       procedure ZodiacSign(pUserID in number, pZodiacSign out Varchar2);
       procedure RelationShipStatus(pUserID in number, pRelationShipStatus out Varchar2);
       procedure BodyType(pUserID in number, pBodyType out Varchar2);
       procedure ExerciseFreq(pUserID in number, pExerciseFreq out Varchar2);
       procedure City_Country(pUserID in number, pCity out Varchar2,pCountry out Varchar2);
       procedure FoundPartner(pUserID in number, pFoundPartner out Number);
       procedure Got_Married(pUserID in number, pGotMarried out Number);
       procedure Person_Drinker(pUserID in number, pDrinker out Number);
       procedure interests (pUserNameID in number, pInterestName out sys_refcursor);
       
       procedure Email (pEmail in varchar2, pUserNameIDs  out sys_refcursor);
       procedure userName (pName in varchar2, pUserIDs  out sys_refcursor);
       procedure hobbies (pUserNameID in number, pHobbieName out sys_refcursor);
       procedure lastName2 (pLastName2 in varchar2, pUserIDs  out sys_refcursor);
       procedure lastName1 (pLastName1 in varchar2, pUserIDs  out sys_refcursor);
       procedure nickName (pNickName in varchar2, pNickNameIDs  out sys_refcursor);
       
       
      
 END getperson;