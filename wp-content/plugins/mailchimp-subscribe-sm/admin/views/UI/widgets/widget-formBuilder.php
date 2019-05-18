<?php if ( ! defined( 'ABSPATH' ) ) exit; 
?>

<?php

$pbp_is_MCextensionActive = false;
if ( is_plugin_active('PluginOps-Optin-Builder-Extensions-Pack/extension-pack.php') ) {
  $pbp_is_MCextensionActive = true;
}

$pbp_MCtabDisplay = 'inline-block';
$pbp_MCNotice = 'block';
$pbp_customFormField = 'none';
if ($pbp_is_MCextensionActive == true) {
    $pbp_MCtabDisplay = 'inline-block';
    $pbp_customFormField = 'block';
    $pbp_MCNotice = 'none';
}

?>
<div class="tabs" style="width: 99%; min-width: 400px;">
  <ul class="tab-links formBuilderTabs">
    <li class="active" style="margin: 0;"><a href="#formBuilderTab_cf1" class="tab_link">Fields</a></li>
    <li style="margin: 0;"><a href="#formBuilderTab_cf2" class="tab_link">Field Styles</a></li>
    <li style="margin: 0;"><a href="#formBuilderTab_cf3" class="tab_link">Button Styles</a></li>
    <li style="margin: 0; "><a href="#formBuilderTab_cf5" class="tab_link">Integrations</a></li>
    <li style="margin: 0;"><a href="#formBuilderTab_cf6" class="tab_link"> Actions </a></li>
  </ul>
