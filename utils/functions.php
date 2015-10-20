<?php	
// Common Functions for site 
global $TempArr;

function encodeurlstring($UrlString){
	$StopWord = array(" a ",
						  "@",
						  "#",
						  "$",
						  "%",
						  "^",
						  "&acute;",
						  "&quot;",
						  "&acirc;€™",
						  "&prime;",
						  "&ldquo;",
						  "&rdquo;",
						  "&rsquo;",
						  "&acirc;€",
						  "&acirc;",
						  "€",
						  "œ",
						  "&",
						  "*",
						  "(",
						  ")",
						  "=",
						  "+",
						  "[",
						  "]",
						  "\\",
						  "?",
						  "<",
						  ">",
						  "{",
						  "}",
						  "!",
						  "~",
						  "`",
						  "\"",
						  "/",
						  ".",
						  ",",
						  " able ",
						" about ",
						" above ",
						" abroad ",
						" according ",
						" accordingly ",
						" across ",
						" actually ",
						" adj ",
						" after ",
						" afterwards ",
						" again ",
						" against ",
						" ago ",
						" ahead ",
						" ain't ",
						" all ",
						" allow ",
						" allows ",
						" almost ",
						" alone ",
						" along ",
						" alongside ",
						" already ",
						" also ",
						" although ",
						" always ",
						" am ",
						" amid ",
						" amidst ",
						" among ",
						" amongst ",
						" an ",
						" and ",
						" another ",
						" any ",
						" anybody ",
						" anyhow ",
						" anyone ",
						" anything ",
						" anyway ",
						" anyways ",
						" anywhere ",
						" apart ",
						" appear ",
						" appreciate ",
						" appropriate ",
						" are ",
						" aren't ",
						" around ",
						" as ",
						" a's ",
						" aside ",
						" ask ",
						" asking ",
						" associated ",
						" at ",
						" available ",
						" away ",
						" awfully ",
						" b ",
						" back ",
						" backward ",
						" backwards ",
						" be ",
						" became ",
						" because ",
						" become ",
						" becomes ",
						" becoming ",
						" been ",
						" before ",
						" beforehand ",
						" begin ",
						" behind ",
						" being ",
						" believe ",
						" below ",
						" beside ",
						" besides ",
						" best ",
						" better ",
						" between ",
						" beyond ",
						" both ",
						" brief ",
						" but ",
						" by ",
						" c ",
						" came ",
						" can ",
						" cannot ",
						" cant ",
						" can't ",
						" caption ",
						" cause ",
						" causes ",
						" certain ",
						" certainly ",
						" changes ",
						" clearly ",
						" c'mon ",
						" co ",
						" co. ",
						" com ",
						" come ",
						" comes ",
						" concerning ",
						" consequently ",
						" consider ",
						" considering ",
						" contain ",
						" containing ",
						" contains ",
						" corresponding ",
						" could ",
						" couldn't ",
						" course ",
						" c's ",
						" currently ",
						" d ",
						" dare ",
						" daren't ",
						" definitely ",
						" described ",
						" despite ",
						" did ",
						" didn't ",
						" different ",
						" directly ",
						" do ",
						" does ",
						" doesn't ",
						" doing ",
						" done ",
						" don't ",
						" down ",
						" downwards ",
						" during ",
						" e ",
						" each ",
						" edu ",
						" eg ",
						" eight ",
						" eighty ",
						" either ",
						" else ",
						" elsewhere ",
						" end ",
						" ending ",
						" enough ",
						" entirely ",
						" especially ",
						" et ",
						" etc ",
						" even ",
						" ever ",
						" evermore ",
						" every ",
						" everybody ",
						" everyone ",
						" everything ",
						" everywhere ",
						" ex ",
						" exactly ",
						" example ",
						" except ",
						" f ",
						" fairly ",
						" far ",
						" farther ",
						" few ",
						" fewer ",
						" fifth ",
						" first ",
						" five ",
						" followed ",
						" following ",
						" follows ",
						" for ",
						" forever ",
						" former ",
						" formerly ",
						" forth ",
						" forward ",
						" found ",
						" four ",
						" from ",
						" further ",
						" furthermore ",
						" g ",
						" get ",
						" gets ",
						" getting ",
						" given ",
						" gives ",
						" go ",
						" goes ",
						" going ",
						" gone ",
						" got ",
						" gotten ",
						" greetings ",
						" h ",
						" had ",
						" hadn't ",
						" half ",
						" happens ",
						" hardly ",
						" has ",
						" hasn't ",
						" have ",
						" haven't ",
						" having ",
						" he ",
						" he'd ",
						" he'll ",
						" hello ",
						" help ",
						" hence ",
						" her ",
						" here ",
						" hereafter ",
						" hereby ",
						" herein ",
						" here's ",
						" hereupon ",
						" hers ",
						" herself ",
						" he's ",
						" hi ",
						" him ",
						" himself ",
						" his ",
						" hither ",
						" hopefully ",
						" how ",
						" howbeit ",
						" however ",
						" hundred ",
						" i ",
						" i'd ",
						" ie ",
						" if ",
						" ignored ",
						" i'll ",
						" i'm ",
						" immediate ",
						" in ",
						" inasmuch ",
						" inc ",
						" inc. ",
						" indeed ",
						" indicate ",
						" indicated ",
						" indicates ",
						" inner ",
						" inside ",
						" insofar ",
						" instead ",
						" into ",
						" inward ",
						" is ",
						" isn't ",
						" it ",
						" it'd ",
						" it'll ",
						" its ",
						" it's ",
						" itself ",
						" i've ",
						" j ",
						" just ",
						" k ",
						" keep ",
						" keeps ",
						" kept ",
						" know ",
						" known ",
						" knows ",
						" l ",
						" last ",
						" lately ",
						" later ",
						" latter ",
						" latterly ",
						" least ",
						" less ",
						" lest ",
						" let ",
						" let's ",
						" like ",
						" liked ",
						" likely ",
						" likewise ",
						" little ",
						" look ",
						" looking ",
						" looks ",
						" low ",
						" lower ",
						" ltd ",
						" m ",
						" made ",
						" mainly ",
						" make ",
						" makes ",
						" many ",
						" may ",
						" maybe ",
						" mayn't ",
						" me ",
						" mean ",
						" meantime ",
						" meanwhile ",
						" merely ",
						" might ",
						" mightn't ",
						" mine ",
						" minus ",
						" miss ",
						" more ",
						" moreover ",
						" most ",
						" mostly ",
						" mr ",
						" mrs ",
						" much ",
						" must ",
						" mustn't ",
						" my ",
						" myself ",
						" n ",
						" name ",
						" namely ",
						" nd ",
						" near ",
						" nearly ",
						" necessary ",
						" need ",
						" needn't ",
						" needs ",
						" neither ",
						" never ",
						" neverf ",
						" neverless ",
						" nevertheless ",
						" new ",
						" next ",
						" nine ",
						" ninety ",
						" no ",
						" nobody ",
						" non ",
						" none ",
						" nonetheless ",
						" noone ",
						" no-one ",
						" nor ",
						" normally ",
						" not ",
						" nothing ",
						" notwithstanding ",
						" novel ",
						" now ",
						" nowhere ",
						" o ",
						" obviously ",
						" of ",
						" off ",
						" often ",
						" oh ",
						" ok ",
						" okay ",
						" old ",
						" on ",
						" once ",
						" one ",
						" ones ",
						" one's ",
						" only ",
						" onto ",
						" opposite ",
						" or ",
						" other ",
						" others ",
						" otherwise ",
						" ought ",
						" oughtn't ",
						" our ",
						" ours ",
						" ourselves ",
						" out ",
						" outside ",
						" over ",
						" overall ",
						" own ",
						" p ",
						" particular ",
						" particularly ",
						" past ",
						" per ",
						" perhaps ",
						" placed ",
						" please ",
						" plus ",
						" possible ",
						" presumably ",
						" probably ",
						" provided ",
						" provides ",
						" q ",
						" que ",
						" quite ",
						" qv ",
						" r ",
						" rather ",
						" rd ",
						" re ",
						" really ",
						" reasonably ",
						" recent ",
						" recently ",
						" regarding ",
						" regardless ",
						" regards ",
						" relatively ",
						" respectively ",
						" right ",
						" round ",
						" s ",
						" said ",
						" same ",
						" saw ",
						" say ",
						" saying ",
						" says ",
						" second ",
						" secondly ",
						" see ",
						" seeing ",
						" seem ",
						" seemed ",
						" seeming ",
						" seems ",
						" seen ",
						" self ",
						" selves ",
						" sensible ",
						" sent ",
						" serious ",
						" seriously ",
						" seven ",
						" several ",
						" shall ",
						" shan't ",
						" she ",
						" she'd ",
						" she'll ",
						" she's ",
						" should ",
						" shouldn't ",
						" since ",
						" six ",
						" so ",
						" some ",
						" somebody ",
						" someday ",
						" somehow ",
						" someone ",
						" something ",
						" sometime ",
						" sometimes ",
						" somewhat ",
						" somewhere ",
						" soon ",
						" sorry ",
						" specified ",
						" specify ",
						" specifying ",
						" still ",
						" sub ",
						" such ",
						" sup ",
						" sure ",
						" t ",
						" take ",
						" taken ",
						" taking ",
						" tell ",
						" tends ",
						" th ",
						" than ",
						" thank ",
						" thanks ",
						" thanx ",
						" that ",
						" that'll ",
						" thats ",
						" that's ",
						" that've ",
						" the ",
						" their ",
						" theirs ",
						" them ",
						" themselves ",
						" then ",
						" thence ",
						" there ",
						" thereafter ",
						" thereby ",
						" there'd ",
						" therefore ",
						" therein ",
						" there'll ",
						" there're ",
						" theres ",
						" there's ",
						" thereupon ",
						" there've ",
						" these ",
						" they ",
						" they'd ",
						" they'll ",
						" they're ",
						" they've ",
						" thing ",
						" things ",
						" think ",
						" third ",
						" thirty ",
						" this ",
						" thorough ",
						" thoroughly ",
						" those ",
						" though ",
						" three ",
						" through ",
						" throughout ",
						" thru ",
						" thus ",
						" till ",
						" to ",
						" together ",
						" too ",
						" took ",
						" toward ",
						" towards ",
						" tried ",
						" tries ",
						" truly ",
						" try ",
						" trying ",
						" t's ",
						" twice ",
						" two ",
						" u ",
						" un ",
						" under ",
						" underneath ",
						" undoing ",
						" unfortunately ",
						" unless ",
						" unlike ",
						" unlikely ",
						" until ",
						" unto ",
						" up ",
						" upon ",
						" upwards ",
						" us ",
						" use ",
						" used ",
						" useful ",
						" uses ",
						" using ",
						" usually ",
						" v ",
						" value ",
						" various ",
						" versus ",
						" very ",
						" via ",
						" viz ",
						" vs ",
						" w ",
						" want ",
						" wants ",
						" was ",
						" wasn't ",
						" way ",
						" we ",
						" we'd ",
						" welcome ",
						" well ",
						" we'll ",
						" went ",
						" were ",
						" we're ",
						" weren't ",
						" we've ",
						" what ",
						" whatever ",
						" what'll ",
						" what's ",
						" what've ",
						" when ",
						" whence ",
						" whenever ",
						" where ",
						" whereafter ",
						" whereas ",
						" whereby ",
						" wherein ",
						" where's ",
						" whereupon ",
						" wherever ",
						" whether ",
						" which ",
						" whichever ",
						" while ",
						" whilst ",
						" whither ",
						" who ",
						" who'd ",
						" whoever ",
						" whole ",
						" who'll ",
						" whom ",
						" whomever ",
						" who's ",
						" whose ",
						" why ",
						" will ",
						" willing ",
						" wish ",
						" with ",
						" within ",
						" without ",
						" wonder ",
						" won't ",
						" would ",
						" wouldn't ",
						" x ",
						" y ",
						" yes ",
						" yet ",
						" you ",
						" you'd ",
						" you'll ",
						" your ",
						" you're ",
						" yours ",
						" yourself ",
						" yourselves ",
						" you've ",
						" z ",
						" zero ",
						' ',
						'--',
						'&quot;',
						'&amp;',
						'&acirc;€“',
						'!',
						'@',
						'#',
						'$',
						'%',
						'^',
						'&',
						'*',
						'(',
						')',
						'_',
						'+',
						'{',
						'}',
						'|',
						':',
						'"',
						'<',
						'>',
						'?',
						'[',
						']',
						'\\',
						';',
						"'",
						',',
						'.',
						'/',
						'*',
						'+',
						'~',
						'`',
						'='
);
	$UrlString = str_replace($StopWord,'-',$UrlString);
	//$UrlString = str_replace('"','-',$UrlString);
	$UrlString = str_replace("--",'-',$UrlString);
	/*for($i=0;$i<count($StopWord);$i++){
		$UrlString = str_replace($StopWord[$i],'-',$UrlString);
		//$SpecialChars = array(" ",":","--","%","'","–",'&acirc;€“');
		$SpecialChars = array(' ','--','&quot;','&amp;','&acirc;€“','!','@','#','$','%','^','&','*','(',')','_','+','{','}','|',':','"','<','>','?','[',']','\\',';',"'",',','.','/','*','+','~','`','='); 
		$UrlString = str_replace($SpecialChars,'-',$UrlString);
		$UrlString = str_replace("'",'-',$UrlString);
//		$UrlString = str_replace("%",'-',$UrlString);
		//$UrlString = str_replace('--','-',$UrlString);
	}*/
	
	$UrlString = strtolower($UrlString);
	$UrlString = urlencode($UrlString);
	return $UrlString;
}

