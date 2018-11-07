<?php
	
	 /**
     * Cms detector
     * Author: Damian972
     * Description: A simple cms detector :D
     * Version: 1.0
     * Usage: php cms-detector.php -f list.txt
	 * Php version : 7.2
	 * Dependencie : Zebra_Curl
     */

	ini_set('memory_limit', '800M'); // Set ram limit
    require('vendor/autoload.php');
	
	define('ROOT', __DIR__);
    define('RESULTS_FOLDER', ROOT.DIRECTORY_SEPARATOR.'results'.DIRECTORY_SEPARATOR);

    $cms_list[0] = [
		'name' => 'Wordpress',
		'meta_tag' => array('wordpress', 'is_regex' => false),
		'link_tag' => array('wp-content/', 'is_regex' => false),
		'img_tag' => 'wp-content/',
		'script_tag' => array('wp-content/', 'is_attribute' => true)
	];
		
	$cms_list[1] = [
		'name' => 'Drupal',
		'header' => array(['x-generator', 'drupal', 'is_regex' => false]),
		'meta_tag' => array('drupal', 'is_regex' => false),
	];
		
	$cms_list[2] = [
		'name' => 'Joomla',
		'header' => array(['x-generator', 'joomla', 'is_regex' => false], ['x-content-encoded-by', 'joomla', 'is_regex' => false]),
		'meta_tag' => array('joomla', 'is_regex' => false),
	];
		
	$cms_list[3] = [
		'name' => 'Magento',
		'script_tag' => array('Mage.Cookies.path', 'is_attribute' => false)
	];
		
	$cms_list[4] = [
		'name' => 'Webnode',
		'meta_tag' => array('webnode', 'is_regex' => false)
	];
		
	$cms_list[5] = [
		'name' => 'Shopsys',
		'meta_tag' => array('shopsys', 'is_regex' => false)
	];
		
	$cms_list[6] = [
		'name' => 'Shoptet',
		'meta_tag' => array('safarimedia', 'is_regex' => false)
	];
		
	$cms_list[7] = [
		'name' => 'vBulletin',
		'meta_tag' => array('vbulletin', 'is_regex' => false),
		'script_tag' => array('vBulletin_init();', 'is_attribute' => false)
	];
		
	$cms_list[8] = [
		'name' => 'Liferay',
		'script_tag' => array('var Liferay = {', 'is_attribute' => false)
	];
		
	$cms_list[9] = [
		'name' => 'A-Blog Cms',
		'meta_tag' => array('a-blog cms', 'is_regex' => false)
	];
		
	$cms_list[10] = [
		'name' => 'AVE cms',
		'meta_tag' => array('ave.cms', 'is_regex' => false)
	];
		
	$cms_list[11] = [
		'name' => 'Adobe Dreamweaver',
		'body_tag' => array('InstanceBegin template', 'is_regex' => false)
	];
		
	$cms_list[12] = [
		'name' => 'Adobe GoLive',
		'meta_tag' => array('adobe golive', 'is_regex' => false)
	];
		
	$cms_list[13] = [
		'name' => 'Adobe Muse',
		'meta_tag' => array('^[0-9]{4}.([0-9]+).([0-9]+).([0-9]+)$', 'is_regex' => true)
	];
		
	$cms_list[14] = [
		'name' => 'Advantshop',
		'meta_tag' => array('advantshop.net', 'is_regex' => false)
	];
		
	$cms_list[15] = [
		'name' => 'Agility CMS',
		'meta_tag' => array('agility cms', 'is_regex' => false)
	];
		
	$cms_list[16] = [
		'name' => 'Alterian',
		'meta_tag' => array('alterian', 'is_regex' => false)
	];
		
	$cms_list[17] = [
		'name' => 'Amiro.CMS',
		'meta_tag' => array('amiro.cms', 'is_regex' => false)
	];
		
	$cms_list[18] = [
		'name' => 'Apache Lenya',
		'meta_tag' => array('lenya', 'is_regex' => false)
	];
		
	$cms_list[19] = [
		'name' => 'ASP.NET',
		'header' => array(['x-powered-by', 'asp.net', 'is_regex' => false])
	];
		
	$cms_list[20] = [
		'name' => 'Backdrop CMS',
		'meta_tag' => array('backdrop cms', 'is_regex' => false)
	];
		
	$cms_list[21] = [
		'name' => 'BaseKit',
		'meta_tag' => array('basekit', 'is_regex' => false)
	];
		
	$cms_list[22] = [
		'name' => 'Big Cartel',
		'meta_tag' => array('big cartel', 'is_regex' => false)
	];
		
	$cms_list[23] = [
		'name' => 'Bigace',
		'meta_tag' => array('bigace', 'is_regex' => false)
	];
		
	$cms_list[24] = [
		'name' => 'Blogger',
		'meta_tag' => array('blogger', 'is_regex' => false)
	];
		
	$cms_list[25] = [
		'name' => 'Bolt',
		'meta_tag' => array('bolt', 'is_regex' => false)
	];
		
	$cms_list[26] = [
		'name' => 'Bootply',
		'meta_tag' => array('bootply', 'is_regex' => false)
	];
		
	$cms_list[27] = [
		'name' => 'Bricolage CMS',
		'meta_tag' => array('bricolage', 'is_regex' => false)
	];
		
	$cms_list[28] = [
		'name' => 'C1 CMS',
		'meta_tag' => array('c1 cms', 'is_regex' => false)
	];
		
	$cms_list[29] = [
		'name' => 'CM4all',
		'meta_tag' => array('cm4all', 'is_regex' => false)
	];
		
	$cms_list[30] = [
		'name' => 'CMS-Tool',
		'meta_tag' => array('cms tool', 'is_regex' => false)
	];
		
	$cms_list[31] = [
		'name' => 'CMS Made Simple',
		'meta_tag' => array('cms made simple', 'is_regex' => false)
	];
		
	$cms_list[32] = [
		'name' => 'CMSimple',
		'meta_tag' => array('cmsimple', 'is_regex' => false)
	];
		
	$cms_list[33] = [
		'name' => 'CMSimple_XH',
		'meta_tag' => array('cmsimple_xh', 'is_regex' => false)
	];
		
	$cms_list[34] = [
		'name' => 'CanalBlog',
		'meta_tag' => array('canalblog', 'is_regex' => false)
	];
		
	$cms_list[35] = [
		'name' => 'Cargo',
		'body_tag' => array('cargocollective', 'is_regex' => false)
	];
		
	$cms_list[36] = [
		'name' => 'Centricity',
		'img_tag' => 'centricity'
	];
		
	$cms_list[37] = [
		'name' => 'Chevereto',
		'meta_tag' => array('chevereto', 'is_regex' => false)
	];
		
	$cms_list[38] = [
		'name' => 'Ciashop',
		'link_tag' => array('cia_', 'is_regex' => false),
		'script_tag' => array('ciashop.js', 'is_attribute' => true)
	];
		
	$cms_list[39] = [
		'name' => 'CivicEngage',
		'script_tag' => array('analytics.civicplus.com', 'is_attribute' => false)
	];
		
	$cms_list[40] = [
		'name' => 'CoffeeCup',
		'meta_tag' => array('coffeecup', 'is_regex' => false)
	];
		
	$cms_list[41] = [
		'name' => 'CommonSpot',
		'meta_tag' => array('commonspot', 'is_regex' => false)
	];
		
	$cms_list[42] = [
		'name' => 'Contao',
		'meta_tag' => array('contao', 'is_regex' => false)
	];
		
	$cms_list[43] = [
		'name' => 'Contenido CMS',
		'meta_tag' => array('cms contenido', 'is_regex' => false)
	];
		
	$cms_list[44] = [
		'name' => 'Contensis CMS',
		'meta_tag' => array('contensis cms', 'is_regex' => false)
	];
		
	$cms_list[45] = [
		'name' => 'ContentXXL',
		'meta_tag' => array('contentxxl', 'is_regex' => false)
	];
		
	$cms_list[46] = [
		'name' => 'Convio',
		'meta_tag' => array('convio cms', 'is_regex' => false)
	];
		
	$cms_list[47] = [
		'name' => 'Coppermine',
		'body_tag' => array('coppermine-gallery.net', 'is_regex' => false)
	];
		
	$cms_list[48] = [
		'name' => 'CoreMedia CMS',
		'meta_tag' => array('coremedia', 'is_regex' => false)
	];
		
	$cms_list[49] = [
		'name' => 'Corepublish',
		'meta_tag' => array('corepublish', 'is_regex' => false)
	];
		
	$cms_list[50] = [
		'name' => ' Crowd Fusion',
		'meta_tag' => array('crowd', 'is_regex' => false)
	];
		
	$cms_list[51] = [
		'name' => 'CubeCart',
		'meta_tag' => array('cubecart', 'is_regex' => false)
	];
		
	$cms_list[52] = [
		'name' => 'DIAFAN.CMS',
		'meta_tag' => array('diafan', 'is_regex' => false)
	];
		
	$cms_list[53] = [
		'name' => 'DNN',
		'meta_tag' => array('dotnetnuke', 'is_regex' => false)
	];
		
	$cms_list[54] = [
		'name' => 'Danneo',
		'header' => array(['x-powered-by', 'cms danneo', 'is_regex' => false]),
		'meta_tag' => array('cms danneo', 'is_regex' => false),
	];
		
	$cms_list[55] = [
		'name' => 'DataLife Engine',
		'meta_tag' => array('dataLife engine', 'is_regex' => false)
	];
		
	$cms_list[56] = [
		'name' => 'Dealer.com',
		'link_tag' => array('static.dealer.com', 'is_regex' => false),
		//'body_tag' => array('^la1websol-cms([0-9]+).dealer.ddc p([0-9]+)$', 'is_regex' => false)
	];
		
	$cms_list[57] = [
		'name' => 'DealerFire',
		'script_tag' => array('window.dealerfireExtensionSettings', 'is_attribute' => false)
	];
		
	$cms_list[58] = [
		'name' => 'Demandware',
		'link_tag' => array('/demandware.static', 'is_regex' => false)
	];
		
	$cms_list[59] = [
		'name' => 'Dim Works',
		'meta_tag' => array('dim works', 'is_regex' => false),
		'body_tag' => array('Powered by: Dim Works CMS', 'is_regex' => false)
	];
		
	$cms_list[60] = [
		'name' => ' Discourse',
		'meta_tag' => array('discourse', 'is_regex' => false)
	];
		
	$cms_list[61] = [
		'name' => 'Hycus',
		'meta_tag' => array('hycus', 'is_regex' => false),
	];
		
	$cms_list[62] = [
		'name' => 'Discuz!',
		'meta_tag' => array('discuz', 'is_regex' => false),
		'body_tag' => array('discuz_uid = \'', 'is_regex' => false)
	];
		
	$cms_list[63] = [
		'name' => 'DokuWiki',
		'meta_tag' => array('dokuwiki', 'is_regex' => false)
	];
		
	$cms_list[64] = [
		'name' => 'DotClear',
		'link_tag' => array('dotclear/', 'is_regex' => false)
	];
		
	$cms_list[65] = [
		'name' => 'DotEasy',
		'meta_tag' => array('doteasy', 'is_regex' => false)
	];
		
	$cms_list[66] = [
		'name' => 'LiteCart',
		'header' => array(['x-powered-by', 'litecart', 'is_regex' => false])
	];
		
	$cms_list[67] = [
		'name' => 'DreamCommerce',
		'script_tag' => array('//cdn.dcsaas.net/', 'is_attribute' => true)
	];
		
	$cms_list[68] = [
		'name' => 'Duda',
		'meta_tag' => array('duda', 'is_regex' => false)
	];
		
	$cms_list[69] = [
		'name' => 'Dynamicweb',
		'meta_tag' => array('dynamicweb', 'is_regex' => false)
	];
		
	$cms_list[70] = [
		'name' => 'E+ CMS',
		'meta_tag' => array('e-plus', 'is_regex' => false)
	];
		
	$cms_list[71] = [
		'name' => 'E-monsite',
		'meta_tag' => array('e-monsite', 'is_regex' => false)
	];
		
	$cms_list[72] = [
		'name' => 'ECShop',
		'meta_tag' => array('ecshop', 'is_regex' => false)
	];
		
	$cms_list[73] = [
		'name' => 'Easysite',
		'meta_tag' => array('ideagen', 'is_regex' => false)
	];
		
	$cms_list[74] = [
		'name' => 'EditPlus',
		'meta_tag' => array('editplus', 'is_regex' => false)
	];
		
	$cms_list[75] = [
		'name' => 'Edito',
		'meta_tag' => array('edito', 'is_regex' => false)
	];
		
	$cms_list[76] = [
		'name' => 'Enonic CMS',
		'meta_tag' => array('enonic', 'is_regex' => false)
	];
		
	$cms_list[77] = [
		'name' => 'Episerver',
		'meta_tag' => array('episerver', 'is_regex' => false)
	];
		
	$cms_list[78] = [
		'name' => 'Everweb',
		'meta_tag' => array('everweb', 'is_regex' => false)
	];
		
	$cms_list[79] = [
		'name' => 'Fork CMS',
		'meta_tag' => array('fork cms', 'is_regex' => false)
	];
		
	$cms_list[80] = [
		'name' => 'Zeta Producer',
		'meta_tag' => array('zeta producer', 'is_regex' => false)
	];

	$cms_list[81] = [
		'name' => 'Flarum',
		'script_tag' => array('flarum', 'is_attribute' => false)
	];
		
	$cms_list[82] = [
		'name' => 'Format',
		'link_tag' => array('.format.com/static/', 'is_regex' => false),
		'script_tag' => array('.format.com/static/', 'is_attribute' => true)
	];
		
	$cms_list[83] = [
		'name' => 'FrontPage',
		'meta_tag' => array('microsoft frontpage', 'is_regex' => false)
	];
		
	$cms_list[84] = [
		'name' => 'GX Web Manager',
		'meta_tag' => array('gx webmanager', 'is_regex' => false),
	];
		
	$cms_list[85] = [
		'name' => 'Geeklog',
		'script_tag' => array('geeklogEditorBaseUrl', 'is_attribute' => false),
		'body_tag' => array('Powered by <a href="http://www.geeklog.net/">Geeklog</a>', 'is_regex' => false)
	];
		
	$cms_list[86] = [
		'name' => 'GetSimple CMS',
		'meta_tag' => array('getsimple', 'is_regex' => false)
	];
		
	$cms_list[87] = [
		'name' => 'Ghost',
		'meta_tag' => array('ghost', 'is_regex' => false),
		'link_tag' => array('ghost/', 'is_regex' => false),
		'script_tag' => array('ghost-sdk', 'is_attribute' => true),
		'body_tag' => array('ghost.init({', 'is_regex' => false)
	];
		
	$cms_list[88] = [
		'name' => 'GoDaddy Website Builder',
		'meta_tag' => array('Starfield Technologies; Go Daddy Website Builder', 'is_regex' => false)
	];
		
	$cms_list[89] = [
		'name' => 'Google Sites',
		'link_tag' => array('http://www.gstatic.com/sites/p/d3dcac/system/app/themes/', 'is_regex' => false),
		'script_tag' => array('sites-chrome-main', 'is_attribute' => false),
		'body_tag' => array('<a class="sites-system-link" href="http', 'is_regex' => false)
	];
		
	$cms_list[90] = [
		'name' => 'Government Site Builder',
		'meta_tag' => array('government site builder', 'is_regex' => false)
	];
		
	$cms_list[91] = [
		'name' => 'GraffitiCMS',
		'meta_tag' => array('graffiti cms', 'is_regex' => false)
	];
		
	$cms_list[92] = [
		'name' => 'Grav CMS',
		'meta_tag' => array('gravcms', 'is_regex' => false)
	];
		
	$cms_list[93] = [
		'name' => 'Hexo',
		'body_tag' => array('//hexo.io/" target="_blank"', 'is_regex' => false)
	];
		
	$cms_list[94] = [
		'name' => 'Homes.com Fusion',
		'body_tag' => array('//hcimages.static-homes.com/AccountData/', 'is_regex' => false)
	];
		
	$cms_list[95] = [
		'name' => 'Homestead',
		'meta_tag' => array('homestead sitebuilder', 'is_regex' => false)
	];
		
	$cms_list[96] = [
		'name' => 'HostCMS',
		'header' => array(['x-powered-by', 'hostcms', 'is_regex' => false])
	];
		
	$cms_list[97] = [
		'name' => 'HostedShop',
		'meta_tag' => array('hostedshop', 'is_regex' => false)
	];
		
	$cms_list[98] = [
		'name' => 'HubSpot',
		'meta_tag' => array('hubspot', 'is_regex' => false)
	];
		
	$cms_list[99] = [
		'name' => 'Hugo',
		'meta_tag' => array('hugo', 'is_regex' => false)
	];
		
	$cms_list[100] = [
		'name' => 'HumHub',
		'link_tag' => array('/humhub/', 'is_regex' => false),
		'script_tag' => array('humhub.modules.', 'is_attribute' => false)
	];

	$cms_list[101] = [
		'name' => 'IPS Community Suite',
		'body_tag' => array('class="ipsDataItem_', 'is_regex' => false)
	];
	
	$cms_list[102] = [
		'name' => 'ImageCMS',
		'meta_tag' => array('imagecms', 'is_regex' => false)
	];

	$cms_list[103] = [
		'name' => 'Immediacy',
		'meta_tag' => array('immediacy', 'is_regex' => false)
	];

	$cms_list[104] = [
		'name' => 'Imperia CMS',
		'meta_tag' => array('imperia', 'is_regex' => false)
	];

	$cms_list[105] = [
		'name' => 'ImpressCMS',
		'meta_tag' => array('impresscms', 'is_regex' => false)
	];

	$cms_list[106] = [
		'name' => 'ImpressPages CMS',
		'meta_tag' => array('impresspages', 'is_regex' => false)
	];

	$cms_list[107] = [
		'name' => 'Infopark CMS Fiona',
		'meta_tag' => array('rails connector for infopark cms fiona', 'is_regex' => false)
	];
		
	$cms_list[108] = [
		'name' => 'InstantCMS',
		'meta_tag' => array('instantcms', 'is_regex' => false)
	];
		
	$cms_list[109] = [
		'name' => 'InterRed',
		'meta_tag' => array('interred', 'is_regex' => false)
	];
		
	$cms_list[110] = [
		'name' => 'Intershop',
		'link_tag' => array('/INTERSHOP/static/WFS/', 'is_regex' => false),
		'img_tag' => '/INTERSHOP/static/WFS/',
		'script_tag' => array('/INTERSHOP/static/WFS/', 'is_attribute' => false)
	];
		
	$cms_list[111] = [
		'name' => 'JTL-Shop',
		'link_tag' => array('/JTL-Shop', 'is_regex' => false),
		'script_tag' => array('asset/jtl', 'is_attribute' => false),
		'body_tag' => array('class="jtl_token" name="jtl_token', 'is_regex' => false)
	];
		
	$cms_list[112] = [
		'name' => 'Jadu CMS',
		'meta_tag' => array('//www.jadu.net', 'is_regex' => false)
	];
		
	$cms_list[113] = [
		'name' => 'Jekyll',
		'meta_tag' => array('jekyll', 'is_regex' => false)
	];
		
	$cms_list[114] = [
		'name' => 'JetShop',
		'img_tag' => '/powered-by-jetshop.png',
		'script_tag' => array('var JetshopData', 'is_attribute' => false),
		'body_tag' => array('ctl00_jetShopLogoControl', 'is_regex' => false)
	];
		
	$cms_list[115] = [
		'name' => 'Jieqi CMS',
		'meta_tag' => array('jieqi.com', 'is_regex' => false)
	];
		
	$cms_list[116] = [
		'name' => 'Jimdo',
		'header' => array(['x-jimdo-instance', '^.*$', 'is_regex' => true], ['x-jimdo-wid', '^.*$', 'is_regex' => true]),
		'link_tag' => array('//u.jimcdn.com/', 'is_regex' => false),
		'img_tag' => '//image.jimcdn.com/app/',
		'script_tag' => array('var jimdoData', 'is_attribute' => false),
		'body_tag' => array('jimdo_layout_css', 'is_regex' => false)
	];
		
	$cms_list[117] = [
		'name' => 'JustSystems Homepage Builder',
		'meta_tag' => array('justsystems homepage builder', 'is_regex' => false)
	];
		
	$cms_list[118] = [
		'name' => 'KVS CMS',
		'meta_tag' => array('Kernel Video Sharing', 'is_regex' => false)
	];
		
	$cms_list[119] = [
		'name' => 'Koken',
		'meta_tag' => array('koken', 'is_regex' => false)
	];
		
	$cms_list[120] = [
		'name' => 'Komodo CMS',
		'meta_tag' => array('komodo cms', 'is_regex' => false)
	];
		
	$cms_list[121] = [
		'name' => 'Kooboo',
		'header' => array(['x-kooboocms-version', '^[0-9]+.[0-9]+.[0-9]+.[0-9]+$', 'is_regex' => true])
	];
		
	$cms_list[122] = [
		'name' => 'Kryptronic',
		'header' => array(['x-powered-by', 'kryptronic', 'is_regex' => false]),
		'meta_tag' => array('kryptronic software', 'is_regex' => false)
	];
		
	$cms_list[123] = [
		'name' => 'Labrador CMS',
		'meta_tag' => array('Labrador', 'is_regex' => false)
	];
		
	$cms_list[124] = [
		'name' => 'Lauyan TOWeb',
		'meta_tag' => array('lauyan toweb', 'is_regex' => false)
	];
		
	$cms_list[125] = [
		'name' => 'LeadPages',
		'script_tag' => array('LeadPagesCenterObject', 'is_attribute' => false),
		'body_tag' => array('<meta name="leadpages-legacy-pixel-domain" content="https://my.leadpages.net">', 'is_regex' => false)
	];
		
	$cms_list[126] = [
		'name' => 'LightCMS',
		'link_tag' => array('css/lcms-public.css', 'is_regex' => false),
		'script_tag' => array('scripts/lcms.modal.js', 'is_attribute' => true)
	];
		
	$cms_list[127] = [
		'name' => 'Lightspeed',
		'body_tag' => array('Lightspeed Netherlands B.V.', 'is_regex' => false)
	];
		
	$cms_list[128] = [
		'name' => 'LiveEdit',
		'meta_tag' => array('//www.getliveedit.com', 'is_regex' => false)
	];
		
	$cms_list[129] = [
		'name' => 'Livedoor Blog',
		'link_tag' => array('//livedoor.blogimg.jp/', 'is_regex' => false),
		'img_tag' => '//livedoor.blogimg.jp/',
		'script_tag' => array('//livedoor.blogimg.jp/', 'is_attribute' => false)
	];
		
	$cms_list[130] = [
		'name' => 'Livestreet CMS',
		'script_tag' => array('var LIVESTREET_SECURITY_KEY', 'is_attribute' => false),
		'body_tag' => array('var LIVESTREET_DOWNLOAD_KEY', 'is_regex' => false)
	];
		
	$cms_list[131] = [
		'name' => 'Locomotive CMS',
		'link_tag' => array('/assets/locomotive/', 'is_regex' => false)
	];
		
	$cms_list[132] = [
		'name' => 'LogiCommerce',
		'meta_tag' => array('logicommerce', 'is_regex' => false)
	];
		
	$cms_list[133] = [
		'name' => 'Loja Integrada',
		'meta_tag' => array('loja integrada', 'is_regex' => false),
		'img_tag' => '//cdn.awsli.com.br/production/static/whitelabel/lojaintegrada/img/'
	];
		
	$cms_list[134] = [
		'name' => 'MONO',
		'script_tag' => array('document.cookie.indexOf(\'mono_donottrack=true\')', 'is_attribute' => false),
		'body_tag' => array('_mga(\'send\', \'event\', \'monoAction\', action);', 'is_regex' => false)
	];
		
	$cms_list[135] = [
		'name' => 'Mabisy',
		'meta_tag' => array('mabisy', 'is_regex' => false)
	];
		
	$cms_list[136] = [
		'name' => 'MakeShop',
		'img_tag' => '//gigaplus.makeshop.jp/',
		'script_tag' => array('ga(\'linker:autoLink\', [\'www.makeshop.jp\']);', 'is_attribute' => false)
	];
		
	$cms_list[137] = [
		'name' => 'Mambo',
		'meta_tag' => array('mambo', 'is_regex' => false)
	];
		
	$cms_list[138] = [
		'name' => 'MaxSite CMS',
		'link_tag' => array('/application/maxsite/templates/', 'is_regex' => false),
		'img_tag' => '/application/maxsite/templates/',
		'script_tag' => array('/application/maxsite/templates/', 'is_attribute' => true)
	];
		
	$cms_list[139] = [
		'name' => 'MediaWiki',
		'meta_tag' => array('mediawiki', 'is_regex' => false),
		'script_tag' => array('mw.loader.load(["mediawiki.page.startup",', 'is_attribute' => false)
	];
		
	$cms_list[140] = [
		'name' => 'Medium',
		'header' => array(['x-powered-by', 'medium', 'is_regex' => false]),
		'link_tag' => array('android-app://com.medium.reader', 'is_regex' => false),
		'img_tag' => '//cdn-images-1.medium.com/',
		'script_tag' => array('//cdn-static-1.medium.com/', 'is_attribute' => true)
	];
		
	$cms_list[141] = [
		'name' => 'Melody',
		'meta_tag' => array('melody', 'is_regex' => false)
	];
		
	$cms_list[142] = [
		'name' => 'Metro Publisher',
		'meta_tag' => array('metro publisher', 'is_regex' => false)
	];
		
	$cms_list[143] = [
		'name' => 'Microsoft Word',
		'meta_tag' => array('microsoft word', 'is_regex' => false)
	];
		
	$cms_list[144] = [
		'name' => 'Midgard CMS',
		'meta_tag' => array('midgard', 'is_regex' => false)
	];
		
	$cms_list[145] = [
		'name' => 'Mijnwebwinkel',
		'meta_tag' => array('mijnwebwinkel', 'is_regex' => false)
	];
		
	$cms_list[146] = [
		'name' => 'Mintox',
		'meta_tag' => array('mintox', 'is_regex' => false),
		'script_tag' => array('MintoxJS.', 'is_attribute' => false),
		'body_tag' => array('Mintox.Cart.setIsAlwaysAddMode (false);', 'is_regex' => false)
	];
		
	$cms_list[147] = [
		'name' => 'Miva Merchant',
		'body_tag' => array('/merchant.mvc?Screen=', 'is_regex' => false)
	];
		
	$cms_list[148] = [
		'name' => 'Mobirise',
		'meta_tag' => array('mobirise', 'is_regex' => false),
		'link_tag' => array('assets/mobirise/', 'is_regex' => false)
	];
		
	$cms_list[149] = [
		'name' => 'Modified Shopsoftware',
		'meta_tag' => array('modified ecommerce shopsoftware', 'is_regex' => false),
		'body_tag' => array('modified eCommerce Shopsoftware', 'is_regex' => false)
	];

	$cms_list[150] = [
		'name' => 'Modx CMS',
		'meta_tag' => array('modx cms', 'is_regex' => false)
	];
		
	$cms_list[151] = [
		'name' => 'MoinMoin',
		'body_tag' => array('<a href="http://moinmo.in/" title="This site uses the MoinMoin Wiki software.">MoinMoin Powered</a>', 'is_regex' => false)
	];
		
	$cms_list[152] = [
		'name' => 'Movable Type',
		'meta_tag' => array('movable type', 'is_regex' => false)
	];
		
	$cms_list[153] = [
		'name' => 'Mura',
		'meta_tag' => array('mura cms', 'is_regex' => false)
	];
		
	$cms_list[154] = [
		'name' => 'Méthode',
		'body_tag' => array('<!-- Methode uuid', 'is_regex' => false)
	];
		
	$cms_list[155] = [
		'name' => 'NQcontent',
		'link_tag' => array('/graphic/nq_yaml/', 'is_regex' => false),
		'body_tag' => array('/nqcontent.cfm?a_', 'is_regex' => false)
	];
		
	$cms_list[156] = [
		'name' => 'Nation Builder',
		'header' => array(['x-powered-by', 'phusion passenger enterprise', 'is_regex' => false]),
		'link_tag' => array('.nationbuilder.com/themes/', 'is_regex' => false),
		'script_tag' => array('.nationbuilder.com/themes/', 'is_attribute' => true)
	];
		
	$cms_list[157] = [
		'name' => 'Neos',
		'header' => array(['x-flow-powered', 'neos', 'is_regex' => false]),
		'link_tag' => array('-neos.', 'is_regex' => false),
		'script_tag' => array('-neos.', 'is_attribute' => true),
		'body_tag' => array('class="neos-contentcollection"', 'is_regex' => false)
	];
		
	$cms_list[158] = [
		'name' => 'NetObjects',
		'meta_tag' => array('netobjects', 'is_regex' => false)
	];
		
	$cms_list[159] = [
		'name' => 'NetSuite',
		'header' => array(['ns_rtimer_composite', '^.*$', 'is_regex' => true]),
		'body_tag' => array('Applications/NetSuite', 'is_regex' => false)
	];
		
	$cms_list[160] = [
		'name' => 'Netvolution',
		'meta_tag' => array('netvolution', 'is_regex' => false)
	];
		
	$cms_list[161] = [
		'name' => 'Nextcloud',
		'script_tag' => array('nextcloud_announcements', 'is_attribute' => false),
		'body_tag' => array('docs.nextcloud.com\/', 'is_regex' => false)
	];
		
	$cms_list[162] = [
		'name' => 'Ning',
		'link_tag' => array('//api.ning.com/', 'is_regex' => false),
		'img_tag' => '//static.ning.com/',
		'script_tag' => array('//static.ning.com/', 'is_attribute' => true),
		'body_tag' => array('ning = {', 'is_regex' => false)
	];
		
	$cms_list[163] = [
		'name' => 'Nodebb',
		'header' => array(['x-powered-by', 'nodebb', 'is_regex' => false]),
		'link_tag' => array('/nodebb-', 'is_regex' => false),
		'script_tag' => array('nodebb.min.js', 'is_attribute' => true),
		'body_tag' => array('nodebb-theme-', 'is_regex' => false)
	];
		
	$cms_list[164] = [
		'name' => 'Notepad++',
		'meta_tag' => array('notepad++', 'is_regex' => false)
	];
		
	$cms_list[165] = [
		'name' => 'Nucleus CMS',
		'meta_tag' => array('nucleus', 'is_regex' => false),
		'link_tag' => array('//nucleuscms.org', 'is_regex' => false),
		'img_tag' => '/nucleus/media/'
	];
		
	$cms_list[166] = [
		'name' => 'NukeViet',
		'meta_tag' => array('nukeviet', 'is_regex' => false),
		'script_tag' => array('nv3c_', 'is_attribute' => false)
	];
		
	$cms_list[167] = [
		'name' => 'OU Campus',
		'body_tag' => array('//a.cms.omniupdate.com/', 'is_regex' => false)
	];
		
	$cms_list[168] = [
		'name' => 'OXID eSales',
		'body_tag' => array('<!-- OXID eShop', 'is_regex' => false)
	];
		
	$cms_list[169] = [
		'name' => 'Octopress',
		'script_tag' => array('/octopress.js', 'is_attribute' => true),
		'body_tag' => array('<span class="credit">Powered by <a href="http://octopress.org">Octopress</a></span>', 'is_regex' => false)
	];
		
	$cms_list[170] = [
		'name' => 'Odoo',
		'header' => array(['var_name', 'value', 'is_regex' => false]),
		'meta_tag' => array('odoo', 'is_regex' => false),
		'link_tag' => array('//odoocdn.com/web/content/', 'is_regex' => false),
		'script_tag' => array('odoo.session_info', 'is_attribute' => false),
	];
		
	$cms_list[171] = [
		'name' => 'One.com',
		'header' => array(['var_name', 'value', 'is_regex' => false]),
		'meta_tag' => array('one.com web', 'is_regex' => false),
		'link_tag' => array('/onewebstatic/', 'is_regex' => false),
		'img_tag' => '/onewebstatic/',
		'script_tag' => array('/onewebstatic/', 'is_attribute' => false),
	];
		
	$cms_list[172] = [
		'name' => 'Open CMS',
		'meta_tag' => array('open cms', 'is_regex' => false)
	];
		
	$cms_list[173] = [
		'name' => 'Open Journal Systems',
		'meta_tag' => array('open journal systems', 'is_regex' => false)
	];
		
	$cms_list[174] = [
		'name' => 'OpenNemas',
		'meta_tag' => array('opennemas', 'is_regex' => false)
	];
		
	$cms_list[175] = [
		'name' => 'OpenOffice',
		'meta_tag' => array('openoffice', 'is_regex' => false)
	];
		
	$cms_list[176] = [
		'name' => 'Orchard',
		'meta_tag' => array('orchard', 'is_regex' => false)
	];
		
	$cms_list[177] = [
		'name' => 'Orthodox Web Solutions',
		'meta_tag' => array('orthodox web solutions', 'is_regex' => false),
		'body_tag' => array('Powered by <a href="http://orthodoxws.com" target="new">Orthodox Web Solutions</a>', 'is_regex' => false)
	];
		
	$cms_list[178] = [
		'name' => 'Osclass',
		'meta_tag' => array('osclass', 'is_regex' => false),
		'link_tag' => array('/oc-content/', 'is_regex' => false),
		'img_tag' => '/oc-content/',
		'script_tag' => array('/oc-content/', 'is_attribute' => true),
		'body_tag' => array('osclass_pay', 'is_regex' => false)
	];
		
	$cms_list[179] = [
		'name' => 'Overblog',
		'link_tag' => array('//assets.over-blog-kiwi.com/', 'is_regex' => false),
		'script_tag' => array('//assets.over-blog-kiwi.com/', 'is_attribute' => true)
	];
		
	$cms_list[180] = [
		'name' => 'Oxatis',
		'meta_tag' => array('oxatis', 'is_regex' => false)
	];
		
	$cms_list[181] = [
		'name' => 'PHP-Fusion',
		'script_tag' => array('/fusion/', 'is_attribute' => true),
		'body_tag' => array('cookie(\'fusion_prod_cd\')', 'is_regex' => false)
	];
		
	$cms_list[182] = [
		'name' => 'PHP-Nuke',
		'header' => array(['var_name', 'value', 'is_regex' => false]),
		'meta_tag' => array('php-nuke', 'is_regex' => false)
	];
		
	$cms_list[183] = [
		'name' => 'PHP Link Directory',
		'meta_tag' => array('php link directory', 'is_regex' => false)
	];
		
	$cms_list[184] = [
		'name' => 'PHPShop',
		'meta_tag' => array('phpshop.ru', 'is_regex' => false)
	];
		
	$cms_list[185] = [
		'name' => 'PHPVibe',
		'meta_tag' => array('phpvide', 'is_regex' => false),
		'body_tag' => array('phpvibe-video-list', 'is_regex' => false)
	];
		
	$cms_list[186] = [
		'name' => 'PageCloud',
		'meta_tag' => array('pagecloud', 'is_regex' => false),
		'link_tag' => array('//siteassets.pagecloud.com/', 'is_regex' => false),
		'img_tag' => '//siteassets.pagecloud.com/',
		'script_tag' => array('//assets.pagecloud.com/', 'is_attribute' => true),
		'body_tag' => array('id="pagecloud-common"', 'is_regex' => false)
	];
		
	$cms_list[187] = [
		'name' => 'Pagekit',
		'meta_tag' => array('pagekit', 'is_regex' => false),
		'link_tag' => array('/pagekit/', 'is_regex' => false),
		'script_tag' => array('/pagekit/', 'is_attribute' => true),
		'body_tag' => array('var $pagekit = {"url":""', 'is_regex' => false)
	];
		
	$cms_list[188] = [
		'name' => 'Pangea CMS',
		'script_tag' => array('-pangea/prod/utag.js', 'is_attribute' => false),
		'body_tag' => array('/Pangeavideo/', 'is_regex' => false)
	];
		
	$cms_list[189] = [
		'name' => 'Parallels Presence Builder',
		'meta_tag' => array('parallels presence builder', 'is_regex' => false)
	];
		
	$cms_list[190] = [
		'name' => 'Pelican',
		'meta_tag' => array('pelican', 'is_regex' => false)
	];
		
	$cms_list[191] = [
		'name' => 'Perch',
		'img_tag' => 'perch/resources/',
		'body_tag' => array('perch/resources/', 'is_regex' => false)
	];
		
	$cms_list[192] = [
		'name' => 'Percussion',
		'meta_tag' => array('percussion cm system', 'is_regex' => false)
	];
		
	$cms_list[193] = [
		'name' => 'Pimcore',
		'script_tag' => array('pimcore/static/js', 'is_attribute' => true),
		'body_tag' => array('pimcore_area_', 'is_regex' => false)
	];
		
	$cms_list[194] = [
		'name' => 'Piwigo',
		'meta_tag' => array('piwigo', 'is_regex' => false)
	];
		
	$cms_list[195] = [
		'name' => 'Plone',
		'meta_tag' => array('plone', 'is_regex' => false),
		'script_tag' => array('resourceplone.', 'is_attribute' => true)
	];
		
	$cms_list[196] = [
		'name' => 'PowerBoutique',
		'header' => array(['server', 'powerboutique', 'is_regex' => false]),
		'script_tag' => array('//shared.ph1.powerboutique.net/', 'is_attribute' => true)
	];
		
	$cms_list[197] = [
		'name' => 'PrestaShop',
		'header' => array(['powered-by', 'prestashop', 'is_regex' => false]),
		'meta_tag' => array('prestashop', 'is_regex' => false),
		'script_tag' => array('var prestashop = {', 'is_attribute' => false)
	];
		
	$cms_list[198] = [
		'name' => 'ProcessWire',
		'meta_tag' => array('processwire', 'is_regex' => false)
	];
		
	$cms_list[199] = [
		'name' => 'Pydio',
		'script_tag' => array('pydio.getController().fireAction', 'is_attribute' => false)
	];
		
	$cms_list[200] = [
		'name' => 'Quick.CMS',
		'meta_tag' => array('quick.cms', 'is_regex' => false),
		'script_tag' => array('/quick.', 'is_attribute' => true)
	];

	$cms_list[201] = [
		'name' => 'Quick.Cart',
		'meta_tag' => array('quick.cart', 'is_regex' => false)
	];
		
	$cms_list[202] = [
		'name' => 'RCMS',
		'meta_tag' => array('rcms', 'is_regex' => false),
	];
		
	$cms_list[203] = [
		'name' => 'RVsitebuilder',
		'meta_tag' => array('rvglobalsoft', 'is_regex' => false)
	];
		
	$cms_list[204] = [
		'name' => 'RapidWeaver',
		'meta_tag' => array('rapidweaver', 'is_regex' => false),
		'script_tag' => array('rw_common/themes/', 'is_attribute' => true)
	];
		
	$cms_list[205] = [
		'name' => 'Ready Pro Ecommerce',
		'meta_tag' => array('ready pro ecommerce', 'is_regex' => false),
	];
		
	$cms_list[206] = [
		'name' => 'Ruby on Rails',
		'header' => array(['var_name', 'value', 'is_regex' => false]),
		'meta_tag' => array('authenticity_token', 'is_regex' => false),
	];
		
	$cms_list[207] = [
		'name' => 'SAM',
		'body_tag' => array('sampublish home', 'is_regex' => false)
	];
		
	$cms_list[208] = [
		'name' => 'SNworks',
		'img_tag' => '//snworksceo.imgix.net/',
		'body_tag' => array('SNworks - Solutions by The State News - http://getsnworks.com', 'is_regex' => false)
	];
		
	$cms_list[209] = [
		'name' => 'SUMOshop',
		'meta_tag' => array('sumoshop', 'is_regex' => false),
		'script_tag' => array('jquery.sumoselector.min.', 'is_attribute' => true)
	];
		
	$cms_list[210] = [
		'name' => 'Salesforce',
		'header' => array(['x-powered-by', 'salesforce', 'is_regex' => false])
	];
		
	$cms_list[211] = [
		'name' => 'Sana Commerce',
		'meta_tag' => array('sana commerce', 'is_regex' => false),
		'script_tag' => array('var Sana = Sana || {};', 'is_attribute' => false)
	];
		
	$cms_list[212] = [
		'name' => 'Sandvox',
		'meta_tag' => array('sandvox', 'is_regex' => false),
		'body_tag' => array('sandvox.ImageElement', 'is_regex' => false)
	];
		
	$cms_list[213] = [
		'name' => 'SchoolSitePro',
		'meta_tag' => array('schoolsitepro', 'is_regex' => false)
	];
		
	$cms_list[214] = [
		'name' => 'Seamless CMS',
		'meta_tag' => array('seamlesscms', 'is_regex' => false),
		'body_tag' => array('Published by SeamlessCMS', 'is_regex' => false)
	];
		
	$cms_list[215] = [
		'name' => 'SeoToaster',
		'link_tag' => array('/system/css/seotoaster-ui.css', 'is_regex' => false),
	];
		
	$cms_list[216] = [
		'name' => 'Serendipity',
		'meta_tag' => array('serendipity', 'is_regex' => false),
		'body_tag' => array('serendipity_image', 'is_regex' => false)
	];
		
	$cms_list[217] = [
		'name' => 'Setup.ru',
		'script_tag' => array('"auth_domain" : "setup.ru"', 'is_attribute' => false)
	];
		
	$cms_list[218] = [
		'name' => 'SharePoint',
		'meta_tag' => array('microsoft sharepoint', 'is_regex' => false),
		'script_tag' => array('var MSOWebPartPageFormName = \'aspnetForm\';', 'is_attribute' => false)
	];
		
	$cms_list[219] = [
		'name' => 'ShopFactory',
		'meta_tag' => array('shopFactory', 'is_regex' => false),
		'img_tag' => '//www.shopfactory.com/'
	];
		
	$cms_list[220] = [
		'name' => 'Shopify',
		'header' => array(['x-shardid', '^[0-9]+$', 'is_regex' => true], ['x-shopid', '^[0-9]+$', 'is_regex' => true]),
		'link_tag' => array('//cdn.shopify.com/', 'is_regex' => false),
		'img_tag' => '//cdn.shopify.com/',
		'script_tag' => array('//cdn.shopify.com/', 'is_attribute' => true)
	];
		
	$cms_list[221] = [
		'name' => 'Shoptet',
		'link_tag' => array('//cdn.myshoptet.com/', 'is_regex' => false),
		'img_tag' => '//cdn.myshoptet.com/',
		'script_tag' => array('var shoptet = shoptet || {};', 'is_attribute' => true)
	];
		
	$cms_list[222] = [
		'name' => 'Shopware',
		'link_tag' => array('/shopware/', 'is_regex' => false),
		'script_tag' => array('jquery.shopware.min.js', 'is_attribute' => false),
		'body_tag' => array('/engine/Shopware/Plugins/Local/Frontend', 'is_regex' => false)
	];
		
	$cms_list[223] = [
		'name' => 'Showoff',
		'meta_tag' => array('showoff', 'is_regex' => false),
		'script_tag' => array('var u=\'//analytics.showoff.asp.events/\';', 'is_attribute' => false)
	];
		
	$cms_list[224] = [
		'name' => 'SilverStripe CMS',
		'meta_tag' => array('silverstripe', 'is_regex' => false)
	];
		
	$cms_list[225] = [
		'name' => 'Simple Machines Forum',
		'script_tag' => array('var smf_theme_url =', 'is_attribute' => false),
		'body_tag' => array('Powered by SMF', 'is_regex' => false)
	];
		
	$cms_list[226] = [
		'name' => 'Siquando',
		'meta_tag' => array('siquando', 'is_regex' => false)
	];
		
	$cms_list[227] = [
		'name' => 'SiteDirect',
		'meta_tag' => array('sitedirect', 'is_regex' => false)
	];
		
	$cms_list[228] = [
		'name' => 'SiteKreator',
		'script_tag' => array('SK.Singletons.env.setMultiple(', 'is_attribute' => false),
		'body_tag' => array('SK.RolloverImage.apply', 'is_regex' => false)
	];
		
	$cms_list[229] = [
		'name' => 'SitePad',
		'meta_tag' => array('sitepad', 'is_regex' => false)
	];
		
	$cms_list[230] = [
		'name' => 'SiteSpinner',
		'meta_tag' => array('sitespinner', 'is_regex' => false)
	];
		
	$cms_list[231] = [
		'name' => 'Sitefinity',
		'meta_tag' => array('sitefinity', 'is_regex' => false),
		'link_tag' => array('Telerik.Sitefinity.', 'is_regex' => false),
		'script_tag' => array('Telerik.Sitefinity.', 'is_attribute' => false)
	];
	
	$cms_list[232] = [
		'name' => 'Sitonline',
		'meta_tag' => array('sitonline', 'is_regex' => false),
		'script_tag' => array('//www.sitonline.it/common/js', 'is_attribute' => true)
	];
	$cms_list[233] = [
		'name' => 'Sitoo',
		'meta_tag' => array('sitoo webshop', 'is_regex' => false),
		'img_tag' => '.mysitoo.com/'
	];
		
	$cms_list[234] = [
		'name' => 'SmartEtailing',
		'meta_tag' => array('smartetailing', 'is_regex' => false),
		'img_tag' => '//smartetailing.piwikpro.com/piwik.php',
		'script_tag' => array('var u="//smartetailing.piwikpro.com/";', 'is_attribute' => false)
	];
		
	$cms_list[235] = [
		'name' => 'SmartStore.NET',
		'meta_tag' => array('smartstore', 'is_regex' => false),
		'script_tag' => array('/smartstore.', 'is_attribute' => true)
	];
		
	$cms_list[236] = [
		'name' => 'SmugMug',
		'header' => array(['x-powered-by', 'smugmug', 'is_regex' => false], ['x-smugmug-hiring', '^.*$', 'is_regex' => true], ['x-smugmug-values', '^.*$', 'is_regex' => true]),
		'link_tag' => array('//cdn.smugmug.com/', 'is_regex' => false),
		'img_tag' => '//cdn.smugmug.com/',
		'script_tag' => array('//cdn.smugmug.com/', 'is_attribute' => true)
	];
		
	$cms_list[237] = [
		'name' => 'SocialEngine',
		'script_tag' => array('socialengine', 'is_attribute' => false)
	];
		
	$cms_list[238] = [
		'name' => 'Sparkle CMS',
		'meta_tag' => array('sparkle', 'is_regex' => false),
		'body_tag' => array('/sparkle-assets/', 'is_regex' => false)
	];
		
	$cms_list[239] = [
		'name' => 'Spip',
		'link_tag' => array('spip.php?page=', 'is_regex' => false)
	];
		
	$cms_list[240] = [
		'name' => 'Squarespace',
		'link_tag' => array('//static1.squarespace.com/', 'is_regex' => false),
		'img_tag' => '//static1.squarespace.com/',
		'script_tag' => array('//static.squarespace.com/', 'is_attribute' => true),
		'body_tag' => array('<!-- This is Squarespace. -->', 'is_regex' => false)
	];
		
	$cms_list[241] = [
		'name' => 'Squiz',
		'script_tag' => array('.squiz.net/', 'is_attribute' => true),
		'body_tag' => array('Running Squiz Matrix', 'is_regex' => false)
	];
		
	$cms_list[242] = [
		'name' => 'Strikingly',
		'link_tag' => array('//static-assets.strikinglycdn.com/', 'is_regex' => false),
		'img_tag' => '//assets.strikingly.com',
		'script_tag' => array('//static-assets.strikinglycdn.com/', 'is_attribute' => true),
		'body_tag' => array('<!-- Powered by Strikingly.com', 'is_regex' => false)
	];
		
	$cms_list[243] = [
		'name' => 'Sulu CMS',
		'header' => array(['x-generator', 'sulu', 'is_regex' => false])
	];
		
	$cms_list[244] = [
		'name' => 'Tailbase',
		'link_tag' => array('.tailbase.com/', 'is_regex' => false),
		'img_tag' => '.tailbase.com/',
		'script_tag' => array('.tailbase.com/', 'is_attribute' => true)
	];
		
	$cms_list[245] = [
		'name' => 'Tangora Web CMS',
		'meta_tag' => array('tangora', 'is_regex' => false),
		'script_tag' => array('if (typeof(Tangora) == \'undefined\') Tangora={};', 'is_attribute' => false),
		'body_tag' => array('<!-- CMS by Tangora Software A/S - http://www.tangora.com -->', 'is_regex' => false)
	];
		
	$cms_list[246] = [
		'name' => 'Telligent',
		'meta_tag' => array('communityserver', 'is_regex' => false)
	];
		
	$cms_list[247] = [
		'name' => 'Tempest',
		'meta_tag' => array('tempest', 'is_regex' => false),
		'script_tag' => array('{"trackers":[{"name":"_tempestTracker"', 'is_attribute' => false),
		'body_tag' => array('m-footer--tempest-badge', 'is_regex' => false)
	];
		
	$cms_list[248] = [
		'name' => 'Textalk Webshop',
		'meta_tag' => array('textalk webshop', 'is_regex' => false),
		'link_tag' => array('.textalk.se/', 'is_regex' => false),
		'script_tag' => array('.textalk.se/', 'is_attribute' => true)
	];
		
	$cms_list[249] = [
		'name' => 'Textpattern CMS',
		'meta_tag' => array('textpattern cms', 'is_regex' => false)
	];
		
	$cms_list[250] = [
		'name' => 'ThinkCMF',
		'header' => array(['x-powered-by', 'thinkcmf', 'is_regex' => false])
	];

	$cms_list[251] = [
		'name' => 'ThinkPHP',
		'header' => array(['x-powered-by', 'thinkphp', 'is_regex' => false])
	];

	$cms_list[252] = [
		'name' => 'Ticimax',
		'link_tag' => array('//cdn.ticimax.com/', 'is_regex' => false),
		'img_tag' => '/ticimax/',
		'script_tag' => array('//cdn.ticimax.com/', 'is_attribute' => true),
		'body_tag' => array('GlobalMasterPage_TicimaxFooterAciklama', 'is_regex' => false)
	];
		
	$cms_list[253] = [
		'name' => 'Tiki Wiki CMS',
		'meta_tag' => array('tiki wiki cms', 'is_regex' => false)
	];
		
	$cms_list[254] = [
		'name' => 'Tilda',
		'link_tag' => array('tilda-', 'is_regex' => false),
		'script_tag' => array('tilda-', 'is_attribute' => true),
		'body_tag' => array('data-tilda-page-id', 'is_regex' => false)
	];
		
	$cms_list[255] = [
		'name' => 'Trellix',
		'meta_tag' => array('trellix', 'is_regex' => false),
		'body_tag' => array('TRELLIX_OPEN_SITE_COMMAND', 'is_regex' => false)
	];
		
	$cms_list[256] = [
		'name' => 'Tumblr',
		'link_tag' => array('.tumblr.com/', 'is_regex' => false),
		'img_tag' => '.tumblr.com/',
		'script_tag' => array('.tumblr.com/', 'is_attribute' => true),
	];
		
	$cms_list[257] = [
		'name' => 'TypePad',
		'meta_tag' => array('//www.typepad.com', 'is_regex' => false),
		'link_tag' => array('.typepad.com/', 'is_regex' => false),
		'img_tag' => '.typepad.com/',
		'script_tag' => array('.typepad.com/', 'is_attribute' => false)
	];
		
	$cms_list[258] = [
		'name' => 'Typecho',
		'header' => array(['var_name', 'value', 'is_regex' => false]),
		'meta_tag' => array('typecho', 'is_regex' => false),
		'link_tag' => array('typecho', 'is_regex' => false)
	];
		
	$cms_list[259] = [
		'name' => 'Typesetter',
		'meta_tag' => array('typesetter cms', 'is_regex' => false),
		'link_tag' => array('typesettercms', 'is_regex' => false)
	];
		
	$cms_list[260] = [
		'name' => 'Typo3',
		'meta_tag' => array('typo3 cms', 'is_regex' => false),
		'link_tag' => array('typo3temp/', 'is_regex' => false),
		'img_tag' => 'typo3temp/',
		'script_tag' => array('typo3temp/', 'is_attribute' => true),
		'body_tag' => array('This website is powered by TYPO3', 'is_regex' => false)
	];
		
	$cms_list[261] = [
		'name' => 'UBB.threads',
		'link_tag' => array('ubbthreads', 'is_regex' => false)
	];
		
	$cms_list[262] = [
		'name' => 'UMI.CMS',
		'header' => array(['x-generated-by', 'umi.cms', 'is_regex' => false]),
		'body_tag' => array('xmlns:umi="http://www.umi-cms.ru/', 'is_regex' => false)
	];
		
	$cms_list[263] = [
		'name' => 'Ultimize CMS',
		'meta_tag' => array('ultimize', 'is_regex' => false),
		'script_tag' => array('UltimizeIntegration.ashx?t=', 'is_attribute' => true)
	];
		
	$cms_list[264] = [
		'name' => 'Umbraco',
		'body_tag' => array('CMS by Umbraco', 'is_regex' => false)
	];
		
	$cms_list[265] = [
		'name' => 'Vanilla Forums',
		'link_tag' => array('/vanilla/', 'is_regex' => false)
	];
		
	$cms_list[266] = [
		'name' => 'Vigbo',
		'link_tag' => array('vigbo.com/', 'is_regex' => false),
		'script_tag' => array('vigbo.com/', 'is_attribute' => true),
		'body_tag' => array('<!-- Vigbo-cms -->', 'is_regex' => false)
	];
		
	$cms_list[267] = [
		'name' => 'Vision',
		'script_tag' => array('window.visionApps.token', 'is_attribute' => false),
		'body_tag' => array('visionLiveAdminEndPoint', 'is_regex' => false)
	];
		
	$cms_list[268] = [
		'name' => 'Visual Studio',
		'meta_tag' => array('visual studio', 'is_regex' => false)
	];
		
	$cms_list[269] = [
		'name' => 'Visualsoft',
		'link_tag' => array('.visualsoft.co.uk', 'is_regex' => false),
		'script_tag' => array('.visualsoft.co.uk', 'is_attribute' => false)
	];
		
	$cms_list[270] = [
		'name' => 'Vivvo',
		'script_tag' => array('vivvoRotatingHeadlines', 'is_attribute' => false)
	];
		
	$cms_list[271] = [
		'name' => 'Volusion',
		'header' => array(['var_name', 'value', 'is_regex' => false]),
		'meta_tag' => array('value', 'is_regex' => false),
		'link_tag' => array('v/vspfiles/', 'is_regex' => false),
		'img_tag' => '.volusion.com/',
		'script_tag' => array('/volusion.js', 'is_attribute' => true),
		'body_tag' => array('volusion.cart.itemCount(quantityTotal);', 'is_regex' => false)
	];
		
	$cms_list[272] = [
		'name' => 'WMaker',
		'script_tag' => array('wm_select_link(', 'is_attribute' => false),
		'body_tag' => array('wm-module fullbackground', 'is_regex' => false)
	];
		
	$cms_list[273] = [
		'name' => 'WYSIWYG Web Builder',
		'meta_tag' => array('wysiwyg', 'is_regex' => false)
	];
		
	$cms_list[274] = [
		'name' => 'Web 2 Date',
		'meta_tag' => array('web to date', 'is_regex' => false)
	];
		
	$cms_list[275] = [
		'name' => 'WebAcappella',
		'meta_tag' => array('webacappella', 'is_regex' => false),
		'link_tag' => array('webacappella', 'is_regex' => false),
		'script_tag' => array('webacappella_', 'is_attribute' => true)
	];
		
	$cms_list[276] = [
		'name' => 'Web Commander',
		'body_tag' => array('webcommander-page', 'is_regex' => false)
	];
		
	$cms_list[277] = [
		'name' => 'WebGUI',
		'meta_tag' => array('webgui', 'is_regex' => false),
		'link_tag' => array('/webgui/', 'is_regex' => false),
		'script_tag' => array('/webgui/', 'is_attribute' => false)
	];
		
	$cms_list[278] = [
		'name' => 'Web Page Maker',
		'meta_tag' => array('web page maker', 'is_regex' => false),
		'body_tag' => array('<div class="wpmd">', 'is_regex' => false)
	];
		
	$cms_list[279] = [
		'name' => 'WebPlus',
		'meta_tag' => array('webplus', 'is_regex' => false),
		'img_tag' => 'wpimages/'
	];
		
	$cms_list[280] = [
		'name' => 'Web Presence Builder',
		'meta_tag' => array('web presence builder', 'is_regex' => false)
	];
		
	$cms_list[281] = [
		'name' => 'Web Shop Manager',
		'link_tag' => array('//webshopmanager.com', 'is_regex' => false),
		'body_tag' => array('Web Shop Manager eCommerce', 'is_regex' => false)
	];
		
	$cms_list[282] = [
		'name' => 'WebSite Tonight',
		'meta_tag' => array('webSite tonight', 'is_regex' => false)
	];
		
	$cms_list[283] = [
		'name' => 'WebSphere Studio Homepage Builder',
		'meta_tag' => array('ibm websphere studio homepage builder', 'is_regex' => false)
	];
		
	$cms_list[284] = [
		'name' => 'Webflow',
		'meta_tag' => array('webflow', 'is_regex' => false),
		'link_tag' => array('webflow.', 'is_regex' => false),
		'img_tag' => '.webflow.com/',
		'script_tag' => array('.webflow.com/', 'is_attribute' => true),
		'body_tag' => array('<!-- This site was created in Webflow. http://www.webflow.com', 'is_regex' => false)
	];
		
	$cms_list[285] = [
		'name' => 'Weblication',
		'meta_tag' => array('weblication', 'is_regex' => false),
		'link_tag' => array('/weblication/', 'is_regex' => false),
		'img_tag' => '/weblication/',
		'script_tag' => array('/weblication/', 'is_attribute' => false)
	];
		
	$cms_list[286] = [
		'name' => 'Webs',
		'link_tag' => array('//static.websimages.com/', 'is_regex' => false),
		'img_tag' => '//static.websimages.com/',
		'script_tag' => array('webs = window.webs || {};', 'is_attribute' => false)
	];
		
	$cms_list[287] = [
		'name' => 'Websale',
		'meta_tag' => array('websale', 'is_regex' => false),
		'link_tag' => array('/websale', 'is_regex' => false),
		'img_tag' => '/websale',
		'script_tag' => array('/websale', 'is_attribute' => true)
	];
		
	$cms_list[288] = [
		'name' => 'WebsiteBuilder',
		'link_tag' => array('websitebuilder.com/', 'is_regex' => false),
		'script_tag' => array('websitebuilder.com', 'is_attribute' => false),
		'body_tag' => array('websitebuilder.com/', 'is_regex' => false)
	];
		
	$cms_list[289] = [
		'name' => 'WebSite X5',
		'meta_tag' => array('webSite x5', 'is_regex' => false),
		'script_tag' => array('x5engine.js', 'is_attribute' => true)
	];
		
	$cms_list[290] = [
		'name' => 'Websplanet',
		'meta_tag' => array('websplanet', 'is_regex' => false)
	];
		
	$cms_list[291] = [
		'name' => 'Webvision',
		'link_tag' => array('//www.abacusemedia.com/webvisioncloud', 'is_regex' => false),
		'body_tag' => array('">Webvision', 'is_regex' => false)
	];
		
	$cms_list[292] = [
		'name' => 'Weebly',
		'link_tag' => array('.weebly.com', 'is_regex' => false),
		'script_tag' => array('_W = _W || {}; _W.securePrefix=', 'is_attribute' => false)
	];
		
	$cms_list[293] = [
		'name' => 'Wheel CMS',
		'meta_tag' => array('wheelcms', 'is_regex' => false)
	];
		
	$cms_list[294] = [
		'name' => 'Wikispaces',
		'link_tag' => array('wikispaces.com/', 'is_regex' => false),
		'script_tag' => array('var wikispaces_isUserLoggedIn', 'is_attribute' => false),
		'body_tag' => array('WikispacesContent', 'is_regex' => false)
	];
		
	$cms_list[295] = [
		'name' => 'Wix',
		'header' => array(['x-wix-request-id', '^.*$', 'is_regex' => true], ['x-wix-server-artifact-id', '^.*$', 'is_regex' => true]),
		'meta_tag' => array('wix.com ', 'is_regex' => false),
		'link_tag' => array('//static.wixstatic.com/', 'is_regex' => false),
		'script_tag' => array('wixBiSession.viewerSessionId', 'is_attribute' => false),
		'body_tag' => array('X-Wix-Application-Instance-Id', 'is_regex' => false)
	];
		
	$cms_list[296] = [
		'name' => 'WiziShop',
		'header' => array(['server', 'wiziserver', 'is_regex' => false]),
		'body_tag' => array('id="powered-wizishop"', 'is_regex' => false)
	];
		
	$cms_list[297] = [
		'name' => 'WoltLab',
		'header' => array(['x-powered-by', 'plesklin', 'is_regex' => false]),
		'link_tag' => array('//www.woltlab.de', 'is_regex' => false),
		'script_tag' => array('var WCF_PATH =', 'is_attribute' => false),
		'body_tag' => array('com.woltlab.wcf', 'is_regex' => false)
	];
		
	$cms_list[298] = [
		'name' => 'XT-Commerce',
		'meta_tag' => array('xt:commerce', 'is_regex' => false)
	];
		
	$cms_list[299] = [
		'name' => 'Xara',
		'meta_tag' => array('xara', 'is_regex' => false)
	];
		
	$cms_list[300] = [
		'name' => 'XenForo',
		'link_tag' => array('xenforo.', 'is_regex' => false),
		'img_tag' => 'xenforo/',
		'script_tag' => array('xenforo', 'is_attribute' => true),
		'body_tag' => array('XenForo.Facebook.appId', 'is_regex' => false)
	];
		
	$cms_list[301] = [
		'name' => 'Xiuno BBS',
		'meta_tag' => array('xiuno', 'is_regex' => false),
		'link_tag' => array('//bbs.xiuno.com', 'is_regex' => false)
	];
	
	$cms_list[302] = [
		'name' => 'Xoops',
		'meta_tag' => array('xoops', 'is_regex' => false),
		'link_tag' => array('xoops.css', 'is_regex' => false),
		'script_tag' => array('/xoops.js', 'is_attribute' => true),
		'body_tag' => array('name="xoops_redirect"', 'is_regex' => false)
	];
		
	$cms_list[303] = [
		'name' => 'XpressEngine',
		'meta_tag' => array('xpressengine', 'is_regex' => false)
	];
		
	$cms_list[304] = [
		'name' => 'X‑Cart',
		'meta_tag' => array('x-cart', 'is_regex' => false)
	];
		
	$cms_list[305] = [
		'name' => 'YaBB',
		'link_tag' => array('/yabbfiles/', 'is_regex' => false),
		'img_tag' => '/yabbfiles/',
		'script_tag' => array('/yabb.js', 'is_attribute' => true),
		'body_tag' => array('<!-- YaBB', 'is_regex' => false)
	];
		
	$cms_list[306] = [
		'name' => 'Yahoo Small Business',
		'header' => array(['via', '.yahoo.com', 'is_regex' => false])
	];
		
	$cms_list[307] = [
		'name' => 'Yellow Pages Canada',
		'link_tag' => array('.yellowpages.ca/', 'is_regex' => false),
		'script_tag' => array('//static.yellowpages.ca/', 'is_attribute' => true)
	];
		
	$cms_list[308] = [
		'name' => 'Yola',
		'body_tag' => array('.yolacdn.net/', 'is_regex' => false)
	];
		
	$cms_list[309] = [
		'name' => 'ZMS',
		'meta_tag' => array('zms', 'is_regex' => false),
		'img_tag' => '/zms/',
		'script_tag' => array('/zms/', 'is_attribute' => true)
	];
		
	$cms_list[310] = [
		'name' => 'Zen Cart',
		'meta_tag' => array('zen cart', 'is_regex' => false)
	];
		
	$cms_list[311] = [
		'name' => 'Zendesk',
		'script_tag' => array('//static.zdassets.com/', 'is_attribute' => true),
		'body_tag' => array('.zendesk.com', 'is_regex' => false)
	];
		
	$cms_list[312] = [
		'name' => 'Zoho Sites',
		'meta_tag' => array('zoho sites', 'is_regex' => false)
	];
		
	$cms_list[313] = [
		'name' => 'Zyro',
		'meta_tag' => array('zyro', 'is_regex' => false)
	];
		
	$cms_list[314] = [
		'name' => 'b2evolution',
		'meta_tag' => array('b2evolution', 'is_regex' => false),
		'link_tag' => array('b2evolution', 'is_regex' => false)
	];
		
	$cms_list[315] = [
		'name' => 'blog.ir',
		'meta_tag' => array('blog.ir', 'is_regex' => false)
	];
		
	$cms_list[316] = [
		'name' => 'cloudrexx',
		'meta_tag' => array('contrexx', 'is_regex' => false)
	];
		
	$cms_list[317] = [
		'name' => 'concrete5',
		'meta_tag' => array('concrete5', 'is_regex' => false),
		'link_tag' => array('/concrete', 'is_regex' => false),
		'script_tag' => array('/concrete', 'is_attribute' => true),
		'body_tag' => array('var CCM_DISPATCHER_FILENAME', 'is_regex' => false)
	];
		
	$cms_list[318] = [
		'name' => 'docsify',
		'script_tag' => array('window.$docsify', 'is_attribute' => false),
		'body_tag' => array('/docsify', 'is_regex' => false)
	];
		
	$cms_list[319] = [
		'name' => 'dotCMS',
		'script_tag' => array('dotasset/', 'is_attribute' => true),
		'body_tag' => array('/dotCMS/', 'is_regex' => false)
	];
		
	$cms_list[320] = [
		'name' => 'e107',
		'link_tag' => array('/e107_', 'is_regex' => false),
		'img_tag' => '/e107_',
		'script_tag' => array('/e107_', 'is_attribute' => true)
	];
		
	$cms_list[321] = [
		'name' => 'ePages',
		'link_tag' => array('/epages/', 'is_regex' => false),
		'script_tag' => array('/epages/', 'is_attribute' => true),
		'body_tag' => array('"epages"', 'is_regex' => false)
	];
		
	$cms_list[322] = [
		'name' => 'eSyndiCat',
		'meta_tag' => array('esyndicat', 'is_regex' => false)
	];
		
	$cms_list[323] = [
		'name' => 'eZ Publish',
		'meta_tag' => array('ez publish', 'is_regex' => false)
	];
		
	$cms_list[324] = [
		'name' => 'elcomCMS',
		'meta_tag' => array('elcomcms', 'is_regex' => false)
	];
		
	$cms_list[325] = [
		'name' => 'fCMS',
		'meta_tag' => array('fcms', 'is_regex' => false),
		'script_tag' => array('fcmsJs.', 'is_attribute' => false),
		'body_tag' => array('fCMS-Template', 'is_regex' => false)
	];
		
	$cms_list[326] = [
		'name' => 'iWeb',
		'meta_tag' => array('iweb', 'is_regex' => false),
		'script_tag' => array('iWebBlogMainPage', 'is_attribute' => false),
		'body_tag' => array('<meta name="iWeb-Build"', 'is_regex' => false)
	];
		
	$cms_list[327] = [
		'name' => 'kimsq',
		'meta_tag' => array('kimsq', 'is_regex' => false),
		'body_tag' => array('kimsq', 'is_regex' => false)
	];
		
	$cms_list[328] = [
		'name' => 'nopCommerce',
		'meta_tag' => array('nopcommerce', 'is_regex' => false),
		'body_tag' => array('nopcommerce', 'is_regex' => false)
	];
		
	$cms_list[329] = [
		'name' => 'onpublix CMS',
		'meta_tag' => array('onpublix', 'is_regex' => false)
	];
		
	$cms_list[330] = [
		'name' => '1C-Bitrix',
		'header' => array(['x-powered-cms', 'bitrix', 'is_regex' => false])
	];
		
	$cms_list[331] = [
		'name' => 'pTools',
		'meta_tag' => array('ptools', 'is_regex' => false)
	];
		
	$cms_list[332] = [
		'name' => 'phpwcms',
		'meta_tag' => array('phpwcms', 'is_regex' => false),
		'link_tag' => array('/phpwcms', 'is_regex' => false)
	];
		
	$cms_list[333] = [
		'name' => 'phpwind',
		'meta_tag' => array('phpwind', 'is_regex' => false),
		'link_tag' => array('phpwind', 'is_regex' => false)
	];
		
	$cms_list[334] = [
		'name' => 'plentymarkets',
		'meta_tag' => array('plentymarkets', 'is_regex' => false)
	];
		
	$cms_list[335] = [
		'name' => 'uCoz',
		'link_tag' => array('.ucoz.', 'is_regex' => false),
		'script_tag' => array('.ucoz.net/', 'is_attribute' => true)
	];
	/*
		-f  Input file (ex: my_file.txt)
        -l  List of cms by id (ex: 0,1,2...)
		--no-color  Console output without coloration
		--threads  Total of connection asynchronous (by default 10, maximum 100)
		--timeout  Time to wait before connection close for no response (in seconds)
		--with-unknow-results  Write the unknow result in a .txt file
	*/
	$options = getopt('f:l:', ['no-color', 'threads:', 'ignore:', 'full-details', 'timeout:', 'with-unknow-results']);
	$config = array(
        'input_file' => !empty($options['f']) ? $options['f'] : 'list.txt',
		'cms_list' => isset($options['l']) ? explode(',', $options['l']) : [],
		'no-color' => isset($options['no-color']) ? false : true,
        'threads' => !empty($options['threads']) && (int) $options['threads'] ? intval($options['threads']) > 100 ? 100 : intval($options['threads']) : 10,
        'timeout' => !empty($options['timeout']) && (int) $options['timeout'] ? intval($options['timeout']) : 20,
		'write_unknown_result' => isset($options['with-unknow-results']) ? true : false
    );
	$cms_total_loaded = 0;
	$cms_list_id_to_load = [];
	if (empty($config['cms_list'])){
		for ($i = 0; $i < count($cms_list); $i++){
			if (in_array($i, $config['ignore_list'])){
				$cms_list_id_to_load[$i] = false;
			}else{
				$cms_list_id_to_load[$i] = true;
				$cms_total_loaded += 1;
			}
		}
	}else{
		for ($i = 0; $i < count($config['cms_list']); $i++){
			$cms_list_id_to_load[intval($config['cms_list'][$i])] = true;
			$cms_total_loaded += 1;
		}
		for ($i = 0; $i < count($cms_list); $i++){
			if(!isset($cms_list_id_to_load[$i])) $cms_list_id_to_load[$i] = false;
		}
	}
	is_dir(RESULTS_FOLDER) || mkdir(RESULTS_FOLDER);
	if ($cms_total_loaded > 0){
		$handle = fopen($config['input_file'], 'r');
		if ($handle){
			$i = 0;
			$curl = new Zebra_cURL();
			$curl->threads = $config['threads'] > 100 ? 100 : $config['threads'];
			$curl->option(array(CURLOPT_TIMEOUT => $config['timeout']));
			$lineID = 0;
			$url_to_check = array();
			$total_lines = count_lines($config['input_file']);
			echo setColor('Threads : '.$config['threads'], $config['no-color'] ? 'warning' : '').PHP_EOL;
			echo setColor('Total file lines : '.$total_lines, $config['no-color'] ? 'warning' : '').PHP_EOL;
			echo setColor('Total cms loaded : '.$cms_total_loaded, $config['no-color'] ? 'warning' : '').PHP_EOL;
			echo '--------------------------------------------------------------------------------'.PHP_EOL;
			while (($uri = fgets($handle)) !== false){
				if (!empty($uri)){
					$url_to_check[] = trim($uri);
					if ($i === $config['threads'] - 1 || $lineID + 1 === $total_lines){
						$curl->get($url_to_check, 'check', $cms_list, $cms_list_id_to_load, $config['write_unknown_result'], $config['no-color']);
						$i = 0;
						$url_to_check = array();
					}
				}
				$i++;
				$lineID++;
			}
		} else {
			echo setColor('An error was occurred on file opening '.$config['input_file'], $with_color ? 'danger' : '').PHP_EOL;
		}
		fclose($handle);
		unset($curl); 
	}  
	
	function check(object $request, array $cms_list, array $cms_list_id_to_load, bool $allow_unknow_result, bool $with_color){
		if ($request->response[1] == CURLE_OK){
            if ($request->info['http_code'] < 400){
                $total_cms = count($cms_list);
				# Header treatment
				for ($i = 0; $i < count($request->headers['responses']); $i++){
					$header_array = array_change_key_case($request->headers['responses'][$i], CASE_LOWER);
                    for ($_i = 0; $_i < $total_cms; $_i++){
                        if (!empty($cms_list[$_i]['header'])){
                            foreach ($cms_list[$_i]['header'] as $header){
								if ($cms_list_id_to_load[$_i] && isset($header_array[$header[0]])){
									if ($header['is_regex']){
										$regex_pattern = $header[1];
										if (preg_match("/$regex_pattern/", $header_array[$header[0]])){
											write2File(RESULTS_FOLDER.__($cms_list[$i]['name']).'.txt', $request->info['original_url']);
											echo setColor($cms_list[$_i]['name'].' ('.$_i.'): '.$request->info['original_url'], $with_color ? 'success' : '').PHP_EOL;
											return;
										}
									}else{
										if (strpos(__($header_array[$header[0]]), $header[1]) !== false){
											write2File(RESULTS_FOLDER.__($cms_list[$_i]['name']).'.txt', $request->info['original_url']);
											echo setColor($cms_list[$_i]['name'].' ('.$_i.'): '.$request->info['original_url'], $with_color ? 'success' : '').PHP_EOL;
											# $options['full-details'] ? : 
											return;
										}
									}
                                }
                            }
                        }
                    }
				}
                # Body treatment
                $dom = new DOMDocument;
                @$dom->loadHTML($request->body);
                $xp = new DOMXpath($dom);
				$xp->registerNamespace('php', 'http://php.net/xpath');
				$xp->registerPhpFunctions();
				# Meta tag
                $meta_tags['generator'] = $xp->query("//meta[contains(php:functionString('strtolower', @name), 'generator')]");
				$meta_tags['author'] = $xp->query("//meta[contains(php:functionString('strtolower', @name), 'author')]");
				$meta_tags['engine-copyright'] = $xp->query("//meta[contains(php:functionString('strtolower', @name), 'engine-copyright')]");
				$meta_tags['page-type'] = $xp->query("//meta[contains(php:functionString('strtolower', @name), 'page-type')]");
				$meta_tags['csrf-param'] = $xp->query("//meta[contains(php:functionString('strtolower', @name), 'csrf-param')]");
                $meta_tags_name = array_keys($meta_tags);
                for ($i = 0; $i < count($meta_tags_name); $i++){
                    if (count($meta_tags[$meta_tags_name[$i]]) > 0){
                        for ($_i = 0; $_i < $total_cms; $_i++){
                            if ($cms_list_id_to_load[$_i] && !empty($cms_list[$_i]['meta_tag'][0])){
                                if ($cms_list[$_i]['meta_tag']['is_regex']){
                                    $regex_pattern = $cms_list[$_i]['meta_tag'][0];
                                    if (preg_match("/$regex_pattern/", $meta_tags[$meta_tags_name[$i]]->item(0)->getAttribute('content'))){
                                        write2File(RESULTS_FOLDER.__($cms_list[$_i]['name']).'.txt', $request->info['original_url']);
										echo setColor($cms_list[$_i]['name'].' ('.$_i.'): '.$request->info['original_url'], $with_color ? 'success' : '').PHP_EOL;
                                        return;
                                    }
                                }else{
                                    if (strpos(__($meta_tags[$meta_tags_name[$i]]->item(0)->getAttribute('content')), $cms_list[$_i]['meta_tag'][0]) !== false){
                                        write2File(RESULTS_FOLDER.__($cms_list[$_i]['name']).'.txt', $request->info['original_url']);
										echo setColor($cms_list[$_i]['name'].' ('.$_i.'): '.$request->info['original_url'], $with_color ? 'success' : '').PHP_EOL;
                                        return;
                                    }
                                }
                            }
                        }
                    }
                }
                # Link tag
				$link_tags = $xp->query("//@href");
                $total_items = count($link_tags);
                if ($total_items > 0){
                    for ($i = 0; $i < $total_cms; $i++){
                        if ($cms_list_id_to_load[$i] && !empty($cms_list[$i]['link_tag'][0])){
                            for ($_i = 0; $_i < $total_items; $_i++){
                                if ($cms_list[$i]['link_tag']['is_regex']){
									$regex_pattern = $cms_list[$i]['link_tag'][1]; #----------
                                    if (preg_match("/$regex_pattern/", __($link_tags->item($_i)->nodeValue))){
                                        write2File(RESULTS_FOLDER.__($cms_list[$i]['name']).'.txt', $request->info['original_url']);
										echo setColor($cms_list[$i]['name'].' ('.$i.'): '.$request->info['original_url'], $with_color ? 'success' : '').PHP_EOL;
                                        return;
                                    }
                                }else{
									if (strpos(__($link_tags->item($_i)->nodeValue), $cms_list[$i]['link_tag'][0]) !== false){
                                        write2File(RESULTS_FOLDER.__($cms_list[$i]['name']).'.txt', $request->info['original_url']);
										echo setColor($cms_list[$i]['name'].' ('.$i.'): '.$request->info['original_url'], $with_color ? 'success' : '').PHP_EOL;
                                        return;
                                    }
								}
                            } 
                        }
                    }
                }
                # Img tag
                $img_tags = $xp->query("//img");
                $total_items = count($img_tags);
                if ($total_items > 0){
                    for ($i = 0; $i < $total_cms; $i++){
                        if ($cms_list_id_to_load[$i] && !empty($cms_list[$i]['img_tag'])){
                            for ($_i = 0; $_i < $total_items; $_i++){
                                if (strpos(__($img_tags->item($_i)->getAttribute('src')), $cms_list[$i]['img_tag']) !== false){
                                    write2File(RESULTS_FOLDER.__($cms_list[$i]['name']).'.txt', $request->info['original_url']);
                                    echo setColor($cms_list[$i]['name'].' ('.$i.'): '.$request->info['original_url'], $with_color ? 'success' : '').PHP_EOL;
                                    return;
                                }
                            } 
                        }
                    }
                }
                # Script tag
                $script_tags = $xp->query("//script");
                $total_items = count($script_tags);
                if ($total_items > 0){
                    for ($i = 0; $i < $total_cms; $i++){
                        if($cms_list_id_to_load[$i] && !empty($cms_list[$i]['script_tag'][0])){
                            for($_i = 0; $_i < $total_items; $_i++){
                                if($cms_list[$i]['script_tag']['is_attribute'] ? !empty($script_tags->item($_i)->getAttribute('src')) && 
                                    strpos(__($script_tags->item($_i)->getAttribute('src')), $cms_list[$i]['script_tag'][0]) !== false : strpos($script_tags->item($_i)->nodeValue, $cms_list[$i]['script_tag'][0]) !== false){
                                        write2File(RESULTS_FOLDER.__($cms_list[$i]['name']).'.txt', $request->info['original_url']);
										echo setColor($cms_list[$i]['name'].' ('.$i.'): '.$request->info['original_url'], $with_color ? 'success' : '').PHP_EOL;
                                        return;
                                }
                            } 
                        }
                    }
				}
				# Body tag
				for ($i = 0; $i < $total_cms; $i++){
					if($cms_list_id_to_load[$i] && !empty($cms_list[$i]['body_tag'][0])){
						if ($cms_list[$i]['body_tag']['is_regex']){
							$regex_pattern = $cms_list[$i]['body_tag'][0];
							if (preg_match("/$regex_pattern/", $request->body)){
								write2File(RESULTS_FOLDER.__($cms_list[$i]['name']).'.txt', $request->info['original_url']);
								echo setColor($cms_list[$i]['name'].' ('.$i.'): '.$request->info['original_url'], $with_color ? 'success' : '').PHP_EOL;
								return;
							}
						}else{
							if (strpos($request->body, $cms_list[$i]['body_tag'][0]) !== false){
								write2File(RESULTS_FOLDER.__($cms_list[$i]['name']).'.txt', $request->info['original_url']);
								echo setColor($cms_list[$i]['name'].' ('.$i.'): '.$request->info['original_url'], $with_color ? 'success' : '').PHP_EOL;
								return;
							}
						}
					}
				}
				if ($allow_unknow_result) write2File(RESULTS_FOLDER.'unknow.txt', $request->info['original_url']);
			}
		}else{ 
			echo setColor('Bad request : '.$request->info['original_url'], $with_color ? 'danger' : '').PHP_EOL;
		}
	}

	function count_lines(string $file){
        $total_lines = 0;
        if (file_exists($file)){
            $handle = fopen($file, "r");
            while (!feof($handle)){ if (fgets($handle) !== false) $total_lines += 1; }
            fclose($handle);
        } return $total_lines;
    }

    function write2File(string $file, string $text){
        file_put_contents(str_replace(chr(32), '-', $file), $text.PHP_EOL, FILE_APPEND | LOCK_EX);
    }

    function __(string $value){
        return strtolower($value);
    }

    function setColor(string $text, string $type = ''){
		if (empty($type)){ return $text; }
        if ($type === 'success'){ return "\e[0;32;40m[+] ".$text."\e[0m"; }
        if ($type === 'danger'){ return "\e[0;31;40m[-] ".$text."\e[0m";  }
        if ($type === 'warning'){ return "\e[0;33;40m[!] ".$text."\e[0m"; }
    }