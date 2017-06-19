<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package activello
 */
?>
				</div><!-- close .*-inner (main-content or sidebar, depending if sidebar is used) -->
			</div><!-- close .row -->
		</div><!-- close .container -->
	</div><!-- close .site-content -->

	<div id="footer-area">
		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="site-info container">
				<div class="row">
			
					<?php if( !get_theme_mod('footer_social') ) activello_social_icons(); ?>
					<div class="col-sm-4 col-md-4">
						<div class="boxes_footer">
						  <p class="footer-text">
						  <?php
								if(is_active_sidebar('footer-sidebar-1')){
								dynamic_sidebar('footer-sidebar-1');
								}
								?>

						  
						 
							</p>
						</div>
					</div>
					<div class="col-sm-4 col-md-4">
						<div class="boxes_footer">
						
						 
						<p class="footer-text">
						 <?php
								if(is_active_sidebar('footer-sidebar-1')){
								dynamic_sidebar('footer-sidebar-1');
								}
								?>
						</p>
						
						</div>
					</div>
						
					</div>
					
				</div>
				
			</br>
			
			</div>
			</div><!-- .site-info -->
			
			<!--<div class="scroll-to-top"><i class="fa fa-angle-up"></i></div><!-- .scroll-to-top -->
		</footer> 
		
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>