function decodeurlstring($UrlString){
	$UrlString = urldecode($UrlString);
	$UrlString = str_replace('-',' ',$UrlString);
	return $UrlString;
}

function encodestring($String){
	$enc1=base64_encode($String);
	//echo "<br>enc1=".$enc1;
	$enc2=base64_encode($enc1);
	//echo "<br>enc2=".$enc2;
	$enc3=base64_encode($enc2);
	//echo "<br>enc3=".$enc3;
	return $enc3;
}

function ResizeImages($ImageURL,$ImageWidth,$ImageHeight){
	list($CurrentImageWidth, $CurrentImageHeight, $type, $attr) = getimagesize($ImageURL);
	if($CurrentImageWidth>$ImageWidth){
		$ThisWidth = $ImageWidth;
	}
	if($CurrentImageHeight>$ImageHeight){
		$ThisHeight = $ImageHeight;
	}
	echo '<img src="'.$ImageURL.'" width="'.$ThisWidth.'" height="'.$ThisHeight.'" alt="" />';
}

function decodestring($String){
	$enc2=base64_decode($String);
	//echo "<br>enc2=".$enc2;
	$enc1=base64_decode($enc2);
	//echo "<br>enc1=".$enc1;
	$enc=base64_decode($enc1);
	//echo "<br>enc=".$enc;
	
	return $enc;
}

