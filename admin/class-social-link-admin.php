<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @author     Your Name <marchalyoan@gmail.com>
 */
class Social_link_Admin
{
    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     *
     * @var string The ID of this plugin.
     */
    private $social_link;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     *
     * @var string The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     *
     * @param string $social_link The name of this plugin.
     * @param string $version     The version of this plugin.
     */

    /**
     * Holds the values to be used in the fields callbacks.
     */
    private $options;

    public function __construct($social_link, $version)
    {
        $this->social_link = $social_link;
        $this->version = $version;
        add_action('admin_menu', [$this, 'add_plugin_page']);
        add_action('admin_init', [$this, 'page_init']);
    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

        /*
             * This function is provided for demonstration purposes only.
             *
             * An instance of this class should be passed to the run() function
             * defined in Social_link_Loader as all of the hooks are defined
             * in that particular class.
             *
             * The Social_link_Loader will then create the relationship
             * between the defined hooks and the functions defined in this
             * class.
             */

        //wp_enqueue_style($this->social_link, plugin_dir_url(__FILE__).'css/social-link-admin.css', [], $this->version, 'all');
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

        /*
             * This function is provided for demonstration purposes only.
             *
             * An instance of this class should be passed to the run() function
             * defined in Social_link_Loader as all of the hooks are defined
             * in that particular class.
             *
             * The Social_link_Loader will then create the relationship
             * between the defined hooks and the functions defined in this
             * class.
             */

        //wp_enqueue_script($this->social_link, plugin_dir_url(__FILE__).'js/social-link-admin.js', ['jquery'], $this->version, false);
    }

    /**
     * Add options page.
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_options_page(
            'Settings Admin',
            'Social Links',
            'manage_options',
            'social-link-admin',
            [$this, 'create_admin_page']
        );
    }

    /**
     * Options page callback.
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option('links'); ?>
        <div class="wrap">
            <h2><?= __('Social links') ?></h2>
            <form method="post" action="options.php">
                <?php
                // This prints out all hidden setting fields
                settings_fields('my_option_group');
                do_settings_sections('social-link-admin');
                submit_button(); ?>
            </form>
        </div>
<?php
    }

    // Facebook, YouTube, Twitter, Instagram, Tumblr, Google+,  Skype, Reddit, Soundcloud, Pinterest

    /**
     * Register and add settings.
     */
    public function page_init()
    {
        register_setting(
            'my_option_group', // Option group
            'links', // Option name
            [$this, 'sanitize'] // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            'Liens sociaux', // Title
            [$this, 'print_section_info'], // Callback
            'social-link-admin' // Page
        );

        add_settings_field(
            'facebook', // ID
            'Facebook', // Title
            [$this, 'facebook_callback'], // Callback
            'social-link-admin', // Page
            'setting_section_id' // Section
        );

        add_settings_field(
            'linkedin', // ID
            'Linked-in', // Title
            [$this, 'linkedin_callback'], // Callback
            'social-link-admin', // Page
            'setting_section_id' // Section
        );

        add_settings_field(
            'youtube', // ID
            'Youtube', // Title
            [$this, 'youtube_callback'], // Callback
            'social-link-admin', // Page
            'setting_section_id' // Section
        );

        add_settings_field(
            'twitter', // ID
            'X / ex: Twitter', // Title
            [$this, 'twitter_callback'], // Callback
            'social-link-admin', // Page
            'setting_section_id' // Section
        );

        add_settings_field(
            'instagram', // ID
            'Instagram', // Title
            [$this, 'instagram_callback'], // Callback
            'social-link-admin', // Page
            'setting_section_id' // Section
        );

        add_settings_field(
            'tumblr', // ID
            'Tumblr', // Title
            [$this, 'tumblr_callback'], // Callback
            'social-link-admin', // Page
            'setting_section_id' // Section
        );

        add_settings_field(
            'skype', // ID
            'Skype', // Title
            [$this, 'skype_callback'], // Callback
            'social-link-admin', // Page
            'setting_section_id' // Section
        );

        add_settings_field(
            'reddit', // ID
            'Reddit', // Title
            [$this, 'reddit_callback'], // Callback
            'social-link-admin', // Page
            'setting_section_id' // Section
        );

        add_settings_field(
            'soundcloud', // ID
            'Soundcloud', // Title
            [$this, 'soundcloud_callback'], // Callback
            'social-link-admin', // Page
            'setting_section_id' // Section
        );

        add_settings_field(
            'pinterest', // ID
            'Pinterest', // Title
            [$this, 'pinterest_callback'], // Callback
            'social-link-admin', // Page
            'setting_section_id' // Section
        );

        /*
        facebook twitter
        */
    }

