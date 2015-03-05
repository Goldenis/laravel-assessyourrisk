<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta property="og:url" content="http://brightenup.sew.la" /> 
    <meta property="og:title" content="BrightPink Assessment" />
    <meta property="og:description" content="1 in 8 women will develop breast cancer at some point in her lifetime. 1 in 67 will develop ovarian cancer" /> 
    <meta property="og:image" content="http://brightenup.sew.la/img/brightpink_logo.png" /> 
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no, minimal-ui" />
    <link rel="stylesheet" href="css/style.css">
    <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    <script type='application/javascript' src='/js/vendor/fastclick.js'></script>
    <script>

    function fb_share(url, title, descr, image) {
    FB.ui( {
        method: 'feed',
        name: title,
        link: url,
        picture: image,
        caption: descr
    }, function( response ) {
        if ( response !== null && typeof response.post_id !== 'undefined' ) {
            console.log( response );
            // ajax call to save response
          // $.post( 'http://www.webniraj.com/', { 'meta': response }, function( result ) {
          //       console.log( result );
          //   }, 'json' );
        }
    } );
  
    }
    </script>
  </head>
  <body>
    <div class="border"></div>
    <div class="logo">
    <img src="img/brightpink_logo.png">

    </div>
    <div class="email-content"></div>
    <div class="overlay male-overlay">
      <button class="sub close-btn">✕</button>
      <h1>Then <span class="share-btn">share<a href="https://twitter.com/intent/tweet?text=Check+out+Bright+Pink%27s+%23AssessYourRisk+tool+to+assess+and+reduce+your+risk+for+breast+and+ovarian+cancer.+http%3A%2F%2FAssessYourRisk.org" target="_blank"><img src="img/twitter.svg"></a><a href="#" onclick="fb_share('http://brightenup.sew.la', 'BrightPink Assessment', '1 in 8 women will develop breast cancer at some point in her lifetime. 1 in 67 will develop ovarian cancer.', 'http://brightenup.sew.la/img/brightpink_logo.png', 520, 350)"><img src="img/facebook.svg"></a><a href="#" onclick="shareMail();"><img src="img/mail.svg"></a></span> this with someone you care about that does. You just might save her life.</h1>
    </div>
    
    <div class="menu-icon">
      <div class="line"></div>
      <div class="line"></div>
      <div class="line"></div>
    </div>

    <div class="overlay progress-overlay">
      <div class="question-stats">
      </div>
      <button class="sub close-btn">✕</button>
      <div class="share">
        <div class="share-copy">
          <h5>Save the life of somebody you love. Tell them to complete this experience too.</h5>
        </div>
        <div class="share-btn-wrapper">
          <button class="share-btn"><a href="https://twitter.com/intent/tweet?text=Check+out+Bright+Pink%27s+%23AssessYourRisk+tool+to+assess+and+reduce+your+risk+for+breast+and+ovarian+cancer.+http%3A%2F%2FAssessYourRisk.org" target="_blank"><img src="img/twitter.svg"></a><a href="#" onclick="fb_share('http://brightenup.sew.la', 'BrightPink Assessment', '1 in 8 women will develop breast cancer at some point in her lifetime. 1 in 67 will develop ovarian cancer.', 'http://brightenup.sew.la/img/brightpink_logo.png', 520, 350)"><img src="img/facebook.svg"></a><a href="#" onclick="shareMail();"><img src="img/mail.svg"></a>SHARE</button>
        </div>
      </div>
      <div class="vignettes">
      	<div class='section-title'>Understand</div>
        <!-- <div class="progress">
          <div class="percentage percdive"></div>
          <div class="chart chart-5"></div>
        </div> -->
        <div class="sections">
          <h3>Lifestyle</h3><br>
          <h3>Your Normal</h3><br>
          <h3>Family & Health History</h3>
        </div>  
      </div>
      
      <div class="results">
        <div class="your-risk">
      <!-- Chart - Removed -->
<!--           <div class="progress-result">
            <div class="percentage percquiz"></div>
            <div class="chart chart-4"></div>
          </div> -->
          <!-- <div class='section-title'>Assessment</div> -->
          <!-- Insert the TRIGGERED Text Div -->
          <h2>Your Baseline Risk is <span class="risk-level">Average</span></h2>
        </div>
        <div class="paragraph-wrapper">
          <div class="paragraph-box">

          <!-- Average -->            
            <div class="results-copy-average on">
              <!-- paragraph-one (left) -->
              <div class="column"> 
                <h3 class="column-header">Understanding Your Baseline Risk</h3>
                <p>Your answers suggest that you are at <a href="http://www.brightpink.org/what-you-need-to-know/understand-risk/" target="_blank">average baseline risk</a> for breast and ovarian cancer, just like the majority of women in the general population.  
                This means you have a 12% chance of getting breast cancer—that’s one in eight women—and a 1.5% chance of getting ovarian cancer.  
                75% of all breast and ovarian cancers are diagnosed in average risk women, so being proactive about <a href="http://www.brightpink.org/what-you-need-to-know/reduce-your-risk/" target="_blank">risk-reduction</a> and <a href="http://www.brightpink.org/what-you-need-to-know/early-detection/" target="_blank">early detection</a> is still important.
                </p>
                <div class="triggered-cancer-copy average more-results">
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
                  <a href="#" class="read-more">Read More</a>
                </div>
              </div>
            </div>

          <!-- Increased (Moderate) -->
            <div class="results-copy-moderate">
              <div class="column">
                  <!-- Added warning header -->
                  <h5 class="warning-header pink-text">There is potential that you may be High Risk. <br>Read on.</h5>
                <!-- paragraph-one (left) -->
                  <h3 class="column-header">Understanding Your Baseline Risk</h3>
                  <p>
                    Your answers suggest that you are at <a href="http://www.brightpink.org/what-you-need-to-know/understand-risk/#understanding-increased-risk" target="_blank">increased baseline risk</a> for breast and ovarian cancer, 
                    either because of a <a href="http://www.brightpink.org/what-you-need-to-know/collect-your-family-history/" target="_blank">family history</a> of one of these cancers, some significant event in your personal health history, 
                    or because you or a family member has been diagnosed with a specific type of gene mutation associated with an increased risk of breast or ovarian cancer.  
                    If you have not already pursued genetic testing, we highly recommend that you talk with your doctor or a genetic counselor about whether your personal circumstances warrant it, to <b>confirm that your baseline risk truly is only increased, and not actually high</b>.  
                    If you are at high risk, you will need to discuss enhanced risk management strategies with your doctor.
                  </p>  
                  <p class="more-results">
                  Being at increased risk means that you have up to a 25% chance of developing breast cancer and up to a 5.5% chance of ovarian cancer at some point in your lifetime.  
                  These percentages mean that your risk for both cancers is more than twice that of women in the general population, which is significant.  
                  It’s a great thing that you’ve identified this risk and are here learning more about the <a href="http://www.brightpink.org/what-you-need-to-know/reduce-your-risk/" target="_blank">risk-reduction</a> and <a href="http://www.brightpink.org/what-you-need-to-know/early-detection/" target="_blank">early detection</a> options that are available to you.  
                  Living a proactive lifestyle is one of the most important things you can do.
                  </p>
                  <div class="triggered-cancer-copy increased more-results">
                    <h5 class="column-header pink-text">Since You've Been Diagnosed With Breast or Ovarian Cancer:</h5>
                      <p>
                        The recommendation above regarding genetic testing is particularly relevant to you.  
                        <b>If you’ve not yet been tested, it’s important to rule out the involvement of a genetic mutation in your cancer and the potential that your baseline risk may actually be higher.</b>  
                        (It may seem strange to think of yourself as not already at high risk, given your diagnosis, but keep in mind that the majority of breast and ovarian cancers occur in women with an average baseline risk.)  
                        And though some of the risk-reduction and early detection information below may be less relevant to you now, post-diagnosis, we still recommend bringing these results to your doctor to discuss which strategies you may still need to incorporate.
                      </p>
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
                    <a href="#" class="read-more">Read More</a>
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
                <div class="triggered-cancer-copy high">
                  <h5 class="column-header pink-text">Since You've Been Diagnosed With Breast or Ovarian Cancer:</h5>
                    <p>
                      Some of the risk-reduction and early detection information below may be less relevant to you now, post-diagnosis.  
                      We still recommend bringing these results to your doctor to discuss which strategies you may still need to incorporate.
                    </p>
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
                  <a href="#" class="read-more">Read More</a>
                </div>
              </div>
            </div>
          </div>
        <!-- Pink Email/PDF/Doctor Footer on first card -->
            <div class="email-pdf-doctor">
              <div class="email-pdf-copy">
                <h4>Would you like a copy of your results?</h4>
              </div>
              <div class="email-pdf-btns">
                <button class="sub email">EMAIL</button><button class="pdf">PDF</button><button class="sub email-doctor">SHARE WITH MY DOCTOR</button>
              </div>
 
              <div class="email-fields">
                <h4>Share results with my doctor.</h4>
                <input type="text" placeholder="Dr's email address"><button class="sub">SEND</button><button class="sub cancel">Cancel</button>
              </div>
            </div>
