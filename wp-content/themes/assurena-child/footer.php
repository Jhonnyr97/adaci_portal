<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #main div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage assurena
 * @since 1.0
 * @version 1.0
 */
global $assurena_dynamic_css;

$scroll_up = assurena_Theme_Helper::get_option('scroll_up');
$scroll_up_as_text = assurena_Theme_Helper::get_option('scroll_up_appearance');
$scroll_up_text = assurena_Theme_Helper::get_option('scroll_up_text');


?>
	</main>  
  <div class="modal" id="reg_com_popup">
    <div class="modal-overlay modal-toggle"></div>
    <div class="modal-wrapper modal-transition">
      <div class="modal-header">
        <button class="modal-close modal-toggle"><svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path></svg></button>
        <h2 class="modal-heading">Complete Full Registration</h2>
      </div>
      
      <div class="modal-body">
        <div class="modal-content">
          <p>You have not complete your full registration. Please <a href="<?php echo get_site_url()."/registration"; ?>" target="_blank">click here</a> for complete your registration.</p>
        </div>
      </div>
    </div>
  </div>

	<?php
		get_template_part('templates/section', 'footer');

		if ($scroll_up) {
			echo '<a href="#" id="scroll_up">',
				$scroll_up_as_text ? $scroll_up_text : '',
			'</a>';
		}

		if (isset($assurena_dynamic_css['style']) && ! empty($assurena_dynamic_css['style'])) {
			echo '<span id="assurena-footer-inline-css" class="dynamic_styles-footer" style="display: none;">',
				assurena_Theme_Helper::render_html($assurena_dynamic_css['style']),
			'</span>';
		}

		wp_footer();
  ?>    
</body>
</html>