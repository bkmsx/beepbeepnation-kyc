<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Error</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap & Jquery -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" type="image/png" href="img/logo.png"/>
    <link rel="stylesheet" type="text/css" href="jquery.flipcountdown.css" />
    <link href="sidemenu.css" rel="stylesheet">
    <link href="media-queries.css" rel="stylesheet">

    <script type="text/javascript" src="js/jquery.flipcountdown.js"></script>
    <script src="https://use.typekit.net/bkt6ydm.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>

</head>
<body>
    <!------------ Navigation start ------------>
    <div id="header">
        <div class="container"> <span class="logo"><a href="#home">
        <a href="#"><div id="logo"></div></a>
        </a></span>
        
        </div>
    </div>
  <!------------ Navigation end ------------>

  <!------------ Sign up start ------------>
<section id="signpage" class="signpage" style="padding-top: 300px">
        <div class="container">
          <div class="signpage-container" style="width: 800px">
            <h4 style="color:white"><?php echo $err;?></h4> <br/>
            <a href="step.php"><input type="submit" name="submit" class="btn light-btn" value="Retry"></a>
          </div>    
        </div>
      </section>
      <!------------ Sign up end ------------>
  <!------------ Footer start ------------> 
    <section id="footer">
        <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-3 v-pad">
            <div class="footer-logo"><img src="img/logo.svg" alt=""></div>
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
                <span class="small-font">Copyright © 2018 Amazing Appventures Pte. Ltd.</span>
                <br><br>
                
                <!--<span class="small-font">Privacy Policy &nbsp;| &nbsp;Terms of Service</span>-->
    
            </div>
            </div>
        </div>
        </div>
    </section>
    <!------------ Footer end ------------>
    <script>
        $(window).scroll(function() {
            var addRemClass = $(window).scrollTop() > 0 ? 'addClass' : 'removeClass';
            $("#header")[addRemClass]('bgChange');
        });   
    </script> 
    <script>
        (function(d){d.each(["backgroundColor","borderBottomColor","borderLeftColor","borderRightColor","borderTopColor","color","outlineColor"],function(f,e){d.fx.step[e]=function(g){if(!g.colorInit){g.start=c(g.elem,e);g.end=b(g.end);g.colorInit=true}g.elem.style[e]="rgb("+[Math.max(Math.min(parseInt((g.pos*(g.end[0]-g.start[0]))+g.start[0]),255),0),Math.max(Math.min(parseInt((g.pos*(g.end[1]-g.start[1]))+g.start[1]),255),0),Math.max(Math.min(parseInt((g.pos*(g.end[2]-g.start[2]))+g.start[2]),255),0)].join(",")+")"}});function b(f){var e;if(f&&f.constructor==Array&&f.length==3){return f}if(e=/rgb\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*\)/.exec(f)){return[parseInt(e[1]),parseInt(e[2]),parseInt(e[3])]}if(e=/rgb\(\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*\)/.exec(f)){return[parseFloat(e[1])*2.55,parseFloat(e[2])*2.55,parseFloat(e[3])*2.55]}if(e=/#([a-fA-F0-9]{2})([a-fA-F0-9]{2})([a-fA-F0-9]{2})/.exec(f)){return[parseInt(e[1],16),parseInt(e[2],16),parseInt(e[3],16)]}if(e=/#([a-fA-F0-9])([a-fA-F0-9])([a-fA-F0-9])/.exec(f)){return[parseInt(e[1]+e[1],16),parseInt(e[2]+e[2],16),parseInt(e[3]+e[3],16)]}if(e=/rgba\(0, 0, 0, 0\)/.exec(f)){return a.transparent}return a[d.trim(f).toLowerCase()]}function c(g,e){var f;do{f=d.css(g,e);if(f!=""&&f!="transparent"||d.nodeName(g,"body")){break}e="backgroundColor"}while(g=g.parentNode);return b(f)}var a={aqua:[0,255,255],azure:[240,255,255],beige:[245,245,220],black:[0,0,0],blue:[0,0,255],brown:[165,42,42],cyan:[0,255,255],darkblue:[0,0,139],darkcyan:[0,139,139],darkgrey:[169,169,169],darkgreen:[0,100,0],darkkhaki:[189,183,107],darkmagenta:[139,0,139],darkolivegreen:[85,107,47],darkorange:[255,140,0],darkorchid:[153,50,204],darkred:[139,0,0],darksalmon:[233,150,122],darkviolet:[148,0,211],fuchsia:[255,0,255],gold:[255,215,0],green:[0,128,0],indigo:[75,0,130],khaki:[240,230,140],lightblue:[173,216,230],lightcyan:[224,255,255],lightgreen:[144,238,144],lightgrey:[211,211,211],lightpink:[255,182,193],lightyellow:[255,255,224],lime:[0,255,0],magenta:[255,0,255],maroon:[128,0,0],navy:[0,0,128],olive:[128,128,0],orange:[255,165,0],pink:[255,192,203],purple:[128,0,128],violet:[128,0,128],red:[255,0,0],silver:[192,192,192],white:[255,255,255],yellow:[255,255,0],transparent:[255,255,255]}})(jQuery);
    </script>
</body>
</html>