<!-- paragraph wrapper close -->
        </div>
      </div> 
  
  <!-- End of Results div -->

      <div class="cards">      

      <div class="card-intro-text">
        <h2>Life Affects Your Life: Understanding Your Other Risk Factors.</h2><br><br>
        <p>Your baseline risk above is your starting point.  
          The lifestyle and personal health history factors below can potentially increase or decrease that baseline risk.  
          Talk to your doctor about how these risk factors may be affecting your total risk—make it a goal to get or keep as much as you can working in your favor.
        </p>

      </div>

      <br>   
        <div class="card positive">
          <div class="factors-title"><h3>Working In Your Favor</h3></div>
          <div class="item bmi-low">
            <div class="section-title">BMI</div>
            <h4>Your BMI is within 18.5 and 24.9</h4>
            <p>This is within a healthy range! Keep up the good work.</p>
          </div>
          <div class="item alcohol-low">
            <div class="section-title">ALCOHOL</div>
            <h4>You have one or fewer drinks a day.</h4>
            <p>Something to celebrate: your cocktail consumption likely doesn’t increase your baseline risk.</p>
          </div>          
          <div class="item exercise-low">
            <div class="section-title">PHYSICAL ACTIVITY</div>
            <h4>You get enough exercise.</h4>
            <p>Your active lifestyle will benefit your health in many ways. Stick to it!</p>
          </div>
          <div class="item birth-control-low">
            <div class="section-title">BIRTH CONTROL</div>
            <h4>You’ve taken birth control for at least five years.</h4>
            <p>You likely made this choice for other reasons, but just by taking oral contraceptives for a total of at least five years, you’ve decreased your risk of ovarian cancer by up to 50%.  That’s no small feat.</p>
          </div>          
          <div class="item breastfeeding-low">
            <div class="section-title">BREASTFEEDING</div>
            <h4>You have breastfed, or plan to in the future.</h4>
            <p>Breastfeeding is good for both you and your baby; doing it for a total of at least 1-2 years helps lower your risk.</p>
          </div>  
          <div class="item pregnancy-low">
            <div class="section-title">PREGNANCY</div>
            <h4>You have given birth.</h4>
            <p>One of the many joys of motherhood can be risk reduction — pregnancy lowers your risk by reducing your lifetime exposure to estrogen and stabilizing your breast tissue.</p>
          </div>                                
        </div>

    <!-- Negative -->
        <div class="card negative">
          <div class="factors-title"><h3>Unfortunately Not Helping</h3></div>
          <div class="item bmi-high">
            <div class="section-title">BMI</div>
            <h4>Your BMI is outside of the healthy range.</h4>
            <p>Be good to yourself! Talk to your doctor or nutritionist about steps you can take to achieve a healthier BMI.</p>
          </div>
          <div class="item alcohol-high">
            <div class="section-title">ALCOHOL</div>
            <h4>You have more than one drink a day.</h4>
            <p>Consider cutting back on cocktails, as alcohol increases your baseline risk. We advise no more than one drink per day.</p>
          </div>
          <div class="item exercise-high">
            <div class="section-title">PHYSICAL ACTIVITY</div>
            <h4>You’re not getting enough exercise.</h4>
            <p>Not moving your body enough increases your risk.  You don’t have to become a gym rat — walking counts! 30+ minutes most days is the goal to work toward.</p>
          </div>
          <div class="item birth-control-high">
            <div class="section-title">BIRTH CONTROL</div>
            <h4>You haven’t taken birth control for at least five years.</h4>
            <p>Consider talking to your doctor about whether birth control pills might be a good option for you—if you take them for a total of at least five years in your 20s and 30s, you can reduce your ovarian cancer risk by up to 50%. That’s no small feat.</p>
          </div>  
          <div class="item breastfeeding-high">
            <div class="section-title">BREASTFEEDING</div>
            <h4>You have not breastfed, or do not plan to in the future.</h4>
            <p>Breastfeeding is a personal choice, but if it presents itself as an option in the future, just know that doing it for a total of 1-2 years can help lower your risk.</p>
          </div>  
          <div class="item pregnancy-high">
            <div class="section-title">PREGNANCY</div>
            <h4>You have not given birth.</h4>
            <p>If you’ve chosen not to have children, or if childbearing simply isn’t in the cards, be aware that never giving birth slightly increases your risk.</p>
          </div> 
          <div class="item period-high">
            <div class="section-title">PERIOD</div>
            <h4>Your period started early.</h4>
            <p>Starting your period under the age of 12 increases your risk for breast cancer later because it increases your total lifetime exposure to estrogen.  
              You obviously can’t change this, but it’s another reason to stay proactive where other modifiable risk factors are considered, especially BMI.</p>
          </div>                       
        </div>
      </div>
      <div class="questions">
      </div>
    </div>

    <!-- INTRO -->

    <section class="intro" class="flex-container vertical-container">
      <div class="wheel-container">
        <div id="wheel-base"><!-- <div class="spin">CLICK TO SPIN</div> --></div>
        <div id="wheel-overlay"></div>
      </div>
      <div class="intro-message">
        <p>
          <b><span class="pink-text">1 in 8</span> women will develop breast cancer at some point in her lifetime.  <span class="pink-text">1 in 67</span> will develop ovarian cancer.</b>  
        </p>
        <br>
        <p> 
          <b>Your body. Your life.<br>
          Don’t leave it up to chance.</b>
        </p>
        <a id="Begin"></span><button class="action lifestyle"> Assess Your Risk </button> </a>
      </div>
    </section>
    <!-- RIGHT COLUMN -->
    <div class="right-column">

      <!-- DASH -->

      <div class="dashboard">
        <h6 class="label">MY PROGRESS</h6>
        <div class="progress">
          <div class="percentage percquiz"></div>
          <div class="chart chart-2"></div>
          <h6>Assess</h6>
        </div>
        <div class="progress">
          <div class="percentage percdive"></div>
          <div class="chart chart-3"></div>
          <h6>Understand</h6>
        </div>
      </div>

      <!-- UNDERSTAND -->
      <div class="toggle-box">
        <div class="assess-start">
        <h3>Assess Your Risk<br></h3>
        </div>
        <div class="lets-go">
        <h3>Let’s Start.<br></h3>
        </div>
        <div class="understand">
          <h4>Understand<br>Your Risk<br></h4>
          <div class="arrow"><img src="img/arrow_right.png"></div>
          <!-- FACTS -->
          <div class="assessment-facts">
            <div class="fact">
              <h5>You—and the 52 million other young women in the United States—are at risk <i>simply because</i> you have breasts and/or ovaries.</h5>
            </div>

            <div class="fact">
              <h5>Age is important when it comes to breast and ovarian cancer risk: most breast and ovarian cancers develop when women are in their 50s and 60s, but breast cancer in women with a genetic predisposition often develops much earlier, starting when those women are in their 30s and 40s.</h5>
            </div>

            <div class="fact">
              <h5>If a woman has had breast cancer, she’s also at increased risk for developing ovarian cancer. An ovary may only be the size of an almond, but it’s powerful - <b>2/3 of women diagnosed with ovarian cancer will die from their disease.</b></h5>
            </div>

            <div class="fact">
              <h5><b>There is a clear link between obesity and breast cancer — extra fatty tissue produces extra estrogen, which in turn increases breast cancer risk.</b></h5>
            </div>

            <div class="fact">
              <h5><b>Maintaining a healthy body weight means keeping your BMI between 18.5 and 24.9.</b></h5>
            </div>

            <div class="fact">
              <h5>Breast and ovarian cancers can run in some families. Sometimes this is because mutated genes have been passed down to you from your mother or father. These genes dramatically increase the risk of developing cancer. Other times, there may be a strong family history, but no known genetic mutation.</h5>
            </div>
            
            <div class="fact">
              <h5>Research shows a 10% increase in breast cancer risk for every 10g of alcohol—that’s <i>one</i> standard drink—consumed each day on average. Limit alcohol to one drink per day or eliminate it entirely.</h5>
            </div>

            <div class="fact">
              <h5>Getting a genetic test is as simple as taking a blood test. The Affordable Care Act requires insurance coverage of genetic testing for women who qualify.</h5>
            </div>

            <div class="fact">
              <h5>One of the most common mutations — <i>BRCA1</i> or <i>BRCA2</i> — are present in 1 in 400 individuals, 1 in 40 Ashkenazi Jews, 1 in 10 women diagnosed with breast cancer and 1 in 8 women diagnosed with ovarian cancer.</h5>
            </div>

            <div class="fact">
              <h5>Regular exercise – breaking a sweat for 30+ minutes on most days – may reduce your risk of developing breast cancer. You don’t need to become a gym rat — walking counts!</h5>
            </div>

            <div class="fact">
              <h5><i>Nothing</i> has a greater effect on a woman’s level of risk than her family history. Background information from BOTH sides of your family is important.</h5>
            </div>

            <div class="fact">
              <h5>Younger women tend to have denser breast tissue – breasts with more glandular tissue and less fatty tissue – which can make it harder to see tumors on mammograms. Dense breast tissue is linked to a higher risk of breast cancer.</h5>
            </div>

             <div class="fact">
              <h5>Risk for developing breast cancer is significantly increased if a woman received radiation treatments to the chest for another cancer (like Hodgkin’s disease or non-Hodgkin’s lymphoma) at a young age, particularly while her breasts were developing. Some reports find it to be as much as 12 times the normal risk.</h5>
            </div>         

            <div class="fact">
              <h5>Starting your period under age 12 is linked to an increased risk for breast cancer because it raises total lifetime exposure to estrogen.</h5>
            </div>

            <div class="fact">
              <h5>When you collect family health history, note who had cancer, how old they were at diagnosis, and what type was detected. Remember that information from your father’s side is just as important as your mother’s.</h5>
            </div>          

            <div class="fact">
              <h5>Research shows clear reduction in ovarian cancer risk with use of birth control pills. You might have heard oral contraceptives can increase breast cancer risk, but many studies show that if there is any increased risk at all, it is very small, and not associated with the most common, low-dose estrogen pills. Bottom line: there are few lifestyle behaviors that reduce your ovarian cancer risk — <i>except</i> for taking birth control pills.</h5>
            </div>

            <div class="fact">
              <h5>A breast biopsy sometimes shows abnormal cells that are considered a “precancer” (called atypical hyperplasia, or cellular atypia). Patients who have had precancerous cells on biopsy are more likely to have cancer later in life.</h5>
            </div>          

            <div class="fact">
              <h5>Pregnancy reduces breast cancer risk by stabilizing breast tissue and lowering total lifetime exposure to estrogen. It also reduces the risk of ovarian cancer by preventing ovulation and therefore the chance for cell growth to “go rogue.”</h5>
            </div>

            <div class="fact">
              <h5>Breastfeeding for a total of 1-2 years lowers total lifetime exposure to estrogen, reducing a woman’s risk of developing breast cancer. It also reduces the chance of ovulation, and therefore also it decreases the risk of ovarian cancer.</h5>
            </div>
          </div>
        </div>
        <div class="assess">
          <h4>Assess<br>Your Risk<br></h4>
          <div class="arrow"><img src="img/arrow_left.png"></div>
          <div class="logo-white"><img src="img/brightpink_logo_white.png"></div>
        </div>
      </div>
    </div>

    <!-- ASSESSMENT-->
    <section class="assessment scrollpane"> 
      <!-- <div class="section-title">Assess Your Risk</div> -->
      <div class="assessment-dots dots">
        <div class="btn-back"><img src="img/arrow_left_pink.png"></div>
      </div>
      <section class="assessment-intro in">
        <h4 class="mobile-hide"><a href="http://brightpink.org">Bright Pink</a> created this tool to help you assess your <span class="pink-text">personal level of risk</span> for breast and ovarian cancer.  By looking at your <span class="pink-text">health and family history</span> alongside some of your <span class="pink-text">lifestyle</span> choices, you’ll not only learn more about your risk, but also about <span class="pink-text">actions</span> you can take to reduce it.<br><br><i>You</i> have the power to save your life.</h4>            
        <button class="action">Let’s Go.</button>
      </section>

      <div class="assessment-wrap">
        <div class="question" data-question-id="1">
          <div class="prompt">Do you have breasts and/or ovaries?</div>
        
          <div class="answers">
            <button data-answer-id="0">Yes</button>
            <button data-answer-id="0">No</button>
          </div>
        </div>

        <div class="question gif" data-question-id="2">
            <div class="anim-gif">
               <img src="img/Calendar.gif">
            </div>
          <div class="prompt">How old are you?</div>
   
          <div class="answers">
            <div class="checkbox-list age-list">
              <div class="checkbox" data-answer-id="1"><input type="radio" name="age-radio" data-answer-id="1"><div class="label">10-20</div></div>
              <div class="checkbox" data-answer-id="2"><input type="radio" name="age-radio" data-answer-id="2"><div class="label">20-30</div></div>
              <div class="checkbox" data-answer-id="3"><input type="radio" name="age-radio" data-answer-id="3"><div class="label">31-35</div></div>
              <div class="checkbox" data-answer-id="4"><input type="radio" name="age-radio" data-answer-id="4"><div class="label">36-40</div></div>
              <div class="checkbox" data-answer-id="5"><input type="radio" name="age-radio" data-answer-id="5"><div class="label">40+</div></div>
            </div>
              <br>
              <div class="answers">
                <button id="age-btn" disabled>Continue</button>
              </div>
          </div>
        </div>

        <div class="question" data-question-id="13">
          <div class="prompt">Have you ever been diagnosed with either of the following?</div>

          <div class="answers">
            <div class="checkbox-list">
              <div class="checkbox" data-answer-id="1"><input type="radio" name="cancerhistory-radio" data-answer-id="-1"><div class="label">Breast cancer</div></div>
              <div class="checkbox" data-answer-id="2"><input type="radio" name="cancerhistory-radio" data-answer-id="-1"><div class="label">Ovarian cancer</div></div>
              <div class="checkbox" data-answer-id="4"><input type="radio" name="cancerhistory-radio" data-answer-id="-1"><div class="label">Both</div></div>              
              <div class="checkbox" data-answer-id="3"><input type="radio" name="cancerhistory-radio" data-answer-id="0"><div class="label">Neither</div></div>
            </div>
              <br>
              <div class="answers">
                <button id="cancerhistory-btn" disabled>Continue</button>
              </div>
          </div>        
        </div>
        
        <div class="question weight-question" data-question-id="3">
          <div class="weight-wrapper">  
            <div class="prompt">What is your weight?</div>
            <div class="visual">
              <div class="weight-container-mask">
                <div class="weight-container">
                  <div id="weight-base"></div>
                  <div id="weight-overlay"></div>
                </div>
              </div>
            </div>
            <div class="answers weight-answer">
              <button class="submit-weight">Continue</button>
            </div>
          </div>
          <br>
        </div>

        <div class="question" id="height-question" data-question-id="3" data-question-name="bmi">
          <div class="bmi-result">
            <div class="answers">
              <button>Continue</button>
            </div>
          </div>

          <div class="height-wrapper">  
            <div class="prompt">What is your height?</div>
            <div class="visual">
                <div class="height-container-mask">
                  <div class="height-container">
                    <div id="height-base"></div>
                    <div id="height-overlay"></div>
                  </div>
                </div>
            </div>
              <button class="btn-calculate">Calculate</button>
          </div>   
          <br>
        </div>

        <div class="question" data-question-id="14">
          <div class="prompt">Have any of <span class="pink-text">your immediate family members</span> (parent, sibling, grandparent, aunt, or uncle) been diagnosed with any of the following?</div>
        
          <div class="checkbox-list cb1">
            <div class="checkbox" data-answer-id="1"><input type="checkbox" name="famdiag-check" data-answer-id="1|-1"><div class="label">Breast cancer diagnosed at age 50 or under</div></div>
            <div class="checkbox" data-answer-id="2"><input type="checkbox" name="famdiag-check" data-answer-id="2|-1"><div class="label">Triple negative (ER/PR/her2-) breast cancer</div></div>
            <div class="checkbox" data-answer-id="3"><input type="checkbox" name="famdiag-check" data-answer-id="3|-1"><div class="label">More than one breast cancer (cancer in both breasts, or two separate breast cancers in one breast)</div></div>
            <div class="checkbox" data-answer-id="4"><input type="checkbox" name="famdiag-check" data-answer-id="4|-1"><div class="label">Male breast cancer</div></div>
            <div class="checkbox" data-answer-id="5"><input type="checkbox" name="famdiag-check" data-answer-id="5|-1"><div class="label">Ovarian cancer, primary peritoneal cancer, or fallopian tube cancer</div></div>
            <div class="checkbox" data-answer-id="6"><input type="checkbox" name="famdiag-check" data-answer-id="6|-1"><div class="label">Two or more close relatives with breast cancer at any age</div></div>
            <div class="checkbox" data-answer-id="7"><input type="checkbox" name="famdiag-check" data-answer-id="7|0"><div class="label">None of the above</div></div>
          </div>
          <br>
          <div class="answers">
            <button id="famdiag-check-btn" disabled>Continue</button>
            <button class="sub ask">Help me ask them</button>
          </div>        
        </div>

       <div class="question drinks-question" data-question-id="4">
          <div class="prompt">Drag drink icon to the average number of drinks per day you have — don’t forget to count the weekends!</div>
          	<div class="drink-slider">
	          <div class="bottle"><img src="img/assessment/bottle.png"></div>
	          <div class="answers drinks">
	            <div class="drink" data-answer-id="1"><img src="img/assessment/drink_fill.png"></div>
	            <div class="drink" data-answer-id="2"><img src="img/assessment/drink_fill.png"></div>
	            <div class="drink" data-answer-id="3"><img src="img/assessment/drink_fill.png"></div>
	            <div class="drink" data-answer-id="4"><img src="img/assessment/drink_fill.png"></div>
	            <div class="drink" data-answer-id="5"><img src="img/assessment/drink_fill.png"></div>
	            <div class="drink" data-answer-id="6"><img src="img/assessment/drink_fill.png"></div>
	            <div class="drink" data-answer-id="7"><img src="img/assessment/drink_fill.png"></div>
	            <div class="drink" data-answer-id="8"><img src="img/assessment/drink_fill.png"></div>
	            <div class="drink" data-answer-id="9"><img src="img/assessment/drink_fill.png"></div>
	            <div class="drink" data-answer-id="10"><img src="img/assessment/drink_fill.png"></div>
	            <br><br><br>
	            <button>Continue</button>
	          </div>
	        </div>
        </div>

        <div class="question" data-question-id="15">
          <div class="prompt">Have <span class="pink-text">you or any of your close relatives</span> (parent, sibling, grandparent, aunt, or uncle) been diagnosed with a genetic mutation that increases breast or ovarian cancer risk?</div>
        
          <div class="answers">
            <div class="checkbox-list cb1">
              <div class="checkbox" data-answer-id="1"><input type="radio" name="mutation-radio" data-answer-id="-1"><div class="label">Yes, I've tested positive for a specific gene mutation</div></div>
              <div class="checkbox" data-answer-id="2"><input type="radio" name="mutation-radio" data-answer-id="-1"><div class="label">Yes, a relative has but I've tested negative for that mutation</div></div>
              <div class="checkbox" data-answer-id="3"><input type="radio" name="mutation-radio" data-answer-id="-1"><div class="label">Yes, a relative has, but I've not yet been tested</div></div>
              <div class="checkbox" data-answer-id="5"><input type="radio" name="mutation-radio" data-answer-id="+1"><div class="label">I don’t know</div></div>
              <div class="checkbox" data-answer-id="4"><input type="radio" name="mutation-radio" data-answer-id="+1"><div class="label">No</div></div>              
            </div>
              <br>
              <div class="answers">
                <button id="mutation-btn" disabled>Continue</button>
              </div>
          </div>
        </div>

       <div class="question" data-question-id="16">
          <div class="prompt">Which gene mutation have you or your relative(s) been diagnosed with?</div>
        
          <div class="checkbox-list cb2">
            <div class="checkbox" data-answer-id="1"><input type="checkbox" name="mutation-sub" data-answer-id="1|-2"><div class="label"><i>BRCA1</i> or <i>BRCA2</i>, Lynch Syndrome,  Li-Fraumeni Syndrome, Cowden Syndrome, Diffuse Gastric and Lobular Breast Cancer syndrome, Peutz-Jeghers Syndrome (PJS) or De Novo Mutation Rate</div></div>
            <div class="checkbox" data-answer-id="2"><input type="checkbox" name="mutation-sub"  data-answer-id="2|-1"><div class="label">Other specific mutation</div></div>
            <div class="checkbox" data-answer-id="3"><input type="checkbox" name="mutation-sub"  data-answer-id="3|-1"><div class="label">VUS (variant of uncertain significance) </div></div>
            <div class="checkbox" data-answer-id="4"><input type="checkbox" name="mutation-sub"  data-answer-id="4|0"><div class="label">I’m not sure</div></div>
          </div>
          <br>
          <div class="answers">
            <button id="mutation-sub-btn" disabled>Continue</button>
          </div>
        </div>        

        <div class="question gif" data-question-id="5">
            <div class="anim-gif stopwatch">
               <img src="img/Stopwatch.gif">
            </div>        
          <div class="prompt">Do you get an average of 30 minutes of physical activity at least five times a week?</div>
        
          <div class="answers">
            <button data-answer-id="+1">Yes</button>
            <button data-answer-id="-1">No</button>
          </div>
        </div>

        <div class="question cb3" data-question-id="17">
          <div class="prompt">Within <span class="pink-text">one side</span> of the family (both on mom’s side or both on dad’s side), is there breast cancer <span class="pink-text">and</span> one of the following cancers?</div>
          <div class="checkbox-list column-left">        
            <div class="checkbox" data-answer-id="1"><input type="checkbox" data-answer-id="1|-1"><div class="label">Ovarian cancer</div></div>
            <div class="checkbox" data-answer-id="2"><input type="checkbox" data-answer-id="2|-1"><div class="label">Pancreatic cancer</div></div>
            <div class="checkbox" data-answer-id="3"><input type="checkbox" data-answer-id="3|-1"><div class="label">Thyroid cancer</div></div>
            <div class="checkbox" data-answer-id="4"><input type="checkbox" data-answer-id="4|-1"><div class="label">Uterine cancer</div></div>
            <div class="checkbox" data-answer-id="5"><input type="checkbox" data-answer-id="5|-1"><div class="label">Sarcoma cancer</div></div>
            <div class="checkbox" data-answer-id="6"><input type="checkbox" data-answer-id="6|-1"><div class="label">Leukemia or Lymphoma</div></div>
          </div>
          <div class="checkbox-list column-right">
            <div class="checkbox" data-answer-id="7"><input type="checkbox" data-answer-id="7|-1"><div class="label">Melanoma cancer</div></div>
            <div class="checkbox" data-answer-id="8"><input type="checkbox" data-answer-id="8|-1"><div class="label">Adrenocortical Carcinoma</div></div>
            <div class="checkbox" data-answer-id="9"><input type="checkbox" data-answer-id="9|-1"><div class="label">Stomach cancer</div></div>
            <div class="checkbox" data-answer-id="10"><input type="checkbox" data-answer-id="10|-1"><div class="label">Brain cancer</div></div>
            <div class="checkbox" data-answer-id="12"><input type="checkbox" data-answer-id="12|0"><div class="label">I’m not sure</div></div>
            <div class="checkbox" data-answer-id="11"><input type="checkbox" data-answer-id="11|+1"><div class="label">None of the above</div></div>
          </div>     

          <div class="answers">
            <button>Continue</button>
            <button class="sub ask" data-answer-id="13">Help me ask them</button>
          </div>
        </div>

        <div class="question" data-question-id="8">
          <div class="prompt">Have you ever been told by a doctor that you have “dense breast tissue”?</div>
        
          <div class="answers">
            <button data-answer-id="-1">Yes</button>
            <button data-answer-id="+1">No</button>
          </div>
        </div>

        <div class="question" data-question-id="19">
          <div class="prompt">Did you receive radiation to the chest during childhood to treat Hodgkin’s disease, non-Hodgkin’s lymphoma, or another cancer?</div>
        
          <div class="answers">
            <button data-answer-id="-1">Yes</button>
            <button data-answer-id="+1">No</button>
          </div>
        </div>

        <div class="question" data-question-id="9">
          <div class="prompt">How old were you when you first got your period?</div>
        
          <div class="answers">
            <button data-answer-id="-1">Under 12</button>
            <button data-answer-id="+1">12 or older</button>
          </div>
        </div>

        <div class="question" data-question-id="20">
          <div class="prompt">Do you have one or more <span class="pink-text">immediate family members</span> (parent, sibling, grandparent, aunt or uncle) that have had breast cancer at age 50 or older?</div>
        
          <div class="answers">
            <button data-answer-id="-1">Yes</button>
            <button data-answer-id="+1">No</button>
            <button class="sub ask" data-answer-id="3">Help me ask them</button>
          </div>
        </div>

        <div class="question gif" data-question-id="10">
            <div class="anim-gif birth">
               <img src="img/BirthControl.gif">
            </div>        
          <div class="prompt">Have you taken birth control pills for five or more years — it doesn’t have to be consecutive! — during your 20s or 30s?</div>
        
          <div class="answers">
            <button data-answer-id="+1">Yes</button>
            <button data-answer-id="0">No</button>
          </div>
        </div>

        <div class="question" data-question-id="21">
          <div class="prompt">Have you ever had an abnormal breast biopsy?</div>
        
          <div class="answers">
            <button data-answer-id="-1">Yes</button>
            <button data-answer-id="+1">No</button>
          </div>
        </div>

        <div class="question" data-question-id="11">
          <div class="prompt">Have you ever given birth?</div>
        
          <div class="answers">
            <button data-answer-id="+1">Yes</button>
            <button data-answer-id="-1">No</button>
          </div>
        </div>

        <div class="question" data-question-id="12">
          <div class="prompt">Have you breastfed before or do you plan to breastfeed in the future?</div>
        
          <div class="answers">
            <button data-answer-id="+1">Yes</button>
            <button data-answer-id="-1">No</button>
          </div>
        </div>
        <div class="share">
          <button class="btn-results">VIEW YOUR RESULTS</button><br><br>
          <h4 class="save-share">Save the life of somebody you love. Tell them to complete this experience too.</h4><button class="share-btn"><a href="https://twitter.com/intent/tweet?text=Check+out+Bright+Pink%27s+%23AssessYourRisk+tool+to+assess+and+reduce+your+risk+for+breast+and+ovarian+cancer.+http%3A%2F%2FAssessYourRisk.org" target="_blank"><img src="img/twitter.svg"></a><a href="#" onclick="fb_share('http://brightenup.sew.la', 'BrightPink Assessment', '1 in 8 women will develop breast cancer at some point in her lifetime. 1 in 67 will develop ovarian cancer.', 'http://brightenup.sew.la/img/brightpink_logo.png', 520, 350)"><img src="img/facebook.svg"></a><a href="#" onclick="shareMail();"><img src="img/mail.svg"></a>SHARE</button>
        </div>
      </div>
    </section>

