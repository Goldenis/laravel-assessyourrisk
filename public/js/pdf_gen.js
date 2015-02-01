

function createPinkPDF () {
  
  //alert(pdfContent);
  var testcontent = $('.results').html();
  // alert(testcontent)
  var docDefinition = content1;

  pdfMake.createPdf(docDefinition).open();

}


var content1 = {  
  header: 'simple text', 
  content: [
    // {
    //   image: 'img/brightpink_logo.png',
    //   fit: [100, 100]      
    // },  
    { 
      text: 'YOUR BASELINE RISK IS: AVERAGE \n \n', 
      style: 'header', 
      alignment: 'center', 
      bold: true
    },
    { 
      text: 
        'Your answers suggest that you are at average baseline risk for breast and ovarian cancer, just like the majority of women in the general population.  This means you have a 12% chance of getting breast cancer—that’s one in eight—and a 1.5% chance of getting ovarian cancer. 75% of all breast and ovarian cancers are diagnosed in average risk women, so being proactive about risk-reduction and early detection is still important.\n \n \n',
      style: 'body'  
    },
    {
      text: 'WHAT TO DO NOW \n',
      style: 'subheader'
    },
    {
      text: 'First, review the section below to better understand which of your lifestyle choices could be negatively affecting your risk.  Gene mutations are funny things—no one really knows what “flips the switch” and causes cancer to develop.  The good news is that taking steps to reduce or eliminate modifiable risk factors may help reduce the likelihood of that switch flipping. You can learn more about lifestyle risk-reduction strategies on our website. \n In addition to finding out more about risk-reduction and early detection, we also encourage you to print out these results or let us email them to you so that you can take them to your doctor and discuss creating a risk-reduction and early detection strategy together.',
      style: 'body'
    }
  ],
  styles: {
    header: {
      fontSize: 18,
      bold: true,
      alignment: 'center'
    },
    subheader: {
      fontSize: 14,
      bold: true,
      alignment: 'center'
    },    
    body: {
      fontSize: 11,
      bold: false,
      alignment: 'justify'
    },
    quote: {
      italics: true
    },
    small: {
      fontSize: 8
    }
  }   
}

console.log(content1)


// YOUR BASELINE RISK IS: AVERAGE

// Your answers suggest that you are at average baseline risk for breast and ovarian cancer, just like the majority of women in the general population.  This means you have a 12% chance of getting breast cancer—that’s one in eight—and a 1.5% chance of getting ovarian cancer. 75% of all breast and ovarian cancers are diagnosed in average risk women, so being proactive about risk-reduction and early detection is still important. 

// WHAT TO DO NOW

// First, review the section below to better understand which of your lifestyle choices could be negatively affecting your risk.  Gene mutations are funny things—no one really knows what “flips the switch” and causes cancer to develop.  The good news is that taking steps to reduce or eliminate modifiable risk factors may help reduce the likelihood of that switch flipping. You can learn more about lifestyle risk-reduction strategies on our website.


// In addition to finding out more about risk-reduction and early detection, we also encourage you to print out these results or let us email them to you so that you can take them to your doctor and discuss creating a risk-reduction and early detection strategy together. 

