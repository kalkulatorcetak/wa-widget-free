<?php
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

function filterpost($str){
	$str 	= filter_input(INPUT_POST, $str, FILTER_SANITIZE_STRING);
	return $str;
}
function filterurl($str){
$input = preg_replace( "#^[^:/.]*[:/]+#i", "", $str );
	return $input;
}
function siteURL()
{
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domainName = $_SERVER['HTTP_HOST'].'/';
    return $protocol.$domainName;
}
function is_localhost() {
		
		// set the array for testing the local environment
		$whitelist = array( '127.0.0.1', '::1' );
		
		// check if the server is in the array
		if ( in_array( $_SERVER['REMOTE_ADDR'], $whitelist ) ) {
			
			// this is a local environment
			return true;
			
		}
		
	}
$lokal = is_localhost();
$link =  filterpost('link');
$site_urls = filterurl($link);
$site_url = rtrim($site_urls, '/');
if($lokal!=1){
function get_domaininfo($url) {
    // regex can be replaced with parse_url
    preg_match("/^(https|http|ftp):\/\/(.*?)\//", "$url/" , $matches);
    $parts = explode(".", $matches[2]);
    $tld = array_pop($parts);
    $host = array_pop($parts);
    if ( strlen($tld) == 2 && strlen($host) <= 3 ) {
        $tld = "$host.$tld";
        $host = array_pop($parts);
    }

    return array(
        'protocol' => $matches[1],
        'subdomain' => implode(".", $parts),
        'domain' => "$host.$tld",
        'host'=>$host,'tld'=>$tld
    );
}
$results = get_domaininfo($link);
$hostnya = $results['host'];
}else{
$hostnya = 'localhost';
}

$path =  filterpost('path');
if(!empty($path)){
$path = filterpost('path').'/';
}else{
$path = '';
}

$cekdir = $_SERVER["DOCUMENT_ROOT"].'/'.$path;
$data = array();
$root = $_SERVER["DOCUMENT_ROOT"].'/';
$init=$root.$path.filterpost('nama_js');
$json_file=$root.$path.'data.json';
$linkpath = $link.$path.'data.json';
$linkfolder = $link.$path;