<!-- EDUCATION -->
    <section class="education">
      <div class="fb-faces">
          <div class="faces lifestyle"></div>
          <div class="faces knowing"></div>
          <div class="faces family"></div>
      </div>
      <!-- MASTER VIDEO -->    
      <div id="bg-vid" class="video">
        <!-- <video class="bg-video" src="" type="video/mp4" preload="auto" autoplay loop></video> -->
      </div>
      <div class="dots">
        <h6>Lifestyle</h6>
        <h6>Your Normal</h6>
        <h6>Family History</h6>
      </div>
      <div class="nav">
        <div class="nav-item">Lifestyle</div>
        <div class="nav-item">Your Normal</div>
        <div class="nav-item">Family & Health History</div>
      </div>
      <div class="education-menu">
        <div class="module-hero">
          <div class="how">Understand How</div>
          <h1>Lifestyle</h1>
          <div class="effect">Affects Your Risk</div>
        </div>
        <div class="module-hero">
          <div class="how">Understand How</div>
          <h1>Knowing Your Normal</h1>
          <div class="effect">Affects Your Risk</div>
        </div>        
        <div class="module-hero">
          <div class="how">Understand How</div>
          <h1>Family & Health History</h1>
          <div class="effect">Affects Your Risk</div>
        </div>
      </div>

