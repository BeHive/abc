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
        <link rel="stylesheet" href="/assets/css/abc-fe.css">
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

	</head>
	<body>

    <div id="header">
        <div id="slider" style="height: 17em;">

            <?
            $pictureList = json_decode($blocos["pictureList"]);
            foreach($pictureList as $k => $v){
                ?>
                <span style="height:17em;background-size: cover;background-image: url('<?=$v?>')"></span>
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
