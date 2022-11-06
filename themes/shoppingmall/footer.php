<footer class="footer">
	<section class="container">
		<div class="row">
			<div class="col-12">
				<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
					<?php if(function_exists('bcn_display'))
					{
					bcn_display();
					}?>
				</div>
			</div>
		</div>
		<div class="row footer-menu-section">
			<?php if ( is_active_sidebar( 'footer-menu' )): ?>
				<div class="col-lg-8">
					<!-- Footer Main menu -->
					<div class="footer-menu">
						<div class="footer-menu-wrap clearfix">
							<?php dynamic_sidebar( 'footer-menu' ); ?>
						</div>
					</div>
					<!-- Footer EOF main menu -->
				</div>
			<?php endif; ?>
			<div class="col-lg-4">
				<div class="contact-details">
					<?php if ( is_active_sidebar( 'contact-details' )):
					dynamic_sidebar( 'contact-details' );
					endif; ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div id="copyright" class="copyright">Copyright &copy; <?php echo date('Y')?> All Rights Reserved. | <a target="_blank" title="" href="#">Shopping Mall</a>
				</div>
			</div>
		</div>
	</section>
</footer>
	<!-- JQuery -->
	<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
	<!-- Jbootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<?php wp_footer(); ?>
</body>
</html>