function inserttext($Textvalue){
	$Textvalue=addslashes($Textvalue);
	$Textvalue=str_replace('“','"',$Textvalue);
	$Textvalue=str_replace('”','"',$Textvalue);
	//$Textvalue=htmlspecialchars($Textvalue);

	$trans = get_html_translation_table(HTML_ENTITIES); 
	//$str = "Hallo & <Frau> & Krämer"; 
	$Textvalue = strtr($Textvalue, $trans); 
	$Textvalue=trim($Textvalue);
	return $Textvalue;
}

function viewtext($Textvalue){
	$Textvalue=stripslashes($Textvalue);
	$trans = get_html_translation_table(HTML_ENTITIES); 
	$trans = array_flip($trans); 
	$Textvalue = strtr($Textvalue, $trans); 
	$Textvalue=trim($Textvalue);
	return $Textvalue;
}





function limit_words($string, $word_limit)
{
    $words = explode(" ",$string);
    return implode(" ", array_splice($words, 0, $word_limit));
}


function countryCityFromIP($ipAddr)
       {
       //function to find country and city from IP address
       //Developed by Roshan Bhattarai [url]http://roshanbh.com.np[/url]
       //verify the IP address for the
       ip2long($ipAddr)== -1 || ip2long($ipAddr) === false ? trigger_error("Invalid IP", E_USER_ERROR) : "";
       $ipDetail=array(); //initialize a blank array
       //get the XML result from hostip.info
       $xml = file_get_contents("http://api.hostip.info/?ip=".$ipAddr);
       //get the city name inside the node <gml:name> and </gml:name>
       preg_match("@<Hostip>(\s)*<gml:name>(.*?)</gml:name>@si",$xml,$match);
       //assing the city name to the array
       $ipDetail['city']=$match[2];
       //get the country name inside the node <countryName> and </countryName>
       preg_match("@<countryName>(.*?)</countryName>@si",$xml,$matches);
       //assign the country name to the $ipDetail array
       $ipDetail['country']=$matches[1];
       //get the country name inside the node <countryName> and </countryName>
       preg_match("@<countryAbbrev>(.*?)</countryAbbrev>@si",$xml,$cc_match);
       $ipDetail['country_code']=$cc_match[1]; //assing the country code to array
       //return the array containing city, country and country code
       return $ipDetail;
     }
function loadVariable($var,$default) { 
	// print_r($_GET);die('deb');
	if (isset($_POST[$var])) {
		return $_POST[$var];
	} elseif (isset($_GET[$var])) {
		return $_GET[$var];
	} else {
		return $default;
	}
}

function checkCCDetails($SessionID){
	global $objDB;
	global $HURLS;
	
 	$SQL = "Select * from members where member_id='".$SessionID."' and BlockUser='0'";
	$RsUserCCDetails = $objDB->select($SQL);
	$_SESSION['BlockUser']='0';
 	if(count($RsUserCCDetails)<=0){
		$_SESSION['BlockUser']='1';
		header("Location: ".$HURLS."credit-card-details");
		exit;
	}
	
}
function validateRegExpr($Variable,$ValidationType){
	
	if (preg_match ("|<[^>]+>(.*)</[^>]+>|U", $Variable)){
		return false;
	}else{
		if($ValidationType=='BLANK'){
			if(strlen($Variable)==0){
				return false;
			}
		}else if($ValidationType=='STRING'){
			if(!preg_match("/[A-z0-9\s\- ]+$/", $Variable))
			{	
				return false;		 
			}
		}else if($ValidationType=='EMAIL'){
			if(!preg_match("/^[A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_-]+([.][A-z0-9_-]+)*[.][A-z]{2,4}$/", $Variable))
			{	
				return false;		 
			}
		}else if($ValidationType=='NUMERIC'){
			if(!preg_match("/^[0-9]+$/", $Variable))
			{	
				return false;		 
			}
		}else if($ValidationType=='PHONE'){
			if(!preg_match("/^[0-9\.\-\(\)]+$/", $Variable))
			{	
				return false;		 
			}
		}else if($ValidationType=='FLOAT'){
			if(!preg_match("/^[0-9\.]+$/", $Variable))
			{	
				return false;		 
			}
		}
		return true;	
	} 
}
function checkCreditCard ($cardnumber, $cardname, &$errornumber, &$errortext) {

  // Define the cards we support. You may add additional card types.
  
  //  Name:      As in the selection box of the form - must be same as user's
  //  Length:    List of possible valid lengths of the card number for the card
  //  prefixes:  List of possible prefixes for the card
  //  checkdigit Boolean to say whether there is a check digit
  
  // Don't forget - all but the last array definition needs a comma separator!
  
  $cards = array (  array ('name' => 'American Express', 
                          'length' => '15', 
                          'prefixes' => '34,37',
                          'checkdigit' => true
                         ),
                   array ('name' => 'Carte Blanche', 
                          'length' => '14', 
                          'prefixes' => '300,301,302,303,304,305,36,38',
                          'checkdigit' => true
                         ),
                   array ('name' => 'Diners Club', 
                          'length' => '14',
                          'prefixes' => '300,301,302,303,304,305,36,38',
                          'checkdigit' => true
                         ),
                   array ('name' => 'Discover', 
                          'length' => '16', 
                          'prefixes' => '6011',
                          'checkdigit' => true
                         ),
                   array ('name' => 'Enroute', 
                          'length' => '15', 
                          'prefixes' => '2014,2149',
                          'checkdigit' => true
                         ),
                   array ('name' => 'JCB', 
                          'length' => '15,16', 
                          'prefixes' => '3,1800,2131',
                          'checkdigit' => true
                         ),
                   array ('name' => 'Maestro', 
                          'length' => '12,13,14,15,16,18', 
                          'prefixes' => '5018,5020,5038,6304,6759,6761',
                          'checkdigit' => true
                         ),
                   array ('name' => 'MasterCard', 
                          'length' => '16', 
                          'prefixes' => '51,52,53,54,55',
                          'checkdigit' => true
                         ),
                   array ('name' => 'Solo', 
                          'length' => '16,18,19', 
                          'prefixes' => '6334,6767',
                          'checkdigit' => true
                         ),
                   array ('name' => 'Switch', 
                          'length' => '16,18,19', 
                          'prefixes' => '4903,4905,4911,4936,564182,633110,6333,6759',
                          'checkdigit' => true
                         ),
                   array ('name' => 'Visa', 
                          'length' => '13,16', 
                          'prefixes' => '4',
                          'checkdigit' => true
                         ),
                   array ('name' => 'Visa Electron', 
                          'length' => '16', 
                          'prefixes' => '417500,4917,4913',
                          'checkdigit' => true
                         )
                );

  $ccErrorNo = 0;

  $ccErrors [0] = "Unknown card type";
  $ccErrors [1] = "No card number provided";
  $ccErrors [2] = "Credit card number has invalid format";
  $ccErrors [3] = "Credit card number is invalid";
  $ccErrors [4] = "Credit card number is wrong length";
               
  // Establish card type
  $cardType = -1;
  for ($i=0; $i<sizeof($cards); $i++) {

    // See if it is this card (ignoring the case of the string)
    if (strtolower($cardname) == strtolower($cards[$i]['name'])) {
      $cardType = $i;
      break;
    }
  }
  
  // If card type not found, report an error
  if ($cardType == -1) {
     $errornumber = 0;     
     $errortext = $ccErrors [$errornumber];
     return false; 
  }
   
  // Ensure that the user has provided a credit card number
  if (strlen($cardnumber) == 0)  {
     $errornumber = 1;     
     $errortext = $ccErrors [$errornumber];
     return false; 
  }
  
  // Remove any spaces from the credit card number
  $cardNo = str_replace (' ', '', $cardnumber);  
   
  // Check that the number is numeric and of the right sort of length.
  if (!eregi('^[0-9]{13,19}$',$cardNo))  {
     $errornumber = 2;     
     $errortext = $ccErrors [$errornumber];
     return false; 
  }
       
  // Now check the modulus 10 check digit - if required
  if ($cards[$cardType]['checkdigit']) {
    $checksum = 0;                                  // running checksum total
    $mychar = "";                                   // next char to process
    $j = 1;                                         // takes value of 1 or 2
  
    // Process each digit one by one starting at the right
    for ($i = strlen($cardNo) - 1; $i >= 0; $i--) {
    
      // Extract the next digit and multiply by 1 or 2 on alternative digits.      
      $calc = $cardNo{$i} * $j;
    
      // If the result is in two digits add 1 to the checksum total
      if ($calc > 9) {
        $checksum = $checksum + 1;
        $calc = $calc - 10;
      }
    
      // Add the units element to the checksum total
      $checksum = $checksum + $calc;
    
      // Switch the value of j
      if ($j ==1) {$j = 2;} else {$j = 1;};
    } 
  
    // All done - if checksum is divisible by 10, it is a valid modulus 10.
    // If not, report an error.
    if ($checksum % 10 != 0) {
     $errornumber = 3;     
     $errortext = $ccErrors [$errornumber];
     return false; 
    }
  }  

  // The following are the card-specific checks we undertake.

  // Load an array with the valid prefixes for this card
  $prefix = split(',',$cards[$cardType]['prefixes']);
      
  // Now see if any of them match what we have in the card number  
  $PrefixValid = false; 
  for ($i=0; $i<sizeof($prefix); $i++) {
    $exp = '^' . $prefix[$i];
    if (ereg($exp,$cardNo)) {
      $PrefixValid = true;
      break;
    }
  }
      
  // If it isn't a valid prefix there's no point at looking at the length
  if (!$PrefixValid) {
     $errornumber = 3;     
     $errortext = $ccErrors [$errornumber];
     return false; 
  }
    
  // See if the length is valid for this card
  $LengthValid = false;
  $lengths = split(',',$cards[$cardType]['length']);
  for ($j=0; $j<sizeof($lengths); $j++) {
    if (strlen($cardNo) == $lengths[$j]) {
      $LengthValid = true;
      break;
    }
  }
  
  // See if all is OK by seeing if the length was valid. 
  if (!$LengthValid) {
     $errornumber = 4;     
     $errortext = $ccErrors [$errornumber];
     return false; 
  };   
  
  // The credit card is in the required format.
  return true;
 }
