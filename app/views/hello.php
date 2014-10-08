<?php include_once 'header.php' ?>	

			
			<section id="Intro" class="flex-container vertical-container">
				<section class="full-screen-content">
					<h1>1 in 8 women get cancer. Pretend you are the 1.</h1>
					
					<a id="Begin" href="#Risk-Assessment"> <button class="action lifestyle"> Begin </button> </a>
				</section>
			</section>
			
			<!-- LEFT -->
			<section id="Risk-Assessment" class="scrollpane">
				
				<section id="Assessment-Intro" class="vertical-container">
					<div class="vertically-centered">
						<a id="Launch-Assessment" href="#assess-step-1">
						<h3 class="mobile-hide"> Bright Pink created an assessment to help you understand your personal level of cancer risk.</p> <p>This information can be life saving.</h3>
						<!-- <p class=""><strong>Let's assume you have cancer until you...</strong></p> -->
						<!-- <h1>Assess Your Risk</h1> -->
							<button class="action"> Assess Your Risk  </button>
						</a>
					</div>		
				</section>

				<div id="Risk-Meter">
					<!-- <p>Your overall risk:</p> -->
					<!-- <div class="bargraph clearfix">
						<div class="bar-one"></div>
						<div class="bar-two"></div>
						<div class="bar-three"></div>
					</div> -->
					
					
					<ul class="risk-warnings clearfix">
						<li> <span class="tooltip-bottom dot green" data-tooltip="You made a good choice. Keep it up."> </span> </li>
						<li> <span class="tooltip-bottom dot red" data-tooltip="You don't know this portion. This poses significant risk."> </span> </li>
						<li> <span class="tooltip dot"> </span> </li>
						<li> <span class="tooltip dot"> </span> </li>
						<li> <span class="tooltip dot"> </span> </li>
						<li> <span class="tooltip dot"> </span> </li>
						<li> <span class="tooltip dot"> </span> </li>
						
						<li> <span class="tooltip dot"> </span> </li>
						<li> <span class="tooltip dot"> </span> </li>
						<li> <span class="tooltip dot"> </span> </li>
						<li> <span class="tooltip dot"> </span> </li>
						<li> <span class="tooltip dot"> </span> </li>
						<li> <span class="tooltip dot"> </span> </li>
						<li> <span class="tooltip dot"> </span> </li>
						
						<li> <span class="dot"> </span> </li>
					</ul>	
						
					<div id="Assessment-Counter">
						<sup id="Assess-Count">1</sup><span class="slash">&frasl;</span><sub>15</sub>
					</div>
				</div>
				
				<div class="assessment-wrap">
					
					<section id="assess-step-1" class="vertical-container assess anchor">
						<div class="vertically-centered">
							<span class="number-icon">1</span>

							<p class="prompt">Do you have breasts and/or ovaries?</p>
							<a href="#assess-step-2"><button class="action"> Yes </button></a>
						</div>
					</section>

					<section id="assess-step-2" class="vertical-container assess anchor">
						<div class="vertically-centered">
							<span class="number-icon">2</span>
							<p class="prompt"> How many drinks do you have per day? </p>
							<div id="drink-slider">
								<input class="slidebar" type="range"  min="0" max="10" step="1"/>
								<!-- <img class="drinkicon" src="img/assessment/drinkicon.png" alt="Drinkicon"> -->
								<ul class="numbers clearfix">
									<li>0 </li>
									<li>1 </li>
									<li>2 </li>
									<li>3 </li>
									<li>4 </li>
									<li>5 </li>
									<li>6 </li>
									<li>7 </li>
									<li>8 </li>
									<li>9 </li>
									<li>10</li>
								</ul>

							</div>
							<a href="#assess-step-3"><button class="action"> Submit </button> </a>
						</div>
					</section>

					<section id="assess-step-3" class="vertical-container assess anchor">
						<div class="vertically-centered padded">
							<span class="number-icon">3</span>
							<p class="prompt">Have you or any of your immediate family members (parent; sibling; grandparent; aunt) had any of the following... </p>

							<form>
								<input type="checkbox"> Breast cancer diagnosed at age 50 or under </input><br>
								<input type="checkbox"> Triple negative (ER/PR/her2-) breast cancer</input><br>
								<input type="checkbox"> More than one breast cancer (cancer in both breasts, or two separate breast cancers in one breast)</input><br>
								<input type="checkbox"> Male breast cancer </input><br>
								<input type="checkbox"> A genetic mutation that increases breast cancer risk (Ex. BRCA1/2, PTEN, p53)? </input>
							</form>


							<a href="#assess-step-4"><input type="submit" class="action" value="Submit"></a>
							<input type="submit" class="action" value="Help Me Ask Them">
							<input type="submit" class="action" value="Remind Me">
						</div>
					</section>

					<section id="assess-step-4" class="vertical-container assess anchor">
						<div class="vertically-centered">
							<span class="number-icon">4</span>
							<p class="prompt">Do you have one or more immediate family members (parent; sibling; grandparent; aunt) that have had breast cancer at age 50 or older?</p>
							<input type="submit" class="action" value="Submit">
							<input type="submit" class="action" value="Help Me Ask Them">
							<input type="submit" class="action" value="Remind Me">
						</div>
					</section>

					<section id="assess-step-5"> </section>
				</div>
				<div id="Facts-Container" class="flex-container">
					<div id="fact-logo" class="flex-none ">
						<div class="flex-container">
							<p class="vertically-centered">
								FACT
							</p>
						</div>
					</div>
					<div id="fact-info" class="flex1">
						<p> <span class="data-number">12%</span> - or - <span class="data-number">1 in 8 Women</span> <br>
							will develop breast cancer at some point in their lifetime.
						</p>
					</div>
					<div id="fact-action" class="flex-none">
						<div  id="open-education" class="flex-container"> 
							 <span class="icon-right"></span>  
						</div>
					</div>
				</div>
				
			</section>
			
			<!-- RIGHT -->
			<section id="Education-Modules" class="scrollpane flex-column">
				
				<section id="Education-Intro" class="vertical-container">
					<div class="vertically-centered">
						<a id="Launch-Education" href="#Lifestyle">
						<h3 class="mobile-hide"> Learn about the ways in which you can help understand your risk.</h3>

							<button class="action"> Educate Yourself </button>
						</a>
					</div>		
				</section>
	
				<section id="Lifestyle" class="flex1">					
					<header class="photo-bg">
						<a href="#l-color" id="l-color" class="education-header-link vertical-container">
							<div class="vertically-centered box">
								<h1>Lifestyle</h1>
							</div>
						</a>
					</header>
					<section id="" class="content-wrapper">
						<p>Content</p>
					</section>
				</section>
				<section id="FamilyHistory" class="flex1">
					<header class="photo-bg">
						<div id="fh-color" class="education-header-link vertical-container">
								<div class="vertically-centered box">
									<h1>Family History</h1>
										<div class="education-prompt">
											<p class="intro">Your family history is the biggest factor in understanding your risk.</p>
											 <a href="#fh-frame-1" id="fh-module-link">
											<button class="action" href="#Content-FamilyHistory">
												Begin Module
											</button>
											</a> 		
										</div>							
								</div>
						</div>
						
						
						
					</header>