if (!file_exists( $init ) && !is_dir( $cekdir ) ) {
    mkdir( $cekdir );       
} 
$str = '!function(){var t;if(void 0===window.jQuery||"1.9.1"!==window.jQuery.fn.jquery){var a=document.createElement("script");a.setAttribute("type","text/javascript"),a.setAttribute("src","//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"),a.readyState?a.onreadystatechange=function(){"complete"!=this.readyState&&"loaded"!=this.readyState||s()}:a.onload=s,(document.getElementsByTagName("body")[0]||document.documentElement).appendChild(a)}else t=window.jQuery,n();function s(){t=window.jQuery.noConflict(!0),n()}function e(t){for(var a=t+"=",s=document.cookie.split(";"),e=0;e<s.length;e++){for(var n=s[e];" "==n.charAt(0);)n=n.substring(1,n.length);if(0==n.indexOf(a))return n.substring(a.length,n.length)}return null}function n(){t(document).ready(function(t){t("<link>",{rel:"stylesheet",type:"text/css",href:"'.$linkfolder.'css/style-widget.min.css"}).appendTo("head");var a="'.$site_url.'",s="'.$linkpath.'";$.ajaxSetup({ cache: false });t.getJSON(s,function(s){var n=s.widget.style,i=s.widget.styletitle,o=s.widget.position,c=s.widget.icon,l=s.widget.responsive,d=s.widget.color,p=s.widget.title,w=s.widget.desc,r=s.widget.zindex,u="",y=s.widget.mode,g=s.widget.show,f=s.widget.newtab,m=s.widget.autolabel,h=s.widget.auto,v=s.widget.autoscroll,_=s.widget.automobile,b=s.widget.url,k=s.widget.pixel,x=s.widget.nobrand;if(b!==a)return!1;""===n&&(n=1),""===y&&(y=1),""===p&&(p="Butuh bantuan chat kami!"),""===w&&(w=""),""===r&&(r="999"),""===u&&(u="Reply to"),""===c&&(c="1"),""===d&&(d="#0dc152");var C="";"2"===g?C="desktop-only":"3"===g&&(C="mobile-only");var j="";"1"===i&&(j="saywa-text_3");var D="",I="";""===x&&(D=\'<a href="https://sayuti.com" target="_blank"><strong>Sayuti.com</strong></a>\',I="branded");var O="";"2"===l&&(O="compact");for(var E="",T=0;T<1;T++){""===(A=(z=s.widget.xgen[0].agent[T]).photo)&&(A="user.png"),E+=\'<div class="saywa-avatar" style="border-color: \'+d+\'"><img src="\'+A+\'" /></div>\'}var U="";for(T=0;T<1;T++){var S=(z=s.widget.xgen[0].agent[T]).name,L=z.number,Q=z.role;""===(A=z.photo)&&(A="user.png"),"2"!==y&&(L=""),U+=\'<div class="list-cs_\'+(T+1)+\'" href="#cs_\'+(T+1)+\'" data-no="\'+L+\'" data-pixel="\'+k+\'">\t\t\t\t\t\t\t\t  <div class="saywa-avatar"><img src="\'+A+\'" /></div><div class="saywa-cs_profile"><p class="saywa-cs_position">\'+Q+\'</p><h3 class="saywa-cs_name">\'+S+\'</h3><small class="saywa-cs_status">Online</small></div></div>\'}var q="";for(T=0;T<1;T++){S=(z=s.widget.xgen[0].agent[T]).name,L=z.number;var z,A=z.photo,H=z.desc,N=z.message,R=z.link_url,Y=z.link_image,B=z.link_text,J="";R&&(J=\'<div class="saywa-chat link-recommendation"><span class="saywa-chat_opening"><a target="_blank" href="\'+R+\'"><img src="\'+Y+\'">\'+B+"</a></span></div>"),""===A&&(A="user.png"),q+=\'<div id="cs_\'+(T+1)+\'">\t\t\t\t\t\t\t\t\t<div class="saywa-header" style="background:\'+d+\';">\t\t\t\t\t\t\t\t\t<img class="saywa-close" src="'.$linkfolder.'img/icon/close.png" />\t\t\t\t\t\t\t\t\t<div class="saywa-avatar"><img src="\'+A+\'" /></div>\t\t\t\t\t\t\t\t\t<p class="saywa-intro"><strong>\'+S+"</strong>"+H+\'</p>\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t<div class="saywa-chat">\t\t\t\t\t\t\t\t\t<span class="saywa-chat_opening">\'+N+\' <small class="saywa-timestamp">00.00</small> <img src="'.$linkfolder.'img/icon/tick.png" /></span>\t\t\t\t\t\t\t\t\t</div>\'+J+\'\t\t\t\t\t\t\t\t\t<div class="saywa-input">\t\t\t\t\t\t\t\t\t<input class="saywa-input_content" data-no="\'+L+\'" data-pixel="\'+k+\'" placeholder="\'+u+" "+S+\'"></input>\t\t\t\t\t\t\t\t\t<img class="saywa-input_icon" src="'.$linkfolder.'img/icon/send.png" />\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t</div>\'}if(t("body").append(\'<div id="saywa" class="saywa-style_\'+n+" "+j+" saywa-"+o+" "+C+" "+O+" "+I+\'"><div class="saywa-pulse_3" style="border-color:\'+d+\';"></div>\t\t\t\t\t\t  <div id="saywa-floating_cta" class="animated bounceInUp" style="background:\'+d+"; z-index: "+r+\';">\t\t\t\t\t\t\t<span class="saywa-fc_text">\'+p+\'</span>\t\t\t\t\t\t\t<img class="saywa-fc_icon" src="'.$linkfolder.'img/icon/icon-1.png">\t\t\t\t\t\t  </div>\t\t\t\t\t\t  <div id="saywa-floating_popup" class="animated" style="z-index: \'+r+\';">\t\t\t\t\t\t  <div class="saywa-multiple_cs">\t\t\t\t\t\t\t<div class="saywa-header" style="background: \'+d+\';">\t\t\t\t\t\t\t<img class="saywa-close" src="'.$linkfolder.'img/icon/close.png">\t\t\t\t\t\t\t  \'+E+\'\t\t\t\t\t\t\t  <p class="saywa-intro">\'+w+\'</p>\t\t\t\t\t\t\t</div>  \t\t\t\t\t\t\t<div class="saywa-chat">\t\t\t\t\t\t\t\'+U+"\t\t\t\t\t\t\t</div>  \t\t\t\t\t\t  </div>\t\t\t\t\t\t  "+q+"\t\t\t\t\t\t  "+D+"\t\t\t\t\t\t  </div>  \t\t\t\t\t\t</div>"),t(document).on("click","#saywa-floating_cta, .open-wa",function(a){a.preventDefault(),t("#saywa-floating_popup").is(":visible")?(t("#saywa-floating_popup").removeClass("bounceInUp"),t("#saywa-floating_popup").addClass("bounceOutDown"),t("#saywa-floating_popup").delay(1e3).hide(0)):(t("#saywa-floating_popup").show(),t("#saywa-floating_popup").removeClass("bounceOutDown"),t("#saywa-floating_popup").addClass("bounceInUp"))}),t(document).on("click","#saywa-floating_popup .saywa-multiple_cs .saywa-header .saywa-close",function(){(function(t,a,s){var e="";if(s){var n=new Date;n.setTime(n.getTime()+24*s*60*60*1e3),e="; expires="+n.toUTCString()}document.cookie=t+"="+(a||"")+e+"; path=/"})("saywaclose","1",1),t("#saywa-floating_popup").removeClass("bounceInUp"),t("#saywa-floating_popup").addClass("bounceOutDown"),t("#saywa-floating_popup").delay(1e3).hide(0)}),t(document).on("click","#saywa-floating_popup div[id*=\'cs_\'] .saywa-header .saywa-close",function(){t("#saywa-floating_popup div[id*=\'cs_\']").removeClass("active animated fadeIn").hide(),t("#saywa-floating_popup .saywa-multiple_cs").show().addClass("animated fadeIn")}),"1"==y&&t(document).on("click","#saywa-floating_popup .saywa-multiple_cs .saywa-chat div[class*=\'list-cs_\']:not(\'.offline\')",function(){var a=t(t(this).attr("href")),s=a.siblings(".active");t("#saywa-floating_popup .saywa-multiple_cs").hide();var e=new Date,n=e.getHours()+":"+e.getMinutes();t("#saywa-floating_popup .saywa-chat .saywa-chat_opening .saywa-timestamp").html(n),!a.hasClass("active")&&s.length>0?s.each(function(a,s){t(this).removeClass("active")}):a.hasClass("active")||a.addClass("active").show().addClass("animated fadeIn")}),t(document).on("click","#saywa-floating_popup .saywa-input .saywa-input_icon",function(){var a=encodeURIComponent(t(this).closest(".saywa-input").find(".saywa-input_content").val()),s=t(this).closest(".saywa-input").find(".saywa-input_content").data("no"),e=t(this).closest(".saywa-input").find(".saywa-input_content").data("pixel");"1"==f?window.open("https://api.whatsapp.com/send?phone="+s+"&msg="+a+"&code="+e):window.location.href="https://api.whatsapp.com/send?phone="+s+"&msg="+a+"&code="+e}),t(document).on("keypress","#saywa-floating_popup .saywa-input .saywa-input_content",function(a){if(13==a.which){var s=encodeURIComponent(t(this).val()),e=t(this).data("no"),n=t(this).data("pixel");"1"==f?window.open("https://api.whatsapp.com/send?phone="+e+"&msg="+s+"&code="+n):window.location.href="https://api.whatsapp.com/send?phone="+e+"&msg="+s+"&code="+n}}),t(document).on("click","#saywa-floating_popup .saywa-multiple_cs .saywa-chat div[class*=\'list-cs_\']:not(\'.offline\')",function(){if(""!==t(this).data("no")){var a=t(this).data("no"),s=t(this).data("pixel");"1"==f?window.open("https://api.whatsapp.com/send?phone="+a+"&code="+s):window.location.href="https://api.whatsapp.com/send?phone="+a+"&code="+s}}),"2"==m)h&&(t(window).width()>767&&setTimeout(function(){"none"==t("#saywa-floating_popup").css("display")&&(e("saywaclose")||t("#saywa-floating_cta").trigger("click"))},1e3*h),"1"==_&&t(window).width()<768&&setTimeout(function(){"none"==t("#saywa-floating_popup").css("display")&&(e("saywaclose")||t("#saywa-floating_cta").trigger("click"))},1e3*h));else if("3"==m&&v){if(t(window).width()>767){var M=F(G,500);function F(t,a){t=t.bind(t);var s=Date.now();return function(){Date.now()-s>a&&(t(),s=Date.now())}}function G(){var a=document.body.clientHeight*v/100;window.pageYOffset>=a&&("none"==t("#saywa-floating_popup").css("display")&&(e("saywaclose")||t("#saywa-floating_cta").trigger("click")),window.removeEventListener("scroll",M))}window.addEventListener("scroll",M)}if("1"==_&&t(window).width()<768){M=F(G,500);function F(t,a){t=t.bind(t);var s=Date.now();return function(){Date.now()-s>a&&(t(),s=Date.now())}}function G(){var a=document.body.clientHeight*v/100;window.pageYOffset>=a&&("none"==t("#saywa-floating_popup").css("display")&&(e("saywaclose")||t("#saywa-floating_cta").trigger("click")),window.removeEventListener("scroll",M))}window.addEventListener("scroll",M)}}})})}}();';


