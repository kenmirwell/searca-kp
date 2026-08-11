<?php 
    get_header();
    
    while (have_posts()) {
        the_post();

        $component = get_field("component");
        $downloadable = get_field("downloadable");
        $external_source = get_field("external_source");
        $author = get_field("custom_author");
        $published_date = get_field("published_date");

        $current_user = wp_get_current_user();


       $permission = get_field("permission");
?>
    <div>
        <!-- <div class="w-[1100px] mx-auto">
            <div class="pt-[20px] pb-[60px] text-[14px] font-extralight flex gap-[5px]">
                <p class="cursor-pointer"><a href="/">Home |</a></p>
                <p class="cursor-pointer"><a href="<?php echo get_the_permalink( $component); ?>"><?php echo get_the_title( $component ); ?></a> |</p>
                <p class="cursor-pointer"><?php the_title(); ?></p>
            </div>
        </div> -->
        <div class="bg-[#196129]">
            <div class="w-[1100px] mx-auto">
                <div class="py-[10px] text-[12px] text-[#ffffff] font-extralight flex gap-[5px]">
                    <div class="cursor-pointer">
                        <a href="https://bcsdevelopmentgator.site/knowledge-resources/">Back To Knowledge Resources</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-[1100px] mx-auto py-[100px]">
            <div class="flex gap-[40px] relative">
                <div class="w-[30%] h-[100%] sticky top-[50px]">
                    <div class="shadow rounded-xl overflow-hidden">
                        <div class="w-[100%] h-[100%]">
                            <?php
                                if ( has_post_thumbnail() ) {
                                    $thumbnail_url = get_the_post_thumbnail_url();
                            ?>
                                <img class="w-full h-full object-cover" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title(); ?>">
                            <?php
                                }
                            ?>
                        </div>
                        <?php if($permission[0]) { ?>
                            <?php if( ! is_user_logged_in() ) { ?>
                                <div class="flex justify-center w-[100%] p-[10px] cursor-pointer bg-[#f3bd1c] hover:bg-[#ffefbe] ransition-all duration-300 ease " onclick="onModal('login-modal')" >
                                    <span>Premium access please login</span>
                                </div>
                            <?php } else { ?> 
                                <a class="flex justify-center w-[100%] p-[10px] cursor-pointer bg-[#f3bd1c] hover:bg-[#ffefbe] ransition-all duration-300 ease " href="<?php echo $external_source ?>">
                                    <span>Premium access</span>
                                </a> 
                            <?php } ?> 
                        <?php } else {?>
                            <a class="flex justify-center w-[100%] p-[10px] cursor-pointer bg-[#f3bd1c] hover:bg-[#ffefbe] ransition-all duration-300 ease " href="<?php echo $external_source ?>">
                                <span>Download</span>
                            </a> 
                        <?php }?>                            
                    </div>
                </div>
                <div class="w-[70%]">
                    <div>
                        <div class="">
                            <h1 class="text-[20px] font-[600]"><?php the_title(); ?></h1>
                        </div>  
                        <div class="pt-[10px] text-[#196129]">
                            <?php
                                if($author) {
                            ?>
                                <p class="text-[12px]">Author: <span class="font-[600]"><?php echo $author; ?></span></p>
                            <?php 
                                } else {
                            ?>
                                <p class="text-[12px]">Author: <span class="font-[600]">SEARCA</span></p>
                            <?php 
                                }
                            ?>
                        </div>
                        <div class="pt-[5px] text-[#196129]">
                            <?php
                                if($published_date) {
                            ?>
                                <p class="text-[12px]">Published Date: <span class="font-[600]"><?php echo $published_date; ?></span></p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="">
                        <div class="pt-[30px]">
                            <h6 class="text-[18px] font-[600]">Background</h6>
                        </div>
                        <div class="font-[300] text-[16px] pt-[10px]">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <!-- <div>
                        <div class="pt-[30px]">
                            <h6 class="text-[16px] font-[600]">Content</h6>
                        </div>
                        <div class="font-[300] text-[14px] pt-[10px]">
                            <?php //the_content(); ?>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

<?php }


get_footer()
?>