// Generalized Combo 13/06/06
function FillCombo($objDB,$Table, $Text, $Value, $Selected,$WhereText,$WhereValue)
{
	$SQL = "SELECT ".$Text.",".$Value." FROM ".$Table;
	if(isset($WhereText) && $WhereText!="")
		$SQL.= " WHERE ".$WhereText."='".$WhereValue."'";
	$SQL.= " ORDER BY ".$Text;
	$res = $objDB->select($SQL);
	for($i=0;$i<sizeof($res);$i++)
	{
		echo "<Option Value='".$res[$i][$Value]."'";
		if(is_array($Selected)){
			for($j=0;$j<count($Selected);$j++){
				if($res[$i][$Value]==$Selected[$j])
					echo "selected";
			}
		}
		else if($res[$i][$Value]==$Selected){
			echo "selected";
		}
		echo ">".$res[$i][$Text]."</Option>";	
	}
}


 // Convert date from dd/mm/yyyy to yyyy-mm-dd
function ConvertDate($date){
	if($date!=''){
		$Date_array=explode("/",$date);
		$NewDate=date('Y-m-d',mktime(0,0,0,$Date_array[1],$Date_array[0],$Date_array[2]));
		return $NewDate;
	}else{
		return '';
	}
}
 // Convert date from dd/mm/yyyy to yyyy-mm-dd
function YYMMDDtoDDMMYY($date){
	if($date!=''){
		$Date_array=explode("-",$date);
		$NewDate=date('d/m/Y',mktime(0,0,0,$Date_array[2],$Date_array[1],$Date_array[0]));
		return $NewDate;
	}else{
		return '';
	}
}
 // Convert date from mm/dd/yyyy to yyyy-mm-dd
function ConvertDateforDB($date){
	if($date!=''){
		$Date_array=explode("/",$date);
		$NewDate=$Date_array[2].'-'.$Date_array[0].'-'.$Date_array[1];
		return $NewDate;
	}else{
		return '';
	}
}
function ShowDateForFE($date){
// convert yyyy-mm-dd to mm-dd-yyyy
	if($date!=''){
		$Date_array=explode(" ",$date);
		$Date_array=explode("-",$Date_array[0]);
		$NewDate=$Date_array[1]."-".$Date_array[2]."-".$Date_array[0];
		return $NewDate;
	}else{
		return '';
	}
}
function ShowDateForComment($date){
	if($date!=''){
		$Date_array=explode(" ",$date);
		$Date_array1=explode("-",$Date_array[0]);
		$Date_array2=explode(":",$Date_array[1]);
		echo date("",mktime(0,0,0,0,0,$Date_array1[0]));
		$NewDate=date("M d, Y",mktime($Date_array2[0],$Date_array2[1],$Date_array2[2],$Date_array1[1],$Date_array1[2],$Date_array1[0]));
		$NewDate.=" at ".date("h:i a",mktime($Date_array2[0],$Date_array2[1],$Date_array2[2],$Date_array1[1],$Date_array1[2],$Date_array1[0]));
		return $NewDate;
	}else{
		return '';
	}
}
function ShowDateForCSV($date){
// convert yyyy-mm-dd to mm/dd/yyyy
	if($date!=''){
		$Date_array=explode(" ",$date);
		$Date_array=explode("-",$Date_array[0]);
		$NewDate=$Date_array[1]."/".$Date_array[2]."/".$Date_array[0];
		return $NewDate;
	}else{
		return '';
	}
}
function ConvertDateAdmin($date){
	if($date!=''){
		$Date_array=explode("/",$date);
 		$NewDate=date('Y-m-d',mktime(0,0,0,$Date_array[2],$Date_array[0],$Date_array[1]));
		$NewDate=$Date_array[2]."-".$Date_array[0]."-".$Date_array[1];
		return $NewDate;
	}else{
		return '';
	}
}
// Return Random Key 
function GenerateRandomKey($TableName, $Length, $myConnection)
{
	$Key = "";
	$found = false;
	while(!$found)
	{
		while(strlen($Key)<$Length)
		{
			srand((double)microtime()*1000000);
			$number = rand(50,150);
			if($number>=65 && $number<=90)
				$Key = $Key.chr($number);
			elseif($number>=48 && $number<=57)
				$Key = $Key.chr($number);
		}
		$SQL = "Select * from ".$TableName." where SecurityKey = '".$Key."'";
		$rsTemp = mysql_query($SQL, $myConnection) or die(mysql_error());
		if(mysql_num_rows($rsTemp)>0)
		{
			$found = false;
			$Key = "";
		}
		else
			$found = true;
		mysql_free_result($rsTemp);
	}	
	return trim($Key);	
}
 // Resample Image 
