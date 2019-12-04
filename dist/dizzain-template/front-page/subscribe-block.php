<section class="subscribe-block" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/get-notified.jpg)">

	<form class="subscribe-block__form" method="POST">
		<!-- Additional fields -->
		<input name="utm" value="" type="hidden">
		<input name="place" value="" type="hidden">

		<div class="container">

			<div class="form-group subscribe-block__form-group">
				<div class="all-titles subscribe-block__form-title">Get notified about launching</div>

				<input type="email" class="form-group__field subscribe-block__form-field" name="email" placeholder="Enter yout email here" required data-rule-required="true" data-rule-minlength="1" data-msg="Enter email" data-rule-checkMask="true">

				<button type="submit" class="btn subscribe-block__form-btn">
					<span class="textbtn subscribe-block__form-textbtn">Submit</span>
				</button>

			</div><!-- .subscribe-block__form-group -->

		</div><!-- .container -->

	</form><!-- .subscribe-block__form -->
		</section><!-- .subscribe-block -->