<!--Family History Content -->
					<section id="Content-FamilyHistory" class="content-wrapper clearfix">
						
						<section id="fh-frame-1" class="education-frame fh-frame vertical-container">
							<div class="vertically-centered">
								<p>If a woman has a family history or carries a genetic pre-disposition, her breast cancer risk could be as high as 87% and her risk for ovarian cancer could be as as high as 54%.</p> 

								<button class="action">HOW TO ASK RELATIVES</button>
							</div>
						</section>
						<section id="fh-frame-2" class="education-frame fh-frame vertical-container">
							<div class="vertically-centered">
								<p>Family history and genetic pre-disposition do not always go hand in hand. If a first degree relative had breast cancer, your risk is elevated even if testing does not reveal a genetic pre-disposition.</p>

								<button id="ask-relatives-genetic" class="action">
									<a href="mailto:?subject=Cancer%20History%20&body=message%20goes%20here"target=_blank>HOW TO ASK RELATIVES</a>
								</button>
							</div>
							
						</section>
						<section id="fh-frame-3" class="education-frame fh-frame vertical-container">
							<div class="vertically-centered">
								<p>Remember to collect health history on both your mother and father’s sides. Make sure to note who had cancer, how old the person was at the time of diagnosis and what type of cancer was detected. While breast and ovarian cancer history is important, other types of cancer can also be indicators—so capture everything you can. </p>

								<h4>HERE ARE SOME TOOLS TO HELP YOU</h4>
								<ul>
									<li> <a href="#"target=_blank> LINK 1 </a> </li>
									<li> <a href="#"target=_blank> LINK 2 </a> </li>
									<li> <a href="#"target=_blank> LINK 3 </a> </li>
								</ul>
							</div>
						</section>
						<section id="fh-frame-4" class="education-frame fh-frame vertical-container">
							<div class="vertically-centered">
								<img src="img/modules/family-history-module.gif" alt="Family History Module">
							</div>
						</section>
						<section id="fh-frame-5" class="education-frame fh-frame vertical-container">
						
						</section>
						<section id="fh-frame-6" class="education-frame fh-frame vertical-container">
						
						</section>
						<section id="fh-frame-7" class="education-frame fh-frame vertical-container">
						
						</section>
					</section>
				</section>
				<section id="KnowYourNormal" class="flex1">
					<header class="photo-bg">
						<a href="#kyn-color" id="kyn-color" class="education-header-link vertical-container">
							<div class="vertically-centered box">
								<h1>Know Your Normal</h1>
							</div>
						</a>
					</header>
					<section id="" class="content-wrapper">
						<p>Content</p>
					</section>
				</section>
			</section>
					
		
		
