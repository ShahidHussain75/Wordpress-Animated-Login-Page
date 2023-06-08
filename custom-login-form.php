<?php
/*
 * Plugin Name: Wordpress Animated Login Page
 * Plugin URI:  https://hocien.com/wordpress-Animated-login-Page/
 * Description: The Wordpress Animated Login Page plugin is a customizable plugin that enhances the appearance of the WordPress login page by adding animated elements. It allows you to replace the default login form with a visually appealing and engaging interface. This plugin is useful for website owners who want to provide a unique login experience to their users.
 * Version: 1.0.0
 * Author: Shahid Hussain
 * Author URI: https://www.upwork.com/freelancers/~01304587883757d540
 * Version: 1.0.0
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: wordpress-animated-login-page
 */

// Remove default CSS from the login page
function remove_default_login_css() {
    wp_deregister_style( 'login' );
    wp_deregister_style( 'wp-admin' );
    wp_deregister_style( 'buttons' );
}
add_action( 'login_enqueue_scripts', 'remove_default_login_css' );


// Add custom CSS to the login page
function custom_login_styles() {
    wp_enqueue_style( 'custom-login-styles', plugin_dir_url( __FILE__ ) . 'css/login-style.css' );
}
add_action( 'login_enqueue_scripts', 'custom_login_styles' );

// Add custom HTML to the login form
function custom_login_form() {
    $redirect_to = isset( $_REQUEST['redirect_to'] ) ? $_REQUEST['redirect_to'] : home_url();
    ?>
  
    <div class="inputGroup inputGroup1">
        <label for="loginEmail" id="loginEmailLabel"><?php _e( 'Username or email address', 'custom-login-page' ); ?></label>
        <input type="text" name="log" id="loginEmail" maxlength="254" />
        <p class="helper helper1">email@domain.com</p>
    </div>
    <div class="inputGroup inputGroup2">
        <label for="loginPassword" id="loginPasswordLabel"><?php _e( 'Password', 'custom-login-page' ); ?></label>
        <input type="password" name="pwd" id="loginPassword" />
        <label id="showPasswordToggle" for="showPasswordCheck">Show
            <input id="showPasswordCheck" type="checkbox"/>
            <div class="indicator"></div>
        </label>
    </div>
    <div class="inputGroup inputGroup3 donthide">
        <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="<?php esc_attr_e( 'Log In', 'custom-login-page' ); ?>" />
        <input type="hidden" name="redirect_to" value="<?php echo esc_attr( $redirect_to ); ?>" />
    </div>
    
    <?php
}
add_action( 'login_form', 'custom_login_form' );


// Add custom HTML to the registration form
function custom_register_form() {
    ?>
   
        

    
    <div class="inputGroup inputGroup1">
        <label for="loginEmail" id="loginEmailLabel"><?php _e( 'Username', 'custom-login-page' ); ?><span class="required">*</span></label>
        <input type="text" name="user_login" id="loginEmail" maxlength="254" />
        <p class="helper helper1">User Login</p>
    </div>
    <div class="inputGroup inputGroup2">
        <label for="loginPassword" id="loginPasswordLabel"><?php _e( 'Email address', 'custom-login-page' ); ?><span class="required">*</span></label>
        <input type="text" name="user_email" id="loginPassword" />
        <p class="helper helper2">email@domain.com</p>
        
        <label id="showPasswordToggle" for="showPasswordCheck">Show
            <input id="showPasswordCheck" type="checkbox"/>
            <div class="indicator"></div>
        </label>
    </div>
   
    <div class="inputGroup inputGroup3 donthide">
        <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="<?php esc_attr_e( 'Register', 'custom-login-page' ); ?>" />
     
    </div>
    

   
   
    <?php
}
add_action( 'register_form', 'custom_register_form' );

// Add custom HTML to the lost password form
function custom_lostpassword_form() {
    ?>
    
       
      
    <div class="inputGroup inputGroup1">
        <label for="user_login" id="loginEmailLabel"><?php _e( 'Username or email address', 'custom-login-page' ); ?></label>
        <input type="text" name="user_logi" id="loginEmail" maxlength="254" />
        <p class="helper helper1">email@domain.com</p>
        
    </div>
    
    
    
    <div class="inputGroup inputGroup3 donthide">
        <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="<?php esc_attr_e( 'Get New Password', 'custom-login-page' ); ?>" />
    </div>

    <?php
}
add_action( 'lostpassword_form', 'custom_lostpassword_form' );


// Add custom JavaScript to the login page
function custom_login_scripts() {
    wp_enqueue_script( 'custom-login-scripts', plugin_dir_url( __FILE__ ) . 'js/TweenMax.min.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'custom-login-scripts2', plugin_dir_url( __FILE__ ) . 'js/login-script.js', array( 'jquery' ), '2.0', true );
}
add_action( 'login_enqueue_scripts', 'custom_login_scripts' );
