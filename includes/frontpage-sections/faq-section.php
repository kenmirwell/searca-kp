<div class="bg-[#196129] py-[30px] md:py-[50px] relative">
    <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">
        <div class="block md:flex gap-[20px] lg:gap-[80px]">
            <div class="flex flex-col gap-[20px] w-[100%] md:w-[50%]">
                <h2 class="text-[22px] lg:text-[42px] text-[#ffffff] font-[700]">Frequently Asked</br> Questions</h2>
                <p  class="text-[14px] lg:text-[18px] text-[#ffffff]">Find answers to common questions about CADRE, our platform, and how we support sustainable agriculture in Southeast Asia.</p>
                <?php
                    get_button_data('button-template', array(
                        'title' => 'View FAQs',
                        'root_url' => "#",
                        'alignment' => "justify-start"
                    ));
                ?>
            </div>
            <div class="flex flex-col gap-[10px] lg:gap-[20px] w-[100%] md:w-[50%] pt-[20px] md:pt-[0px] lg:pt-[30px]">
                <?php 
                    $faq = new WP_Query(array(
                        "post_type" => "freq-ask-question",
                        "posts_per_page" => 10,
                        'order' => 'ASC',     
                    ));

                    if ($faq->have_posts()) {
                        while ($faq->have_posts()){
                            $faq->the_post();
                            $faq_index = (int) $faq->current_post;
                            
                ?>
                    <div id="faq-group-<?php echo $faq_index ?>" class="flex flex-col p-[15px] lg:p-[20px] rounded-lg md:rounded-xl gap-[10px] lg:gap-[20px]">
                        <div 
                            id="faq-head-<?php echo $faq_index; ?>"
                            onclick="handleFaqAccordion('answer-<?php echo $faq_index; ?>', parseInt('<?php echo $faq_index; ?>', 10))"   
                            class="flex justify-between items-center cursor-pointer transition-all duration-300 ease group gap-[20px]"
                        >
                            <h6 class="text-[16px] lg:text-[18px] text-[#ffffff] font-[600] group-hover:text-[#ceab23] transition-all duration-300 ease"><?php the_title(); ?></h6>
                            <svg width="22" height="22" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 2V30M2 16H30" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div
                            style="height: 0;" 
                            id="answer-container-<?php echo $faq_index ?>" 
                            class="answer-container h-[100%] overflow-hidden transition-all duration-300 ease"
                        >
                            <div id="answer-<?php echo $faq_index; ?>" class="answer text-[12px] lg:text-[18px] text-[#ffffff]">
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
    <img class="absolute bottom-[0] left-[0] w-[100%] md:w-[90%] xl:w-[70%] h-[50%] object-cover z-[1]" src="https://cadre.searca.org/wp-content/uploads/2025/02/faq-bg.png" alt="">
</div>