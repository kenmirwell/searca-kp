<div class="py-[50px] bg-[#096936]">
  <div class="flex flex-col lg:flex-row gap-[50px] lg:gap-[100px] items-center w-[90%] lg:w-[1024px] xl:w-[1280px] mx-auto justify-between">
    <div class="w-[100%] lg:w-[60%] flex flex-col gap-[20px] text-[#ffffff] text-display-24 md:text-display-42 font-bold">
      <h2>Never Miss an Update Subscribe to the Agri-InSight Digest</h2>
      <p class="text-[#ffffff] w-[100%] text-display-14 md:text-display-16">Stay up to date with the latest SEARCA publications, policy insights, and data-driven research shaping agri-food systems across Southeast Asia.</p>
    </div>
    <div class="flex w-[100%] lg:w-[40%]">
      <div class="w-auto flex pl-[20px] py-[5px] pr-[5px] rounded-full items-center justify-between bg-[#ffffff]">
          <input class="w-[33.33%] p-[10px] text-[#000000]" type="text" placeholder="Full Name">
          <input class="w-[33.33%] p-[10px] text-[#000000]" type="text" placeholder="Email">
          <div class="flex justify-center">
              <?php
                  button_template('common-button', array(
                      'title' => "Subscribe",
                      'url' => "/agricultural-statistics-data",
                      'color' => 'green_to_gold'
                  ))
              ?>
          </div>
      </div>
    </div>
  </div>
</div>