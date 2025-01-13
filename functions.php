<?php

    add_action("wp_enqueue_scripts", "tailwind_theme_style");

    function tailwind_theme_style() {
        // wp_enqueue_style("tailwind_output_css", get_template_directory_uri()."/tailwind_output.css", array());
        wp_enqueue_style("main_style", get_stylesheet_uri());
        wp_enqueue_style("tailwind_output_css", get_theme_file_uri("/tailwind_output.css"));
        wp_enqueue_style("inter", "//fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap");
        wp_enqueue_style("cormorant-garamond", "//fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap");
        wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css' );

        wp_enqueue_script("searca_scripts", get_template_directory_uri()."/build/index.js", array(), "1.0");
        wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
        wp_enqueue_style('slick-theme-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css');
        // Enqueue Slick JS
        wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), null, true);
        // Enqueue custom JS to initialize the slider
        // wp_enqueue_script('custom-slick-init', get_template_directory_uri() . '/js/slick-init.js', array('jquery', 'slick-js'), null, true);
    }


    add_action('login_enqueue_scripts', 'loginStyle');

    function loginStyle() {
        wp_enqueue_style("main_style", get_stylesheet_uri()); 
        wp_enqueue_style("inter", "//fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap");

    }

    add_action("after_setup_theme", "searca_features");

    function searca_features() {
        // register_nav_menu("header_menu", "Header Menu");
        register_nav_menus(
            array(
                "header_menu" => "Header Menu",
                "footer_menu" => "Footer Menu",
            )
        );

        add_theme_support('tittle-tag');

        add_theme_support('post-thumbnails', array(
            'post',
            'page',
            'home-banner',
            'material-author',
            "thematic-area",
            'knowledge-management',
        ));

        add_theme_support('custom-logo', array(
            'height'               => 200,
            'width'                => 600,
            'flex-height'          => true,
            'flex-width'           => true,
            'header-text'          => array( 'site-title', 'site-description' ),
            'unlink-homepage-logo' => true,
        ));
    }


    add_action('init', 'add_custom_user_role');

    function add_custom_user_role() {
        add_role(
            'vip',
            'VIP', 
            [
                'read'           => true,
            ]
        );
    }

    add_action('init', 'handle_login');

    function handle_login() {
        if(isset($_POST['username']) && isset($_POST['password'])) {
            $user = wp_authenticate( $_POST['username'], $_POST['password'] );

            if(is_wp_error($user)) {
                // echo '<div class="flex w-[100%] justify-center">';
                // echo '<div class="relative font-600 text-[16px] z-[99] p-[20px] bg-[#ffffff] text-red-600">' . $user->get_error_message() . '</div>';
                // echo '</div>';

                wp_redirect(home_url("/login?error_login=true"));
            } else {
                wp_set_current_user($user->ID);
                wp_set_auth_cookie($user->ID);
                do_action('wp_login', $user->user_login, $user);

                wp_redirect(home_url("/"));

                exit;
            }
        }
    }


    add_action('init', 'email_verification_request');

    function email_verification_request() {

        if(isset($_POST['email_data'])) {
            $email = sanitize_email($_POST['email_data']);

            if(email_exists($email)) {
                // echo '<div>Username or Email already taken</div>';
                wp_redirect(home_url("/partnerships?error_registration=true"));
                exit;
            } else {
                if (!is_wp_error($user_id)) {
                    // Generate a unique token
                    $token = wp_generate_password(20, false);
                    $verification_link = home_url("/signup?token=$token&email=" . urlencode($email));
            
                    // Save the token in a transient or option (temporary storage)
                    set_transient("email_verification_$token", $email, 24 * HOUR_IN_SECONDS);
            
                    // Send verification email
                    $subject = "Verify Your Email Address";
                    $message = "Please verify your email by clicking the link below:\n$verification_link";
                    wp_mail($email, $subject, $message);

                    wp_redirect(home_url("/check-email"));
                    exit;
                } else {
                    echo '<div>An error occurred while creating the user.</div>';
                }   
            }
        }
    }

    // add_action('init', 'verify_email_and_redirect_to_registration');

    // function verify_email_and_redirect_to_registration() {
    //     if (isset($_GET['token']) && isset($_GET['email'])) {
    //         $token = sanitize_text_field($_GET['token']);
    //         $email = sanitize_email($_GET['email']);

    //         $saved_email = get_transient("email_verification_$token");

    //         if ($saved_email === $email) {
    //             // Token is valid; remove the token and redirect to registration page with email pre-filled
    //             delete_transient("email_verification_$token");
    //             wp_redirect(home_url("/complete-registration?email=" . urlencode($email)));
    //             exit;
    //         } else {
    //             echo '<div class="error">Invalid or expired verification link.</div>';
    //         }
    //     }
    // }


    // add_action('init', function() {
    //     if (!session_id()) {
    //         session_start();
    //     }
    // });


    add_action('init', 'register_form');

    function register_form() {

        if (isset($_POST['register_form_submitted']) && isset($_POST['username_value']) && isset($_POST['email_value']) && isset($_POST['password_value']) && isset($_POST['firstname_value']) && isset($_POST['lastname_value']) ){
            
            $firstname = sanitize_text_field($_POST['firstname_value']);
            $lastname = sanitize_text_field($_POST['lastname_value']);
            $email = sanitize_email($_POST['email_value']);
            $username = sanitize_user($_POST['username_value']);
            $password = $_POST['password_value'];

            if(username_exists($username) || email_exists($email)) {
                echo '<div>Username or Email already taken</div>';
            } else {
                $user_id = wp_create_user( $username, $password, $email );

                if (!is_wp_error($user_id)) {
                    wp_redirect(home_url("/registration-success"));
                    exit;
                } else {
                    echo '<div class="login-error">An error occurred while creating the user.</div>';
                }   
            }

            exit;
        }
    }

    

    add_action('wp_ajax_my_action', 'my_function');
    add_action('wp_ajax_nopriv_my_action', 'my_function');
    
    function my_function() {
        $data = $_POST['data'];
        wp_send_json_success($data);
    }


    add_shortcode('hero_banner_shortcode', 'hero_banner_shortcode_fn');
    
    function hero_banner_shortcode_fn() {
        ob_start();
    
        
        $home_banner = new WP_Query(array(
            'post_type' => 'home-banner',
            'posts_per_page' => 10,
        ));
        ?>
        
        <div class="bg-[#196129]">
            <div class="banner-slider">
                <?php if ($home_banner->have_posts()) : ?>
                    <?php while ($home_banner->have_posts()) : $home_banner->the_post(); ?>
                        <?php 
                            $banner_alignment = get_field('banner_alignment');
                            $thumbnail_url = has_post_thumbnail() ? get_the_post_thumbnail_url() : '';
                        ?>
                        <div class="slide-container">
                            <?php if ($thumbnail_url && $banner_alignment !== 'center-align') : ?>
                                <div class="<?php echo esc_attr($banner_alignment); ?> slide-content w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto relative">
                                    <div class="w-[100%] lg:w-[50%] text-container">
                                        <h1><?php the_title(); ?></h1>
                                        <div class="tracking-wide leading-relaxed">
                                            <?php the_content(); ?>
                                        </div>
                                    </div>
                                    <div class="w-[100%] lg:w-[50%] image-container">
                                        <div class="h-[200px] md:h-[320px] lg:h-[450px] rounded-lg overflow-hidden">
                                            <img class="w-full h-full object-cover" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>">
                                        </div>
                                    </div>
                                </div>
                            <?php elseif (!$thumbnail_url) : ?>
                                <div class="center-align slide-content h-[100%] w-[100%] relative">
                                    <div class="text-container w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto text-center z-[2]">
                                        <h1><?php the_title(); ?></h1>
                                        <div class="tracking-wide leading-relaxed">
                                            <?php the_content(); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="center-align slide-content h-[100%] w-[100%] relative">
                                    <div class="text-container w-[80%] sm:w-[640px] md:w-[768px] mx-auto text-center z-[2]">
                                        <h1><?php the_title(); ?></h1>
                                        <div class="tracking-wide leading-relaxed">
                                            <?php the_content(); ?>
                                        </div>
                                    </div>
                                    <div class="bg-black opacity-50 w-[100%] h-[100%] absolute top-0 left-0 z-[1]"></div>
                                    <img class="absolute w-full h-full object-cover" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>">
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php else : ?>
                    <p>No banners found.</p>
                <?php endif; ?>
            </div>
        </div>
        
        <?php
        return ob_get_clean();
    }


    add_shortcode('cadre_components_shortcode', 'cadre_components_shortcode_fn');

    function cadre_components_shortcode_fn() {
        ob_start();
        ?>
        <div class="py-[50px]">
            <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto">
                <div class="flex flex-col gap-[5px] items-center text-center w-[700px] mx-auto pb-[20px] md:pb-[40px]">
                    <div class="text-[22px] lg:text-[32px] font-[600]">
                        <h2>Components</h2>
                    </div>
                    <div class="font-light md:font-normal text-[12px] lg:text-[16px]">
                        <p class="font-[300]">Knowledge products by thematic areas from the research initiatives and various activities of SEARCA and its partners</p>
                    </div>
                </div>
                <div class="flex flex-wrap lg:flex-nowrap flex-col sm:flex-row justify-center items-start gap-[20px]">
                    <?php 
                    $thematic_areas = new WP_Query(array(
                        'post_type' => 'thematic-area',
                        'posts_per_page' => 10,
                    ));

                    if ($thematic_areas->have_posts()) {
                        while ($thematic_areas->have_posts()) {
                            $thematic_areas->the_post();

                            $logo_url = get_field('thematic_logo');
                            $card_color = get_field('thematic_color');
                            $aspiring_outcome = get_field('aspirational_outcome');
                    ?>
                    <!-- Card HTML -->
                    <div class="hidden sm:block h-[435px]">
                        <div style="background-color: <?php echo esc_attr($card_color); ?>" class="z-10 rounded-xl relative flex flex-col justify-between p-[20px] pb-[40px] h-[100%]">
                            <div class="flex flex-col">
                                <div class="flex justify-center z-10">
                                    <div class="rounded-full flex justify-between h-[80px] w-[80px]">
                                        <img class="w-[100%] h-[100%]" src="<?php echo esc_url($logo_url); ?>" alt="<?php the_title(); ?> logo">
                                    </div>
                                </div>
                                <div class="flex flex-col gap-[20px] items-center text-center w-[150px] xl:w-[200px] mx-auto">
                                    <div class="text-[12px] xl:text-[18px] font-bold pt-[10px] text-[#ffffff]">
                                        <h4><?php the_title(); ?></h4>
                                    </div>
                                    <div class="pt-[10px] font-extralight text-[10px] xl:text-[14px] text-[#ffffff]">
                                        <?php echo $aspiring_outcome; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-center text-white">
                                <a href="<?php echo get_permalink(get_the_ID()); ?>" class="rounded-lg border border-[1px] xl:border-2 border-white px-[10px] xl:px-[20px] py-[5px] xl:py-[10px] text-[12px] xl:text-[14px]">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <?php 
                        } 
                    } else {
                        echo '<p>No posts found.</p>';
                    } 
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

    add_shortcode('agpractices_shortcode', 'agpractices_shortcode_fn');
    
    function agpractices_shortcode_fn() {
        ob_start();
        $agpractices_brief_description = get_field("agpractices_brief_description");
        $agpractices_image = get_field("agpractices_image");
        $link_to_agpractices = get_field("link_to_agpractices");

        ?>
        <div class="bg-[#196129] pt-[80px] mt-[80px] relative overflow-hidden">
            <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto">
                <div class="flex justify-center gap-[60px] items-start">
                    <div class="w-[40%] pt-[50px] flex flex-col gap-[10px] text-left items-center mx-auto pb-[20px] md:pb-[40px]">
                        <div class="text-[#ffffff] w-[100%] text-[22px] lg:text-[32px] font-[600]">
                            <h2>AgPractices & Domains Platform</h2>
                        </div>
                        <div class="flex flex-col gap-[20px]">
                            <div class="text-[#ffffff] w-[100%] font-light md:font-normal text-[12px] lg:text-[16px]">
                                <p class="font-[300]"><?php echo $agpractices_brief_description ?></p>
                            </div>
                            <div class="w-[100%] flex justify-start text-left">
                                <a class="p-[20px] rounded-lg bg-[#F3BD1C] px-[35px] py-[10px]" href="<?php echo $link_to_agpractices ?>">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="w-[60%] overflow-hidden rounded-t-xl">
                        <div class="flex justify-center">
                            <img class="w-full h-full object-cover" src="<?php echo esc_url($agpractices_image) ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <img class="w-[100%] absolute opacity-[.09] top-[0]" src="https://bcsdevelopmentgator.site/wp-content/uploads/2024/10/20231125123019_mm_aung_chan_thar-766aa0f6.webp" alt="">
        </div>
        <?php
        return ob_get_clean();
    }


    add_shortcode('cop_shortcode', 'cop_shortcode_fn');
    
    function cop_shortcode_fn() {
        ob_start();
        
        $cop_image = get_field("cop_image");
        $cop_title = get_field("cop_title");
        $cop_description = get_field("cop_description");
        $cop_link = get_field("cop_link");

        ?>
        <div class="py-[100px]">
            <div class="sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto">
                <div class="flex gap-[40px] items-center">
                    <div class="w-[30%] rounded-lg overflow-hidden">
                        <img src="<?php echo esc_url($cop_image) ?>" alt="">
                    </div>
                    <div class="w-[50%] flex flex-col gap-[10px] text-left">
                        <h6 class="text-[24px] font-[600]">Join the Community</h6>
                        <p class="font-[300]">Built upon SEARCA's experiences and goals in developing and disseminating science-based information, the K-Hub aims to create a collaborative space for learning through this. The platform is set to be a system that produces a digital lifestyle, allowing its users to share and co-learn about each other's experiences in day-to-day operations.</p>
                        <a class="text-[#458753]" href="">Learn More</a>
                    </div>
                    <div class="w-[1px] h-[250px] bg-[#458753]"></div>
                    <div class="w-[20%] flex flex-col items-end gap-[5px] font-[600] text-center">
                        <a class="rounded-lg bg-[#F3BD1C] px-[35px] py-[10px] w-[100%]" href="<?php echo esc_url(get_permalink(416)) ?>">Log in</a>
                        <div class="flex gap-[10px] justify-center w-[100%]">
                            <span>or</span>
                            <a class="text-[#458753]" href="<?php echo esc_url(get_permalink(341)) ?>">Register for free</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }


    add_shortcode('knowledge_management', 'knowledge_management_fn');
    
    function knowledge_management_fn() {
        ob_start();
        
        $cop_image = get_field("cop_image");
        $cop_title = get_field("cop_title");
        $cop_description = get_field("cop_description");
        $cop_link = get_field("cop_link");

        ?>
        <div class="bg-[#FFFbf1] pt-[50px] pb-[150px]">
            <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto">
                <div class="w-[100%] flex justify-center items-center">
                    <h6 class="text-[24px] font-[600]">Knowledge Management</h6>
                </div>
                <div class="w-[720px] mx-auto flex justify-center text-center pt-[20px] font-[300]">
                    <p>Increased awareness and knowledge of its members, partners, and stakeholders on the most pressing issues and challenges faced by the agriculture sector.</p>
                </div>
                <div class="flex justify-center gap-[30px] py-[40px]">
                    <div class="w-[30%] mb-[10px] border-b-[1px] border-[#458753]">
                        <div class="">
                            <h6 class="font-[600]">Search by topic</h6>
                            <div class="flex mt-[10px] gap-[10px] justify-between bg-[#458753] px-[10px] py-[15px] items-center rounded-md overflow-hidden w-[100%]">
                                <input class="w-[100%] font-[300] text-[14px] text-[#458753] placeholder-[#458753] py-[2px] px-[5px] bg-[#ffffff] rounded-md" type="text" placeholder="Type a topic here...">
                            </div>
                        </div>
                        <div class="mt-[20px]">
                            <h6 class="font-[600]">Search by type</h6>
                            <div class="flex gap-[5px]">
                                <ul class="w-[50%] flex flex-col text-[14px] font-[300] mt-[10px]">
                                    <li class="text-[#196129] p-[5px] cursor-pointer">Books</li>
                                    <li class="text-[#196129] p-[5px] cursor-pointer">Briefs and Notes</li>
                                    <li class="text-[#196129] p-[5px] cursor-pointer">Discussion Papers</li>
                                    <li class="text-[#196129] p-[5px] cursor-pointer">Featured</li>
                                    <li class="text-[#196129] p-[5px] cursor-pointer">Monographs</li>
                                </ul>
                                <ul class="w-[50%] flex flex-col text-[14px] font-[300] mt-[10px]">
                                    <li class="text-[#196129] p-[5px] cursor-pointer">Proceedings and Workshop Reports</li>
                                    <li class="text-[#196129] p-[5px] cursor-pointer">Refereed Journal</li>
                                    <li class="text-[#196129] p-[5px] cursor-pointer">Videos</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="w-[100%] text-center font-[600]">
                            <p>Featured Resources</p>
                        </div>
                        <div class="flex justify-center gap-[30px] relative py-[10px] h-[345px]">
                            <?php 
                                $knowledge_management = new WP_Query(array(
                                    "post_type" => "knowledge-management",
                                    "tax_query" => array(
                                        array(
                                            "taxonomy" => "km_category",
                                            "field"    => "slug",
                                            "terms"    => "Featured",
                                        ),
                                    ),
                                ));

                                if ($knowledge_management->have_posts()) {
                                    while ($knowledge_management->have_posts()){
                                        $knowledge_management->the_post();
                            ?>
                                <div class="flex justify-start gap-[20px] w-[220px]">
                                    <div class="flex flex-col rounded-[15px] overflow-hidden group hover:shadow-md transition-all duration-200 ease cursor-pointer">
                                        <div class="h-[150px] relative bg-[#ffffff]">
                                            <div class="bg-black opacity-5 w-[100%] h-[100%] absolute top-0 left-0 z-10 group-hover:opacity-0 transition-all duration-200 ease"></div>
                                            <div class="w-[100%] h-[100%] absolute top-0 left-0">
                                                    <?php
                                                        if ( has_post_thumbnail() ) {
                                                            $thumbnail_url = get_the_post_thumbnail_url();
                                                    ?>
                                                        <img class="w-full h-full object-cover" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title(); ?>">
                                                    <?php
                                                        }
                                                    ?>
                                            </div>
                                        </div>
                                    <div class="flex flex-col justify-between h-[100%] bg-[#EAE9E5] group-hover:bg-[#FFF7E0] transition-all duration-200 ease pb-[20px]">
                                        <div class="px-[20px] py-[10px]">
                                            <div class="text-[14px] font-bold h-[40px]">
                                                <h4><?php the_title()?></h4>
                                            </div>
                                            <div class="pt-[10px] font-extralight text-[12px] h-[100px] overflow-hidden">
                                                <p><?php the_content()?></p>
                                            </div>
                                        </div>
                                        <div class="flex justify-center items-center text-[12px] w-[100%]">
                                            <a href="<?php echo get_permalink($learning_materials_id) ?>" class="text-[#196129] px-[8px] py-[5px] text-[14px]">View Now</a>  
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            <?php   }
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center w-[100%] text-center items-center">
                    <div class="w-[200px] p-[20px] rounded-lg bg-[#F3BD1C] px-[35px] py-[10px]">
                        <a href="https://bcsdevelopmentgator.site/knowledge-resources/">See More</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
    
    





    

    

    
