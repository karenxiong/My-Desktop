<?php

session_start();
// session_regenerate_id(FALSE);
// session_unset();
if(!isset($_SESSION['auth']) || $_SESSION['auth'] != 1 ) {
	header("Location: /login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>My Desktop</title>
		<meta name="author" content="Karen Xiong">
		<meta name="description" content="A desktop simulator based on a teenage girls desktop.">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script src="js/main.js"></script>
		<script src="js/moment.js"></script>
		<script src="js/snake.js"></script>
		<script src="js/music.js"></script>
		<!-- drag and drop js-->
		<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<link rel="stylesheet" type="text/css" href="css/default.css"/>
	</head>
	<body class="home">
		<!-- navbar -->
		<div id="nav">
			<ul class="meno">
				<li class="icon"><img src="img/icon2.png" align="top"></li>
				<li class="dropbtn">File
					<div class="dropdown-content">
						<a href="login.php">Log Off</a>
					</div>
				</li>
				<li class="dropbtn">Edit
					<div class="dropdown-content">
						<a href="#">Name</a>
						<a href="#">Name</a>
						<a href="#">Name</a>
						<a href="#">Name</a>
					</div>
				</li>
				<li class="dropbtn">View
					<div class="dropdown-content">
						<a href="#">Name</a>
						<a href="#">Name</a>
						<a href="#">Name</a>
						<a href="#">Name</a>
					</div>
				</li>
				<li class="dropbtn">Go				
					<div class="dropdown-content">
						<a href="#">Enternet</a>
						<a href="#">Snake</a>
						<a href="#">Music</a>
						<a href="#">Messenger</a>
					</div>
				</li>
				<li class="dropbtn">Help
					<div class="dropdown-content">
						<a href="#">About</a>
					</div>
				</li>
				<!-- Time in navbar -->
				<li id="time"></li>
			</ul>
		</div>
		<!-- Apps -->
		<div class="apps">
			<div class="enternet">
					<img src="img/enternet.png" alt="Enternet">
				<span class="title">Enternet</span>
			</div>
			<div class="snake">
					<img src="img/snake.png" alt="Snake">
				<span class="title">Snake</span>
			</div>
			<div class="music">
					<img src="img/music.png" alt="Music">
				<span class="title">Music</span>
			</div>
			<div class="messenger">
					<img src="img/message.png" alt="Messenger">
				<span class="title">Messenger</span>
			</div>
		</div>
		<!-- Enternet Window -->
		<div class="window" id="enternet">
			<div class="top">
				<div class="buttons">
					<div class="close">
					</div>
					<div class="minimize">
					</div>
				</div>
				<h4 class="etitle">Enternet</h4>
			</div>
			<div class="enternetHead">
				<img class="forbackwards" src="img/leftarrow1.png">
				<img class="forbackwards" src="img/rightarrow1.png">
				<img class="forbackwards" src="img/refresh.png">
				<img class="forbackwards" src="img/home.png">
				<div class="url">
					<p>http://www.facelook.com</p>
				</div>
				<img class="option" src="img/option.png">
			</div>
			<div class="facelook">
				<a href="#">
					<h2>Facelook</h2>
				</a>
				<div class="search">
					<p>Search Facelook</p>
				</div>
			</div>
			<!-- Facelook body -->
			<div class="enternetBody">
				<div class="man">
					<img class="face" src="img/man.png">
					<div class="text">
						<h4 class="name">Andy Lau</h4>
						<img class="pic" src="img/winter.png">
						<p>Is this supposed to be spring?! <span class="hashtag">#CanadianWeather</span></p>
					</div>
				</div>
				<div class="girl">
					<img class="face" src="img/girl.png">
					<div class="text">
						<h4 class="name">Annie Steels</h4>
						<p>I hate when guys lead you on... <span class="hashtag">#foreverfriendzoned</span> :(...</p>
					</div>
				</div>
				<div class="boy">
					<img class="face" src="img/boy.png">
					<div class="text">
						<h4 class="name">Jacob Grey</h4>
						<p>Just had a great lunch with my best friend Annie! Unlike other girls, she really gets me. <span class="hashtag">#BestFriendsForever #Sister</span></p>
					</div>
				</div>
				<div class="santa">
					<img class="face" src="img/santa.png">
					<div class="text">
						<h4 class="name">Howard Jenkins</h4>
						<p>Enjoying the cold weather. I love snow! <span class="hashtag">#Winter #Happy</span></p>
					</div>
				</div>
			</div>
		</div>
		<!-- Snake app -->
		<div class="window" id="snake">
			<div class="top">
				<div class="buttons">
					<div class="close">
					</div>
					<div class="minimize">
					</div>
				</div>
				<h4 class="etitle">Snake</h4>
			</div>
			<canvas id="canvas" width="500" height="500"></canvas>
		</div>
		<!-- Music app -->
		<div class="window" id="music">
			<div class="top">
				<div class="buttons">
					<div class="close">
					</div>
					<div class="minimize">
					</div>
				</div>
				<h4 class="mutitle">Music Player</h4>
			</div>
			<div class="container">
			    <div class="column add-bottom">
			        <div id="mainwrap">
			            <div id="nowPlay">
			                <span class="right" id="npTitle"></span>
			            </div>
			            <div id="audiowrap">
			                <div id="audio0">
			                    <audio preload id="audio1" controls="controls">Your browser does not support HTML5 Audio!</audio>
			                </div>
			            </div>
			            <div id="plwrap">
			                <ul id="plList">
			                    <li>
			                        <div class="plItem">
			                            <div class="plNum">-</div>
			                            <div class="plTitle">01.&nbsp; Funky - Bensound</div>
			                            <div class="plLength">03:09</div>
			                        </div>
			                    </li>
			                    <li>
			                        <div class="plItem">
			                            <div class="plNum">-</div>
			                            <div class="plTitle">02.&nbsp; Tomorrow - Bensound</div>
			                            <div class="plLength">04:55</div>
			                        </div>
			                    </li>
			                    <li>
			                        <div class="plItem">
			                            <div class="plNum">-</div>
			                            <div class="plTitle">03. &nbsp; Memories - Bensound</div>
			                            <div class="plLength">03:50</div>
			                        </div>
			                    </li>
			                </ul>
			            </div>
			        </div>
			    </div>
			</div>
		</div>
		<!-- Messenger app -->
		<div class="window" id="messenger">
			<div class="top">
				<div class="buttons">
					<div class="close">
					</div>
					<div class="minimize">
					</div>
				</div>
				<h4 class="mtitle">Messenger</h4>
			</div>
			<div class="ccontent">
				<div class="own">
					<img src="img/chloe.png">
					<h4>Karen</h4><br>
					<input class="personal-msg" type="text" class="ownpm" placeholder="< Type a personal message >"onfocus="this.placeholder = ''" onblur="this.placeholder = '< Type a personal message >'"></input>
				</div>
				<div class="contact">
					<div class="online">
						<h4>Online 2/4</h4>
						<span class="annie">
							<p class="user">Annie</p>
							<p class="pm">Loving you is like holding a rose by the thorns...</p>
						</span>
						<span class="jacob">
							<p class="user">Jacob</p>
							<p class="pm">Don't talk to me... not in the mood.</p>
						</span>
					</div>
					<div class="offline">
						<h4>Offine 2/4</h4>
						<span class="andy">
							<p class="user">Andy</p>
							<p class="pm">Out shoveling the snow... If I'm not back by Sunday, send help..</p>
						</span>
						<span class="howard">
							<p class="user">Howard</p>
							<p class="pm">I wish I lived with the polar bears!</p>
						</span>
					</div>
				</div>
			</div>
		</div>
		<!-- Annie Chat Window -->
		<div class="window" id="annie">
			<div class="top">
				<div class="buttons">
					<div class="close">
					</div>
					<div class="minimize">
					</div>
				</div>
				<h4 class="atitle">Annie</h4>
			</div>
			<div class="body">
				<img class="annie" src="img/girl.png">
				<div class="convo"></div>
				<img class="msnkaren" src="img/chloe.png">
				<textarea class="send"></textarea>
			</div>
		</div>
		<!-- Jacob Chat Window -->
		<div class="window" id="jacob">
			<div class="top">
				<div class="buttons">
					<div class="close">
					</div>
					<div class="minimize">
					</div>
				</div>
				<h4 class="jtitle">Jacob</h4>
			</div>
			<div class="body">
				<img class="jacob" src="img/boy.png">
				<div class="convo"></div>
				<img class="msnkaren" src="img/chloe.png">
				<textarea class="send"></textarea>
			</div>
		</div>
		<!-- Andy Chat Window -->
		<div class="window" id="andy">
			<div class="top">
				<div class="buttons">
					<div class="close">
					</div>
					<div class="minimize">
					</div>
				</div>
				<h4 class="antitle">Andy</h4>
			</div>
			<div class="body">
				<img class="andy" src="img/man.png">
				<div class="convo"></div>
				<img class="msnkaren" src="img/chloe.png">
				<textarea class="send"></textarea>
			</div>
		</div>
		<!-- Howard Chat Window -->
		<div class="window" id="howard">
			<div class="top">
				<div class="buttons">
					<div class="close">
					</div>
					<div class="minimize">
					</div>
				</div>
				<h4 class="htitle">Howard</h4>
			</div>
			<div class="body">
				<img class="howard" src="img/santa.png">
				<div class="convo"></div>
				<img class="msnkaren" src="img/chloe.png">
				<textarea class="send"></textarea>
			</div>
		</div>
	</body>
</html>