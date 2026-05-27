<div id="consorInteractive">
    <div class="w-[90%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[60px]">
        <?php if (have_rows('interactive_section_ii')): ?>
            <?php while (have_rows('interactive_section_ii')): the_row(); ?>
                <div class="text-center flex flex-col gap-[10px] pb-[50px] text-[#1F1F1F]">
                    <h2 class="text-display-24 lg:text-display-42 font-bold"><?php the_sub_field('title'); ?></h2>
                    <p><?php the_sub_field('subtext'); ?></p>
                </div>

                <?php 
                    $key_points = get_sub_field('key_points');
                    if ($key_points): 
                ?>
                    <div class="flex flex-col lg:flex-row items-center justify-between relative">

                        <!-- Left: Circular Image with numbered nodes -->
                        <div class="relative w-[100%] lg:w-[55%] flex items-center justify-start">

                            <!-- Outer wrapper: defines the space, allows nodes to overflow -->
                            <div class="relative flex-shrink-0" style="width: 480px; height: 480px;">

                                <!-- Circle image: clips to circle, takes full wrapper size -->
                                <div class="absolute inset-0 rounded-full overflow-hidden" style="left: -80px; width: 480px; height: 480px;">
                                    <?php foreach ($key_points as $index => $point): ?>
                                        <div 
                                            class="image-wrapper" 
                                            data-index="<?php echo $index; ?>" 
                                            style="position: absolute; inset: 0; width: 100%; height: 100%; opacity: <?php echo $index === 0 ? '1' : '0'; ?>; transition: opacity 0.3s ease-in-out;"
                                        >
                                            <img 
                                                style="width: 100%; height: 100%; object-fit: cover; display: block;"
                                                src="<?php echo esc_url($point['image']); ?>" 
                                                alt="<?php echo esc_attr($point['title']); ?>"
                                            >
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <!-- Nodes + SVG curve: positioned on right edge of wrapper -->
                                <div style="position: absolute; top: 0; right: -26px; height: 100%; width: 52px; display: flex; flex-direction: column; justify-content: space-between; align-items: center; padding: 60px 0; z-index: 10;">

                                    <!-- SVG curved line behind nodes -->
                                    <svg style="position: absolute; top: 0; left: 50%; transform: translateX(-50%); height: 100%; width: 40px; overflow: visible;" viewBox="0 0 40 100" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M 20 0 Q 0 50 20 100" stroke="#5cb88a" stroke-width="0.8" fill="none"/>
                                    </svg>

                                    <?php foreach ($key_points as $index => $point): ?>
                                        <div 
                                            class="key-point-node cursor-pointer flex items-center justify-center rounded-full border-[2px] transition-all duration-300"
                                            data-index="<?php echo $index; ?>"
                                            style="width: 52px; height: 52px; flex-shrink: 0; background-color: <?php echo $index === 0 ? '#1a7a4a' : '#ffffff'; ?>; border-color: #5cb88a; position: relative; z-index: 1;"
                                        >
                                            <span style="font-size: 14px; font-weight: 600; color: <?php echo $index === 0 ? '#ffffff' : '#1a7a4a'; ?>;">
                                                <?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?>
                                            </span>
                                        </div>
                                    <?php endforeach; ?>

                                </div>
                            </div>
                        </div>

                        <!-- Right: Text content -->
                        <div class="flex flex-col gap-[40px] items-start w-[100%] lg:w-[45%] pl-[20px] lg:pl-[40px]">
                            <?php foreach ($key_points as $index => $point): ?>
                                <div 
                                    class="key-point-content text-[#1F1F1F] transition-all duration-300" 
                                    data-index="<?php echo $index; ?>"
                                    style="opacity: <?php echo $index === 0 ? '1' : '0.3'; ?>;"
                                >
                                    <h6 class="font-[700] text-display-20 lg:text-display-24 mb-[10px]"><?php echo $point['title']; ?></h6>
                                    <p class="text-display-14 lg:text-display-16 text-[#4a4a4a]"><?php echo $point['subtext']; ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>

                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const nodes = document.querySelectorAll('#consorInteractive .key-point-node');
    const images = document.querySelectorAll('#consorInteractive .image-wrapper');
    const contents = document.querySelectorAll('#consorInteractive .key-point-content');

    function setActive(index) {
        nodes.forEach((node, i) => {
            const label = node.querySelector('span');
            if (i === index) {
                node.style.backgroundColor = '#1a7a4a';
                node.style.borderColor = '#5cb88a';
                label.style.color = '#ffffff';
            } else {
                node.style.backgroundColor = '#ffffff';
                node.style.borderColor = '#5cb88a';
                label.style.color = '#1a7a4a';
            }
        });

        images.forEach((img, i) => {
            img.style.opacity = i === index ? '1' : '0';
        });

        contents.forEach((content, i) => {
            content.style.opacity = i === index ? '1' : '0.3';
        });
    }

    nodes.forEach((node) => {
        node.addEventListener('click', function () {
            const index = parseInt(this.getAttribute('data-index'));
            setActive(index);
        });
    });

    setActive(0);
});
</script>