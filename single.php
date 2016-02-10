<?php
/**
 * The template for displaying any single post.
 *
 */

get_header(); // This fxn gets the header.php file and renders it 

?>
	<div id="primary" class="">
		<div id="content" role="main" class="m-t-5">

			<?php if ( have_posts() ) : 
			// Do we have any posts in the databse that match our query?
			?>

				<?php while ( have_posts() ) : the_post(); 
				// If we have a post to show, start a loop that will display it
				?>

					<article class="post m-t-2 m-b-2 box">
						<div class="underline">
							<h2 class="hug highlight"><?php the_title(); // Display the title of the page ?></h2>
						</div>	
						<div class="the-content">
							<?php the_content(); 
							// This call the main content of the post, the stuff in the main text box while composing.
							// This will wrap everything in p tags
							?>
							
							<?php 
							// This will display pagination links, if applicable to the post 
							wp_link_pages( array(
								'before'      => '<div class="grid page-links">',
								'after'       => '</div>',
								'nextpagelink'     => __( 'Nächste Seite' ),
								'previouspagelink' => __( 'Vorherige Seite' ),
								'link_before' => '<div>',
								'link_after'  => '</div>',
								) );?>
						</div><!-- the-content -->
					
						
					</article>

				<?php endwhile; // OK, let's stop the post loop once we've displayed it ?>
			<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
				
				<article class="post error">
					<h1 class="404">Nothing has been posted like that yet</h1>
				</article>

			<?php endif; // OK, I think that takes care of both scenarios (having a post or not having a post to show) ?>
			
			<?php nav_breadcrumb(); ?>

		</div><!-- #content .site-content -->
	</div><!-- #primary .content-area -->
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