<!-- LIFESTYLE -->

      <div class="module lifestyle">
        <div class="vignette main" data-src="running">
          <div class="headlines">
            <div class="headline">
              <div class="section-title">Understand Your Risk</div>
              <h3>Turns out, <i>life</i> affects your life</h3>
              <h5>Day-to-day decisions directly link to your risk of getting cancer. The stakes are high—make sure you’re doing all you can to make the most of it. Now that’s living proactively.</h5>
              <div class="btn-begin arrow"><img src="img/arrow_right.png"></div>
            </div>
          </div>
        </div>

        <div class="vignette" data-src="running">
          <!-- <div class="video">
            <video class="bg-video" type="video/mp4" loop></video>
          </div> -->
          <div class="headlines">
            <div class="headline">         
              <h3>Get Moving</h3>
              <h5>Women who get regular exercise may have a lower risk of breast cancer. Breaking a sweat for 30 minutes on most days can help reduce your risk by as much as 10-20 percent.</h5>
              <!-- <button class="btn-continue sub">CONTINUE</button> -->
            </div>
          </div>
        </div>

        <div class="vignette" data-src="fat">
          <!-- <div class="video">
            <video class="bg-video" type="video/mp4" loop></video>
          </div> -->
          <div class="headlines">
            <div class="headline">         
              <h3>Fight Fat</h3>
              <h5>Maintain a healthy body weight, as there’s a clear correlation between obesity and breast cancer. Extra fatty tissue produces extra estrogen, which can increase your risk. </h5>
              <!-- <button class="btn-continue sub">CONTINUE</button> -->
            </div>
          </div>
        </div>

        <div class="vignette" data-src="alcohol">
          <!-- <div class="video">
            <video class="bg-video" type="video/mp4" loop></video>
          </div> -->
          <div class="headlines">
            <div class="headline">         
              <h3>Cut Back on Cocktails</h3>
              <h5>There’s a known link between alcohol and breast cancer. Every drink you throw back affects your health. Limit your drinking to no more than one drink per day, and you’ll be doing yourself a favor.</h5>
              <!-- <button class="btn-continue sub">CONTINUE</button> -->
            </div>
          </div>
        </div>

        <div class="vignette" data-src="smoking">
          <!-- <div class="video">
            <video class="bg-video" type="video/mp4" loop></video>
          </div> -->
          <div class="headlines">
            <div class="headline"> 
              <h3>Go Smoke Free</h3>        
              <h5>Commit to quit. If you smoke, there are no excuses: there’s a direct through line from tobacco use to <i>many</i> diseases, including breast cancer.</h5>
            </div>
          </div>
        </div>

