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
	<div class="logo"><img src="img/brightpink_logo.jpg"></div>
    <!-- INTRO -->

    <section class="intro" class="flex-container vertical-container">
      <h1>1 in 8 women get cancer. Pretend you are the 1.</h1>
      
      <a id="Begin" href="#Risk-Assessment"> <button class="action lifestyle"> Begin </button> </a>
    </section>

    <!-- RIGHT COLUMN -->
    <div class="right-column">
      <!-- UNDERSTAND -->
      
      <div class="understand-box">
        <h4>Understand<br>Your Risk<br>></h4>
        <div class="arrow"></div>
      </div>

      <!-- FACTS -->

      <div class="fact-group">
        <div class="fact">
          <h5><span class="data-number">1 in 8 Women</span> <br>will develop breast cancer at some point in her lifetime.</h5>
        </div>
        <span class="icon-right"></span>
      </div>
    </div>
    <!-- ASSESSMENT-->
    <section class="assessment scrollpane"> 
    <div class="section-title">Assess Your Risk</div>
      <section class="assessment-intro in">
        <div class="vertically-centered">
          <h4 class="mobile-hide"> Bright Pink created an assessment to help you understand your personal level of cancer risk.</p> <p>This information can be life saving.</h4>
          <!-- <p class=""><strong>Let's assume you have cancer until you...</strong></p> -->
          <!-- <h1>Assess Your Risk</h1> -->
            <button class="action"> Assess Your Risk</button>
        </div>
      </section>
      <div class="dots">
          <div class="dot active"><span class="tooltip-bottom" data-tooltip="You made a good choice. Keep it up."></span></div>
          <div class="dot"><span class="tooltip-bottom" data-tooltip="You don't know this portion. This poses significant risk."></span></div>
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
      <div class="assessment-wrap">
        <div class="question">
          <div class="prompt">Do you have breasts and/or ovaries?</div>
        
          <div class="answers">
            <button>Yes</button>
            <button>No</button>
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
            <button># lbs</button>
            <button># "</button>
          </div>
        </div>


        <div class="question">
          <div class="prompt">Drag drink icon to the number of drinks per day you have. </div>
          <div class="visual">Slider</div>
        
          <div class="answers">
            <button>0</button>
            <button>1</button>
            <button>2</button>
            <button>3</button>
            <button>4</button>
            <button>5</button>
            <button>6</button>
            <button>7</button>
            <button>8</button>
            <button>9</button>
            <button>10</button>
          </div>
        </div>


        <div class="question">
          <div class="prompt">Do you smoke?</div>
          <div class="visual"></div>
        
          <div class="answers">
            <button>Yes</button>
            <button>No</button>
          </div>
        </div>

        <div class="question">
          <div class="prompt">Do you get an average of 30 minutes of physical activity at least five times a week?</div>
          <div class="visual"></div>
        
          <div class="answers">
            <button>Yes</button>
            <button>No</button>
          </div>
        </div>

        <div class="question">
          <div class="prompt">Do you follow a diet that’s low in fat and includes a mix of fruits, vegetables, whole grains, fat-free or low-fat dairy products, and lean proteins?</div>
          <div class="visual"></div>
        
          <div class="answers">
            <button>Yes</button>
            <button>No</button>
          </div>
        </div>

        <div class="question">
          <div class="prompt">Have you taken oral contraceptives (birth control pills) for five years (does not have to be consecutive) during your 20s or 30s?</div>
          <div class="visual"></div>
        
          <div class="answers">
            <button>Yes</button>
            <button>No</button>
          </div>
        </div>

        <div class="question">
          <div class="prompt">Have you ever been pregnant?</div>
          <div class="visual"></div>
        
          <div class="answers">
            <button>Yes</button>
            <button>No</button>
          </div>
        </div>

        <div class="question">
          <div class="prompt">Have you or any of your immediate family members<span class="asterisk">*</span><div class="definition">parent, sibling, grandparent or aunt</div> had any of the following...</div>
          <div class="visual"></div>
        <input type="checkbox"> Breast cancer diagnosed at age 50 or under </input><br>
        <input type="checkbox"> Triple negative (ER/PR/her2-) breast cancer</input><br>
        <input type="checkbox"> More than one breast cancer (cancer in both breasts, or two separate breast cancers in one breast)</input><br>
        <input type="checkbox"> Male breast cancer </input><br>
        <input type="checkbox"> A genetic mutation that increases breast cancer risk (Ex. BRCA1/2, PTEN, p53)? </input><br>
          <button class="sub">Help me ask them</button>
          <button class="sub">Remind me</button>
        </div>

        <div class="question">
          <div class="prompt">Have you or any family members had ovarian cancer?</div>
          <div class="visual"></div>
        
          <div class="answers">
            <button>Yes</button>
            <button>No</button>
          </div>
          <button class="sub">Help me ask them</button>
          <button class="sub">Remind me</button>
        </div>

        <div class="question">
          <div class="prompt">Within one side of the family (both on mom’s side or both on dad’s side), is there breast cancer and one of the following cancers?</div>
          <div class="visual"></div>
        
          <div class="answers">
            <input type="checkbox">Ovarian cancer</input><br>
            <input type="checkbox">Pancreatic cancer</input><br>
            <input type="checkbox">Thyroid cancer</input><br>
            <input type="checkbox">Uterine cancer</input><br>
            <input type="checkbox">Sarcoma cancer</input><br>
            <input type="checkbox">Leukemia or Lymphoma</input><br>
            <input type="checkbox">Melanoma cancer</input><br>
            <input type="checkbox">Adrenocortical Carcinoma</input><br>
            <input type="checkbox">Stomach cancer</input><br>
            <input type="checkbox">Brain Cancer</input><br>
          </div>
          <button class="sub">Help me ask them</button>
        </div>

        <div class="question">
          <div class="prompt">Do you have a relative with both breast cancer and one of the following cancers?</div>
          <div class="visual"></div>
        
          <div class="answers">
           <input type="checkbox">Ovarian cancer</input>
           <input type="checkbox">Pancreatic cancer</input>
           <input type="checkbox">Thyroid cancer</input>
           <input type="checkbox">Uterine cancer</input>
           <input type="checkbox">Sarcoma cancer</input>
           <input type="checkbox">Leukemia or Lymphoma</input>
           <input type="checkbox">Melanoma cancer</input>
           <input type="checkbox">Adrenocortical Carcinoma</input>
           <input type="checkbox">Stomach cancer</input>
           <input type="checkbox">Brain Cancer</input>
          </div>
          <button class="sub">Help me ask them</button>
        </div>

        <div class="question">
          <div class="prompt">Are you of Ashkenazi (Eastern European) Jewish ancestry with breast, ovarian, or pancreatic cancer in the family?</div>
          <div class="visual"></div>
        
          <div class="answers">
            <button></button>
            <button></button>
          </div>
          <button class="sub">Help me ask them</button>
          <button class="sub">Remind me</button>
        </div>

        <div class="question">
          <div class="prompt">Did you receive any radiation to the chest during childhood to treat Hodgkin’s disease, non-Hodgkin’s lymphoma, or another cancer?</div>
          <div class="visual"></div>
        
          <div class="answers">
            <button>Yes</button>
            <button>No</button>
          </div>
        </div>

        <div class="question">
          <div class="prompt">Do you have one or more immediate family members<span class="asterisk">*</span><span class="definition">parent, sibling, grandparent or aunt</span> that have had breast cancer at age 50 or older?</div>
          <div class="visual"></div>
        
          <div class="answers">
            <button>Yes</button>
            <button>No</button>
          </div>

          <button class="sub">Help me ask them</button>
          <button class="sub">Remind me</button>
        </div>
        <div class="question">
          <div class="prompt">Do you know the signs and symptoms of breast and ovarian cancer?</div>
          <div class="visual"></div>
        
          <div class="answers">
            <button>No</button>
          </div>
      </div>
      </div>
    </section>

    <!-- EDUCATION -->
    <section class="education">
      <div class="vignette">
        <div class="video">Woman Running</div>
        <div class="headlines">
          <h3>Women who get regular exercise may have a lower risk of breast cancer</h3>
          <h3>Although not all studies show this benefit, when the evidence is looked at as a whole, regular exercise appears to lower breast cancer risk by about 10 to 20 percent</h3>
          <h3>These women have all pledged to _____. Join or encourage them!</h3>
        </div>
        <div class="visual">Image Grid</div>

        <button class="sub">Pledge to Exercise</button>
        <button class="sub">Facebook</button>
        <button class="sub">Twitter</button>
      </div>



      <div class="vignette">
        <div class="video">Fries or Vegetables</div>
        <div class="headlines">
          <h3>Maintain a healthy weight and reduce your fat intake. </h3>
          <h3>There is a clear link between obesity and breast cancer because extra fatty tissue leads to extra estrogen production, which leads to an increased risk of breast cancer.</h3>
        </div>
        <button class="sub">Pledge to lose weight</button>
      </div>

      <div class="vignette">
        <div class="video">Bottle breaking</div>
        <div class="headlines">
          <h3>There is a known link between alcohol and breast cancer.</h3>
          <h3>Limit alcohol to one drink per day, or avoid it completely.</h3>
        </div>
        <button class="sub">Pledget to Drink Less</button>
      </div>

      <div class="vignette">
        <div class="video">Breastfeeding</div>
        <div class="headlines">
          <h3>If it makes sense for you, breastfeeding for 1-2 years, not necessarily consecutively, may lower your breast cancer risk by decreasing the number of periods you have over the course of your life.</h3>
        </div>
        <button class="sub">Pledge to Breastfeed</button>
      </div>

      <div class="vignette">
        <div class="video">Cigarette out</div>
        <div class="headlines">
          <h3>Smoking may increase the risk of breast cancer. </h3>
          <h3>We know how hard it can be to quit, but if you smoke, we ask that you commit to quit today and take advantage of Bright Pink’s smoke cessation resources online.</h3>
        </div>
        <button class="sub">Pledge to quit</button>
      </div>

      <div class="vignette">
        <div class="video">Birth control dial</div>
        <div class="headlines">
          <h3>There are far fewer lifestyle behaviors known to reduce your ovarian cancer risk. However, taking oral contraceptives, or birth control pills, for 5 years in your 20s and 30s can actually reduce your risk by up to 50%.</h3>
          <h3> 5 years do not have to be consecutive—just any time in your 20s and 30s. Risk can be reduced by up to 50% (reduction by half is not guaranteed and depends on multiple other factors)</h3>
        </div>
        <button class="sub">Pledge to start birth control</button>
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
        <script src="js/main.js"></script>

        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html> 