<?php include_once 'footer.php' ?>	
			
			<!-- <section class="risk scrollpane">

				<section id="assess-intro" class="vertical-container assess anchor">
					<div class="vertically-centered">
						<h1>Assess Your Risk</h1>
						<p> Bright Pink created the ‘Assess Your Risk’ tool to help you understand your personal level of cancer risk.</p>
						<p>This information can be life saving</p>
						<p class="intro">
							Let's assume you have cancer until you...
						</p>
						<a id="launch-assess" href="#assess-step-1" >
							<button class="action"> Understand Your Risk  </button>
						</a>
					</div>
				</section>

				<section id="assess-step-1" class="vertical-container assess anchor">
					<div class="vertically-centered">
						<span class="number-icon">1</span>

						<p class="prompt">Do you have breasts and/or ovaries?</p>
						<a href="#assess-step-2"><button class="action"> Yes </button></a>
					</div>
				</section>

				<section id="assess-step-2" class="vertical-container assess anchor">
					<div class="vertically-centered">
						<span class="number-icon">2</span>
						<p class="prompt"> Drag drink icon to the number of drinks per day you have. </p>
						<div id="drink-slider">
							<input class="slidebar" type="range"  min="0" max="10" step="1"/>
							<img class="drinkicon" src="img/assessment/drinkicon.png" alt="Drinkicon">
							<ul class="numbers clearfix">
								<li>0 </li>
								<li>1 </li>
								<li>2 </li>
								<li>3 </li>
								<li>4 </li>
								<li>5 </li>
								<li>6 </li>
								<li>7 </li>
								<li>8 </li>
								<li>9 </li>
								<li>10</li>
							</ul>

						</div>
						<a href="#assess-step-3"><button class="action"> Submit </button> </a>
					</div>
				</section>

				<section id="assess-step-3" class="vertical-container assess anchor">
					<div class="vertically-centered padded">
						<span class="number-icon">3</span>
						<p class="prompt">Have you or any of your immediate family members (parent; sibling; grandparent; aunt) had any of the following... </p>

						<form>
							<input type="checkbox"> Breast cancer diagnosed at age 50 or under </input><br>
							<input type="checkbox"> Triple negative (ER/PR/her2-) breast cancer</input><br>
							<input type="checkbox"> More than one breast cancer (cancer in both breasts, or two separate breast cancers in one breast)</input><br>
							<input type="checkbox"> Male breast cancer </input><br>
							<input type="checkbox"> A genetic mutation that increases breast cancer risk (Ex. BRCA1/2, PTEN, p53)? </input>
						</form>


						<a href="#assess-step-4"><input type="submit" class="action" value="Submit"></a>
						<input type="submit" class="action" value="Help Me Ask Them">
						<input type="submit" class="action" value="Remind Me">
					</div>
				</section>

				<section id="assess-step-4" class="vertical-container assess anchor">
					<div class="vertically-centered">
						<span class="number-icon">4</span>
						<p class="prompt">Do you have one or more immediate family members (parent; sibling; grandparent; aunt) that have had breast cancer at age 50 or older?</p>
						<input type="submit" class="action" value="Submit">
						<input type="submit" class="action" value="Help Me Ask Them">
						<input type="submit" class="action" value="Remind Me">
					</div>
				</section>

				<section id="assess-step-5">

				</section>

					<nav class="scrollnav scrollpane">
						<ul id="lifestyle-nav">
							<li> <a class="scrollnav-link" href="#assess-intro"> </a> </li>
							<li> <a class="scrollnav-link" href="#assess-step-1"> </a> </li>
							<li> <a class="scrollnav-link" href="#assess-step-2"> </a> </li>
							<li> <a class="scrollnav-link" href="#assess-step-3"> </a> </li>
							<li> <a class="scrollnav-link" href="#assess-step-4"> </a> </li>
						</ul>
						<ul id="familyhistory-nav">
							<li> <a href="#"> </a> </li>
							<li> <a href="#"> </a> </li>
							<li> <a href="#"> </a> </li>
							<li> <a href="#"> </a> </li>
							<li> <a href="#"> </a> </li>
						</ul>
						<ul id="knowyournormal-nav">
							<li> <a href="#"> </a> </li>
							<li> <a href="#"> </a> </li>
							<li> <a href="#"> </a> </li>
							<li> <a href="#"> </a> </li>
							<li> <a href="#"> </a> </li>
						</ul>
					</nav>
			</section> -->
			<!-- <div id="fixed-messages">
				<div class="fact-callout">
					DID <br>
					YOU <br>
					KNOW
				</div>
				<div class="fact">
					<p> <span class="data-number">12%</span> - or - <span class="data-number">1 in 8</span> <br>
						women will develop breast cancer at some point in their lifetime.
					</p>
					<button class="action" id="open-education"> Deep Dive Lifestyle Facts <span class="icon-right"></span> </button>
				</div>
			</div> -->
			<!-- <section class="education scrollpane">
				<section class="lifestyle">
					<header class="photo-bg">
						<div class="pink-bg vertical-container">
							<div class="vertically-centered">
								<h1>Lifestyle</h1>
							</div>
						</div>
					</header>
				</section>
				<section class="family-history">
					<header class="photo-bg">
						<a href="familyhistory.html">
						<div class="red-bg vertical-container">

								<div class="vertically-centered">
									<h1>Family History</h1>
								</div>

						</div>
						</a>
					</header>
				 </section>
				<section class="know-your-normal">
					<header class="photo-bg">
						<div class="nude-bg vertical-container">
							<div class="vertically-centered">
								<h1>Know Your Normal</h1>
							</div>
						</div>
					</header>
				 </section>
				<section class=""> </section>
			</section> -->
		