<?php 
    get_header();

    while (have_posts()) {
        the_post();

        $aspiring_outcome = get_field("aspiring_outcome");

        $expected_output = get_field("expected_output");
?>
    <div class="bg-[#196129]">
        <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[20px] font-light">
            <div>
                <div class="flex gap-[5px] text-[#ffffff] text-[14px] font-extralight">
                    <p class="cursor-pointer"><a href="/">Home |</a></p>
                    <p class="cursor-pointer"><?php the_title()?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[50px]">
        <div class="flex gap-[50px]">
            <div>
                <h6 class="text-[24px] font-[600] text-[#196129]">Be part of CADRE</h6>
                <div class="pt-[20px]">
                    <?php the_content() ?>
                </div>
            </div>
            <div class="">
                <div class="z-[999] shadow-gray-300 shadow-sm w-[360px] top-[20%] bg-[#ffffff] px-[30px] py-[50px] pt-[65px] rounded-xl">
                    <div>
                        <form method="post" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>">
                            <div class="pb-[20px] w-[100%] flex justify-center items-center text-[18px]">
                                <h1 class="text-[24px] font-[600] text-[#196129]">Register for free</h1>
                            </div>
                            <div class="email-field-container pb-[20px]">
                                <input class="p-[10px] border-[1px] rounded-lg w-[100%]" id="email_data" name="email_data" type="email" placeholder="Enter your email" required>
                            </div>
                            <div class="w-[100%] flex justify-center pb-[20px]">
                                <span class="email-validation text-red-600 text-[12px] font-[600] hidden">Email Already Taken, Please use other email</span>
                            </div>
                            <div class="w-[100%] flex justify-center items-center text-[18px]">
                                <button type="submit" class="rounded-lg bg-[#F3BD1C] px-[35px] py-[10px] w-[100%]">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
    }
    get_footer()
?>