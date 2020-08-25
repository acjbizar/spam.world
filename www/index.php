<?php

switch($_SERVER['REQUEST_METHOD']):
case 'GET':

	$p = new Page;
	$p->parse();

break;
case 'POST':

	$to = 'spam.world@acjs.net';
	$subject = 'Spam World Order';
	$message = isset($_POST) ? print_r($_POST, TRUE) : '';
	$from = isset($_POST['email']) ? $_POST['email'] : time() . '@acjs.net';
	$headers = 'From: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion();

	mail($to, $subject, $message, $headers);

	unset($_POST);

	// ACJ 2016-01-25: Switched to HTTPS.
	header('Location: https://spam.world/');

break;
endswitch;

// ACJ 2015-01-14: http://www.iab.net/guidelines/508676/508767/displayguidelines
$sizes = array(
    // Anuversal Ad Package.
    0 => array(0 => 300, 1 => 250),
	1 => array(0 => 180, 1 => 150),
	2 => array(0 => 160, 1 => 600),
	3 => array(0 => 728, 1 => 90),
    // Other Ad Units.
	4 => array(0 => 970, 1 => 90),
	5 => array(0 => 300, 1 => 600),
	6 => array(0 => 120, 1 => 60),
	7 => array(0 => 88, 1 => 31),
);

// ACJ 2015-01-14
class Page
{
	// ACJ 2015-01-14
	// ACJ 2015-01-15: Added OpenGraph.
	// ACJ 2015-01-21: Added Google AdSense.
	// ACJ 2015-05-06: Disabled header, and added body, head, and html tags; added order form.
	// ACJ 2015-09-05: Various small markup changes.
	// ACJ 2015-09-07: Replaced random products by product list.
	// ACJ 2015-09-22: Added Google Analytics.
	// ACJ 2016-01-25: Switched to HTTPS; small changes; switched from Mimesia to Cloudflare CDN for Packery; added dimensions to OpenGraph image.
	public function __toString()
	{
		$r = '<!DOCTYPE html>';
		$r .= '<html dir=ltr itemscope itemtype=http://schema.org/WebPage lang=en>';
		$r .= '<head>';
		$r .= '<meta charset=utf-8>';
		$r .= '<meta name=description property="og:description" content="Website + domain title, 2015. Ad space for sale.">';
		$r .= '<meta property="fb:admins" content="509248955">';
		$r .= '<meta property="og:image" content="https://spam.world/images/youradhere.png">';
		$r .= '<meta property="og:image:width" content="338">';
		$r .= '<meta property="og:image:height" content="282">';
		$r .= '<meta property="og:title" content="Spam World">';
		$r .= '<meta property="og:type" content="website">';
		$r .= '<meta property="og:url" content="https://spam.world/">';
		$r .= '<meta name=viewport content="initial-scale=1.0,width=device-width">';
		$r .= '<title>Spam World</title>';
		$r .= '<link rel=author href=//alexanderchristiaanjacob.com/>';
		$r .= '<link rel=canonical href=https://spam.world/>';
		$r .= '<link rel=stylesheet href=https://spam.world/style.css>';
		$r .= '<script src=//use.typekit.net/sat2nhh.js></script>';
		$r .= '<script>try{Typekit.load();}catch(e){}</script>';
		$r .= '<script src="https://cdnjs.cloudflare.com/ajax/libs/packery/1.4.3/packery.pkgd.min.js"></script>';
		$r .= '<script src=https://spam.world/script.js></script>';
		$r .= build_analytics();
		$r .= '</head>';
		$r .= '<body id=top>';
		$r .= '<main id=content>';
		$r .= build_adsense_large_skyscraper();
		$r .= build_adsense_large_rectangle();
		$r .= build_adsense_leaderboard();
		$r .= build_product_list();
		$r .= '</main>';
		$r .= build_order_form();
		$r .= '</body>';
		$r .= '</html>';
		
		return $r;
	}
	
	// ACJ 2015-01-14
	public function parse()
	{
		echo $this;
	}
}

