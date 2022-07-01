<?php

defined( 'ABSPATH' ) || exit;

/**
* assurena stlAdminIcon
*
*
* @class        stlAdminIcon
* @version      1.0
* @category     Class
* @author       StylusThemes
*/

if ( ! class_exists('stlAdminIcon') ) {
	class stlAdminIcon {

		private $icons = array();

		private static $instance = null;
		public static function get_instance( ) {
			if ( null == self::$instance ) {
				self::$instance = new self( );
			}

			return self::$instance;

		}

		private function __construct( ) {
			$this->load();
		}

		public function load() {
			$this->setup_stylesheet_data();    

		}

		private function setup_stylesheet_data() {
			$this->icons = $this->setup_icon_array();
		}

		private function setup_icon_array( ) {

			$icons = array();

			$icons = $this->get_icon_list();
			$icons = apply_filters( 'assurena_icon_list', $icons );
			return $icons;
		} 

		/*----------------------------------------------------------------------------*
		 * Public Helper Functions
		 *----------------------------------------------------------------------------*/
		public function get_icons_name( $get_icons_value = false ) {
			$icons = array();

			if(!empty($this->icons)){
				foreach ($this->icons as $key => $value) {
					$icons['fa fa-'.$value] = (bool) $get_icons_value ? 'fa fa-' .esc_html($value) : esc_html($value);
				}

				return $icons;                
			}else{
				return $icons;
			}

		}
		
		public function get_icon_list(){
			return array("500px","adjust","adn","align-center","align-justify","align-left","align-right","amazon","ambulance","american-sign-language-interpreting","anchor","android","angellist","angle-double-down","angle-double-left","angle-double-right","angle-double-up","angle-down","angle-left","angle-right","angle-up","apple","archive","area-chart","arrow-circle-down","arrow-circle-left","arrow-circle-o-down","arrow-circle-o-left","arrow-circle-o-right","arrow-circle-o-up","arrow-circle-right","arrow-circle-up","arrow-down","arrow-left","arrow-right","arrow-up","arrows","arrows-alt","arrows-h","arrows-v","assistive-listening-systems","asterisk","at","audio-description","backward","balance-scale","ban","bar-chart","barcode","bars","battery-empty","battery-full","battery-half","battery-quarter","battery-three-quarters","bed","beer","behance","behance-square","bell","bell-o","bell-slash","bell-slash-o","bicycle","binoculars","birthday-cake","bitbucket","bitbucket-square","black-tie","blind","bluetooth","bluetooth-b","bold","bolt","bomb","book","bookmark","bookmark-o","braille","briefcase","btc","bug","building","building-o","bullhorn","bullseye","bus","buysellads","calculator","calendar","calendar-check-o","calendar-minus-o","calendar-o","calendar-plus-o","calendar-times-o","camera","camera-retro","car","caret-down","caret-left","caret-right","caret-square-o-down","caret-square-o-left","caret-square-o-right","caret-square-o-up","caret-up","cart-arrow-down","cart-plus","cc","cc-amex","cc-diners-club","cc-discover","cc-jcb","cc-mastercard","cc-paypal","cc-stripe","cc-visa","certificate","chain-broken","check","check-circle","check-circle-o","check-square","check-square-o","chevron-circle-down","chevron-circle-left","chevron-circle-right","chevron-circle-up","chevron-down","chevron-left","chevron-right","chevron-up","child","chrome","circle","circle-o","circle-o-notch","circle-thin","clipboard","clock-o","clone","cloud","cloud-download","cloud-upload","code","code-fork","codepen","codiepie","coffee","cog","cogs","columns","comment","comment-o","commenting","commenting-o","comments","comments-o","compass","compress","connectdevelop","contao","copyright","creative-commons","credit-card","credit-card-alt","crop","crosshairs","css3","cube","cubes","cutlery","dashcube","database","deaf","delicious","desktop","deviantart","diamond","digg","dot-circle-o","download","dribbble","dropbox","drupal","edge","eject","ellipsis-h","ellipsis-v","empire","envelope","envelope-o","envelope-square","envira","eraser","eur","exchange","exclamation","exclamation-circle","exclamation-triangle","expand","expeditedssl","external-link","external-link-square","eye","eye-slash","eyedropper","fa","facebook","facebook-official","facebook-square","fast-backward","fast-forward","fax","female","fighter-jet","file","file-archive-o","file-audio-o","file-code-o","file-excel-o","file-image-o","file-o","file-pdf-o","file-powerpoint-o","file-text","file-text-o","file-video-o","file-word-o","files-o","film","filter","fire","fire-extinguisher","firefox","first-order","flag","flag-checkered","flag-o","flask","flickr","floppy-o","folder","folder-o","folder-open","folder-open-o","font","font-awesome","fonticons","fort-awesome","forumbee","forward","foursquare","frown-o","futbol-o","gamepad","gavel","gbp","genderless","get-pocket","gg","gg-circle","gift","git","git-square","github","github-alt","github-square","gitlab","glass","glide","glide-g","globe","google","google-plus","google-plus-official","google-plus-square","google-wallet","graduation-cap","gratipay","h-square","hacker-news","hand-lizard-o","hand-o-down","hand-o-left","hand-o-right","hand-o-up","hand-paper-o","hand-peace-o","hand-pointer-o","hand-rock-o","hand-scissors-o","hand-spock-o","hashtag","hdd-o","header","headphones","heart","heart-o","heartbeat","history","home","hospital-o","hourglass","hourglass-end","hourglass-half","hourglass-o","hourglass-start","houzz","html5","i-cursor","ils","inbox","indent","industry","info","info-circle","inr","instagram","internet-explorer","ioxhost","italic","joomla","jpy","jsfiddle","key","keyboard-o","krw","language","laptop","lastfm","lastfm-square","leaf","leanpub","lemon-o","level-down","level-up","life-ring","lightbulb-o","line-chart","link","linkedin","linkedin-square","linux","list","list-alt","list-ol","list-ul","location-arrow","lock","long-arrow-down","long-arrow-left","long-arrow-right","long-arrow-up","low-vision","magic","magnet","male","map","map-marker","map-o","map-pin","map-signs","mars","mars-double","mars-stroke","mars-stroke-h","mars-stroke-v","maxcdn","meanpath","medium","medkit","meh-o","mercury","microphone","microphone-slash","minus","minus-circle","minus-square","minus-square-o","mixcloud","mobile","modx","money","moon-o","motorcycle","mouse-pointer","music","neuter","newspaper-o","object-group","object-ungroup","odnoklassniki","odnoklassniki-square","opencart","openid","opera","optin-monster","outdent","pagelines","paint-brush","paper-plane","paper-plane-o","paperclip","paragraph","pause","pause-circle","pause-circle-o","paw","paypal","pencil","pencil-square","pencil-square-o","percent","phone","phone-square","picture-o","pie-chart","pied-piper","pied-piper-alt","pied-piper-pp","pinterest","pinterest-p","pinterest-square","plane","play","play-circle","play-circle-o","plug","plus","plus-circle","plus-square","plus-square-o","power-off","print","product-hunt","puzzle-piece","qq","qrcode","question","question-circle","question-circle-o","quote-left","quote-right","random","rebel","recycle","reddit","reddit-alien","reddit-square","refresh","registered","renren","repeat","reply","reply-all","retweet","road","rocket","rss","rss-square","rub","safari","scissors","scribd","search","search-minus","search-plus","sellsy","server","share","share-alt","share-alt-square","share-square","share-square-o","shield","ship","shirtsinbulk","shopping-bag","shopping-basket","shopping-cart","sign-in","sign-language","sign-out","signal","simplybuilt","sitemap","skyatlas","skype","slack","sliders","slideshare","smile-o","snapchat","snapchat-ghost","snapchat-square","sort","sort-alpha-asc","sort-alpha-desc","sort-amount-asc","sort-amount-desc","sort-asc","sort-desc","sort-numeric-asc","sort-numeric-desc","soundcloud","space-shuttle","spinner","spoon","spotify","square","square-o","stack-exchange","stack-overflow","star","star-half","star-half-o","star-o","steam","steam-square","step-backward","step-forward","stethoscope","sticky-note","sticky-note-o","stop","stop-circle","stop-circle-o","street-view","strikethrough","stumbleupon","stumbleupon-circle","subscript","subway","suitcase","sun-o","superscript","table","tablet","tachometer","tag","tags","tasks","taxi","television","tencent-weibo","terminal","text-height","text-width","th","th-large","th-list","themeisle","thumb-tack","thumbs-down","thumbs-o-down","thumbs-o-up","thumbs-up","ticket","times","times-circle","times-circle-o","tint","toggle-off","toggle-on","trademark","train","transgender","transgender-alt","trash","trash-o","tree","trello","tripadvisor","trophy","truck","try","tty","tumblr","tumblr-square","twitch","twitter","twitter-square","umbrella","underline","undo","universal-access","university","unlock","unlock-alt","upload","usb","usd","user","user-md","user-plus","user-secret","user-times","users","venus","venus-double","venus-mars","viacoin","viadeo","viadeo-square","video-camera","vimeo","vimeo-square","vine","vk","volume-control-phone","volume-down","volume-off","volume-up","weibo","weixin","whatsapp","wheelchair","wheelchair-alt","wifi","wikipedia-w","windows","wordpress","wpbeginner","wpforms","wrench","xing","xing-square","y-combinator","yahoo","yelp","yoast","youtube","youtube-play","youtube-square");
		}
	}

	function stlAdminIcon() {
		return stlAdminIcon::get_instance();
	}

	// Call Admin Func
	stlAdminIcon();
}
?>