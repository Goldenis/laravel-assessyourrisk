

function createPinkPDF () {
  
  //alert(pdfContent);
  var testcontent = $('.results').html();
  // alert(testcontent)
  var docDefinition = { content: testcontent };

  pdfMake.createPdf(docDefinition).open();

}