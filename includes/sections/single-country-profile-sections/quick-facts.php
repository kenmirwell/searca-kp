<?php 
    $group = get_field("fact");

    $content_group = $group["facts_content"]
?>

<div class="quick-facts py-[60px] px-[50px] bg-[#096936] rounded-lg">
    <div class="w-[100%]">
        <div class="text-[#ffffff] flex flex-col items-center justify-center">
            <h2 class="text-display-24 lg:text-display-42 font-bold pb-[20px] lg:pb-[10px] w-[40%] mx-auto text-center"><?php echo esc_html($group["fact_main_title"]); ?></h2>
            <h6 class="flex text-display-14 lg:text-[18px] justify-center items-center xl:text-center w-[100%]"><?php echo esc_html($group["fact_main_description"]) ?></h6>
        </div>
        <div class="pt-[50px]">
             <?php if (!empty($content_group)) : ?>
                <div class="flex flex-col gap-[50px] lg:flex-row justify-between">
                <?php foreach ($content_group as $content) : ?>
                    <div class="flex flex-col text-center justify-center items-center gap-[20px]">
                        <img class="w-[56px] h-[56px]" src="<?php echo esc_url($content["fact_icon"]); ?>" alt="">
                        <div class="flex flex-col text-center justify-center items-center">
                            <div class="flex">
                                <h6 class="text-[#ceab23] font-bold text-[22px]"><?php echo esc_html($content["fact_title"]); ?></h6>
                                <h6 class="text-[#ceab23] font-bold text-[22px] fact-counter" data-target="<?php echo esc_attr($content["fact_figure"]); ?>">0</h6>
                                <h6 class="text-[#ceab23] font-bold text-[22px]"><?php echo esc_html($content["fact_unit"]); ?></h6>
                            </div>
                            <p class="text-[#ffffff] pb-[10px] text-[14px]"><?php echo esc_html($content["fact_description"]); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const counters = document.querySelectorAll(".fact-counter");

  const options = { threshold: 0.5 }; // trigger when 50% visible
  const observer = new IntersectionObserver((entries, obs) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const el = entry.target;
        const target = +el.getAttribute("data-target");
        let start = 0;
        const duration = 2000; // total animation time in ms

        // step size logic
        let step = target > 1000 ? 100 : 1;

        const steps = Math.ceil(target / step);
        const stepTime = duration / steps;

        const timer = setInterval(() => {
          start += step;

          // ✅ If we're close to target, just finish cleanly
          if (start >= target) {
            start = target;
            clearInterval(timer);
          }

          el.textContent = start.toLocaleString();
        }, stepTime);

        obs.unobserve(el); // run only once
      }
    });
  }, options);

  counters.forEach(counter => observer.observe(counter));
});
</script>

