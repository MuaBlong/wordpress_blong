<?php
/**
 * Wizard
 *
 * @package CV_Resume_Portfolio_Whizzie
 * @author Catapult Themes
 * @since 1.0.0
 */

class CV_Resume_Portfolio_Whizzie {
	
	protected $version = '1.1.0';
	
	/** @var string Current theme name, used as namespace in actions. */
	protected $cv_resume_portfolio_theme_name = '';
	protected $cv_resume_portfolio_theme_title = '';
	
	/** @var string Wizard page slug and title. */
	protected $cv_resume_portfolio_page_slug = '';
	protected $cv_resume_portfolio_page_title = '';
	
	/** @var array Wizard steps set by user. */
	protected $config_steps = array();
	
	/**
	 * Relative plugin url for this plugin folder
	 * @since 1.0.0
	 * @var string
	 */
	protected $cv_resume_portfolio_plugin_url = '';

	public $cv_resume_portfolio_plugin_path;
	public $parent_slug;
	
	/**
	 * TGMPA instance storage
	 *
	 * @var object
	 */
	protected $tgmpa_instance;
	
	/**
	 * TGMPA Menu slug
	 *
	 * @var string
	 */
	protected $tgmpa_menu_slug = 'tgmpa-install-plugins';
	
	/**
	 * TGMPA Menu url
	 *
	 * @var string
	 */
	protected $tgmpa_url = 'themes.php?page=tgmpa-install-plugins';
	
	/**
	 * Constructor
	 *
	 * @param $config	Our config parameters
	 */
	public function __construct( $config ) {
		$this->set_vars( $config );
		$this->init();
	}
	
	/**
	 * Set some settings
	 * @since 1.0.0
	 * @param $config	Our config parameters
	 */
	public function set_vars( $config ) {
	
		require_once trailingslashit( WHIZZIE_DIR ) . 'tgm/class-tgm-plugin-activation.php';
		require_once trailingslashit( WHIZZIE_DIR ) . 'tgm/tgm.php';

		if( isset( $config['cv_resume_portfolio_page_slug'] ) ) {
			$this->cv_resume_portfolio_page_slug = esc_attr( $config['cv_resume_portfolio_page_slug'] );
		}
		if( isset( $config['cv_resume_portfolio_page_title'] ) ) {
			$this->cv_resume_portfolio_page_title = esc_attr( $config['cv_resume_portfolio_page_title'] );
		}
		if( isset( $config['steps'] ) ) {
			$this->config_steps = $config['steps'];
		}
		
		$this->cv_resume_portfolio_plugin_path = trailingslashit( dirname( __FILE__ ) );
		$relative_url = str_replace( get_template_directory(), '', $this->cv_resume_portfolio_plugin_path );
		$this->cv_resume_portfolio_plugin_url = trailingslashit( get_template_directory_uri() . $relative_url );
		$cv_resume_portfolio_current_theme = wp_get_theme();
		$this->cv_resume_portfolio_theme_title = $cv_resume_portfolio_current_theme->get( 'Name' );
		$this->cv_resume_portfolio_theme_name = strtolower( preg_replace( '#[^a-zA-Z]#', '', $cv_resume_portfolio_current_theme->get( 'Name' ) ) );
		$this->cv_resume_portfolio_page_slug = apply_filters( $this->cv_resume_portfolio_theme_name . '_theme_setup_wizard_cv_resume_portfolio_page_slug', $this->cv_resume_portfolio_theme_name . '-wizard' );
		$this->parent_slug = apply_filters( $this->cv_resume_portfolio_theme_name . '_theme_setup_wizard_parent_slug', '' );

	}
	
	/**
	 * Hooks and filters
	 * @since 1.0.0
	 */	
	public function init() {
		
		if ( class_exists( 'TGM_Plugin_Activation' ) && isset( $GLOBALS['tgmpa'] ) ) {
			add_action( 'init', array( $this, 'get_tgmpa_instance' ), 30 );
			add_action( 'init', array( $this, 'set_tgmpa_url' ), 40 );
		}
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_menu', array( $this, 'menu_page' ) );
		add_action( 'admin_init', array( $this, 'get_plugins' ), 30 );
		add_filter( 'tgmpa_load', array( $this, 'tgmpa_load' ), 10, 1 );
		add_action( 'wp_ajax_setup_plugins', array( $this, 'setup_plugins' ) );
		
	}
	
