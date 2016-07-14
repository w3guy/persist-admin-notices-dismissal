# Persist Admin notice Dismissals

Simple plugin that persists the dismissal of admin notices across pages in WordPress dashboard.

## How to Use
Firstly, install and activate this library as a plugin by cloning / downloading to your WordPress `wp-content/plugins` directory.

Say you have the following markup as your admin notice


```
function sample_admin_notice__success() {
?>
<div class="updated notice notice-success is-dismissible">
    <p><?php _e( 'Done!', 'sample-text-domain' ); ?></p>
</div>
<?php
}
add_action( 'admin_notices', 'sample_admin_notice__success' );
```

To make it hidden forever when dismissed, add the following data attribute `data-dismissible="data-disable-done-notice-forever"` to the div markup like so:


```
function sample_admin_notice__success() {
    ?>
    <div data-dismissible="data-disable-done-notice-forever" class="updated notice notice-success is-dismissible">
        <p><?php _e( 'Done!', 'sample-text-domain' ); ?></p>
    </div>
    <?php
}
add_action( 'admin_notices', 'sample_admin_notice__success' );
```


**Note:** the `data-dismissible` attribute must have a unique hypen separated text prefixed by `data-` which will serve as the key or option name used by the Options API to persist the state to the database. Don't understand, see the following examples.

#### Examples
Say you have two notices displayed when certain actions are triggered; firsly, choose a string to uniquely identify them. E.g `data-notice-one` and `data-notice-two`

To make the first notice never appear forever when dismissed, its `data-dismissible` attribute will be `data-dismissible="data-notice-one-forever"` where `data-notice-one` is its unique identifier.

To make the second notice only hidden for 2 days, its `data-dismissible` attribute will be `data-dismissible="data-notice-two-2"` where `data-notice-one` is its unique identifier and the `2` the number of days it will be hidden.

To actually make the dismissed admin notice not to appear, use the `is_admin_notice_active()` function like so:


```
function sample_admin_notice__success1() {
    if ( ! is_admin_notice_active( 'data-notice-one-forever' ) ) {
        return;
    }

    ?>
    <div data-dismissible="data-notice-one-forever" class="updated notice notice-success is-dismissible">
        <p><?php _e( 'Done 1!', 'sample-text-domain' ); ?></p>
    </div>
    <?php
}
add_action( 'admin_notices', 'sample_admin_notice__success1' );
```

```
function sample_admin_notice__success2() {
    if ( ! is_admin_notice_active( 'data-notice-two-2' ) ) {
        return;
    }

    ?>
    <div data-dismissible="data-notice-two-2" class="updated notice notice-success is-dismissible">
        <p><?php _e( 'Done 2!', 'sample-text-domain' ); ?></p>
    </div>
    <?php
}
add_action( 'admin_notices', 'sample_admin_notice__success2' );
```


Cool beans. Isn't it?