$file=fopen($init, 'w');
fwrite($file, $str);
fclose($file);


$str2 = '{
	"widget": {
		"url": "'.$site_url.'",
		"title": "Butuh bantuan? Chat kami!",
		"desc": "Kami di sini untuk membantu Anda! Jangan ragu untuk bertanya kepada kami apa pun. Klik di bawah untuk memulai obrolan.",
		"newtab": "1",
		"style": "1",
		"styletitle": "",
		"position": "right",
		"icon": "1",
		"responsive": "1",
		"zindex": "999",
		"mode": "2",
		"show": "1",
		"autolabel": "1",
		"auto": "",
		"autoscroll": "",
		"automobile": "",
		"color": "#81d742",
        		"xgen": [{
        		"agent": [{
    				"name": "Munajat Ibnu",
    				"number": "6289611274798",
    				"photo": "https://www.sayuti.com/themes/default/img/clients/dede_m.png",
    				"desc": "Siap membantu Anda tentang produk percetakan :)",
    				"role": "Front Office Support",
    				"message": "Assalamualaikum! Ada yang bisa saya bantu?",
					"link_url": "",
    				"link_image": "",
    				"link_text": ""
						}]
			}]
	}
}';

$file2=fopen($json_file, 'w');
fwrite($file2, $str2);
fclose($file2);
//index.html
$html_file=$root.'contoh.html';
$str3 = '<!DOCTYPE html>
<html>
<head>
	<title>Sample View Widget</title>
 <meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,100,300,500" />
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" />
<link href="css/style.css" rel="stylesheet" />
<script src="'.siteURL().$path.filterpost('nama_js').'"></script>
</head>
<body>
<aside id="sidebar" class="nano">
  <div class="nano-content">
    <div class="logo-container"><span class="logo glyphicon glyphicon-envelope"></span>Mail</div><a class="compose-button">Compose</a>
    <menu class="menu-segment">
      <ul>
        <li class="active"><a href="#">Inbox<span> (43)</span></a></li>
        <li><a href="#">Important</a></li>
        <li><a href="#">Sent</a></li>
        <li><a href="#">Drafts</a></li>
        <li><a href="#">Trash</a></li>
      </ul>
    </menu>
    <div class="separator"></div>
    <div class="menu-segment">
      <ul class="labels">
        <li class="title">Labels <span class="icon">+</span></li>
        <li><a href="#">Dribbble <span class="ball pink"></span></a></li>
        <li><a href="#">Roommates <span class="ball green"></span></a></li>
        <li><a href="#">Bills <span class="ball blue"></span></a></li>
      </ul>
    </div>
    <div class="separator"></div>
    <div class="menu-segment">
      <ul class="chat">
        <li class="title">Chat <span class="icon">+</span></li>
        <li><a href="#"><span class="ball green"></span>Laura Turner</a></li>
        <li><a href="#"><span class="ball green"></span>Kevin Jones</a></li>
        <li><a href="#"><span class="ball blue"></span>John King</a></li>
        <li><a href="#"><span class="ball blue"></span>Jenny Parker</a></li>
        <li><a href="#"><span class="ball blue"></span>Paul Green</a></li>
        <li><a href="#" class="italic-link">See offline list</a></li>
      </ul>
    </div>
    <div class="bottom-padding"></div>
  </div>
