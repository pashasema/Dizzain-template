<form action="POST" id="openform" class="openform mfp-hide popup form">

		<div class="container openform__container">

			<div class="openform__imgwrap">
				<?php the_custom_logo();?>
			</div><!-- .openform__imgwrap -->

			<p class="all-titles openform__title">Request Beta Version</p>
			<div class="openform-container__inner">

				<div class="openform__left-part">
					<input type="text" class="form-group__field openform__field" name="name" placeholder="Full Name" required data-rule-required="true" data-rule-minlength="1" data-msg="Enter name" data-rule-checkMask="true">
					<input type="email" class="form-group__field openform__field" name="email" placeholder="Email Address" required data-rule-required="true" data-rule-minlength="1" data-msg="Enter email" data-rule-checkMask="true">
					<input type="tel" class="form-group__field openform__field" name="tel" placeholder="Phone Number" required data-rule-required="true" data-rule-minlength="1" data-msg="Enter email" data-rule-checkMask="true">
					<div class="custom-select openform__custom-select" style="width:100%;">
						<select name="select">
							<option value="Platform is not choosen">Select PLatform</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
						</select>
					</div><!-- .openform__custom-select -->
				</div><!-- .openform__left-part -->

				<div class="openform__right-part">
					<textarea class="form-group__textarea openform__textarea" name="comment" id="comment9" placeholder="Message(optional)"></textarea>
				</div><!-- .openform__right-part -->

			</div><!-- .openform-container__inner -->
			<button title="Close (Esc)" type="button" class="mfp-close">×</button>
			<button type="submit" class="btn openform__btn">Get Beta of Olynk</button>

		</div><!-- .container	 -->

	</form>