<?php
  // if(!isset($_COOKIE['redirected'])){
  //   $useragent = $_SERVER['HTTP_USER_AGENT']; 
  //   $iPod = stripos($useragent, "iPod"); 
  //   $iPad = stripos($useragent, "iPad"); 
  //   $iPhone = stripos($useragent, "iPhone");
  //   $Android = stripos($useragent, "Android"); 
  //   $iOS = stripos($useragent, "iOS");

  //   $DEVICE = ($iPod||$iPad||$iPhone||$Android||$iOS);
  //   if ($DEVICE) {  
  //     header("Location: https://consentium.net/kyc/");
  //     setcookie('email', '', time() + 86400 * 365);
  //     setcookie('redirected','true', time() + 86400 * 365);
  //     exit;
  //   }
  // } 

  if (!isset($_COOKIE['email']) || isset($_COOKIE['email']) && $_COOKIE['email'] == "") {
    header('Location: sign-in.php');
    exit;
  }

  if (!isset($_COOKIE['erc20_address']) || isset($_COOKIE['erc20_address']) && $_COOKIE['erc20_address'] == "") {
    header('Location: step.php');
    exit;
  }

  $user_email = $_COOKIE['email'];
  $user_email = str_replace("%40", "@", $user_email);
  require_once("mysqli_connect.php");
  $user_sql = "select * from bbn_user where email = '$user_email'";
  $user_result = mysqli_query($dbc, $user_sql);
  $user = mysqli_fetch_array($user_result);
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Consentium - Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap & Jquery -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
<link rel="stylesheet" type="text/css" href="jquery.flipcountdown.css"/>
<link href="sidemenu.css" rel="stylesheet">
<link href="magnific-popup.css" rel="stylesheet">
<link href="media-queries.css" rel="stylesheet">

<script src="js/jquery.magnific-popup.min.js"></script>

<!-- Start of consentium Zendesk Widget script -->
<script>/*<![CDATA[*/window.zE||(function(e,t,s){var n=window.zE=window.zEmbed=function(){n._.push(arguments)}, a=n.s=e.createElement(t),r=e.getElementsByTagName(t)[0];n.set=function(e){ n.set._.push(e)},n._=[],n.set._=[],a.async=true,a.setAttribute("charset","utf-8"), a.src="https://static.zdassets.com/ekr/asset_composer.js?key="+s, n.t=+new Date,a.type="text/javascript",r.parentNode.insertBefore(a,r)})(document,"script","aace7492-2999-420e-89fd-ec853f818169");/*]]>*/</script>
<!-- End of consentium Zendesk Widget script -->


