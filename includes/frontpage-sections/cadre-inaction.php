<?php 
    set_query_var('cadre_in_action_banner', $cadre_in_action_banner);
?>

<div class="flex w-[100%] h-[720px] relative">
    <div class="flex flex-col xl:flex-row w-[90%] lg:w-[1024px] xl:w-[1280px] justify-center xl:w-[60%] mx-auto gap-[100px] items-center relative z-[9]">
        <div class="flex flex-col items-center justify-center gap-[20px] group">
            <div class="flex relative justify-center items-center">
                <div class="bg-transparent border border-[1px] border-[#ffffff] p-[50px] group-hover:scale-[1.5] rounded-full transition-all duration-200 ease absolute"></div>
                <div class="bg-[#ffffff] p-[50px] rounded-full"></div>
                <svg class="z-[2] absolute" width="11" height="14" viewBox="0 0 11 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 14V0L11 7L0 14Z" fill="#1D1B20"/>
                </svg>
            </div>
            <h2 class="text-[#ffffff] text-[12px] xl:text-[16px]">Watch the Video</h2>
        </div>
    </div>
    <div class="bg-black opacity-50 w-[100%] h-[100%] absolute top-0 left-0 z-[1]"></div>
    <img class="absolute w-full h-full object-cover object-bottom" src="<?php echo esc_url($cadre_in_action_banner) ?>">
</div>