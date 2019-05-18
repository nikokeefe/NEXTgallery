( function( $ ) {
  
jQuery('.template-card').hide();
$('.campaignNameField').css('border-bottom','2px solid #4CAF50');
var setTitle = $('#title').val();

if (setTitle != '') {
  $('.stepOneContent').css('display','none');
  $('.stepTwoContent').css('display','block');
}

$('.setCampaignName').click(function(){
  campaignNameField = $('.campaignNameField').val();
  if (campaignNameField == '') {
    $('.campaignNameField').css('border-bottom','2px solid red');
  }else{
    $('#title').val(campaignNameField);
    $('.stepOneContent').css('display','none');
    $('.stepTwoContent').css('display','block');
    $('.stepCount').html('2 <br>Step');
  }
});

$('.stepCard').click(function(){
  $('.stepCard').css({
    'background':'#eaeaea',
    'outline':'none'
  });
  $('.stepCard').css('border','none');
  $(this).css('background','#89d8fb');
  $(this).css('outline','5px solid #89d8fb');

  var selectedOptinType = $(this).attr('data-OptinType');
  $('.selectedOptinType').val(selectedOptinType);
});

$('.setCampaignType').click(function(){
  var selectedOptinType = $('.selectedOptinType').val();
  if (selectedOptinType == '') {
  }else{
    pageBuilderApp.PageBuilderModel.set( 'optinType', selectedOptinType );
    $('.template-card').hide();
    $('.stepTwoContent').css('display','none');
    $('.stepThreeContent').css('display','block');
    $('.'+selectedOptinType+'-templates').css('display','block');

    $('.template-card:contains("'+selectedOptinType+'")').show();
    $('.stepCount').html('3 <br>Step<br>');

    if (selectedOptinType =='Inline') {
      $('.displayOnBox').css('display','none');
    }else{
      $('.displayOnBox').css('display','block');
    }

    

    if (selectedOptinType == 'PopUp' || selectedOptinType == 'Side' || selectedOptinType =='Inline' || selectedOptinType == 'FlyIn' ) {
      $('#initializeCampaignSetup').css({
        'overflow':'scroll'
      });
    } else{
      $('#initializeCampaignSetup').css({
        'overflow':'scroll'
      });
    }
  }
});


$('.setTemplateStepPrev').click(function(){
  $('.stepTwoContent').css('display','block');
  $('.stepThreeContent').css('display','none');
}); 

$('.template-card label').click(function(){

  $('.template-card').css('background-color','#f0f0f0');

  $('.template-card').children('.updateTemplate').remove();

  if ($(this).parent('.template-card').hasClass('prem-temp')) {
    $(this).parent('.template-card').css('background-color','#ea5b53');
  }else{
    $(this).parent('.template-card').css('background-color','#89d8fb');

  }
});

$('.template-card input').click(function(){

  $('.template-card').css('background-color','#f0f0f0');
  $('.template-card').children('.updateTemplate').remove();
  if ($(this).parent('.template-card').hasClass('prem-temp')) {
    $(this).parent('.template-card').css('background-color','#ea5b53');
  }else{
    $(this).parent('.template-card').css('background-color','#89d8fb');

  }
});

})(jQuery);