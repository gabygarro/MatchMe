Comment on table agerangecatalog
is 'This is a table for catalog for age range.';
Comment on column agerangecatalog.rangeid
is 'Identify age range and primary key';
Comment on column agerangecatalog.ageRange
is 'Age range';

---------------------------------------------------------

Comment on table bodytypecatalog
is 'This is a table for catalog for body type.';
Comment on column bodytypecatalog.bodytypeid
is 'Identify body type and primary key';
Comment on column bodytypecatalog.bodytypename
is 'Body type name';

---------------------------------------------------------

Comment on table citycatalog
is 'This is a table for catalog for city.';
Comment on column citycatalog.cityid
is 'Identify city and primary key ';
Comment on column citycatalog.cityname
is 'City name';
Comment on column citycatalog.countryid
is 'Identify country and foreign key';

---------------------------------------------------------

Comment on table countrycatalog
is 'This is a table for catalog country.';
Comment on column countrycatalog.countryid
is 'Identify country and primary key ';
Comment on column countrycatalog.countryname
is 'Country name';

---------------------------------------------------------

Comment on table emailsbyperson 
is 'This is a table for emails by person.';
Comment on column emailsbyperson.emailid
is 'Identify email and foreign key ';
Comment on column emailsbyperson.email
is 'Email';
Comment on column emailsbyperson.personid
is 'Identify person and foreign key';

---------------------------------------------------------

Comment on table event
is 'This is a table for event.';
Comment on column event.eventid
is 'Identify event and primary key ';
Comment on column event.eventname
is 'Event name';
Comment on column event.eventdate
is 'Event date';
Comment on column event.cityid
is 'Identify city and foreign key';
---------------------------------------------------------

Comment on table eventsbyperson
is 'This is a table for events by person.';
Comment on column eventsbyperson.eventid 
is 'Identify event and foreign key ';
Comment on column eventsbyperson.personid
is 'Identify person and foreign key';

---------------------------------------------------------

Comment on table exercisefrequencycatalog
is 'This is a table for exercise frequency catalog.';
Comment on column exercisefrequencycatalog.exercisefreqid
is 'Identify exercise frequency and primary key ';
Comment on column exercisefrequencycatalog.exercisefreqname
is 'Exercise frequency';

---------------------------------------------------------

Comment on table eyecolorcatalog
is 'This is a table for eye color catalog.';
Comment on column eyecolorcatalog.eyecolorid
is 'Identify eye color and primary key ';
Comment on column eyecolorcatalog.eyecolor
is 'Eye color';

---------------------------------------------------------

Comment on table gendercatalog 
is 'This is a table for gender catalog.';
Comment on column gendercatalog.genderid
is 'Identify gender and primary key';
Comment on column gendercatalog.gender 
is 'Gender';

---------------------------------------------------------

Comment on table haircolorcatalog
is 'This is a table for hair color catalog.';
Comment on column haircolorcatalog.haircolorid
is 'Identify hair color and primary key ';
Comment on column haircolorcatalog.haircolor
is 'Hair color';

---------------------------------------------------------

Comment on table Hobbiecatalog
is 'This is a table for hobbie.';
Comment on column Hobbiecatalog.Hobbieid
is 'Identify hobbie and primary key ';
Comment on column Hobbiecatalog.Hobbiename
is 'Hobbie';

---------------------------------------------------------

Comment on table hobbiesbyperson
is 'This is a table for hobbies by person.';
Comment on column hobbiesbyperson.hobbieid
is 'Identify hobbie by person and foreign key';
Comment on column hobbiesbyperson.personid
is 'Identify person and foreign key';

---------------------------------------------------------

Comment on table interestcatalog 
is 'This is a table for interest catalog.';
Comment on column interestcatalog.interestid
is 'Identify interest and primary key ';
Comment on column interestcatalog.interestname
is 'Interest name';

---------------------------------------------------------

Comment on table interestsbyperson
is 'This is a table for interests by person.';
Comment on column interestsbyperson.interestid
is 'Identify interest by person and foreign key';
Comment on column interestsbyperson.personid
is 'Identify person and foreign key';

---------------------------------------------------------

Comment on table languagecatalog
is 'This is a table for language.';
Comment on column languagecatalog.languagecode
is 'Identify language and primary key ';
Comment on column languagecatalog.languagename 
is 'Language name';

---------------------------------------------------------

Comment on table languagesbyperson
is 'This is a table for languages by person.';
Comment on column languagesbyperson.languagecode
is 'Identify language by person and foreign key ';
Comment on column languagesbyperson.personid
is 'Identify person and foreign key';

---------------------------------------------------------

Comment on table matchedpersons
is 'This is a table for matched person.';
Comment on column matchedpersons.matchedperson 
is 'Identify matched person and foreign key';
Comment on column matchedpersons.matcher
is 'Identify matcher and foreign key';

---------------------------------------------------------

Comment on table parameter
is 'This is a table for parameter.';
Comment on column parameter.parameterid
is 'Identify parameter and primary key ';
Comment on column parameter.parametername 
is 'Parameter name';
Comment on column parameter.parametervalue
is 'Parameter value ';
Comment on column parameter.parameterdescription 
is 'Parameter description';

