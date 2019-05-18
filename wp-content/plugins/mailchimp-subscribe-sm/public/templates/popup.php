<?php if ( ! defined( 'ABSPATH' ) ) exit;

$this_popup_unique_Id = '';
if (isset($isPopUpTemplate) || $selecteOptinType == 'PopUp') {
  if ($widgetSubscribeFormWidget != true) {
    echo "<script src='".SMFB_PLUGIN_URL."/js/cookie.js'></script>";
    $widgetSubscribeFormWidget = true;
  }

  if(!empty($popupDisplayDelay)){
    echo "<script> var popUpDisplayActionType = 'delay'; </script>";
    $popupDisplayOnScroll = ''; $popupDisplayOnExit = ''; $popupDisplayOnClick = '';
  }else if(!empty($popupDisplayOnScroll)){
    echo "<script> var popUpDisplayActionType = 'onscroll'; </script>";
    $popupDisplayDelay = ''; $popupDisplayOnExit = ''; $popupDisplayOnClick = '';
  }
  else if(!empty($popupDisplayOnExit)){
    echo "<script> var popUpDisplayActionType = 'onexit'; </script>";
    $popupDisplayDelay = ''; $popupDisplayOnScroll = ''; $popupDisplayOnClick = '';
  }
  else if(!empty($popupDisplayOnClick)){
    echo "<script> var popUpDisplayActionType = 'onclick'; </script>";
    $popupDisplayDelay = ''; $popupDisplayOnScroll = ''; $popupDisplayOnExit = '';
  }else{
    echo "<script> var popUpDisplayActionType = 'delay'; </script>";
    $popupDisplayDelay = ''; $popupDisplayOnScroll = ''; $popupDisplayOnExit = ''; $popupDisplayOnClick = '';
  }

  if (!isset($isPopUpTemplate)) {
    $isPopUpTemplate = '';
  }

  if ($isPopUpTemplate == true || $selecteOptinType == 'PopUp' || $selecteOptinType == 'PopUp') {
    $this_popup_unique_Id = 'popup_'.$current_pageID;

    if(isset($popupDisplayDelay)){
    }else{
      $popupDisplayDelay = '0';
    }

    ?>
    
    <style type="text/css">
      #popb_popup_close_<?php echo($this_popup_unique_Id); ?>:before {
        transform: rotate(45deg);
      }
      #popb_popup_close_<?php echo($this_popup_unique_Id); ?>:after {
        transform: rotate(-45deg);
      }
      #popb_popup_close_<?php echo($this_popup_unique_Id); ?>:after, #popb_popup_close_<?php echo($this_popup_unique_Id); ?>:before {
        background-color: #414141;
        content: '';
        position: absolute;
        left: 14px;
        height: 14px;
        top: 8px;
        width: 2px;
      }

      #popb_popup_close_<?php echo($this_popup_unique_Id); ?> {
        width: 30px;
        height: 30px;
        background-color: #fff;
        border-radius: 100%;
        box-shadow: 0px 2px 2px 0px rgba(0,0,0,0.2);
        cursor: pointer;
        position: relative;
        right: -15px;
        top: 15px;
        z-index: 2;
        float: right;
        clear: left;
      }
      <?php echo ".ulpb_PageBody$current_pageID"; ?>{
        clear:right;
      }

      .popb_popup_close:hover{
        background-color: #7a7a7a !important;
        transition: all .5s;
      }
      .popb_popup_close:hover::after, .popb_popup_close:hover::before {
        background-color: #fff !important;
        transition: all .5s;
      }

      @media screen and (max-width: 2920px) and (min-width: 1280px) {
        #pluginops-modal-content_<?php echo($this_popup_unique_Id); ?>{
          max-width: 65% !important;
        }
      }
      @media screen and (max-width: 1275px) and (min-width: 1024px)  {
        #pluginops-modal-content_<?php echo($this_popup_unique_Id); ?>{
          width: auto !important;
        }
      }
      @media screen and (max-width: 1023px) and (min-width: 668px)  {
        #pluginops-modal-content_<?php echo($this_popup_unique_Id); ?>{
          width: 75% !important;
        }
      }
      @media screen and (max-width: 667px) and (min-width: 280px)  {
        #pluginops-modal-content_<?php echo($this_popup_unique_Id); ?>{
          width: 85% !important;
        }
        #POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>{
          overflow: auto;
        }
      }

      #pluginops-modal-content_<?php echo($this_popup_unique_Id); ?> {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
      }

    </style>

      <div class="pluginops-modal PoParentModal" id="POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>" style=" position: fixed; z-index: 9999; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; display: none; background:<?php echo $data['pageOptions']['overlayColor']; ?>; ">
        
        <div class="pluginops-modal-content" id="pluginops-modal-content_<?php echo($this_popup_unique_Id); ?>" style='max-width: 80%;'>
          <div class="popb_popup_close" id="popb_popup_close_<?php echo($this_popup_unique_Id); ?>" style="display:<?php echo $data['pageOptions']['hideCloseBtn']; ?>;" ></div>
          <script type="text/javascript">
              ( function( $ ) {

                if ($.cookie) {
                  var testUserSubscribed = $.cookie("pluginops_user_subscribed_form<?php echo $current_pageID; ?>");
                  var testPopUpClosed = $.cookie("pluginops_user_closed_form<?php echo $current_pageID; ?>");
                }else{
                  var testUserSubscribed = '';
                  var testPopUpClosed = '';
                }
                if (typeof(testUserSubscribed) == 'undefined') {
                  testUserSubscribed = '';
                }
                if (typeof(testPopUpClosed) == 'undefined') {
                  testPopUpClosed = '';
                }

                var popupClosed = 'false';
                <?php if (current_user_can('publish_pages')) {
                  echo "var testUserSubscribed = 'false'; ";
                  echo "var testPopUpClosed = 'false';";
                } 
                if ($hideAfterCampaignClosed !== 'true') {
                  echo "var testPopUpClosed = 'false'; ";
                }

                ?>
              
                if (testUserSubscribed == 'yes' || testPopUpClosed == 'yes') {
                  $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').css('display','none');
                  $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').hide('slow');
                }else{

                  if (popUpDisplayActionType == 'delay') {
                    setTimeout(function(){
                      $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').fadeIn('slow');
                      $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').addClass(' animated  <?php echo($popUpEntranceAnimation); ?>');
                      $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').css('display','block');

                    }, <?php echo $popupDisplayDelay.'000'; ?>);
                  }

                  if (popUpDisplayActionType == 'onscroll') {
                    $(window).on('scroll', function(){
                      var s = $(window).scrollTop(),
                          d = $(document).height(),
                          c = $(window).height();
                      var PoPb_scrollTopPercentage = (s / (d - c)) * 100;
                      var popUpOnScroll = parseInt(<?php echo $popupDisplayOnScroll; ?>);

                      if ( PoPb_scrollTopPercentage > popUpOnScroll && popupClosed != 'closed') {
                        $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').fadeIn('slow');
                        $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').addClass(' animated  <?php echo($popUpEntranceAnimation); ?>');
                        $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').css('display','block');
                      }
                    });
                  }

                  if (popUpDisplayActionType == 'onexit') {
                    document.addEventListener("mouseleave", function(e){
                      if (popupClosed != 'closed') {
                        if( e.clientY < 0 ){
                          $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').fadeIn('slow');
                          $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').addClass(' animated  <?php echo($popUpEntranceAnimation); ?>');
                          $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').css('display','block');
                        }
                      }
                    }, false);
                  }
                  if (popUpDisplayActionType == 'onclick') {
                    var onclickElId = '<?php echo "$popupDisplayOnClick"; ?>';

                    $('#'+onclickElId).on('click', function(){
                      $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').fadeIn('slow');
                      $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').addClass(' animated  <?php echo($popUpEntranceAnimation); ?>');
                      $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').css('display','block');
                    });
                    $('.'+onclickElId).on('click', function(){
                      $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').fadeIn('slow');
                      $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').addClass(' animated  <?php echo($popUpEntranceAnimation); ?>');
                      $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').css('display','block');
                    });

                  }

               }


              $(document).ready(function(){
                if (popUpDisplayActionType == 'onclick') {
                    var onclickElId = '<?php echo "$popupDisplayOnClick"; ?>';
                    if (onclickElId != '') {
                      $('#'+onclickElId).on('click', function(){
                        $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').fadeIn('slow');
                        $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').addClass(' animated  <?php echo($popUpEntranceAnimation); ?>');
                        $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').css('display','block');
                      });
                      $('.'+onclickElId).on('click', function(){
                        $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').fadeIn('slow');
                        $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').addClass(' animated  <?php echo($popUpEntranceAnimation); ?>');
                        $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').css('display','block');
                      });
                    }
                }
                $('#popb_popup_close_<?php echo($this_popup_unique_Id); ?>').on('click',function(){
                  $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').removeClass(' animated  <?php echo($popUpEntranceAnimation); ?>');
                  $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').addClass(' animated  <?php echo($popUpExitAnimation); ?>').one('animationend oAnimationEnd mozAnimationEnd webkitAnimationEnd', function(){
                      $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').removeClass(' animated  <?php echo($popUpExitAnimation); ?>');
                      $('#POPB-modal-overlay_<?php echo($this_popup_unique_Id); ?>').css('display','none');
                    });
                  popupClosed = 'closed';
                });
              });
            })(jQuery);
          </script>
    <?php
  }
}

?>