<!-- GUESSED on the vitamin-d data src? 
Spencer Added 1.Spend Some Time in the Sun and 2. Eat Well-->
        <div class="vignette" data-src="running">
          <div class="headlines">
            <div class="headline">
              <h3>Spend Some Time in the Sun</h3>
              <h5>Vitamin D plays a role in regulating breast cell growth. Studies have shown a 2.5x increase in the risk of breast cancer associated with Vitamin D deficiency, and a possible increase in ovarian cancer risk.</h5>
            </div>
          </div>
        </div>

        <div class="vignette" data-src="fat">
          <div class="headlines">
            <div class="headline">
              <h3>Eat Well</h3>
              <h5>What you eat affects your health. Follow a diet that’s low in fat and includes a mix of fruits, vegetables, whole grains, fat-free or low-fat dairy products, and lean proteins. Research shows a 12% increase in cancer risk for every 50g of red meat consumed each day.</h5>
            </div>
          </div>
        </div>
        <div class="vignette last" data-src="running">
          <div class="headlines">
            <div class="headline last">
              <div class="arrow"><img src="img/arrow_right.png"></div>
            	<h3 class="lifestyle-pledge-number">0 Women Have Pledged to Improve Their Lifestyles</h3>
              <h5>You can join them. By clicking the pledge button below, you’ll make that number go higher.</h5> 
            	<button class="facebook lifestyle">Pledge</button>
              <button class="btn-continue sub">CONTINUE TO KNOW YOUR NORMAL →</button>
            </div>
          </div>
        </div>
      </div>