---------------------------------------------------------

Comment on table relationshipstatuscatalog
is 'This is a table for relationship catalog.';
Comment on column relationshipstatuscatalog.relationshipstatusid
is 'Identify relationship status and primary key';
Comment on column relationshipstatuscatalog.relationshipname
is 'Relationship name';

---------------------------------------------------------

Comment on table religioncatalog 
is 'This is a table for religion catalog.';
Comment on column religioncatalog.religionid
is 'Identify religion and primary key ';
Comment on column religioncatalog.religionname
is 'Religion name';

---------------------------------------------------------

Comment on table sexualorientationcatalog
is 'This is a table for sexual orientation catalog.';
Comment on column sexualorientationcatalog.orientationid
is 'Identify sexual orientation and primary key';
Comment on column sexualorientationcatalog.orientationname
is 'Sexual orientation name';

---------------------------------------------------------

Comment on table skincolorcatalog
is 'This is a table for skin color catalog.';
Comment on column skincolorcatalog.skincolorid 
is 'Identify skin color and primary key ';
Comment on column skincolorcatalog.skincolor
is 'Skin color name';

---------------------------------------------------------

Comment on table username
is 'This is a table for user name.';
Comment on column username.usernameid
is 'Identify user name and primary key ';
Comment on column username.useremail
is 'User email';
Comment on column username.usernamepassword
is 'User email password ';
Comment on column username.usertypeid
is 'Identify user type and foreign key';
---------------------------------------------------------

Comment on table usertypecatalog
is 'This is a table for user type catalog.';
Comment on column usertypecatalog.usertypeid
is 'Identify user type and primary key';
Comment on column usertypecatalog.usertypename
is 'User type name';

---------------------------------------------------------

Comment on table visitlog
is 'This is a table for visities.';
Comment on column visitlog.lognumber
is 'Identify visit and primary key ';
Comment on column visitlog.logdate
is 'Visit date';
Comment on column visitlog.visitor
is 'Visitor and foreign key';
Comment on column visitlog.visitedperson
is 'Visited and foreign key';

---------------------------------------------------------

Comment on table winkperson
is 'This is a table for wink.';
Comment on column winkperson.winkid
is 'Identify wink and primary key ';
Comment on column winkperson.winker
is 'Winker and foreign key';
Comment on column winkperson.winkedperson
is 'Winked peson and foreign key';


---------------------------------------------------------

Comment on table zodiacsigncatalog 
is 'This is a table for zodiac sign catalog.';
Comment on column zodiacsigncatalog.zodiacsignid
is 'Identify zodiac sign and primary key ';
Comment on column zodiacsigncatalog.zodiacsignname
is 'Zodiac sign name';

---------------------------------------------------------

Comment on table person
is 'This is a table for person.';
Comment on column person.usernameid
is 'Identify person and primary key ';
Comment on column person.firstname
is 'First name';
Comment on column person.lastname1
is 'First last name';
Comment on column person.lastname2
is 'Second last name';
Comment on column person.birthday
is 'Birthday';
Comment on column person.registerdate
is 'Register date';
Comment on column person.nickname
is 'Nickname';
Comment on column person.address
is 'Adress';
Comment on column person.tagline
is 'Tagline';
Comment on column person.highschool
is 'Highschool name';
Comment on column person.university
is 'University name';
Comment on column person.workplace
is 'Workplace name';
Comment on column person.salary
is 'Salary';
Comment on column person.height
is 'Height';
Comment on column person.smoker
is 'Smoker';
Comment on column person.numberofkids
is 'Number of kids';
Comment on column person.interestedinkids
is 'Interested in kids';
Comment on column person.likespets
is 'Likes pets';
Comment on column person.eyecolorid
is 'Eye color and foreign key';
Comment on column person.genderid
is 'Gender and foreign key';
Comment on column person.orientationid
is 'Sexual orientation and foreign kay';
Comment on column person.rangeid
is 'Age range and foreign key';
Comment on column person.skincolorid
is 'Skin color and foreign key';
Comment on column person.haircolorid
is 'Hair color and foreign key';
Comment on column person.religionid
is 'Religion and foreign key';
Comment on column person.zodiacsignid
is 'Zodiac sign and foreign key';
Comment on column person.relationshipstatusid
is 'Relationship status and foreign key';
Comment on column person.bodytypeid
is 'Body type and foreign key';
Comment on column person.exercisefreqid
is 'Exercise frequency and foreign key';
Comment on column person.cityid
is 'City and foreign key';
Comment on column person.foundpartner
is 'Found partner ';
Comment on column person.gotmarried
is 'Got married';
Comment on column person.drinker
is 'Drinker';

Comment on table picture
is 'This is a table for picture of profile.';
Comment on column picture.pictureid
is 'Identify picture of the user, primary key and foreign key';
Comment on column picture.fileLocation
is 'Is file location';


select comment * from PICTURE
select * from user_tab_comments; 
SELECT *FROM user_col_comments
