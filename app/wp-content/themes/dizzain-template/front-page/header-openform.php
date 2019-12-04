<form action="POST" id="openform" class="openform mfp-hide popup form">

	<div class="container openform__container">

		<div class="openform__imgwrap">
			<?php the_custom_logo();?>
		</div><!-- .openform__imgwrap -->

		<p class="all-titles openform__title">Request Beta Version</p>
		<div class="row">

			<div class="col-6 col-sm-12">
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

			<div class="col-6 col-sm-12">
				<textarea class="form-group__textarea openform__textarea" name="comment" id="comment9" placeholder="Message(optional)"></textarea>
			</div><!-- .openform__right-part -->

		</div><!-- .openform-container__inner -->
		<button title="Close (Esc)" type="button" class="mfp-close"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40px" height="40px" fill="#fff" viewBox="0 0 357 357" style="enable-background:new 0 0 357 357;" xml:space="preserve"><g><g id="close"><polygon points="357,35.7 321.3,0 178.5,142.8 35.7,0 0,35.7 142.8,178.5 0,321.3 35.7,357 178.5,214.2 321.3,357 357,321.3 214.2,178.5 "/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
		</button>
		<button type="submit" class="btn openform__btn">Get Beta of Olynk</button>

	</div><!-- .container	 -->

</form>