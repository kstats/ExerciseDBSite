<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<!doctype html>
<html>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
  
} ?>
	<head>
		<title>Terms & Conditions</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    	<script src="js/jquery.js"></script>
    	<script src="js/jquery.validate.js"></script>
		<style type="text/css">

		.quote {
    	text-align:left;
		}

	.quote blockquote {
		
   		padding:20px 5px; 
   		border-left:150px solid #ffffff; 
    	display:inline-block;
    	color:#666;
    	background:#F2F2F2
 
	}

		h1{
		border: 10px solid black; 
		background-color:green; 
		color: white; 
		/*padding: 10px;*/ 

	} 

	a{
		color:rgb #ef11a; 
		font-size: 20px; 
		font-family: sans-serif;
		text-decoration: none;
	}

	a:hover{
		text-decoration: underline;
		font-size: italic; 
	}

		ul.menu{
			list-style: none;
		}

		ul.menu li{
			display: inline;

		}

		li:after{
			content: '|'; 
			padding-left:10px; 
		}

		li:last-child:after{
			content: '';
		}

		form[name="test"] ul{
			list-style: none; 
		}

		</style>

	</head>
	<body>
			<a href="http://localhost/cscs2441/log-in.html"> <h5 style="text-align:right">
            <?php if (!empty($_SESSION['MM_Username'])) {
             echo "Welcome ",$_SESSION['MM_Username'];  }
			 else{
				 echo "<div style ='font:11px/21px Arial,tahoma,sans-serif;color:#0645AD'><a href=\"logIn.php\">Sign-in/Register</a></div>"; 
			 }
			 
			 
			 ?>
            
            </a>
		</p>
		<div style ='font:11px/21px Arial,tahoma,sans-serif;color:#0645AD'><a href="<?php echo $logoutAction ?>">Sign out</a></div>
	<h1><center><a href=index.php target = "_blank" style="color: white"><font size="100px" face="IMPACT">A Better You</font></a></center>
			

		<ul class="menu"> 
        <li><a href = index.php style="color: white">Home</a></li>
			<li><a href = forum.php style="color: white">Forum</a></li>
			<li><a href = findTrainers.php style="color: white">Trainers<a></li>
			<li><a href = gym.php style="color: white">Gyms</a></li>
            <?php
			if(! empty($_SESSION['MM_UserGroup'])){
			if($_SESSION['MM_UserGroup'] == 1)
{
			echo '<li><a href = "userInfoAboutMe.php" style="color: white">User Info</a></li>';
}
			else if($_SESSION['MM_UserGroup'] == 2)
{
			echo '<li><a href = "trainerAboutMe.php" style="color: white">User Info</a></li>';
}
			else if($_SESSION['MM_UserGroup'] == 3)
{
			echo '<li><a href = "gymAboutMe.php" style="color: white">User Info</a></li>';
}}
			else
{
			echo '<li><a href = "register.php" style="color: white">User Info</a></li>';
}

			?>
		</ul>
		</h1>

		<blockquote><font face="CENTURY GOTHIC" size="9" color="#9999FF">A Better You</font></blockquote>
		<blockquote><font face="CENTURY GOTHIC" size="4" color="#9999FF">Your go to for becoming a better you</font></blockquote><br><br><br><br><br><br>
		
		 

		
	
					


			<div class="quote">
				<blockquote> <font face="TIMES NEW ROMAN" size="3" color="#000000">
			 	<br>
			<p>A Better You Terms of Use
