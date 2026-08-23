<?php if (get_field('reference_count')) : ?>
  <div class="flex justify-items items-center gap-[10px] pt-[40px] pb-[20px]">
    <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M10.0207 10.9325L14.3919 4.97125C14.7329 4.50565 14.9382 3.95472 14.9852 3.37954C15.0322 2.80437 14.919 2.22741 14.6582 1.71262C14.3974 1.19783 13.9991 0.765321 13.5075 0.46303C13.0159 0.160739 12.4503 0.000475719 11.8732 3.77118e-06H3.12628C2.54863 -0.000894038 1.98205 0.158532 1.48963 0.460535C0.9972 0.762538 0.598243 1.19527 0.337163 1.71056C0.0760832 2.22585 -0.0368767 2.80349 0.0108585 3.37917C0.0585928 3.95486 0.265149 4.506 0.607534 4.97125L4.97878 10.9325C5.26907 11.3281 5.6484 11.6497 6.08609 11.8714C6.52378 12.0931 7.00752 12.2086 7.49816 12.2086C7.98879 12.2086 8.47254 12.0931 8.91023 11.8714C9.34792 11.6497 9.72725 11.3281 10.0175 10.9325H10.0207Z" fill="black"/>
    </svg>

    <h3 class="font-bold text-display-18">
      References 
    </h3>
    <span class="font-bold text-display-18">( <?php echo esc_html(get_field('reference_count')); ?> )</span>
  </div>
<?php endif; ?>

<?php if (have_rows('reference_repeater')) : ?>
    <div class="flex flex-wrap gap-[30px] mb-[20px]">
        <?php while (have_rows('reference_repeater')) : the_row();  ?>
          <div class="flex gap-[10px]">
              <?php if (get_sub_field('text')) : ?>
                <span class="font-light text-display-16">
                  <?php echo esc_html(get_sub_field('text')); ?>
                  <a class="font-semibold text-[#008C67] border-b-[1px] border-[#008C67]" href="<?php echo esc_html(get_sub_field('link')); ?>" class="font-light text-display-16">
                    <?php echo esc_html(get_sub_field('link')); ?>
                  </a>
                </span>
              <?php endif; ?>
          </div>
        <?php endwhile; ?>
    </div>
<?php endif; ?>