// ACJ 2015-01-14
// ACJ 2015-01-21: Changed element from DIV to A.
// ACJ 2015-05-06: Changed order to #order.
// ACJ 2015-09-05: Added id.
function build_ad($id = 0)
{
	return '<a class="a a' . mt_rand(1, 19) . ' futura" href="#order" id=' . $id . ' itemscope itemtype=https://schema.org/Product>Your Ad Here</a>';
}

// ACJ 2015-01-21
function build_adsense_large_mobile_banner()
{
	return <<<HTML
<div class="a a20">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Spam World Large Mobile Banner -->
<ins class="adsbygoogle"
     style="display:inline-block;width:320px;height:100px"
     data-ad-client="ca-pub-7805037726977709"
     data-ad-slot="4143013945"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
HTML;
}

// ACJ 2015-01-21
function build_adsense_large_rectangle()
{
	return <<<HTML
<div class="a a11">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Spam World Large Rectangle -->
<ins class="adsbygoogle"
     style="display:inline-block;width:336px;height:280px"
     data-ad-client="ca-pub-7805037726977709"
     data-ad-slot="2666280748"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
HTML;
}

// ACJ 2015-01-21
function build_adsense_large_skyscraper()
{
	return <<<HTML
<div class="a a6">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Spam World Large Skyscraper -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:600px"
     data-ad-client="ca-pub-7805037726977709"
     data-ad-slot="7096480340"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
HTML;
}

// ACJ 2015-01-21
function build_adsense_leaderboard()
{
	return <<<HTML
<div class="a a4">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Spam World Leaderboard -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-7805037726977709"
     data-ad-slot="1189547549"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
HTML;
}

// ACJ 2015-09-22
function build_analytics()
{
	return <<<HTML
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-6227584-61', 'auto');
  ga('send', 'pageview');

</script>
HTML;
}

// ACJ 2015-05-06
// ACJ 2015-09-04: Added section.
// ACJ 2015-09-07: Added description.
// ACJ 2016-01-25: Switched to HTTPS.
function build_order_form()
{
    $r = '<div class=shade><section id=order>';
	$r .= '<header><h2 class=futura>Spam World Order</h2><a class=close href="#">❌</a></header>';
	$r .= '<div class=description>Use this form to reserve slot ($1/month).</div>';
	$r .= '<form action=https://spam.world/ method=post>';
	$r .= '<input id=id name=id type=hidden value=0>';
	$r .= '<div><label><input name=name placeholder=Name></label></div>';
	$r .= '<div><label><input name=email placeholder=E-mail required type=email></label></div>';
	$r .= '<div><textarea cols=48 name=message placeholder=Message rows=4></textarea></div>';
	$r .= '<div class=actions><button type=submit>Submit Request</button></div>';
	$r .= '</form>';
	$r .= '</section></div>';
	
	return $r;
}

// ACJ 2015-09-07
function build_product_list()
{
	$db = db();
	
	$q = 'SELECT `id`, `au` FROM `ad` WHERE `deleted` IS NULL LIMIT 999;';
	
	$rows = $db->query($q) or die($db->error);
	
	if($rows->num_rows > 0)
	{
		$r = '';
		
		while($row = $rows->fetch_object())
		{
			$r .= '<a class="a a' . $row->au . ' futura" href="#order" id=' . $row->id . ' itemscope itemtype=https://schema.org/Product>Your Ad Here</a>';
		}
		
		$rows->close();
				
		return $r;
	}
	
	return FALSE;
}

// ACJ 2015-09-07
// ACJ 2016-01-25: Added static mechanism; small changes.
function db()
{
	static $db;
	
	if(!$db)
	{
		$config = parse_ini_file(dirname(__DIR__) . '/config.ini');

		$db = new mysqli(
			'db.acjs.net',
			$config['database_username'],
			$config['database_password'],
			'acjs');

		$db->query('SET NAMES \'utf8\';');
	}
	
	return $db;
}


?>