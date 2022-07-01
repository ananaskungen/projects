<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https.//example.com
 * @since      1.0.0
 *
 * @package    Wcmstarwars
 * @subpackage Wcmstarwars/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Wcmstarwars
 * @subpackage Wcmstarwars/includes
 * @author     Arre <arre@test.com>
 */
class Wcmstarwars {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Wcmstarwars_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'WCMSTARWARS_VERSION' ) ) {
			$this->version = WCMSTARWARS_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'wcmstarwars';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

		$this->getOptionPage();
		/* $this->addScripts(); */

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Wcmstarwars_Loader. Orchestrates the hooks of the plugin.
	 * - Wcmstarwars_i18n. Defines internationalization functionality.
	 * - Wcmstarwars_Admin. Defines all hooks for the admin area.
	 * - Wcmstarwars_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wcmstarwars-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wcmstarwars-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wcmstarwars-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-wcmstarwars-public.php';

		$this->loader = new Wcmstarwars_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Wcmstarwars_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Wcmstarwars_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Wcmstarwars_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Wcmstarwars_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Wcmstarwars_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

	// Option sida där vi lägger in APi urlen
	protected string $apiUrl = 'http://swapi.dev/api/'; /* weird function? */

	public function setUpOptionsPage(){ /* Denna måste vara public för att wordpress ska komma åt den! */
		add_menu_page(
			'Star Wars API',
			'Star Wars Settings',
			'manage_options',
			'starwars',
			[$this, 'starwars_menu_page'], /* Glöm ej att denna callback ska ha en $this för att kunna hämta den! */
		);
	}

	public function getOptionPage() {
		add_action('admin_menu', [$this, 'setUpOptionsPage']); /* vi saknade $this keyword för vi är inne i en klass. Får du meddelandet: $callback is not valid, probably cuz $this saknas.*/
	}

	
	public function starwars_menu_page() { /* callback till add_menu_page */
		$characters = get_transient('sw_character_list');
		if(!$characters) {

			$apiCall = wp_remote_get($this->apiUrl . 'people'); /* vi är inuti en klass.. Går ej att bara skriva $apiUrl. Måste vara $this->$apiUrl */
			$characters = json_decode(wp_remote_retrieve_body($apiCall)); /* glöm ej att det är json_decode. Annars kmr du få att den försöker encodea ngt på en sträng. Så glöm ej! */
			include_once plugin_dir_path(__FILE__) . '../admin/partials/sw_menu_page.php';
			
			set_transient('sw_character_list', $characters);
		
		}
	}

 	public function addScripts() {
		add_action('init', [$this, 'enqueueScripts']);
	}

	public function enqueueScripts() {
		wp_register_script('sw_script', plugins_url('../admin/js/app.js', __FILE__), [], '1.0.0', true );
		wp_enqueue_script('sw_script');
	} 
	//CPT för karaktärerna


	// Custom fields med ACF 


	//Även kunna hämta data från APIet och skapa karaktärer. 

}
