<?php 
    get_header();
    
    while (have_posts()) {
        the_post();

        $thematic_area = get_field("thematic_area");
        $downloadable = get_field("downloadable");
?>
    <div>
        <div class="w-[1100px] mx-auto">
            <div class="pt-[20px] pb-[60px] text-[14px] font-light flex gap-[5px]">
                <p><a href="/">Home |</a></p>
                <p><a href="<?php echo get_the_permalink( $thematic_area); ?>"><?php echo get_the_title( $thematic_area ); ?></a> |</p>
                <p><?php the_title(); ?></p>
            </div>
        </div>
        <div class="w-[1100px] mx-auto">
            <div class="pb-[15px]">
                <div class="rounded-t-xl overflow-hidden h-[500px] bg-[#868686]">
                    <div class="flex justify-center py-[20px] h-[500px]">
                        <?php
                            if ( has_post_thumbnail() ) {
                                $thumbnail_url = get_the_post_thumbnail_url();
                        ?>
                            <img class="h-[100%]" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title(); ?>">
                        <?php
                            }
                        ?>
                    </div>
                </div>
                <div class="flex justify-between py-[20px] px-[20px] border-2 border-[#D1D1D1] rounded-b-xl overflow-hidden text-[14px]">
                    <div class="flex gap-[20px]">
                        <div class="cursor-pointer" onclick="hideShow(0)">
                            <p>Overview</p>
                        </div>
                        <div class="cursor-pointer" onclick="hideShow(1)">
                            <p>Content</p>
                        </div>
                        <div class="cursor-pointer" onclick="hideShow(2)">
                            <p>Testimonial</p>
                        </div>
                    </div>
                    <div>
                        <a href="<?php echo $downloadable ?>">Download</a> 
                    </div>
                </div>
            </div>
            <div id="material-overview" class="material-overview">
                <div class="w-[1060px] mx-auto pb-[20px] border-b-[1px]">
                    <div class="flex justify-between items-end">
                        <div>
                            <h1>Complete learning material title</h1>
                        </div>  
                        <div class="flex flex-col items-center text-[12px]">
                            <p class="text-[#7C7C7C] text-[12px]">Published: date</p>
                        </div>              
                    </div>
                </div>
                <div class="w-[1060px] mx-auto">
                    <div class="flex justify-between py-[50px] border-b-[1px]">
                        <div class="w-[200px]">
                            <p>Description</p>
                        </div>
                        <div class="text-[14px] font-light w-[700px]">
                            <p>Lorem ipsum dolor sit amet consectetur. At laoreet interdum id lobortis quis. Nunc sed dignissim integer nulla ultricies nec faucibus feugiat. Elit venenatis sapien risus erat vitae dignissim sed phasellus. Imperdiet interdum id nulla nunc lacus ipsum. Sapien ornare mattis orci venenatis interdum tortor tortor phasellus fringilla. Eu enim volutpat pellentesque facilisis sapien ut mattis scelerisque. Mattis odio nunc egestas mauris in. At convallis neque ac molestie non gravida. Commodo nullam mi id tempor gravida penatibus.</p>
                        </div>
                    </div>
                    <div class="flex justify-between py-[50px] border-b-[1px]">
                        <div class="w-[200px]">
                            <p>About the Author</p>
                        </div>
                        <div class="text-[14px] font-light w-[700px]">
                            <div class="pb-[20px] flex items-center gap-[10px]">
                                <div class="rounded-full h-[30px] w-[30px] bg-[#E8E8E8]"></div>
                                <div>
                                    <p class="text-[#7C7C7C] text-[12px]">
                                        <?php if($author_ID){ ?>        
                                                <p class="text-[#7C7C7C] text-[12px]"><?php echo get_the_title( $author_ID ); ?></p>
                                        <?php } else { ?>    
                                                <p class="text-[#7C7C7C] text-[12px]">Author unknown</p>
                                        <?php } ?>
                                    </p>
                                </div>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur. At laoreet interdum id lobortis quis. Nunc sed dignissim integer nulla ultricies nec faucibus feugiat. Elit venenatis sapien risus erat vitae dignissim sed phasellus. Imperdiet interdum id nulla nunc lacus ipsum. Sapien ornare mattis orci venenatis interdum tortor tortor phasellus fringilla. Eu enim volutpat pellentesque facilisis sapien ut mattis scelerisque. Mattis odio nunc egestas mauris in. At convallis neque ac molestie non gravida. Commodo nullam mi id tempor gravida penatibus.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="material-content" class="material-content">
                content
            </div>
            <div id="material-testimonials" class="material-testimonials">
                testimonials
            </div>
        </div>
    </div>

<?php }


get_footer()
?>