function resampimagejpg($forcedwidth, $forcedheight, $sourcefile, $destfile, $imgcomp)
{
	$g_imgcomp=100-$imgcomp;
	$g_srcfile=$sourcefile;
	$g_dstfile=$destfile;
	$g_fw=$forcedwidth;
	$g_fh=$forcedheight;
	if(file_exists($g_srcfile))
	{
		$g_is=getimagesize($g_srcfile);
		if(($g_is[0]-$g_fw)>=($g_is[1]-$g_fh))
		{
		$g_iw=$g_fw;
		$g_ih=($g_fw/$g_is[0])*$g_is[1];
		}
		else
		{
		$g_ih=$g_fh;
		$g_iw=($g_ih/$g_is[1])*$g_is[0]; 
		}
		$src=explode(".",$g_srcfile);
		$var=count($src);
		if($src[$var-1]=='gif' || $src[$var-1]=='GIF')
		{
			$img_src=ImageCreateFromGIF($g_srcfile);
			//$img_src= ImageColorAllocate($img_src, 250, 250, 250);
			$img_dst=imagecreate($g_iw,$g_ih);
			$img_dst1 = ImageColorAllocate($img_dst, 255, 255, 255);
		}
		if($src[$var-1]=='png')
		{
			$img_src=ImageCreateFromPNG($g_srcfile);
			$img_dst=imagecreate($g_iw,$g_ih);
			$img_dst1 = ImageColorAllocate($img_dst,255, 255, 255);
		}
		if($src[$var-1]=='jpg' || $src[$var-1]=='JPG')
		{
			$img_src=imagecreatefromjpeg($g_srcfile);
			$img_dst=imagecreate($g_iw,$g_ih);
			$img_dst = &imageCreateTrueColor( $g_iw, $g_ih);
		}
	
		imagecopyresampled($img_dst, $img_src, 0, 0, 0, 0, $g_iw, $g_ih, $g_is[0], $g_is[1]);
		if($src[$var-1]=='jpg' || $src[$var-1]=='JPG')
		{
			imagejpeg($img_dst, $g_dstfile, $g_imgcomp);
		}
		if($src[$var-1]=='png')
		{
			imagepng($img_dst, $g_dstfile, $g_imgcomp);
		}
		if($src[$var-1]='gif' || $src[$var-1]=='GIF')
		{
			imagegif($img_dst, $g_dstfile, $g_imgcomp);
		}
	imagedestroy($img_dst);
	return true;
	}
	else
	return false;
}
// return Image Extention  30/06/06
function Image_Extention($file){
	$Ext=strstr($file, '.');
	return $Ext;
}

//Common Module
//Return day from date diff
function dateDiff($dformat, $endDate, $beginDate){
	$date_parts1=explode($dformat, $beginDate);
	$date_parts2=explode($dformat, $endDate);
	$start_date=gregoriantojd($date_parts1[0], $date_parts1[1], $date_parts1[2]);
	$end_date=gregoriantojd($date_parts2[0], $date_parts2[1], $date_parts2[2]);
	return $end_date - $start_date;
}
 
 
function create_thumb_hfixed($file_name_src, $file_name_dest, $height, $quality=100)
{
   if (file_exists($file_name_src)  && isset($file_name_dest))
   {
       $est_src = pathinfo(strtolower($file_name_src));
       $est_dest = pathinfo(strtolower($file_name_dest));
       $size = getimagesize($file_name_src);
       $h = number_format($height, 0, ',', '');
       $w = number_format(($size[0]/$size[1])*$height,0,',','');
       // IMPOSTAZIONE STREAM DESTINAZIONE
       if ($est_dest['extension'] == "gif" || $est_dest['extension'] == "jpg")
       {
           $file_name_dest = substr_replace($file_name_dest, 'jpg', -3);
           $dest = imagecreatetruecolor($w, $h);
           imageantialias($dest, TRUE);
       } elseif ($est_dest['extension'] == "png")
       {
           $dest = imagecreatetruecolor($w, $h);
           imageantialias($dest, TRUE);
       } else
       {
          return FALSE;
       }
       // IMPOSTAZIONE STREAM SORGENTE
       switch($size[2])
       {
       case 1:       //GIF
           $src = imagecreatefromgif($file_name_src);
           break;
       case 2:       //JPEG
           $src = imagecreatefromjpeg($file_name_src);
           break;
       case 3:       //PNG
           $src = imagecreatefrompng($file_name_src);
           break;
       default:
           return FALSE;
           break;
       }
       imagecopyresampled($dest, $src, 0, 0, 0, 0, $w, $h, $size[0], $size[1]);
       
       switch($size[2])
       {
       case 1:
       case 2:
           imagejpeg($dest,$file_name_dest, $quality);
           break;
       case 3:
           imagepng($dest,$file_name_dest);
       }
       return TRUE;
   }
   return FALSE;
}
function create_thumb_wfixed($file_name_src, $file_name_dest, $weight,$quality=100)
{
   if (file_exists($file_name_src)  && isset($file_name_dest))
   {
       $est_src = pathinfo(strtolower($file_name_src));
       $est_dest = pathinfo(strtolower($file_name_dest));
       $size = getimagesize($file_name_src);
       $w = number_format($weight, 0, ',', '');
       $h = number_format(($size[1]/$size[0])*$weight,0,',','');
       // IMPOSTAZIONE STREAM DESTINAZIONE
       if ($est_dest['extension'] == "gif" || $est_dest['extension'] == "jpg")
       {
           $file_name_dest = substr_replace($file_name_dest, 'jpg', -3);
           $dest = imagecreatetruecolor($w, $h);
           imageantialias($dest, TRUE);
       } elseif ($est_dest['extension'] == "png")
       {
           $dest = imagecreatetruecolor($w, $h);
           imageantialias($dest, TRUE);
       } else
       {
          return FALSE;
       }
       // IMPOSTAZIONE STREAM SORGENTE
       switch($size[2])
       {
       case 1:       //GIF
           $src = imagecreatefromgif($file_name_src);
           break;
       case 2:       //JPEG
           $src = imagecreatefromjpeg($file_name_src);
           break;
       case 3:       //PNG
           $src = imagecreatefrompng($file_name_src);
           break;
       default:
           return FALSE;
           break;
       }
       imagecopyresampled($dest, $src, 0, 0, 0, 0, $w, $h, $size[0], $size[1]);
       
       switch($size[2])
       {
       case 1:
       case 2:
           imagejpeg($dest,$file_name_dest, $quality);
           break;
       case 3:
           imagepng($dest,$file_name_dest);
       }
       return TRUE;
   }
   return FALSE;
}
 
function resize_jpg($inputFilename, $new_side){
	$imagedata = getimagesize($inputFilename);
	$w = $imagedata[0];
	$h = $imagedata[1];
	
	if ($h > $w) {
		$new_w = ($new_side / $h) * $w;
		$new_h = $new_side;
	
	} else {
		$new_h = ($new_side / $w) * $h;
		$new_w = $new_side;
	
	}
	
	$im2 = imagecreatetruecolor($new_w, $new_h);
	$image = imagecreatefromjpeg($inputFilename);
	imagecopyresampled ($im2, $image, 0, 0, 0, 0, $new_w, $new_h, $imagedata[0], $imagedata[1]);
	return $im2;
}
 
 function convetDateToFE($datetime)
{
 
 list($date,$time) = explode(" ",$datetime);
 
 list($year,$month,$day)= explode("-",$date);

 $NewDateString = $month."/".$day."/".$year." ".$time;
 
 return $NewDateString;
}

