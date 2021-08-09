<div class="wrap">
    <?php 
        settings_errors();
    ?>
    
    <form action="options.php" method="post">
        <?php 
            settings_fields( "dicbw_optons_group" );
            do_settings_sections( "dicbw_wc_direct_checkout" );
            submit_button();
        ?>
    </form>
</div>