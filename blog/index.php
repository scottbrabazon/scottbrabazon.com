<?php include('../perch/runtime.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Scott Brabazon | Artworker/Developer | Manchester | Blog</title>
		<meta name="description" content="Developer and Artworker based in Manchester. Read my blogs covering the latest industry developments." />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="alternate" type="application/rss+xml" title="RSS" href="rss.php" />
		<?php perch_get_css(); ?>
		<link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="/css/main.css">
		<link rel="stylesheet" href="/css/responsive.css">
		<meta name="viewport" content="user-scalable=yes, width=300" />
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<script src="../js/jquery-1.11.0.min.js"></script>
		<script src="../js/menu.js"></script>
		<script src="../js/image-effects.js"></script>
	</head>
	<body>
		<div class="mobile-nav">
			<div class="mobile-nav-toggle">
				<div class='open-close-button'>
					<svg version="1.1" id="_x2014_ÎÓÈ_x5F_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
					x="0px" y="0px" width="60px" height="60px" viewBox="0 0 60 60" enable-background="new 0 0 60 60" xml:space="preserve">
						<g class="button-1">
							<path fill="#b6883f" d="M30,0C13.458,0,0,13.458,0,30s13.458,30,30,30s30-13.458,30-30S46.542,0,30,0z M30,56.037
							C15.643,56.037,3.962,44.357,3.962,30C3.962,15.643,15.643,3.962,30,3.962c14.357,0,26.037,11.68,26.037,26.038
							C56.037,44.357,44.357,56.037,30,56.037z"/>
						</g>
						<g class="button-2">
							<polygon fill="#FFFFFF" points="32,12.083 28,12.083 28,47.917 32,47.917 "/>
						</g>	
						<g class="button-3">	
							<polygon fill="#FFFFFF" points="12.083,28 12.083,32 47.917,32 47.917,28 "/>
						</g>		
					</svg>
				</div>
			</div>
			<nav class="mobile-nav-links">
				<ul>
					<li><a href="../index.php">Home</a></li>
					<li><a href="../print">Print</a></li>	
					<li><a href="../digital">Digital</a></li>		
					<li><a href="../3d">3D</a></li>
					<li><a href="../blog" class="selected">Blog</a></li>
					<li><a href="../contact.php">Contact</a></li>	
				</ul>
			</nav>
		</div>	
		<div class="desktop-nav">
			<nav>
				<ul>
					<li><a href="../index.php"><img src="../images/home-icon-black.svg" onmouseover="this.src='../images/home-icon-gold.svg'" onmouseout="this.src='../images/home-icon-black.svg'"/></a></li>
					<li>|</li>						
					<li><a href="../print">Print</a></li>
					<li>|</li>		
					<li><a href="../digital">Digital</a></li>
					<li>|</li>			
					<li><a href="../3d">3D</a></li>
					<li>|</li>
					<li><a href="../blog" class="selected">Blog</a></li>
					<li>|</li>
					<li><a href="../contact.php">Contact</a></li>	
				</ul>
			</nav>
		</div>	
		<header>
			<h1>Blog</h1>
		</header>	
		<div class="blog-index">	
		    <?php perch_blog_recent_posts(6); ?>
		</div>
	    <div class="archive-panel">
	        <h2>Archive</h2>
	        <?php perch_blog_categories(); ?>
	        <?php perch_blog_tags(); ?>
	        <?php perch_blog_date_archive_months(); ?>
	    </div>
		<div class="footer">		
			<footer>
				<ul>
					<li>	
						<a href="https://uk.linkedin.com/in/scottbrabazon" target="blank">
							<img src="../images/linkedin.png">
						</a>
					</li>
					<li>	
						<p>&copy; 2017 Scott Brabazon</p>
					</li>
				</ul>
			</footer>
		</div>	
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-85329524-1', 'auto');
			ga('send', 'pageview');
		</script>
		<?php perch_get_javascript(); ?>
	</body>
</html>