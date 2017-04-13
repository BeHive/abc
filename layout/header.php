<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
		<link rel="apple-touch-icon" sizes="57x57" href="/assets/images/apple-icon-57x57.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="/assets/images/apple-icon-72x72.png" />
		<title>ABC Legal</title>
        <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="/assets/css/addtohomescreen.css">
		<script src="/assets/js/addtohomescreen.min.js"></script>
		<script type="text/javascript">
            if(("standalone" in window.navigator) && window.navigator.standalone){
                var noddy, remotes = false;
                document.addEventListener('click', function(event) {
                    noddy = event.target;
                    while(noddy.nodeName !== "A" && noddy.nodeName !== "HTML") {
                        noddy = noddy.parentNode;
                    }
                    if('href' in noddy && noddy.href.indexOf('http') !== -1 && (noddy.href.indexOf(document.location.host) !== -1 || remotes)){
                        event.preventDefault();
                        document.location.href = noddy.href;
                    }
                },false);
            }
        </script>

        <style>
            body { font: 400 1em Roboto, Arial, sans-serif;text-decoration: none; margin: 0}
            body * {margin: 0px}
            a {text-decoration: none; text-transform: uppercase}
            a, a:visited, a:active { color: inherit;}
            a:hover {color:#2d2d2d}
            #topBar {text-align: right; background-color: rgba(0,0,0,0.5);color: #fff;
                height: 2em;
                position: absolute;
                z-index: 99999999;
                top: 0px;
                width: 100%;}
            #topBar>* {padding: 5px}
            #topBar i:last-of-type { margin-right: 2em;}
            #menu {background-color: rgba(0,0,0,0.3);height: 28em;    position: absolute;background-repeat: no-repeat;background-image: url("/assets/images/ABCLEGAL-transparente.png");
                top: 2em;
                width: 100%;
                z-index: 999;}
            #menu a {font-weight: 100; font-size:1.5em}
            #menuItems {list-style-type: none; padding-left: 10px; color: #fff;padding-top: 3em; padding-right: 2em;}
            #menuItems li {list-style-type: none; float: right; padding-left: 2em; text-transform: capitalize;}
            #menuItems li:hover{color:#2d2d2d}
            .section {text-align: center;margin:3em; border-bottom-color: #4ebead;  border-bottom-width: 1px;  border-bottom-style: solid;padding-bottom: 1em;}
            .sectionTitle {font-weight: 100;font-size: 2em; text-transform: uppercase}
            .sectionBody {margin: 2em;}
            .sectionLink {color: #777777}
            .sectionLink a {padding-right: 20px;}
            .sectionLink a:after { content: '\f054';font-family: FontAwesome;}
            .bigContent .sectionBody{font-weight: bold; font-size: 3em; margin: 0.5em;}
            @media (min-width:1101px){
                .square{width: 25%;}
            }
            @media (max-width:1100px){
                .square{width: 50%;}
            }
            @media (max-width:600px){
                .square{width: 100%;}
            }
            .square{color:#fff;float: left;border-color: #fff;border-width: 1px;box-sizing: border-box;border-style: solid;position: relative}
            .squareTitle{font-weight: 100;font-size: 1.5em; text-transform: uppercase}
            .squareBody {margin: 1em;text-align: center;}
            .squareLink {color: #fff;position: absolute;bottom: 20px;right: 20px;}
            .squareContent { height: 100%;padding: 20px;background-color: rgba(0,0,0,0.5);}
            .squareContent:hover{background-color: rgba(0,0,0,0.7);}
        </style>

	</head>
	<body>

    <div id="header">
        <div id="slider" style="height: 30em;">

            <?
            $pictureList = json_decode($blocos["pictureList"]);
            foreach($pictureList as $k => $v){
                ?>
                <span style="height:30em;background-size: cover;background-image: url('<?=$v?>')"></span>
                <?
            }
            ?>

        </div>
        <div id="topBar">
            <span><a href="/?lang=pt">pt</a></span>
            <span>|</span>
            <span><a href="/?lang=en">en</a></span>
            <i class="fa fa-facebook" aria-hidden="true"></i>
            <i class="fa fa-linkedin" aria-hidden="true"></i>
            <i class="fa fa-envelope-o" aria-hidden="true"></i>
            <i class="fa fa-search" aria-hidden="true"></i>
        </div>
        <div id="menu">
            <ul id="menuItems">
                <?for($i = count($data['menu'])-1; $i >= 0; $i--){?>
                    <li>
                        <a href="<?=$data['menu'][$i]['link'] ?><?= $lang=='pt'?(''):('?lang=en') ?>"><?=$lang=='pt'?($data['menu'][$i]['text']):($data['menu'][$i]['text_en']) ?></a>
                    </li>
                <?}?>
            </ul>
        </div>
    </div>