    /**
     * Sanitize each setting field as needed.
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize($input)
    {
        $new_input = [];

        if (isset($input['facebook'])) {
            $new_input['facebook'] = sanitize_text_field($input['facebook']);
        }

        if (isset($input['linkedin'])) {
            $new_input['linkedin'] = sanitize_text_field($input['linkedin']);
        }

        if (isset($input['youtube'])) {
            $new_input['youtube'] = sanitize_text_field($input['youtube']);
        }

        if (isset($input['twitter'])) {
            $new_input['twitter'] = sanitize_text_field($input['twitter']);
        }

        if (isset($input['instagram'])) {
            $new_input['instagram'] = sanitize_text_field($input['instagram']);
        }

        if (isset($input['tumblr'])) {
            $new_input['tumblr'] = sanitize_text_field($input['tumblr']);
        }

        if (isset($input['googleplus'])) {
            $new_input['googleplus'] = sanitize_text_field($input['googleplus']);
        }

        if (isset($input['skype'])) {
            $new_input['skype'] = sanitize_text_field($input['skype']);
        }

        if (isset($input['reddit'])) {
            $new_input['reddit'] = sanitize_text_field($input['reddit']);
        }

        if (isset($input['soundcloud'])) {
            $new_input['soundcloud'] = sanitize_text_field($input['soundcloud']);
        }

        if (isset($input['pinterest'])) {
            $new_input['pinterest'] = sanitize_text_field($input['pinterest']);
        }

        return $new_input;
    }

    /**
     * Print the Section text.
     */
    public function print_section_info()
    {
        echo __('Enter your socials links below:');
    }

    /**
     * Get the settings option array and print one of its values.
     */
    public function facebook_callback()
    {
        printf(
            '<input type="url" id="facebook" name="links[facebook]" value="%s" />',
            isset($this->options['facebook']) ? esc_url($this->options['facebook']) : ''
        );
    }

    /**
     * Get the settings option array and print one of its values.
     */
    public function linkedin_callback()
    {
        printf(
            '<input type="url" id="linkedin" name="links[linkedin]" value="%s" />',
            isset($this->options['linkedin']) ? esc_url($this->options['linkedin']) : ''
        );
    }

    /**
     * Get the settings option array and print one of its values.
     */
    public function youtube_callback()
    {
        printf(
            '<input type="url" id="youtube" name="links[youtube]" value="%s" />',
            isset($this->options['youtube']) ? esc_url($this->options['youtube']) : ''
        );
    }

    /**
     * Get the settings option array and print one of its values.
     */
    public function twitter_callback()
    {
        printf(
            '<input type="url" id="twitter" name="links[twitter]" value="%s" />',
            isset($this->options['twitter']) ? esc_url($this->options['twitter']) : ''
        );
    }

    /**
     * Get the settings option array and print one of its values.
     */
    public function instagram_callback()
    {
        printf(
            '<input type="url" id="instagram" name="links[instagram]" value="%s" />',
            isset($this->options['instagram']) ? esc_url($this->options['instagram']) : ''
        );
    }

    /**
     * Get the settings option array and print one of its values.
     */
    public function tumblr_callback()
    {
        printf(
            '<input type="url" id="tumblr" name="links[tumblr]" value="%s" />',
            isset($this->options['tumblr']) ? esc_url($this->options['tumblr']) : ''
        );
    }

    /**
     * Get the settings option array and print one of its values.
     */
    public function skype_callback()
    {
        printf(
            '<input type="url" id="skype" name="links[skype]" value="%s" />',
            isset($this->options['skype']) ? esc_url($this->options['skype']) : ''
        );
    }

    /**
     * Get the settings option array and print one of its values.
     */
    public function reddit_callback()
    {
        printf(
            '<input type="url" id="reddit" name="links[reddit]" value="%s" />',
            isset($this->options['reddit']) ? esc_url($this->options['reddit']) : ''
        );
    }

    /**
     * Get the settings option array and print one of its values.
     */
    public function soundcloud_callback()
    {
        printf(
            '<input type="url" id="soundcloud" name="links[soundcloud]" value="%s" />',
            isset($this->options['soundcloud']) ? esc_url($this->options['soundcloud']) : ''
        );
    }

    /**
     * Get the settings option array and print one of its values.
     */
    public function pinterest_callback()
    {
        printf(
            '<input type="url" id="pinterest" name="links[pinterest]" value="%s" />',
            isset($this->options['pinterest']) ? esc_url($this->options['pinterest']) : ''
        );
    }
}
