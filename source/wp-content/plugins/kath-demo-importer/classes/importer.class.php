<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Framework Class
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class Kath_Demo_Importer extends Kath_Demo_Importer_Abstract {
  /**
   *
   * option database/data name
   * @access public
   * @var string
   *
   */
  public $opt_id = '_cs_options';

  /**
   *
   * framework option database/data name
   * @access public
   * @var string
   *
   */
  public $framework_id = '';
  /**
   *
   * demo items
   * @access public
   * @var array
   *
   */
  public $items = array();
  /**
   *
   * instance
   * @access private
   * @var class
   *
   */
  private static $instance = null;
  // run framework construct
  public function __construct( $settings, $items ) {
    $this->framework_id = defined( 'CS_OPTION' ) ? CS_OPTION : '_cs_options';
    
    $this->settings = apply_filters( 'kath_importer_settings', $settings );
    $this->items    = apply_filters( 'kath_importer_items', $items );
    if( ! empty( $this->items ) ) {
      $this->addAction( 'admin_menu', 'admin_menu' );
      $this->addAction( 'wp_ajax_kath_demo_importer', 'import_process' );
    }
  }
  // instance
  public static function instance( $settings = array(), $items = array() ) {
    if ( is_null( self::$instance ) ) {
      self::$instance = new self( $settings, $items );
    }
    return self::$instance;
  }

  // adding option page
  public function admin_menu() {
    $defaults_menu_args = array(
      'menu_parent'     => '',
      'menu_title'      => '',
      'menu_type'       => '',
      'menu_slug'       => '',
      'menu_icon'       => '',
      'menu_capability' => 'manage_options',
      'menu_position'   => null,
    );
    $args = wp_parse_args( $this->settings, $defaults_menu_args );
    if( $args['menu_type'] == 'add_submenu_page' ) {
      call_user_func( $args['menu_type'], $args['menu_parent'], $args['menu_title'], $args['menu_title'], $args['menu_capability'], $args['menu_slug'], array( &$this, 'admin_page' ) );
    } else {
      call_user_func( $args['menu_type'], $args['menu_title'], $args['menu_title'], $args['menu_capability'], $args['menu_slug'], array( &$this, 'admin_page' ), $args['menu_icon'], $args['menu_position'] );
    }
  }
  // output demo items
  public function admin_page() {
    $nonce = wp_create_nonce('kath_importer');
  ?>
  <div class="wrap rab-importer">
    <h2><?php _e( 'RAB Demo Importer', 'rab' ); ?></h2>

    <div id="welcome-panel" class="welcome-panel">
      <div class="welcome-panel-content">
        <p class="about-description"><?php _e('Make sure that you\'ve installed all the required & recommended plugins before proceeding with the demo installation here.', 'kath-demo-importer' ); ?></p><br>
      </div>
    </div>

    <div class="rab-demo-browser">
      <?php
        foreach ($this->items as $item => $value ) :
          $opt = get_option($this->opt_id);

          $imported_class = '';
          $btn_text = '';
          $status = '';
          if (!empty($opt[$item])) {
            $imported_class = 'imported';
            $btn_text .= __( 'Re-Import', 'rab' );
            $status .= __( 'Imported', 'rab' );
          } else {
            $btn_text .= __( 'Import', 'rab' );
            $status .= __( 'Not Imported', 'rab' );
          }
      ?>
        <div class="rab-demo-item <?php echo esc_attr($imported_class); ?>" data-rab-importer>
          <div class="rab-demo-screenshot">
            <?php
              $image_url = '';
              if (file_exists(KATH_IMPORTER_CONTENT_DIR . $item . '/screenshot.png')) {
                $image_url = KATH_IMPORTER_CONTENT_URI . $item . '/screenshot.png';
              } else if ( file_exists( KATH_IMPORTER_CONTENT_DIR . $item . '/screenshot.jpg') ) {
                $image_url = KATH_IMPORTER_CONTENT_URI . $item . '/screenshot.jpg';
              } else {
                $image_url = KATH_IMPORTER_URI . '/assets/img/screenshot.png';
              }
            ?>
            <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr($value['title']); ?>">
          </div>
          <h2 class="rab-demo-name"><?php echo esc_attr($value['title']); ?></h2>
          <div class="rab-demo-actions">
            <a class="button button-secondary" href="#" data-import="<?php echo esc_attr($item); ?>" data-nonce="<?php echo esc_attr( $nonce ); ?>"><?php echo esc_attr($btn_text); ?></a>
            <a class="button button-primary" target="_blank" href="<?php echo esc_url($value['preview_url']); ?>"><?php _e( 'Preview', 'rab' ); ?></a>
          </div>
          
          <div class="rab-importer-response"><span class="dismiss" title="Dismis this messages.">X</span></div>
        </div><!-- /.rab-demo-item -->
      <?php endforeach; ?>
      <div class="clear"></div>
    </div><!-- /.rab-demo-browser -->
  </div><!-- /.wrap -->
  <?php
  }

  /**
   * Import Proccess
   */
  public function import_process() {
    if ( function_exists( 'ini_get' ) ) {
      if ( 300 < ini_get( 'max_execution_time' ) ) {
        @ini_set( 'max_execution_time', 300 );
      }
      if ( 256 < intval( ini_get( 'memory_limit' ) ) ) {
        @ini_set( 'memory_limit', '256M' );
      }
    } else {
     echo 'ini_get does not exist';
    }
    $id = $_POST['id'];


    // Import XML Data
    $this->import_xml_data();

    // Setup Option Data from Codestar
    $this->import_cs_options_data();

    // Setup Reading
    $this->set_pages_for_reading();

    // $this->import_widgets();

    // Setup Menu
    if (isset($this->items[$id]['menus'])) {
      $this->set_menu();
    }

    $this->import_rev_slider();

    wp_send_json( array('status' => 'success' ) );
    
  }


  /**
   * Import XML data by WordPress Importer
   */
  public function import_xml_data() {

    if ( ! wp_verify_nonce( $_POST['nonce'], 'kath_importer' ) ){
      die( 'Authentication Error!!!' ); 
    }

    $id = $_POST['id'];
    $file = KATH_IMPORTER_CONTENT_DIR . $id . '/content.xml';

    if ( ! defined('WP_LOAD_IMPORTERS') ) { 
      define( 'WP_LOAD_IMPORTERS', true );
    }
    
    $importer_error = false;

    if ( !class_exists( 'WP_Importer' ) ) {
        $class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
        if ( file_exists( $class_wp_importer ) ){
            require_once($class_wp_importer);
        } else {
            $importer_error = true;
        }
    }


      if ( ! class_exists( 'WP_Import' ) ) {
          $class_wp_import = wp_normalize_path( dirname( __FILE__ ) ) . '/wordpress-importer.php';
          if ( file_exists( $class_wp_import ) && ! class_exists( 'WP_Import' ) ){
            require $class_wp_import;
          }else{
            $importer_error = true;
          }
      }

      if($importer_error){
          die(__("Error on import", 'rab'));
      } else {
        if(!is_file( $file )){
            esc_html_e("File Error!!!", 'rab');
        } else {
          $wp_import = new WP_Import();


          $wp_import->fetch_attachments = true;
          $wp_import->import( $file );
          $options = get_option($this->opt_id);
          $options[$id] = true;
          update_option( $this->opt_id, $options );
      }

      echo 'Content import-success';
    }

  }

  /**
   * Update Codestar Framework Options Data
   */
  public function import_cs_options_data() {
    $id = $_POST['id'];
    $file = KATH_IMPORTER_CONTENT_DIR . $id . '/options.txt';
    if ( file_exists( $file ) ) {
      // Get file contents and decode
      $data = file_get_contents( $file );
      $decoded_data = cs_decode_string( $data );
      update_option( $this->framework_id, $decoded_data );
    }
  }

  /**
   * Set Homepage and Front page
   */
  public function set_pages_for_reading() {
    $id = $_POST['id'];

    // Set Home
    if (isset($this->items[$id]['front_page'])) {
      $page = get_page_by_title($this->items[$id]['front_page']);

      if ( isset( $page->ID ) ) {
        update_option( 'page_on_front', $page->ID );
        update_option( 'show_on_front', 'page' );
      }
    }

    // Set Blog
    if (isset($this->items[$id]['blog_page'])) {
      $page = get_page_by_title($this->items[$id]['blog_page']);

      if ( isset( $page->ID ) ) {
        update_option( 'page_for_posts', $page->ID );
        update_option( 'show_on_front', 'page' );
      }
    }
  }

  /**
   * Setup Menu
   */
  public function set_menu() {
    $id = $_POST['id'];
    
    // Store All Menu
    $menu_locations = array();

    foreach ($this->items[$id]['menus'] as $key => $value) {
      $menu = get_term_by( 'name', $value, 'nav_menu' );
      if (isset($menu->term_id)) {
        $menu_locations[$key] = $menu->term_id;
      }
    }

    // Set Menu If has
    if (isset($menu_locations)) {
      set_theme_mod( 'nav_menu_locations', $menu_locations );
    }
  }

  public function import_rev_slider() {

    $id = $_POST['id'];
    
    $is_revslider = ( $this->items[$id]['revslider'] ) ? true : false;
    if( $is_revslider && class_exists( 'UniteFunctionsRev' ) ) {
      $file_name = $this->items[$id]['revname'];

      if( $file_name ) {
        $file = KATH_IMPORTER_CONTENT_DIR . $id . '/'.$file_name;
        $slider = new RevSlider();

        $result = $slider->importSliderFromPost( true, false, $file );
      }
    }
  }

}