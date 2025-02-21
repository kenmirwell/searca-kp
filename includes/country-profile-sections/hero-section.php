<div class="bg-[#196129] pt-[40px]">
    <div class="flex justify-between w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto pb-[50px] font-light">
        <div class="w-[50%] pb-[20px] gap-[20px]">
            <h1 class="text-[#ffffff] cursor-pointer text-[45px] font-[500]"><?php the_title() ?></h1>
            <div class="pt-[20px] flex flex-col gap-[10px]">
                <?php 
                    if (have_rows("country_background")) {
                ?>
                    <?php while( have_rows('country_background') ): the_row(); ?>
                        <p class="text-[#ffffff]"> <?php the_sub_field('background_paragraph'); ?></p>
                    <?php endwhile ?>
                <?php 
                    }
                ?>
            </div>
        </div>
        <div class="flex flex-col w-[40%] items-start">
            <div class="relative p-[35px] pt-[20px] pl-[20px] w-[100%] rounded-xl overflow-hidden shadow-md bg-[#ffffff]">
                <div class="flex items-end pb-[20px]">
                    <div class="blub-icon">
                        <svg width="43" height="43" viewBox="0 0 512 523" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M312.109 165.146C358.314 191.822 374.194 250.781 347.672 296.719C331.93 323.986 278.328 347.176 278.328 347.176C269.661 350.865 258.719 360.553 254.014 368.703L245.458 383.521C240.752 391.672 230.217 394.48 222.045 389.762L162.617 355.451C154.445 350.733 151.61 340.205 156.315 332.055L164.871 317.236C169.576 309.086 172.495 294.767 171.356 285.416C171.356 285.416 164.787 227.486 180.529 200.219C207.052 154.281 265.903 138.469 312.109 165.146ZM131.761 374.584L139.204 361.692L228.347 413.159L220.904 426.051C215.599 435.239 209.304 441.681 200.093 436.363L196.379 434.218C191.074 443.406 181.88 445.606 172.669 440.288L142.954 423.132C133.892 417.9 131.646 409.095 136.95 399.907L133.236 397.763C124.024 392.445 126.456 383.772 131.761 374.584Z" fill="#F3BD1C"/>
                            <ellipse cx="318.892" cy="236.146" rx="16.5" ry="31" fill="white"/>
                            <rect x="102.133" y="164.005" width="22" height="60" rx="11" transform="rotate(-60 102.133 164.005)" fill="#F3BD1C"/>
                            <rect width="22" height="60" rx="11" transform="matrix(0.5 -0.866025 -0.866025 -0.5 417.367 346.005)" fill="#F3BD1C"/>
                            <rect width="22" height="60" rx="11" transform="matrix(-0.866025 -0.5 -0.5 0.866025 363.776 96.8262)" fill="#F3BD1C"/>
                            <rect width="22" height="60" rx="11" transform="matrix(-0.965926 0.258819 0.258819 0.965926 227.051 71.3457)" fill="#F3BD1C"/>
                            <rect width="22" height="60" rx="11" transform="matrix(0.965926 -0.258819 -0.258819 -0.965926 300.726 423.111)" fill="#F3BD1C"/>
                            <rect x="91.2196" y="302.021" width="22" height="60" rx="11" transform="rotate(-105 91.2196 302.021)" fill="#F3BD1C"/>
                            <rect x="435.348" y="191.274" width="22" height="60" rx="11" transform="rotate(75 435.348 191.274)" fill="#F3BD1C"/>
                        </svg>
                    </div>
                    <h6 class="text-[24px] text-[#0a875a] font-[600]">Quick Facts</h6>
                </div>
                <?php 
                    if (have_rows("quick_facts")) {
                ?>
                    <ul class="flex flex-col gap-[10px] pl-[15px]">
                        <?php while( have_rows('quick_facts') ): the_row(); ?>
                            <li class="text-[12px] text-[#000000] flex gap-[8px] items-start">
                                <div class="pt-[5px]">
                                    <svg width="10" height="10" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.75 19.5C4.37391 19.5 0 15.1261 0 9.75C0 4.37391 4.37391 0 9.75 0C15.1261 0 19.5 4.37391 19.5 9.75C19.5 15.1261 15.1261 19.5 9.75 19.5Z" fill="#F3BD1C"/>
                                    </svg>
                                </div>
                                <p><?php the_sub_field('main_facts'); ?></p>
                            </li>
                                <?php 
                                    if (have_rows("sub_facts") ) {      
                                ?>
                                    <ul class="flex flex-col gap-[10px] pl-[20px]">
                                        <?php while( have_rows('sub_facts') ): the_row(); ?>
                                            <li class=" text-[#000000] text-[12px] flex gap-[8px]">
                                                <div>
                                                    <svg width="10" height="10" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M9.75 17.5C5.47848 17.5 2 14.0215 2 9.75C2 5.47848 5.47848 2 9.75 2C14.0215 2 17.5 5.47848 17.5 9.75C17.5 14.0215 14.0215 17.5 9.75 17.5Z" stroke="#F3BD1C" stroke-width="4"/>
                                                    </svg>
                                                </div>
                                                <?php the_sub_field('sub_fact_points'); ?>
                                            </li>
                                        <?php endwhile; ?>
                                    </ul>
                                <?php 
                                    }
                                ?>
                        <?php endwhile; ?>
                    </ul>
                <?php } ?>
                <!-- <div class="bg-[#ffffff] opacity-1 w-[100%] h-[100%] absolute top-0 left-0 z-[1]"></div> -->
            </div>
        </div>
    </div>
</div>