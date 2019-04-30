<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.elk-lab.com
 * @since      1.0.0
 *
 * @package    Veb
 * @subpackage Veb/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap">
    <h1><?= __('Visa 5Stelle Booking', 'visa-5stelle-booking') ?></h1>

    <form method="post" action="options.php">
        <?php settings_fields('v5b_options'); ?>
        <?php do_settings_sections('v5b'); ?>
        <?php submit_button(); ?>
    </form>
</div>