function convetDateToFEUS($date)
{
   global $objDB;
   
   $SQL = "Select DATE_FORMAT('".$date."','%b %d,%Y') AS newdate ";
   $RecordTmp = $objDB->select($SQL);
 
   return $RecordTmp[0]["newdate"];
}

 function ContactUsMail($Post){
	$headers = "From:".$Post['Email']."\r\n" .
	'X-Mailer: PHP/' . phpversion() . "\r\n" .
	"MIME-Version: 1.0\r\n" .
	"Content-Type: text/html; charset=utf-8\r\n" .
	"Content-Transfer-Encoding: 8bit\r\n\r\n";	
	
	$subject = "Enquiry mail";
	$Phone=$Post['Phone']."-".$Post['Ext'];
	                     
	$Template_Variables=array
		(
			"Name"=>$Post['Name'],
			"Title"=>$Post['Title'],
			"Company"=>$Post['Company'],
			"Address"=>$Post['Address'],
			"City"=>$Post['City'],
			"State"=>$Post['State'],
			"Country"=>$Post['Country'],
			"Zip"=>$Post['ZipCode'],
			"PhoneNo"=>$Phone,
			"Fax"=>$Post['Fax'],
			"Email"=>$Post['Email'],
			"Comments"=>$Post['Questions'],			
		);
		
		$f = fopen("mailtemplate/contact_us.html","r") or die("File Not Found...?");
		$HTMLBody = fread($f,filesize("mailtemplate/contact_us.html"));
		
		fclose($f);
		
		foreach($Template_Variables as $Find=>$ReplaceWith)
		{
			$HTMLBody = str_replace("{".$Find."}",$ReplaceWith,$HTMLBody);
		}
		//echo $HTMLBody;exit;
		//$flag=mail("sales@workhab.com",$subject,$HTMLBody,$headers);
		$flag=PHPMailer($subject,$HTMLBody,EMAIL_FROM,'',EMAIL_TO,'');
		 
	return $flag;
}

function WelcomeMail($UserID,$UserName,$Password,$MailFrom){

   global $objDB;
   global $HURL;
global $HURLHTTP;
   global $HURLS;
 	    $SQL = "Select * from members where member_id = ".$UserID;
   		$RsUser = $objDB->select($SQL);
		$ContactPerson=stripslashes($RsUser[0]['contact_name']);
    
	$headers = "From:".EMAIL_FROM."\r\n" .
	'X-Mailer: PHP/' . phpversion() . "\r\n" .
	"MIME-Version: 1.0\r\n" .
	"Content-Type: text/html; charset=utf-8\r\n" .
	"Content-Transfer-Encoding: 8bit\r\n\r\n";	
	
	$subject = "Welcome to workhab.com";
 	$Template_Variables=array
		(
			"URL"=>$HURL,
			"ContactPerson"=>$ContactPerson,
			"MemberID"=>$UserID,
			"UserName"=>$UserName,
			"Password"=>$Password,
 		);
		if($MailFrom=='admin'){
			$MailPath='../../';
		} else if($MailFrom=='crone'){
			$MailPath='../';
		} else {
			$MailPath='';
		}
		$f = fopen($MailPath."mailtemplate/welcome.html","r") or die("File Not Found...?");
		$HTMLBody = fread($f,filesize($MailPath."mailtemplate/welcome.html"));
		
		fclose($f);
		
		foreach($Template_Variables as $Find=>$ReplaceWith)
		{
			$HTMLBody = str_replace("{".$Find."}",$ReplaceWith,$HTMLBody);
		}
	 	$flag=PHPMailer($subject,$HTMLBody,EMAIL_FROM,'',$RsUser[0]['emailid'],'');
		 
	return $flag;
}
function SendNewMemberRegister($ArrMember){

   global $objDB;
   global $HURL;
global $HURLHTTP;
global $HURLS;
   $SendMailContent='';
   
   for($t=0;$t<count($ArrMember);$t++){
   		$SQL="SELECT * from members where member_id=".$ArrMember[$t];
		$rsMemberDetails= $objDB->select($SQL);
		
		$SendMailContent.='<tr>
							  <td class="commontext">'.($t+1).'</td>
							  <td  class="commontext">'.$rsMemberDetails[0]['contact_name'].'</td>
							  <td height="30" class="commontext">'.$rsMemberDetails[0]['emailid'].'</td>
							  <td height="30" class="commontext">'.$rsMemberDetails[0]['LicenseNo'].'</td>
						 </tr>';
   }
     
	
    
 	
    
	$headers = "From:".EMAIL_FROM."\r\n" .
	'X-Mailer: PHP/' . phpversion() . "\r\n" .
	"MIME-Version: 1.0\r\n" .
	"Content-Type: text/html; charset=utf-8\r\n" .
	"Content-Transfer-Encoding: 8bit\r\n\r\n";	
 	$subject = "New Evaluator at workhab.com";
 	$Body=file_get_contents("mailtemplate/evaluator_registration_notification.html");
	$Body=str_replace("{ContactDetails}",$SendMailContent,$Body);
 	$flag=PHPMailer($subject,$Body,EMAIL_FROM,'',EMAIL_TO,'');
  	return $flag;
}
function PHPMailer($Subject,$body,$From,$FromName,$To,$ToName,$cc){
	
	$mail  = new PHPMailer();

	$body             = eregi_replace("[\]",'',$body);

	//$mail->IsSMTP(); // telling the class to use SMTP
	//$mail->Host       = "mail.host-a-murder.com"; // SMTP server
	
	$mail->From       = $From;
	$mail->FromName   = $FromName;	
	
	$mail->Subject    = $Subject;
	
	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
	
	$mail->MsgHTML($body);
	
	$mail->AddAddress($To, $ToName);
	$mail->AddCC($cc,"");
	
	//$mail->AddAttachment("images/phpmailer.gif");             // attachment
	
	if(!$mail->Send()) {
	  return 0;
	} else {
	  return 1;
	}
}

function check_email_address($email) {
    if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
		return false;
	 }
    $email_array = explode("@", $email);
    $local_array = explode(".", $email_array[0]);
    for ($i = 0; $i < sizeof($local_array); $i++) {
	  if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) {
	  return false;
	 }
  	}
  if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
  $domain_array = explode(".", $email_array[1]);
	  if (sizeof($domain_array) < 2) {
		  return false; // Not enough parts to domain
	  }
	  for ($i = 0; $i < sizeof($domain_array); $i++) {
		  if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) {
			  return false;
		  }
	  }
  }
  return true;
  }
  
