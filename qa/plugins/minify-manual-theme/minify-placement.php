<?php
/**
 * Template Name: Minify minify-placement-manual.php
 * Description: A Page Template for testing minify manual js/css placement
 *
 * @package W3TC
 * @subpackage W3TC QA
 */

// Enqueue showcase script for the slider
wp_enqueue_script( 'jquery' );

wp_enqueue_script( 'minify-js1', get_template_directory_uri() . '/qa/minify-auto-js1.js' );
wp_enqueue_script( 'minify-js2', get_template_directory_uri() . '/qa/minify-auto-js2.js' );
wp_enqueue_script( 'minify-js3', get_template_directory_uri() . '/qa/minify-auto-js3.js' );
wp_enqueue_style( 'minify-css', get_template_directory_uri() . '/qa/minify-style.css' );

function minify_js4() {
	$url4 = get_template_directory_uri() . '/qa/minify-auto-js4.js';
	$url5 = get_template_directory_uri() . '/qa/minify-auto-js5.js';
	?>
	<script type="text/javascript">
	/* <![CDATA[ */
	var js4 = '#js4';
	/* ]]> */
	</script>
	<script type="text/javascript" src="<?php echo $url4 ?>"></script>
	<script type="text/javascript" src='<?php echo $url5 ?>'></script>
	<!-- test js placement --><!-- W3TC-include-js-head -->
	<?php
}

function minify_css() { ?>
	<!-- test css placement --><!-- W3TC-include-css -->
<?php
}

add_action('wp_head', 'minify_js4');
add_action('wp_head', 'minify_css');

get_header(); ?>
<!-- test minify body start --><!-- W3TC-include-js-body-start -->
	<div id="main-content" class="main-content">
		<div id="primary" class="content-area">
			<div id="content" role="main" class="site-content">
			<p>JS1: <span id="js1">failed</span></p>
			<p>JS2: <span id="js2">failed</span></p>
			<p>JS3: <span id="js3">failed</span></p>
			<p>JS4: <span id="js4">failed</span></p>
			<p>JS5: <span id="js5">failed</span></p>
			<p>JS6: <span id="js6">failed</span></p>



				<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/**
					 * We are using a heading by rendering the_content
					 * If we have content for this page, let's display it.
					 */
					if ( '' != get_the_content() )
						get_template_part( 'content', 'intro' );
				?>

				<?php endwhile; ?>

				<?php

				$url6 = get_template_directory_uri() . '/qa/minify-auto-js6.js';
				// no quotes around script url
				echo '<script type="text/javascript" src=' . $url6 . '></script>';

				?>

			</div><!-- #content -->
		</div><!-- #primary -->
</div><!-- #primary -->
<!-- test minify body end --><!-- W3TC-include-js-body-end -->

<?php get_footer(); ?>
