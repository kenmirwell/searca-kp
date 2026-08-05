<?php 
get_header();

while (have_posts()) {
    the_post();
?>
    <div class="pt-[30px] md:pt-[70px]">
        <?php get_template_part("includes/sections/single-insight-sections/hero"); ?>
        <div class="relative flex justify-between w-[90%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto gap-[100px]">
            <div class="w-[100%] lg:w-[80%] mb-[100px] pt-[40px]">
                <div>
                    <div id="key-policy-messages">
                        <?php get_template_part("includes/sections/single-insight-sections/bulleted-section"); ?>
                    </div>
                    <div id="introduction">
                        <?php get_template_part("includes/sections/single-insight-sections/Initialed-paragraph-section"); ?>
                    </div>
                    <div id="executive-summary">
                        <?php get_template_part("includes/sections/single-insight-sections/simple-text-section"); ?>
                    </div>
                    <div id="key-findings">
                        <?php get_template_part("includes/sections/single-insight-sections/key-findings"); ?>
                    </div>
                    <div id="what-it-means">
                        <?php get_template_part("includes/sections/single-insight-sections/findings-meaning"); ?>
                    </div>
                    <div id="policy-priorities">
                        <?php get_template_part("includes/sections/single-insight-sections/policy-priorities"); ?>
                    </div>
                    <div id="searca-contribution">
                        <?php get_template_part("includes/sections/single-insight-sections/searca-contribute"); ?>
                    </div>
                    <div id="conclusion">
                        <?php get_template_part("includes/sections/single-insight-sections/conclusion"); ?>
                    </div>
                    <div id="decision-maker-insights">
                        <?php get_template_part("includes/sections/single-insight-sections/policy-insights"); ?>
                    </div>
                    <div id="summary">
                        <?php get_template_part("includes/sections/single-insight-sections/summary"); ?>
                    </div>
                    <div id="references">
                        <?php get_template_part("includes/sections/single-insight-sections/references"); ?>
                    </div>
                </div>
            </div>
            <div class="hidden lg:block w-[20%] sticky h-fit top-0 pt-[40px] pb-[40px]">
                <?php get_template_part("includes/sections/single-insight-sections/right-side-bar"); ?>
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