<!-- KNOW YOUR NORMAL -->

      <div class="module normal">
        <div class="vignette main" data-src="lifestyle">
          <div class="headlines">
            <div class="section-title">Understand Your Risk</div>
            <div class="headline">
              <h3>Know What’s Normal For You</h3>
              <h5>Every body is different.  In order to know what’s up with <i>yours</i>, you have to be self-aware. It’s important to know what’s normal for <i>you</i> — that way, you’re equipped to recognize a change over time.</h5>
              <div class="btn-begin arrow"><img src="img/arrow_right.png"></div>
            </div>
          </div>
        </div>
        <div class="vignette" data-src="breastAwareness">
          <!-- <div class="video">
            <video class="bg-video" type="video/mp4" loop></video>
          </div> -->
          <div class="headlines">
            <div class="headline">         
              <h3>You Need to Know the Lay of the Land</h3>
              <h5>80% of breast cancers in young women are found by young women themselves.  
                Get to know what your breasts feel like.  
                They cover more real estate than you may realize: breast tissue extends up to the collarbone, around your side underneath your armpits, and into your breastbone.</h5>
        
        <!--       <ul>
                <li>Pay attention to changes in size, shape, contour, and color</li>
                <li>If a change persists or worsens for 2-3 weeks, it’s time to see a doctor</li>
              </ul>
               -->
              <!-- <button class="btn-continue sub">CONTINUE</button> -->

            </div>
          </div>
        </div>
        <div class="vignette" data-src="lifestyle">
          <!-- <div class="video">
            <video class="bg-video" type="video/mp4" loop></video>
          </div> -->
          <div class="headlines">
            <div class="headline">    
              <h3>What to Look Out For</h3> 
              <h5>Pay attention to changes in size, shape, contour, and color. If a change persists or worsens for 2-3 weeks, it’s time to see a doctor.</h5>    
              
              <h5>A few examples of abnormal symptoms:</h5>
              <ul>
                <li>A lump that’s hard and immobile</li>
                <li>Swelling, soreness or rash</li>
                <li>Warmth, redness or darkening</li>
                <li>Change in size or shape of either breast</li>
                <li>Dimpling or prickling of the skin</li>
                <li>An itchy, scaly sore, or rash around the nipple</li>
                <li>A nipple that becomes flat or inverted</li>
                <li>Nipple discharge</li>
                <li>New pain in one spot that does not go away</li>
                <li>Persistent itching</li>                                
                <li>Bumps that resemble bug bites</li>
              </ul>
              <!-- <button class="btn-continue sub">CONTINUE</button> -->
            </div>
          </div>
        </div>
        <div class="vignette" data-src="breastAwareness">
          <!-- <div class="video">
            <video class="bg-video" type="video/mp4" loop></video>
          </div> -->
          <div class="headlines">
            <div class="headline">         
              <h3>Let’s talk lumps.</h3>
              <h5>The most common breast cancer symptom is a lump. But some women have naturally lumpy breasts. Soft, mobile lumps that come and go are normal, but a lump that feels like a frozen pea is not. One that gets bigger and doesn’t go away for 2-3 weeks is not. If you find something, don’t panic — 80% of lumps aren’t cancerous — but make sure to go to your doctor.</h5>
            </div>
          </div>
        </div>

        <div class="vignette" data-src="lifestyle">
          <div class="headlines">
            <div class="headline">         
              <h3>The 4-1-1 on Ovarian Cancer</h3>
              <h5>Because there’s currently no effective test for ovarian cancer, watching for signs and symptoms is important. However, many of these can easily be mistaken for other issues, like PMS.</h5>
            </div>
          </div>
        </div>

        <div class="vignette" data-src="breastAwareness">
          <div class="headlines">
            <div class="headline"> 
              <h3>What to Watch For</h3> 
              <h5>Some clear signs of ovarian cancer can be symptoms like these, <i>when they persist or worsen for 2-3 weeks:</i></h5>
              <h6 class="primary-headline">Primary</h6>
              <ul>
                <li>Pelvic or abdominal pain</li>
                <li>Feeling the need to urinate frequently</li>
                <li>Prolonged bloating</li>
                <li>Difficulty eating or feeling full quickly</li>
              </ul> 
             <!--  <br> -->
              <h6>Secondary</h6>
              <ul>
                <li>Constipation</li>
                <li>Menstrual changes</li>
                <li>Back pain</li>
                <li>Upset stomach, heartburn</li>
                <li>Pain during intercourse</li>
              </ul>
              <h5>Like breast cancer symptoms, many ovarian cancer symptoms can come and go.  
                But if they persist or worsen for 2-3 weeks, see your doctor and ask — <i>could it be my ovaries?</i></h5>            
            </div>
          </div>
        </div>

        <div class="vignette" data-src="lifestyle">
          <div class="headlines">
            <div class="headline">         
              <h3>You &amp; Your Doctor</h3>
              <h5>A key part of living proactively is finding a doctor you trust.  
                He or she should listen to your questions, pay attention to your concerns, and provide clear recommendations.  
                Once you’ve “shopped around” and found one you like, plan on seeing them annually for a well-woman exam.</h5>
            </div>
          </div>
        </div>


        <div class="vignette" data-src="breastAwareness">
          <div class="headlines">
            <div class="headline">         
              <h3>The Well-Woman Exam</h3>
              <h5>These annual exams, which are covered in all insurance policies, should include a clinical breast exam that thoroughly covers all breast tissue and typically lasts several minutes.</h5>
              <br>
              <h6>Your well-woman exam should also include:</h6>
              <ul>
                <li>Clinical breast and pelvic exam starting at age 20</li>
                <li>A PAP smear — though it’s important to know these <i>don’t</i> check for ovarian cancer</li>
                <li>Mammogram beginning at age 40— but if you if you have a family history, ten years before the age your youngest relative was diagnosed</li>
              </ul> 
            </div>
          </div>
        </div>

        <div class="vignette" data-src="lifestyle">
          <!-- <div class="video">
            <video class="bg-video" type="video/mp4" loop></video>
          </div> -->
          <div class="headlines">
            <div class="headline">         
              <h3>Don’t Forget to Take Care on Your Own</h3>
              <h5>Sign up for a monthly Breast Health Reminder™ to be Breast Self Aware — that’s one text a month.  
                Text PINK (“P-I-N-K”) to 59227.</h5>
              <ul>
                <li>You will receive one message per month.  
                  Message will include instructions to quit.  
                  Text <b>STOP</b> to quit or <b>HELP</b> for info.  
                  Message and data rates may apply.  
                  No purchase necessary.  Automated messages will be delivered to the phone number you provide at opt-in.  
                  View Privacy Policy and Terms & Conditions <a href="http://mp.vibescm.com/p/1fdrw9">here</a>.  
                  All consumer information collected is subject to Bright Pink's Privacy Policy.</li>
              </ul>
              <!-- <button class="text-me">Text Me.</button> -->
              <!-- <button class="btn-continue sub">CONTINUE</button> -->
            </div>
          </div>
        </div>
        <div class="vignette last" data-src="breastAwareness">
          <div class="headlines">
            <div class="headline last">
              <div class="arrow"><img src="img/arrow_right.png"></div>
            	<h3 class="knowing-pledge-number">0 Women Have Pledged to Know Their Normal</h3>
              <h5>You can join them. By clicking the pledge button below, you’ll make that number go higher.</h5> 
            	<button class="facebook knowing">Pledge</button>
              <button class="btn-continue sub">CONTINUE TO FAMILY HISTORY →</button>
            </div>
          </div>
        </div>
      </div>
      
