<?php

/**
 * Class Rab_Sidebar
 */
class Rab_Sidebar {
    /**
     * @var
     */
    public $name;

    /**
     * @var string
     */
    public $title;
    /**
     * @var
     */
    private static $instance;

    /**
     * @var string
     */
    private $db_key;

    /**
     * @var array
     */
    private $sidebars = [];

    /**
     * Singleton class
     *
     * @param $name
     * @return Rab_Sidebar
     */
    public static function instance() {
        if( null === self::$instance ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Rab_Sidebar constructor.
     * @param $name
     */
    public function __construct() {

        // $this->name = $name;
        $this->db_key = '_rab_sidebars';
        $this->title = esc_attr__( 'New Sidebar', 'rab' );

        // load our assets
        add_action( 'load-widgets.php', array( $this, 'load_assets' ), 5 );

        // add sidebars
        add_action( 'load-widgets.php', array( $this, 'create_sidebar' ) );

        // register the sidebar
        add_action( 'widgets_init', array( $this, 'register_sidebars' ), 200 );

        // ajax handler to delete the sidebar
        add_action( 'wp_ajax_delete_sidebar', array( $this, 'delete_sidebar' ), 999 );
    }

    /**
     * Assets loader
     */
    public function load_assets() {
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_widget_scripts' ) );

        // add the template to the widget area
        add_action( 'admin_print_scripts', array( $this, 'widgets_template' ) );
    }

    public function enqueue_widget_scripts() {
        wp_enqueue_script( 
            'rab-widgets', 
            RAB_JS . 'admin/rab-sidebar.js', 
            array('jquery'),
            RAB_VERSION,
            true
        );

        $localize = [];
        $localize['sidebarConfirm'] = __('Do you really want to delete this sidebar?', 'rab');

        wp_localize_script( 'rab-widgets', 'rabWidgets', $localize );
    }

    /**
     * Load our template actually it's a form to render in the widgets area
     */
    public function widgets_template() {
        // include our templates loader
        ?>
        <script type="text/html" id="rab-tmpl-widget">
            <form class="raw-add-widget" method="POST">
                <h3 class="widget-title"><?php echo $this->title; ?></h3>

                <div class="form-group">
                    <label for="widgetname">
                        <input type="text" autocomplete="off" id="widgetname" name="widgetname" class="raw-text-field" placeholder="<?php esc_html_e('Widget Name', 'rab'); ?>">
                    </label>
                </div>

                <div class="form-group">
                    <?php
                    wp_nonce_field('remove-sidebar-nonce', 'remove-sidebar');
                    ?>
                    <input type="submit" class="rab-submit-button" value="<?php esc_html_e('Create','rab'); ?>">
                </div>
            </form>
            <div class="clear"></div>
        </script>
        <?php
    }

    /**
     * Add the created sidebar into the database
     */
    public function create_sidebar() {
        if( !empty( $_POST['widgetname'] ) ) {
            $this->sidebars = get_option( $this->db_key );
            $name = $this->find_or_generate( $_POST['widgetname'] );

            if( empty( $this->sidebars ) ) {
                $this->sidebars = array($name);
            } else {
                $this->sidebars = array_merge($this->sidebars, array($name));
            }

            update_option( $this->db_key, $this->sidebars );
            wp_redirect( admin_url('widgets.php') );
            die();
        }
    }

    /**
     * Get the sidebars from the database 
     * & register using the register_sidebar function
     */
    public function register_sidebars() {
        if( empty( $this->sidebars ) ){
            $this->sidebars = get_option($this->db_key);
        }

        if( is_array( $this->sidebars ) ) {
            foreach ($this->sidebars as $sidebar) {

                $id = $this->generate_name($sidebar);

                // default arguments
                $args['description']    =   __( 'Add widgets here', 'rab');
                $args['before_widget']  =   '<div id="%1$s" class="widget %2$s">';
                $args['after_widget']   =   '</div>';
                $args['before_title']   =   '<h3 class="widget-title">';
                $args['after_title']    =   '</h3>';
                $args['name']   = $sidebar;
                $args['id']     = $id;
                $args['class']  = 'rab';
                
                register_sidebar($args);
            }
        }
    }

    /**
     * AJAX action reference
     * Delete the sidebar
     */
    public function delete_sidebar() {

        if( !wp_verify_nonce( $_POST['nonce'], 'remove-sidebar-nonce' ) ){
            die('something went wrong');
        }

        if( !empty( $_POST['name'] ) ) {
            $name = stripslashes( $_POST['name'] );
            $this->sidebars = get_option($this->db_key);

            if( ( $key = array_search( $name, $this->sidebars ) ) !== false ) {
                unset( $this->sidebars[$key] );
                if( !empty($this->sidebars ) ) {
                    update_option( $this->db_key, $this->sidebars );
                } else {
                    delete_option( $this->db_key );
                }
                
                echo "sidebar-deleted";
            }
        }

        die();
    }

    /**
     * Create the name of the sidebar if the name is already taken
     * 
     * @param  string $name
     * @return string A new name prefixed with 1/2 if name already exists
     */
    private function find_or_generate( $name ) {
        if( empty( $GLOBALS['wp_registered_sidebars'] ) ){
            return $name;
        }

        $exists = array();
        foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) {
            $exists[] = $sidebar['name'];
        }

        if( empty( $this->sidebars ) ){
            $this->sidebars = array();
        }

        $exists = array_merge($exists, $this->sidebars);

        if( in_array( $name, $exists ) ) {
            $counter  = substr($name, -1);

            if( !is_numeric( $counter ) ) {
                $new_name = $name . " 1";
            } else {
                $new_name = substr($name, 0, -1) . ' ' . ((int) $counter + 1);
            }

            $name = $this->find_or_generate($new_name);
        }

        return $name;
    }

    /**
     * Make the string lower & replaces spaces ' ' & dashes with underscores
     * 
     * @param  string $name Unfiltered name
     * @return string Modified
     */
    private function generate_name( $name ) {
        return strtolower(str_replace( [' ', '-'], ['_'], $name ) );
    }

    private function create_name( $name ) {
        $newName = strtolower( str_replace( array(' ', '-' ), array( '_' ), $name ) );
        return $newName;
    }

}