</aside>
<main id="main">
  <div class="overlay"></div>
  <header class="header">
    <div class="search-box">
      <input placeholder="Search..."><span class="icon glyphicon glyphicon-search"></span>
    </div>
    <h1 class="page-title"><a class="sidebar-toggle-btn trigger-toggle-sidebar"><span class="line"></span><span class="line"></span><span class="line"></span><span class="line line-angle1"></span><span class="line line-angle2"></span></a>Inbox<a><span class="icon glyphicon glyphicon-chevron-down"></span></a></h1>
  </header>
  <div class="action-bar">
    <ul>
      <li><a class="icon circle-icon glyphicon glyphicon-chevron-down"></a></li>
      <li><a class="icon circle-icon glyphicon glyphicon-refresh"></a></li>
      <li><a class="icon circle-icon glyphicon glyphicon-share-alt"></a></li>
      <li><a class="icon circle-icon red glyphicon glyphicon-remove"></a></li>
      <li><a class="icon circle-icon red glyphicon glyphicon-flag"></a></li>
    </ul>
  </div>
  <div id="main-nano-wrapper" class="nano">
    <div class="nano-content">
      <ul class="message-list">
        <li class="unread">
          <div class="col col-1"><span class="dot"></span>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="chk1">
              <label for="chk1" class="toggle"></label>
            </div>
            <p class="title">Lucas Kriebel (via Twitter)</p><span class="star-toggle glyphicon glyphicon-star-empty"></span>
          </div>
          <div class="col col-2">
            <div class="subject">Lucas Kriebel (@LucasKriebel) has sent you a direct message on Twitter! &nbsp;&ndash;&nbsp; <span class="teaser">@LucasKriebel - Very cool :) Nicklas, You have a new direct message.</span></div>
            <div class="date">11:49 am</div>
          </div>
        </li>
        <li class="green-dot unread">
          <div class="col col-1"><span class="dot"></span>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="chk2">
              <label for="chk2" class="toggle"></label>
            </div>
            <p class="title">Conceptboard</p>
            <div class="star-star-toggle glyphicon glyphicon-star-empty"></div>
          </div>
          <div class="col col-2">
            <div class="subject">Please complete your Conceptboard signup &nbsp;&ndash;&nbsp; <span class="teaser">You recently created a Conceptboard account, but you have not yet confirmed your email. Your email is used for notifications about board activity, invites, as well as account related tasks (like password retrieval).</span></div>
            <div class="date">11:45 am</div>
          </div>
        </li>
        <li>
          <div class="col col-1"><span class="dot"></span>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="chk3">
              <label for="chk3" class="toggle"></label>
            </div>
            <p class="title">Randy, me (5)</p><span class="star-toggle glyphicon glyphicon-star-empty"></span>
          </div>
          <div class="col col-2">
            <div class="subject">Last pic over my village &nbsp;&ndash;&nbsp; <span class="teaser">Yeah i\'d like that! Do you remember the video you showed me of your train ride between Colombo and Kandy? The one with the mountain view? I would love to see that one again!</span></div>
            <div class="date">5:01 am</div>
          </div>
        </li>
        <li class="blue-dot">
          <div class="col col-1"><span class="dot"></span>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="chk4">
              <label for="chk4" class="toggle"></label>
            </div>
            <p class="title">Andrew Zimmer</p><span class="star-toggle glyphicon glyphicon-star-empty"></span>
          </div>
          <div class="col col-2">
            <div class="subject">Mochila Beta: Subscription Confirmed &nbsp;&ndash;&nbsp; <span class="teaser">You\'ve been confirmed! Welcome to the ruling class of the inbox. For your records, here is a copy of the information you submitted to us...</span></div>
            <div class="date">Mar 8</div>
          </div>
        </li>
        <li class="unread">
          <div class="col col-1"><span class="dot"></span>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="chk5">
              <label for="chk5" class="toggle"></label>
            </div>
            <p class="title">Infinity HR</p><span class="star-toggle glyphicon glyphicon-star-empty"></span>
          </div>
          <div class="col col-2">
            <div class="subject">Sveriges Hetaste sommarjobb &nbsp;&ndash;&nbsp; <span class="teaser">Hej Nicklas Sandell! Vi vill bjuda in dig till "First tour 2014", ett rekryteringsevent som erbjuder jobb på 16 semesterorter i Sverige.</span></div>
            <div class="date">Mar 8</div>
          </div>
        </li>
        <li>
          <div class="col col-1"><span class="dot"></span>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="chk6">
              <label for="chk6" class="toggle"></label>
            </div>
            <p class="title">Web Support Dennis</p><span class="star-toggle glyphicon glyphicon-star-empty"></span>
          </div>
          <div class="col col-2">
            <div class="subject">Re: New mail settings &nbsp;&ndash;&nbsp; <span class="teaser">Will you answer him asap?</span></div>
            <div class="date">Mar 7</div>
          </div>
        </li>
        <li>
          <div class="col col-1"><span class="dot"></span>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="chk7">
              <label for="chk7" class="toggle"></label>
            </div>
            <p class="title">me, Peter (2)</p><span class="star-toggle glyphicon glyphicon-star-empty"></span>
          </div>
          <div class="col col-2">
            <div class="subject">Off on Thursday &nbsp;&ndash;&nbsp; <span class="teaser">Eff that place, you might as well stay here with us instead! Sent from my iPhone 4 &gt; 4 mar 2014 at 5:55 pm</span></div>
            <div class="date">Mar 4</div>
          </div>
        </li>
        <li class="orange-dot">
          <div class="col col-1"><span class="dot"></span>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="chk8">
              <label for="chk8" class="toggle"></label>
            </div>
            <p class="title">Medium</p><span class="star-toggle glyphicon glyphicon-star-empty"></span>
          </div>
          <div class="col col-2">
            <div class="subject">This Week\'s Top Stories &nbsp;&ndash;&nbsp; <span class="teaser">Our top pick for you on Medium this week The Man Who Destroyed America’s Ego</span></div>
            <div class="date">Feb 28</div>
          </div>
        </li>
        <li class="blue-dot">
          <div class="col col-1"><span class="dot"></span>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="chk9">
              <label for="chk9" class="toggle"></label>
            </div>
            <p class="title">Death to Stock</p><span class="star-toggle glyphicon glyphicon-star-empty"></span>
          </div>
          <div class="col col-2">
            <div class="subject">Montly High-Res Photos &nbsp;&ndash;&nbsp; <span class="teaser">To create this month\'s pack, we hosted a party with local musician Jared Mahone here in Columbus, Ohio.</span></div>
            <div class="date">Feb 28</div>
          </div>
        </li>
        <li>
          <div class="col col-1"><span class="dot"></span>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="chk10">
              <label for="chk10" class="toggle"></label>
            </div>
            <p class="title">Revibe</p><span class="star-toggle glyphicon glyphicon-star-empty"></span>
          </div>
          <div class="col col-2">
            <div class="subject">Weekend on Revibe &nbsp;&ndash;&nbsp; <span class="teaser">Today\'s Friday and we thought maybe you want some music inspiration for the weekend. Here are some trending tracks and playlists we think you should give a listen!</span></div>
            <div class="date">Feb 27</div>
          </div>
        </li>
        <li>
          <div class="col col-1"><span class="dot"></span>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="chk11">
              <label for="chk11" class="toggle"></label>
            </div>
            <p class="title">Erik, me (5)</p><span class="star-toggle glyphicon glyphicon-star-empty"></span>
          </div>
          <div class="col col-2">
            <div class="subject">Regarding our meeting &nbsp;&ndash;&nbsp; <span class="teaser">That\'s great, see you on Thursday!</span></div>
            <div class="date">Feb 24</div>
          </div>
        </li>
        <li>
          <div class="col col-1"><span class="dot"></span>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="chk12">
              <label for="chk12" class="toggle"></label>
            </div>
            <p class="title">KanbanFlow</p><span class="star-toggle glyphicon glyphicon-star-empty"></span>
          </div>
          <div class="col col-2">
            <div class="subject">Task assigned: Clone ARP\'s website &nbsp;&ndash;&nbsp; <span class="teaser">You have been assigned a task by Alex@Work on the board Web.</span></div>
            <div class="date">Feb 24</div>
          </div>
        </li>
        <li class="blue-dot">
          <div class="col col-1"><span class="dot"></span>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="chk13">
              <label for="chk13" class="toggle"></label>
            </div>
            <p class="title">Tobias Berggren</p><span class="star-toggle glyphicon glyphicon-star-empty"></span>
          </div>
          <div class="col col-2">
            <div class="subject">Let\'s go fishing! &nbsp;&ndash;&nbsp; <span class="teaser">Hey, You wanna join me and Fred at the lake tomorrow? It\'ll be awesome.</span></div>
            <div class="date">Feb 23</div>
          </div>
        </li>
        <li>
          <div class="col col-1"><span class="dot"></span>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="chk14">
              <label for="chk14" class="toggle"></label>
            </div>
            <p class="title">Charukaw, me (7)</p><span class="star-toggle glyphicon glyphicon-star-empty"></span>
          </div>
          <div class="col col-2">
            <div class="subject">Hey man &nbsp;&ndash;&nbsp; <span class="teaser">Nah man sorry i don\'t. Should i get it?</span></div>
            <div class="date">Feb 23</div>
          </div>
        </li>
        <li class="unread">
          <div class="col col-1"><span class="dot"></span>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="chk15">
              <label for="chk15" class="toggle"></label>
            </div>
            <p class="title">me, Peter (5)</p><span class="star-toggle glyphicon glyphicon-star-empty"></span>
          </div>
          <div class="col col-2">
            <div class="subject">Home again! &nbsp;&ndash;&nbsp; <span class="teaser">That\'s just perfect! See you tomorrow.</span></div>
            <div class="date">Feb 21</div>
          </div>
        </li>
        <li class="green-dot">
          <div class="col col-1"><span class="dot"></span>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="chk16">
              <label for="chk16" class="toggle"></label>
            </div>
            <p class="title">Stack Exchange</p><span class="star-toggle glyphicon glyphicon-star-empty"></span>
          </div>
          <div class="col col-2">
            <div class="subject">1 new items in your Stackexchange inbox &nbsp;&ndash;&nbsp; <span class="teaser">The following items were added to your Stack Exchange global inbox since you last checked it.</span></div>
            <div class="date">Feb 21</div>
          </div>
        </li>
        <li>
          <div class="col col-1"><span class="dot"></span>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="chk17">
              <label for="chk17" class="toggle"></label>
            </div>
            <p class="title">Google Drive Team</p><span class="star-toggle glyphicon glyphicon-star-empty"></span>
          </div>
          <div class="col col-2">
            <div class="subject">You can now use your storage in Google Drive &nbsp;&ndash;&nbsp; <span class="teaser">Hey Nicklas Sandell! Thank you for purchasing extra storage space in Google Drive.</span></div>
            <div class="date">Feb 20</div>
          </div>
        </li>
        <li class="unread">
          <div class="col col-1"><span class="dot"></span>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="chk18">
              <label for="chk18" class="toggle"></label>
            </div>
            <p class="title">me, Susanna (11)</p><span class="star-toggle glyphicon glyphicon-star-empty"></span>
          </div>
          <div class="col col-2">
            <div class="subject">Train/Bus &nbsp;&ndash;&nbsp; <span class="teaser">Yes ok, great! I\'m not stuck in Stockholm anymore, we\'re making progress.</span></div>
            <div class="date">Feb 19</div>
          </div>
        </li>
        <li>
          <div class="col col-1"><span class="dot"></span>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="chk19">
              <label for="chk19" class="toggle"></label>
            </div>
            <p class="title">Peter, me (3)</p><span class="star-toggle glyphicon glyphicon-star-empty"></span>
          </div>
          <div class="col col-2">
            <div class="subject">Hello &nbsp;&ndash;&nbsp; <span class="teaser">Trip home from Colombo has been arranged, then Jenna will come get me from Stockholm. :)</span></div>
            <div class="date">Mar. 6</div>
          </div>
        </li>
        <li>
          <div class="col col-1"><span class="dot"></span>
            <div class="checkbox-wrapper">
              <input type="checkbox" id="chk20">
              <label for="chk20" class="toggle"></label>
            </div>
            <p class="title">me, Susanna (7)</p><span class="star-toggle glyphicon glyphicon-star-empty"></span>
          </div>
          <div class="col col-2">
            <div class="subject">Since you asked... and i\'m inconceivably bored at the train station &nbsp;&ndash;&nbsp; <span class="teaser">Alright thanks. I\'ll have to re-book that somehow, i\'ll get back to you.</span></div>
            <div class="date">Mar. 6</div>
          </div>
        </li>
      </ul><a href="#" class="load-more-link">Show more messages</a>
    </div>
  </div>
