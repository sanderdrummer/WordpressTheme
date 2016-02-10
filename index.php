<?php
/**
 * The template for displaying the home/index page.
 * This template will also be called in any case where the Wordpress engine 
 * doesn't know which template to use (e.g. 404 error)
 */

get_header(); // This fxn gets the header.php file and renders it ?>
	<div id="primary" class="container grid">
		<div id="content" role="main" class="col-12">

			<?php if ( have_posts() ) : 
			// Do we have any posts in the databse that match our query?
			// In the case of the home page, this will call for the most recent posts 
			?>

				<?php while ( have_posts() ) : the_post(); 
				// If we have some posts to show, start a loop that will display each one the same way
				?>

					<article class="post box">
						<div class="underline">
							<h2 class="title">
								<a href="<?php the_permalink(); // Get the link to this post ?>" title="<?php the_title(); ?>">
									<?php the_title(); // Show the title of the posts as a link ?>
									<span class="text-right"><?php the_time('d-m-Y'); // Display the time published ?> </span>
								</a>
							</h2>
						</div>	
						
						<div class="the-content">
							<?php the_content( 'Mehr...' ); 
							// This call the main content of the post, the stuff in the main text box while composing.
							// This will wrap everything in p tags and show a link as 'Continue...' where/if the
							// author inserted a <!-- more --> link in the post body
							?>
							
							<?php wp_link_pages(); // This will display pagination links, if applicable to the post ?>
						</div><!-- the-content -->			
					</article>

				<?php endwhile; // OK, let's stop the posts loop once we've exhausted our query/number of posts ?>
				
				<!-- pagintation -->
				<div id="pagination" class="grid m-t-5 box">
					<div class="col-3 past-page"><?php previous_posts_link( 'neuere Posts' ); // Display a link to  newer posts, if there are any, with the text 'newer' ?></div>
					<div class="col-3 off-6 next-page text-right"><?php next_posts_link( 'ältere Posts' ); // Display a link to  older posts, if there are any, with the text 'older' ?></div>
				</div><!-- pagination -->


			<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
				
				<article class="post error">
					<h1 class="404">:( Keine Posts</h1>
				</article>

			<?php endif; // OK, I think that takes care of both scenarios (having posts or not having any posts) ?>
		</div><!-- #content .site-content -->
	</div><!-- #primary .content-area -->
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