<!-- FAMILY HISTORY -->

      <div class="module family-history">
        <div class="vignette main" data-src="family">
          <div class="headlines">
            <div class="headline">
              <div class="section-title">Understand Your Risk</div>
              <h3>If you have breast and ovaries, you are at risk.</h3>  
              <h5>Family and health history is the <u>most important</u> thing to look at when it comes to being proactive about your health.</h5>
              <div class="btn-begin arrow"><img src="img/arrow_right.png"></div>
            </div>
          </div>
        </div>

        <div class="vignette" data-src="justbeyou_sequence">
          <div class="headlines">
            <div class="headline">         
              <h3>Family History &amp; Genetic Predisposition</h3>
              <h5>For a woman with family history or a genetic predisposition, lifetime breast cancer risk can be up to 87%. Lifetime ovarian cancer risk can be as high as 54%. Family history and genetic predisposition aren’t one in the same. For example, if a first-degree relative had breast cancer, your risk is increased <i>even if</i>j you don’t have a genetic predisposition.</h5>
            </div>
          </div>
        </div>

<!-- added Spencer due to recent copy -->
        <div class="vignette" data-src="lifestyle">
          <div class="headlines">
            <div class="headline">         
              <h3>Your Race and Ancestry Can Be a Factor</h3>
              <h5>For example, breast cancer is the most common cancer diagnosis among African American women.  
                And 1 in 40 individuals with Ashkenazi Jewish ancestry carry a BRCA 1 or BRCA 2 gene mutation, which puts them at higher risk.</h5>
            </div>
          </div>
        </div>

        <div class="vignette" data-src="mother">
          <div class="headlines">
            <div class="headline">         
              <h3>Having a Child Decreases Lifetime Risk</h3>
              <h5>Pregnancy transforms and stabilizes the cells that comprise milk-producing glands and ducts, making them less susceptible to abnormal cell growth.  
                The earlier this transformation happens, the lower the risk of breast cancer.  
                Some studies have shown that women with first pregnancies under the age of 30 have a 40-50% lower lifetime risk than women who gave birth later or who are never pregnant.</h5>
            </div>
          </div>
        </div>
        
        <div class="vignette" data-src="family">
          <div class="headlines">
            <div class="headline">         
              <h3>Your Personal Health History &amp; Lifestyle Choices Have a Big Effect As Well</h3>
            </div>
          </div>
        </div>

        <div class="vignette" data-src="mother">
          <div class="headlines">
            <div class="headline">
              <h3>Breastfeeding Lowers Risk for You <i>and</i> the Baby</h3>
              <h5>Breastfeeding for 1-2 years lowers your risk by decreasing the number of periods you’ll get over the course of your life.  
                Even better: the activity can help reduce the breast-fed baby’s own later-life risk.  
                Now <i>that’s</i> win-win.</h5>
            </div>
          </div>
        </div>

        <div class="vignette last" data-src="lifestyle">
          <div class="headlines">
            <div class="headline">         
              <h3>Birth Control is the #1 Factor for Decreased Ovarian Risk</h3>
              <h5>Taking birth control pills for 5 years — even non consecutive — in your 20s and 30s can reduce your ovarian cancer risk by nearly half.  
                Oral contraceptives are the single most important lifestyle choice you can make when it comes to the health of your ovaries.</h5>
              <!-- <button class="facebook family">Pledge to Learn Your Family History</button><br> -->
            </div>
             <div class="headline">
            	<h3 class="family-pledge-number">0 Women Have Pledged to Collect Their Family History</h3>
              <h5>You can join them. By clicking the pledge button below, you’ll make that number go higher.</h5> 
            	<button class="facebook family">Pledge</button>
            </div>
            <div class="headline last">            
              <div class="share">
                <div class="arrow"><img src="img/arrow_right.png"></div>
                <h3>Save the life of somebody you love. Tell them to complete this experience too.</h3>
                <br>
                <button class="share-btn"><a href="https://twitter.com/intent/tweet?text=Check+out+Bright+Pink%27s+%23AssessYourRisk+tool+to+assess+and+reduce+your+risk+for+breast+and+ovarian+cancer.+http%3A%2F%2FAssessYourRisk.org" target="_blank"><img src="img/twitter.svg"></a><a href="#" onclick="fb_share('http://brightenup.sew.la', 'BrightPink Assessment', '1 in 8 women will develop breast cancer at some point in her lifetime. 1 in 67 will develop ovarian cancer.', 'http://brightenup.sew.la/img/brightpink_logo.png', 520, 350)"><img src="img/facebook.svg"></a><a href="#" onclick="shareMail();"><img src="img/mail.svg"></a>SHARE</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<!-- FOOTER -->

    <footer id="site-footer" class="flex-container">
      <div class="flex-none">
        <a href="#"><span class="icon-facebook"></span></a>
        <a href="#"><span class="icon-twitter"></span></a>
      </div>
    </footer>
    
    <div class="overlay landscape-overlay">
      <img src="img/rotate-icon.png">
      <h1>Please rotate<br>your device</h1>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
    <script src="js/vendor/jquery.address-1.6.min.js"></script>
    <script src="js/plugins.js"></script>  
    <script src="js/main.js"></script>
    <script src="js/anim.js"></script>

     <!--CDN links for the latest TweenLite, CSSPlugin, and EasePack-->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/CSSPlugin.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/easing/EasePack.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
    <script src="js/weight.js"></script>
    <script src="js/height.js"></script>
    <script src="//d3js.org/d3.v3.min.js"></script>
    <script src="js/svg/DonutChartBuilder.js"></script>
    <script src="js/svg/SVGHelper.js"></script>

    <!--CDN links for the latest TweenLite, CSSPlugin, and EasePack-->
    <script
      src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/CSSPlugin.min.js">
    </script>
    <script
      src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/easing/EasePack.min.js">
    </script>
    <script
      src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js">
    </script>
    <script src="js/roulette.js"></script>
    <script src='js/vendor/pdfmake/build/pdfmake.min.js'></script>
    <script src='js/vendor/pdfmake/build/vfs_fonts.js'></script>
    <script src='js/pdf_gen.js'></script>

      <!-- CLIENT SIDE FACEBOOK SDK INCLUSION -->
    <script type="text/javascript">
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '757106917704007',
          xfbml      : true,
          version    : 'v2.2',
          cookie   : true,
          status     : true
        });
      };
    
      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));

    </script>

    <script>
        window.fbAsyncInit = function() {
          // init the FB JS SDK
          FB.init({
            appId      : '753349004746465',                        // App ID from the app dashboard
            channelUrl : '//WWW.YOUR_DOMAIN.COM/channel.html', // Channel file for x-domain comms
            status     : true,                                 // Check Facebook Login status
            xfbml      : true,                                  // Look for social plugins on the page
            version    : 'v2.2'
          });
      
          // Additional initialization code such as adding Event Listeners goes here
        };
      
        // Load the SDK asynchronously
        (function(d, s, id){
           var js, fjs = d.getElementsByTagName(s)[0];
           if (d.getElementById(id)) {return;}
           js = d.createElement(s); js.id = id;
           js.src = "//connect.facebook.net/en_US/all.js";
           fjs.parentNode.insertBefore(js, fjs);
         }(document, 'script', 'facebook-jssdk'));
      </script>

        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>

        <!--[if lt IE11]>-->
      <script>
        $('.border').css('display', 'none');

      </script>
    <!--<![endif]-->
    </body>


</html> 