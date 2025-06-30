<?php 
  $page = get_query_var('page');
?>

<div class="relative">
    <div class="bg-[#F2FFF8] overflow-hidden">
      <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">
          <div class="flex flex-col md:flex-row relative pt-[50px] py-[60px] justify-center gap-[50px] items-center">
            <div class="w-[50%]">
                <img class="w-full h-full object-cover" src="https://cadre.searca.org/wp-content/uploads/2025/06/image-15.png" alt="">
            </div>
            <div class="w-[50%] pb-[20px] xl:pt-[50px] flex flex-col gap-[20px] text-left items-left mx-auto z-[2]">
                <div class="w-[100%]">
                     <?php if($page) : ?>
                        <?php if (get_field("split_section_title", $page->ID)) : ?>
                            <div class="hidden lg:block text-[##1f1f1f] w-[100%] text-display-24 md:text-display-42 font-bold">
                                <h2><?php echo get_field("split_section_title", $page->ID); ?></h2>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div class="flex flex-col gap-[20px] pt-[20px]">
                        <div class="text-[#2f2f2f] w-[100%] text-display-12 md:text-display-16">
                            <ul class="flex flex-col w-[100%] gap-[5px] lg:gap-[20px] py-[20px] lg:pt-[30px] agpractices-list">
                              <li class="flex flex-col items-start gap-[10px]">
                                <?php if($page) : ?>
                                  <?php if (have_rows('split_section_points', $page->ID)) : ?>
                                    <?php while (have_rows('split_section_points', $page->ID)) : the_row(); ?>
                                      <div class="flex gap-[10px] items-center">
                                        <svg width="21" height="11" viewBox="0 0 36 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M34 2L12 24L2 14" stroke="#CEAB23" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <h6 class="font-[700]"><?php echo esc_html(get_sub_field('point_title')); ?></h6>
                                      </div>
                                      <p><?php echo esc_html(get_sub_field('point_description')); ?></p>
                                    <?php endwhile; ?>
                                  <?php endif; ?> 
                                <?php endif; ?>  
                              </li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex">
                        <?php
                            button_template('common-button', array(
                                'title' => "Learn More About CAPRI",
                                'url' => "/agricultural-digital-tools",
                                'color' => 'gold_to_green'
                            ))
                        ?>
                    </div>
                </div>
            </div>
          </div>
      </div>
    </div>
</div>