function rssxmlupdate($objDB){
    
	$SQL='select NewsDate from news  order by NewsDate DESC LIMIT 0,1';
	$rsRss = $objDB->select($SQL);
	
	//Tue, 18 Mar 2008 15:34:00 EDT
	$RssLast=date('D, d M Y',strtotime($rsRss[0]['NewsDate']));

	$SQL='select * from news order by NewsDate DESC';
	$rsRss = $objDB->select($SQL);
	
	//Tue, 18 Mar 2008 15:34:00 EDT
	//$RssLast=date('D, d M Y H:i:s T',strtotime($rsRss[0]['PostDate']));
	
	 
	
	$Item="";
	for($j=0;$j<count($rsRss);$j++){
		$Item.='<item>';
		$Item.='<title>'.$rsRss[$j]['NewsTitle'].'</title>'; 
		$Item.='<link>'.SERVER_ROOT.'index.php?p=news</link>'; 
		$Item.='<description>'.strip_tags($rsRss[$j]['NewsDescription']).'</description>'; 
		$Item.='<pubDate>'.date('D, d M Y ').'</pubDate>'; 
		$Item.='<guid>'.SERVER_ROOT.'index.php?p=news</guid>'; 
		//$Item.='<category>'.$rsRss[$j]['CategoryID'].'</category>';
		$Item.='</item>';
	}
	
		$Temp='<?xml version="1.0" encoding="ISO-8859-1" ?>';
		$Temp.='<?xml-stylesheet title="XSL_formatting" type="text/xsl"?>';
		$Temp.='<rss version="2.0">';
		$Temp.='<channel>';
		$Temp.='<title> </title>';
		$Temp.='<link>'.SERVER_ROOT.'</link>';
		$Temp.='<description> </description>';
		$Temp.='<language>en-us</language>';
		$Temp.='<copyright>Copyright 2008 by Business Listings Canada. All rights reserved.</copyright>';
		$Temp.='<pubDate>'.$RssLast.'</pubDate>';
		$Temp.='<lastBuildDate>'.$RssLast.'</lastBuildDate>';
		$Temp.='<managingEditor>ankit@clientdriveninnovation.com</managingEditor>';
		$Temp.='<category>Regional:North America:Canada:Business and Economy:Classifieds</category>';
		$Temp.='<image>';
			//$Temp.='<title>Businesses For Sale or Buy in Canada - Workhab International</title>';
			//$Temp.='<description>Classified Ads of businesses For Sale by Owner in Canada. Buy a profitable business. Sell your own Canadian company. Business opportunities.</description>';
			$Temp.='<url>'.SERVER_ROOT.'images/work-hab-mail-logo.jpg</url>';
			$Temp.='<link>'.SERVER_ROOT.'</link>';
			$Temp.='<width>306</width>';
			$Temp.='<height>86</height>';
		$Temp.='</image>';
		$Temp.=$Item;
		$Temp.='</channel>';
		$Temp.='</rss>';
		
		if (file_exists("../rss.xml")) {
			$handle = fopen("../rss.xml", "w");
			if ($handle) {
				fwrite($handle, $Temp);
				fclose($handle);
			}
		}else{
			echo "file can not be found";
		}
		return true;
}
function getUniqueCode($length = ""){
	$code = md5(uniqid(rand(), true));
	if ($length != ""){
		return substr($code, 0, $length);
	}else{ 
		return $code;
	}
}
function fetch_and_parse_page($url)
      {
          $html = file_get_contents($url);
          preg_match("/<title>(.+)<\/title>/siU", $html, $matches);
          $title = $matches[1];
          $re="<meta\s+name=['\"]??keywords['\"]??\s+content=['\"]??(.+)['\"]??\s*\/?>";
          preg_match("/$re/siU", $html, $matches);
          $keywords = $matches[1];
          $re="<meta\s+name=['\"]??description['\"]??\s+content=['\"]??(.+)['\"]??\s*\/?>";
          preg_match("/$re/siU", $html, $matches);
          $desc = $matches[1];
         $re="<img\s+src=['\"]??(.+)['\"]??\s*\/?>";
          preg_match("/$re/siU", $html, $matches);
          $imgs = $matches[1];
          $info = array(
              "title"       => $title,
              "keywords"    => $keywords,
              "description" => $desc,
          		"images" => $imgs
		  );    
          return($info);
      }
// GOOGLE GEOCODE FUNCTION
					
function geocodeGoogle($params){
	$key = KEY;   
	$location = strtolower(str_replace(' ','+',"{$params['address']}, {$params['city']}, {$params['state']}, {$params['zipcode']}"));

	$url = "http://maps.google.com/maps/geo?q={$location}&output=csv&key={$key}";

	$response = file_get_contents($url);

	$parts = explode(',',$response);

	return array('latitude' => $parts[2], 'longitude' => $parts[3]);


}

function checklogin(){
if(isset($_SESSION['UserName']) && ($_SESSION['AdminID']) == '')
{
header("Location:".$AbsoluteURL);
}
	function logincheck()
	{
		if(!isset($_SESSION['id']))
		{
			header("location:index.php?p=login");
		}
	
	}
}
/*function mail_attachment($filename, $path, $mailto, $from_mail, $from_name, $replyto, $subject, $message) {


    /*$file = $path;
    $file_size = filesize($file);
  
    $handle = fopen($file, "r");
 
 	$handle = fopen($file, 'rb');
	$content = '';
	while (!feof($handle)) {
		$content .= @fread($handle, 8192);
	}
	 fclose($fcontent);
	$file = $path.$filename;
    $file_size = filesize($file);
    $handle = fopen($file, "r");
    $content = fread($handle, $file_size);
    fclose($handle);
    
 	$content = chunk_split(base64_encode($content));
    $uid = md5(uniqid(time()));
    $name = basename($file);
    $header = "From: ".$from_name." <".$from_mail.">\r\n";
    $header .= "Reply-To: ".$replyto."\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
    $header .= "This is a multi-part message in MIME format.\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-type:text/html; charset=iso-8859-1\r\n";
    $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $header .= $message."\r\n\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n"; // use different content types here
    $header .= "Content-Transfer-Encoding: base64\r\n";
    $header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
    $header .= $content."\r\n\r\n";
    $header .= "--".$uid."--";
	$header;
	
    mail($mailto, $subject, "", $header);
   // mail("mukund@dswtpl.com", $subject, "hello", $header);
	
}*/
function escortadminLoginCheck(){
	if(!isset($_SESSION['DunkedAdminAdminID']) || ($_SESSION['DunkedAdminAdminID']) == ''){
		header("Location:".$AbsoluteURL."index.php?p=login");
	
	}	
}
function generate_image_thumbnail($source_image_path, $thumbnail_image_path ,$thumbnail_image_width,$thumbnail_image_height)
  {
  	//echo $source_image_path."-----".$thumbnail_image_path."-----".$thumbnail_image_width."-----".$thumbnail_image_height;
    list( $source_image_width, $source_image_height, $source_image_type ) = getimagesize( $source_image_path );
	//echo $source_image_type;
	//exit;
    switch ( $source_image_type )
    {
      case IMAGETYPE_GIF:
        $source_gd_image = imagecreatefromgif( $source_image_path );
        break;

      case IMAGETYPE_JPEG:
        $source_gd_image = imagecreatefromjpeg( $source_image_path );
        break;

      case IMAGETYPE_PNG:
        $source_gd_image = imagecreatefrompng( $source_image_path );
        break;
    }

    if ( $source_gd_image === false )
    {
      return false;
    }

    //$thumbnail_image_width = THUMBNAIL_IMAGE_MAX_WIDTH;
    //$thumbnail_image_height = THUMBNAIL_IMAGE_MAX_HEIGHT;

    $source_aspect_ratio = $source_image_width / $source_image_height;
    $thumbnail_aspect_ratio = $thumbnail_image_width / $thumbnail_image_height;
/* $thumbnail_image_width = $source_image_width;
      $thumbnail_image_height = $source_image_height;*/
    /*if ( $source_image_width <= $thumbnail_image_width && $source_image_height <= $thumbnail_image_height )
    {*/
     
    /*}
    elseif ( $thumbnail_aspect_ratio > $source_aspect_ratio )
    {
      $thumbnail_image_width = ( int ) ( $thumbnail_image_height * $source_aspect_ratio );
    }
    else
    {
      $thumbnail_image_height = ( int ) ( $thumbnail_image_width / $source_aspect_ratio );
    }*/

    $thumbnail_gd_image = imagecreatetruecolor( $thumbnail_image_width, $thumbnail_image_height );

    imagecopyresampled( $thumbnail_gd_image, $source_gd_image, 0, 0, 0, 0, $thumbnail_image_width, $thumbnail_image_height, $source_image_width, $source_image_height );

    imagejpeg( $thumbnail_gd_image, $thumbnail_image_path, 90 );

    imagedestroy( $source_gd_image );

    imagedestroy( $thumbnail_gd_image );

    return true;
  }
  
