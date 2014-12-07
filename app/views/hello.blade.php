<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width,maximum-scale=1,initial-scale=1,user-scalable=yes, minimal-ui" />
    <link rel="stylesheet" href="css/style.css">
    <script src="js/vendor/modernizr-2.6.2.min.js"></script>
  </head>
  <body>
    <div class="border"></div>
    <div class="logo in"><img src="img/brightpink_logo.jpg"></div>
    <div class="logo-white"><img src="img/brightpink_logo_white.png"></div>
    <div class="overlay">
    	<button class="close-btn">✕ &nbsp; close</button>
    	<h1>Then <a href="#">share</a> this with someone you care about that does. You just might save her life.</h1>
    </div>
    <!-- INTRO -->

    <section class="intro" class="flex-container vertical-container">
      <img class="wheel" src="img/wheel.png">
      
      <a id="Begin" href="#Risk-Assessment"> <button class="action lifestyle"> Assess Your Risk </button> </a>
    </section>
    <!-- RIGHT COLUMN -->
    <div class="right-column">
      <!-- UNDERSTAND -->
      <div class="toggle-box">
        <div class="understand">
          <h4>Understand<br>Your Risk<br></h4>
          <div class="arrow"><img src="img/arrow_right.png"></div>
        </div>
        <div class="assess">
          <h4>Assess<br>Your Risk<br></h4>
          <div class="arrow"><img src="img/arrow_left.png"></div>
        </div>
      </div>

      <!-- FACTS -->

      <div class="fact-group">
        <div class="assessment-facts">
          <div class="fact">
            <img src="img/donut.png"><br><br>
            <h5><span class="data-number">1 in 8 Women</span> <br>will develop breast cancer at some point in her lifetime.</h5>
          </div>
        </div>
        <div class="education-facts">
          <div class="fact">
            <span class="q-num">Q: 1 of 15</span> <br>Do you have breasts and/or ovaries?
          </div>
        </div>
      </div>

      <!-- DASH -->

	    <div class="dashboard">
  			<!-- <div class="label">MY PROGRESS</div> -->
        <div class="progress">
          <div class="chart">20%</div>
          <h6>ASSESSMENT</h6>
        </div>
        <div class="progress">
          <div class="chart">68%</div>
          <h6>EDUCATION</h6>
        </div>
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
    		<div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
		    <div class="tooltip-bottom"></div>
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
          <div class="prompt">Have you ever been diagnosed with either of the following?</div>
        
          <div class="answers">
            <button>Breast cancer</button>
            <button>Ovarian cancer</button>
            <button>None</button>
          </div>
        </div>
		
        <div class="question">
          <div class="prompt">Have you or any of your close relatives been diagnosed with a genetic mutation that increases breast or ovarian cancer risk?</div>
        
          <div class="answers">
            <button>Yes, I've tested positive for a specific gene mutation</button>
            <button>Yes, a relative has but I've tested negative for that mutation</button>
            <button>Yes, a relative has, but I've not yet been tested</button>
            <button>No</button>
          </div>
        </div>

		    <div class="question">
          <div class="prompt">Which gene mutation have your or your relative(s) been diagnosed with?</div>
        
          <div class="checkbox-list">
            <div class="checkbox"><input type="checkbox"><div class="label">BRCA 1/2, Lynch Syndrome,  Li-Fraumeni Syndrome, Cowden Syndrome, Diffuse Gastric and Lobular Breast Cancer syndrome, Peutz-Jeghers Syndrome (PJS) or De Novo Mutation Rate</div></div>
            <div class="checkbox"><input type="checkbox"><div class="label">Other specific mutation</div></div>
            <div class="checkbox"><input type="checkbox"><div class="label">VUS<div class="definition">variant of uncertain significance</div> </div></div>
          </div>
          <br>
          <br>
          <button>Continue</button>
        </div>

        <div class="question">
          <div class="prompt">Have any of your immediate family members<span class="asterisk">*</span><div class="definition">parent, sibling, grandparent or aunt/uncle</div> been diagnosed with any of the following?</div>
        
          <div class="checkbox-list">
            <div class="checkbox"><input type="checkbox"><div class="label">Breast cancer diagnosed at age 50 or under</div></div>
            <div class="checkbox"><input type="checkbox"><div class="label">Triple negative (ER/PR/her2-) breast cancer</div></div>
            <div class="checkbox"><input type="checkbox"><div class="label">VUS<div class="definition">More than one breast cancer (cancer in both breasts, or two separate breast cancers in one breast)/div> </div></div></div>
            <div class="checkbox"><input type="checkbox"><div class="label">Male breast cancer</div></div>
          </div>
          <br>
          <br>
          <button>Continue</button>
          <button class="sub">Help me ask them</button>          
        </div>

		<div class="question">
          <div class="prompt">Within one side of the family (both on mom’s side or both on dad’s side), is there breast cancer and one of the following cancers, either in one person or in more than one?</div>
          <div class="checkbox-list half">        
            <div class="checkbox"><input type="checkbox"><div class="label">Ovarian cancer</div></div>
            <div class="checkbox"><input type="checkbox"><div class="label">Pancreatic cancer</div></div>
            <div class="checkbox"><input type="checkbox"><div class="label">Thyroid cancer</div></div>
            <div class="checkbox"><input type="checkbox"><div class="label">Uterine cancer</div></div>
            <div class="checkbox"><input type="checkbox"><div class="label">Sarcoma cancer</div></div>
          </div>
          <div class="checkbox-list half">
            <div class="checkbox"><input type="checkbox"><div class="label">Leukemia or Lymphoma</div></div>
            <div class="checkbox"><input type="checkbox"><div class="label">Melanoma cancer</div></div>
            <div class="checkbox"><input type="checkbox"><div class="label">Adrenocortical Carcinoma</div></div>
            <div class="checkbox"><input type="checkbox"><div class="label">Stomach cancer</div></div>
            <div class="checkbox"><input type="checkbox"><div class="label">Brain Cancer</div></div>
            <div class="checkbox"><input type="checkbox" checked><div class="label">None</div></div>
          </div>     
          <br>
          <br>
          <button>Continue</button>
          <button class="sub">Help me ask them</button>
        </div>

		<div class="question">
          <div class="prompt">Did you receive any radiation to the chest during childhood to treat Hodgkin’s disease, non-Hodgkin’s lymphoma, or another cancer?</div>
        
          <div class="answers">
            <button>Yes</button>
            <button>No</button>
          </div>
        </div>

		<div class="question">
          <div class="prompt">Do you have one or more immediate family members<span class="asterisk">*</span><div class="definition">parent, sibling, grandparent, aunt/uncle</div> that have had breast cancer at age 50 or older?</div>
        
          <div class="answers">
            <button>Yes</button>
            <button>No</button>
          </div>
        </div>

		<div class="question">
          <div class="prompt">Have you ever had an abnormal breast biopsy?</div>
        
          <div class="answers">
            <button>Yes</button>
            <button>No</button>
          </div>
        </div>

		<div class="question">
          <div class="prompt">How old are you?</div>
        
          <div class="answers">
          	<button>Under 20</button>
			<button>20-30</button>
			<button>31-35</button>
			<button>36-40</button>
			<button>40+</button>
          </div>
        </div>


        <div class="question">
          <div class="prompt">Is your body mass index (BMI) between 18.5 - 24.9? What is your weight?</div>
          <div class="visual">
				<div class="weight-container">
					<div id="weight-base"></div>
					<div id="weight-overlay"></div>
				</div>
				<div class="height-container">
					<div id="height-base"></div>
					<div id="height-overlay"></div>
				</div>
          </div>
          <br>
          <button class="btn-wrap">Continue</button>
        </div>


        <div class="question">
          <div class="prompt">Drag drink icon to the number of drinks per day you have — don’t forget to count the weekends!</div>
          <div class="bottle"><img src="img/assessment/bottle.png"></div>
          <div class="answers drinks">
            <div class="drink"><img src="img/assessment/drink_fill.png"></div>
            <div class="drink"><img src="img/assessment/drink_fill.png"></div>
            <div class="drink"><img src="img/assessment/drink_fill.png"></div>
            <div class="drink"><img src="img/assessment/drink_fill.png"></div>
            <div class="drink"><img src="img/assessment/drink_fill.png"></div>
            <div class="drink"><img src="img/assessment/drink_fill.png"></div>
            <div class="drink"><img src="img/assessment/drink_fill.png"></div>
            <div class="drink"><img src="img/assessment/drink_fill.png"></div>
            <div class="drink"><img src="img/assessment/drink_fill.png"></div>
            <div class="drink"><img src="img/assessment/drink_fill.png"></div>
          </div>
          <button>Continue</button>
        </div>

        <div class="question">
          <div class="prompt">Do you get an average of 30 minutes of physical activity at least five times a week?</div>
        
          <div class="answers">
            <button>Yes</button>
            <button>No</button>
          </div>
        </div>

        <div class="question">
          <div class="prompt">Have you taken birth control pills for five years — it doesn’t have to be consecutive! — during your 20s or 30s?</div>
        
          <div class="answers">
            <button>Yes</button>
            <button>No</button>
          </div>
        </div>

        <div class="question">
          <div class="prompt">Have you ever given birth?</div>
        
          <div class="answers">
            <button>Yes</button>
            <button>No</button>
          </div>
        </div>

		<div class="question">
          <div class="prompt">Have you breastfed before or do you plan to breastfeed in the future?</div>
        
          <div class="answers">
            <button>Yes</button>
            <button>No</button>
          </div>
        </div>

        <div class="question">
          <div class="prompt">Do you follow a diet that’s low in fat and includes a mix of fruits, vegetables, whole grains, fat-free or low-fat dairy products, and lean proteins?</div>
        
          <div class="answers">
            <button>Yes</button>
            <button>No</button>
          </div>
        </div>

        <div class="question">
          <div class="prompt">Do you smoke?</div>
        
          <div class="answers">
            <button>Yes</button>
            <button>No</button>
          </div>
        </div>

        <div class="question">
          <div class="prompt">Have you ever been told by a doctor that you have "dense breasts”?</div>
        
          <div class="answers">
            <button>Yes</button>
            <button>No</button>
          </div>
        </div>

        <div class="question">
          <div class="prompt">Have you ever been told that you have a Vitamin D deficiency?</div>
        
          <div class="answers">
            <button>Yes</button>
            <button>No</button>
          </div>
        </div>


        <div class="question">
          <div class="prompt">How old were you when you got your first period</div>
        
          <div class="answers">
            <button>Under 12</button>
            <button>12 or older</button>
          </div>
        </div>

		<div class="question">
          <div class="prompt">Do you know the signs and symptoms of breast and ovarian cancer?</div>
        
          <div class="answers">
            <button>Yes</button>
            <button>No</button>
          </div>
        </div>
      </div>
    </section>
    <!-- EDUCATION -->
    <section class="education">
    	 <div class="nav">
      	<div class="nav-item">LIFESTYLE</div>
      	<div class="nav-item">FAMILY HISTORY</div>
      	<div class="nav-item">YOUR NORMAL</div>
      </div>
      <div class="scroll"><!-- SCROLL --></div>
      <button class="btn-continue">CONTINUE</button>
      <div class="education-menu">
        <div class="module">
          <div class="how">Understand How</div>
          <h2>Lifestyle</h2>
          <div class="effect">Can Effect Your Risk</div>
        </div>
        <div class="module">
          <div class="how">Understand How</div>
          <h2>Family History</h2>
          <div class="effect">Can Effect Your Risk</div>
        </div>
        <div class="module">
          <div class="how">Understand How</div>
          <h2>Your Normal</h2>
          <div class="effect">Can Effect Your Risk</div>
        </div>
      </div>
      <div class="section-title">Understand Your Risk</div>
      <div class="family-history">If you have breast and ovaries, you are at risk.  Family history is the most important thing to look at when it comes to being proactive about your health.</div>
      <div class="normal">Every body is different.  
