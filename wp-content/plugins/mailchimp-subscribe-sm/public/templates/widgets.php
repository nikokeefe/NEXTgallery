<?php if ( ! defined( 'ABSPATH' ) ) exit;
  $colWidgets = $currentColumn['colWidgets'];
  $premWidgetNotice = "<p style='background:#fff; padding:5px 15px;'>Please install or update premium version for activating this widget.</p>"; 
  
      for ($j = 0; $j < count($colWidgets); $j++) {  // widgets loop
          $thisWidget = $colWidgets[$j];
          $this_column_type = $thisWidget['widgetType'];
          $widgetStyling = $thisWidget['widgetStyling'];

          $widgetMtop = $thisWidget['widgetMtop'];
          $widgetMleft = $thisWidget['widgetMleft'];
          $widgetMbottom = $thisWidget['widgetMbottom'];
          $widgetMright = $thisWidget['widgetMright'];
          $widgetBgColor = $thisWidget['widgetBgColor'];

          if (isset($thisWidget['widgetPtop'])) {
            $widgetPtop = $thisWidget['widgetPtop'];
            $widgetPleft = $thisWidget['widgetPleft'];
            $widgetPbottom = $thisWidget['widgetPbottom'];
            $widgetPright = $thisWidget['widgetPright'];

            $widgetPaddings = "padding:".$widgetPtop."% ".$widgetPright."% ".$widgetPbottom."% ".$widgetPleft."%;";
          } else{
            $widgetPaddings = "";
          }


          $widgHideOnDesktop = ""; $widgHideOnTablet = ""; $widgHideOnMobile = "";
          if (isset($thisWidget['widgHideOnDesktop']) ) {
            if ($thisWidget['widgHideOnDesktop'] == 'hide') {
              $widgHideOnDesktop ="display:none";
            }
            if ($thisWidget['widgHideOnTablet'] == 'hide') {
              $widgHideOnTablet ="display:none !important;";
            }
            if ($thisWidget['widgHideOnMobile'] == 'hide') {
              $widgHideOnMobile ="display:none !important;";
            }
          }

          if (isset($thisWidget['widgetPaddingTablet'])) {
            $widgetMarginTablet = $thisWidget['widgetMarginTablet'];
            $widgetMarginMobile = $thisWidget['widgetMarginMobile'];
            $widgetPaddingTablet = $thisWidget['widgetPaddingTablet'];
            $widgetPaddingMobile = $thisWidget['widgetPaddingMobile'];

            $displayWidgetInlineTablet = '';
            $displayWidgetInlineMobile = '';

            if (isset($thisWidget['widgetIsInlineTablet'])) {

              if ($thisWidget['widgetIsInlineTablet'] == 'true') {
                $displayWidgetInlineTablet = "display: inline-block !important;";
              }elseif ($thisWidget['widgetIsInlineTablet'] == 'false') {
                $displayWidgetInlineTablet = "display: block !important;";
              }
              if ($thisWidget['widgetIsInlineMobile'] == 'true') {
                $displayWidgetInlineMobile = "display: inline-block !important;";
              }elseif ($thisWidget['widgetIsInlineMobile'] == 'false') {
                $displayWidgetInlineMobile = "display: block !important;";
              }
              
            }

            $thisWidgetResponsiveWidgetStylesTablet = "
              #widget-$j-$Columni-".$row["rowID"]." {
               margin-top: ".$widgetMarginTablet['rMTT']."% !important;
               margin-bottom: ".$widgetMarginTablet['rMBT']."% !important;
               margin-left: ".$widgetMarginTablet['rMLT']."% !important;
               margin-right: ".$widgetMarginTablet['rMRT']."% !important;

               padding-top: ".$widgetPaddingTablet['rPTT']."% !important;
               padding-bottom: ".$widgetPaddingTablet['rPBT']."% !important;
               padding-left: ".$widgetPaddingTablet['rPLT']."% !important;
               padding-right: ".$widgetPaddingTablet['rPRT']."% !important;
               ".$displayWidgetInlineTablet."

               $widgHideOnTablet
              }
            ";

            $thisWidgetResponsiveWidgetStylesMobile = "
             #widget-$j-$Columni-".$row["rowID"]." {
               margin-top: ".$widgetMarginMobile['rMTM']."% !important;
               margin-bottom: ".$widgetMarginMobile['rMBM']."% !important;
               margin-left: ".$widgetMarginMobile['rMLM']."% !important;
               margin-right: ".$widgetMarginMobile['rMRM']."% !important;

               padding-top: ".$widgetPaddingMobile['rPTM']."% !important;
               padding-bottom: ".$widgetPaddingMobile['rPBM']."% !important;
               padding-left: ".$widgetPaddingMobile['rPLM']."% !important;
               padding-right: ".$widgetPaddingMobile['rPRM']."% !important;
               ".$displayWidgetInlineMobile."

               $widgHideOnMobile
              }
            ";

            array_push($POPBNallRowStylesResponsiveTablet, $thisWidgetResponsiveWidgetStylesTablet);
            array_push($POPBNallRowStylesResponsiveMobile, $thisWidgetResponsiveWidgetStylesMobile);
          }
          

          if (isset($thisWidget['widgetAnimation'])) {

              $widgetAnimation = ' animated '.$thisWidget['widgetAnimation'];

          }else{
            $widgetAnimation = '';
          }

          $widgetIsInline = 'block';
          if (isset($thisWidget['widgetIsInline'])) {
              if ($thisWidget['widgetIsInline'] == 'true') {
                $widgetIsInline = 'inline-block';
              }
          }

          $widgetCustomClass = '';
          if (isset($thisWidget['widgetCustomClass'])) {
              $widgetCustomClass = $thisWidget['widgetCustomClass'];
          }


          if (isset($thisWidget['widgetBoxShadowH'])) {
            $widgetBorderRadius = '';
            if (isset($thisWidget['widgetBorderRadius'])) {
              $widgetBorderRadius = 'border:'.$thisWidget['widgetBorderRadius'].';';
            }

            if ( isset($thisWidget['borderRadius']) ) {
              $WborderRadius = $thisWidget['borderRadius'];
              $widgetBorderRadius = 'border-radius:'.$WborderRadius['wbrt'].'px '.$WborderRadius['wbrr'].'px '.$WborderRadius['wbrb'].'px '.$WborderRadius['wbrl'].'px;';
            }

            if ( isset($thisWidget['borderWidth']) ) {
              $widgetBorderWidth = $thisWidget['borderWidth'];
            }else{
              $widgetBorderWidth = array();
              $widgetBorderWidth['wbwt'] = $thisWidget['widgetBorderWidth'];
              $widgetBorderWidth['wbwb'] = $thisWidget['widgetBorderWidth'];
              $widgetBorderWidth['wbwl'] = $thisWidget['widgetBorderWidth'];
              $widgetBorderWidth['wbwr'] = $thisWidget['widgetBorderWidth'];
            }

            
            $this_widget_border_shadow = 'border-width: '.$widgetBorderWidth['wbwt'].'px '.$widgetBorderWidth['wbwr'].'px  '.$widgetBorderWidth['wbwb'].'px '.$widgetBorderWidth['wbwl'].'px; border-style: '.$thisWidget['widgetBorderStyle'].'; border-color: '.$thisWidget['widgetBorderColor'].'; box-shadow: '.$thisWidget['widgetBoxShadowH'].'px  '.$thisWidget['widgetBoxShadowV'].'px  '.$thisWidget['widgetBoxShadowBlur'].'px '.$thisWidget['widgetBoxShadowColor'].' ; '.$widgetBorderRadius.' ';
          }else{
            $this_widget_border_shadow = '';
          }

          $imgAlignment  = '';
          


          

          //Menu Widget

          switch ($this_column_type) {
            case 'wigt-WYSIWYG':
              //WYSIWYG Widget
              $this_widget_editor = $thisWidget['widgetWYSIWYG'];
              $thisWidgetContentEditor =  $this_widget_editor['widgetContent'];

              $widgetContent =  $thisWidgetContentEditor;
              $contentAlignment = ' ';
              break;
            case 'wigt-img':
              // IMG Widget
              $this_widget_img_content = $thisWidget['widgetImg'];
              $imgUrl  = $this_widget_img_content['imgUrl'];
              $imgSize = $this_widget_img_content['imgSize'];
              $imgSize = $this_widget_img_content['imgSize'];
              $imgAlignment = $this_widget_img_content['imgAlignment'];
              $uniqueImgId = 'pb_img'.(rand(10,99)*120+200) ;
              $imgCustomSize = '';

              if ( isset($this_widget_img_content['iborderRadius']) ) {
                $iborderRadius = $this_widget_img_content['iborderRadius'];
              }else{
                $iborderRadius = [];
                $iborderRadius['iwbrt'] = '';
                $iborderRadius['iwbrb'] = '';
                $iborderRadius['iwbrl'] = '';
                $iborderRadius['iwbrr'] = '';

                $this_widget_img_content['iwbs'] = '';
                $this_widget_img_content['iwbc'] = '';
                $this_widget_img_content['iwbsh'] = '';
                $this_widget_img_content['iwbsv'] = '';
                $this_widget_img_content['iwbsb'] = '';
                $this_widget_img_content['iwbsc'] = '';
              }
              if ( isset($this_widget_img_content['iborderWidth']) ) {
                $iborderWidth = $this_widget_img_content['iborderWidth'];
              }else{
                $iborderWidth = [];
                $iborderWidth['iwbwt'] = '';
                $iborderWidth['iwbwb'] = '';
                $iborderWidth['iwbwl'] = '';
                $iborderWidth['iwbwr'] = '';
              }

              $imgWidgetboxShadow = 'border-width: '.$iborderWidth['iwbwt'].'px '.$iborderWidth['iwbwr'].'px  '.$iborderWidth['iwbwb'].'px '.$iborderWidth['iwbwl'].'px; border-style: '.$this_widget_img_content['iwbs'].'; border-color: '.$this_widget_img_content['iwbc'].'; border-radius:'.$iborderRadius['iwbrt'].'px '.$iborderRadius['iwbrr'].'px '.$iborderRadius['iwbrb'].'px '.$iborderRadius['iwbrl'].'px; box-shadow: '.$this_widget_img_content['iwbsh'].'px  '.$this_widget_img_content['iwbsv'].'px  '.$this_widget_img_content['iwbsb'].'px '.$this_widget_img_content['iwbsc'].' ;  ';

              if ($imgSize == 'custom') {
                  if ($this_widget_img_content['imgSizeCustomWidth'] != "undefined") {
                    $imgSizeCustomWidth = $this_widget_img_content['imgSizeCustomWidth'];
                  }
                  if ($this_widget_img_content['imgSizeCustomHeight'] != "undefined") {
                    $imgSizeCustomHeight = $this_widget_img_content['imgSizeCustomHeight'];
                  }

                  $imgCustomSize = 'width:'.$imgSizeCustomWidth.'px; height:'.$imgSizeCustomHeight.'px;';
              }

              $imgLinkTag = '';
              $imgLinkTagClose = '';
              if (isset($this_widget_img_content['imgLink']) && !empty($this_widget_img_content['imgLink'])) {
                $imgLink = $this_widget_img_content['imgLink'];
                $imgLinkTag = '<a href="'.$imgLink.'" target="_blank">';
                $imgLinkTagClose = '</a>';
              }


              $this_column_img = "<div id='".$uniqueImgId."' style='text-align:".$imgAlignment.";'><img src=".$imgUrl." style='text-align:".$imgAlignment."; ".$imgCustomSize." $imgWidgetboxShadow $widgetStyling ' class='ftr-img-".$Columni." img-".$imgSize."'> </div>";

              if (isset($this_widget_img_content['imgLightBox']) ) {
                $imgLightBox = $this_widget_img_content['imgLightBox'];
                if ($imgLightBox == 'true') {
                  
                  $this_column_img = "<div class='pb_img_thumbnail'  id='".$uniqueImgId."' style='text-align: $imgAlignment ;'> $imgLinkTag <img src=".$imgUrl." style='text-align:".$imgAlignment."; ".$imgCustomSize." $imgWidgetboxShadow $widgetStyling ' class='ftr-img-".$Columni." img-".$imgSize." '> $imgLinkTagClose </div>                          <div class='pb_single_img_lightbox' id='pb_lightbox".$uniqueImgId."'> <img src='".$imgUrl."'> </div> <br> ";
                } else{
                  $this_column_img = "<div id='".$uniqueImgId."' style='text-align:".$imgAlignment.";'> $imgLinkTag <img src=".$imgUrl." style='text-align:".$imgAlignment."; ".$imgCustomSize." $imgWidgetboxShadow $widgetStyling ' class='ftr-img-".$Columni." img-".$imgSize."'> $imgLinkTagClose </div>";

                }
              }

              if ($imgSize == 'custom') {
                if (isset($this_widget_img_content['imgSizeCustomWidthTablet'])) {
                  $thisImgSizeResponsiveWidgetStylesTablet = "
                    #$uniqueImgId img{
                     width: ".$this_widget_img_content['imgSizeCustomWidthTablet']."px !important;
                     height: ".$this_widget_img_content['imgSizeCustomHeightTablet']."px !important;
                    }
                  ";
                  $thisImgSizeResponsiveWidgetStylesMobile = "
                    #$uniqueImgId img{
                     width: ".$this_widget_img_content['imgSizeCustomWidthMobile']."px !important;
                     height: ".$this_widget_img_content['imgSizeCustomHeightMobile']."px !important;
                    }
                  ";

                  array_push($POPBNallRowStylesResponsiveTablet, $thisImgSizeResponsiveWidgetStylesTablet);
                  array_push($POPBNallRowStylesResponsiveMobile, $thisImgSizeResponsiveWidgetStylesMobile);
                }
              }

              if (isset($this_widget_img_content['imgAlignmentTablet'])) {
                  
                  $thisImgWidgetResponsiveWidgetStylesTablet = "
                    #$uniqueImgId {
                     text-align: ".$this_widget_img_content['imgAlignmentTablet']." !important;
                    }
                  ";
                  $thisImgWidgetResponsiveWidgetStylesMobile = "
                    #$uniqueImgId {
                     text-align: ".$this_widget_img_content['imgAlignmentMobile']." !important;
                    }
                  ";

                  array_push($POPBNallRowStylesResponsiveTablet, $thisImgWidgetResponsiveWidgetStylesTablet);
                  array_push($POPBNallRowStylesResponsiveMobile, $thisImgWidgetResponsiveWidgetStylesMobile);
                }
              $widgetStyling = '';
              $widgetContent = $this_column_img;
              $contentAlignment = $imgAlignment;
            break;
            case 'wigt-btn-gen':

              // BTN Widget
              $randomBtnClass = rand(10,99)*200+100;
              $this_widget_btn_content = $thisWidget['widgetButton'];
              $btnText = $this_widget_btn_content['btnText'];
              $btnLink = $this_widget_btn_content['btnLink'];
              $btnAllignment = $this_widget_btn_content['btnButtonAlignment'];
              $btnTextColor = $this_widget_btn_content['btnTextColor'];
              $btnFontSize = $this_widget_btn_content['btnFontSize'];
              $btnBgColor = $this_widget_btn_content['btnBgColor'];
              $btnHeight = $this_widget_btn_content['btnHeight'];
              $btnHoverBgColor = $this_widget_btn_content['btnHoverBgColor'];
              if (isset($this_widget_btn_content['btnBlankAttr'])) {
                $btnBlankAttr = $this_widget_btn_content['btnBlankAttr'];
              }else{
                $btnBlankAttr = '';
              }
              if (isset($this_widget_btn_content['btnWidth'])) {
                $btnWidth = $this_widget_btn_content['btnWidth'];
              }else{
                $btnWidth = '5';
              }

              if (isset($this_widget_btn_content['btnButtonFontFamily'])) {
                $btnButtonFontFamily = $this_widget_btn_content['btnButtonFontFamily'];
              }else{
                $btnButtonFontFamily = '';
              }

              $btnWidthUnit = '%';
              $btnWidthUnitTablet = '%';
              $btnWidthUnitMobile = '%';
              if (isset($this_widget_btn_content['btnWidthUnit']) ) {
                $btnWidthUnit = $this_widget_btn_content['btnWidthUnit'];
                $btnWidthUnitTablet = $this_widget_btn_content['btnWidthUnitTablet'];
                $btnWidthUnitMobile = $this_widget_btn_content['btnWidthUnitMobile'];
              }


              $btnIcon = ''; $btnIconBefore = ''; $btnIconAfter = ''; $btnIconAnimation = ''; $btnIconHoverAnimationScript = '';
              if (isset($this_widget_btn_content['btnSelectedIcon']) ) {
                $btnSelectedIcon = $this_widget_btn_content['btnSelectedIcon'];
                $btnIconPosition = $this_widget_btn_content['btnIconPosition'];
                $btnIconAnimation = $this_widget_btn_content['btnIconAnimation'];
                $btnIconGap = $this_widget_btn_content['btnIconGap'];

                if ($btnSelectedIcon != '') {
                  if ($btnIconPosition == 'before') {
                    $btnIconGap = 'margin-right:'.$btnIconGap.'px;';
                  }else{
                    $btnIconGap = 'margin-left:'.$btnIconGap.'px;';
                  }
                  $btnIcon = '<i style="'.$btnIconGap.'" class="fa '.$btnSelectedIcon.'  btnIcon-'.$randomBtnClass.'"></i>';

                  if ($btnIconAnimation != '') {
                    $btnIconHoverAnimationScript = " <script>
                      jQuery('.btn-".$randomBtnClass."').mouseenter(function(){
                        jQuery('.btnIcon-".$randomBtnClass."').addClass('animated ".$btnIconAnimation."').one('animationend oAnimationEnd mozAnimationEnd webkitAnimationEnd',function(){ 
                           jQuery('.btnIcon-".$randomBtnClass."').removeClass('animated ".$btnIconAnimation."') 
                          });
                     });
                     </script> " ;
                  }
                  
                  $widgetFALoadScripts = true;
                }else{
                  $btnIcon = '';
                }

                if ($btnIconPosition == 'before') {
                  $btnIconBefore = $btnIcon;
                  $btnIconAfter = '';
                }else{
                  $btnIconAfter = $btnIcon;
                  $btnIconBefore = '';
                }
              }

              if (isset($this_widget_btn_content['btnHoverTextColor'])) {
                  $btnHoverTextColor = $this_widget_btn_content['btnHoverTextColor'];
                } else{
                  $btnHoverTextColor = '';
                }

              $POPB_buton_width = "padding: $btnHeight"."px $btnWidth"."px !important;";
              if (isset($this_widget_btn_content['btnWidthPercent'])) {
                $btnWidthPercent = $this_widget_btn_content['btnWidthPercent'];
                if ($btnWidthPercent !== '') {
                  $POPB_buton_width = "padding: $btnHeight"."px 5"."px !important; width:$btnWidthPercent"."$btnWidthUnit;";
                }
              }else{
                $btnWidthPercent = '';
              }

              $btnpreventDefault = '' ; $btnredirectToLink = '';
              if ($btnBlankAttr !== '_blank') {
                $btnpreventDefault = 'e.preventDefault();';
                $btnredirectToLink  = "location.href = '".$btnLink."';";
              }
              
              $btnBorderColor = $this_widget_btn_content['btnBorderColor'];
              $btnBorderWidth = $this_widget_btn_content['btnBorderWidth'];
              $btnBorderRadius = $this_widget_btn_content['btnBorderRadius'];
              
              $this_btn_click_detectionScript = "
                <style> .btn-$randomBtnClass:hover{ background-color: $btnHoverBgColor !important; background: $btnHoverBgColor !important; transition: all .5s; color:$btnHoverTextColor !important;}  </style>
                ";
              $this_widget_btn = "<br>
                <div class='wdt-$this_column_type parent-btn-$randomBtnClass' style='text-align:$btnAllignment;'><a href='$btnLink' style='text-decoration:none !important;' target='$btnBlankAttr' id='btnLink-$randomBtnClass'> <button class='btn-$randomBtnClass' style='color:$btnTextColor ;font-size:$btnFontSize"."px ; background: $btnBgColor ; background-color: $btnBgColor;  $POPB_buton_width  border: $btnBorderWidth"."px solid $btnBorderColor !important; border-radius: $btnBorderRadius"."px !important; text-align:center; font-family:".str_replace('+', ' ', $btnButtonFontFamily)." ,sans-serif;'>$btnIconBefore $btnText  $btnIconAfter</button></a></div> $this_btn_click_detectionScript   $btnIconHoverAnimationScript
                ";

                if (isset($this_widget_btn_content['btnButtonAlignmentTablet'])) {
                  $thisButtonWidgetResponsiveAlignmentTablet = "
                  .parent-btn-$randomBtnClass {
                    text-align:".$this_widget_btn_content['btnButtonAlignmentTablet']." !important;
                  }
                  ";
                  $thisButtonWidgetResponsiveAlignmentMobile = "
                  .parent-btn-$randomBtnClass {
                    text-align:".$this_widget_btn_content['btnButtonAlignmentMobile']." !important;
                  }
                  ";

                  array_push($POPBNallRowStylesResponsiveTablet, $thisButtonWidgetResponsiveAlignmentTablet);
                  array_push($POPBNallRowStylesResponsiveMobile, $thisButtonWidgetResponsiveAlignmentMobile);
                }
                if (isset($this_widget_btn_content['btnFontSizeTablet'])) {
                  
                  $thisButtonWidgetResponsiveWidgetStylesTablet = "            

                    #widget-$j-$Columni-".$row["rowID"]."  .btn-$randomBtnClass {
                     font-size: ".$this_widget_btn_content['btnFontSizeTablet']."px !important;
                     width: ".$this_widget_btn_content['btnWidthPercentTablet']."$btnWidthUnitTablet !important;
                     padding: ".$this_widget_btn_content['btnHeightTablet']."px 5px !important;
                    }
                  ";

                  $thisButtonWidgetResponsiveWidgetStylesMobile = "
                    #widget-$j-$Columni-".$row["rowID"]."  .btn-$randomBtnClass {
                     font-size: ".$this_widget_btn_content['btnFontSizeMobile']."px !important;
                     width: ".$this_widget_btn_content['btnWidthPercentMobile']."$btnWidthUnitMobile !important;
                     padding: ".$this_widget_btn_content['btnHeightMobile']."px 5px !important;
                    }
                  ";

                  array_push($POPBNallRowStylesResponsiveTablet, $thisButtonWidgetResponsiveWidgetStylesTablet);
                  array_push($POPBNallRowStylesResponsiveMobile, $thisButtonWidgetResponsiveWidgetStylesMobile);
                }



                array_push($thisColFontsToLoad, $btnButtonFontFamily);
                $widgetContent = $this_widget_btn;
                $contentAlignment = ' ';
              break;
            case 'wigt-pb-form':

                ob_start();
                $this_widget_subscribeForm = $thisWidget['widgetSubscribeForm'];
                $pbFormID = rand(10,99)*120+200;
                $formLayout = $this_widget_subscribeForm['formLayout'];
                $showNameField = $this_widget_subscribeForm['showNameField'];
                $successAction = $this_widget_subscribeForm['successAction'];
                $successURL = $this_widget_subscribeForm['successURL'];
                $successMessage = $this_widget_subscribeForm['successMessage'];
                $formBtnText = $this_widget_subscribeForm['formBtnText'];
                $formBtnHeight = $this_widget_subscribeForm['formBtnHeight'];
                
                $formBtnBgColor = $this_widget_subscribeForm['formBtnBgColor'];
                $formBtnColor = $this_widget_subscribeForm['formBtnColor'];
                $formBtnHoverBgColor = $this_widget_subscribeForm['formBtnHoverBgColor'];
                $formBtnFontSize = $this_widget_subscribeForm['formBtnFontSize'];
                $formBtnBorderWidth = $this_widget_subscribeForm['formBtnBorderWidth'];
                $formBtnBorderColor = $this_widget_subscribeForm['formBtnBorderColor'];
                $formBtnBorderRadius = $this_widget_subscribeForm['formBtnBorderRadius'];

                $formBtnWidth = '';
                if (isset($this_widget_subscribeForm['formBtnWidth'])) {
                  $formBtnWidth = $this_widget_subscribeForm['formBtnWidth'];
                }

                if (isset($this_widget_subscribeForm['formDataSaveType'])) {
                  $formDataSaveType = $this_widget_subscribeForm['formDataSaveType'];
                } else{
                  $formDataSaveType = '';
                }
                if (isset($this_widget_subscribeForm['formBtnFontFamily'])) {
                  $formBtnFontFamily = $this_widget_subscribeForm['formBtnFontFamily'];
                  $formBtnFontFamily = str_replace('+', ' ', $this_widget_subscribeForm['formBtnFontFamily']);

                  array_push($thisColFontsToLoad, $this_widget_subscribeForm['formBtnFontFamily']);
                } else{
                  $formBtnFontFamily = '';
                }

                if (isset($this_widget_subscribeForm['formSuccessMessageColor'])) {
                  $formSuccessMessageColor = $this_widget_subscribeForm['formSuccessMessageColor'];
                } else{
                  $formSuccessMessageColor = '#333';
                }
                if (isset($this_widget_subscribeForm['formBtnHoverTextColor'])) {
                  $formBtnHoverTextColor = $this_widget_subscribeForm['formBtnHoverTextColor'];
                } else{
                  $formBtnHoverTextColor = '';
                }

                if (isset($this_widget_subscribeForm['formBtnHeightTablet'])) {
                  $formBtnHeightTablet = $this_widget_subscribeForm['formBtnHeightTablet'];
                  $formBtnHeightMobile = $this_widget_subscribeForm['formBtnHeightMobile'];

                  $formBtnFontSizeTablet = $this_widget_subscribeForm['formBtnFontSizeTablet'];
                  $formBtnFontSizeMobile = $this_widget_subscribeForm['formBtnFontSizeMobile'];
                }else{
                  $formBtnHeightTablet = '';
                  $formBtnHeightMobile = '';
                  $formBtnFontSizeTablet = '';
                  $formBtnFontSizeMobile = '';
                }

                $randomFormBtnClass = rand(10,99)*120+200;
                $formbtnIcon = ''; $formbtnIconBefore = ''; $formbtnIconAfter = ''; $formbtnIconAnimation = ''; $formbtnIconHoverAnimationScript = '';
                if (isset($this_widget_subscribeForm['formbtnSelectedIcon']) ) {
                  $formbtnSelectedIcon = $this_widget_subscribeForm['formbtnSelectedIcon'];
                  $formbtnIconPosition = $this_widget_subscribeForm['formbtnIconPosition'];
                  $formbtnIconAnimation = $this_widget_subscribeForm['formbtnIconAnimation'];
                  $formbtnIconGap = $this_widget_subscribeForm['formbtnIconGap'];

                  if ($formbtnSelectedIcon != '') {
                    if ($formbtnIconPosition == 'before') {
                      $formbtnIconGap = 'margin-right:'.$formbtnIconGap.'px;';
                    }else{
                      $formbtnIconGap = 'margin-left:'.$formbtnIconGap.'px;';
                    }
                    $formbtnIcon = '<i style="'.$formbtnIconGap.'" class="fa '.$formbtnSelectedIcon.'  btnIcon-'.$randomFormBtnClass.'"></i>';

                    if ($formbtnIconAnimation != '') {
                      $formbtnIconHoverAnimationScript = " <script>
                        jQuery('.form-btn-".$randomFormBtnClass."').mouseenter(function(){
                          jQuery('.btnIcon-".$randomFormBtnClass."').addClass('animated ".$formbtnIconAnimation."').one('animationend oAnimationEnd mozAnimationEnd webkitAnimationEnd',function(){ 
                             jQuery('.btnIcon-".$randomFormBtnClass."').removeClass('animated ".$formbtnIconAnimation."') 
                            });
                       });
                       </script> " ;
                    }
                    
                    $widgetFALoadScripts = true;
                  }else{
                    $formbtnIcon = '';
                  }

                  if ($formbtnIconPosition == 'before') {
                    $formbtnIconBefore = $formbtnIcon;
                    $formbtnIconAfter = '';
                  }else{
                    $formbtnIconAfter = $formbtnIcon;
                    $formbtnIconBefore = '';
                  }
                }

                $formLayoutAction = " ";
                $formFieldWidth = '60%';
                $formButtonWidth = '30%';
                $showNameFieldType = 'hidden';
                $fieldsMarginTop = ' margin-top : 0;';
                $fieldsMarginRight = '';
                $showNameFieldValue = ' ';
                $showFieldsInline = 'inline-block';
                if ($showNameField  == 'block') { $formFieldWidth = '33%';  $showNameFieldType = 'text';  $showNameFieldValue = ''; }
                if ($showNameField  == 'block' && $formLayout  == 'inline' ){
                  $showNameField = 'inline-block';
                  $showFieldsInline = 'inline-block';
                  $formButtonWidth = '25%';
                  $fieldsMarginTop = ' margin-top : 0;';
                  $fieldsMarginRight = 'margin-right:2.5%;';
                }
                if ($formLayout  == 'stacked') { $showFieldsInline = '';  $formLayoutAction = " "; $formFieldWidth = '99%'; $formButtonWidth = '99%'; $fieldsMarginTop = ' margin-top : 20px;'; }
                $inputNameStyles = "display:".$showNameField."; width:".$formFieldWidth."; padding: ".$formBtnHeight."px 5px; height:auto; font-size:".$formBtnFontSize."px; $fieldsMarginTop  $fieldsMarginRight";
                $inputEmailStyles = "display:$showFieldsInline; width:".$formFieldWidth."; padding: ".$formBtnHeight."px 5px; height:auto; font-size:".$formBtnFontSize."px; $fieldsMarginTop  $fieldsMarginRight";
                $inputButtonStyles = "display:$showFieldsInline; width:".$formButtonWidth."; padding: ".$formBtnHeight."px ".'10'."px; font-size:".$formBtnFontSize."px; background:".$formBtnBgColor."; color:".$formBtnColor."; border: ".$formBtnBorderWidth."px solid ".$formBtnBorderColor." !important; border-radius: ".$formBtnBorderRadius."px !important; font-family:$formBtnFontFamily;   $fieldsMarginTop ";

                $this_widget_form_inputID = " <input type='hidden' name='sm_pID' value='".$current_pageID."'> ";
                $this_widget_form_inputName = "<input type='$showNameFieldType' name='sm_name' placeholder='Your name' style='".$inputNameStyles."' value='$showNameFieldValue' >".$formLayoutAction;
                $this_widget_form_inputEmail = "<input type='email' name='sm_email' placeholder='Your e-mail' style='".$inputEmailStyles."' >".$formLayoutAction.$formLayoutAction;
                $this_widget_form_inputSubmit = "<button type='submit' class='form-btn-$randomFormBtnClass'  style='".$inputButtonStyles."'> $formbtnIconBefore ".$formBtnText." $formbtnIconAfter </button>";

                $this_widget_form_ExtraFields = " <input type='hidden' name='postsID' value='$current_pageID'>       
                                <input type='hidden' name='pbFormTargetInfo' value='$rowCount \n  $Columni \n $j '>
                                <input type='text' id='yourMessageHP' name='messageFBHP'> "; 

                $SfactionURL = admin_url('admin-ajax.php?action=smfb_subscribeForm_data');
                if (empty($formDataSaveType)) {
                  $SfactionURL = admin_url('admin-ajax.php?action=smfb_subscribeForm_data');
                } elseif ($formDataSaveType == 'database') {
                  $SfactionURL = admin_url('admin-ajax.php?action=smfb_subscribeForm_data');
                } elseif ($formDataSaveType == 'mailchimp') { 
                  $SfactionURL = admin_url('admin-ajax.php?action=smfb_subscribeForm_mailchimp_data');
                }


               echo $this_widget_form = "<form id='ulpb_form".$pbFormID."' action='".$SfactionURL."' method='post' class='pluginops-subscribe-form'> ".$this_widget_form_inputID.$this_widget_form_inputName." ".$this_widget_form_inputEmail. '  ' .$this_widget_form_ExtraFields."  ".wp_nonce_field('POPB_send_Subsform_data','POPB_SubsForm_Nonce')." ".$this_widget_form_inputSubmit."<p id='pluginops-response' style='color:".$formSuccessMessageColor.";'></p> </form>
                  <style>.form-btn-$randomFormBtnClass:hover{ background:$ !important; background-color:$formBtnHoverBgColor !important; color:$formBtnHoverTextColor !important; transition:all 0.5s;}  </style>
                ";
                if (!isset($widgetSubscribeFormWidget)) {
                  $widgetSubscribeFormWidget = '';
                }
                if ($widgetSubscribeFormWidget !== true) {
                  echo "<script src='".SMFB_PLUGIN_URL."/js/cookie.js'></script>";
                  $widgetSubscribeFormWidget = true;
                }
                echo $formbtnIconHoverAnimationScript;
                ?>
                <script type="text/javascript">
                  (function($){
                    $(document).ready(function() {

                    $('#ulpb_form'+'<?php echo $pbFormID; ?>').on('submit', function()  {
                      var successAction = "<?php echo $successAction; ?>";
                      var successMessage = "<?php echo $successMessage; ?>";
                      var successURL = "<?php echo $successURL; ?>";
                      $('#pluginops-response').hide();
                      var formActionType = '<?php echo "$formDataSaveType"; ?>';
                      var form = $(this);
                      var result = " ";
                        $.ajax({
                          url: form.attr('action'),
                          method: form.attr('method'),
                          data: form.serialize(),
                          success: function(result){
                            var result = JSON.parse(result);

                            if (formActionType == 'mailchimp') {
                              var mcResult = result['mailchimp'];
                            }if (formActionType == 'getresponse') {
                              var mcResult = result['getResponse'];
                            }else{
                              var mcResult = result['database'];
                            }
                            var cookieConversionTime = <?php echo $cookieConversionTime; ?>;
                            
                            if(mcResult == 'success'){
                              $('#ulpb_form'+'<?php echo $pbFormID; ?> #pluginops-response').html(successMessage);
                              $('#ulpb_form'+'<?php echo $pbFormID; ?> #pluginops-response').show('slow');
                              $.cookie("pluginops_user_subscribed_form<?php echo $current_pageID; ?>", 'yes', {path: '/', expires : cookieConversionTime });
                              setTimeout(function(){
                                $('#POPB-modal-overlay_flyIn_popup_<?php echo $current_pageID; ?>').fadeOut();
                                $('#POPB-modal-overlay_popup_<?php echo $current_pageID; ?>').fadeOut();
                              } , 2000);
                              if (successAction == 'redirect') {
                                location.href = successURL;
                              }
                            } else if(mcResult == 'Subscriber Already Exists'){
                              $('#ulpb_form'+'<?php echo $pbFormID; ?> #pluginops-response').html(successMessage);
                              $('#ulpb_form'+'<?php echo $pbFormID; ?> #pluginops-response').show('slow');
                              $.cookie("pluginops_user_subscribed_form<?php echo $current_pageID; ?>", 'yes', {path: '/', expires : cookieConversionTime });
                              setTimeout(function(){
                                $('#POPB-modal-overlay_flyIn_popup_<?php echo $current_pageID; ?>').fadeOut();
                                $('#POPB-modal-overlay_popup_<?php echo $current_pageID; ?>').fadeOut();
                              } , 2000);
                              if (successAction == 'redirect') {
                                location.href = successURL;
                              }
                            } else{
                              $('#ulpb_form'+'<?php echo $pbFormID; ?> #pluginops-response').html(mcResult);
                              $('#ulpb_form'+'<?php echo $pbFormID; ?> #pluginops-response').show('slow');
                            }

                            console.log('MailChimp Result  : ' + result['mailchimp']);
                            console.log('Database Result  : ' + result['database']);
                            console.log('GetResponse Result  : ' + result['getResponse']);
                            console.log('Campaign Monitor Result  : ' + result['campaignMonitor']);
                            console.log('Active Campaign Result  : ' + result['activeCampaign']);
                            console.log('Drip Result  : ' + result['drip']);
                          }
                      });
                         
                        // Prevents default submission of the form after clicking on the submit button. 
                        return false;   
                    });

                  });

                    })(jQuery);

                  </script>
                <?php 
                $this_form = ob_get_contents();
                ob_end_clean();

                $thisWidgetResponsiveWidgetStylesTablet = "
                  #ulpb_form$pbFormID input {
                    font-size: ".$formBtnFontSizeTablet."px !important;
                    padding-top: ".$formBtnHeightTablet."px !important;
                    padding-bottom: ".$formBtnHeightTablet."px !important;
                  }
                ";
                $thisWidgetResponsiveWidgetStylesMobile = "
                  #ulpb_form$pbFormID input {
                    font-size: ".$formBtnFontSizeMobile."px !important;
                    padding-top: ".$formBtnHeightMobile."px !important;
                    padding-bottom: ".$formBtnHeightMobile."px !important;
                  }
                ";


                array_push($POPBNallRowStylesResponsiveTablet, $thisWidgetResponsiveWidgetStylesTablet);
                array_push($POPBNallRowStylesResponsiveMobile, $thisWidgetResponsiveWidgetStylesMobile);

                $widgetContent = $this_form;
                $contentAlignment = ' ';
            break;
            case 'wigt-pb-icons':
                $this_widget_widgetIcons = $thisWidget['widgetIcons'];
                $pbSelectedIcon = $this_widget_widgetIcons['pbSelectedIcon'];
                $pbIconSize = $this_widget_widgetIcons['pbIconSize'];
                $pbIconRotation = $this_widget_widgetIcons['pbIconRotation'];
                $pbIconColor = $this_widget_widgetIcons['pbIconColor'];
                

                $widgetIconStyles = 'transform: rotate('.$pbIconRotation. 'deg); color:'.$pbIconColor.'; font-size:'.$pbIconSize.'px; margin:0 auto;' ;
                if (isset($this_widget_widgetIcons['pbIconLink']) && !empty($this_widget_widgetIcons['pbIconLink'])) {
                  $pbIconLink = $this_widget_widgetIcons['pbIconLink'];
                  $pbIconLinkHTMl = '<a href='.$pbIconLink.' style="text-decoration:none; ">';
                  $pbIconLinkHTMlclose = '</a>';
                }else{
                  $pbIconLinkHTMl = '';
                  $pbIconLinkHTMlclose = '';
                }
                
                $widgetIconRender = "<div style='text-align:center;' > $pbIconLinkHTMl <i class='$pbSelectedIcon' style='$widgetIconStyles' ></i> $pbIconLinkHTMlclose </div>";

                $widgetContent = $widgetIconRender;
                if (!function_exists('smfb_available_pro_widgets') ) {
                  $widgetContent = "$premWidgetNotice";
                }
                $widgetFALoadScripts = true;
            break;
            case 'wigt-pb-shortcode':
              $this_widget_shortcode = $thisWidget['widgetShortCode'];
              $shortCodeInput = $this_widget_shortcode['shortCodeInput'];
              $widgetContent = do_shortcode( $shortCodeInput );
              if (!function_exists('smfb_available_pro_widgets') ) {
                  $widgetContent = "$premWidgetNotice";
              }
              $contentAlignment = ' ';
            break;
            case 'wigt-pb-countdown':
              
              $this_widget_countdown = $thisWidget['widgetCowntdown'];
              $pbCountDownDate = $this_widget_countdown['pbCountDownDate'];
              $pbCountDownLabel = $this_widget_countdown['pbCountDownLabel'];
              $pbCountDownColor = $this_widget_countdown['pbCountDownColor'];
              $pbCountDownLabelColor = $this_widget_countdown['pbCountDownLabelColor'];
              $pbCountDownTextSize = $this_widget_countdown['pbCountDownTextSize'];
              $pbCountDownLabelTextSize = $this_widget_countdown['pbCountDownLabelTextSize'];

              if (isset($this_widget_countdown['pbCountDownTextSizeTablet'])) {
                $pbCountDownTextSizeTablet =  $this_widget_countdown['pbCountDownTextSizeTablet'];
                $pbCountDownTextSizeMobile =  $this_widget_countdown['pbCountDownTextSizeMobile'];
                
                $pbCountDownLabelTextSizeTablet =  $this_widget_countdown['pbCountDownLabelTextSizeTablet'];
                $pbCountDownLabelTextSizeMobile =  $this_widget_countdown['pbCountDownLabelTextSizeMobile'];

                $pbCountDownLabelFontFamily =  $this_widget_countdown['pbCountDownLabelFontFamily'];
                $pbCountDownNumberFontFamily =  $this_widget_countdown['pbCountDownNumberFontFamily'];

                array_push($thisColFontsToLoad, $pbCountDownLabelFontFamily);
                array_push($thisColFontsToLoad, $pbCountDownNumberFontFamily);

              }else{
                $pbCountDownTextSizeTablet =  '';
                $pbCountDownTextSizeMobile =  '';
                
                $pbCountDownLabelTextSizeTablet =  '';
                $pbCountDownLabelTextSizeMobile =  '';

                $pbCountDownLabelFontFamily = '';
                $pbCountDownNumberFontFamily =  '';
              }

              $pbCountDownType = 'fixed' ; $pbCountDownNumberBgColor = 'transparent'; $pbCountDownHGap = 0; $pbCountDownHGapTablet = 0; $pbCountDownHGapMobile = 0; $pbCountDownVGap = ''; $pbCountDownNumberBorderRadius = '';
              $pbCountDownDateDays = ''; $pbCountDownDateHours = ''; $pbCountDownDateMins = ''; $pbCountDownDateSecs = '';
              if ( isset($this_widget_countdown['pbCountDownType']) ) {
                $pbCountDownType = $this_widget_countdown['pbCountDownType'];
                $pbCountDownNumberBgColor = $this_widget_countdown['pbCountDownNumberBgColor'];
                $pbCountDownHGap = $this_widget_countdown['pbCountDownHGap'];
                $pbCountDownHGapTablet = $this_widget_countdown['pbCountDownHGapTablet'];
                $pbCountDownHGapMobile = $this_widget_countdown['pbCountDownHGapMobile'];
                $pbCountDownVGap = ( (int)$this_widget_countdown['pbCountDownVGap'] / 2);
                $pbCountDownVGapTablet = ( (int)$this_widget_countdown['pbCountDownVGapTablet'] / 2);
                $pbCountDownVGapMobile = ( (int)$this_widget_countdown['pbCountDownVGapMobile'] / 2);

                if ($this_widget_countdown['pbCountDownVGap'] == '') {
                  $pbCountDownVGap = ( 45 / 2);
                }

                $pbCountDownNumberBorderRadius = $this_widget_countdown['pbCountDownNumberBorderRadius'];

                if ($pbCountDownType == 'evergreen') {
                  $pbCountDownDateDays = $this_widget_countdown['pbCountDownDateDays'];
                  $pbCountDownDateHours = $this_widget_countdown['pbCountDownDateHours'];
                  $pbCountDownDateMins = $this_widget_countdown['pbCountDownDateMins'];
                  $pbCountDownDateSecs = $this_widget_countdown['pbCountDownDateSecs'];

                  

                }
              }

              // set 0
                    if ($pbCountDownDateDays == '') {
                      $pbCountDownDateDays = 0;
                    }
                    if ($pbCountDownDateHours == '') {
                      $pbCountDownDateHours = 0;
                    }
                    if ($pbCountDownDateMins == '') {
                      $pbCountDownDateMins = 0;
                    }
                    if ($pbCountDownDateSecs == '') {
                      $pbCountDownDateSecs = 0;
                    }

              $pbCountDownHGapWidth = (25- (int)$pbCountDownHGap );
              $pbCountDownHGapWidthTablet = (25- (int)$pbCountDownHGapTablet );
              $pbCountDownHGapWidthMobile = (25- (int)$pbCountDownHGapMobile );
              
              $pbCountDownTimezone = '';
              if ( isset($this_widget_countdown['pbCountDownTimezone']) ) {
                $pbCountDownTimezone = $this_widget_countdown['pbCountDownTimezone'];
              }


              if ($widgetCountDownLoadScripts == true) {
                $pbCountDownLibrary = ' ';
              }else{
                $pbCountDownLibrary = " <script src='".SMFB_PLUGIN_URL."/js/countdown.js'></script>   <script src='".SMFB_PLUGIN_URL."/js/moment.min.js'></script>   <script src='".SMFB_PLUGIN_URL."/js/moment-timezone-with-data-2010-2020.min.js'></script> ";
              }

              $widgetCountDownLoadScripts = true;

              $hideDays = 'inline-block';  $hideHours = 'inline-block'; $hideMinutes = 'inline-block';  $hideSeconds = 'inline-block'; 
              $daysText = 'DAYS'; $hoursText= 'HOURS'; $minutesText = 'MINUTES'; $secondsText = 'SECONDS';
              if (isset($this_widget_countdown['daysText']) ) {
                if ($this_widget_countdown['daysText'] != '') {
                  $daysText = $this_widget_countdown['daysText'];
                }
                if ($this_widget_countdown['hoursText'] != '') {
                  $hoursText = $this_widget_countdown['hoursText'];
                }
                if ($this_widget_countdown['minutesText'] != '') {
                  $minutesText = $this_widget_countdown['minutesText'];
                }
                if ($this_widget_countdown['secondsText'] != '') {
                  $secondsText = $this_widget_countdown['secondsText'];
                }

                if ($this_widget_countdown['hideDays'] != '' && $this_widget_countdown['hideDays'] != null) {
                  $hideDays = $this_widget_countdown['hideDays'];
                }
                if ($this_widget_countdown['hideHours'] != '' && $this_widget_countdown['hideHours'] != null) {
                  $hideHours = $this_widget_countdown['hideHours'];
                }
                if ($this_widget_countdown['hideMinutes'] != '' && $this_widget_countdown['hideMinutes'] != null) {
                  $hideMinutes = $this_widget_countdown['hideMinutes'];
                }
                if ($this_widget_countdown['hideSeconds'] != '' && $this_widget_countdown['hideSeconds'] != null) {
                  $hideSeconds = $this_widget_countdown['hideSeconds'];
                }
              }

              $countDownId = rand(10,99)*120+200;
              $countDownScript = " <script> 

                if('$pbCountDownType' == 'evergreen'){
                  var todaysDate = new Date();
                  todaysDate.setDate(todaysDate.getDate() + parseInt('$pbCountDownDateDays'));
                  var dd = todaysDate.getDate();
                  var mm = todaysDate.getMonth() + 1;
                  var y = todaysDate.getFullYear();

                  var someFormattedDate = y + '/'+ mm + '/'+ dd;
                  pbCountDownDate = someFormattedDate+' '+$pbCountDownDateHours+':'+$pbCountDownDateMins+':'+$pbCountDownDateSecs;
                }else{
                  pbCountDownDate = '$pbCountDownDate';
                }

                if (pbCountDownDate != '') {
                  if ('$pbCountDownTimezone' != '') {
                    pbCountDownDate = moment.tz(pbCountDownDate,'$pbCountDownTimezone' );
                    pbCountDownDate = pbCountDownDate.format('YYYY/MM/DD HH:mm:ss');
                  }
                }

                numberBlockStyles = 'width: $pbCountDownHGapWidth%; margin-right:$pbCountDownHGap%; background:$pbCountDownNumberBgColor; border-radius:".$pbCountDownNumberBorderRadius."px ;';

                jQuery('#pb_countDown-".$countDownId."').countdown(pbCountDownDate, function(event) {
                  hideDays = '$hideDays'; hideHours = '$hideHours';
                  if (hideDays == 'none') { totalHours = event.offset.totalDays * 24 + event.offset.hours; } 
                  else { totalHours =  event.offset.hours; if (totalHours < 10) { totalHours = '0'+totalHours; } }
                  if (hideHours == 'none') { totalMins = totalHours * 60 + event.offset.minutes; } 
                  else { totalMins =  event.offset.minutes;  if (totalMins < 10) { totalMins = '0'+totalMins; } }
                  jQuery(this).html(event.strftime(
                  '<div style=\"width: 100%; letter-spacing:5px; \">'+
                    '<div class=\" numberBlock \" style=\" display:$hideDays; '+numberBlockStyles+' \"><p class=\"pluginOpsCountDownNumbers\" > %D </p> <p class=\"pluginOpsCountDownLabels\" >$daysText</p></div>'+
                    '<div class=\" numberBlock \" style=\" display:$hideHours; '+numberBlockStyles+' \"><p class=\"pluginOpsCountDownNumbers\"> '+totalHours+' </p> <p class=\"pluginOpsCountDownLabels\" >$hoursText</p></div>'+
                    '<div class=\" numberBlock \" style=\" display:$hideMinutes; '+numberBlockStyles+' \"><p class=\"pluginOpsCountDownNumbers\"> '+totalMins+' </p> <p class=\"pluginOpsCountDownLabels\" >$minutesText</p></div>'+
                    '<div class=\" numberBlock \" style=\" display:$hideSeconds; '+numberBlockStyles+' \"><p class=\"pluginOpsCountDownNumbers\"> %S </p> <p class=\"pluginOpsCountDownLabels\" >$secondsText</p></div> '+
                  '</div>' ) );
                });
              </script> ";

              $countDownContainer = "<div id=pb_countDown-".$countDownId." style='text-align:center; padding:2% 3%;'></div>";

              $thisWidgetStyles = " <style>
                #pb_countDown-$countDownId .pluginOpsCountDownNumbers {
                  margin-top:".$pbCountDownVGap."px; margin-bottom:".$pbCountDownVGap."px; 
                  font-size:".$pbCountDownTextSize."px; color:".$pbCountDownColor."; line-height:0;
                  font-family:".str_replace('+', ' ', $pbCountDownNumberFontFamily).";

                }
                #pb_countDown-$countDownId .pluginOpsCountDownLabels {
                  margin-top:".$pbCountDownVGap."px; margin-bottom:".$pbCountDownVGap."px; 
                  font-size:".$pbCountDownLabelTextSize."px; color:".$pbCountDownLabelColor."; display:".$pbCountDownLabel."; line-height:0;
                  font-family:".str_replace('+', ' ', $pbCountDownLabelFontFamily).";
                }
                #pb_countDown-$countDownId .numberBlock { width:".$pbCountDownHGapWidth."%; margin-right:".$pbCountDownHGap."%; }
              </style> ";

              $thisWidgetResponsiveWidgetStylesTablet = "
                #pb_countDown-$countDownId .pluginOpsCountDownNumbers {
                  font-size: ".$pbCountDownTextSizeTablet."px !important;
                }
                #pb_countDown-$countDownId .pluginOpsCountDownLabels {
                  font-size: ".$pbCountDownLabelTextSizeTablet."px !important;
                }
                #pb_countDown-$countDownId .numberBlock { width:".$pbCountDownHGapWidthTablet."%; margin-right:".$pbCountDownHGapTablet."%; }
              ";
              $thisWidgetResponsiveWidgetStylesMobile = "
                #pb_countDown-$countDownId .pluginOpsCountDownNumbers {
                  font-size: ".$pbCountDownTextSizeMobile."px !important;
                }
                #pb_countDown-$countDownId .pluginOpsCountDownLabels {
                  font-size: ".$pbCountDownLabelTextSizeMobile."px !important;
                }
                #pb_countDown-$countDownId .numberBlock { width:".$pbCountDownHGapWidthMobile."%; margin-right:".$pbCountDownHGapMobile."%; }
              ";


              array_push($POPBNallRowStylesResponsiveTablet, $thisWidgetResponsiveWidgetStylesTablet);
              array_push($POPBNallRowStylesResponsiveMobile, $thisWidgetResponsiveWidgetStylesMobile);

              $widgetContent = $countDownContainer .$pbCountDownLibrary. $countDownScript . $thisWidgetStyles;

              if (!function_exists('smfb_available_pro_widgets') ) {
                $widgetContent = "<p style='background:#fff; padding:5px 15px;'>Please install or update premium version for this widget.</p>";
              }
            break;
            case 'wigt-pb-progressBar':
              $this_widget_progressBar = $thisWidget['widgetProgressBar'];

              $pbProgressBarTitle = $this_widget_progressBar['pbProgressBarTitle'];
              $pbProgressBarPrecentage = $this_widget_progressBar['pbProgressBarPrecentage'];
              $pbProgressBarText = $this_widget_progressBar['pbProgressBarText'];
              $pbProgressBarDisplayPrecentage = $this_widget_progressBar['pbProgressBarDisplayPrecentage'];
              $pbProgressBarTitleColor = $this_widget_progressBar['pbProgressBarTitleColor'];
              $pbProgressBarTextColor = $this_widget_progressBar['pbProgressBarTextColor'];
              $pbProgressBarColor = $this_widget_progressBar['pbProgressBarColor'];
              $pbProgressBarBgColor = $this_widget_progressBar['pbProgressBarBgColor'];
              $pbProgressBarTitleSize = $this_widget_progressBar['pbProgressBarTitleSize'];
              $pbProgressBarHeight = $this_widget_progressBar['pbProgressBarHeight'];
              $pbProgressBarTextSize = $this_widget_progressBar['pbProgressBarTextSize'];

              if (isset($this_widget_progressBar['pbProgressBarTextFontFamily'])) {

                $pbProgressBarTextFontFamily = str_replace('+', ' ', $this_widget_progressBar['pbProgressBarTextFontFamily']);

                array_push($thisColFontsToLoad, $this_widget_progressBar['pbProgressBarTextFontFamily']);
              }else{
                $pbProgressBarTextFontFamily = '';
              }

              
              $pbProgressBarUniqueId = 'pb_progressBar_'.(rand(10,99)*120+200);

              $pbProgressBarHTML = '
              <p style="font-size:'.$pbProgressBarTitleSize.'px; color:'.$pbProgressBarTitleColor.';line-height:0; font-family:'.$pbProgressBarTextFontFamily.',sans-serif;" >'.$pbProgressBarTitle.'</p>

              <div id='.$pbProgressBarUniqueId.' style="background-color:'.$pbProgressBarBgColor.'; height:'.$pbProgressBarHeight.'px; position:relative;">

                <div style="position:absolute; top:'.($pbProgressBarHeight/2).'px; line-height:0; color:'.$pbProgressBarTextColor.'; font-size:'.$pbProgressBarTextSize.'px; left:2%; font-family:'.$pbProgressBarTextFontFamily.',sans-serif;">'.$pbProgressBarText.'</div>

                <div class="progressBarNumber" style="position:absolute;left:'.($pbProgressBarPrecentage-6).'%; top:'.($pbProgressBarHeight/2).'px; line-height:0; color:'.$pbProgressBarTextColor.'; font-size:'.$pbProgressBarTextSize.'px; font-family:'.$pbProgressBarTextFontFamily.',sans-serif; ">%</div>
              </div>';

              $pbProgressBarScript = '
              <script> 
               var thisProgressBar_'.$pbProgressBarUniqueId.' = jQuery( "#'.$pbProgressBarUniqueId.'" );
               var progressNumber_'.$pbProgressBarUniqueId.' = jQuery("#'.$pbProgressBarUniqueId.'  .progressBarNumber");

               thisProgressBar_'.$pbProgressBarUniqueId.'.progressbar({ value: 0, change: function(){
                progressNumber_'.$pbProgressBarUniqueId.'.text(thisProgressBar_'.$pbProgressBarUniqueId.'.progressbar("value")+ "%"); 
                progressNumber_'.$pbProgressBarUniqueId.'.css("left",thisProgressBar_'.$pbProgressBarUniqueId.'.progressbar("value")-10 + "%");
                }   
              });
                function '.$pbProgressBarUniqueId.'_pb_progress() { 
                  var val = thisProgressBar_'.$pbProgressBarUniqueId.'.progressbar( "value" ) || 0;
                  thisProgressBar_'.$pbProgressBarUniqueId.'.progressbar( "value", val + 1 );

                  if ( val <= '.($pbProgressBarPrecentage -2).' ) {
                    setTimeout( '.$pbProgressBarUniqueId.'_pb_progress, 20 ); 
                  }
                } 
                  setTimeout( '.$pbProgressBarUniqueId.'_pb_progress, 500 );

              </script>

                <style> #'.$pbProgressBarUniqueId.' .ui-progressbar-value{background-color:'.$pbProgressBarColor.' !important; margin:0 !important; } </style>  ';


              $pbProgressBarHTMLContainer = $pbProgressBarHTML . $pbProgressBarScript;

              $widgetContent = $pbProgressBarHTMLContainer;
              if (!function_exists('smfb_available_pro_widgets') ) {
                $widgetContent = "<p style='background:#fff; padding:5px 15px;'>Please install or update premium version for this widget.</p>";
              }
            break;
            case 'wigt-pb-spacer':

                $this_widget_spacer = $thisWidget['widgetVerticalSpace'];
                $widgetSpacer = '<div style="height:'.$this_widget_spacer['widgetVerticalSpaceValue'].'px ;"></div>';

                if (isset($this_widget_spacer['widgetVerticalSpaceValueTablet'])) {
                  $thisSpacerWidgetResponsiveWidgetStylesTablet = "
                    #widget-$j-$Columni-".$row["rowID"]."  div {
                     height: ".$this_widget_spacer['widgetVerticalSpaceValueTablet']."px !important;
                    }
                  ";

                  $thisSpacerWidgetResponsiveWidgetStylesMobile = "
                    #widget-$j-$Columni-".$row["rowID"]."  div {
                     height: ".$this_widget_spacer['widgetVerticalSpaceValueMobile']."px !important;
                    }
                  ";

                  array_push($POPBNallRowStylesResponsiveTablet, $thisSpacerWidgetResponsiveWidgetStylesTablet);
                  array_push($POPBNallRowStylesResponsiveMobile, $thisSpacerWidgetResponsiveWidgetStylesMobile);
                }


                $widgetContent = $widgetSpacer;
              break;
            case 'wigt-pb-break':
              
                $this_widget_breaker = $thisWidget['widgetBreaker'];
                $widgetBreaker = '<div style=" padding:'.$this_widget_breaker['widgetBreakerSpacing'].'px 0; text-align: '.$this_widget_breaker['widgetBreakerAlignment'].' ; "> <span style=" border-top:'.$this_widget_breaker['widgetBreakerWeight'].'px  '.$this_widget_breaker['widgetBreakerStyle'].'   '.$this_widget_breaker['widgetBreakerColor'].'; width:'.$this_widget_breaker['widgetBreakerWidth'].'%; display:inline-block; line-height:0;" ></span> </div>';

                $widgetContent = $widgetBreaker;
            break;
            case 'wigt-pb-iconList':
              
                $this_widget_icon_list = $thisWidget['widgetIconList'];
                
                $iconListLineHeight = $this_widget_icon_list['iconListLineHeight'];
                $iconListAlignment = $this_widget_icon_list['iconListAlignment'];
                $iconListIconSize = $this_widget_icon_list['iconListIconSize'];
                $iconListIconColor = $this_widget_icon_list['iconListIconColor'];
                $iconListTextSize = $this_widget_icon_list['iconListTextSize'];
                $iconListTextIndent = $this_widget_icon_list['iconListTextIndent'];
                $iconListTextColor = $this_widget_icon_list['iconListTextColor'];
                

                if (isset($this_widget_icon_list['iconListItemLinkOpen'])) {
                  $iconListItemLinkOpen = $this_widget_icon_list['iconListItemLinkOpen'];
                }

                if (isset($this_widget_icon_list['iconListIconSizeTablet'])) {
                  $iconListIconSizeTablet = $this_widget_icon_list['iconListIconSizeTablet'];
                  $iconListIconSizeMobile = $this_widget_icon_list['iconListIconSizeMobile'];

                  $iconListTextSizeTablet = $this_widget_icon_list['iconListTextSizeTablet'];
                  $iconListTextSizeMobile = $this_widget_icon_list['iconListTextSizeMobile'];

                  $iconListTextIndentTablet = $this_widget_icon_list['iconListTextIndentTablet'];
                  $iconListTextIndentMobile = $this_widget_icon_list['iconListTextIndentMobile'];
                }
                
                $iconListComplete = $this_widget_icon_list['iconListComplete'];


                $pbIconListAllItems = '';

                ob_start();
                  $pbIconListUniqueId = 'pb_IconList_'.(rand(10,99)*120+200);

                  echo "\n <ul id='$pbIconListUniqueId' > \n";

                  foreach ($iconListComplete as $iconListItem) {
                    $pbThisListIcon = '<i class="fa '.$iconListItem['iconListItemIcon'].'"></i>';
                    if ($iconListItem['iconListItemLink'] !== '') {
                      $pbThisListItemLinkOpen = '<a href='.$iconListItem['iconListItemLink'].' target="_blank" >';
                      $pbThisListItemLinkClose = '</a>';
                    } else{
                      $pbThisListItemLinkOpen = '';
                      $pbThisListItemLinkClose = '';
                    }
                    $pbListThisItem = $pbThisListItemLinkOpen. " <li> ".$pbThisListIcon."  <span>".$iconListItem['iconListItemText']."</span>  </li> " . $pbThisListItemLinkClose;
                    
                    echo $pbListThisItem;
                  }

                  echo "</ul> \n";


                  
                  $pbIconListWrapper = ob_get_contents();
                ob_end_clean();

                $pbIconListUniqueStyles = ' <style> 
                #'.$pbIconListUniqueId.' { line-height:'.$iconListLineHeight.'px; text-align:'.$iconListAlignment.'; text-decoration:none; list-style:none; } 
                 #'.$pbIconListUniqueId.' li i { font-size:'.$iconListIconSize.'px; color:'.$iconListIconColor.';  } 
                 #'.$pbIconListUniqueId.' li span { font-size:'.$iconListTextSize.'px; color:'.$iconListTextColor.';  margin-left:'.$iconListTextIndent.'px; }
                 #'.$pbIconListUniqueId.' a { text-decoration:none; } </style>  ';

                $thisWidgetResponsiveWidgetStylesTablet = "
                  #$pbIconListUniqueId li i {
                    font-size: ".$iconListIconSizeTablet."px !important;
                  }
                  #$pbIconListUniqueId li span {
                    font-size: ".$iconListTextSizeTablet."px !important;
                    margin-left: ".$iconListTextIndentTablet."px !important;
                  }
                ";
                $thisWidgetResponsiveWidgetStylesMobile = "
                  #$pbIconListUniqueId li i {
                    font-size: ".$iconListIconSizeMobile."px !important;
                  }
                  #$pbIconListUniqueId li span {
                    font-size: ".$iconListTextSizeMobile."px !important;
                    margin-left: ".$iconListTextIndentMobile."px !important;
                  }
                ";


                array_push($POPBNallRowStylesResponsiveTablet, $thisWidgetResponsiveWidgetStylesTablet);
                array_push($POPBNallRowStylesResponsiveMobile, $thisWidgetResponsiveWidgetStylesMobile);

                $widgetContent = $pbIconListWrapper ."\n". $pbIconListUniqueStyles;
                if (!function_exists('smfb_available_pro_widgets') ) {
                  $widgetContent = "$premWidgetNotice";
                }
                $widgetFALoadScripts = true;
            break;
            case 'wigt-pb-formBuilder':
              include(SMFB_PLUGIN_PATH.'public/templates/form-builder-widget.php');
            break;
            case 'wigt-pb-text':
                $this_widget_text = $thisWidget['widgetText'];

                $widgetTextContent = str_replace("\n","<br>",$this_widget_text['widgetTextContent']);
                $widgetTextAlignment = $this_widget_text['widgetTextAlignment'];
                $widgetTextTag = $this_widget_text['widgetTextTag'];
                $widgetTextColor = $this_widget_text['widgetTextColor'];
                $widgetTextSize = $this_widget_text['widgetTextSize'];
                $widgetTextFamily = $this_widget_text['widgetTextFamily'];
                $widgetTextWeight = $this_widget_text['widgetTextWeight'];
                $widgetTextTransform = $this_widget_text['widgetTextTransform'];

                $widgetTextBold = ''; $widgetTextItalic = ''; $widgetTextUnderlined = '';

                if (isset($this_widget_text['widgetTextBold'])) {
                  if ($this_widget_text['widgetTextBold'] == true) { $widgetTextBold = 'bold'; }
                }
                if (isset($this_widget_text['widgetTextItalic'])) {
                  if ($this_widget_text['widgetTextItalic'] == true) { $widgetTextItalic = 'italic'; }
                }

                if (isset($this_widget_text['widgetTextUnderlined'])) {
                  if ($this_widget_text['widgetTextUnderlined'] == true) { $widgetTextUnderlined = 'underline'; }
                }
                $widgetTextAlignmentTablet = ''; $widgetTextAlignmentMobile = '';
                if (isset($this_widget_text['widgetTextAlignmentTablet'])) {
                  $widgetTextAlignmentTablet = $this_widget_text['widgetTextAlignmentTablet'];
                  $widgetTextAlignmentMobile = $this_widget_text['widgetTextAlignmentMobile'];
                }

                if (isset($this_widget_text['widgetTextSizeTablet'])) {
                  
                  $thisTextWidgetResponsiveWidgetStylesTablet = "
                    #widget-$j-$Columni-".$row["rowID"]."  $widgetTextTag {
                     font-size: ".$this_widget_text['widgetTextSizeTablet']."px !important;
                     line-height: ".$this_widget_text['widgetTextLineHeightTablet']."em !important;
                     letter-spacing: ".$this_widget_text['widgetTextSpacingTablet']."px !important;
                     text-align:$widgetTextAlignmentTablet !important;
                    }
                  ";

                  $thisTextWidgetResponsiveWidgetStylesMobile = "
                    #widget-$j-$Columni-".$row["rowID"]."  $widgetTextTag {
                     font-size: ".$this_widget_text['widgetTextSizeMobile']."px !important;
                     line-height: ".$this_widget_text['widgetTextLineHeightMobile']."em !important;
                     letter-spacing: ".$this_widget_text['widgetTextSpacingMobile']."px !important;
                     text-align:$widgetTextAlignmentMobile !important;
                    }
                  ";


                  array_push($POPBNallRowStylesResponsiveTablet, $thisTextWidgetResponsiveWidgetStylesTablet);
                  array_push($POPBNallRowStylesResponsiveMobile, $thisTextWidgetResponsiveWidgetStylesMobile);
                }
                

                $widgetTextLineHeight = '';
                if (isset($this_widget_text['widgetTextLineHeight'])) {
                  $widgetTextLineHeight = $this_widget_text['widgetTextLineHeight'];
                }

                $widgetTextSpacing = '';
                if (isset($this_widget_text['widgetTextSpacing'])) {
                  $widgetTextSpacing = $this_widget_text['widgetTextSpacing'];
                }

                $textWidgetContentStyles = 'text-align:'.$widgetTextAlignment.'; color:'.$widgetTextColor.'; font-size:'.$widgetTextSize.'px; font-weight:'.$widgetTextWeight.'; text-transform:'.$widgetTextTransform.';  font-family:'.str_replace('+', ' ', $widgetTextFamily).',sans-serif; '.$widgetStyling.' font-weight:'.$widgetTextBold.';'
                  .' font-style:'.$widgetTextItalic.';'
                  .'  text-decoration:'.$widgetTextUnderlined.'; line-height:'.$widgetTextLineHeight.'em;  letter-spacing:'.$widgetTextSpacing.'px;';

                $textWidgetContentComplete = '<'.$widgetTextTag.' style="'.$textWidgetContentStyles.'"> '.$widgetTextContent.' </'.$widgetTextTag.'> ';

                $widgetContent = $textWidgetContentComplete;

                $widgetStyling = '';
                array_push($thisColFontsToLoad, $widgetTextFamily);
            break;
            case 'wigt-pb-embededVideo':
              include(SMFB_PLUGIN_PATH.'public/templates/widgets/widget-embededVideo.php');
                if (!function_exists('smfb_available_pro_widgets') ) {
                  $widgetContent = "$premWidgetNotice";
                }
            break;
            case 'wigt-pb-popupClose':

              $this_widget_close_btn_content = $thisWidget['widgetClosePopUp'];
              $closeBtnText = $this_widget_close_btn_content['closeBtnText'];
              $closeBtnLink = '';
              $closeBtnAllignment = $this_widget_close_btn_content['closeBtnButtonAlignment'];
              if (isset($this_widget_close_btn_content['closeBtnColor'])) {
                $closeBtnColor = $this_widget_close_btn_content['closeBtnColor'];
              }else{
                $closeBtnColor = '#333';
              }
              
              $closeBtnFontSize = $this_widget_close_btn_content['closeBtnFontSize'];
              $closeBtnBgColor = $this_widget_close_btn_content['closeBtnBgColor'];
              $closeBtnHeight = $this_widget_close_btn_content['closeBtnHeight'];
              $closeBtnHoverBgColor = $this_widget_close_btn_content['closeBtnHoverBgColor'];
              $closeBtnBold = ''; $closeBtnItalic = ''; $closeBtnUnderlined = '';
                if ($this_widget_close_btn_content['closeBtnBold'] == true) { $closeBtnBold = 'font-weight:bold;'; }
                if ($this_widget_close_btn_content['closeBtnItalic'] == true) { $closeBtnItalic = 'font-style:italic;'; }
                if ($this_widget_close_btn_content['closeBtnUnderlined'] == true) { $closeBtnUnderlined = 'text-decoration:underline;'; }
              
                $closeBtnBlankAttr = '';

              if (isset($this_widget_close_btn_content['closeBtnWidth'])) {
                $closeBtnWidth = $this_widget_close_btn_content['closeBtnWidth'];
              }else{
                $closeBtnWidth = '5';
              }

              if (isset($this_widget_close_btn_content['closeBtnButtonFontFamily'])) {
                $closeBtnButtonFontFamily = $this_widget_close_btn_content['closeBtnButtonFontFamily'];
              }else{
                $closeBtnButtonFontFamily = '';
              }

              $closeBtnWidthUnit = '%';
              $closeBtnWidthUnitTablet = '%';
              $closeBtnWidthUnitMobile = '%';
              if (isset($this_widget_close_btn_content['closeBtnWidthUnit']) ) {
                $closeBtnWidthUnit = $this_widget_close_btn_content['closeBtnWidthUnit'];
                $closeBtnWidthUnitTablet = $this_widget_close_btn_content['closeBtnWidthUnitTablet'];
                $closeBtnWidthUnitMobile = $this_widget_close_btn_content['closeBtnWidthUnitMobile'];
              }

              $POPB_buton_width = "padding: $closeBtnHeight"."px $closeBtnWidth"."px !important;";
              if (isset($this_widget_close_btn_content['closeBtnWidthPercent'])) {
                $closeBtnWidthPercent = $this_widget_close_btn_content['closeBtnWidthPercent'];
                if ($closeBtnWidthPercent !== '') {
                  $POPB_buton_width = "padding: $closeBtnHeight"."px 5"."px !important; width:$closeBtnWidthPercent"."$closeBtnWidthUnit;";
                }
              }else{
                $closeBtnWidthPercent = '';
              }

              
              $closeBtnBorderColor = $this_widget_close_btn_content['closeBtnBorderColor'];
              $closeBtnBorderWidth = $this_widget_close_btn_content['closeBtnBorderWidth'];
              $closeBtnBorderRadius = $this_widget_close_btn_content['closeBtnBorderRadius'];
              $randomBtnClass = rand(10,99)*200+100;
              $this_widget_close_btn = "
                <div class='wdt-$this_column_type' style='text-align:$closeBtnAllignment;'> <button class='btn-$randomBtnClass popb-popupClose_$OptinCurrent_pageID' style='color:$closeBtnColor !important;font-size:$closeBtnFontSize"."px !important; background: $closeBtnBgColor ; background-color: $closeBtnBgColor;  $POPB_buton_width  border: $closeBtnBorderWidth"."px solid $closeBtnBorderColor !important; border-radius: $closeBtnBorderRadius"."px !important; text-align:center; font-family:".str_replace('+', ' ', $closeBtnButtonFontFamily)." ,sans-serif;  ".$closeBtnUnderlined." ".$closeBtnBold." ".$closeBtnItalic." '>$closeBtnText</button> </div>
                <script>
                  ( function( $ ) { 
                    $('.popb-popupClose_$OptinCurrent_pageID').click(function(){
                      $('#POPB-modal-overlay_popup_$OptinCurrent_pageID').removeClass(' animated  $popUpEntranceAnimation');
                      $('#POPB-modal-overlay_popup_$OptinCurrent_pageID').addClass(' animated $popUpExitAnimation');
                      $('#POPB-modal-overlay_flyIn_popup_$OptinCurrent_pageID').removeClass(' animated  $popUpEntranceAnimation');
                      $('#POPB-modal-overlay_flyIn_popup_$OptinCurrent_pageID').addClass(' animated $popUpExitAnimation');
                      popupClosed = 'closed';
                      $('#popb_popup_close_popup_$OptinCurrent_pageID').trigger('click');
                      $('#popb_popup_close_flyIn_popup_$OptinCurrent_pageID').trigger('click');
                    });
                  })(jQuery);
                </script>
                <style>
                  .btn-$randomBtnClass:hover{ background-color: $closeBtnHoverBgColor !important; background: $closeBtnHoverBgColor !important; transition:all 0.7s;} 
                </style>
                ";
                if (isset($this_widget_close_btn_content['closeBtnFontSizeTablet'])) {
                  
                  $thisButtonWidgetResponsiveWidgetStylesTablet = "

                    #widget-$j-$Columni-".$row["rowID"]."  .btn-$randomBtnClass {
                     font-size: ".$this_widget_close_btn_content['closeBtnFontSizeTablet']."px !important;
                     width: ".$this_widget_close_btn_content['closeBtnWidthPercentTablet']."$closeBtnWidthUnitTablet !important;
                     padding: ".$this_widget_close_btn_content['closeBtnHeightTablet']."px 5px !important;
                    }
                  ";

                  $thisButtonWidgetResponsiveWidgetStylesMobile = "
                    #widget-$j-$Columni-".$row["rowID"]."  .btn-$randomBtnClass {
                     font-size: ".$this_widget_close_btn_content['closeBtnFontSizeMobile']."px !important;
                     width: ".$this_widget_close_btn_content['closeBtnWidthPercentMobile']."$closeBtnWidthUnitMobile !important;
                     padding: ".$this_widget_close_btn_content['closeBtnHeightMobile']."px 5px !important;
                    }
                  ";

                  array_push($POPBNallRowStylesResponsiveTablet, $thisButtonWidgetResponsiveWidgetStylesTablet);
                  array_push($POPBNallRowStylesResponsiveMobile, $thisButtonWidgetResponsiveWidgetStylesMobile);
                }



              array_push($thisColFontsToLoad, $closeBtnButtonFontFamily);
              $widgetContent = $this_widget_close_btn;
              $contentAlignment = ' ';
              break;
            default:
              $widgetContent = $thisWidgetContentEditor;
              $contentAlignment = ' ';
            break;
          } // column type switch ends here



          $widgBackgroundOptions = 'background:'.$widgetBgColor.';';

          if (isset($thisWidget['widgBgImg']) ) {
            $thisWidgBgImg = $thisWidget['widgBgImg'];
            if ($thisWidgBgImg !== '') {
              $widgBackgroundOptions = 'background: url('.$thisWidgBgImg.') no-repeat center; background-size:cover;';
            }
          }

          if (isset($thisWidget['widgBackgroundType']) ) {
            if ($thisWidget['widgBackgroundType'] == 'gradient') {
              $widgGradient = $thisWidget['widgGradient'];

              if ($widgGradient['widgGradientType'] == 'linear') {
                $widgBackgroundOptions = 'background: linear-gradient('.$widgGradient['widgGradientAngle'].'deg, '.$widgGradient['widgGradientColorFirst'].' '.$widgGradient['widgGradientLocationFirst'].'%,'.$widgGradient['widgGradientColorSecond'].' '.$widgGradient['widgGradientLocationSecond'].'%);';
              }

              if ($widgGradient['widgGradientType'] == 'radial') {
                $widgBackgroundOptions = 'background: radial-gradient(at '.$widgGradient['widgGradientPosition'].', '.$widgGradient['widgGradientColorFirst'].' '.$widgGradient['widgGradientLocationFirst'].'%,'.$widgGradient['widgGradientColorSecond'].' '.$widgGradient['widgGradientLocationSecond'].'%);';
              }
              
            }
          }

          $thisWidgHoverStyleTag = '';
          $thisWidgHoverOption = '';
          if (isset($thisWidget['widgHoverOptions']) ) {
            $widgID = "widget-$j-$Columni-".$row["rowID"];
            $widgHoverOptions = $thisWidget['widgHoverOptions'];

            if (isset($widgHoverOptions['widgBackgroundTypeHover'])) {
              if ($widgHoverOptions['widgBackgroundTypeHover'] == 'solid') {
                $thisWidgHoverOption = ' #'.$widgID.':hover { background:'.$widgHoverOptions['widgBgColorHover'].' !important; transition: all '.$widgHoverOptions['widgHoverTransitionDuration'].'s; }';
              }
              if ($widgHoverOptions['widgBackgroundTypeHover'] == 'gradient') {
                $widgGradientHover = $widgHoverOptions['widgGradientHover'];

                if ($widgGradientHover['widgGradientTypeHover'] == 'linear') {
                  $thisWidgHoverOption = ' #'.$widgID.':hover { background: linear-gradient('.$widgGradientHover['widgGradientAngleHover'].'deg, '.$widgGradientHover['widgGradientColorFirstHover'].' '.$widgGradientHover['widgGradientLocationFirstHover'].'%,'.$widgGradientHover['widgGradientColorSecondHover'].' '.$widgGradientHover['widgGradientLocationSecondHover'].'%) !important; transition: all '.$widgHoverOptions['widgHoverTransitionDuration'].'s; }';
                }

                if ($widgGradientHover['widgGradientTypeHover'] == 'radial') {

                  $thisWidgHoverOption = ' #'.$widgID.':hover { background: radial-gradient(at '.$widgGradientHover['widgGradientPositionHover'].', '.$widgGradientHover['widgGradientColorFirstHover'].' '.$widgGradientHover['widgGradientLocationFirstHover'].'%,'.$widgGradientHover['widgGradientColorSecondHover'].' '.$widgGradientHover['widgGradientLocationSecondHover'].'%) !important; transition: all '.$widgHoverOptions['widgHoverTransitionDuration'].'s; }';
                }
              }
            }
              

            $thisWidgHoverStyleTag = ' '.$thisWidgHoverOption.'  ';
            array_push($POPBallWidgetsStylesArray, $thisWidgHoverStyleTag);
          }








          
          $widgetMarigns = "margin:".$widgetMtop."% ".$widgetMright."% ".$widgetMbottom."% ".$widgetMleft."%; $widgetPaddings  $this_widget_border_shadow  background: $widgetBgColor; $widgBackgroundOptions  display:$widgetIsInline; text-align:$imgAlignment;";
          $columnContent = $columnContent."\n"."<div class='widget-$j $widgetCustomClass'  id='widget-$j-$Columni-".$row["rowID"]."'  style='$widgetMarigns  $widgetStyling  $widgHideOnDesktop ' >".$widgetContent."</div>";
          
          ?>

          <?php if (!empty($thisWidget['widgetAnimation']) && $thisWidget['widgetAnimation'] !== 'none' && $thisWidget['widgetAnimation'] !== '') {
            ob_start();

          echo "
              jQuery('#".$row["rowID"]."-$Columni > .widget-$j' ).each( function(i, el){
                var el = ".'$(el);'."
                if (el.visible(true)) {
                  el.addClass('$widgetAnimation');
                }
              });
          ";

          $thisWidgetAnimationTrigger =  ob_get_contents();
          ob_end_clean();

          $prevWidgetAnimationTriggers = $widgetAnimationTriggerScript;

          $widgetAnimationTriggerScript = $prevWidgetAnimationTriggers. "\n" . $thisWidgetAnimationTrigger;

          }
      } // widget loop ends here
?>