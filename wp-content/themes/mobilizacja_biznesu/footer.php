<?php
	wp_footer();
?>
			</main>
		<footer class="footer">
			<div class="footer__wrapper">
				<?php footerTopSection(); ?>
				<div class="footer__box footer__box--bottom">
					<div class="footer__boxItem">
						<p><span class="footer__boxSpan">&copy; <?= bloginfo('name')." ".date('Y'); ?></span><a class="footer__boxLink" href="<?= get_home_url(); ?>/polityka-prywatnosci">Polityka prywatności</a></p>
					</div>
					<div class="footer__boxItem">
						<p class="footer__boxParagraph">Projekt strony internetowej stworzony przez <a class="footer__boxLink" href="#" target="_blank">Agencję Interaktywną Wzór</a></p>
					</div>
				</div>
			</div>
		</footer>
    </body>
</html>