<div class="tab-content" style="box-shadow:none;" >
    <div id="formBuilderTab_cf1" class="tab active">
          <div class="btn" id="addNewFormField" > <span class="dashicons dashicons-plus-alt"></span> Add Field </div>
          <br>
          <br>
          <ul class="sortableAccordionWidget  formFieldItemsContainer">
            
          </ul>

          <ul class="PB_accordion  customFormHtmlContianer" style=" display: <?php echo $pbp_customFormField; ?> ; ">
            <h4>Custom HTML Form</h4>
            <div>
                <textarea class="formCustomHTML" style="width: 350px; height: 300px;"></textarea>
            </div>
          </ul>
    </div>
    <div id="formBuilderTab_cf2" class="tab">
        <div class="pbp_form" style="background: #fff; padding:20px 10px 20px 25px; width: 99%;">
            <label>Field Size: </label>
            <select class="formBuilderFieldSize">
                <option value="small">Small</option>
                <option value="medium">Medium</option>
                <option value="large">Large</option>
            </select>
            <br><br><hr><br>
            <label>Vertical Gap</label>
            <input type="number" class="formBuilderFieldVGap">%
            <br><br><hr><br>
            <label>Horizontal Gap</label>
            <input type="number" class="formBuilderFieldHGap">%
            <br><br><hr><br>
            <label>Show Labels : </label>
            <select class="formBuilderFieldLabelDisplay">
                <option value="unset">Yes</option>
                <option value="none">No</option>
            </select>
            <br><br><hr><br>
            <label>Label Color :</label>
            <input type="text" class=" formBuilderLabelColor" id="formBuilderLabelColor" value='#333333' data-alpha='true'>
            <br><br><hr><br>
            <div>
                <h4>Label Font Size
                    <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                    <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                    <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                </h4>
                <div class="responsiveOps responsiveOptionsContainterLarge">
                    <label></label>
                    <input type="number" class="formBuilderLabelSize">px
                </div>
                <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                    <label></label>
                    <input type="number" class="formBuilderLabelSizeTablet">px
                </div>
                <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                    <label></label>
                    <input type="number" class="formBuilderLabelSizeMobile">px
                </div>
            </div>
            <br><br><hr><br>
            <label>Text Color :</label>
            <input type="text" class=" formBuilderFieldColor" id="formBuilderFieldColor" value='#333333' data-alpha='true'>
            <br><br><hr><br>
            <label>Font family :</label>
            <input class="formBuilderFieldFontFamily gFontSelectorulpb" id="formBuilderFieldFontFamily">
            <br><br><hr><br><br>
            <label>Background Color :</label>
            <input type="text" class=" formBuilderFieldBgColor" id="formBuilderFieldBgColor" value='#333333' data-alpha='true' >
            <br><br><hr><br>
            <label>Border Color :</label>
            <input type="text" class=" formBuilderFieldBorderColor" id="formBuilderFieldBorderColor" value='#333333' data-alpha='true' >
            <br><br><hr><br>
            <label>Border Width : </label>
            <input type="number" class="formBuilderFieldBorderWidth">
            <br><br><hr><br>
            <label>Corner Radius : </label>
            <input type="number" class="formBuilderFieldBorderRadius">
            <br>
            <br>
            <br>
        </div>
    </div>
    <div id="formBuilderTab_cf3" class="tab">
        <div class="pbp_form" style="background: #fff; padding:20px 10px 20px 25px; width: 99%;" >
            <br>
            <label>Button Text</label>
            <input type="text" class="formBuilderBtnText"  placeholder="Button Text">
            <br><br><hr><br>
            <label>Button Size: </label>
            <select class="formBuilderBtnSize">
                <option value="small">Small</option>
                <option value="medium">Medium</option>
                <option value="large">Large</option>
            </select>
            <br><br><hr><br>
            <label> Field Width :</label>
            <select class="formBuilderBtnWidth">
                <option value="100">Default</option>
                <option value="20">20%</option>
                <option value="25">25%</option>
                <option value="33">33%</option>
                <option value="40">40%</option>
                <option value="50">50%</option>
                <option value="60">60%</option>
                <option value="66">66%</option>
                <option value="75">75%</option>
                <option value="80">80%</option>
                <option value="100">100%</option>
            </select>
            <br><br><hr><br>
            <label>Vertical Gap</label>
            <input type="number" class="formBuilderBtnVGap">%
            <br><br><hr><br>
            <label>Horizontal Gap</label>
            <input type="number" class="formBuilderBtnHGap">%
            <br><br><hr><br>
            <label>Background Color :</label>
            <input type="text" class=" formBuilderBtnBgColor" id="formBuilderBtnBgColor" value='#333333' data-alpha='true'>
            <br><br><hr><br>
            <label>Hover BG Color :</label>
            <input type="text" class=" formBuilderBtnHoverBgColor" id="formBuilderBtnHoverBgColor" data-alpha='true' value='#333333' data-alpha='true'>
            <br><br><hr><br>
            <label>Hover Text Color :</label>
            <input type="text" class=" formBuilderBtnHoverTextColor" id="formBuilderBtnHoverTextColor" data-alpha='true' value='#333333' data-alpha='true'>
            <br><br><hr><br>
            <label>Text Color :</label>
            <input type="text" class=" formBuilderBtnColor" id="formBuilderBtnColor" data-alpha='true'>
            <br><br><hr><br>
            <div>
                <h4>Font size
                    <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                    <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                    <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                </h4>
                <div class="responsiveOps responsiveOptionsContainterLarge">
                    <label></label>
                    <input type="number" class="formBuilderBtnFontSize">px
                </div>
                <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                    <label></label>
                    <input type="number" class="formBuilderBtnFontSizeTablet">px
                </div>
                <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                    <label></label>
                    <input type="number" class="formBuilderBtnFontSizeMobile">px
                </div>
            </div>
            <br><br><hr><br>
            <label>Font family :</label>
            <input class="formBuilderBtnFontFamily gFontSelectorulpb" id="formBuilderBtnFontFamily">
            <br><br><hr><br>
            <label>Border Width: </label>
            <input type="number" class="formBuilderBtnBorderWidth">
            <br><br><hr><br>
            <label>Border Color: </label>
            <input type="text" class=" formBuilderBtnBorderColor" id="formBuilderBtnBorderColor" value='#ffffff'>
            <br><br><hr><br>
            <label>Corner Radius: </label>
            <input type="number" class="formBuilderBtnBorderRadius" max="100" min="0">
            <br><br><hr><br>
            <label>Alignment :</label>
            <select class="formBuilderBtnAlignment">
                <option value="left">Left</option>
                <option value="center">Center</option>
                <option value="right">Right</option>
            </select>
            <br><br><hr><br>
            <label>Select Icon</label>
            <input data-placement="bottomRight" class="icp pbicp-auto formBuilderbtnSelectedIconpbicp-auto" value="" type="text" /> 
            <span class="input-group-addon formBuilderbtnSelectedIcon" style="font-size: 16px;"></span>
            <br><br><hr><br>
            <label>Icon Position</label>
            <select class="formBuilderbtnIconPosition">
                <option value="before">Before Text</option>
                <option value="after">After Text</option>
            </select>
            <br><br><hr><br>
            <label>Icon Gap</label>
            <input type="number" class="formBuilderbtnIconGap">px
            <br><br><hr><br>
            <label>Icon Hover Animation</label>
            <select class="formBuilderbtnIconAnimation">
                <option value="">None</option>
                <optgroup label="Attention Seekers">
                    <option value="bounce">bounce</option>
                    <option value="flash">flash</option>
                    <option value="pulse">pulse</option>
                    <option value="rubberBand">rubberBand</option>
                    <option value="shake">shake</option>
                    <option value="swing">swing</option>
                    <option value="tada">tada</option>
                    <option value="wobble">wobble</option>
                    <option value="jello">jello</option>
                    <option value="flip">flip</option>
                </optgroup>
            </select>
            <br><br><hr><br>
            <br>
            <br>
        </div>
    </div>
    <div id="formBuilderTab_cf5" class="tab">
        <div class="pbp_form" style="background: #fff; padding:20px 10px 20px 25px; width: 99%;" >

            <?php  
                if (function_exists('smfb_prem_extension_integrations_form_builder')) {
                } else{
                    echo '
                    <br>
                    <label>Service</label>
                    <select class="formDataSaveType">
                        <option value="" >Email Notification</option>
                        <option value="database" disabled="disabled">Database (Pro Only)</option>
                        <option value="" disabled="disabled">MailChimp (Pro Only)</option>
                        <option value="" disabled="disabled">Get Response (Pro Only)</option>
                        <option value="" disabled="disabled">Active Campaign (Pro Only)</option>
                        <option value="" disabled="disabled">Campaign Monitor (Pro Only)</option>
                        <option value="" disabled="disabled">Aweber (Pro Only)</option>
                        <option value="" disabled="disabled">Drip (Pro Only)</option>
                        <option value="" disabled="disabled">ConvertKit (Pro Only)</option>
                    </select>
                    <br><br><br><hr><br>';
                }

            ?>

            <div class="PB_accordion" style="width:90% !important;">
                <h4>Email Notification</h4>
                <div class="pbp_form" style="background: #fff; padding:20px 10px 20px 25px; width: 99%;" >
                    <br>
                    <label>Form Name :</label>
                    <input type="text" class="formEmailformName">
                    <br><br><hr><br>
                    <label>Email To :</label>
                    <input type="text" class="formEmailTo">
                    <br><br><hr><br>
                    <label>Email Subject :</label>
                    <input type="text" class="formEmailSubject">
                    <label style="display: none;">From Email :</label>
                    <input type="hidden" class="formEmailFromEmail">
                    <br><br><hr><br>
                    <label>Email From Name :</label>
                    <input type="text" class="formEmailName">
                    <br><br><hr><br>
                    <label>Email Format :</label>
                    <select class="formEmailFormat">
                        <option value="plain">Plain Text</option>
                        <option value="HTML">HTML</option>
                    </select>
                    <br><br><hr><br>
                    <label>Error Message :</label>
                    <input type="text" class="formErrorMessage">
                    <br><br><hr><br>
                    <label>Allow Duplicates : </label>
                    <select class="widgetPbFbFormAllowDuplicates">
                        <option value="true">Yes</option>
                        <option value="false">No</option>
                    </select>
                    <br><br><hr><br><br>
                    <span style="font-size: 12px;"> <i>Note : </i> To disable email notification simply leave "Email To" field empty </span>
                </div>
            </div>
            <?php  
                if (function_exists('smfb_prem_extension_integrations_form_builder')) {
                    smfb_prem_extension_integrations_form_builder();               
                } else{

                }
            ?>
        </div>
    </div>
    <div id="formBuilderTab_cf6" class="tab">
        <div class="PB_accordion" style="width:100% !important;">
            <h4>Success Actions</h4>
            <div class="pbp_form" style="background: #fff; padding:20px 10px 20px 25px; width: 99%;" >
                <label>Success Action :</label>
                <select class="formSuccessAction">
                    <option value="showMessage">Show Message</option>
                    <option value="redirect">Redirect To URL</option>
                </select>
                <br><br><hr><br>
                <div class="successFormActionCont" style="display: none; background: #fff;">
                    <label>Redirect URL <span style="font-size:10px">(With http://)</span></label>
                    <input type="url" class="formSuccessActionURL" placeholder="URL">
                    <br><br><hr><br>
                </div>
                <label>Success Message :</label> <br>
                <input type="text" class="formSuccessMessage" style="width: 280px;">
                <br><br><br><hr><br>
                <label>Show Another Optin</label>
                <select class="onSuccessOptin">
                    <option value="">None</option>
                    <?php
                    $FB_ULPB_args = array(
                        'post_type' => 'pluginops_forms',
                        'orderby' => 'date',
                        'post_status' => 'any',
                        'posts_per_page'  => 100,
                      );
                    $FB_ULPB_PrevPosts = get_posts( $FB_ULPB_args );
                    if (is_array($FB_ULPB_PrevPosts)) {
                        foreach ($FB_ULPB_PrevPosts as  $ulpost) {
                          $currentPostId = $ulpost->ID;
                          $currentPostName = get_the_title( $currentPostId);
                          $currentPostLink = get_permalink($currentPostId);
                          echo "<option value='$currentPostId'> $currentPostName </option>";
                        }
                    }
                    ?>
                </select>
                <br><br><br>
                <span><i>Note : The other popup also needs to be placed on website for this option to work.</i></span>
                <hr><br>
                <label>Custom Action (Javascript)</label>
                <textarea class="formSuccessCustomAction"  rows="7" style="width: 280px;"></textarea>
            </div>
            <h4>Duplicate Submission</h4>
            <div class="pbp_form" style="background: #fff; padding:20px 10px 20px 25px; width: 99%;" >
                <label>Message :</label> <br>
                <input type="text" class="formDuplicateMessage" style="width: 200px;">
                <br><br><br><hr><br>
                <label>Custom Action (Javascript)</label>
                <textarea class="formDuplicateCustomAction"  rows="7" style="width: 280px;"></textarea>
                <br><br><br><hr><br>
            </div>
            <h4>Failure Actions</h4>
            <div class="pbp_form" style="background: #fff; padding:20px 10px 20px 25px; width: 99%;" >
                <label>Failure Message :</label> <br>
                <input type="text" class="formFailureMessage" style="width: 200px;">
                <br><br><br><hr><br>
                <label>Custom Action (Javascript)</label>
                <textarea class="formFailureCustomAction"  rows="7" style="width: 280px;"></textarea>
                <br><br><br><hr><br>
            </div>
        </div>
    </div>
</div>
</div>

<p class="widgetErrorNotice formErrorNotice"> Your email notification is not setup properly and you will not recieve email notification when user submits their information, Go to integrations tab to setup email notification to not lose any valuable information. </p>

<h3 style="display: <?php echo $pbp_MCNotice; ?> ;"> Tip You can also sync your form data with MailChimp and aslo save it in database : <a href="https://pluginops.com/optin-builder" target="_blank"> Learn More :</a></h3>

<script type="text/javascript">
    (function($){
        jQuery('#addNewFormField').click(function(){
            jQuery('.formFieldItemsContainer').append('<li> <h3 class="handleHeader"> Field<span class="dashicons dashicons-trash slideRemoveButton" style="float: right;"></span> <span class="dashicons dashicons-admin-page slideDuplicateButton" style="float: right;" title="Duplicate"></span> </h3> <div class="accordContentHolder" style="background: #fff;"> <label>Type : </label> <select class="fbFieldType"> <option value="text">Text</option> <option value="tel">Tel</option> <option value="email">Email</option> <option value="number">Number</option> <option value="url">URL</option> <option value="date">Date</option> <option value="time">Time</option> <option value="textarea">Textarea</option> <option value="select">Select</option> <option value="radio">Radio</option> <option value="checkbox">Checkbox</option> </select> <br> <br> <hr> <br> <div class="thisFieldOptions"> <label> Label :</label> <input type="text" class="fbFieldLabel"> <br> <br> <hr> <br> <label> Placeholder :</label> <input type="text" class="fbFieldPlaceHolder"> <br> <br> <hr> <br> <label> Required :</label> <select class="fbFieldRequired"> <option value="false">No</option> <option value="true">Yes</option> </select> <br> <br> <hr> <br> <label> Field Width :</label> <select class="fbFieldWidth"> <option value="100">Default</option> <option value="20">20%</option> <option value="25">25%</option> <option value="33">33%</option> <option value="40">40%</option> <option value="50">50%</option> <option value="60">60%</option> <option value="66">66%</option> <option value="75">75%</option> <option value="80">80%</option> <option value="100">100%</option> </select> <br> <br> <hr> <br> </div> <br> <br> <div class="textareaOptions pb_hidden"> <label>Textarea Rows: </label> <input type="number" class="fbtextareaRows"> <br> <hr> <br> <br> </div> <div class="multiOptionField pb_hidden"> <label>Options: </label> <textarea class="multiOptionFieldValues" rows="5"></textarea> <br> <span> Enter each option in separate line.</span> <br> <hr> <br> <br> <label>Display Inline :</label> <select class="displayFieldsInline"> <option value="inline-block">Yes</option> <option value="block">No</option> </select> </div> </div> </li>');

            jQuery( '.formFieldItemsContainer' ).accordion( "refresh" );

            jQuery('.closeWidgetPopup').click();
        }); // CLICK function ends here.


        $(document).on( 'change','.fbFieldType', function(){
            var currentSelectedVal = $(this).val();
            if (currentSelectedVal == 'textarea') {
                $(this).siblings('.textareaOptions').removeClass('pb_hidden');
                $(this).siblings('.multiOptionField').addClass('pb_hidden');

            } else if(currentSelectedVal == 'select' || currentSelectedVal == 'radio' || currentSelectedVal == 'checkbox'){
                $(this).siblings('.multiOptionField').removeClass('pb_hidden');
                $(this).siblings('.textareaOptions').addClass('pb_hidden');
            }
            else{
                $(this).siblings('.textareaOptions').addClass('pb_hidden');
                $(this).siblings('.multiOptionField').addClass('pb_hidden');
            }
        });

        $(document).on( 'change','.fbFieldLabel', function(){
            if ($(this).val() == '') {
                
            } else{
                $(this).parent().parent().siblings('.handleHeader').html($(this).val() + '<span class="dashicons dashicons-trash slideRemoveButton" style="float: right;"></span> <span class="dashicons dashicons-admin-page slideDuplicateButton" style="float: right;" title="Duplicate"></span>');
            }
        });

    $(document).on( 'click','.slideRemoveButton', function(){
        jQuery(this).parent().parent().remove();
        jQuery('.closeWidgetPopup').click();
    });

    $(document).on( 'click','.slideDuplicateButton', function(){
        jQuery(this).parent().parent().clone(true, true).insertAfter( jQuery(this).parent().parent() );
        jQuery(this).parent().click();
        jQuery('.closeWidgetPopup').click();
        jQuery(this).parent().parent().parent('.sortableAccordionWidget').accordion( "refresh" );
    });

    $('.formSuccessAction').on('change',function(){
        var selectedAction = $('.formSuccessAction').val();
        if (selectedAction == 'redirect') {
            $('.successFormActionCont').css('display','block');
        }else{
            $('.successFormActionCont').css('display','none');
        }
    });

    })(jQuery);
</script>

<style type="text/css"> .formBuilderTabs li { font-size: 12px !important; } .accordContentHolder { overflow: auto !important; }</style>