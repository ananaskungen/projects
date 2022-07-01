<?php 
?>
<h1><?php echo esc_html(get_admin_page_title()); ?> </h1>
<?php 
/* var_dump($characters); */
foreach($characters->results as $character): ?>
<div>
    <p><?php echo $character->name ?></p>
    <form action="<?php echo admin_url('admin-ajax.php'); ?>" method="post" class="sw_import_form" >

    <?php wp_nonce_field('sw_nonce', 'nonce'); ?>

    <input type="hidden" name="url" value="<?php echo $character->url ?>" />
    <input type="hidden" name="action" value="sw_handle_form" />

    <button type="submit">Import</button>

    </form>
</div>


<?php endforeach ?>
<!-- 
echo $characters->results[0]->name; /* Så här får vi ut Luke Skywalker från $characters stärng i starwars_menu_page function där vi decodar en json body.  */
 -->


<!-- <form action="options.php" method="post" >
         < ?php 
    settings_fields('sw_settings_field');
    do_settings_sections('sw_settings_section');
    submit_button(__('Save Settings', 'wcmstarwars'));
    ?> 
</form> -->