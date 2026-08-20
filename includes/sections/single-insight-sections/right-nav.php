<?php
if (!function_exists('find_section_blocks')) {
    function find_section_blocks($blocks) {
        $sections = [];
        foreach ($blocks as $block) {
            if ($block['blockName'] === 'acf/section-name') {
                $sections[] = $block;
            }
            if (!empty($block['innerBlocks'])) {
                $sections = array_merge($sections, find_section_blocks($block['innerBlocks']));
            }
        }
        return $sections;
    }
}

$raw_content = get_post_field('post_content', get_the_ID());
$blocks = parse_blocks($raw_content);
$section_blocks = find_section_blocks($blocks);
?>

<style>
    .toc-item {
        transition: border-color 0.2s ease, color 0.2s ease;
    }
    .toc-item.active {
        border-left-color: #008C67;
        color: #008C67;
        font-weight: 600;
    }
    .toc-item.active .toc-link {
        color: #008C67;
    }
</style>

<div class="">
    <div>
        <div class="pb-[20px]">
            <p>ON THIS PAGE</p>
        </div>
        <ul class="font-light">
            <?php foreach ($section_blocks as $block) : 
                $section_name = $block['attrs']['data']['section_name'] ?? '';
                $section_id   = $section_name ? sanitize_title($section_name) : '';
            ?>
                <?php if ($section_name) : ?>
                    <li class="toc-item font-light pl-[20px] py-[10px] border-l-[2px] border-[#D9D9D9]">
                        <a href="#<?php echo esc_attr($section_id); ?>" 
                           class="toc-link" 
                           data-target="<?php echo esc_attr($section_id); ?>">
                            <?php echo esc_html($section_name); ?>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const tocLinks = document.querySelectorAll('.toc-link');
    if (!tocLinks.length) return;

    const sections = Array.from(tocLinks)
        .map(link => document.getElementById(link.dataset.target))
        .filter(Boolean);

    tocLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.getElementById(this.dataset.target);
            if (!target) return;
            const yOffset = -30;
            const y = target.getBoundingClientRect().top + window.pageYOffset + yOffset;
            window.scrollTo({ top: y, behavior: 'smooth' });
        });
    });

    const setActive = (id) => {
        tocLinks.forEach(link => {
            const item = link.closest('.toc-item');
            if (!item) return;
            item.classList.toggle('active', link.dataset.target === id);
        });
    };

    const triggerOffset = window.innerHeight * 0.2;

    function updateActiveSection() {
        let currentId = null;
        for (const section of sections) {
            const rect = section.getBoundingClientRect();
            if (rect.top <= triggerOffset) {
                currentId = section.id;
            }
        }
        if (currentId) {
            setActive(currentId);
        }
    }

    let ticking = false;
    window.addEventListener('scroll', function () {
        if (!ticking) {
            requestAnimationFrame(function () {
                updateActiveSection();
                ticking = false;
            });
            ticking = true;
        }
    });

    updateActiveSection();
});
</script>