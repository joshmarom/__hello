<?php
/**
 * The template for displaying archive pages.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<main id="main" class="site-main" role="main">

	<header class="page-header">
		<?php the_archive_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <?php the_archive_description( '<p class="archive-description">', '</p>' ); ?>
	</header>

	<div class="page-content">
		<?php
		while ( have_posts() ) {
			the_post();
			$post_link = esc_url( get_permalink() ); ?>
			<article class="post">
				<?php
				printf( '<h2 class="%s"><a href="%s">%s</a></h2>', 'entry-title', $post_link, get_the_title() );
				printf( '<a href="%s">%s</a>', $post_link, get_the_post_thumbnail( $post, 'large' ) );
				the_excerpt();
				?>
			</article>
		<?php } ?>
	</div>

	<div class="entry-links"><?php wp_link_pages(); ?></div>

	<?php global $wp_query;
	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="nav-below" class="navigation" role="navigation">
			<?php /* Translators: HTML arrow */ ?>
            <div class="nav-previous"><?php next_posts_link( sprintf( __( '%s older', 'hello-elementor' ), '<span class="meta-nav">&larr;</span>' ) ); ?></div>
			<?php /* Translators: HTML arrow */ ?>
            <div class="nav-next"><?php previous_posts_link( sprintf( __( 'newer %s', 'hello-elementor' ), '<span class="meta-nav">&rarr;</span>' ) ); ?></div>
		</nav>
	<?php endif; ?>
</main>
