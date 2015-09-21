@extends('web.layouts.main')

@section('content')

    <!-- ASSESSMENT-->
    <div class="overlay menu-overlay in">
        <button class="sub close-btn">✕</button>

        <div class="share">
            <div class="share-copy">
                <h5>Save the life of somebody you love. Tell them to complete this experience too.</h5>
            </div>
            <div class="share-btn-wrapper">
                <button class="share-btn"><a href="https://twitter.com/intent/tweet?text=Check+out+Bright+Pink%27s+%23AssessYourRisk+tool+to+assess+and+reduce+your+risk+for+breast+and+ovarian+cancer.+AssessYourRisk.org" target="_blank"><img src="img/twitter.png"></a><a href="#/assessment" onclick="fb_share('http://www.assessyourrisk.org', 'Assess Your Risk', '1 in 8 women will develop breast cancer in their lifetime. 1 in 67 will develop ovarian cancer. Bright Pink created a tool to help you assess you personal level of risk for breast and ovarian cancer and reduce your chances of being that 1. Learn more and #AssessYourRisk!', 'http://www.assessyourrisk.org/img/fb-share.png', 520, 350)"><img src="img/facebook.png"></a><a href="mailto:name@email.com?subject=Bright Pink Risk Assessment: 5 Minutes Could Save Your Life&body=Hi,