function seo_title($s) {
    $s = strtolower(trim($s));
    $s = str_replace(" ","-",$s);
    $s = preg_replace('![^a-z0-9-]!',"",$s);
    $s = preg_replace('!\-+!',"-",$s);
    return $s;
}

function insert_vtigercrm($FirstName,$LastName,$UserEmail,$Phone="")
{
  
  //$conn1 = mysql_connect("localhost","root","");
  //$db1 = mysql_select_db("propertycrm",$conn1);

  $conn1 = mysql_connect("localhost","emition_vtigecrm","vtigercrm1233#");
  $db1 = mysql_select_db("emition_vtigercrm",$conn1);

  $selsql = "Select * from vtiger_crmentity WHERE crmid = (Select max(crmid) FROM vtiger_crmentity)";
  $fetch_query = mysql_query($selsql,$conn1);
  $fetch_data = mysql_fetch_array($fetch_query);

  $selsql1 = "Select * from vtiger_contactdetails WHERE contactid = (Select max(contactid) FROM vtiger_contactdetails WHERE contact_no != '') ";
  $fetch_query1 = mysql_query($selsql1,$conn1);
  $fetch_data1 = mysql_fetch_array($fetch_query1);
  $constr = strlen($fetch_data1['contact_no']);
  $connum = substr($fetch_data1['contact_no'],3,$constr)+1; 
  
  $selsql2 = "Select * from vtiger_contactdetails WHERE email='".$UserEmail."'";
  $fetch_query2 = mysql_query($selsql2,$conn1);
  $emailexists = mysql_num_rows($fetch_query2);
  
  if($emailexists==0)
  {
	  $sql1 = "Insert vtiger_crmentity SET crmid = '".($fetch_data['crmid']+1)."', smcreatorid = 1, smownerid = 1 , modifiedby = 1, setype = 'Contacts' , createdtime = now(), modifiedtime = now()";
	  mysql_query($sql1,$conn1);
	  
	  $sql2 = "Insert vtiger_contactdetails set contactid = '".($fetch_data['crmid']+1)."', contact_no='REG".$connum."', firstname='".$FirstName."',lastname='".$LastName."',email='".$UserEmail."',phone='".$Phone."'";
	  mysql_query($sql2,$conn1);
	  
	  $sql3 = "UPDATE vtiger_crmentity_seq SET id = ".($fetch_data['crmid']+1);
	  mysql_query($sql3,$conn1);
  }
}

function getyoutubevidoid($url){ 
//echo "mamta"   ;die;
    $vid_id = "";
    $flag = false;
    if(isset($url) && !empty($url)){
        /*case1 and 2*/
        $parts = explode("?", $url);
        if(isset($parts) && !empty($parts) && is_array($parts) && count($parts)>1){
            $params = explode("&", $parts[1]);
            if(isset($params) && !empty($params) && is_array($params)){
                foreach($params as $param){
                    $kv = explode("=", $param);
                    if(isset($kv) && !empty($kv) && is_array($kv) && count($kv)>1){
                        if($kv[0]=='v'){
                            $vid_id = $kv[1];
                            $flag = true;
                            break;
                        }
                    }
                }
            }
        }       
       // echo $vid_id;die;
        if(!$flag){
            $needle = "youtu.be/";
            $pos = null;
            $pos = strpos($url, $needle);
            if ($pos !== false) {
                $start = $pos + strlen($needle);
                $vid_id = substr($url, $start, 11);
                $flag = true;
            }
        }
    }
    return $vid_id;
}

/*function fundapi($url, $data) { //echo $url;
	//echo '<pre>'; print_r($data); die;
			 $getapidetail = mysql_query("select Fund_America_API_Secret from app_setting");
			 $getapidetails = mysql_fetch_array($getapidetail); //echo 'manav	<pre>'; print_r($getapidetails['fa_api_url']);
			
				$ch = curl_init(); 
				curl_setopt($ch, CURLOPT_URL, "https://sandbox.fundamerica.com/api/".$url);
				
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
				curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6");  
				curl_setopt($ch, CURLOPT_USERPWD, $getapidetails['Fund_America_API_Secret']);
				curl_setopt($ch, CURLOPT_HEADER, 'Accept: application/json');
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				$output = curl_exec($ch);
				
				var_dump($output); 
				curl_close($ch);
				$obj = json_decode($output);
				
	return $obj;
}

//--update
function fundapiupdate($url, $data) { //echo $url;
	//echo '<pre>'; print_r($data); die;
			$getapidetail = mysql_query("select * from fund_api where id = '1'");
			$getapidetails = mysql_fetch_array($getapidetail); //echo 'manav	<pre>'; print_r($getapidetails['fa_api_url']);

				$ch = curl_init(); 
				curl_setopt($ch, CURLOPT_URL, $getapidetails['fa_api_url']."/".$url);
				
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
				curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6");  
				curl_setopt($ch, CURLOPT_USERPWD, "e_CdE6BtTcuqF2lAIqSEKa6vzl39U_EN:");
				curl_setopt($ch, CURLOPT_HEADER, 'Accept: application/json');
				//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
				
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				$output = curl_exec($ch);
				var_dump($output); 
				curl_close($ch);
				$obj = json_decode($output);
	return $obj;
}
//api code---------
*/

//api code---------
//--add
function fundapi($url, $data,$method) 
				{ 	
					//echo "<pre>"; print_r($data);die('test');
					$fundkey=mysql_query("select Fund_America_API_Secret from app_setting"); 
					$fund_api= mysql_fetch_array($fundkey); 
					$getapidetails='https://sandbox.fundamerica.com/api';
					$ch = curl_init(); 
					curl_setopt($ch, CURLOPT_URL, $getapidetails."/".$url);
					//echo $getapidetails."/".$url;
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
					curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6");  
					curl_setopt($ch, CURLOPT_USERPWD, $fund_api['Fund_America_API_Secret']);     //"16k1WIE2edkXa_9zGn0hB7xVh3MpSmqH");
					curl_setopt($ch, CURLOPT_HEADER, 'Accept: application/json');
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					if($method=='petch')
					{	
						curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');//patch is only use in electronic signature api and enable escrow payment
					}
					if($method=='post')
					{	
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
					}
					if($method=='eletronic')
					{	
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
						curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');//patch is only use in electronic signature api and enable escrow payment
					}
					$output = curl_exec($ch);
					//var_dump($output); 
					curl_close($ch);
					$obj = json_decode($output);
					return $obj;
					
				}

//--update
function fundapiupdate($url, $data,$method) { //echo $url;
	
				
				$fresult = fundapi($url, $data,$method);  
				$udata = array('status'=>'received');
				//echo "<pre>"; print_r($fresult); die("firstend");
				$fundkey=mysql_query("select Fund_America_API_Secret from app_setting");
				$fund_api= mysql_fetch_array($fundkey);   //echo 'manav	<pre>'; print_r($getapidetails['fa_api_url']);
				$getapidetails = "https://sandbox.fundamerica.com/api/test_mode/investments";
				$ch = curl_init(); 
				curl_setopt($ch, CURLOPT_URL, $getapidetails."/".$fresult->id);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
				curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6");  
				curl_setopt($ch, CURLOPT_USERPWD, $fund_api['Fund_America_API_Secret']);
				curl_setopt($ch, CURLOPT_HEADER, 'Accept: application/json');
				//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
				
				curl_setopt($ch, CURLOPT_POSTFIELDS, $udata);
				$output = curl_exec($ch);
				var_dump($output); 
				curl_close($ch);
				$obj = json_decode($output);
				//echo "<pre>"; print_r($obj); die("secondend");
				return $obj;
}
//api code---------
  
 ?>