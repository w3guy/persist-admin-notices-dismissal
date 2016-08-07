<?php
/*
Plugin Name: persist admin notice test
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: A brief description of the Plugin.
Version: 1.0
Author: collizo4sky
Author URI: http://URI_Of_The_Plugin_Author
License: A "Slug" license name e.g. GPL2
*/

require 'persist-admin-notices-dismissal.php';

function sample_admin_notice__success1()
{
    if (!PAnD::is_admin_notice_active('data-notice-one-forever')) {
        return;
    }

    ?>
    <div data-dismissible="data-notice-one-forever" class="updated notice notice-success is-dismissible">
        <p><?php _e('Done 1!', 'sample-text-domain'); ?></p>
    </div>
    <?php
}

add_action('admin_notices', 'sample_admin_notice__success1');

function sample_admin_notice__success2()
{
    if (!PAnD::is_admin_notice_active('data-notice-two-2')) {
        return;
    }

    ?>
    <div data-dismissible="data-notice-two-2" class="updated notice notice-success is-dismissible">
        <p><?php _e('Done 2!', 'sample-text-domain'); ?></p>
    </div>
    <?php
}

add_action('admin_notices', 'sample_admin_notice__success2');