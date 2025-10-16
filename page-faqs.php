<?php 
    get_header();
    
    while (have_posts()) {
        the_post();

?>
<div class="py-[30px] md:pb-[50px] md:pt-[150px] relative">
    <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto z-[1] relative">
        <div class="flex flex-col items-center justify-center gap-[10px]">
            <h1 class="text-display-48 font-bold">Frequently Asked Questions</h1>
            <p class="text-center">Got questions? Find quick answers about CADRE’s research, funding, and</br> eligibility. Still need help? Contact Us!</p>
        </div>
        <div class="flex flex-col gap-[10px] lg:gap-[20px] w-[100%] pt-[20px] md:pt-[0px] lg:pt-[30px]">
            <?php 
                $faq = new WP_Query(array(
                    "post_type" => "freq-ask-question",
                    "posts_per_page" => 10,
                    "orderby" => "menu_order",
                    'order' => 'ASC',     
                ));

                if ($faq->have_posts()) {
                    while ($faq->have_posts()){
                        $faq->the_post();
                        $faq_index = (int) $faq->current_post;
                        
            ?>
                <div id="page-faq-group-<?php echo $faq_index ?>" class="flex flex-col p-[15px] lg:p-[20px] rounded-lg md:rounded-xl gap-[10px] lg:gap-[20px] border-[#D0D0D0] border-[1px]">
                    <div 
                        id="page-faq-head-<?php echo $faq_index; ?>"
                        onclick="handlePageFaqAccordion('page-answer-<?php echo $faq_index; ?>', parseInt('<?php echo $faq_index; ?>', 10))"   
                        class="flex justify-between items-center cursor-pointer transition-all duration-300 ease group gap-[20px]"
                    >
                        <h6 class="text-[16px] lg:text-[18px] text-[#1F1F1F] font-[600] group-hover:text-[#ceab23] transition-all duration-300 ease"><?php the_title(); ?></h6>
                        <svg width="22" height="22" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 2V30M2 16H30" stroke="#1f1f1f" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div
                        style="height: 0;" 
                        id="page-answer-container-<?php echo $faq_index ?>" 
                        class="page-answer-container h-[100%] overflow-hidden transition-all duration-300 ease"
                    >
                        <div id="page-answer-<?php echo $faq_index; ?>" class="answer text-[12px] lg:text-[18px] text-[#2F2F2F]">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            <?php 
                } } 
                
                wp_reset_postdata(); 
            ?>
        </div>
    </div>
</div>

<?php 
    }
    get_footer()
?>