In order to know what’s up with your bod, you have to be self aware.
It’s important to know what’s normal for you — that way, you’re equipped to recognize a change over time.
		</div>
      <div class="vignette">
        <div class="video"><img src="img/modules/yoga1.jpg"><img src="img/modules/yoga2.jpg"><img src="img/modules/yoga3.jpg"><img src="img/modules/yoga4.jpg"><img src="img/modules/yoga5.jpg"><img src="img/modules/yoga6.jpg"><img src="img/modules/yoga7.jpg"><img src="img/modules/yoga8.jpg"></div>
        <div class="headlines">
          <h3>Women who get regular exercise may have a lower risk of breast cancer</h3>
          <h3>Although not all studies show this benefit, when the evidence is looked at as a whole, regular exercise appears to lower breast cancer risk by about 10 to 20 percent</h3>
          <h3>These women have all pledged to excercise. Join or encourage them!</h3>
        </div>

        <button class="pledge sub">Pledge to Exercise</button>
      </div>



      <div class="vignette">
        <div class="video"><img src="img/modules/yoga1.jpg"><img src="img/modules/yoga2.jpg"><img src="img/modules/yoga3.jpg"><img src="img/modules/yoga4.jpg"><img src="img/modules/yoga5.jpg"><img src="img/modules/yoga6.jpg"><img src="img/modules/yoga7.jpg"><img src="img/modules/yoga8.jpg"></div>
        <div class="headlines">
          <h3>Maintain a healthy weight and reduce your fat intake. </h3>
          <h3>There is a clear link between obesity and breast cancer because extra fatty tissue leads to extra estrogen production, which leads to an increased risk of breast cancer.</h3>
        </div>
        <button class="pledge sub">Pledge to maintain a healthy weight</button>
      </div>

      <div class="vignette">
        <div class="video"><img src="img/modules/yoga1.jpg"><img src="img/modules/yoga2.jpg"><img src="img/modules/yoga3.jpg"><img src="img/modules/yoga4.jpg"><img src="img/modules/yoga5.jpg"><img src="img/modules/yoga6.jpg"><img src="img/modules/yoga7.jpg"><img src="img/modules/yoga8.jpg"></div>
        <div class="headlines">
          <h3>There is a known link between alcohol and breast cancer.</h3>
          <h3>Limit alcohol to one drink per day, or avoid it completely.</h3>
          <h3>These women have all pledged to drink less. Join or encourage them!</h3>
        </div>
        <button class="pledge sub">Pledge to Drink Less</button>
      </div>

      <div class="vignette">
        <div class="video"><img src="img/modules/yoga1.jpg"><img src="img/modules/yoga2.jpg"><img src="img/modules/yoga3.jpg"><img src="img/modules/yoga4.jpg"><img src="img/modules/yoga5.jpg"><img src="img/modules/yoga6.jpg"><img src="img/modules/yoga7.jpg"><img src="img/modules/yoga8.jpg"></div>
        <div class="headlines">
          <h3>If it makes sense for you, breastfeeding for 1-2 years, not necessarily consecutively, may lower your breast cancer risk by decreasing the number of periods you have over the course of your life.</h3>
          <h3>These women have all pledged to breastfeed. Join or encourage them!</h3>
        </div>
        <button class="pledge sub">Pledge to Breastfeed</button>
      </div>

      <div class="vignette">
        <div class="video"><img src="img/modules/yoga1.jpg"><img src="img/modules/yoga2.jpg"><img src="img/modules/yoga3.jpg"><img src="img/modules/yoga4.jpg"><img src="img/modules/yoga5.jpg"><img src="img/modules/yoga6.jpg"><img src="img/modules/yoga7.jpg"><img src="img/modules/yoga8.jpg"></div>
        <div class="headlines">
          <h3>Smoking may increase the risk of breast cancer. </h3>
          <h3>We know how hard it can be to quit, but if you smoke, we ask that you commit to quit today and take advantage of Bright Pink’s smoke cessation resources online.</h3>
          <h3>These women have all pledged to quit smoking. Join or encourage them!</h3>
        </div>
        <button class="pledge sub">Pledge to quit</button>
      </div>

      <div class="vignette">
        <div class="video"><img src="img/modules/yoga1.jpg"><img src="img/modules/yoga2.jpg"><img src="img/modules/yoga3.jpg"><img src="img/modules/yoga4.jpg"><img src="img/modules/yoga5.jpg"><img src="img/modules/yoga6.jpg"><img src="img/modules/yoga7.jpg"><img src="img/modules/yoga8.jpg"></div>
        <div class="headlines">
          <h3>There are far fewer lifestyle behaviors known to reduce your ovarian cancer risk. However, taking oral contraceptives, or birth control pills, for 5 years in your 20s and 30s can actually reduce your risk by up to 50%.</h3>
          <h3> 5 years do not have to be consecutive—just any time in your 20s and 30s. Risk can be reduced by up to 50% (reduction by half is not guaranteed and depends on multiple other factors)</h3>
          <h3>These women have all pledged to take birth control. Join or encourage them!</h3>
        </div>
        <button class="pledge sub">Pledge to start birth control</button>
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

<!--    
		<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/CSSPlugin.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/easing/EasePack.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenLite.min.js"></script>
		<script src="js/weight.js"></script>
		<script src="js/height.js"></script>-->

        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html> 