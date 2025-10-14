<?php 
    get_header();

    while (have_posts()) {
        the_post();

    $page = get_page_by_title('Knowledge Products'); 
    
    set_query_var('page_id', $page->ID);

?>
    
    <?php get_template_part("includes/sections/knowledge-products-sections/hero-section"); ?>
    <?php get_template_part("includes/sections/knowledge-products-sections/search-section"); ?>

    <div id="knowledge-products-content" class="">
        <?php get_template_part("includes/sections/knowledge-products-sections/featured-pubs"); ?>
        <?php get_template_part("includes/sections/knowledge-products-sections/cta-section"); ?>
        <?php get_template_part("includes/sections/knowledge-products-sections/key-pubs"); ?>
        <?php get_template_part("includes/sections/knowledge-products-sections/all-pubs"); ?>
    </div>
    <div id="knowledge-products-search-result" class="hidden">
        <div id="kp-search-result-content">
        </div>
    </div>
<?php 
    }
    get_footer()
?>