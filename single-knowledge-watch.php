<?php 
get_header();

while (have_posts()) {
    the_post();
?>
    <style>
    .toc-link {
        color: #8A8A8A;
        text-decoration: none;
        display: block;
        transition: color 0.2s ease;
    }

    .toc-item {
        transition: border-color 0.2s ease;
    }

    .toc-item.active {
        border-color: #BE9D38;
    }

    .toc-item.active .toc-link {
        color: #BE9D38;
        font-weight: 600;
    }
    </style>

    <div class="pt-[30px] md:pt-[70px]">
        <?php get_template_part("includes/sections/single-knowledge-watch-sections/hero"); ?>
        <div class="relative flex justify-between sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto gap-[100px]">
            <div class="w-[80%] mb-[100px] pt-[40px]">
                <div class="">
                    <?php if (have_rows('flexicon_section_repeater')) : ?>
                        <div class="flex flex-col justify-between gap-[20px]">
                            <?php while (have_rows('flexicon_section_repeater')) : the_row(); ?>
                                <?php $section_id = get_sub_field('id'); ?>
                                <div id="<?php echo esc_attr($section_id); ?>">
                                    <?php get_template_part("includes/sections/single-knowledge-watch-sections/introduction"); ?>
                                    <?php get_template_part("includes/sections/single-knowledge-watch-sections/1st-topic"); ?>
                                    <?php get_template_part("includes/sections/single-knowledge-watch-sections/2nd-topic"); ?>
                                    <?php get_template_part("includes/sections/single-knowledge-watch-sections/3rd-topic"); ?>
                                    <?php get_template_part("includes/sections/single-knowledge-watch-sections/4th-topic"); ?>
                                    <?php get_template_part("includes/sections/single-knowledge-watch-sections/5th-topic"); ?>
                                    <?php get_template_part("includes/sections/single-knowledge-watch-sections/summary"); ?>
                                    <?php get_template_part("includes/sections/single-knowledge-watch-sections/reference"); ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="w-[20%] sticky h-fit top-0 pt-[40px] pb-[40px]">
                <?php get_template_part("includes/sections/single-knowledge-watch-sections/right-side-bar"); ?>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const tocLinks = document.querySelectorAll('.toc-link');
        if (!tocLinks.length) return; // no TOC on this page, bail early

        const sections = Array.from(tocLinks)
            .map(link => document.getElementById(link.dataset.target))
            .filter(Boolean); // drop any links whose target id doesn't exist in the DOM

        // --- Smooth scroll on click ---
        tocLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.getElementById(this.dataset.target);
                if (!target) return;

                const yOffset = -30; // adjust if you have a fixed header overlapping content
                const y = target.getBoundingClientRect().top + window.pageYOffset + yOffset;
                window.scrollTo({ top: y, behavior: 'smooth' });
            });
        });

        // --- Scrollspy: highlight the active <li> as sections enter view ---
        const setActive = (id) => {
            tocLinks.forEach(link => {
                const item = link.closest('.toc-item');
                if (!item) return;
                item.classList.toggle('active', link.dataset.target === id);
            });
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    setActive(entry.target.id);
                }
            });
        }, {
            root: null,
            rootMargin: '-20% 0px -70% 0px', // section counts as "active" once it reaches the top third of viewport
            threshold: 0
        });

        sections.forEach(section => observer.observe(section));
    });
    </script>
<?php 
}
get_footer();
?>