	public function enqueue_scripts() {
		wp_enqueue_style( 'cv-resume-portfolio-homepage-setup-style', get_template_directory_uri() . '/inc/homepage-setup/assets/css/homepage-setup-style.css');
		wp_register_script( 'cv-resume-portfolio-homepage-setup-script', get_template_directory_uri() . '/inc/homepage-setup/assets/js/homepage-setup-script.js', array( 'jquery' ), time() );
		wp_localize_script( 
			'cv-resume-portfolio-homepage-setup-script',
			'whizzie_params',
			array(
				'ajaxurl' 		=> admin_url( 'admin-ajax.php' ),
				'wpnonce' 		=> wp_create_nonce( 'whizzie_nonce' ),
				'verify_text'	=> esc_html( 'verifying', 'cv-resume-portfolio' )
			)
		);
		wp_enqueue_script( 'cv-resume-portfolio-homepage-setup-script' );
	}
	
	public static function get_instance() {
		if ( ! self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}
	
	public function tgmpa_load( $status ) {
		return is_admin() || current_user_can( 'install_themes' );
	}
			
	/**
	 * Get configured TGMPA instance
	 *
	 * @access public
	 * @since 1.1.2
	 */
	public function get_tgmpa_instance() {
		$this->tgmpa_instance = call_user_func( array( get_class( $GLOBALS['tgmpa'] ), 'get_instance' ) );
	}
	
	/**
	 * Update $tgmpa_menu_slug and $tgmpa_parent_slug from TGMPA instance
	 *
	 * @access public
	 * @since 1.1.2
	 */
	public function set_tgmpa_url() {
		$this->tgmpa_menu_slug = ( property_exists( $this->tgmpa_instance, 'menu' ) ) ? $this->tgmpa_instance->menu : $this->tgmpa_menu_slug;
		$this->tgmpa_menu_slug = apply_filters( $this->cv_resume_portfolio_theme_name . '_theme_setup_wizard_tgmpa_menu_slug', $this->tgmpa_menu_slug );
		$tgmpa_parent_slug = ( property_exists( $this->tgmpa_instance, 'parent_slug' ) && $this->tgmpa_instance->parent_slug !== 'themes.php' ) ? 'admin.php' : 'themes.php';
		$this->tgmpa_url = apply_filters( $this->cv_resume_portfolio_theme_name . '_theme_setup_wizard_tgmpa_url', $tgmpa_parent_slug . '?page=' . $this->tgmpa_menu_slug );
	}
	
	/**
	 * Make a modal screen for the wizard
	 */
	public function menu_page() {
		add_theme_page( esc_html( $this->cv_resume_portfolio_page_title ), esc_html( $this->cv_resume_portfolio_page_title ), 'manage_options', $this->cv_resume_portfolio_page_slug, array( $this, 'wizard_page' ) );
	}
	
	/**
	 * Make an interface for the wizard
	 */
	public function wizard_page() { 
		tgmpa_load_bulk_installer();

		if ( ! class_exists( 'TGM_Plugin_Activation' ) || ! isset( $GLOBALS['tgmpa'] ) ) {
			die( esc_html__( 'Failed to find TGM', 'cv-resume-portfolio' ) );
		}

		$url = wp_nonce_url( add_query_arg( array( 'plugins' => 'go' ) ), 'whizzie-setup' );
		$method = '';
		$fields = array_keys( $_POST );

		if ( false === ( $creds = request_filesystem_credentials( esc_url_raw( $url ), $method, false, false, $fields ) ) ) {
			return true;
		}

		if ( ! WP_Filesystem( $creds ) ) {
			request_filesystem_credentials( esc_url_raw( $url ), $method, true, false, $fields );
			return true;
		}

		$cv_resume_portfolio_theme = wp_get_theme();
		$cv_resume_portfolio_theme_title = $cv_resume_portfolio_theme->get( 'Name' );
		$cv_resume_portfolio_theme_version = $cv_resume_portfolio_theme->get( 'Version' );

		?>
		<div class="wrap">
			<?php
				printf( '<h1>%s %s</h1>', esc_html( $cv_resume_portfolio_theme_title ), esc_html( '(Version :- ' . $cv_resume_portfolio_theme_version . ')' ) );
			?>
			<div class="homepage-setup">
				<div class="homepage-setup-theme-bundle">
					<div class="homepage-setup-theme-bundle-one">
						<h1><?php echo esc_html__( 'WP Theme Bundle', 'cv-resume-portfolio' ); ?></h1>
						<p><?php echo wp_kses_post( 'Get <span>15% OFF</span> on all WordPress themes! Use code <span>"BNDL15OFF"</span> at checkout. Limited time offer!' ); ?></p>
					</div>
					<div class="homepage-setup-theme-bundle-two">
						<p><?php echo wp_kses_post( 'Extra <span>15%</span> OFF' ); ?></p>
					</div>
					<div class="homepage-setup-theme-bundle-three">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/inc/homepage-setup/assets/homepage-setup-images/bundle-banner.png' ); ?>" alt="<?php echo esc_attr__( 'Theme Bundle Image', 'cv-resume-portfolio' ); ?>">
					</div>
					<div class="homepage-setup-theme-bundle-four">
						<p><?php echo wp_kses_post( '<span>$2795</span>$69' ); ?></p>
						<a target="_blank" href="<?php echo esc_url( CV_RESUME_PORTFOLIO_BUNDLE_BUTTON ); ?>"><?php echo esc_html__( 'SHOP NOW', 'cv-resume-portfolio' ); ?> <span class="dashicons dashicons-arrow-right-alt2"></span></a>
					</div>
				</div>
			</div>
			<div class="card whizzie-wrap">
				<div class="demo_content_image">
					<div class="demo_content">
						<?php
							$cv_resume_portfolio_steps = $this->get_steps();
							echo '<ul class="whizzie-menu">';
							foreach ( $cv_resume_portfolio_steps as $cv_resume_portfolio_step ) {
								$class = 'step step-' . esc_attr( $cv_resume_portfolio_step['id'] );
								echo '<li data-step="' . esc_attr( $cv_resume_portfolio_step['id'] ) . '" class="' . esc_attr( $class ) . '">';
								printf( '<h2>%s</h2>', esc_html( $cv_resume_portfolio_step['title'] ) );

								$content = call_user_func( array( $this, $cv_resume_portfolio_step['view'] ) );
								if ( isset( $content['summary'] ) ) {
									printf(
										'<div class="summary">%s</div>',
										wp_kses_post( $content['summary'] )
									);
								}
								if ( isset( $content['detail'] ) ) {
									printf(
										'<div class="detail">%s</div>',
										wp_kses_post( $content['detail'] )
									);
								}
								if ( isset( $cv_resume_portfolio_step['button_text'] ) && $cv_resume_portfolio_step['button_text'] && !isset( $cv_resume_portfolio_step['button_url'] ) ) {
									printf( 
										'<div class="button-wrap"><a href="#" class="button button-primary do-it" data-callback="%s" data-step="%s">%s</a></div>',
										esc_attr( $cv_resume_portfolio_step['callback'] ),
										esc_attr( $cv_resume_portfolio_step['id'] ),
										esc_html( $cv_resume_portfolio_step['button_text'] )
									);
								}

								if ( isset( $cv_resume_portfolio_step['button_url'] ) ) {
									printf( 
										'<div class="button-wrap"><a href="%s" class="button button-primary"  data-step="%s">%s</a></div>',
										esc_attr( $cv_resume_portfolio_step['button_url'] ),
										esc_attr( $cv_resume_portfolio_step['id'] ),
										esc_html( $cv_resume_portfolio_step['button_text'] )
									);
								}
								echo '</li>';
							}
							echo '</ul>';
						?>
						
						<ul class="whizzie-nav">
							<?php
							$step_number = 1;	
							foreach ( $cv_resume_portfolio_steps as $cv_resume_portfolio_step ) {
								echo '<li class="nav-step-' . esc_attr( $cv_resume_portfolio_step['id'] ) . '">';
								echo '<span class="step-number">' . esc_html( $step_number ) . '</span>';
								echo '</li>';
								$step_number++;
							}
							?>
							<div class="blank-border"></div>
						</ul>

						<div class="homepage-setup-links">
							<div class="homepage-setup-links buttons">
								<a href="<?php echo esc_url( CV_RESUME_PORTFOLIO_LITE_DOCS_PRO ); ?>" target="_blank" class="button button-primary"><?php echo esc_html__( 'Free Documentation', 'cv-resume-portfolio' ); ?></a>
								<a href="<?php echo esc_url( CV_RESUME_PORTFOLIO_BUY_NOW ); ?>" class="button button-primary" target="_blank"><?php echo esc_html__( 'Get Premium', 'cv-resume-portfolio' ); ?></a>
								<a href="<?php echo esc_url( CV_RESUME_PORTFOLIO_DEMO_PRO ); ?>" class="button button-primary" target="_blank"><?php echo esc_html__( 'Premium Demo', 'cv-resume-portfolio' ); ?></a>
								<a href="<?php echo esc_url( CV_RESUME_PORTFOLIO_SUPPORT_FREE ); ?>" target="_blank" class="button button-primary"><?php echo esc_html__( 'Support Forum', 'cv-resume-portfolio' ); ?></a>
							</div>
						</div> <!-- .demo_image -->

						<div class="step-loading"><span class="spinner"></span></div>
					</div> <!-- .demo_content -->
					<div class="homepage-setup-image">
						<div class="homepage-setup-theme-buynow">
							<div class="homepage-setup-theme-buynow-one">
								<h1><?php echo wp_kses_post( ' CV Resume<br>Portfolio<br>WordPress Theme' ); ?></h1>
								<p><?php echo wp_kses_post( '<span>25%<br>Off</span> SHOP NOW' ); ?></p>
							</div>
							<div class="homepage-setup-theme-buynow-two">
								<img src="<?php echo esc_url( get_template_directory_uri() . '/inc/homepage-setup/assets/homepage-setup-images/cv-resume-portfolio.png' ); ?>" alt="<?php echo esc_attr__( 'Theme Bundle Image', 'cv-resume-portfolio' ); ?>">
							</div>
							<div class="homepage-setup-theme-buynow-three">
								<p><?php echo wp_kses_post( 'Get <span>25% OFF</span> on Premium  CV Resume Portfolio WordPress Theme Use code <span>"NYTHEMES25"</span> at checkout.' ); ?></p>
							</div>
							<div class="homepage-setup-theme-buynow-four">
								<a target="_blank" href="<?php echo esc_url(  CV_RESUME_PORTFOLIO_BUY_NOW ); ?>"><?php echo esc_html__( 'Upgrade To Pro With Just $40', 'cv-resume-portfolio' ); ?></a>
							</div>
						</div>
					</div>
				</div> <!-- .demo_content_image -->
			</div> <!-- .whizzie-wrap -->
		</div> <!-- .wrap -->
		<?php
	}


	/**
	 * Set options for the steps
	 * Incorporate any options set by the theme dev
	 * Return the array for the steps
	 * @return Array
	 */
	public function get_steps() {
		$cv_resume_portfolio_dev_steps = $this->config_steps;
		$cv_resume_portfolio_steps = array( 
			'plugins' => array(
				'id'			=> 'plugins',
				'title'			=> __( 'Install and Activate Essential Plugins', 'cv-resume-portfolio' ),
				'icon'			=> 'admin-plugins',
				'view'			=> 'get_step_plugins',
				'callback'		=> 'install_plugins',
				'button_text'	=> __( 'Install Plugins', 'cv-resume-portfolio' ),
				'can_skip'		=> true
			),
			'widgets' => array(
				'id'          => 'widgets',
				'title'       => __( 'Setup Home Page', 'cv-resume-portfolio' ),
				'icon'        => 'welcome-widgets-menus',
				'view'        => 'get_step_widgets',
				'callback'    => 'cv_resume_portfolio_install_widgets',
				'button_text' => __( 'Start Home Page Setup', 'cv-resume-portfolio' ),
				'button_url'  => esc_url( admin_url( 'themes.php?page=ediot-template-importer' ) ),
				'can_skip'    => false,
			)
		);
		
		// Iterate through each step and replace with dev config values
		if( $cv_resume_portfolio_dev_steps ) {
			// Configurable elements - these are the only ones the dev can update from homepage-setup-settings.php
			$can_config = array( 'title', 'icon', 'button_text', 'can_skip' );
			foreach( $cv_resume_portfolio_dev_steps as $cv_resume_portfolio_dev_step ) {
				// We can only proceed if an ID exists and matches one of our IDs
				if( isset( $cv_resume_portfolio_dev_step['id'] ) ) {
					$id = $cv_resume_portfolio_dev_step['id'];
					if( isset( $cv_resume_portfolio_steps[$id] ) ) {
						foreach( $can_config as $element ) {
							if( isset( $cv_resume_portfolio_dev_step[$element] ) ) {
								$cv_resume_portfolio_steps[$id][$element] = $cv_resume_portfolio_dev_step[$element];
							}
						}
					}
				}
			}
		}
		return $cv_resume_portfolio_steps;
	}

	function moveArrayPosition(&$array, $key, $new_position) {
		if (!array_key_exists($key, $array)) {
			return $array;
		}
		$item = $array[$key];
		unset($array[$key]);
		$result = [];
		$position_added = false;

		foreach ($array as $current_key => $current_value) {
			if (!$position_added && $new_position === count($result)) {
				$result[$key] = $item;
				$position_added = true;
			}
			$result[$current_key] = $current_value;
		}
		if (!$position_added) {
			$result[$key] = $item;
		}
		$array = $result;
		return $array;
	}

	/**
	 * Get the content for the plugins step
	 * @return $content Array
	 */
	public function get_step_plugins() {
		$plugins = $this->get_plugins();
		$content = array(); 
		
		// Add plugin name and type at the top
		$content['detail'] = '<div class="plugin-info">';
		$content['detail'] .= '<p><strong>Plugin</strong></p>';
		$content['detail'] .= '<p><strong>Type</strong></p>';
		$content['detail'] .= '</div>';
		
		// The detail element is initially hidden from the user
		$content['detail'] .= '<ul class="whizzie-do-plugins">';

		$plugins['all'] = $this->moveArrayPosition($plugins['all'], 'woocommerce', 0);
		$plugins['all'] = $this->moveArrayPosition($plugins['all'], 'elementor', 5);
		
		// Add each plugin into a list
		foreach( $plugins['all'] as $slug=>$plugin ) {
			if ( $slug != 'easy-post-views-count') {
				$content['detail'] .= '<li data-slug="' . esc_attr( $slug ) . '">' . esc_html( $plugin['name'] ) . '<span>';
				$keys = array();
				if ( isset( $plugins['install'][ $slug ] ) ) {
					$keys[] = 'Installation';
				}
				if ( isset( $plugins['update'][ $slug ] ) ) {
					$keys[] = 'Update';
				}
				if ( isset( $plugins['activate'][ $slug ] ) ) {
					$keys[] = 'Activation';
				}
				$content['detail'] .= implode( ' and ', $keys ) . ' required';
				$content['detail'] .= '</span></li>';
			}
		}
		
		$content['detail'] .= '</ul>';
		
		return $content;
	}
	
	/**
	 * Print the content for the widgets step
	 * @since 1.1.0
	 */
	public function get_step_widgets() { ?> <?php }

	/**
	 * Get the plugins registered with TGMPA
	 */
	public function get_plugins() {
		$instance = call_user_func( array( get_class( $GLOBALS['tgmpa'] ), 'get_instance' ) );
		$plugins = array(
			'all' 		=> array(),
			'install'	=> array(),
			'update'	=> array(),
			'activate'	=> array()
		);
		foreach( $instance->plugins as $slug=>$plugin ) {
			if( $instance->is_plugin_active( $slug ) && false === $instance->does_plugin_have_update( $slug ) ) {
				// Plugin is installed and up to date
				continue;
			} else {
				$plugins['all'][$slug] = $plugin;
				if( ! $instance->is_plugin_installed( $slug ) ) {
					$plugins['install'][$slug] = $plugin;
				} else {
					if( false !== $instance->does_plugin_have_update( $slug ) ) {
						$plugins['update'][$slug] = $plugin;
					}
					if( $instance->can_plugin_activate( $slug ) ) {
						$plugins['activate'][$slug] = $plugin;
					}
				}
			}
		}
		return $plugins;
	}

	/**
	 * Get the widgets.wie file from the /content folder
	 * @return Mixed	Either the file or false
	 * @since 1.1.0
	 */
	public function has_widget_file() {
		if( file_exists( $this->widget_file_url ) ) {
			return true;
		}
		return false;
	}
	
	public function setup_plugins() {
		if ( ! check_ajax_referer( 'whizzie_nonce', 'wpnonce' ) || empty( $_POST['slug'] ) ) {
			wp_send_json_error( array( 'error' => 1, 'message' => esc_html__( 'No Slug Found','cv-resume-portfolio' ) ) );
		}
		$json = array();
		// send back some json we use to hit up TGM
		$plugins = $this->get_plugins();
		
		// what are we doing with this plugin?
		foreach ( $plugins['activate'] as $slug => $plugin ) {
			if ( $_POST['slug'] == $slug ) {
				$json = array(
					'url'           => admin_url( $this->tgmpa_url ),
					'plugin'        => array( $slug ),
					'tgmpa-page'    => $this->tgmpa_menu_slug,
					'plugin_status' => 'all',
					'_wpnonce'      => wp_create_nonce( 'bulk-plugins' ),
					'action'        => 'tgmpa-bulk-activate',
					'action2'       => - 1,
					'message'       => esc_html__( 'Activating Plugin','cv-resume-portfolio' ),
				);
				break;
			}
		}
		foreach ( $plugins['update'] as $slug => $plugin ) {
			if ( $_POST['slug'] == $slug ) {
				$json = array(
					'url'           => admin_url( $this->tgmpa_url ),
					'plugin'        => array( $slug ),
					'tgmpa-page'    => $this->tgmpa_menu_slug,
					'plugin_status' => 'all',
					'_wpnonce'      => wp_create_nonce( 'bulk-plugins' ),
					'action'        => 'tgmpa-bulk-update',
					'action2'       => - 1,
					'message'       => esc_html__( 'Updating Plugin','cv-resume-portfolio' ),
				);
				break;
			}
		}
		foreach ( $plugins['install'] as $slug => $plugin ) {
			if ( $_POST['slug'] == $slug ) {
				$json = array(
					'url'           => admin_url( $this->tgmpa_url ),
					'plugin'        => array( $slug ),
					'tgmpa-page'    => $this->tgmpa_menu_slug,
					'plugin_status' => 'all',
					'_wpnonce'      => wp_create_nonce( 'bulk-plugins' ),
					'action'        => 'tgmpa-bulk-install',
					'action2'       => - 1,
					'message'       => esc_html__( 'Installing Plugin','cv-resume-portfolio' ),
				);
				break;
			}
		}
		if ( $json ) {
			$json['hash'] = md5( serialize( $json ) ); // used for checking if duplicates happen, move to next plugin
			wp_send_json( $json );
		} else {
			wp_send_json( array( 'done' => 1, 'message' => esc_html__( 'Success','cv-resume-portfolio' ) ) );
		}
		exit;
	}

}