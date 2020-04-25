<?php 
require_once 'libs/core.inc.php';

/*
$hebrew = new QLM_Language();


$aleph = QLM::createChar('aleph', '05D0', 'א', "Ox", 11, 1);
$beth = QLM::createChar('beth', '05D1', QLM::htmlchar('05D1'), "House", 12, 2);
var_dump2($aleph);
var_dump2($beth);
*/

$hebrewQLM = new QLM_language();
$hebrewQLM->import(new QLM_Symbol());

/*
'aleph', '05D0', QLM::chr('05D0'), "Ox", 11, 1)
'beth', '05D1', QLM::chr('05D1'), "House", 12, 2)
'gimel', '05D2', "Camel", 13, 3)
'daleth', '05D3', "Door", 14, 4)
'heh', '05D4', "House", 15, 5)
'vau', '05D5', "Nail", 16, 6)
'zayin', '05D6', "Sword", 17, 7)
*/

// '05D7',		// cheth
// '05D8',		// teth
// '05D9',		// yod
// '05DA',		// kaph sofit (11)
// '05DB',		// kaph
// '05DC',		// lamed
// '05DD',		// mem sofit (13)
// '05DE',		// mem
// '05DF',		// nun sofit (14)
// '05E0',		// nun
// '05E1',		// samekh
// '05E2',		// ayin
// '05E3',		// peh sofit (17)
// '05E4',		// peh
// '05E5',		// tzaddi sofit (18)
// '05E6',		// tzaddi
// '05E7',		// qoph
// '05E8',		// resh
// '05E9',		// shin
// '05EA'		//tau

var_dump2($hebrewQLM);

echo $docHead;

$arabic = array(
    '0623',    // ʾalif
    '0628',    // bāʾ
    '062A',    // tāʾ
    '062B',    // ṯāʾ
    '062C',    // ǧīm
    '062D',    // ḥāʾ
    '062E',    // ḫāʾ
    '062F',    // dāl
    '0630',    // ḏāl
    '0631',    // rāʾ
    '0632',    // zayn/zāy
    '0633',    // sīn
    '0634',    // šīn
    '0635',    // ṣād
    '0636',    // ḍād
    '0637',    // ṭāʾ
    '0638',    // ẓāʾ
    '0639',    // ʿayn
    '063A',    // ġayn
    '0641',    // fāʾ
    '0642',    // qāf
    '0643',    // kāf
    '0644',    // lām
    '0645',    // mīm
    '0646',    // nūn
    '0647',    // hāʾ
    '0648',    // wāw
    '064A',    // yāʾ
    '0622',    // ʾalif maddah
    '0629',    // Tāʾ marbūṭah
    '0649'     // ʾalif maqṣūrah
);


$hebrew = array(
    '05D0',		// alef
	'05D1',		// beth
	'05D2',		// gimel
	'05D3',		// daleth
	'05D4',		// heh
	'05D5',		// vau
	'05D6',		// zayin
	'05D7',		// cheth
	'05D8',		// teth
	'05D9',		// yod
	'05DA',		// kaph sofit (11)
	'05DB',		// kaph
	'05DC',		// lamed
	'05DD',		// mem sofit (13)
	'05DE',		// mem
	'05DF',		// nun sofit (14)
	'05E0',		// nun
	'05E1',		// samekh
	'05E2',		// ayin
	'05E3',		// peh sofit (17)
	'05E4',		// peh
	'05E5',		// tzaddi sofit (18)
	'05E6',		// tzaddi
	'05E7',		// qoph
	'05E8',		// resh
	'05E9',		// shin
	'05EA'		//tau
);

$zodiac = array(
	'2648',	//{abbr:'AR', name:'Aries'       
	'2649', //,{abbr:'TA', name:'Taurus'
	'264A',	//,{abbr:'GE', name:'Gemini'     
	'264B', //,{abbr:'CA', name:'Cancer'    
	'264C',	//{abbr:'LE', name:'Leo'        
	'264D',	//,{abbr:'VI', name:'Virgo'      
	'264E',	//,{abbr:'LI', name:'Libra'      
	'264F',	//,{abbr:'SC', name:'Scorpio'    
	'2650',	//,{abbr:'SA', name:'Sagittarius'
	'2651',	//,{abbr:'CA', name:'Capricorn'  
	'2652',	//,{abbr:'AQ', name:'Aquarius'   
	'2653'	//,{abbr:'PI', name:'Pisces'     
);

$planets = array(
		'2609',	// {abbr:'SU', name:'Sun'
		'263D', // ,{abbr:'MO', name:'Moon'
		'263F', // ,{abbr:'ME', name:'Mercury'
		'2640', // ,{abbr:'VE', name:'Venus'
		'2642', // ,{abbr:'MA', name:'Mars'
		'2643', // ,{abbr:'JU', name:'Jupiter'
		'2644', // ,{abbr:'SA', name:'Saturn'
		'2645', // ,{abbr:'UR', name:'Uranus'
		'2646', // ,{abbr:'NE', name:'Neptune'
		'2647',	// ,{abbr:'PL', name:'Pluto'
);

$occult = array(
		'2624',	// Caduceus of Hermes
		'260A',	// Ascending Node
		'260B',	// Descending Node
		'260C',	// Conjunction - Symbol for Day
		'260D',	// Opposition
		'2625', // Ankh
		'262F',	// Yin Yang
		'2638',	// Wheel of Dharma
		'2695',	// Staff Aesculapius
		'269A', // Staff of Hermes
		'26AD'	// Infinity
);


// $zodiac = array(
// 		{abbr:'AR', name:'Aries'      ',2648;'
// 		,{abbr:'TA', name:'Taurus'     , char:'&#x2649;'}
// 		,{abbr:'GE', name:'Gemini'     , char:'&#x264A;'}
// 		,{abbr:'CA', name:'Cancer'     , char:'&#x264B;'}
// 		,{abbr:'LE', name:'Leo'        , char:'&#x264C;'}
// 		,{abbr:'VI', name:'Virgo'      , char:'&#x264D;'}
// 		,{abbr:'LI', name:'Libra'      , char:'&#x264E;'}
// 		,{abbr:'SC', name:'Scorpio'    , char:'&#x264F;'}
// 		,{abbr:'SA', name:'Sagittarius', char:'&#x2650;'}
// 		,{abbr:'CA', name:'Capricorn'  , char:'&#x2651;'}
// 		,{abbr:'AQ', name:'Aquarius'   , char:'&#x2652;'}
// 		,{abbr:'PI', name:'Pisces'     , char:'&#x2653;'}
// );



echo "<div class=\"noteBox\">";

foreach ($hebrew as $letter)
{
    echo html_entity_decode("&#x". $letter. ";", ENT_HTML5, "UTF-8"). " ";
}

echo "<br />";

foreach ($arabic as $letter)
{
	echo html_entity_decode("&#x". $letter. ";", ENT_HTML5, "UTF-8"). " ";
}

echo "<br />";

foreach ($zodiac as $sign)
{
	echo QLM::chr($sign). " ";
}

echo "<br />";

foreach ($planets as $sign)
{
	QLM::wecho(QLM::chr($sign));
}

echo "<br />";

foreach ($occult as $sign)
{
	QLM::wecho(QLM::chr($sign));
}

echo "<br />";


echo "</div>";

?>
<script src="libs/alpha.js" type="text/javascript"></script>

<div id="secretOutput"></div>


<script>
/*
	HebChars.forEach(printArray);
	Signs.forEach(printArray);
*/

	$("#secretOutput").append("Testing: " + Planets[0]["char"]);
	
</script>

<?php 
echo $docFoot;
?>
