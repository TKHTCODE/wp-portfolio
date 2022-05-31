<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package taka-portfolio
 */

get_header();
?>

<div class="video-container">
	<video style="width:100%;" src="https://taka-portfolio.s3.us-west-1.amazonaws.com/portfolio_movie.mp4" autoplay playsinline muted loop></video>
	<div class="navigationbar">
		<h1 class="sitetitle"><img class="logo" src="https://taka-portfolio.s3.us-west-1.amazonaws.com/logotkht.png" alt="logo"></h1>
		<!-- <p><?php echo get_bloginfo('description', 'display'); ?></p> -->
	</div>
</div>

<body>

	<div class="container">
		<div class="left">
			<div class="box gradation3 mt-box">
				<span class="moveIcons"><i class="fa-brands fa-php fa-5x margin-5"></i></span>
			</div>
			<div class="box gradation3">
				<span class="moveIcons"><i class="fa-brands fa-js fa-5x margin-5"></i></span>
			</div>
			<div class="box gradation1 mt-box">
				<span class="moveIcons2"><i class="fa-brands fa-html5 fa-5x margin-5"></i></span>
			</div>
			<div class="box gradation1">
				<span class="moveIcons2"><i class="fa-brands fa-node fa-5x margin-5"></i></span>
			</div>
		</div>
		<div class="right">
			<div class="box gradation4 mt-box">
				<span class="moveIcons"><i class="fa-brands fa-css3 fa-5x margin-5"></i></span>
			</div>
			<div class="box gradation4">
				<span class="moveIcons"><i class="fa-brands fa-git fa-5x margin-5"></i></span>
			</div>
			<div class="box gradation2 mt-box">
				<span class="moveIcons2"><i class="fa-brands fa-linux fa-5x margin-5"></i></span>
			</div>
			<div class="box gradation2">
				<span class="moveIcons2"><i class="fa-brands fa-sass fa-5x margin-5"></i></span>
			</div>
		</div>
	</div>

	<h1 style="color: white; font-size: 72px;">My works</h1>
	<?php
	$cat_posts = get_posts(array(
		'post_type' => 'post',
		'category_name' => 'portfolio',
		'posts_per_page' => 6,
		'orderby' => 'date',
		'order' => 'DESC'
	));
	global $post;
	if ($cat_posts) : foreach ($cat_posts as $post) : setup_postdata($post); ?>
			<div class="projects">

				<h3><a class="projects-title" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
				<?php
				the_post_thumbnail();
				?>
				<h2 style="padding:24px 96px;"><?php echo get_the_content(); ?></h3>

			</div>
	<?php endforeach;
	endif;
	wp_reset_postdata(); ?>


	<?php
	$cat_posts = get_posts(array(
		'post_type' => 'post',
		'category_name' => 'skills',
		'posts_per_page' => 6,
		'orderby' => 'date',
		'order' => 'DESC'
	));
	global $post;
	if ($cat_posts) : foreach ($cat_posts as $post) : setup_postdata($post); ?>
			<div class="skills">

				<h3><a class="skills-title" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
				<?php
				the_post_thumbnail('full');
				?>
				<h2 style="padding:24px 96px;"><?php echo get_the_content(); ?></h3>

			</div>
	<?php endforeach;
	endif;
	wp_reset_postdata(); ?>


	<div class="line width-10 height-50 left-1"></div>
	<div class="line width-5 height-20 left-5"></div>
	<div class="line width-2 height-160 margin-20 left-10"></div>
	<div class="line height-70 width-2 left-150"></div>
	<div class="line height-190 width-8 left-210"></div>
	<div class="line width-3 height-50 margin-20 left-3"></div>

	</main>
</body>

<script>
	$(function() {
		$(window).scroll(function() {

			const windowHeight = $(window).height();
			const scroll = $(window).scrollTop();

			$('.skills').each(function() {
				const targetPosition = $(this).offset().top;
				if (scroll > targetPosition - windowHeight + 100) {
					$(this).addClass("is-fadein");
				}
			});

			//Show Projects
			if ($(this).scrollTop() > 1000) {
				$('.projects').fadeIn(2000);
			}

			//Make Motion 
			const winScroll = $(this).scrollTop();
			let calWinScroll1 = Math.round(Math.random() * (winScroll * 0.1));
			let calWinScroll2 = Math.round(Math.random() * (winScroll * 0.1));
			let calWinScroll3 = Math.round(Math.random() * (winScroll * 0.1));
			console.log('rgb(' + calWinScroll1 + ', ' + calWinScroll2 + ', ' + calWinScroll3 + ')');
			$('.moveIcons').css('transform', 'translateX(' + winScroll * 0.5 + 'px)');
			$('.moveIcons2').css('transform', 'translateX(' + winScroll * 0.2 + 'px)');
			$('.line').css('transform', 'translateY(' + winScroll * 0.6 * -1 + 'px)');
			$('.line').css('background-color', 'rgb(' + calWinScroll1 + ', ' + calWinScroll2 + ', ' + calWinScroll3 + ')');
		});
	});
</script>
<?php
// get_sidebar();
get_footer();
