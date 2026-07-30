<div class="relative pt-[80px]">
    <div class="w-[80%] mb-[100px] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto">
        <div class="bg-[#008C67] rounded-full p-[10px] w-fit mb-[50px]">
            <div class="flex text-white justify-center gap-[10px] items-center text-[14px] font-light">
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="12" height="12" rx="6" fill="#B59637" fill-opacity="0.6"/>
                </svg>
                <span>
                    Home
                </span>
                <svg width="6" height="11" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.649902 0.649994L4.32444 4.35454C4.75839 4.79204 4.75839 5.50795 4.32444 5.94545L0.649902 9.64999" stroke="white" stroke-width="1.3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>
                    Knowledge
                </span>
                <svg width="6" height="11" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.649902 0.649994L4.32444 4.35454C4.75839 4.79204 4.75839 5.50795 4.32444 5.94545L0.649902 9.64999" stroke="white" stroke-width="1.3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>
                    Insights
                </span>
                <svg width="6" height="11" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.649902 0.649994L4.32444 4.35454C4.75839 4.79204 4.75839 5.50795 4.32444 5.94545L0.649902 9.64999" stroke="white" stroke-width="1.3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <?php if (get_field('bread_crumb')) : ?>
                    <span><?php echo esc_html(get_field('bread_crumb')); ?></span>
                <?php endif; ?>
            </div>
        </div>
        <div class="flex flex-col gap-[20px] w-[80%] pb-[40px]">
            <div>
                <h1 class="text-[32px] font-semibold"><?php the_title()?></h1>
            </div>
            <?php if (have_rows('description_repeater')) : ?>
                <?php while (have_rows('description_repeater')) : the_row(); ?>
                        <div>
                            <p><?php echo esc_html(get_sub_field('description')); ?></p>
                        </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="pb-[40px]">
            <?php if (have_rows('figures_repeater')) : ?>
                <div class="flex justify-between gap-[20px]">
                    <?php while (have_rows('figures_repeater')) : the_row(); ?>
                        <div class="flex flex-col border-[1px] border-[#D3D3D3] rounded-2xl p-[20px]">
                            <div class="flex gap-[5px] items-center text-display-42 font-bold">
                                <?php if (get_sub_field('figure')) : ?>
                                    <h3><?php echo esc_html(get_sub_field('figure')); ?></h3>
                                <?php endif; ?>

                                <?php if (get_sub_field('unit')) : ?>
                                    <h3><?php echo esc_html(get_sub_field('unit')); ?></h3>
                                <?php endif; ?>
                            </div>

                            <?php if (get_sub_field('title')) : ?>
                                <p><?php echo esc_html(get_sub_field('title')); ?></p>
                            <?php endif; ?>

                            <?php if (get_sub_field('description')) : ?>
                                <p class="font-light"><?php echo esc_html(get_sub_field('description')); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="flex gap-[40px] items-center">
            <?php if ( have_rows('author_group') ) : ?>
                <div class="flex items-center gap-[5px]">
                    <?php  while ( have_rows('author_group') ) : the_row(); ?>
                        <?php if (get_sub_field('author_icon')) : ?>
                            <img src="<?php echo esc_url(get_sub_field('author_icon')); ?>" alt="hero background" class="w-full h-full object-cover">
                        <?php else : ?>
                            <div class="h-[50px] w-[50px] rounded-full bg-[#BE9D38]"></div>
                        <?php endif; ?>
                        <div class="text-display-14">
                            <?php if (get_sub_field('author_name')) : ?>
                                <p class="font-semibold"><?php echo esc_html(get_sub_field('author_name')); ?></p>
                            <?php endif; ?>
                            <?php if (get_sub_field('author_title')) : ?>
                                <p class="font-light"><?php echo esc_html(get_sub_field('author_title')); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>      
            <?php if (get_field('date_from')) : ?>
                <div class="flex gap-[10px] items-center">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.8333 1.66667H15V0.833333C15 0.373333 14.6275 0 14.1667 0C13.7058 0 13.3333 0.373333 13.3333 0.833333V1.66667H6.66667V0.833333C6.66667 0.373333 6.29417 0 5.83333 0C5.3725 0 5 0.373333 5 0.833333V1.66667H4.16667C1.86917 1.66667 0 3.53583 0 5.83333V15.8333C0 18.1308 1.86917 20 4.16667 20H15.8333C18.1308 20 20 18.1308 20 15.8333V5.83333C20 3.53583 18.1308 1.66667 15.8333 1.66667ZM4.16667 3.33333H15.8333C17.2117 3.33333 18.3333 4.455 18.3333 5.83333V6.66667H1.66667V5.83333C1.66667 4.455 2.78833 3.33333 4.16667 3.33333ZM15.8333 18.3333H4.16667C2.78833 18.3333 1.66667 17.2117 1.66667 15.8333V8.33333H18.3333V15.8333C18.3333 17.2117 17.2117 18.3333 15.8333 18.3333ZM15.8333 11.6667C15.8333 12.1267 15.4608 12.5 15 12.5H5C4.53917 12.5 4.16667 12.1267 4.16667 11.6667C4.16667 11.2067 4.53917 10.8333 5 10.8333H15C15.4608 10.8333 15.8333 11.2067 15.8333 11.6667ZM10 15C10 15.46 9.6275 15.8333 9.16667 15.8333H5C4.53917 15.8333 4.16667 15.46 4.16667 15C4.16667 14.54 4.53917 14.1667 5 14.1667H9.16667C9.6275 14.1667 10 14.54 10 15Z" fill="#1F1F1F"/>
                    </svg>
                    <div class="text-display-14">
                        <p class="font-semibold">Published</p>
                        <span class="font-light"><?php echo esc_html(get_field('date_from')); ?></span>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="relative w-full h-[475px]">
        <div class="bg-gradient-to-l from-[rgba(0,0,0,0.2)] to-[rgba(0,0,0,0.7)] w-full h-full absolute top-0 left-0 z-[1]"></div>
        <img class="absolute w-full h-full object-cover" src="<?php echo get_field('hero_image'); ?>" alt="hero image">
    </div>
</div>