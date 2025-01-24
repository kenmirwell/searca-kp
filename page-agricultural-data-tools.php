<?php 
    get_header();

    while (have_posts()) {
        the_post();
?>
    <div>
        <div class="bg-[#196129]">
            <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto py-[50px] font-light">
                <div>
                    <div class="flex gap-[5px] text-[#ffffff] text-[14px] font-extralight">
                        <p class="cursor-pointer"><a href="/">Home |</a></p>
                        <p class="cursor-pointer"><?php the_title()?></p>
                    </div>
                    <div class="border-b-[1px] border-[#F7D671] text-[#F7D671] text-[45px] pb-[20px] my-[20px]">
                        <h1>AgPractices & Domain</h1>
                    </div>
                    <div class="text-[16px] font-extralight flex gap-[20px] text-[#ffffff]">
                        <div class="component-banner-description">
                            <p>An Integrative System of Information and Modelling for Recommendations Domains of Agricultural Best Management Practices and Technologies</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="sm:w-[640px] md:w-[768px] lg:w-[980px] mx-auto py-[50px]">
                <div class="pt-[20px]">
                    <div>
                        <h6 class="text-[24px]">Background</h6>
                    </div>
                    <div class="pt-[10px] font-[300]">
                        <p>Food and nutrition security in Southeast Asian countries still relies mostly in small-scale farming systems that are in vulnerable areas and prone to various abiotic and biotic stresses. Biotic stress management remains to be one of the main challenges for researchers as it requires combination of accurate estimates of production and seasonal attainable yields to the complex spatial interaction of pest and disease between fields at farm and landscape level. Modelling is a useful research tool that can help research to detangle key determinants of productivity under stresses. It supports decision making tool models to generate valuable specific information to improve farming systems productivity and its impact at different scale from the field, to the region, and to the country. The project hopes to bring together four (4) research and education institutes from Southeast Asia and the Pacific to demonstrate the potential of data generation through modelling platform. It envisions to build the capacity of agriculture researchers in using data from different sources, and in providing access to modelling and data analytics tools. Moreover, the project focuses on the development of a tool called AgPractices&Domains that aims to target integrated pest and disease management options in rice-based cropping systems. Researchers and students will be engaged through workshops and webinars on data modelling, data analytics tools, and on the use of AgPractices&Domains platform.</p>
                        <p>In partnership with the Southeast Asian Regional Center for Graduate Study and Research in Agriculture (SEARCA), and the local partner universities from Myanmar (University of Computer Sciences Yangon, UCSY) and Philippines (University of the Philippines Los Baños, UPLB), the project will develop cloud-based AgPractices&Domains platform for network of researchers that can carry out rice cropping systems monitoring and evaluation with the use of combined survey and data modelling tools as well as provide a community of practice that will facilitate learning and exchanges between partners and countries of the project. The platform targets to reach at least 50 direct users and potential trainers who will support network of users in their respective institute, and around 200 users accessing the platform. The AgPractices&Domains platform will strengthen the National Research and Education Networks' (NRENs) Asi@Connect as well as accelerate information dissemination in the region that supports R&D for rice crop farmers' adaptation to climate variability, and promotion of integrated pest and disease management.</p>
                    </div>
                </div>
                <div class="pt-[20px]">
                    <div>
                        <h6 class="text-[24px]">Objectives</h6>
                    </div>
                    <div class="pt-[10px] font-[300]">
                        <p>Food and nutrition security in Southeast Asian countries still relies mostly in small-scale farming systems that are in vulnerable areas and prone to various abiotic and biotic stresses. Biotic stress management remains to be one of the main challenges for researchers as it requires combination of accurate estimates of production and seasonal attainable yields to the complex spatial interaction of pest and disease between fields at farm and landscape level. Modelling is a useful research tool that can help research to detangle key determinants of productivity under stresses. It supports decision making tool models to generate valuable specific information to improve farming systems productivity and its impact at different scale from the field, to the region, and to the country. The project hopes to bring together four (4) research and education institutes from Southeast Asia and the Pacific to demonstrate the potential of data generation through modelling platform. It envisions to build the capacity of agriculture researchers in using data from different sources, and in providing access to modelling and data analytics tools. Moreover, the project focuses on the development of a tool called AgPractices&Domains that aims to target integrated pest and disease management options in rice-based cropping systems. Researchers and students will be engaged through workshops and webinars on data modelling, data analytics tools, and on the use of AgPractices&Domains platform.</p>
                    </div>
                    <ul class="pt-[10px] numbered font-[300]">
                        <li>develop the AgPractices&Domains platform that will serve as a web portal of data sharing and access, and data product delivery to support valuation of the impacts of practices, changes in managing risks, and in defining domains where these risks are of high priorities and require closed monitoring;</li>
                        <li>train researchers on data modelling and on the use of data analytics tools that will allow them to define target domains and combinations of locally adapted technologies. The platform targets to reach at least 50 direct users and potential trainers who will support network of users in their respective institute, and around 200 users accessing the platform; and</li>
                        <li>facilitate the development of technologies and options for improving productivity and reducing biotic and abiotic risks associated with climate variability in rice-based food systems. The data generated through the platform on target areas with high risk of pest and disease will enable the researchers to improve their efficiency in monitoring and evaluating the risks. It likewise provides options that would help in minimizing the risk. Farms survey will also be conducted using the targeted location at high risk considering current and optimum practices generated by the platform.</li>
                    </ul>
                </div>
                <div class="pt-[20px]">
                    <div>
                        <h6 class="text-[24px]">Details of Programs/Activities</h6>
                    </div>
                    <ul class="pt-[10px] bulleted font-[300]">
                        <li><strong class="font-[600]">Kick-Off Workshops on Data Collection and Management:</strong> In collaboration with project partners, the workshops are designed to define how to source, store, and process data that will be used for the development of the platform. These data include observed climatic data, existing rice cropping systems survey including field location, sowing windows, harvesting, nutrient and water management, pest and disease incidence, and management and yield. Participants of these workshops are university researchers and students from partner universities in Myanmar and Philippines, as well as from selected countries in the SEA region. SEARCA and UPLB will be hosting the kick-off workshops.</li>
                        <li><strong class="font-[600]">Training on Data Analytics and Modelling for Initial Target Users:</strong> This features a prototype platform developed through Shiny R app with focus on climatic risks and using the work developed by Radanielson et al. (2019). The prototype serves as basis for UCSY and USQ's development of a web application that account for pest and disease risk evaluation.</li>
                        <li><strong class="font-[600]">Development of Web Application for Pest and Risk Evaluation:</strong> The platform's interface and database structure shall be done during the first semester of the project.</li>
                        <li><strong class="font-[600]">Consultation Webinar for the Tool Applications and Use:</strong> The webinar, to be hosted by UCSY and broadcasted with SEARCA and UPLB, targets participants from partner universities from Myanmar and Philippines, and other selected countries in the region under SEARCA's network.</li>
                        <li><strong class="font-[600]">Series of AgPractices&Domains Platform's Workshops and Training Programs:</strong> The series of activities include hands-on training on the use of the platform, and the interpretation and dissemination of its outputs at different levels: education- policy planning- extensions agronomists.</li>
                        <li><strong class="font-[600]">Teleconference-Workshop on Platform's Learning and Evaluation Reporting:</strong> This includes presentation on the development of sustainability plan and application upgrade for AgPractices&Domains platform as well as evaluation reporting with Asi@Connet project reviewers' team. The teleconference-workshop shall be done towards the last 4-months of the project.</li>
                    </ul>
                </div>
                <div class="pt-[20px]">
                    <div>
                        <h6 class="text-[24px]">Deliverables</h6>
                    </div>
                    <div class="pt-[10px] font-[300]">
                        <p>Generally, the AgPractices&Domains platform will serve as an application will help researchers to collect data on rice cropping systems, and access modelling and data analytics tools to estimate climatic and pest and disease risk. Moreover, it will act as a one stop shop for researchers in the evaluation of the impacts of practices, changes in managing risks, and in defining domains where these risks are of high priorities and require closed monitoring.</p>
                    </div>
                    <div class="pt-[10px] font-[300]">
                        <p>The application will have two panels for inputs and outputs.</p>
                    </div>
                    <ul class="pt-[10px] bulleted font-[300]">
                        <li><strong class="font-[600]">INPUTS:</strong> (1) areas of target, seasons, and selection of research interest to generate survey template for current simulations and predictions validation; and (2) uploaded survey data that includes field monitored coordinate, sowing date, variety, growth duration, harvesting date, yield, N management, water management, pest and disease management, pest and disease observation, and optionally upload of field infestation and photos.</li>
                        <li><strong class="font-[600]">OUTPUTS:</strong> (1) distribution productivity across three dates with no disease incidence evaluation and the risk level of disease incidence across three dates; and 2) recommendations for monitoring plan, and survey template for field data collection allowing current simulations and predictions validation.</li>
                    </ul>
                    <div class="pt-[10px] font-[300]">
                        <p>The key deliverables of the project are as follows:</p>
                    </div>
                    <ul class="pt-[10px] bulleted font-[300]">
                        <li>A cloud-based platform called AgPractices&Domains using a scalable approach for integration of agricultural data into modelling. AgPractices&Domains platform will serve as portal for collaboration that will enable digital documentation of data collection for pest and disease and a harmonization of data labelling and analysis.</li>
                        <li>E-learning materials as handouts in the use and the application of the tool. These materials are in the form of online modules.</li>
                        <li>A report on potential sustainability plan in the future development and scaling of the application will be also developed as outputs of the application online feedback consultation carried out at the end of the project.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php 
    }
    get_footer()
?>