%0D%0A
%0D%0A
I want to share something important with you.
%0D%0A
%0D%0A
Bright Pink—a non-profit organization focused on saving women’s lives from breast and ovarian cancer—created a tool that will help you assess your personal level of risk for these cancers.  By looking at your health and family history alongside some of your lifestyle choices, you will not only learn about your risk, but also about the actions you can take to reduce it.
%0D%0A
%0D%0A
1 in 8 women will develop breast cancer at some point in her lifetime.  Please consider assessing your own level of risk by checking out the tool at AssessYourRisk.org." target="_blank" class="mail-icon"><img src="img/mail.png"></a>SHARE</button>
            </div>
        </div>


        <div class="results" style="display: block;">
            <div class="your-risk">
                <!-- Chart - Removed -->
                <!--           <div class="progress-result">
                            <div class="percentage percquiz"></div>
                            <div class="chart chart-4"></div>
                          </div> -->
                <!-- <div class='section-title'>Assessment</div> -->
                <!-- Insert the TRIGGERED Text Div -->
                <h2>Your Baseline Risk is <span class="risk-level">Increased</span></h2>
            </div>
            <div class="paragraph-wrapper">
                <div class="paragraph-box">

                    <!-- Average -->
                    <div class="results-copy-average">
                        <!-- paragraph-one (left) -->
                        <div class="column">
                            <h3 class="column-header">Understanding Your Baseline Risk</h3>
                            <p>Your answers suggest that you are at <a href="http://www.brightpink.org/what-you-need-to-know/understand-risk/" target="_blank">average baseline risk</a> for breast and ovarian cancer, just like the majority of women in the general population.
                                This means you have a 12% chance of getting breast cancer—that’s one in eight women—and a 1.5% chance of getting ovarian cancer.
                                75% of all breast and ovarian cancers are diagnosed in average risk women, so being proactive about <a href="http://www.brightpink.org/what-you-need-to-know/reduce-your-risk/" target="_blank">risk-reduction</a> and <a href="http://www.brightpink.org/what-you-need-to-know/early-detection/" target="_blank">early detection</a> is still important.
                            </p>
                            <div class="more-results">
                                <div class="triggered-cancer-copy average showable">
                                    <h5 class="column-header pink-text">Since You've Been Diagnosed With Breast or Ovarian Cancer:</h5>
                                    <p>
                                        It may seem like being at “average risk” when you’ve already been diagnosed with breast or ovarian cancer seems strange, but as noted above, the majority of breast and ovarian cancers are diagnosed in women with average risk.
                                        The information below may be less relevant to you now, post-diagnosis, but we still recommend bringing it to your doctor to discuss which strategies you should still incorporate (most of these recommendations are good to keep in mind for general health anyway).
                                        <b>And the most important thing we can recommend is talking to your doctor or a genetic counselor about pursing genetic testing, if you haven’t already had it.</b>
                                        This testing will help determine if your cancer was likely the result of a gene mutation.
                                        If it was, your baseline risk is actually higher than average and you will need to discuss enhanced risk management strategies with your doctor.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- paragraph-two (right) -->
                        <div class="column">
                            <h3 class="column-header">What To Do Now</h3>
                            <p>
                                First, review the section below to better understand which of your lifestyle choices could be negatively affecting your risk.
                                Gene mutations are funny things—no one really knows what “flips the switch” and causes cancer to develop.
                                The good news is that taking steps to reduce or eliminate modifiable risk factors may help reduce the likelihood of that switch flipping.
                                You can learn more about <a href="http://www.brightpink.org/what-you-need-to-know/reduce-your-risk/" target="_blank">lifestyle risk-reduction</a> strategies on our website.
                            </p>
                            <p class="more-results">
                                In addition to finding out more about <a href="" target="_blank">risk-reduction</a> and <a href="" target="_blank">early detection</a>, we also encourage you to print out these results or let us email them to you so that you can take them to your doctor and discuss creating a risk-reduction and early detection strategy together.
                            </p>
                            <div class="read-more-box">
                                <a href="#/assessment" class="read-more">Read More</a>
                            </div>
                        </div>
                    </div>

                    <!-- Increased (Moderate) -->
                    <div class="results-copy-moderate on">
                        <h5 class="warning-header pink-text">There is potential that you may be High Risk. Read on.</h5>
                        <div class="column">
                            <!-- paragraph-one (left) -->
                            <h3>Understanding Your Baseline Risk</h3>
                            <p>
                                Your answers suggest that you are at <a href="http://www.brightpink.org/what-you-need-to-know/understand-risk/#understanding-increased-risk" target="_blank">increased baseline risk</a> for breast and ovarian cancer,
                                either because of a <a href="http://www.brightpink.org/what-you-need-to-know/collect-your-family-history/" target="_blank">family history</a> of one of these cancers, some significant event in your personal health history,
                                or because you or a family member has been diagnosed with a specific type of gene mutation associated with an increased risk of breast or ovarian cancer.
                                If you have not already pursued genetic testing, we highly recommend that you talk with your doctor or a genetic counselor about whether your personal circumstances warrant it, to <b>confirm that your baseline risk truly is only increased, and not actually high</b>.
                                If you are at high risk, you will need to discuss enhanced risk management strategies with your doctor.
                            </p>

                            <div class="more-results">
                                <p>
                                    Being at increased risk means that you have up to a 25% chance of developing breast cancer and up to a 5.5% chance of ovarian cancer at some point in your lifetime.
                                    These percentages mean that your risk for both cancers is more than twice that of women in the general population, which is significant.
                                    It’s a great thing that you’ve identified this risk and are here learning more about the <a href="http://www.brightpink.org/what-you-need-to-know/reduce-your-risk/" target="_blank">risk-reduction</a> and <a href="http://www.brightpink.org/what-you-need-to-know/early-detection/" target="_blank">early detection</a> options that are available to you.
                                    Living a proactive lifestyle is one of the most important things you can do.
                                </p>
                                <div class="triggered-cancer-copy increased showable">
                                    <h5 class="column-header pink-text">Since You've Been Diagnosed With Breast or Ovarian Cancer:</h5>
                                    <p>
                                        The recommendation above regarding genetic testing is particularly relevant to you.
                                        <b>If you’ve not yet been tested, it’s important to rule out the involvement of a genetic mutation in your cancer and the potential that your baseline risk may actually be higher.</b>
                                        (It may seem strange to think of yourself as not already at high risk, given your diagnosis, but keep in mind that the majority of breast and ovarian cancers occur in women with an average baseline risk.)
                                        And though some of the risk-reduction and early detection information below may be less relevant to you now, post-diagnosis, we still recommend bringing these results to your doctor to discuss which strategies you may still need to incorporate.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- column-two (right) -->
                        <div class="column">
                            <h3 class="column-header">What To Do Now</h3>
                            <p>
                                It can be daunting to face the idea of having a higher-than-average risk of breast and ovarian cancer.
                                The good news is that knowledge is power and there are things you can do to take control and reduce your risk!
                            </p>
                            <p>
                                First, review the section below to better understand which of your lifestyle choices could be negatively affecting your risk.
                                Gene mutations are funny things—no one really knows what “flips the switch” and causes cancer to develop.
                                The good news is that taking steps to reduce or eliminate modifiable risk factors may help reduce the likelihood of that switch flipping.
                                You can learn more about <a href="http://www.brightpink.org/what-you-need-to-know/reduce-your-risk/" target="_blank">lifestyle risk-reduction</a> strategies on our website.
                            </p>
                            <p class="more-results">
                                <i class="pink-text">As mentioned above, if you’ve not yet had genetic testing</i>, we suggest you seek input from an OB/GYN or a genetic counselor, to discuss whether you’re a candidate as well as what the process entails.
                                He or she can also talk to you about how to manage and respond to the concerns you might have regarding the testing process and receiving a result.
                                If you need help finding a genetic counselor to talk to in person or on the phone, you can find resources on our website <a href="http://www.brightpink.org/high-risk-support/genetic-counseling/" target="_blank">here</a>.
                                And if you want to dip your toes in the water by asking a question online first, or reading some FAQs, visit our <a href="http://www.brightpink.org/high-risk-support/genetic-counseling/" target="_blank">Ask a Genetic Counselor</a> page.
                            </p>
                            <p class="more-results">
                                Your doctor may also recommend increased <a href="http://www.brightpink.org/what-you-need-to-know/reduce-your-risk/#increased-risk-reduction" target="_blank">risk-reduction</a> and <a href="http://www.brightpink.org/what-you-need-to-know/early-detection/#increased-risk-screening-recommendation" target="_blank">early detection</a> strategies appropriate for women at increased risk, including starting mammograms at a younger age than recommended for women of average risk, or exploring the possibility of pharmaceutical risk-reduction options.
                            </p>
                            <p class="more-results">
                                If you feel like you might benefit from getting support from other women in a similar situation, Bright Pink offers both <a href="http://www.brightpink.org/pinkpal/" target="_blank">1:1</a> and <a href="http://www.brightpink.org/outreach/" target="_blank">group</a> support programs for women at increased and high risk that you may find helpful.
                            </p>
                            <p class="more-results">
                                We also encourage you to print out these results or let us email them to you so that you can take them to your doctor and discuss creating a risk-reduction and early detection strategy together.
                            </p>
                            <div class="read-more-box">
                                <a href="#/assessment" class="read-more">Read More</a>
                            </div>
                        </div>
                    </div>

                    <!-- High -->
                    <div class="results-copy-high">
                        <!-- paragraph-one (left) -->
                        <div class="column">
                            <h3 class="column-header">Understanding Your Baseline Risk</h3>
                            <p>Your answers suggest that you are at a <a href="http://www.brightpink.org/what-you-need-to-know/understand-risk/#understanding-high-risk" target="_blank">high baseline risk</a> for breast and ovarian cancer, due either to a diagnosed gene mutation associated with a high risk of one of these cancers or, if you’ve not yet undergone genetic testing yourself, having a 1st degree relative who has been diagnosed with one of these mutations.
                                (If you’ve not yet pursued genetic testing, doing so to confirm your risk level is advisable.)  Being at high-risk means that you have up to an 87% chance of getting breast cancer and up to a 54% chance of getting ovarian cancer.
                                This is significant, so it’s a great thing that you’ve identified this risk and are here learning more about the <a href="http://www.brightpink.org/what-you-need-to-know/reduce-your-risk/#high-risk-reduction" target="_blank">risk-reduction</a> and <a href="http://www.brightpink.org/what-you-need-to-know/early-detection/#high-risk-screening-recommendation" target="_blank">early detection</a> options that are available to you.
                                Living a proactive lifestyle is one of the most important things you can do!
                            </p>
                            <div class="more-results">
                                <div class="triggered-cancer-copy high showable">
                                    <h5 class="column-header pink-text">Since You've Been Diagnosed With Breast or Ovarian Cancer:</h5>
                                    <p>
                                        Some of the risk-reduction and early detection information below may be less relevant to you now, post-diagnosis.
                                        We still recommend bringing these results to your doctor to discuss which strategies you may still need to incorporate.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- paragraph-two (right) -->
                        <div class="column">
                            <h3 class="column-header">What To Do Now</h3>
                            <p>
                                It can be scary to face the idea of those lifetime risk numbers.
                                The good news is that knowledge is power and there are things you can do to take control and reduce your risk!
                            </p>
                            <p>
                                First, review the section below to better understand which of your lifestyle choices could be negatively affecting your risk.
                                Gene mutations are funny things—no one really knows what “flips the switch” and causes cancer to develop.
                                The good news is that taking steps to reduce or eliminate modifiable risk factors may help reduce the likelihood of that switch flipping.
                                You can learn more about <a href="http://www.brightpink.org/what-you-need-to-know/reduce-your-risk/" target="_blank">lifestyle risk-reduction</a> strategies on our website.
                            </p>
                            <p class="more-results"><i class="pink-text">As mentioned above, if you’ve not yet had genetic testing</i>, we suggest you seek input from an OB/GYN or a genetic counselor, to discuss whether you’re a candidate as well as what the process entails.
                                He or she can also talk to you about how to manage and respond to the concerns you might have regarding the testing process and receiving a result.
                                It’s important to note that until you’ve had genetic testing done, you don’t know for sure that you’re high risk.
                                If you need help finding a genetic counselor to talk to in person or on the phone, you can find resources <a href="http://www.brightpink.org/high-risk-support/genetic-counseling/" target="_blank">here</a>.
                                And if you want to dip your toes in the water by asking a question online first, or reading some FAQs, visit our <a href="http://www.brightpink.org/high-risk-support/genetic-counseling/" target="_blank">Ask a Genetic Counselor</a> page.
                            </p>
                            <p class="more-results"><i class="pink-text">If you have a diagnosed gene mutation, but are choosing not to have risk-reducing surgery, or if you haven’t yet had risk-reducing surgeries but plan to later</i>, we encourage you to be in close contact with your OB/GYN or another physician you trust about what kind of increased screening protocol he or she recommends for you.
                                You can learn more about the increased screening typically recommended for high-risk women <a href="http://www.brightpink.org/what-you-need-to-know/early-detection/#high-risk-screening-recommendation" target="_blank">here</a>.
                                And if you want more information about what those risk-reducing surgeries are, you can find it <a href="http://www.brightpink.org/what-you-need-to-know/reduce-your-risk/#high-risk-reduction" target="_blank">here</a>.
                            </p>
                            <p class="more-results"><i class="pink-text">If you have a diagnosed gene mutation and have undergone risk-reducing breast and/or ovarian surgeries</i>, congratulations on crossing a big and important hurdle.
                                We recommend staying in close touch with your physician even though the surgeries are complete or partially complete.
                                He or she should talk to you about what kind of screening is recommended for you now; if you haven’t had that conversation yet, ask for it!
                            </p>
                            <p class="more-results">
                                Regardless of where you are on the testing/screening/surgery spectrum, you may find that you want support from other women in a similar situation, or maybe that you want to lend support and guidance to someone who’s a little further behind you in the process of risk assessment and management.
                                Bright Pink offers both <a href="http://www.brightpink.org/pinkpal/" target="_blank">1:1</a> and <a href="http://www.brightpink.org/outreach/" target="_blank">group</a> support programs that you may find helpful.
                            </p>
                            <p class="more-results">
                                We also encourage you to print out these results or let us email them to you so that you can take them to your doctor and discuss creating a risk-reduction and early detection strategy together.
                            </p>
                            <div class="read-more-box">
                                <a href="#/assessment" class="read-more">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pink Email/PDF/Doctor Footer on first card -->
                <div class="email-pdf-doctor">
                    <!-- <div class="email-pdf"><a href='mailto:?subject=Here are the results of my risk assessment&amp;body=I thought you might find this information interesting' target="_blank">Email to your Doctor</a> -->
                    <div class="email-pdf-copy">
                        <h4>Would you like a copy of your results?</h4>
                    </div>
                    <div class="email-pdf-btns">
                        <button class="sub email">EMAIL</button><button class="pdf">PDF</button><button class="sub email-doctor">SHARE WITH MY DOCTOR</button>
                    </div>
                    <div class="email-fields-doctor">
                        <h4>Share results with my doctor.</h4>

                        <input type="text" placeholder="Your Full Name" id="your-name-dr" required="">
                        <input type="text" placeholder="Doctor's email address" id="dr-email-address" required=""><button class="sub send-dr-email">SEND</button> <button class="sub cancel">Cancel</button>

                    </div>
                    <div class="email-fields-user">
                        <h4>Share my results with me.</h4>

                        <input type="text" placeholder="Your Full Name" id="your-name" required="">
                        <input type="text" placeholder="My email address" id="user-email-address" required=""><button class="sub send-user-email">SEND</button><button class="sub cancel">Cancel</button>
                    </div>
                </div>
                <!-- paragraph wrapper close -->
            </div>
        </div>

        <div class="cards" style="display: block;">

            <div class="card-intro-text">
                <h3>Life Affects Your Life: Understanding Your Other Risk Factors</h3><br><br>
                <p>Your baseline risk above is your starting point.
                    The lifestyle and personal health history factors below can potentially increase or decrease that baseline risk.
                    Talk to your doctor about how these risk factors may be affecting your total risk—make it a goal to get or keep as much as you can working in your favor.
                </p>

            </div>

            <br>
            <div class="card positive">
                <div class="factors-title"><h3>Working In Your Favor</h3></div>
                <div class="item bmi-low" style="display: block;">
                    <div class="section-title">BMI</div>
                    <h4>Your BMI is below 24.9</h4>
                    <p>This is within the healthy range when it comes to risk! Keep up the good work.</p>
                </div>
                <div class="item alcohol-low" style="display: none;">
                    <div class="section-title">ALCOHOL</div>
                    <h4>You have one or fewer drinks a day.</h4>
                    <p>Something to celebrate: your cocktail consumption likely doesn’t increase your baseline risk.</p>
                </div>
                <div class="item exercise-low" style="display: block;">
                    <div class="section-title">PHYSICAL ACTIVITY</div>
                    <h4>You get enough exercise.</h4>
                    <p>Your active lifestyle will benefit your health in many ways. Stick to it!</p>
                </div>
                <div class="item birth-control-low" style="display: block;">
                    <div class="section-title">BIRTH CONTROL</div>
                    <h4>You’ve taken birth control for at least five years.</h4>
                    <p>You likely made this choice for other reasons, but just by taking oral contraceptives for a total of at least five years, you’ve decreased your risk of ovarian cancer by up to 50%.  That’s no small feat.</p>
                </div>
                <div class="item breastfeeding-low" style="display: block;">
                    <div class="section-title">BREASTFEEDING</div>
                    <h4>You have breastfed, or plan to in the future.</h4>
                    <p>Breastfeeding is good for both you and your baby; doing it for a total of at least 1-2 years helps lower your risk.</p>
                </div>
                <div class="item pregnancy-low" style="display: none;">
                    <div class="section-title">PREGNANCY</div>
                    <h4>You have given birth.</h4>
                    <p>One of the many joys of motherhood can be risk reduction — pregnancy lowers your risk by reducing your lifetime exposure to estrogen and stabilizing your breast tissue.</p>
                </div>
            </div>

            <!-- Negative -->
            <div class="card negative">
                <div class="factors-title"><h3>Not Working in Your Favor</h3></div>
                <div class="item bmi-high" style="display: none;">
                    <div class="section-title">BMI</div>
                    <h4>Your BMI is outside of the healthy range.</h4>
                    <p>Be good to yourself! Talk to your doctor or nutritionist about steps you can take to achieve a healthier BMI.</p>
                </div>
                <div class="item alcohol-high" style="display: block;">
                    <div class="section-title">ALCOHOL</div>
                    <h4>You have more than one drink a day.</h4>
                    <p>Consider cutting back on cocktails, as alcohol increases your baseline risk. We advise no more than one drink per day.</p>
                </div>
                <div class="item exercise-high" style="display: none;">
                    <div class="section-title">PHYSICAL ACTIVITY</div>
                    <h4>You’re not getting enough exercise.</h4>
                    <p>Not moving your body enough increases your risk.  You don’t have to become a gym rat — walking counts! 30+ minutes most days is the goal to work toward.</p>
                </div>
                <div class="item birth-control-high" style="display: none;">
                    <div class="section-title">BIRTH CONTROL</div>
                    <h4>You haven’t taken birth control for at least five years.</h4>
                    <p>Consider talking to your doctor about whether birth control pills might be a good option for you—if you take them for a total of at least five years in your 20s and 30s, you can reduce your ovarian cancer risk by up to 50%. That’s no small feat.</p>
                </div>
                <div class="item breastfeeding-high" style="display: none;">
                    <div class="section-title">BREASTFEEDING</div>
                    <h4>You have not breastfed, or do not plan to in the future.</h4>
                    <p>Breastfeeding is a personal choice, but if it presents itself as an option in the future, just know that doing it for a total of 1-2 years can help lower your risk.</p>
                </div>
                <div class="item pregnancy-high" style="display: block;">
                    <div class="section-title">PREGNANCY</div>
                    <h4>You have not given birth.</h4>
                    <p>If you’ve chosen not to have children, or if childbearing simply isn’t in the cards, be aware that never giving birth slightly increases your risk.</p>
                </div>
                <div class="item period-high" style="display: none;">
                    <div class="section-title">PERIOD</div>
                    <h4>Your period started early.</h4>
                    <p>Starting your period under the age of 12 increases your risk for breast cancer later because it increases your total lifetime exposure to estrogen.
                        You obviously can’t change this, but it’s another reason to stay proactive where other modifiable risk factors are considered, especially BMI.</p>
                </div>
            </div>
        </div>



    </div>

@endsection

@section('script')

    <script>
 /*
        * botón para ir a educatión
        * */
        $('.understand').on('click', function() {
            var url_prev = '../../education';
            $(location).attr('href',url_prev);
        })

        </script>

@endsection