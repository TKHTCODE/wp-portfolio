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
	<video src="https://taka-portfolio.s3.us-west-1.amazonaws.com/bg-portfolio.mp4" autoplay playsinline muted loop></video>
	<div class="navigationbar">
		<h1 class="sitetitle"><?php bloginfo('name'); ?></h1>
		<!-- <p><?php echo get_bloginfo('description', 'display'); ?></p> -->
	</div>
</div>

<body>

	<div class="container">
		<div class="left">
			<div class="box pink">
				<span class="moveIcons"><i class="fa-brands fa-php fa-5x margin-5"></i></span>
			</div>
			<div class="box purple">
				<span class="moveIcons"><i class="fa-brands fa-js fa-5x margin-5"></i></span>
			</div>
			<div class="box green">
				<span class="moveIcons"><i class="fa-brands fa-html5 fa-5x margin-5"></i></span>
			</div>
		</div>
		<div class="right">
			<div class="box blue">
				<span class="moveIcons"><i class="fa-brands fa-css3 fa-5x margin-5"></i></span>
			</div>
			<div class="box green">
				<span class="moveIcons"><i class="fa-brands fa-git fa-5x margin-5"></i></span>
			</div>
			<div class="box pink">
				<span class="moveIcons"><i class="fa-brands fa-linux fa-5x margin-5"></i></span>
			</div>
		</div>
	</div>


	<p id="interval">scroll:0</p>
	<div id="wrap">
		<div class="object">
			<span class="pos0">
				<img src="http://gimmicklog.main.jp/demo/images/leaf.png" />
			</span>
			<span class="possecond">
				<img src="http://gimmicklog.main.jp/demo/images/leaf.png" />
			</span>
		</div>
		<p class="border1">pos1</p>
		<p class="border2">pos2</p>
		<main id="primary" class="site-main bg-danger">
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

					<!-- Start loop -->
					<div class="projects" style="display: none;">
						<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
						<p><?php the_category(', ') ?></p>
						<?php if (has_post_thumbnail()) : ?>
							<?php the_post_thumbnail('full'); ?>
						<?php else : ?>
							<img src="https://picsum.photos/200" width="100" height="100" alt="default" />
						<?php endif; ?>
						<p style="color: white;"><?php echo get_the_content(); ?></p>
					</div>
					<!-- End loop -->

			<?php endforeach;
			endif;
			wp_reset_postdata(); ?>

			<p class="border3">pos3</p>
	</div>

	<div class="line width-10 height-50 left-1"></div>
	<div class="line width-5 height-20 left-5"></div>
	<div class="line width-2 height-160 margin-20 left-10"></div>
	<div class="line height-70 width-2 left-150"></div>
	<div class="line height-190 width-8 left-210"></div>
	<div class="line width-3 height-50 margin-20 left-3"></div>



</body>
</main>
<script>
	$(function() {
		$(window).scroll(function() {

			//Show Projects
			if ($(this).scrollTop() > 1000) {
				$('.projects').fadeIn(1500);
			}

			//Make Motion 
			const winScroll = $(this).scrollTop();
			let calWinScroll1 = Math.round(Math.random() * (winScroll * 0.1));
			let calWinScroll2 = Math.round(Math.random() * (winScroll * 0.1));
			let calWinScroll3 = Math.round(Math.random() * (winScroll * 0.1));
			console.log('rgb(' + calWinScroll1 + ', ' + calWinScroll2 + ', ' + calWinScroll3 + ')');
			$('.moveIcons').css('transform', 'translateX(' + winScroll * 0.5 + 'px)');
			$('.line').css('transform', 'translateY(' + winScroll * 0.6 * -1 + 'px)');
			$('.line').css('background-color', 'rgb(' + calWinScroll1 + ', ' + calWinScroll2 + ', ' + calWinScroll3 + ')');

			//Swing motion
			$('#interval').text('scroll:' + $(this).scrollTop());
			var top = $(this).scrollTop();
			if (top > 1 && top < 199) {
				$(".object span").removeClass().addClass('pos0');
			}
			if (top > 200 && top < 599) {
				$(".object span").removeClass().addClass('pos1');
			}
			if (top > 600 && top < 999) {
				$(".object span").removeClass().addClass('pos2');
			}
			if (top > 1000 && top < 2000) {
				$(".object span").removeClass().addClass('pos3');
			}
		});
	});
</script>
<?php
// get_sidebar();
get_footer();
