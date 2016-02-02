<?php include('../perch/runtime.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Scott Brabazon | Artworker/Developer | South Manchester | Blog Archive</title>
	<meta name="description" content="Developer and Artworker based in South Manchester. Read my blogs covering the latest industry developments." />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="alternate" type="application/rss+xml" title="RSS" href="rss.php" />
	<?php perch_get_css(); ?>
	<link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/responsive.css">
</head>

<body>

	<div class="mobile-nav">
		<nav>
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
	
	<!--  change cols2-nav-right to cols2-nav-left if you want the sidebar on the left -->
	<div class="blog-index">
	

	   
		    <?php 	        
		        // defaults for all modes
		        $posts_per_page = 10;
		        $template 		= 'post_in_list.html';
		        $sort_order		= 'DESC';
		        $sort_by		= 'postDateTime';

		        // Have we displayed any posts yet?
		        $posts_displayed = false;

		        /* 
		        	perch_get() is used to get options from the URL.
					
					e.g. for the URL 
						/blog/archive.php?cat=news

					perch_get('cat') would return 'news' because cat=news.


					The code below looks for different options in the URL, and then displays different types of listings based on it.
		        */

		        
		        /* --------------------------- POSTS BY CATEGORY --------------------------- */
		        if (perch_get('cat')) {
		            echo '<h1>Archive of: '.perch_blog_category(perch_get('cat'), true).'</h1>';

		            perch_blog_custom(array(
							'category'   => perch_get('cat'),
							'template'   => $template,
							'count'      => $posts_per_page,
							'sort'       => $sort_by,
							'sort-order' => $sort_order,
		                    ));

		            $posts_displayed = true;
		        }
		        
		        
		        /* --------------------------- POSTS BY TAG --------------------------- */
		        if (perch_get('tag')) {
		            echo '<h1>Archive of: '.perch_blog_tag(perch_get('tag'), true).'</h1>';

		            perch_blog_custom(array(
							'tag'   	 => perch_get('tag'),
							'template'   => $template,
							'count'      => $posts_per_page,
							'sort'       => $sort_by,
							'sort-order' => $sort_order,
		                    ));

		            $posts_displayed = true;
		        }
		        
		        

		        /* --------------------------- POSTS BY DATE RANGE --------------------------- */
		        if (perch_get('year')) {
		            
					$year              = intval(perch_get('year'));
					$date_from         = $year.'-01-01 00:00:00';
					$date_to           = $year.'-12-31 23:59:59';
					$title_date_format = '%Y';
		            
		            
		            // Month and Year?
		            if (perch_get('month')) {
						$month             = intval(perch_get('month'));
						$date_from         = $year.'-'.str_pad($month, 2, '0', STR_PAD_LEFT).'-01 00:00:00';
						$date_to           = $year.'-'.str_pad($month, 2, '0', STR_PAD_LEFT).'-31 23:59:59';
						$title_date_format = '%B, %Y';
		            }

		            echo '<h1>Archive of: '.strftime($title_date_format, strtotime($date_from)).'</h1>';

		            perch_blog_custom(array(
							'filter'     => 'postDateTime',
							'match'      => 'eqbetween',
							'value'      => $date_from.','.$date_to,
							'template'   => $template,
							'count'      => $posts_per_page,
							'sort'       => $sort_by,
							'sort-order' => $sort_order,
		                    ));

		            $posts_displayed = true;
		        }
		        
		        

		        /* --------------------------- POSTS BY AUTHOR --------------------------- */
		        if (perch_get('author')) {

		        	echo '<h1>Posts by '.perch_blog_author(perch_get('author'), array(
		        											'template' => 'author_name.html',
		        											), true).'</h1>';


		        	perch_blog_custom(array(
							'author'   	 => perch_get('author'),
							'template'   => $template,
							'count'      => $posts_per_page,
							'sort'       => $sort_by,
							'sort-order' => $sort_order,
		                    ));

		            $posts_displayed = true;
		        }

		        
		      	/* --------------------------- DEFAULT: ALL POSTS --------------------------- */

		      	if ($posts_displayed == false) {

		      		// No other options have been used; no posts have been displayed yet.
		      		// So display all posts.
		      		 
		      		echo '<h1>Archive</h1>';

		      		perch_blog_custom(array(
							'template'   => $template,
							'count'      => $posts_per_page,
							'sort'       => $sort_by,
							'sort-order' => $sort_order,
		                    ));

		      	}

		    ?>

	</div>

	<div class="archive-panel-push">
	    <h2>Archive</h2>
	    <!--  By category listing -->
	    <?php perch_blog_categories(); ?>
	    <!--  By tag -->
	    <?php perch_blog_tags(); ?>
	    <!--  By year -->
	    <?php perch_blog_date_archive_years(); ?>
	    <!--  By year and then month - can take parameters for two templates. The first displays the years and the second the months see the default templates for examples -->
	    <?php perch_blog_date_archive_months(); ?>
	</div>
	
	<?php perch_get_javascript(); ?>

	<div class="footer">		
		<footer>
			<ul>
				<li>	
			<a href="https://uk.linkedin.com/in/scottbrabazon" target="blank"><img src="../images/linkedin.png"></a>
				</li>
				<li>	
			<p>&copy; 2016 Scott Brabazon</p>
				</li>
			</ul>
		</footer>
	</div>	
	
</body>
</html>