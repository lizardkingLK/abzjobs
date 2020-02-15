$(document).ready(function(){
  // Hides add category form when loading page welcome
  $('div#categorymenu').hide();
  // Hides search table form when loading page welcome
  $('div#searchtable').hide();
  // Hides when loading the page welcome
  $('div#vactable').hide();

  // When clicked toggles between modes:category & design 
  $('button#switchmode').on('click',function() {
    $('div#designmenu').toggle();
    $('div#categorymenu').toggle();
    $('div#searchtable').toggle();
    $('div#postpreview').toggle();
  });
  
  // Show and Hide the all vacancies list
  $('a#vaclist').on('click',function(){
    $('a#vaclist').toggleClass('text-success');
    $('div#vactable').toggle();
    $('div#vactable').css('margin-bottom','45px');
  });

  // Sending for subcat temporary table ajax with jquery
  $('select#selectCategory').on('change', function(e) {
    var catVal = $(this).val();
    var phpUrl = 'catloadsubcats.php',
    data = {'action': catVal};
      $.post(phpUrl, data, function(response) {
        //
      });
      
  // Preview job category in real time 
  var seltedCat = $('select#selectCategory option:selected').html(); 
    $('p#previewjobcategory').html(seltedCat);
  });

  // On re-editing category notification hides
  $('#typejobcat').on('click',function() {
    $('#catcannot').html(null);
    $('#catwarn').html(null);
    $('#catcan').html(null);
  });
  $('#typejobsubcat').on('click',function() {
    $('#subcatcannot').html(null);
    $('#subcatwarn').html(null);
    $('#subcatcan').html(null);
    $('#catwarned').html(null);
  });

  // Loading subcat to page in real time
  $('select#selectsubCategory').on('change',function(e) {
      // Preview job subcategory in real time
        var seltedsubCat = $('select#selectsubCategory option:selected').html();
        $('p#previewjobsubcategory').html(seltedsubCat);
  });

  // Preview company name in real time
  $('input#inputcompany').on('keyup',function(e){
    $('p#previewcompany').html(e.target.value);
  });
  
  // Preview job description in real time
  $('textarea#textdescription').on('keyup',function() {
    var desc = $(this).val();
    $('p#previewtextdescription').html(desc);
  });

  //Preview the expiry date for the post
  $('input#datepicker').on('change',function() {
    var expdt = $(this).val();
    $('p#previewdatepicker').html(expdt);
  });

});
