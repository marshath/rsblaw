<div id="sidebar-practice-areas" class="sidebar fourcol last clearfix" role="complementary">

    <?php if ( is_active_sidebar( 'practice-areas-sidebar' ) ) { ?>
        <?php dynamic_sidebar( 'practice-areas-sidebar' );
    } //endif
	else; //ignore
	//endif
    $qf=get_field('quick-facts', 11);
    $quickfacts = '<div id="quick-facts" class="widget widget_text"><h4>Quick Facts</h4>'; //prepend opening div
    $quickfacts .= $qf;
    $quickfacts .= '</div>'; //append closing div
    echo $quickfacts;
    //posts the quick facts advanced custom field from the practice areas page in the sidebar ?>

</div>