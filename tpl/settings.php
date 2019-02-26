<div class="wrap">
    <h2>Dash Not Found Page</h2>
    <form method="post" action="options.php"> 
        <?php @settings_fields('dash_not_found_page-group'); ?>
        <?php @do_settings_fields('dash_not_found_page-group'); ?>

        <?php do_settings_sections('dash_not_found_page'); ?>

        <?php @submit_button(); ?>
    </form>
</div>