1.	1. AGREEMENT
These Terms of Use (the “Agreement”) constitute a legally binding agreement by and between A Better You, Inc.(hereinafter, “A Better You”) and you (“You” or “Your”) concerning Your use of A Better You’s website located at http://www.A Better You.com/ (the “Website”) and the services available through the Website (the “Services”). By using the Website and Services, You represent and warrant that You have read and understand, and agree to be bound by, this Agreement and A Better You’s Privacy Policy, which is incorporated herein by reference and made part of this Agreement. IF YOU DO NOT UNDERSTAND THIS AGREEMENT OR THE PRIVACY POLICY, OR DO NOT AGREE TO BE BOUND BY IT OR THE PRIVACY POLICY, YOU MUST IMMEDIATELY LEAVE THE WEBSITE AND REFRAIN FROM USING THE SERVICES.
2.	2. PRIVACY POLICY
By using the Website, You consent to the collection and use of certain information about You, as specified in the Privacy Policy. A Better You encourages users of the Website to frequently check A Better You’s Privacy Policy for changes.
3.	3. CHANGES TO AGREEMENT AND PRIVACY POLICY
A BETTER YOU RESERVES THE RIGHT TO CHANGE THIS AGREEMENT AND ITS PRIVACY POLICY AT ANY TIME UPON NOTICE TO YOU, TO BE GIVEN BY: (I) THE POSTING OF A NEW VERSION; AND/OR (II) A CHANGE NOTICE ON THE WEBSITE. IT IS YOUR RESPONSIBILITY TO REVIEW THIS AGREEMENT AND THE PRIVACY POLICY PERIODICALLY. IF AT ANY TIME YOU FIND EITHER UNACCEPTABLE, YOU MUST IMMEDIATELY LEAVE THE WEBSITE AND CEASE USING THE SERVICES. You will be deemed to have agreed to any such modification or amendment by Your decision to continue using the Website following the date in which the modified or amended Agreement and/or Privacy Policy is posted on the Website. Use of information we collect now is subject to the Privacy Policy in effect at the time such information is used.
4.	4. ELIGIBILITY
BY USING THE WEBSITE OR SERVICES, YOU REPRESENT AND WARRANT THAT YOU ARE AT LEAST 18 YEARS OLD AND ARE OTHERWISE LEGALLY QUALIFIED TO ENTER INTO AND FORM CONTRACTS UNDER APPLICABLE LAW. This Agreement is void where prohibited.
5.	5. LICENSE
Subject to Your compliance with the terms and conditions of this Agreement, A Better You grants You a non-exclusive, non-sublicensable, revocable, non-transferable license to use the Website and Services. THE WEBSITE AND SERVICES ARE FOR YOUR PERSONAL AND NON-COMMERCIAL USE. The Website, or any portion of the Website, may not be reproduced, duplicated, copied, modified, sold, resold, distributed, visited, or otherwise exploited for any commercial purpose without the express written consent of A Better You. Except as expressly set forth herein, this Agreement grants You no rights in or to the intellectual property of A Better You or any other party. The license granted in this section is conditioned on Your compliance with the terms and conditions of this Agreement. In the event that You breach any provision of this Agreement, Your rights under this section will immediately terminate.
6.	6. THE WEBSITE DOES NOT PROVIDE PROFESSIONAL MEDICAL SERVICES OR ADVICE; NO DOCTOR-PATIENT RELATIONSHIP
A Better You provides the Website and Services for informational purposes only. THE WEBSITE AND SERVICES DOES NOT CONTAIN OR CONSTITUTE, AND SHOULD NOT BE INTERPRETED AS, MEDICAL ADVICE OR OPINION. A Better You is not a medical professional, and A Better You does not provide medical services or render medical advice. The Website and Services are not a substitute for the advice of a medical professional, and the information made available on or through the Website and Services should not be relied upon when making medical decisions, or to diagnose or treat a medical or health condition. If you require medical advice or services, You should consult a medical professional. YOUR USE OF THE WEBSITE DOES NOT CREATE A DOCTOR-PATIENT RELATIONSHIP BETWEEN YOU AND A BETTER YOU.
YOU HEREBY AGREE THAT, BEFORE USING THE WEBSITE AND SERVICES, YOU SHALL CONSULT YOUR PHYSICIAN, PARTICULARLY IF YOU ARE AT RISK FOR PROBLEMS RESULTING FROM EXERCISE OR CHANGES IN YOUR DIET.
7.	7. FOOD DATABASE AND NUTRITIONAL INFORMATION
A Better You’s food database contains a combination of nutritional information entered directly by A Better You and nutritional information entered by A Better You members (“Food Database”). Any A Better You member can contribute nutritional information to the Food Database, as well as edit existing nutritional information. Please be advised that nutritional information found in A Better You’s Food Database has not been reviewed by persons with the expertise required to provide You with complete, accurate, or reliable information. A BETTER YOU DOES NOT (I) GUARANTEE THE ACCURACY, COMPLETENESS, OR USEFULNESS OF ANY NUTRITIONAL INFORMATION IN THE FOOD DATABASE; OR (II) ADOPT, ENDORSE OR ACCEPT RESPONSIBILITY FOR THE ACCURACY OR RELIABILITY OF ANY SUCH NUTRITIONAL INFORMATION. UNDER NO CIRCUMSTANCES WILL A BETTER YOU BE RESPONSIBLE FOR ANY LOSS OR DAMAGE RESULTING FROM YOUR RELIANCE ON NUTRITIONAL INFORMATION. You are solely responsible for ensuring that any nutritional information in the Food Database is accurate, complete and useful.
8.	8. RELIANCE ON THIRD-PARTY CONTENT
Opinions, advice, statements, or other information, including, without limitation, food, nutrition and exercise data, made available by means of the Website and Services by third parties, are those of their respective authors, and should not necessarily be relied on. Such authors are solely responsible for such content. A BETTER YOU DOES NOT: (I) GUARANTEE THE ACCURACY, COMPLETENESS, OR USEFULNESS OF ANY THIRD-PARTY INFORMATION ON THE WEBSITE; OR (II) ADOPT, ENDORSE OR ACCEPT RESPONSIBILITY FOR THE ACCURACY OR RELIABILITY OF ANY OPINION, ADVICE OR STATEMENT MADE BY A THIRD-PARTY BY MEANS OF THE WEBSITE AND SERVICES. UNDER NO CIRCUMSTANCES WILL A BETTER YOU BE RESPONSIBLE FOR ANY LOSS OR DAMAGE RESULTING FROM YOUR RELIANCE ON INFORMATION OR OTHER CONTENT POSTED ON THE WEBSITE OR TRANSMITTED TO OR BY ANY THIRD-PARTY.
9.	9. RISK ASSUMPTION
YOU KNOWINGLY AND FREELY ASSUME ALL RISK WHEN USING THE WEBSITE AND SERVICES. YOU, ON BEHALF OF YOURSELF, YOUR PERSONAL REPRESENTATIVES AND YOUR HEIRS, HEREBY VOLUNTARILY AGREE TO RELEASE, WAIVE, DISCHARGE, HOLD HARMLESS, DEFEND AND INDEMNIFY A BETTER YOU AND ITS OFFICERS, DIRECTORS, EMPLOYEES, AGENTS, AFFILIATES, REPRESENTATIVES, SUBLICENSEES, SUCCESSORS, AND ASSIGNS FROM ANY AND ALL CLAIMS, ACTIONS OR LOSSES FOR BODILY INJURY, PROPERTY DAMAGE, WRONGFUL DEATH, EMOTIONAL DISTRESS, LOSS OF SERVICES OR OTHER DAMAGES OR HARM, WHETHER TO YOU OR TO THIRD PARTIES, WHICH MAY RESULT FROM YOUR USE OF THE WEBSITE AND SERVICES.
10.	10. USER INFORMATION; PASSWORD PROTECTION
In connection with Your use of certain Services, You are required to complete a registration form. You represent and warrant that all user information You provide on the registration form or otherwise in connection with Your use of the Website and Services will be current, complete and accurate, and that You will update that information as necessary to maintain its completeness and accuracy by visiting your personal profile. For additional information, see the section concerning “User Ability to Access, Update, and Correct Personal Information” in A Better You’s Privacy Policy.
You will also be asked to provide a user name and password in connection with Your use of certain of the Services. You are entirely responsible for maintaining the confidentiality of Your password. You may not use the account, user name, or password of any other Member at any time. You agree to notify A Better You immediately of any unauthorized use of Your account, user name, or password. A Better You shall not be liable for any loss that You incur as a result of someone else using Your password, either with or without Your knowledge. You may be held liable for any losses incurred by A Better You, its affiliates, officers, directors, employees, consultants, agents, and representatives due to someone else’s use of Your account or password.
11.	11. PUBLIC PROFILES; INFORMATION PROVIDED BY MEMBERS
As part of registration with the Website, members must create public profiles, which may contain certain indentifying information (such as age, location, total weight loss, ethnicity, marital status, religion, etc.). In addition, members have the option to post photographs, videos and other information (such as likes and dislikes) on their public profiles. A Better You relies on its members to provide current and accurate information, and A Better You does not, and cannot, investigate information contained in member public profiles. Accordingly, A Better You must assume that information contained in each member public profile is current and accurate. A BETTER YOU DOES NOT REPRESENT, WARRANT OR GUARANTEE THE CURRENCY OR ACCURACY OF PUBLIC PROFILE INFORMATION, AND HEREBY DISCLAIMS ALL RESPONSIBILITY AND LIABILITY FOR ANY INFORMATION PROVIDED BY MEMBERS BY MEANS OF PUBLIC PROFILES OR OTHERWISE IN CONNECTION WITH THE SERVICES.
12.	12. YOUR INTERACTIONS WITH OTHER MEMBERS
YOU ARE SOLELY RESPONSIBLE FOR YOUR INTERACTIONS WITH OTHER MEMBERS. YOU ACKNOWLEDGE AND UNDERSTAND THAT A BETTER YOU HAS NOT, AND DOES NOT, IN ANY WAY: (A) SCREEN ITS MEMBERS; (B) INQUIRE INTO THE BACKGROUNDS OF ITS MEMBERS; OR (C) REVIEW OR VERIFY THE STATEMENTS OF ITS MEMBERS, INCLUDING WITHOUT LIMITATION INFORMATION OR REPRESENTATIONS CONTAINED IN PUBLIC PROFILES. YOU HEREBY AGREE TO EXERCISE REASONABLE PRECAUTION IN ALL INTERACTIONS WITH OTHER MEMBERS, PARTICULARLY IF YOU DECIDE TO MEET ANOTHER MEMBER IN PERSON. A BETTER YOU DOES NOT REPRESENT, WARRANT, ENDORSE OR GUARANTEE THE CONDUCT OF ITS MEMBERS OR THEIR COMPATIBILITY WITH YOU. IN NO EVENT SHALL A BETTER YOU BE LIABLE FOR INDIRECT, SPECIAL, INCIDENTAL, OR CONSEQUENTIAL DAMAGES ARISING OUT OF OR RELATING TO ANY MEMBER’S CONDUCT IN CONNECTION WITH SUCH MEMBER’S USE OF THE SERVICES, INCLUDING, WITHOUT LIMITATION, BODILY INJURY, PROPERTY DAMAGE, WRONGFUL DEATH, EMOTIONAL DISTRESS, LOSS OF SERVICES OR ANY OTHER DAMAGES RESULTING FROM COMMUNICATIONS OR MEETINGS BETWEEN MEMBERS. YOU KNOWINGLY AND FREELY ASSUME ALL RISK WHEN USING THE WEBSITE AND SERVICES.
13.	13. MEMBER DISPUTES
A Better You reserves the right, but disclaims any perceived, implied or actual duty, to monitor disputes between Website members. You agree to hold A Better You harmless in connection with any dispute or claim You make against any other member.
14.	14. CONSENT TO RECEIVE EMAIL FROM A BETTER YOU
By registering with the Website, you thereby consent to receive periodic email communications regarding the Services, new product offers, promotions and other matters. As part of registration, You may also elect to receive periodic A Better You newsletters. You may opt-out of receiving newsletters at any time by (a) following the unsubscribe instructions contained in each newsletter; or (b) changing the email preferences in your account.
15.	15. CONSENT TO RECEIVE EMAIL COMMUNICATIONS FROM MEMBERS
By registering with the Website, your thereby consent to receive electronic communications, including email and instant messages from other Website members.
16.	16. THIRD-PARTY WEBSITES
The Website is linked with the websites of third parties (“Third-Party Websites”), some of whom may have established relationships with A Better You and some of whom may not. A Better You does not have control over the content and performance of Third-Party Websites. A BETTER YOU HAS NOT REVIEWED, AND CANNOT REVIEW OR CONTROL, ALL OF THE MATERIAL, INCLUDING COMPUTER SOFTWARE OR OTHER GOODS OR SERVICES, MADE AVAILABLE ON OR THROUGH THIRD-PARTY WEBSITES. ACCORDINGLY, A BETTER YOU DOES NOT REPRESENT, WARRANT OR ENDORSE ANY THIRD-PARTY WEBSITE, OR THE ACCURACY, CURRENCY, CONTENT, FITNESS, LAWFULNESS OR QUALITY OF THE INFORMATION MATERIAL, GOODS OR SERVICES AVAILABLE THROUGH THIRD-PARTY WEBSITES. A BETTER YOU DISCLAIMS, AND YOU AGREE TO ASSUME, ALL RESPONSIBILITY AND LIABILITY FOR ANY DAMAGES OR OTHER HARM, WHETHER TO YOU OR TO THIRD PARTIES, RESULTING FROM YOUR USE OF THIRD-PARTY WEBSITES.
YOU AGREE THAT, WHEN LINKING TO OR OTHERWISE ACCESSING OR USING A THIRD-PARTY WEBSITE, YOU ARE RESPONSIBLE FOR: (I) TAKING PRECAUTIONS AS NECESSARY TO PROTECT YOU AND YOUR COMPUTER SYSTEMS FROM VIRUSES, WORMS, TROJAN HORSES, MALICIOUS CODE AND OTHER HARMFUL OR DESTRUCTIVE CONTENT; (II) ANY DOWNLOADING, USE OR PURCHASE OF MATERIAL THAT IS OBSCENE, INDECENT, OFFENSIVE, OR OTHERWISE OBJECTIONABLE OR UNLAWFUL, OR THAT CONTAINS TECHNICAL INACCURACIES, TYPOGRAPHICAL MISTAKES AND OTHER ERRORS; (III) ANY DOWNLOADING, USE OR PURCHASE OF MATERIAL THAT VIOLATES THE PRIVACY OR PUBLICITY RIGHTS, OR INFRINGES THE INTELLECTUAL PROPERTY AND OTHER PROPRIETARY RIGHTS OF THIRD PARTIES, OR THAT IS SUBJECT TO ADDITIONAL TERMS AND CONDITIONS, STATED OR UNSTATED; (IV) ALL FINANCIAL CHARGES OR OTHER LIABILITIES TO THIRD PARTIES RESULTING FROM TRANSACTIONS OR OTHER ACTIVITIES; AND (V) READING AND UNDERSTANDING ANY TERMS OF USE OR PRIVACY POLICIES THAT APPLY TO THOSE THIRD-PARTY WEBSITES.
17.	17. THIRD-PARTY SERVICES
Certain of the Services offered through the Website are provided, in whole or in part, by third parties (“Third-Party Services” as provided by “Third-Party Service Providers”). In order to use Third-Party Services, You may be required to enter into additional terms and conditions with Third-Party Service Providers. IF YOU DO NOT UNDERSTAND OR DO NOT AGREE TO BE BOUND BY THOSE ADDITIONAL TERMS AND CONDITIONS, YOU MUST NOT USE THE RELATED THIRD-PARTY SERVICES. In the event of any inconsistency between terms and conditions relating to Third-Party Services and the terms and conditions of this Agreement, those additional terms and conditions will control, although only with respect to such Third-Party Services. The providers of Third-Party Service Providers may collect and use certain information about you, as specified in the Third-Party Service Providers’ privacy policies. Prior to providing information to any Third-Party Service Provider, you should review their privacy policy. IF YOU DO NOT UNDERSTAND OR DO NOT AGREE TO THE TERMS OF A THIRD-PARTY SERVICE PROVIDER’S PRIVACY POLICY, YOU MUST NOT USE THE RELATED THIRD-PARTY SERVICES. A BETTER YOU HEREBY DISCLAIMS ALL RESPONSIBILITY AND LIABILITY FOR ANY OF YOUR INFORMATION COLLECTED OR USED BY THIRD-PARTY SERVICE PROVIDERS.
18.	18. USER CONTENT
“User Content” is any content, materials or information, not including personally identifiable information (e.g., first and last name, address, phone number, email address, etc.), that You upload or post to, or transmit, display, perform or distribute by means of, the Website, whether in connection with Your use of Services or otherwise. YOU HEREBY GRANT A BETTER YOU AND ITS OFFICERS, DIRECTORS, EMPLOYEES, AGENTS, AFFILIATES, REPRESENTATIVES, SUBLICENSEES, SUCCESSORS, AND ASSIGNS (COLLECTIVELY, THE “A BETTER YOU PARTIES”) A PERPETUAL, FULLY PAID-UP, WORLDWIDE, SUBLICENSABLE, IRREVOCABLE, ASSIGNABLE LICENSE TO COPY, DISTRIBUTE, TRANSMIT, PUBLICLY DISPLAY OR PERFORM, EDIT, TRANSLATE, REFORMAT AND OTHERWISE USE USER CONTENT IN CONNECTION WITH THE OPERATION OF THE WEBSITE, SERVICES OR ANY OTHER SIMILAR OR RELATED BUSINESS, IN ANY MEDIUM NOW EXISTING OR LATER DEVISED, INCLUDING WITHOUT LIMITATION IN ADVERTISING AND PUBLICITY. YOU FURTHER AGREE THAT THE A BETTER YOU PARTIES MAY PUBLISH OR OTHERWISE DISCLOSE YOUR NAME AND/OR ANY USER NAME OF YOURS IN CONNECTION WITH THEIR EXERCISE OF THE LICENSE GRANTED UNDER THIS SECTION. YOU AGREE TO WAIVE, AND HEREBY WAIVE, ANY CLAIMS ARISING FROM OR RELATING TO THE EXERCISE BY THE A BETTER YOU PARTIES OF THE RIGHTS GRANTED UNDER THIS SECTION, INCLUDING WITHOUT LIMITATION ANY CLAIMS RELATING TO YOUR RIGHTS OF PERSONAL PRIVACY AND PUBLICITY. YOU WILL NOT BE COMPENSATED FOR ANY EXERCISE OF THE LICENSE GRANTED UNDER THIS SECTION.
You hereby represent and warrant that You own all rights, title and interest in and to User Content or are otherwise authorized to grant the rights provided the A Better You Parties under this section.
A Better You reserves the right to (i) remove, suspend, edit or modify any User Content in its sole discretion, including without limitation any User Content at any time, without notice to you and for any reason (including, but not limited to, upon receipt of claims or allegations from third parties or authorities relating to such User Content or if A Better You is concerned that you may have violated these Terms of Use), or for no reason at all and (ii) to remove, suspend or block any User Content submissions. A Better You also reserves the right to access, read, preserve, and disclose any information as A Better You reasonably believes is necessary to (i) satisfy any applicable law, regulation, legal process or governmental request, (ii) enforce these Terms of Use, including investigation of potential violations hereof, (iii) detect, prevent, or otherwise address fraud, security or technical issues, (iv) respond to user support requests, or (v) protect the rights, property or safety of A Better You, its users and the public.
19.	19. PUBLIC FORUMS
“Public Forum” is any area, site or feature offered as part of the Website (including without limitation public profiles, discussion forums, message boards, blogs, chat rooms, emails or instant messaging features) that enables You (a) to upload, submit, post, display, perform, distribute and/or view User Content, and/or (b) to communicate, share, or exchange User Content with other Website members or other Website visitors. You acknowledge that Public Forums, and features contained therein, are for public and not private communications. You further acknowledge that anything You upload, submit, post, transmit, communicate, share or exchange by means of any Public Forum may be viewed on the Internet by the general public, and therefore, You have no expectation of privacy with regard to any such submission or posting. You are, and shall remain, solely responsible for the User Content you upload, submit, post, transmit, communicate, share or exchange by means of any Public Forum and for the consequences of submitting or posting same. A BETTER YOU DISCLAIMS ANY PERCEIVED, IMPLIED OR ACTUAL DUTY TO MONITOR PUBLIC FORUMS AND SPECIFICALLY DISCLAIMS ANY RESPONSIBILITY OR LIABILITY FOR INFORMATION PROVIDED THEREON.
20.	20. YOUR RESPONSIBILITY FOR DEFAMATORY COMMENTS
You agree and understand that you may be held legally responsible for damages suffered by other Website members or third parties as the result of Your remarks, information, feedback or other content posted or made available on the Website that is deemed defamatory or otherwise legally actionable. Under the Federal Communications Decency Act of 1996, A Better You is not legally responsible, nor can it be held liable for damages of any kind, arising out of or in connection to any defamatory or otherwise legally actionable remarks, information, feedback or other content posted or made available on the Website.
21.	21. OBJECTIONABLE CONTENT
You represent and warrant that you shall not use the Website or Services to upload, post, transmit, display, perform or distribute any content, information or materials that: (a) are libelous, defamatory, abusive, or threatening, excessively violent, harassing, obscene, lewd, lascivious, filthy, or pornographic; (b) constitute child pornography; (c) solicit personal information; (d) incite, encourage or threaten physical harm against another; (e) promote or glorify racial intolerance, use hate and/or racist terms, or signify hate towards any person or group of people; (f) glamorize the use of hard core illegal substances and drugs; (g) advertise or otherwise solicit funds or constitute a solicitation for goods or services; (h) violate any provision of this Agreement or any other A Better You agreement or policy; or (i) is generally offensive or in bad taste, as determined by A Better You (collectively, “Objectionable Content”). A BETTER YOU DISCLAIMS ANY PERCEIVED, IMPLIED OR ACTUAL DUTY TO MONITOR THE CONTENTS OF THE WEBSITE AND SPECIFICALLY DISCLAIMS ANY RESPONSIBILITY OR LIABILITY FOR INFORMATION PROVIDED HEREON. Without limiting any of its other remedies, A Better You reserves the right to terminate Your use of the Website and Services or Your uploading, posting, transmission, display, performance or distribution of Objectionable Content. A Better You, in its sole discretion, may delete any Objectionable Content from its servers. A Better You intends to cooperate fully with any law enforcement officials or agencies in the investigation of any violation of this Agreement or of any applicable laws.
22.	22. PROHIBITED USES
A Better You imposes certain restrictions on Your use of the Website and the Services. You represent and warrant that you will not: (a) “stalk” or otherwise harass any person, or contact any person who has requested not to be contacted; (b) provide false, misleading or inaccurate information to A Better You or any other member; (c) impersonate, or otherwise misrepresent affiliation, connection or association with, any person or entity; (d) create more than one unique public profile; (e) harvest or otherwise collect information about A Better You users, including email addresses and phone numbers; (f) use or attempt to use any engine, software, tool, agent, or other device or mechanism (including without limitation browsers, spiders, robots, avatars, or intelligent agents) to harvest or otherwise collect information from the Website for any use, including without limitation use on third-party websites; (g) access content or data not intended for You, or log onto a server or account that You are not authorized to access; (h) attempt to probe, scan, or test the vulnerability of the Services, the Website, or any associated system or network, or breach security or authentication measures without proper authorization; (i) interfere or attempt to interfere with the use of the Website or Services by any other user, host or network, including, without limitation by means of submitting a virus, overloading, “flooding,” “spamming,” “mail bombing,” or “crashing”; (j) use the Website or Services to send unsolicited e-mail, including without limitation promotions or advertisements for products or services; (k) forge any TCP/IP packet header or any part of the header information in any e-mail or in any uploading or posting to, or transmission, display, performance or distribution by means of, the Website or Services; (l) post or transmit any unsolicited advertising, promotional materials, "junk mail", "spam," "chain letters," "pyramid schemes" or any other form of solicitation or any non-resume information such as opinions or notices, commercial or otherwise; or (m) attempt to modify, reverse-engineer, decompile, disassemble or otherwise reduce or attempt to reduce to a human-perceivable form any of the source code used by the A Better You Parties in providing the Website or Services. Any violation of this section may subject You to civil and/or criminal liability.
23.	23. INTELLECTUAL PROPERTY
1.	(a) Compliance with Law
You represent and warrant that, when using the Website and Services, You will obey the law and respect the intellectual property rights of others. Your use of the Website and Services is at all times governed by and subject to laws regarding copyright ownership and use of intellectual property generally. You agree not to upload, post, transmit, display, perform or distribute any content, information or other materials in violation of any third party’s copyrights, trademarks, or other intellectual property or proprietary rights. YOU SHALL BE SOLELY RESPONSIBLE FOR ANY VIOLATIONS OF ANY LAWS AND FOR ANY INFRINGEMENTS OF THIRD-PARTY RIGHTS CAUSED BY YOUR USE OF THE WEBSITE AND SERVICES. YOUR BEAR THE SOLE BURDEN OF PROVING THAT CONTENT, INFORMATION OR OTHER MATERIALS DO NOT VIOLATE ANY LAWS OR THIRD-PARTY RIGHTS.
2.	(b) Trademarks
A Better You, A Better You.com and the A Better You logo (collectively, the “A Better You Marks”) are trademarks or registered trademarks of A Better You, Inc. Other trademarks, service marks, graphics, logos and domain names appearing on the Website may be the trademarks of third-parties. Neither Your use of the Website and Services, nor this Agreement, grant You any right, title or interest in or to, or any license to reproduce or otherwise use, the A Better You Marks or any third-party trademarks, service marks, graphics, logos or domain names. You agree that any goodwill in the A Better You Marks generated as a result of Your use of the Website and Services will inure to the benefit of A Better You, Inc. and You agree to assign, and hereby do assign, all such goodwill to A Better You, Inc. You shall not at any time, nor shall You assist others to, challenge A Better You, Inc.s right, title, or interest in or to, or the validity of, the A Better You Marks.
3.	(c) Copyrighted Materials; Copyright Notice
All content and other materials available through the Website and Services, including without limitation the A Better You logo, design, text, graphics, and other files, and the selection, arrangement and organization thereof, are either owned by A Better You, Inc.or are the property of A Better You’s licensors and suppliers. Except as explicitly provided, neither Your use of the Website and Services nor this Agreement grant You any right, title or interest in or to any such materials. Copyright © 2005 to the present, A Better You, Inc. ALL RIGHTS RESERVED.
4.	(d) DMCA Policy
If you have evidence, know, or have a good faith belief that your rights or the rights of a third party have been violated and you want A Better You to delete, edit, or disable the material in question, you must provide A Better You with all of the following information: (a) a physical or electronic signature of a person authorized to act on behalf of the owner of the exclusive right that is allegedly infringed; (b) identification of the copyrighted work claimed to have been infringed, or, if multiple copyrighted works are covered by a single notification, a representative list of such works; (c) identification of the material that is claimed to be infringed or to be the subject of infringing activity and that is to be removed or access to which is to be disabled, and information reasonably sufficient to permit A Better You to locate the material; (d) information reasonably sufficient to permit A Better You to contact you, such as an address, telephone number, and if available, an electronic mail address at which you may be contacted; (e) a statement that you have a good faith belief that use of the material in the manner complained of is not authorized by the copyright owner, its agent, or the law; and (f) a statement that the information in the notification is accurate, and under penalty of perjury, that you are authorized to act on behalf of the owner of an exclusive right that is allegedly infringed. For this notification to be effective, you must provide it to A Better You’s designated agent at:
5.	Attn: Copyright Agent
A Better You, Inc.
525 Brannan Street, Suite 300
San Francisco, CA 94107
copyrightagent@A Better You.com
24.	24. DISCLAIMERS; LIMITATION OF LIABILITY
1.	(a) NO WARRANTIES.
A BETTER YOU, ON BEHALF OF ITSELF AND ITS THIRD-PARTY SERVICE PROVIDERS, LICENSORS AND SUPPLIERS, HEREBY DISCLAIMS ALL WARRANTIES. THE WEBSITE AND SERVICES ARE PROVIDED “AS IS” AND “AS AVAILABLE.” TO THE MAXIMUM EXTENT PERMITTED BY LAW, A BETTER YOU, ON BEHALF OF ITSELF AND ITS THIRD-PARTY SERVICE PROVIDERS, LICENSORS AND SUPPLIERS, EXPRESSLY DISCLAIMS ANY AND ALL WARRANTIES, EXPRESS OR IMPLIED, REGARDING THE WEBSITE, INCLUDING, BUT NOT LIMITED TO, ANY IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, OR NON-INFRINGEMENT. NEITHER A BETTER YOU NOR ITS THIRD-PARTY SERVICE PROVIDERS, LICENSORS OR SUPPLIERS WARRANTS THAT THE WEBSITE OR THE SERVICES WILL MEET YOUR REQUIREMENTS, THAT THE OPERATION OF THE WEBSITE OR THE SERVICES WILL BE UNINTERRUPTED OR ERROR-FREE.
2.	(b) YOUR RESPONSIBILITY FOR LOSS OR DAMAGE; BACKUP OF DATA
YOU AGREE THAT YOUR USE OF THE WEBSITE AND SERVICES IS AT YOUR SOLE RISK. YOU WILL NOT HOLD A BETTER YOU OR ITS THIRD-PARTY SERVICE PROVIDERS, LICENSORS AND SUPPLIERS, AS APPLICABLE, RESPONSIBLE FOR ANY LOSS OR DAMAGE THAT RESULTS FROM YOUR ACCESS TO OR USE OF THE WEBSITE, INCLUDING WITHOUT LIMITATION ANY LOSS OR DAMAGE TO ANY OF YOUR COMPUTERS OR DATA. THE INFORMATION AND SERVICES MAY CONTAIN BUGS, ERRORS, PROBLEMS OR OTHER LIMITATIONS.
IMPORTANTLY, YOU HEREBY ACKNOWLEDGE THAT A CATASTROPHIC SERVER FAILURE OR OTHER EVENT COULD RESULT IN THE LOSS OF ALL OF THE DATA RELATED TO YOUR ACCOUNT. YOU AGREE AND UNDERSTAND THAT IT IS YOUR RESPONSIBILITY TO BACKUP YOUR DATA TO YOUR PERSONAL COMPUTER OR EXTERNAL STORAGE DEVICE AND TO ENSURE SUCH BACKUPS ARE SECURE.
3.	(c) LIMITATION OF LIABILITY
THE LIABILITY OF A BETTER YOU AND ITS THIRD-PARTY SERVICE PROVIDERS, LICENSORS AND SUPPLIERS IS LIMITED. TO THE MAXIMUM EXTENT PERMITTED BY LAW, IN NO EVENT SHALL A BETTER YOU OR ITS THIRD-PARTY SERVICE PROVIDERS, LICENSORS OR SUPPLIERS BE LIABLE FOR SPECIAL, INCIDENTAL, OR CONSEQUENTIAL DAMAGES, LOST PROFITS, LOST DATA OR CONFIDENTIAL OR OTHER INFORMATION, LOSS OF PRIVACY, COSTS OF PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES, FAILURE TO MEET ANY DUTY INCLUDING WITHOUT LIMITATION OF GOOD FAITH OR OF REASONABLE CARE, NEGLIGENCE, OR OTHERWISE, REGARDLESS OF THE FORESEEABILITY OF THOSE DAMAGES OR OF ANY ADVICE OR NOTICE GIVEN TO A BETTER YOU OR ITS THIRD-PARTY SERVICE PROVIDERS, LICENSORS AND SUPPLIERS ARISING OUT OF OR IN CONNECTION WITH YOUR USE OF THE WEBSITE OR SERVICES. THIS LIMITATION SHALL APPLY REGARDLESS OF WHETHER THE DAMAGES ARISE OUT OF BREACH OF CONTRACT, TORT, OR ANY OTHER LEGAL THEORY OR FORM OF ACTION. ADDITIONALLY, THE MAXIMUM LIABILITY OF A BETTER YOU AND ITS THIRD-PARTY SERVICE PROVIDERS, LICENSORS AND SUPPLIERS TO YOU UNDER ALL CIRCUMSTANCES WILL BE $50.00. YOU AGREE THAT THIS LIMITATION OF LIABILITY REPRESENTS A REASONABLE ALLOCATION OF RISK AND IS A FUNDAMENTAL ELEMENT OF THE BASIS OF THE BARGAIN BETWEEN A BETTER YOU AND YOU. THE WEBSITE AND SERVICES WOULD NOT BE PROVIDED WITHOUT SUCH LIMITATIONS.
4.	(d) APPLICATION
THE ABOVE DISCLAIMERS, WAIVERS AND LIMITATIONS DO NOT IN ANY WAY LIMIT ANY OTHER DISCLAIMER OF WARRANTIES OR ANY OTHER LIMITATION OF LIABILITY IN THIS AGREEMENT, ANY OTHER AGREEMENT BETWEEN YOU AND A BETTER YOU OR BETWEEN YOU AND ANY OF A BETTER YOU’S THIRD-PARTY SERVICE PROVIDERS, LICENSORS AND SUPPLIERS. SOME JURISDICTIONS MAY NOT ALLOW THE EXCLUSION OF CERTAIN IMPLIED WARRANTIES OR THE LIMITATION OF CERTAIN DAMAGES, SO SOME OF THE ABOVE DISCLAIMERS, WAIVERS AND LIMITATIONS OF LIABILITY MAY NOT APPLY TO YOU. UNLESS LIMITED OR MODIFIED BY APPLICABLE LAW, THE FOREGOING DISCLAIMERS, WAIVERS AND LIMITATIONS SHALL APPLY TO THE MAXIMUM EXTENT PERMITTED, EVEN IF ANY REMEDY FAILS ITS ESSENTIAL PURPOSE. A BETTER YOU’S THIRD-PARTY SERVICE PROVIDERS LICENSORS AND SUPPLIERS ARE INTENDED THIRD-PARTY BENEFICIARIES OF THESE DISCLAIMERS, WAIVERS AND LIMITATIONS. NO ADVICE OR INFORMATION, WHETHER ORAL OR WRITTEN, OBTAINED BY YOU THROUGH THE WEBSITE OR OTHERWISE SHALL ALTER ANY OF THE DISCLAIMERS OR LIMITATIONS STATED IN THIS SECTION.
25.	25. YOUR REPRESENTATIONS AND WARRANTIES
You represent and warrant that Your use of the Website and Services will be in accordance with this Agreement and any other A Better You policies, and with any applicable laws or regulations.
26.	26. INDEMNITY BY YOU
Without limiting any indemnification provision of this Agreement, You agree to defend, indemnify and hold harmless A Better You and its officers, directors, employees, agents, affiliates, representatives, sublicensees, successors, assigns, and Third-Party Service Providers (collectively, the “Indemnified Parties”) from and against any and all claims, actions, demands, causes of action and other proceedings (collectively, “Claims”), including but not limited to legal costs and fees, arising out of or relating to: (i) Your breach of this Agreement, including without limitation any representation or warranty contained in this Agreement; (ii) Your access to or use of the Website or Services; (iii) Your provision to A Better You or any of the Indemnified Parties of information or other data; (iv) Your violation or alleged violation of any foreign or domestic, federal, state or local law or regulation; or (v) Your violation or alleged violation of any third party’s copyrights, trademarks, or other intellectual property or proprietary rights.
The Indemnified Parties will have the right, but not the obligation, to participate through counsel of their choice in any defense by You of any Claim as to which You are required to defend, indemnify or hold harmless the Indemnified Parties. You may not settle any Claim without the prior written consent of the concerned Indemnified Parties.
27.	27. GOVERNING LAW; JURISDICTION AND VENUE
The Website, Services, and this Agreement, including without limitation this Agreement’s interpretation, shall be treated as though this Agreement were executed and performed in San Francisco, California and shall be governed by and construed in accordance with the laws of the State of California without regard to its conflict of law principles. ANY CAUSE OF ACTION BY YOU ARISING OUT OF OR RELATING TO THE WEBSITE, SERVICES, OR THIS AGREEMENT MUST BE INSTITUTED WITHIN ONE (1) YEAR AFTER THE CAUSE OF ACTION AROSE OR BE FOREVER WAIVED AND BARRED. ALL ACTIONS SHALL BE SUBJECT TO THE LIMITATIONS SET FORTH IN ABOVE. The language in this Agreement shall be interpreted in accordance with its fair meaning and not strictly for or against either party.
1.	(a) Requirement of Arbitration.
You agree that any dispute, of any nature whatsoever, between You and A Better You arising out of or relating to the Website, Services, or this Agreement, shall be decided by neutral, binding arbitration before a representative of JAMS in San Francisco, California (unless You and A Better You mutually agree to a different arbitrator), who shall render an award in accordance with the substantive laws of California and JAMS’ Streamlined Arbitration Rules & Procedures. A final judgment or award by the arbitrator may then be duly entered and recorded by the prevailing party in the appropriate court as final judgment. The arbitrator shall award costs (including, without limitation, the JAMS’ fee and reasonable attorney’s fees) to the prevailing party.
2.	(b) Remedies in Aid of Arbitration; Equitable Relief.
This agreement to arbitrate will not preclude You or A Better You from seeking provisional remedies in aid of arbitration, including without limitation orders to stay a court action, compel arbitration or confirm an arbitral award, from a court of competent jurisdiction. Furthermore, this agreement to arbitrate will not preclude You or A Better You from applying to a court of competent jurisdiction for a temporary restraining order, preliminary injunction, or other interim or conservatory relief, as necessary. THE PROPER VENUE FOR ANY ACTION PERMITTED UNDER THIS SUBSECTION REGARDING “EQUITABLE RELIEF” WILL BE THE FEDERAL AND STATE COURTS LOCATED IN SAN FRANCISCO, CALIFORNIA; THE PARTIES HEREBY WAIVE ANY OBJECTION TO THE VENUE AND PERSONAL JURISDICTION OF SUCH COURTS.
28.	28. TERMINATION
1.	(a) Termination; Survival
Either party may terminate this Agreement and its rights hereunder at any time, for any or no reason at all, by providing to the other party notice of its intention to do so in accordance with this Agreement. This Agreement shall automatically terminate in the event that You breach any of this Agreement’s representations, warranties or covenants. Such termination shall be automatic, and shall not require any action by A Better You. Upon termination, all rights, licenses and obligations created by this Agreement will terminate, except that Sections 1-4, 6-13, 16-30 will survive any termination of this Agreement.
2.	(b) Effect of Termination
Any termination of this Agreement automatically terminates all rights and licenses granted to You under this Agreement, including all rights to use the Website and Services. Subsequent to termination, A Better You reserves the right to exercise whatever means it deems necessary to prevent Your unauthorized use of the Website and Services, including without limitation technological barriers such as IP blocking and direct contact with Your Internet Service Provider.
3.	(c) Legal Action
If A Better You, in A Better You’s discretion, takes legal action against You in connection with any actual or suspected breach of this Agreement, A Better You will be entitled to recover from You as part of such legal action, and You agree to pay, A Better You’s reasonable costs and attorneys’ fees incurred as a result of such legal action. The A Better You Parties will have no legal obligation or other liability to You or to any third party arising out of or relating to any termination of this Agreement.
29.	29. NOTICES
All notices required or permitted to be given under this Agreement must be in writing. A Better You shall give any notice by email sent to the most recent email address, if any, provided by You to A Better You. You agree that any notice received from A Better You electronically satisfies any legal requirement that such notice be in writing. YOU BEAR THE SOLE RESPONSIBILITY OF ENSURING THAT YOUR EMAIL ADDRESS ON FILE WITH A BETTER YOU IS ACCURATE AND CURRENT, AND NOTICE TO YOU SHALL BE DEEMED EFFECTIVE UPON THE SENDING BY A BETTER YOU OF AN EMAIL TO THAT ADDRESS. You shall give any notice to A Better You by means of: (1) U.S. mail, postage prepaid, to A Better You Inc., 525 Brannan Street, Suite 300, San Francisco, CA, 94070; or (2) email to: legal@A Better You.com. Notice to A Better You shall be effective upon receipt of notice by A Better You.
30.	30. GENERAL
This Agreement constitutes the entire agreement between A Better You and You concerning Your use of the Website and Services. This Agreement may only be modified by a written amendment signed by an authorized executive of A Better You or by the unilateral amendment of this Agreement by A Better You and by the posting by A Better You of such amended version. If any part of this Agreement is held invalid or unenforceable, that part will be construed to reflect the parties’ original intent, and the remaining portions will remain in full force and effect. A waiver by either party of any term or condition of this Agreement or any breach thereof, in any one instance, will not waive such term or condition or any subsequent breach thereof. A Better You may assign or transfer this Agreement at any time, with or without notice to You. This Agreement and all of Your rights and obligations hereunder will not be assignable or transferable by You without the prior written consent of A Better You. This Agreement will be binding upon and will inure to the benefit of the parties, their successors and permitted assigns. You and A Better You are independent contractors, and no agency, partnership, joint venture or employee-employer relationship is intended or created by this Agreement. Except for the A Better You Parties and the Indemnified Parties as and to the extent set forth in Sections 18, 21, 25 and 28(c), and A Better You’s licensors and suppliers as and to the extent expressly set forth in Section 23, there are no third-party beneficiaries to this Agreement. You acknowledge and agree that any actual or threatened breach of this Agreement or infringement of proprietary or other third party rights by You would cause irreparable injury to A Better You and A Better You’s licensors and suppliers, and would therefore entitle A Better You or A Better You’s licensors or suppliers, as the case may be, to injunctive relief. The headings in this Agreement are for the purpose of convenience only and shall not limit, enlarge, or affect any of the covenants, terms, conditions or provisions of this Agreement.

</p>
			
				 
			</font></blockquote>

			<br><br><br><br><br><br><br><br><br><br><br><br><br><br>

			


	


		<!--<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>

		<blockquote>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</blockquote>-->

	
		<br>
		<hr COLOR="black" SIZE="2"></hr>
		<center><a href=contactUs.php  style="color: black">Contact Us </a></center>
		<center><a href=aboutUs.php style="color: black">About Us</a></center>
		<center><a href=termsConditions.php  style="color: black">Terms & Conditions</a></center>
		<center><a href=suggestions.php  style="color: black">Suggestions</a></center></p>
		<p><center><font face="TECHNIC" size="4">&#169 2014 A Better You<br>All Rights Reserved</center></p>
		



</body>


	

</html>
