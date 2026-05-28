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

                            <!-- Outer wrapper -->
                            <div class="relative flex-shrink-0" style="width: 480px; height: 480px;">

                                <!-- Circle image -->
                                <div class="absolute rounded-full overflow-hidden z-[9]" style="left: -80px; top: 0; width: 480px; height: 480px;">
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

                                <!-- Circle SVG outline -->
                                <svg style="position: absolute; top: 0; transform: translateX(-20%); height: 100%; overflow: visible;" width="716" height="678" viewBox="0 0 716 678" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M358 1C555.198 1 715 155.494 715 346C715 536.506 555.198 691 358 691C160.802 691 1 536.506 1 346C1 155.494 160.802 1 358 1Z" stroke="#A7D5CC" stroke-width="2"/>
                                </svg>

                                <!-- Nodes on circle arc -->
                                <?php 
                                    $circle_cx = 330;
                                    $circle_cy = 240;
                                    $circle_r  = 240;
                                    $angles    = [-50, 0, 50];
                                    foreach ($key_points as $index => $point):
                                        $angle_rad = deg2rad($angles[$index]);
                                        $x = $circle_cx + $circle_r * cos($angle_rad) - 80 - 26;
                                        $y = $circle_cy + $circle_r * sin($angle_rad);
                                ?>
                                    <div 
                                        class="key-point-node cursor-pointer flex items-center justify-center rounded-full border-[2px] transition-all duration-300"
                                        data-index="<?php echo $index; ?>"
                                        style="
                                            position: absolute;
                                            width: 52px; 
                                            height: 52px; 
                                            left: <?php echo $x; ?>px;
                                            top: <?php echo $y; ?>px;
                                            transform: translate(-50%, -50%);
                                            background-color: <?php echo $index === 0 ? '#1a7a4a' : '#ffffff'; ?>; 
                                            border-color: #5cb88a; 
                                            z-index: 11;
                                        "
                                    >
                                        <span style="font-size: 14px; font-weight: 600; color: <?php echo $index === 0 ? '#ffffff' : '#1a7a4a'; ?>;">
                                            <?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?>
                                        </span>
                                    </div>
                                <?php endforeach; ?>

                            </div>
                        </div>

                        <!-- Right: Text content -->
                        <div class="items-start w-[100%] lg:w-[45%] pl-[20px] lg:pl-[40px]" style="position: relative; min-height: 480px;">
                            <?php foreach ($key_points as $index => $point): ?>
                                <div 
                                    class="key-point-content text-[#1F1F1F] transition-all duration-300" 
                                    data-index="<?php echo $index; ?>"
                                    style="position: absolute !important; width: 80%; opacity: <?php echo $index === 0 ? '1' : '0.3'; ?>;"
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

    function alignContent() {
        const containerRect = contents[0].parentElement.getBoundingClientRect();
        const rightColRect = contents[0].parentElement.getBoundingClientRect();

        nodes.forEach((node, i) => {
            const content = contents[i];
            if (content) {
                const nodeRect = node.getBoundingClientRect();
                
                // Vertical: center content with node
                const nodeTop = (nodeRect.top + window.scrollY) - (containerRect.top + window.scrollY) + (nodeRect.height / 2);
                
                // Horizontal: offset from node's right edge
                const nodeLeft = (nodeRect.left + window.scrollX) - (rightColRect.left + window.scrollX) + nodeRect.width + 20;

                content.style.top = nodeTop + 'px';
                content.style.left = nodeLeft + 'px';
                content.style.transform = 'translateY(-50%)';
                content.style.width = (rightColRect.width - nodeLeft) + 'px';
            }
        });
    }

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
    setTimeout(alignContent, 100);
    window.addEventListener('resize', alignContent);
    window.addEventListener('scroll', alignContent);
});
</script>