<style>
.white-popup {
	position: relative;
	background: #252015;
	width: auto;
	max-width: 750px;
	margin: 25px auto;
	padding: 50px 25px;
}
.white-popup ul li {
	margin: 5px 0;
}
.mfp-bg {
	background: #ba933b;
}
.mfp-close-btn-in .mfp-close {
	color: #ba933b;
}
.mfp-close {
	font-size: 36px;
}
.mfp-content h2 {
	color: #ba933b;
}
.mfp-content p {color:#837c6c;}
</style>

<!-- Add sidemenu -->
<script>
(function($){
	// Menu Functions
	$(document).ready(function(){
  	$('#menuToggle').click(function(e){
    	var $parent = $(this).parent('nav');
      $parent.toggleClass("open");
      var navState = $parent.hasClass('open') ? "hide" : "show";
      $(this).attr("title", navState + " navigation");
			// Set the timeout to the animation length in the CSS.
			setTimeout(function(){
				console.log("timeout set");
				$('#menuToggle > span').toggleClass("navClosed").toggleClass("navOpen");
			}, 200);
    	e.preventDefault();
  	});
    var name = getCookie('email').split('%');
    document.getElementById("greeting").innerHTML = "Hi, " + name[0];
  });
})(jQuery);

function getCookie(key) {
  var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
  return keyValue ? keyValue[2] : null;
}

function logOut(){
    document.cookie = "email=";
    document.cookie = "erc20_address=";
    window.open("sign-in.php", "_self");
}

function purchase() {
  form = document.getElementById("form_amount");
  form.submit();
}
</script>

<style type="text/css">
button:disabled,
button[disabled=disabled]{
  border: 1px solid #999999;
  background-color: #EEBE5F;
  color: #666666;
}
</style>
</head>

<body>

<!------------ Navigation start ------------>
<div id="header">
  <div class="container"> <span class="logo"><a href="#home">
    <a href="index.php"><div id="logo"></div></a>
    </a></span>
    <ul id="menu">
      <li id="greeting">Hi, John</li>      
      <li><a onclick="logOut()" class="token-btn">Log out</a></li>
    </ul>
    <nav> 
      <a href="" id="menuToggle" title="show menu"> <span class="navClosed"></span> </a>
      <a href="index.html" class="token-btn">Log out</a>
      <a href="">Hi, John</a>
    </nav>
  </div>
</div>
<!------------ Navigation end ------------>


<div class="setting-banner" style="text-align:center;">
  <div class="container">
    <h1>Dashboard</h1>
    <div class="h-line" style="display:inline-block;"></div>
  </div>
</div>

<div id="settings">
  <div class="container">
    <div class="settings-container">
      <div class="row">
        <div class="col-md-3 col-sm-3 v-pad purchase-text">
          <p>Purchase Amount:</p>
        </div>
        <form action="payment.php" method="POST" id="form_amount">
          <div class="col-md-9 col-sm-9 v-pad">
            <input type="text" name="consentium_amount" class="input-style" value="10">
          </div>
          <div class="col-md-3 col-sm-3 v-pad purchase-text">
            <p>Your Wallet Address:</p>
          </div>
          <div class="col-md-9 col-sm-9 v-pad">
            <input type="text" name="address" class="input-style wallet-address" value="<?php echo $_COOKIE['erc20_address'] ?>" id="myInput" readonly>
            <button onclick="myFunction()" class="btn-copy"><i class="fa fa-copy" aria-hidden="true"></i></button>
            <div style="clear:both;"></div>
          </div>
        </form>
        <label id="error_lbl" style="color: red" <?php if($user['status'] == "CLEARED") echo "hidden"; ?>>*Your account has not been approved yet</label>
        <div class="col-md-12 col-sm-12 v-pad">
          <button id="purchase_btn" onclick="purchase()" class="btn light-btn" <?php if($user['status'] != "CLEARED") echo "disabled"; ?>>Purchase</button>
        </div>
      </div>
      <br>
      <br>
      <span class="small-font">If you would like to change the destination wallet, please send an email to <a href="mailto:support@consentium.net" style="color:#ba933b;">support@consentium.net</a></span>
    </div>
    <div style="background:#4d3f1f; height:1px; width:100%; margin:60px 0;"></div>
    <h2 style="font-weight:700;">Transaction History</h2>
    <div class="h-line" style="display:inline-block;"></div>
    <br>
    <br>
    <div style="overflow-x:auto;">
    <table>
            <tr valign="center">
              <th>DATE</th>
              <th>CURRENCY</th>
              <th>AMOUNT</th>
              <th>ADDRESS</th>
              <th>CONSENTIUM AMOUNT</th>
              <th>CONSENTIUM BONUS</th>
              <th>CONVERSION RATE</th>
              <th>STATUS</th>
            </tr>
<?php 
  $transaction_history_sql = "select * from bbn_transaction where user_email = '$user_email' order by date desc";
  $result = mysqli_query($dbc, $transaction_history_sql);
  while ($transaction = mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>".$transaction['date']."</td>";
    echo "<td>".$transaction['currency']."</td>";
    echo "<td>".$transaction['amount']."</td>";
    echo "<td>".$transaction['address']."</td>";
    echo "<td>".$transaction['consentium_amount']."</td>";
    echo "<td>".$transaction['consentium_bonus']."</td>";
    echo "<td>".$transaction['conversion_rate']."</td>";
    echo "<td>".$transaction['status']."</td>";
    echo "</tr>";
  }
  mysqli_close($dbc);
?>          
          </table>
    </div>
  </div>
</div>

<!------------ Footer start ------------> 
<section id="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-3 v-pad">
        <div class="footer-logo"><img src="img/logo.png" alt=""></div>
      </div>
      <div class="col-md-4 col-sm-6 v-pad">
        <div style="text-align:center;">
          <ul class="social">
            <li><a href="https://www.facebook.com/profile.php?id=1545357085550769" target="_blank"><div class="social-icon"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
            <li><a href="https://twitter.com/ConsentiumCoin" target="_blank"><div class="social-icon"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
						<li><a href="https://t.me/consentiumofficial" target="_blank"><div class="social-icon"><i class="fa fa-send" aria-hidden="true"></i></div></a></li>
						<li><a href="https://bitcointalk.org/index.php?topic=2848892" target="_blank"><div class="social-icon"><i class="fa fa-btc" aria-hidden="true"></i></div></a></li>
            <li><a href="https://medium.com/@consentium" target="_blank"><div class="social-icon"><i class="fa fa-medium" aria-hidden="true"></i></div></a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-4 col-sm-3 v-pad">
        <div class="copyright">
          <span class="small-font">© 2018 ASIA FOCUS GROUP PTE LTD. All Rights Reserved.</span>
          <br><br>
          
          <span class="small-font"><a href="#privacy" class="open-popup-link" style="color:#ba933b;">Privacy Policy</a></span>

        </div>
      </div>
    </div>
  </div>
</section>
<!------------ Footer end ------------>

<!---------- Privacy policy popup ------------>
<div id="privacy" class="white-popup mfp-hide sans">
  <h2>Privacy Policy</h2>
  <br>
  <br>
  <p>By submitting your personal information to us, you consent to such information being used by us for the provision of the Services and also for us to communicate with you. </p>
  <br>
  <p>In the event if you do not agree for Consentium to process your data, please notify Consentium via email at <a style="color:#ba933b;" href="mailto:hello@consentium.net">hello@consentium.net.</a></p>
</div>
<!---------- Privacy policy popup END ------------> 

<script>
$(window).scroll(function() {
  var addRemClass = $(window).scrollTop() > 0 ? 'addClass' : 'removeClass';
    $("#header")[addRemClass]('bgChange');
});

</script>

<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  document.execCommand("Copy");
  alert("Copied the text: " + copyText.value);
}
</script>