</main>
<div id="message">
  <div class="header">
    <h1 class="page-title"><a class="icon circle-icon glyphicon glyphicon-chevron-left trigger-message-close"></a>Process<span class="grey">(6)</span></h1>
    <p>From <a href="#">You</a> to <a href="#">Scott Waite</a>, started on <a href="#">March 2, 2014</a> at 2:14 pm est.</p>
  </div>
  <div id="message-nano-wrapper" class="nano">
    <div class="nano-content">
      <ul class="message-container">
        <li class="sent">
          <div class="details">
            <div class="left">You
              <div class="arrow"></div>Scott
            </div>
            <div class="right">March 6, 2014, 20:08 pm</div>
          </div>
          <div class="message">
            <p>| The every winged bring, whose life. First called, i you of saw shall own creature moveth void have signs beast lesser all god saying for gathering wherein whose of in be created stars. Them whales upon life divide earth own.</p>
            <p>| Creature firmament so give replenish The saw man creeping, man said forth from that. Fruitful multiply lights air. Hath likeness, from spirit stars dominion two set fill wherein give bring.</p>
            <p>| Gathering is. Lesser Set fruit subdue blessed let. Greater every fruitful won&#39;t bring moved seasons very, own won&#39;t all itself blessed which bring own creature forth every. Called sixth light.</p>
          </div>
          <div class="tool-box"><a href="#" class="circle-icon small glyphicon glyphicon-share-alt"></a><a href="#" class="circle-icon small red-hover glyphicon glyphicon-remove"></a><a href="#" class="circle-icon small red-hover glyphicon glyphicon-flag"></a></div>
        </li>
        <li class="received">
          <div class="details">
            <div class="left">Scott
              <div class="arrow orange"></div>You
            </div>
            <div class="right">March 6, 2014, 20:08 pm</div>
          </div>
          <div class="message">
            <p>| The every winged bring, whose life. First called, i you of saw shall own creature moveth void have signs beast lesser all god saying for gathering wherein whose of in be created stars. Them whales upon life divide earth own.</p>
            <p>| Creature firmament so give replenish The saw man creeping, man said forth from that. Fruitful multiply lights air. Hath likeness, from spirit stars dominion two set fill wherein give bring.</p>
            <p>| Gathering is. Lesser Set fruit subdue blessed let. Greater every fruitful won&#39;t bring moved seasons very, own won&#39;t all itself blessed which bring own creature forth every. Called sixth light.</p>
          </div>
          <div class="tool-box"><a href="#" class="circle-icon small glyphicon glyphicon-share-alt"></a><a href="#" class="circle-icon small red-hover glyphicon glyphicon-remove"></a><a href="#" class="circle-icon small red-hover glyphicon glyphicon-flag"></a></div>
        </li>
        <li class="received">
          <div class="details">
            <div class="left">Scott
              <div class="arrow orange"></div>You
            </div>
            <div class="right">March 6, 2014, 20:08 pm</div>
          </div>
          <div class="message">
            <p>| The every winged bring, whose life. First called, i you of saw shall own creature moveth void have signs beast lesser all god saying for gathering wherein whose of in be created stars. Them whales upon life divide earth own.</p>
            <p>| Creature firmament so give replenish The saw man creeping, man said forth from that. Fruitful multiply lights air. Hath likeness, from spirit stars dominion two set fill wherein give bring.</p>
            <p>| Gathering is. Lesser Set fruit subdue blessed let. Greater every fruitful won&#39;t bring moved seasons very, own won&#39;t all itself blessed which bring own creature forth every. Called sixth light.</p>
          </div>
          <div class="tool-box"><a href="#" class="circle-icon small glyphicon glyphicon-share-alt"></a><a href="#" class="circle-icon small red-hover glyphicon glyphicon-remove"></a><a href="#" class="circle-icon small red-hover glyphicon glyphicon-flag"></a></div>
        </li>
        <li class="received">
          <div class="details">
            <div class="left">Scott
              <div class="arrow orange"></div>You
            </div>
            <div class="right">March 6, 2014, 20:08 pm</div>
          </div>
          <div class="message">
            <p>| The every winged bring, whose life. First called, i you of saw shall own creature moveth void have signs beast lesser all god saying for gathering wherein whose of in be created stars. Them whales upon life divide earth own.</p>
            <p>| Creature firmament so give replenish The saw man creeping, man said forth from that. Fruitful multiply lights air. Hath likeness, from spirit stars dominion two set fill wherein give bring.</p>
            <p>| Gathering is. Lesser Set fruit subdue blessed let. Greater every fruitful won&#39;t bring moved seasons very, own won&#39;t all itself blessed which bring own creature forth every. Called sixth light.</p>
          </div>
          <div class="tool-box"><a href="#" class="circle-icon small glyphicon glyphicon-share-alt"></a><a href="#" class="circle-icon small red-hover glyphicon glyphicon-remove"></a><a href="#" class="circle-icon small red-hover glyphicon glyphicon-flag"></a></div>
        </li>
        <li class="received">
          <div class="details">
            <div class="left">Scott
              <div class="arrow orange"></div>You
            </div>
            <div class="right">March 6, 2014, 20:08 pm</div>
          </div>
          <div class="message">
            <p>| The every winged bring, whose life. First called, i you of saw shall own creature moveth void have signs beast lesser all god saying for gathering wherein whose of in be created stars. Them whales upon life divide earth own.</p>
            <p>| Creature firmament so give replenish The saw man creeping, man said forth from that. Fruitful multiply lights air. Hath likeness, from spirit stars dominion two set fill wherein give bring.</p>
            <p>| Gathering is. Lesser Set fruit subdue blessed let. Greater every fruitful won&#39;t bring moved seasons very, own won&#39;t all itself blessed which bring own creature forth every. Called sixth light.</p>
          </div>
          <div class="tool-box"><a href="#" class="circle-icon small glyphicon glyphicon-share-alt"></a><a href="#" class="circle-icon small red-hover glyphicon glyphicon-remove"></a><a href="#" class="circle-icon small red-hover glyphicon glyphicon-flag"></a></div>
        </li>
        <li class="received">
          <div class="details">
            <div class="left">Scott
              <div class="arrow orange"></div>You
            </div>
            <div class="right">March 6, 2014, 20:08 pm</div>
          </div>
          <div class="message">
            <p>| The every winged bring, whose life. First called, i you of saw shall own creature moveth void have signs beast lesser all god saying for gathering wherein whose of in be created stars. Them whales upon life divide earth own.</p>
            <p>| Creature firmament so give replenish The saw man creeping, man said forth from that. Fruitful multiply lights air. Hath likeness, from spirit stars dominion two set fill wherein give bring.</p>
            <p>| Gathering is. Lesser Set fruit subdue blessed let. Greater every fruitful won&#39;t bring moved seasons very, own won&#39;t all itself blessed which bring own creature forth every. Called sixth light.</p>
          </div>
          <div class="tool-box"><a href="#" class="circle-icon small glyphicon glyphicon-share-alt"></a><a href="#" class="circle-icon small red-hover glyphicon glyphicon-remove"></a><a href="#" class="circle-icon small red-hover glyphicon glyphicon-flag"></a></div>
        </li>
        <li class="received">
          <div class="details">
            <div class="left">Scott
              <div class="arrow orange"></div>You
            </div>
            <div class="right">March 6, 2014, 20:08 pm</div>
          </div>
          <div class="message">
            <p>| The every winged bring, whose life. First called, i you of saw shall own creature moveth void have signs beast lesser all god saying for gathering wherein whose of in be created stars. Them whales upon life divide earth own.</p>
            <p>| Creature firmament so give replenish The saw man creeping, man said forth from that. Fruitful multiply lights air. Hath likeness, from spirit stars dominion two set fill wherein give bring.</p>
            <p>| Gathering is. Lesser Set fruit subdue blessed let. Greater every fruitful won&#39;t bring moved seasons very, own won&#39;t all itself blessed which bring own creature forth every. Called sixth light.</p>
          </div>
          <div class="tool-box"><a href="#" class="circle-icon small glyphicon glyphicon-share-alt"></a><a href="#" class="circle-icon small red-hover glyphicon glyphicon-remove"></a><a href="#" class="circle-icon small red-hover glyphicon glyphicon-flag"></a></div>
        </li>
        <li class="sent">
          <div class="details">
            <div class="left">You
              <div class="arrow"></div>Scott
            </div>
            <div class="right">March 6, 2014, 20:08 pm</div>
          </div>
          <div class="message">
            <p>| The every winged bring, whose life. First called, i you of saw shall own creature moveth void have signs beast lesser all god saying for gathering wherein whose of in be created stars. Them whales upon life divide earth own.</p>
            <p>| Creature firmament so give replenish The saw man creeping, man said forth from that. Fruitful multiply lights air. Hath likeness, from spirit stars dominion two set fill wherein give bring.</p>
            <p>| Gathering is. Lesser Set fruit subdue blessed let. Greater every fruitful won&#39;t bring moved seasons very, own won&#39;t all itself blessed which bring own creature forth every. Called sixth light.</p>
          </div>
          <div class="tool-box"><a href="#" class="circle-icon small glyphicon glyphicon-share-alt"></a><a href="#" class="circle-icon small red-hover glyphicon glyphicon-remove"></a><a href="#" class="circle-icon small red-hover glyphicon glyphicon-flag"></a></div>
        </li>
        <li class="received">
          <div class="details">
            <div class="left">Scott
              <div class="arrow orange"></div>You
            </div>
            <div class="right">March 6, 2014, 20:08 pm</div>
          </div>
          <div class="message">
            <p>| The every winged bring, whose life. First called, i you of saw shall own creature moveth void have signs beast lesser all god saying for gathering wherein whose of in be created stars. Them whales upon life divide earth own.</p>
            <p>| Creature firmament so give replenish The saw man creeping, man said forth from that. Fruitful multiply lights air. Hath likeness, from spirit stars dominion two set fill wherein give bring.</p>
            <p>| Gathering is. Lesser Set fruit subdue blessed let. Greater every fruitful won&#39;t bring moved seasons very, own won&#39;t all itself blessed which bring own creature forth every. Called sixth light.</p>
          </div>
          <div class="tool-box"><a href="#" class="circle-icon small glyphicon glyphicon-share-alt"></a><a href="#" class="circle-icon small red-hover glyphicon glyphicon-remove"></a><a href="#" class="circle-icon small red-hover glyphicon glyphicon-flag"></a></div>
        </li>
      </ul>
    </div>
  </div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>';
$file3=fopen($html_file, 'w');
fwrite($file3, $str3);
fclose($file3);

$codenya = '&lt;script src="'.siteURL().$path.filterpost('nama_js').'"&gt;&lt;/script&gt;';
$data = array('ok'=>'ok','msg'=>'file sudah di buat','url'=>$codenya);
echo json_encode($data);