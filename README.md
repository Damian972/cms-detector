# Cms-detector

## CMS supported (320+):
```YAML
Wordpress, Drupal, Joomla, Magento, Webnode, Shopsys, Shoptet, vBulletin, Liferay, A-Blog Cms, AVE cms, Adobe Dreamweaver, Adobe GoLive, Adobe Muse, Advantshop, Agility CMS, Alterian, Amiro.CMS, Apache Lenya, ASP.NET, Backdrop CMS, BaseKit, Big Cartel, Bigace, Blogger, Bolt, Bootply, Bricolage CMS, C1 CMS, CM4all, CMS-Tool, CMS Made Simple, CMSimple, CMSimple_XH, CanalBlog, Cargo, Centricity, Chevereto, Ciashop, CivicEngage, CoffeeCup, CommonSpot, Contao, Contenido CMS, Contensis CMS, ContentXXL, Convio, Coppermine, CoreMedia CMS, Corepublish,  Crowd Fusion, CubeCart, DIAFAN.CMS, DNN, Danneo, DataLife Engine, Dealer.com, DealerFire, Demandware, Dim Works,  Discourse, Hycus, Discuz!, DokuWiki, DotClear, DotEasy, LiteCart, DreamCommerce, Duda, Dynamicweb, E+ CMS, E-monsite, ECShop, Easysite, EditPlus, Edito, Enonic CMS, Episerver, Everweb, Fork CMS, Zeta Producer, Flarum, Format, FrontPage, GX Web Manager, Geeklog, GetSimple CMS, Ghost, GoDaddy Website Builder, Google Sites, Government Site Builder, GraffitiCMS, Grav CMS, Hexo, Homes.com Fusion, Homestead, HostCMS, HostedShop, HubSpot, Hugo, HumHub, IPS Community Suite, ImageCMS, Immediacy, Imperia CMS, ImpressCMS, ImpressPages CMS, Infopark CMS Fiona, InstantCMS, InterRed, Intershop, JTL-Shop, Jadu CMS, Jekyll, JetShop, Jieqi CMS, Jimdo, JustSystems Homepage Builder, KVS CMS, Koken, Komodo CMS, Kooboo, Kryptronic, Labrador CMS, Lauyan TOWeb, LeadPages, LightCMS, Lightspeed, LiveEdit, Livedoor Blog, Livestreet CMS, Locomotive CMS, LogiCommerce, Loja Integrada, MONO, Mabisy, MakeShop, Mambo, MaxSite CMS, MediaWiki, Medium, Melody, Metro Publisher, Microsoft Word, Midgard CMS, Mijnwebwinkel, Mintox, Miva Merchant, Mobirise, Modified Shopsoftware, Modx CMS, MoinMoin, Movable Type, Mura, Méthode, NQcontent, Nation Builder, Neos, NetObjects, NetSuite, Netvolution, Nextcloud, Ning, Nodebb, Notepad++, Nucleus CMS, NukeViet, OU Campus, OXID eSales, Octopress, Odoo, One.com, Open CMS, Open Journal Systems, OpenNemas, OpenOffice, Orchard, Orthodox Web Solutions, Osclass, Overblog, Oxatis, PHP-Fusion, PHP-Nuke, PHP Link Directory, PHPShop, PHPVibe, PageCloud, Pagekit, Pangea CMS, Parallels Presence Builder, Pelican, Perch, Percussion, Pimcore, Piwigo, Plone, PowerBoutique, PrestaShop, ProcessWire, Pydio, Quick.CMS, Quick.Cart, RCMS, RVsitebuilder, RapidWeaver, Ready Pro Ecommerce, Ruby on Rails, SAM, SNworks, SUMOshop, Salesforce, Sana Commerce, Sandvox, SchoolSitePro, Seamless CMS, SeoToaster, Serendipity, Setup.ru, SharePoint, ShopFactory, Shopify, Shoptet, Shopware, Showoff, SilverStripe CMS, Simple Machines Forum, Siquando, SiteDirect, SiteKreator, SitePad, SiteSpinner, Sitefinity, Sitonline, Sitoo, SmartEtailing, SmartStore.NET, SmugMug, SocialEngine, Sparkle CMS, Spip, Squarespace, Squiz, Strikingly, Sulu CMS, Tailbase, Tangora Web CMS, Telligent, Tempest, Textalk Webshop, Textpattern CMS, ThinkCMF, ThinkPHP, Ticimax, Tiki Wiki CMS, Tilda, Trellix, Tumblr, TypePad, Typecho, Typesetter, Typo3, UBB.threads, UMI.CMS, Ultimize CMS, Umbraco, Vanilla Forums, Vigbo, Vision, Visual Studio, Visualsoft, Vivvo, Volusion, WMaker, WYSIWYG Web Builder, Web 2 Date, WebAcappella, Web Commander, WebGUI, Web Page Maker, WebPlus, Web Presence Builder, Web Shop Manager, WebSite Tonight, WebSphere Studio Homepage Builder, Webflow, Weblication, Webs, Websale, WebsiteBuilder, WebSite X5, Websplanet, Webvision, Weebly, Wheel CMS, Wikispaces, Wix, WiziShop, WoltLab, XT-Commerce, Xara, XenForo, Xiuno BBS, Xoops, XpressEngine, X‑Cart, YaBB, Yahoo Small Business, Yellow Pages Canada, Yola, ZMS, Zen Cart, Zendesk, Zoho Sites, Zyro, b2evolution, blog.ir, cloudrexx, concrete5, docsify, dotCMS, e107, ePages, eSyndiCat, eZ Publish, elcomCMS, fCMS, iWeb, kimsq, nopCommerce, onpublix CMS, 1C-Bitrix, pTools, phpwcms, phpwind, plentymarkets, uCoz.
```
## Usage :
* Detect all cms supported:
```YAML
>>> php cms-detector.php -f list.txt --threads 100 --with-unknow-results
```
* Detect a custom list of cms (Wordpress, Drupal, Joomla...):
```YAML
>>> php cms-detector.php -f list.txt -l 0,2,3,52 
```
* Some options :
```YAML
-f  Input file (ex: my_file.txt)
-l  List of cms by id (ex: 0,1,2...)
--threads  Total of asynchronous connections (by default 10, maximum 100)
--timeout  Time to wait before connection close for no response (in seconds)
--with-unknow-results  Write the unknow result in a .txt file
```
* **Notes : require [Zebra_Curl](https://github.com/stefangabos/Zebra_cURL)**
```YAML
composer require stefangabos/Zebra_cURL
```