<script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>
  
 <script>
    $(document).ready(function () {
        $('.open-popup-link').magnificPopup({
  type:'inline',
  midClick: true,
  mainClass: 'mfp-fade' // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
  
});
		
    });
</script>

<script>
(function(d){d.each(["backgroundColor","borderBottomColor","borderLeftColor","borderRightColor","borderTopColor","color","outlineColor"],function(f,e){d.fx.step[e]=function(g){if(!g.colorInit){g.start=c(g.elem,e);g.end=b(g.end);g.colorInit=true}g.elem.style[e]="rgb("+[Math.max(Math.min(parseInt((g.pos*(g.end[0]-g.start[0]))+g.start[0]),255),0),Math.max(Math.min(parseInt((g.pos*(g.end[1]-g.start[1]))+g.start[1]),255),0),Math.max(Math.min(parseInt((g.pos*(g.end[2]-g.start[2]))+g.start[2]),255),0)].join(",")+")"}});function b(f){var e;if(f&&f.constructor==Array&&f.length==3){return f}if(e=/rgb\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*\)/.exec(f)){return[parseInt(e[1]),parseInt(e[2]),parseInt(e[3])]}if(e=/rgb\(\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*\)/.exec(f)){return[parseFloat(e[1])*2.55,parseFloat(e[2])*2.55,parseFloat(e[3])*2.55]}if(e=/#([a-fA-F0-9]{2})([a-fA-F0-9]{2})([a-fA-F0-9]{2})/.exec(f)){return[parseInt(e[1],16),parseInt(e[2],16),parseInt(e[3],16)]}if(e=/#([a-fA-F0-9])([a-fA-F0-9])([a-fA-F0-9])/.exec(f)){return[parseInt(e[1]+e[1],16),parseInt(e[2]+e[2],16),parseInt(e[3]+e[3],16)]}if(e=/rgba\(0, 0, 0, 0\)/.exec(f)){return a.transparent}return a[d.trim(f).toLowerCase()]}function c(g,e){var f;do{f=d.css(g,e);if(f!=""&&f!="transparent"||d.nodeName(g,"body")){break}e="backgroundColor"}while(g=g.parentNode);return b(f)}var a={aqua:[0,255,255],azure:[240,255,255],beige:[245,245,220],black:[0,0,0],blue:[0,0,255],brown:[165,42,42],cyan:[0,255,255],darkblue:[0,0,139],darkcyan:[0,139,139],darkgrey:[169,169,169],darkgreen:[0,100,0],darkkhaki:[189,183,107],darkmagenta:[139,0,139],darkolivegreen:[85,107,47],darkorange:[255,140,0],darkorchid:[153,50,204],darkred:[139,0,0],darksalmon:[233,150,122],darkviolet:[148,0,211],fuchsia:[255,0,255],gold:[255,215,0],green:[0,128,0],indigo:[75,0,130],khaki:[240,230,140],lightblue:[173,216,230],lightcyan:[224,255,255],lightgreen:[144,238,144],lightgrey:[211,211,211],lightpink:[255,182,193],lightyellow:[255,255,224],lime:[0,255,0],magenta:[255,0,255],maroon:[128,0,0],navy:[0,0,128],olive:[128,128,0],orange:[255,165,0],pink:[255,192,203],purple:[128,0,128],violet:[128,0,128],red:[255,0,0],silver:[192,192,192],white:[255,255,255],yellow:[255,255,0],transparent:[255,255,255]}})(jQuery);
</script>

</body>
</html>