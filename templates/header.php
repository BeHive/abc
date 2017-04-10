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
		<link rel="stylesheet" href="/assets/css/abc.css">
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="/assets/css/addtohomescreen.css">
		<script src="/assets/js/addtohomescreen.min.js"></script>
		<script type="text/javascript" src="//fastly.ink.sapo.pt/3.1.10/js/ink-all.js"></script>
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
	<body class="abc-justify">
		
		<!-- Navbar -->
		<div class="abc-top">
            <div id="languageSelector" class="abc-theme-l6" style="position: absolute;right: 10px;top: 10px;">
                <a href="/?lang=pt" style="display:inline" >PT</a> | <a href="/?lang=en" style="display:inline" >EN</a>
            </div>
			<ul class="abc-navbar abc-theme-l6 abc-left-align abc-large">
				<li class="abc-hide-large abc-opennav abc-right" style="line-height: 170px;min-width: 97px;text-align: center;">
					<a class="abc-hover-white abc-large abc-theme-l6" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
				</li>
				<li>
                    <a href="/<?=$lang=='pt'?'':'?lang=en'?>" class="menu-logo"></a>
                </li>

                <?for($i = count($data['menu'])-1; $i >= 0; $i--){?>
					<li class="abc-hide-small abc-hide-medium abc-right" style="line-height: 170px;">
						<a href="<?=$data['menu'][$i]['link'] ?><?= $lang=='pt'?(''):('?lang=en') ?>" class="abc-hover-white"><?=$lang=='pt'?($data['menu'][$i]['text']):($data['menu'][$i]['text_en']) ?></a>
					</li>
				<?}?>
			
			</ul>
		</div>
		
		<!-- Navbar on small screens -->
		<div id="navDemo" class="abc-hide abc-hide-large abc-top" style="margin-top:7em;">
		<ul class="abc-navbar abc-left-align abc-large abc-theme-l6">
		<?foreach($data['menu'] as $value){?>
			<li>
				<a href="<?=$value['link']?><?= $lang=='pt'?(''):('?lang=en') ?>"><?=$lang=='pt'?($value['text']):($value['text_en'])?></a>
			</li>
		<?}?>
		</ul>
		</div>
		
		<!-- Modal -->
		<div id="id01" class="abc-modal">
			<div class="abc-modal-content abc-card-8 abc-animate-top">
				<header class="abc-container abc-teal"> 
					<span onclick="document.getElementById('id01').style.display='none'" class="abc-closebtn"><i class="fa fa-remove"></i></span>
					<h4>Oh snap! We just showed you a modal..</h4>
					<h5>Because we can <i class="fa fa-smile-o"></i></h5>
				</header>
				<div class="abc-container">
					<p>Cool huh? Ok, enough teasing around..</p>
					<p>Go to our <a class="abc-btn" href="/abccss/default.asp">abc.CSS Tutorial</a> to learn more!</p>
				</div>
				<footer class="abc-container abc-teal">
					<p>Modal footer</p>
				</footer>
			</div>
		</div>