<div class="py-[50px] md:py-[100px]">
  <div class="w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto">
    <div class="flex flex-col xl:flex-row justify-between items-start gap-[20px] xl:items-end pb-[50px]">
        <div class="block md:flex w-[100%] justify-between items-center">
            <div class="flex flex-col gap-[10px] w-[100%] lg:w-[60%] pb-[20px] md:pb-[0px]">
                <h2 class="hidden md:block text-[#1f1f1f] text-display-22 xl:text-display-42 font-[700]">Knowledge resources</br> Empowering informed decisions</h2>
                <h2 class="block md:hidden text-[#1f1f1f] text-display-22 xl:text-display-42 font-[700]">Knowledge resources Empowering informed decisions</h2>
                <p class="text-display-12 md:text-display-16">Access a wealth of research, data, and best practices to support informed decision-making in agriculture, forestry, and natural resource management.</p>
            </div>
            <?php
                get_button_data('button-template', array(
                    'title' => 'Explore resources',
                    'root_url' => "/knowledge-resources",
                    'alignment' => "justify-start"
                ));
            ?>
        </div>
    </div>
  </div>
  <?php get_template_part("includes/components/common-featured-publications"); ?>
</div>