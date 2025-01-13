<?php 
    get_header();

    while (have_posts()) {
        the_post();

        $aspiring_outcome = get_field("aspiring_outcome");

        $expected_output = get_field("expected_output");
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
                        <h1 class="cursor-pointer"><?php the_title() ?></h1>
                    </div>
                    <div class="text-[16px] font-extralight flex gap-[20px] text-[#ffffff]">
                        <div class="component-banner-description w-[50%]">
                            <?php the_content() ?>
                        </div>
                        <div class="w-[50%]">
                            <div class="">
                                <p><span class="font-[600]">Expected Output: </span><?php echo $expected_output ?></p>
                            </div>
                            <div class="pt-[20px]">
                                <p> <span class="font-[600]">Aspiring Outcome: </span><?php echo $aspiring_outcome ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sm:w-[640px] md:w-[768px] lg:w-[980px] mx-auto py-[50px]">
            <div>
                <div class="flex justify-center">
                    <h1 class="text-[32px]">SFRT: Seed Fund for Research and Training</h1>
                </div>
                <div class="pt-[10px]">
                    <p>The Southeast Asian (SEA) region has a number of promising researchers and scientists whose desire to contribute to the region's development through research and knowledge dissemination initiatives is hindered by lack of funds. This situation serves as a barrier to translating promising research and training into scientific outputs that could be applied to promote development. To address this concern and in line with the Center's thrust of promoting, undertaking, and coordinating research programs relevant to accelerating transformation through agricultural innovation of the region, SEARCA will dedicate funds to be known as the SEARCA Seed Fund for Research and Training (SFRT). The SFRT is envisaged to provide chosen research and training project proposals with limited start-up funds intended to enhance chances of securing long-term support from donor agencies. A grant of up to USD 15,000 shall be awarded as seed fund for research/training.</p>
                </div>
            </div>
            <div class="pt-[20px]">
                <div>
                    <h6 class="text-[24px]">Objectives</h6>
                </div>
                <ul class="pt-[10px] check-list font-[300]">
                    <li>SFRT aims to provide start-up funds to researchers and scientists who can make significant contributions to the development of the region but lack the funds to carry out their projects.</li>
                    <li>It intends to build capacities of researchers to develop research proposals and conduct the research, mindful of inherent technical, financial, and administrative responsibilities of such an undertaking.</li>
                    <li>It seeks to expand SEARCA's reach in terms of research, capacity building, and contribution to the body of knowledge on ATTAIN in the region.</li>
                </ul>
            </div>
            <div class="pt-[20px]">
                <div>
                    <h6 class="text-[24px]">Proponent Qualifications</h6>
                </div>
                <div class="pt-[10px] font-[300]">
                    <div class="pt-[10px]">
                        <p>The proponent should be a Southeast Asian national who is a graduate of at least a four-year degree course, with limited research/training start-up funds.</p>
                    </div>
                    <div class="pt-[10px]">
                        <p><strong>Priority 1.</strong> Southeast Asian nationals who are alumni of SEARCA Graduate Scholarship, faculty, and staff in any of the member universities under the Southeast Asian University Consortium for Graduate Education in Agriculture and Natural Resources (UC), and SEARCA's Institutional Development Assistance (IDA).</p>
                    </div>
                    <div class="pt-[10px]">
                        <p><strong>Priority 2.</strong> Southeast Asian nationals who are regular staff members of government agencies or non-profit development-oriented institutions, and/or faculty and staff of agricultural universities outside of UC.</p>
                    </div>
                </div>
            </div>
            <div class="pt-[20px]">
                <div class="text-[24px]">
                    <h6>Project Eligibility</h6>
                </div>
                <div class="pt-[10px] font-[300]">
                    <p>The topic of the project proposal must be aligned with SEARCA's overarching theme of Accelerating Transformation Through Agricultural Innovation (ATTAIN). Moreover, priority research topics must fall within the ATTAIN priority areas:</p>
                </div>
                <ul class="pt-[10px] arrowed-list font-[300]">
                    <li>Agri-Business Models for Increased Productivity and Income</li>
                    <li>Sustainable Farming Systems and Natural Resource Management</li>
                    <li>Food and Nutrition Security</li>
                    <li>Transformational Leadership for Agricultural and Rural Development (ARD)</li>
                    <li>Gender and Youth Engagement in ARD</li>
                    <li>Enhanced ARD towards Climate Resilience</li>
                    <li>EcoHealth/One Health Applications to ARD</li>
                </ul>
            </div>
            <div class="pt-[20px]">
                <div>
                    <h6 class="text-[24px]">Features</h6>
                </div>
                <div class="pt-[10px] font-[300]">
                    <p>The proposed project should satisfy all of the following:</p>
                </div>
                <ul class="pt-[10px] check-list font-[300]">
                    <li>Innovative and is accompanied by an appropriate plan for developing it into a potentially large-scale research/training program greatly relevant to the agricultural and rural development needs of the region;</li>
                    <li>Has strong potential for generating significant long-term funding support;</li>
                    <li>Can be completed within a period not exceeding one year;</li>
                    <li>With detailed plans for generating future funding support; and</li>
                    <li>Specifies a plan for dissemination of results, including policy recommendations, to various stakeholders in modes deemed appropriate.</li>
                </ul>
            </div>
            <div class="pt-[20px]">
                <h6 class="text-[24px]">Output</h6>
                <div class="pt-[10px] font-[300]">
                    <p>The proposed project should be able to generate:</p>
                </div>
                <ul class="pt-[10px] arrowed-list font-[300]">
                    <li>At least one policy brief (following the prescribed format)</li>
                    <li>A final research report which can be published as a technical paper, as determined by the technical reviewer</li>
                    <li>When possible, presentation of research results in at least one scientific forum/conference</li>
                </ul>
            </div>
            <div class="pt-[20px]">
                <h6 class="text-[24px]">Re-Applying Grantees</h6>
                <div class="pt-[10px] font-[300]">
                    <p>Previous grantees may re-apply provided that their last SFRT grant has been completed and not within the preceding two years.</p>
                </div>
            </div>
            <div class="pt-[20px]">
                <div>
                    <h6 class="text-[24px]">Proposal Submission</h6>
                </div>
                <div class="pt-[10px] font-[300]">
                    <p>New applicants must register through the Grants Information System to create an account. Once registered, fill out the online form and upload a copy of all required documents.</p>
                </div>
                <div class="pt-[10px] font-[300]">
                    <p>The required documents to be submitted should be in English:</p>
                </div>
                <ul class="pt-[10px] numbered-list font-[300]">
                    <li>Letter of request which should be addressed to the SEARCA Director;</li>
                    <li>Official endorsement from the employer (if employed);</li>
                    <li>Budgetary requirement for the entire project proposal;</li>
                    <li>Letter from the applicant certifying that he/she is not receiving any other research grant from any other institution. If partial funding has been obtained from other sources, the applicant must submit a certification from the funding agency indicating the grant amount and items covered by the grant, as well as proof that there will be no conflict with the funding agency when applying for another funding; and</li>
                    <li>Research timetable indicating the activities involved in the research and the expected date of completion which should not exceed one year.</li>
                </ul>
                <div class="pt-[10px] font-[300]">
                    <p>You may download the guidelines on proposal format and required documents (PDF) here.</p>
                </div>
                <div class="pt-[10px] font-[300]">
                    <p>In the event that a problem is encountered in uploading the proposal, please notify the SFRT secretariat through the sfrt@searca.org. Only proposals with complete requirements and successfully submitted through the Grants Information System, will be accepted for evaluation.</p>
                </div>
            </div>
        </div>
    </div>
<?php 
    }
    get_footer()
?>