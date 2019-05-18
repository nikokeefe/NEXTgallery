<?php if ( ! defined( 'ABSPATH' ) ) exit; 
$pbPP_imgFolderURL = SMFB_PLUGIN_URL.'/images/templates/thumbs/';

$loadProTemplate = false;
if ( is_plugin_active('PluginOps-Optin-Builder-Extensions-Pack/extension-pack.php') ) {
    if ( function_exists('smfb_load_templates_pro') ) {
        smfb_load_templates_pro($pbPP_imgFolderURL);
        $loadProTemplate = true;
    }
}

if ($loadProTemplate == false){
?>
<div id="mainTemplatesContianer"></div>

<script type="text/javascript">
    ( function( $ ) {
        
            <?php 
            if ( is_plugin_active('PluginOps-Optin-Builder-Extensions-Pack/extension-pack.php') ) {
                if ( function_exists('smfb_available_pro_widgets') ) {
                    echo "  var isPremActive = 'true'; ";
                }else{
                    echo " var isPremActive = 'false'; ";
                }
            }else{
                echo " var isPremActive = 'false'; ";
            }
            ?>



            var rowBlockNames = {
                10:{
                    tempname : 10,
                    tempCat:'Inline , PopUp , Full Page',
                    isPro:false,
                },
                11:{
                    tempname : 11,
                    tempCat:'Side , PopUp , Fly In',
                    isPro:false,
                },
                24:{
                    tempname : 24,
                    tempCat:' Bar ',
                    isPro:false,
                },
                12:{
                    tempname : 12,
                    tempCat:'Side , PopUp , Fly In',
                    isPro:true,
                },
                13:{
                    tempname : 13,
                    tempCat:'Inline , PopUp',
                    isPro:true,
                },
                14:{
                    tempname : 14,
                    tempCat:'Inline , PopUp , Full Page',
                    isPro:true,
                },
                15:{
                    tempname : 15,
                    tempCat:'Inline , PopUp ',
                    isPro:true,
                },
                16:{
                    tempname : 16,
                    tempCat:'Inline , PopUp , Full Page',
                    isPro:true,
                },
                17:{
                    tempname : 17,
                    tempCat:'Inline , PopUp ',
                    isPro:true,
                },
                18:{
                    tempname : 18,
                    tempCat:'Inline , PopUp ',
                    isPro:true,
                },
                19:{
                    tempname : 19,
                    tempCat:'Inline , PopUp ',
                    isPro:true,
                },
                20:{
                    tempname : 20,
                    tempCat:'Inline , PopUp ',
                    isPro:true,
                },
                21:{
                    tempname : 21,
                    tempCat:'Side , PopUp , Fly In',
                    isPro:true,
                },
                22:{
                    tempname : 22,
                    tempCat:'PopUp',
                    isPro:true,
                },
                23:{
                    tempname : 23,
                    tempCat:'Inline , PopUp ',
                    isPro:true,
                },
                25:{
                    tempname : 25,
                    tempCat:'Inline , PopUp ',
                    isPro:true,
                },
                26:{
                    tempname : 26,
                    tempCat:'Bar',
                    isPro:false,
                },
                27:{
                    tempname : 27,
                    tempCat:'Bar',
                    isPro:true,
                },
                28:{
                    tempname : 28,
                    tempCat:'Side , PopUp , Fly In',
                    isPro:true,
                },
                29:{
                    tempname : 29,
                    tempCat:'Bar',
                    isPro:true,
                },
                30:{
                    tempname : 30,
                    tempCat:'Bar',
                    isPro:false,
                },
                31:{
                    tempname : 31,
                    tempCat:'Bar',
                    isPro:true,
                },
                32:{
                    tempname : 32,
                    tempCat:' Full Page',
                    isPro:true,
                },
                33:{
                    tempname : 33,
                    tempCat:'Full Page',
                    isPro:true,
                },
                34:{
                    tempname : 34,
                    tempCat:' Full Page',
                    isPro:true,
                },
                35:{
                    tempname : 35,
                    tempCat:'Side , PopUp , Fly In',
                    isPro:false,
                },
                36:{
                    tempname : 36,
                    tempCat:'Side , PopUp , Fly In',
                    isPro:true,
                },
                37:{
                    tempname : 37,
                    tempCat:'Bar',
                    isPro:true,
                },
                38:{
                    tempname : 38,
                    tempCat:'Inline',
                    isPro:true,
                },
                39:{
                    tempname : 39,
                    tempCat:'Bar',
                    isPro:true,
                },
                40:{
                    tempname : 40,
                    tempCat:'Side',
                    isPro:true,
                },
                41:{
                    tempname : 41,
                    tempCat:' PopUp , Fly In',
                    isPro:false,
                },
                42:{
                    tempname : 42,
                    tempCat:'Inline , PopUp',
                    isPro:true,
                },
                43:{
                    tempname : 43,
                    tempCat:'Inline , PopUp',
                    isPro:true,
                },
                44:{
                    tempname : 44,
                    tempCat:'Inline , PopUp',
                    isPro:true,
                },
                45:{
                    tempname : 45,
                    tempCat:'Full Page',
                    isPro:true,
                },
                46:{
                    tempname : 47,
                    tempCat:'Full Page',
                    isPro:true,
                },
                47:{
                    tempname : 46,
                    tempCat:'Full Page',
                    isPro:true,
                },
                48:{
                    tempname : 48,
                    tempCat:'Inline , PopUp',
                    isPro:true,
                },
                49:{
                    tempname : 49,
                    tempCat:'Inline , PopUp',
                    isPro:true,
                },
                50:{
                    tempname : 50,
                    tempCat:'PopUp , Fly In',
                    isPro:true,
                },
                51:{
                    tempname : 51,
                    tempCat:'PopUp , Fly In',
                    isPro:true,
                },
                52:{
                    tempname : 52,
                    tempCat:'Bar',
                    isPro:true,
                },
                53:{
                    tempname : 53,
                    tempCat:'Full Page',
                    isPro:true,
                },
                54:{
                    tempname : 54,
                    tempCat:'Full Page',
                    isPro:true,
                },
                55:{
                    tempname : 55,
                    tempCat:'PopUp',
                    isPro:true,
                },
                56:{
                    tempname : 56,
                    tempCat:'PopUp',
                    isPro:true,
                },
                57:{
                    tempname : 57,
                    tempCat:'Side',
                    isPro:true,
                },
                58:{
                    tempname : 58,
                    tempCat:'Fly In , Side',
                    isPro:true,
                },
                59:{
                    tempname : 59,
                    tempCat:'Side',
                    isPro:true,
                },
            };
            $.each(rowBlockNames, function(index,val){
                if (val['isPro'] == true  && isPremActive == 'false') {
                    var insertBtn = '<input disabled="disabled" type="radio" class="template_select" id="temp-'+val['tempname']+'" name="template_select" value="temp'+val['tempname']+'">'
                        +'<label for="temp-'+val['tempname']+'"> <strike> Select </strike> <b>Pro Only</b> </label>';
                        var premTempClass = 'prem-temp';
                }else{
                    var insertBtn = '<input type="radio" class="template_select" id="temp-'+val['tempname']+'" name="template_select" value="temp'+val['tempname']+'">'
                        +'<label for="temp-'+val['tempname']+'"> Select <b style="color: #4CAF50;">Free</b> </label>';
                        var premTempClass = ' ';
                }

                if (index == 10 || index == 11 || index == 24 || index == 32) {

                }else{
                    $('#mainTemplatesContianer').prepend(
                         '<div id="card" class="temp-prev-'+val['tempname']+' card template-card '+premTempClass+'">'
                          +'<div id="temp-prev-'+val['tempname']+'" class="tempPrev"> <p id="temp-prev-'+val['tempname']+'"><b>Preview</b></p></div>'
                            +'<label for="temp-'+val['tempname']+'"> <img src="<?php echo $pbPP_imgFolderURL.'template-'; ?>'+val['tempname']+'.png" data-img_src="https://ps.w.org/mailchimp-subscribe-sm/assets/screenshot-'+val['tempname']+'.png" class="card-img temp-prev-'+val['tempname']+'">'
                            +'<p class="card-desc"></p> </label>'
                            +insertBtn
                            +'<br><br>'
                            +'<span class="temp-cats-displayed">'+val['tempCat']+'</span>'
                        +'</div>'
                    );
                }
                    
            });

                    $('#mainTemplatesContianer').prepend(
                         '<div id="card" class="temp-prev-'+rowBlockNames[10]['tempname']+' card template-card ">'
                          +'<div id="temp-prev-'+rowBlockNames[10]['tempname']+'" class="tempPrev"> <p id="temp-prev-'+rowBlockNames[10]['tempname']+'"><b>Preview</b></p></div>'
                            +'<label for="temp-'+rowBlockNames[10]['tempname']+'"> <img src="<?php echo $pbPP_imgFolderURL.'template-'; ?>'+rowBlockNames[10]['tempname']+'.png" data-img_src="https://ps.w.org/mailchimp-subscribe-sm/assets/screenshot-'+rowBlockNames[10]['tempname']+'.png" class="card-img temp-prev-'+rowBlockNames[10]['tempname']+'">'
                            +'<p class="card-desc"></p> </label>'
                            +'<input type="radio" class="template_select" id="temp-'+rowBlockNames[10]['tempname']+'" name="template_select" value="temp'+rowBlockNames[10]['tempname']+'">'
                            +'<label for="temp-'+rowBlockNames[10]['tempname']+'"> Select <b style="color: #4CAF50;">Free</b> </label>'
                            +'<br><br>'
                            +'<span class="temp-cats-displayed">'+rowBlockNames[10]['tempCat']+'</span>'
                        +'</div>'
                    );
                    $('#mainTemplatesContianer').prepend(
                         '<div id="card" class="temp-prev-'+rowBlockNames[11]['tempname']+' card template-card ">'
                          +'<div id="temp-prev-'+rowBlockNames[11]['tempname']+'" class="tempPrev"> <p id="temp-prev-'+rowBlockNames[11]['tempname']+'"><b>Preview</b></p></div>'
                            +'<label for="temp-'+rowBlockNames[11]['tempname']+'"> <img src="<?php echo $pbPP_imgFolderURL.'template-'; ?>'+rowBlockNames[11]['tempname']+'.png" data-img_src="https://ps.w.org/mailchimp-subscribe-sm/assets/screenshot-'+rowBlockNames[11]['tempname']+'.png" class="card-img temp-prev-'+rowBlockNames[11]['tempname']+'">'
                            +'<p class="card-desc"></p> </label>'
                            +'<input type="radio" class="template_select" id="temp-'+rowBlockNames[11]['tempname']+'" name="template_select" value="temp'+rowBlockNames[11]['tempname']+'">'
                            +'<label for="temp-'+rowBlockNames[11]['tempname']+'"> Select <b style="color: #4CAF50;">Free</b> </label>'
                            +'<br><br>'
                            +'<span class="temp-cats-displayed">'+rowBlockNames[11]['tempCat']+'</span>'
                        +'</div>'
                    );
                    $('#mainTemplatesContianer').prepend(
                         '<div id="card" class="temp-prev-'+rowBlockNames[24]['tempname']+' card template-card ">'
                          +'<div id="temp-prev-'+rowBlockNames[24]['tempname']+'" class="tempPrev"> <p id="temp-prev-'+rowBlockNames[24]['tempname']+'"><b>Preview</b></p></div>'
                            +'<label for="temp-'+rowBlockNames[24]['tempname']+'"> <img src="<?php echo $pbPP_imgFolderURL.'template-'; ?>'+rowBlockNames[24]['tempname']+'.png" data-img_src="https://ps.w.org/mailchimp-subscribe-sm/assets/screenshot-'+rowBlockNames[24]['tempname']+'.png" class="card-img temp-prev-'+rowBlockNames[24]['tempname']+'">'
                            +'<p class="card-desc"></p> </label>'
                            +'<input type="radio" class="template_select" id="temp-'+rowBlockNames[24]['tempname']+'" name="template_select" value="temp'+rowBlockNames[24]['tempname']+'">'
                            +'<label for="temp-'+rowBlockNames[24]['tempname']+'"> Select <b style="color: #4CAF50;">Free</b> </label>'
                            +'<br><br>'
                            +'<span class="temp-cats-displayed">'+rowBlockNames[24]['tempCat']+'</span>'
                        +'</div>'
                    );
                    $('#mainTemplatesContianer').prepend(
                         '<div id="card" class="temp-prev-'+rowBlockNames[32]['tempname']+' card template-card ">'
                          +'<div id="temp-prev-'+rowBlockNames[32]['tempname']+'" class="tempPrev"> <p id="temp-prev-'+rowBlockNames[32]['tempname']+'"><b>Preview</b></p></div>'
                            +'<label for="temp-'+rowBlockNames[32]['tempname']+'"> <img src="<?php echo $pbPP_imgFolderURL.'template-'; ?>'+rowBlockNames[32]['tempname']+'.png" data-img_src="https://ps.w.org/mailchimp-subscribe-sm/assets/screenshot-'+rowBlockNames[32]['tempname']+'.png" class="card-img temp-prev-'+rowBlockNames[32]['tempname']+'">'
                            +'<p class="card-desc"></p> </label>'
                            +'<input type="radio" class="template_select" id="temp-'+rowBlockNames[32]['tempname']+'" name="template_select" value="temp'+rowBlockNames[32]['tempname']+'">'
                            +'<label for="temp-'+rowBlockNames[32]['tempname']+'"> Select <b style="color: #4CAF50;">Free</b> </label>'
                            +'<br><br>'
                            +'<span class="temp-cats-displayed">'+rowBlockNames[32]['tempCat']+'</span>'
                        +'</div>'
                    );

          $('.card-img').mouseover(function(ev) {
            var tempprevbtn = $(ev.target).attr('class').split(' ')[1];
            $('#'+tempprevbtn).width($(ev.target).width());
            $('#'+tempprevbtn).height($(ev.target).height());
            var tempPhieght = $(ev.target).height();
            $('.tempPrev p').css('margin-top',tempPhieght/2);
            $('#'+tempprevbtn).slideDown(100);
          });

          $('.card').mouseleave(function(ev){
            $('.tempPrev').slideUp('100');
          });

          $('.tempPrev').click(function(ev) {
            var ths_tempprev = $(ev.target).attr('id');
            if (typeof(ths_tempprev) == 'undefined') {
                var ths_tempprev = $(ev.target).parent().attr('id');
            }
            $('.pb_preview_container').attr('style','display:block;overflow:auto; z-index:99999;');
            $('.pb_temp_prev').append('<img src='+$('img.'+ths_tempprev).attr('data-img_src')+' class="pb_temp_prev_img" >');
          });

          if (isPremActive == 'true') {
            $('#templatesInstallDiv').css('display','none');
            $('#templatesInstallDiv').css('opacity','0');
          }
    }( jQuery ) );
</script>

<?php
} // end If
?>

<!-- 
 <script type="text/javascript">
        (function($){
            $(document).ready(function(){

                $('.card input').click(function(){

                  $('.card').children('.updateTemplate').remove();
                  $('.card').css('background-color','#f0f0f0');
                  $(this).parent('.card').css('background-color','#89d8fb');
                  if ($(this).parent('.card').hasClass('tempPack1')) {
                  }else{
                    $(this).parent('.card').append('<div id="updateTemplate" class="btn-green  updateTemplate" style=" margin-left:70px;">Update Template</div>');
                  }
                  
                  $('.updateTemplate').effect( "shake",{
                    distance:10,
                    times:2
                  } );
                });
            });
        })(jQuery);
    </script>

-->