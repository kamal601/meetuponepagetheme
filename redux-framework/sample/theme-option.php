<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: 
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "meetup";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    
    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     // * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     // * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'meetup Theme Options', 'meetup' ),
        'page_title'           => __( 'meetup Theme Options', 'meetup' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => false,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

  
  

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p>This is made by Kamal Hossain Mamurjor member</p>', 'meetup' ), $v );
    }

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */




    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */



    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Meetup Theme Option', 'meetup' ),
        'id'               => 'basic',
        'desc'             => __( 'These are really basic fields!', 'meetup' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-home'
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Layout', 'meetup' ),
        'id'               => 'layoutttt',
        'subsection'       => true,
        'desc'             => __( 'Layout Setting ', 'meetup' ),
        'fields'           => array(
           
            array(
                'id'       => 'sitelayoutttt',
                'type'     => 'radio',
                'title'    => __( 'website Layout', 'meetup' ),
                'subtitle' => __( 'Input your website Layout', 'meetup' ),
                'desc'     => __( 'This for website Layout .', 'meetup' ),
                'options'   =>array(
                        '100%'  =>'Full Width',
                        '80%'  =>'Boxed'
                ),
                'default'  => '1'// 1 = on | 0 = off
            ),
        )
        ));


    Redux::setSection( $opt_name, array(
        'title'      => __( 'Theme Background Color', 'meetup' ),
        'id'         => 'bg',
        'desc'       => __( 'Upload your site Logo', 'meetup' ),
        'subsection' => true,
        'fields'     => array(
             array(
                'id'       => 'bg',
                'type'     => 'background',
                'title'    => __( 'Choose Theme background Color', 'meetup' ),
                'subtitle' => __( 'Choose site background Color', 'meetup' ),
                'desc'     => __( 'Choose site background Color', 'meetup' ),
                'default'  => '#fcadac'
            ),
        )
    ) );


      Redux::setSection( $opt_name, array(
        'title'      => __( 'meetup Footer Option', 'meetup' ),
        'id'         => 'footer',
        'desc'       => __( 'Footer section style Change', 'meetup' ),
        'subsection' => true,
        'fields'     => array(
             array(
                'id'       => 'footerbg',
                'type'     => 'color',
                'title'    => __( 'Footer background Color', 'meetup' ),
                'subtitle' => __( 'Choose Footer background Color', 'meetup' ),
                'desc'     => __( 'Choose Footer background Color', 'meetup' ),
                'default'  => '#fcadac'
            ),
             array(
                'id'       => 'ftfontclr',
                'type'     => 'color',
                'title'    => __( 'Choose Footer Sectin Text Color', 'meetup' ),
                'subtitle' => __( 'Choose Footer Text Color', 'meetup' ),
                'desc'     => __( 'Choose Footer Text Color', 'meetup' ),
                'default'  => '#fcadac'
            ),
             array(
                'id'          => 'ftfontstyle',
                'type'        => 'typography', 
                'title'       => __('Footer Text font size/color/font-weight/font-family', 'meetup'),
                'google'      => true, 
                'font-backup' => true,
                'output'      => array('h2.site-description'),
                'units'       =>'px',
                'subtitle'    => __('Choose Footer Text Color Size Font family font weight', 'meetup'),
                'default'     => array(
                    'color'       => '#333', 
                    'font-style'  => '700', 
                    'font-family' => 'Abel', 
                    'google'      => true,
                    'font-size'   => '33px', 
                    'line-height' => '40'
                ),
            )
        )
    ) );
      
        Redux::setSection( $opt_name, array(
        'title'      => __( 'meetup Footer Copy Right Option', 'meetup' ),
        'id'         => 'footercr',
        'desc'       => __( 'Footer Copy Right section style Change', 'meetup' ),
        'subsection' => true,
        'fields'     => array(
             array(
                'id'       => 'year',
                'type'     => 'text',
                'title'    => __( 'Copy right year', 'meetup' ),
                'subtitle' => __( 'This is footer copyright year', 'meetup' ),
                'desc'     => __( 'Give your  footer copyright year', 'meetup' ),
                'default'  => '2019'// 1 = on | 0 = off
            ),
              array(
                'id'       => 'comlink',
                'type'     => 'text',
                'title'    => __( 'Theme develop company name', 'meetup' ),
                'subtitle' => __( 'This is footer Theme develop company name', 'meetup' ),
                'desc'     => __( 'Give your Theme develop company name', 'meetup' ),
                'default'  => 'Anasteck.com'// 1 = on | 0 = off
            ),
             array(
                'id'       => 'comlinkurl',
                'type'     => 'text',
                'title'    => __( 'Theme develop company name Link', 'meetup' ),
                'subtitle' => __( 'Theme develop company name link', 'meetup' ),
                'desc'     => __( 'Give your required Theme develop company name link', 'meetup' ),
                'default'  => 'https://anasbinkml-it.com'// 1 = on | 0 = off
            ), 
             array(
                'id'       => 'cprreserved',
                'type'     => 'text',
                'title'    => __( 'Copy rigth reserved', 'meetup' ),
                'subtitle' => __( 'This is footer Copy rigth reserved', 'meetup' ),
                'desc'     => __( 'Give your Copy rigth reserved', 'meetup' ),
                'default'  => 'kamal Hossen'// 1 = on | 0 = off
            ),
             array(
                'id'       => 'crftbg',
                'type'     => 'color',
                'title'    => __( 'Footer Copy Right Section background Color', 'meetup' ),
                'subtitle' => __( 'Choose Footer Copy Right Section background Color', 'meetup' ),
                'desc'     => __( 'Choose Footer Copy Right Section background Color', 'meetup' ),
                'default'  => '#fcadac'
            ),
             array(
                'id'       => 'crfontclr',
                'type'     => 'color',
                'title'    => __( 'Choose Footer Copy Right Section Text Color', 'meetup' ),
                'subtitle' => __( 'Choose Footer Copy Right Section Text Color', 'meetup' ),
                'desc'     => __( 'Choose Footer Copy Right Section Text Color', 'meetup' ),
                'default'  => '#fcadac'
            ),
              array(
                'id'       => 'crlinkclr',
                'type'     => 'color',
                'title'    => __( 'Choose Footer Copy Right Section Link Color', 'meetup' ),
                'subtitle' => __( 'Choose Footer Copy Right Section Link Color', 'meetup' ),
                'desc'     => __( 'Choose Footer Copy Right Section Link Color', 'meetup' ),
                'default'  => '#fcadac'
            ),
             array(
                'id'          => 'crfontstyle',
                'type'        => 'typography', 
                'title'       => __('Footer Copy Right Section Text font size/color/font-weight/font-family', 'meetup'),
                'google'      => true, 
                'font-backup' => true,
                'output'      => array('h2.site-description'),
                'units'       =>'px',
                'subtitle'    => __('Choose Footer Copy Right Section Text Color Size Font family font weight', 'meetup'),
                'default'     => array(
                    'color'       => '#333', 
                    'font-style'  => '700', 
                    'font-family' => 'Abel', 
                    'google'      => true,
                    'font-size'   => '33px', 
                    'line-height' => '40'
                ),
            )

        )
    ) );
        
        Redux::setSection( $opt_name, array(
        'title'      => __( 'meetup theme Privacy Section', 'meetup' ),
        'id'         => 'footerprivecy',
        'desc'       => __( 'Footer Copy Right section style Change', 'meetup' ),
        'subsection' => true,
        'fields'     => array(
             array(
                'id'       => 'about',
                'type'     => 'text',
                'title'    => __( 'About us', 'meetup' ),
                'subtitle' => __( 'This is footer about us menu', 'meetup' ),
                'desc'     => __( 'Give your  footer menu iteme name', 'meetup' ),
                'default'  => 'About Us'// 1 = on | 0 = off
            ),
              array(
                'id'       => 'policy',
                'type'     => 'text',
                'title'    => __( 'Theme privecy policy menu', 'meetup' ),
                'subtitle' => __( 'This is footer privecy and policy menu', 'meetup' ),
                'desc'     => __( 'Give your Theme privecy and policy', 'meetup' ),
                'default'  => 'Privecy and policy'// 1 = on | 0 = off
            ),
             array(
                'id'       => 'condition',
                'type'     => 'text',
                'title'    => __( 'Theme terms and coditions', 'meetup' ),
                'subtitle' => __( 'Theme terms and coditions', 'meetup' ),
                'desc'     => __( 'Give your Theme terms and coditions', 'meetup' ),
                'default'  => 'Theme terms and coditions'// 1 = on | 0 = off
            ), 
            
              array(
                'id'       => 'plcclr',
                'type'     => 'color',
                'title'    => __( 'Choose Footer Copy Right Section Link Color', 'meetup' ),
                'subtitle' => __( 'Choose Footer Copy Right Section Link Color', 'meetup' ),
                'desc'     => __( 'Choose Footer Copy Right Section Link Color', 'meetup' ),
                'default'  => '#fcadac'
            ),
             array(
                'id'          => 'crfontstyle',
                'type'        => 'typography', 
                'title'       => __('Footer Copy Right Section Text font size/color/font-weight/font-family', 'meetup'),
                'google'      => true, 
                'font-backup' => true,
                'output'      => array('h2.site-description'),
                'units'       =>'px',
                'subtitle'    => __('Choose Footer Copy Right Section Text Color Size Font family font weight', 'meetup'),
                'default'     => array(
                    'color'       => '#333', 
                    'font-style'  => '700', 
                    'font-family' => 'Abel', 
                    'google'      => true,
                    'font-size'   => '33px', 
                    'line-height' => '40'
                ),
            )

        )
    ) );








