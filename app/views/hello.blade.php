<!-- 
@include('partials.header')
@include('partials.intro')
@include('partials.assessment')
@include('partials.understand')
@include('partials.facts')
@include('partials.education')
@include('partials.footer')  -->

<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <title></title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width">
      <link rel="stylesheet" href="css/style.css">
      <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>

    <!-- INTRO -->

    <section id="intro" class="flex-container vertical-container">
      <h1>1 in 8 women get cancer. Pretend you are the 1.</h1>
      
      <a id="Begin" href="#Risk-Assessment"> <button class="action lifestyle"> Begin </button> </a>
    </section>

    <!-- RIGHT COLUMN -->
    <div class="right-column">
      <!-- UNDERSTAND -->
      
      <div class="understand-box">
        Understand Your Risk
        <div class="arrow"></div>
      </div>

      <!-- FACTS -->

      <div class="fact-group">
        <div class="fact">
          <p> <span class="data-number">12%</span> - or - <span class="data-number">1 in 8 Women</span> <br>
            will develop breast cancer at some point in their lifetime.
          </p>
        </div>
        <span class="icon-right"></span>
      </div>
    </div>

    <!-- ASSESSMENT-->
    <section id="assessment" class="scrollpane">    
      <section class="intro" class="vertical-container">
        <div class="vertically-centered">
          <h3 class="mobile-hide"> Bright Pink created an assessment to help you understand your personal level of cancer risk.</p> <p>This information can be life saving.</h3>
          <!-- <p class=""><strong>Let's assume you have cancer until you...</strong></p> -->
          <!-- <h1>Assess Your Risk</h1> -->
            <button class="action"> Assess Your Risk  </button>
        </div>
      </section>
      <div class="assessment-wrap">
        <div class="dots">
          <div class="dot"><span class="tooltip-bottom dot" data-tooltip="You made a good choice. Keep it up."></span></div>
          <div class="dot"><span class="tooltip-bottom dot" data-tooltip="You don't know this portion. This poses significant risk."></span></div>
          <div class="dot"><span class="tooltip"></span></div>
          <div class="dot"><span class="tooltip"></span></div>
          <div class="dot"><span class="tooltip"></span></div>
          <div class="dot"><span class="tooltip"></span></div>
          <div class="dot"><span class="tooltip"></span></div>
          <div class="dot"><span class="tooltip"></span></div>
          <div class="dot"><span class="tooltip"></span></div>
          <div class="dot"><span class="tooltip"></span></div>
          <div class="dot"><span class="tooltip"></span></div>
          <div class="dot"><span class="tooltip"></span></div>
          <div class="dot"><span class="tooltip"></span></div>
          <div class="dot"><span class="tooltip"></span></div>
          <div class="dot"><span class="tooltip"></span></div>
          <div class="dot"><span class="tooltip"></span></div>
          <div class="dot"><span class="tooltip"></span></div>
          <div class="dot"><span class="tooltip"></span></div>
        </div>
        <div class="question">
          <div class="prompt">Do you have breasts and/or ovaries?</div>
        
          <div class="answers">
            <div class="answer">Yes</div>
          </div>
        </div>


        <div class="question">
          <div class="prompt">Is your body mass index (BMI) between 18.5 - 24.9?</div>
          <div class="visual">
            <div class="prompt">What is your weight?</div>

            <slider>10-400+lbs</slider>
            <div class="prompt">What is your height?</div>

            <slider>12-96"</slider>
          </div>
        
          <div class="answers">
            <div class="answer"># lbs</div>
            <div class="answer"># "</div>
          </div>
          <div class="button">Continue</div>
          <div class="button">Lifestyle Fact</div>
        </div>


        <div class="question">
          <div class="prompt">Drag drink icon to the number of drinks per day you have. </div>
          <div class="visual">Slider</div>
        
          <div class="answers">
            <div class="answer">0</div>
            <div class="answer">1</div>
            <div class="answer">2</div>
            <div class="answer">3</div>
            <div class="answer">4</div>
            <div class="answer">5</div>
            <div class="answer">6</div>
            <div class="answer">7</div>
            <div class="answer">8</div>
            <div class="answer">9</div>
            <div class="answer">10</div>
          </div>
          <div class="button">Continue</div>
          <div class="button">Lifestyle Fact</div>
        </div>


        <div class="question">
          <div class="prompt">Do you smoke?</div>
          <div class="visual"></div>
        
          <div class="answers">
            <div class="answer">Yes</div>
            <div class="answer">No</div>
          </div>
          <div class="button">Continue</div>
        </div>

        <div class="question">
          <div class="prompt">Do you get an average of 30 minutes of physical activity at least five times a week?</div>
          <div class="visual"></div>
        
          <div class="answers">
            <div class="answer">Yes</div>
            <div class="answer">No</div>
          </div>
          <div class="button">Continue</div>
        </div>

        <div class="question">
          <div class="prompt">Do you follow a diet that’s low in fat and includes a mix of fruits, vegetables, whole grains, fat-free or low-fat dairy products, and lean proteins?</div>
          <div class="visual"></div>
        
          <div class="answers">
            <div class="answer">Yes</div>
            <div class="answer">No</div>
          </div>
          <div class="button">Continue</div>
        </div>

        <div class="question">
          <div class="prompt">Have you taken oral contraceptives (birth control pills) for five years (does not have to be consecutive) during your 20s or 30s?</div>
          <div class="visual"></div>
        
          <div class="answers">
            <div class="answer">Yes</div>
            <div class="answer">No</div>
          </div>
          <div class="button">Continue</div>
        </div>

        <div class="question">
          <div class="prompt">Have you ever been pregnant?</div>
          <div class="visual"></div>
        
          <div class="answers">
            <div class="answer">Yes</div>
            <div class="answer">No</div>
          </div>
          <div class="button">Continue</div>
        </div>

        <div class="question">
          <div class="prompt">Have you or any of your immediate family members (parent; sibling; grandparent; aunt) had any of the following...</div>
          <div class="visual"></div>
        <input type="checkbox"> Breast cancer diagnosed at age 50 or under </input><br>
        <input type="checkbox"> Triple negative (ER/PR/her2-) breast cancer</input><br>
        <input type="checkbox"> More than one breast cancer (cancer in both breasts, or two separate breast cancers in one breast)</input><br>
        <input type="checkbox"> Male breast cancer </input><br>
        <input type="checkbox"> A genetic mutation that increases breast cancer risk (Ex. BRCA1/2, PTEN, p53)? </input>
          <div class="button">Continue</div>
          <div class="button">Help me ask them</div>
          <div class="button">Remind me</div>
        </div>

        <div class="question">
          <div class="prompt">Have you or any family members had ovarian cancer?</div>
          <div class="visual"></div>
        
          <div class="answers">
            <div class="answer">Yes</div>
            <div class="answer">No</div>
          </div>
          <div class="button">Continue</div>
          <div class="button">Help me ask them</div>
          <div class="button">Remind me</div>
        </div>

        <div class="question">
          <div class="prompt">Within one side of the family (both on mom’s side or both on dad’s side), is there breast cancer and one of the following cancers?</div>
          <div class="visual"></div>
        
          <div class="answers">
            <div class="answer">Ovarian cancer</div>
            <div class="answer">Pancreatic cancer</div>
            <div class="answer">Thyroid cancer</div>
            <div class="answer">Uterine cancer</div>
            <div class="answer">Sarcoma cancer</div>
            <div class="answer">Leukemia or Lymphoma</div>
            <div class="answer">Melanoma cancer</div>
            <div class="answer">Adrenocortical Carcinoma</div>
            <div class="answer">Stomach cancer</div>
            <div class="answer">Brain Cancer</div>
          </div>
          <div class="button">Continue</div>
          <div class="button">Help me ask them</div>
        </div>

        <div class="question">
          <div class="prompt">Do you have a relative with both breast cancer and one of the following cancers?</div>
          <div class="visual"></div>
        
          <div class="answers">
            <div class="answer">Ovarian cancer</div>
            <div class="answer">Pancreatic cancer</div>
            <div class="answer">Thyroid cancer</div>
            <div class="answer">Uterine cancer</div>
            <div class="answer">Sarcoma cancer</div>
            <div class="answer">Leukemia or Lymphoma</div>
            <div class="answer">Melanoma cancer</div>
            <div class="answer">Adrenocortical Carcinoma</div>
            <div class="answer">Stomach cancer</div>
            <div class="answer">Brain Cancer</div>
          </div>
          <div class="button">Continue</div>
          <div class="button">Help me ask them</div>
        </div>

        <div class="question">
          <div class="prompt">Are you of Ashkenazi (Eastern European) Jewish ancestry with breast, ovarian, or pancreatic cancer in the family?</div>
          <div class="visual"></div>
        
          <div class="answers">
            <div class="answer"></div>
            <div class="answer"></div>
          </div>
          <div class="button">Continue</div>
          <div class="button">Help me ask them</div>
          <div class="button">Remind me</div>
        </div>

        <div class="question">
          <div class="prompt">Did you receive any radiation to the chest during childhood to treat Hodgkin’s disease, non-Hodgkin’s lymphoma, or another cancer?</div>
          <div class="visual"></div>
        
          <div class="answers">
            <div class="answer">Yes</div>
            <div class="answer">No</div>
          </div>
          <div class="button">Continue</div>
        </div>

        <div class="question">
          <div class="prompt">Do you have one or more immediate family members (parent; sibling; grandparent; aunt) that have had breast cancer at age 50 or older?</div>
          <div class="visual"></div>
        
          <div class="answers">
            <div class="answer">Yes</div>
            <div class="answer">No</div>
          </div>

          <div class="button">Continue</div>
          <div class="button">Help me ask them</div>
          <div class="button">Remind me</div>
        </div>
        <div class="question">
          <div class="prompt">Do you know the signs and symptoms of breast and ovarian cancer?</div>
          <div class="visual"></div>
        
          <div class="answers">
            <div class="answer">No</div>
          </div>
      </div>
      </div>
    </section>

    <!-- EDUCATION -->
    <section id="education">
      <div class="vignette">
        <div class="video">Woman Running</div>
        <div class="headlines">
          <div class"headline">Women who get regular exercise may have a lower risk of breast cancer</div>
          <div class"headline">Although not all studies show this benefit, when the evidence is looked at as a whole, regular exercise appears to lower breast cancer risk by about 10 to 20 percent</div>
        </div>
        <div class="headlines">
          These women have all pledged to _____. Join or encourage them!
        </div>
        <div class="visual">Image Grid</div>

        <div class="button">Pledge to Exercise</div>
        <div class="button">Facebook</div>
        <div class="button">Twitter</div>
      </div>



      <div class="vignette">
        <div class="video">Fries or Vegetables</div>
        <div class="headlines">
          <div class"headline">Maintain a healthy weight and reduce your fat intake. </div>
          <div class"headline">There is a clear link between obesity and breast cancer because extra fatty tissue leads to extra estrogen production, which leads to an increased risk of breast cancer.</div>
        </div>
        <div class="button">Pledge to lose weight</div>
      </div>

      <div class="vignette">
        <div class="video">Bottle breaking</div>
        <div class="headlines">
          <div class"headline">There is a known link between alcohol and breast cancer.</div>
          <div class"headline">Limit alcohol to one drink per day, or avoid it completely.</div>
        </div>
        <div class="button">Pledget to Drink Less</div>
      </div>

      <div class="vignette">
        <div class="video">Breastfeeding</div>
        <div class="headlines">
          <div class"headline">If it makes sense for you, breastfeeding for 1-2 years, not necessarily consecutively, may lower your breast cancer risk by decreasing the number of periods you have over the course of your life.</div>
        </div>
        <div class="button">Pledge to Breastfeed</div>
      </div>

      <div class="vignette">
        <div class="video">Cigarette out</div>
        <div class="headlines">
          <div class"headline">Smoking may increase the risk of breast cancer. </div>
          <div class"headline">We know how hard it can be to quit, but if you smoke, we ask that you commit to quit today and take advantage of Bright Pink’s smoke cessation resources online.</div>
        </div>
        <div class="button">Pledge to quit</div>
      </div>

      <div class="vignette">
        <div class="video">Birth control dial</div>
        <div class="headlines">
          <div class"headline">There are far fewer lifestyle behaviors known to reduce your ovarian cancer risk. However, taking oral contraceptives, or birth control pills, for 5 years in your 20s and 30s can actually reduce your risk by up to 50%.</div>
          <div class"headline"> 5 years do not have to be consecutive—just any time in your 20s and 30s. Risk can be reduced by up to 50% (reduction by half is not guaranteed and depends on multiple other factors)</div>
        </div>
        <div class="button">Pledge to start birth control</div>
      </div>
    </div>


    <!-- FOOTER -->

    </div><footer id="site-footer" class="flex-container">
      <div class="flex-none">
        <a href="#"><span class="icon-facebook"></span></a>
        <a href="#"><span class="icon-twitter"></span></a>
      </div>
    </footer>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

        <script src="js/plugins.js"></script>
        <script src="js/script.js"></script>

        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html> 