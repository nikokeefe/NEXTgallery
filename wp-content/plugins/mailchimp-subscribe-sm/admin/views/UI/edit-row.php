<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="lpp_modal_row edit_row">
  <div class="lpp_modal_wrapper_row">
  <div class="edit_options_left_row">
      <input type="hidden" class="currentEditingRow" value='' >
      <div class="tabs">
        <ul class="tab-links">
          <li style="margin: 0;"  class="active"><a style="font-size:12px; padding: 10px; text-align: center;" href="#tabRowOptions" class="tab_link"> <i class="fa fa-gears" style="font-size: 20px;"></i> <br> Row Options</a></li>
          <li style="margin: 0;"><a style="font-size:12px; padding: 10px; text-align: center;" href="#tabRowVideo" class="tab_link"> <i class="fa fa-youtube-play" style="font-size: 20px;"></i> <br> Background Video</a></li>
          <li style="margin: 0;"><a style="font-size:12px; padding: 10px; text-align: center;" href="#tabCustomCss" class="tab_link"> <i class="fa fa-code" style="font-size: 20px;"></i> <br> Custom CSS & JS</a></li>
        </ul>
        <div class="tab-content">
          <div id="tabRowOptions" class="tab active" style="min-height:400px;">
            <div class="pbp_form" style="width: 400px; margin: 10px;">
              <div>
                <h4>Min Height  
                  <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                  <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                  <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                </h4>
                <div class="responsiveOps responsiveOptionsContainterLarge">
                  <label></label>
                  <input type="number" name="row_height" id="row_height" placeholder="Set row height" class="edit_fields row_edit_fields" value='200' style="width:60px;">
                  <select class="row_height_unit row_edit_fields" style="width:50px;">
                    <option value="px">px</option>
                    <option value="%">%</option>
                    <option value="vh">vh</option>
                  </select>
                </div>
                <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                  <label></label>
                  <input type="number" name="rowHeightTablet" class="rowHeightTablet row_edit_fields" placeholder="Set row height" value='200' style="width:60px;">
                  <select class="rowHeightUnitTablet row_edit_fields" style="width:50px;">
                    <option value="px">px</option>
                    <option value="%">%</option>
                    <option value="vh">vh</option>
                  </select>
                </div>
                <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                  <label></label>
                  <input type="number" name="rowHeightMobile" class="rowHeightMobile row_edit_fields" placeholder="Set row height" value='200' style="width:60px;">
                  <select class="rowHeightUnitMobile row_edit_fields" style="width:50px;">
                    <option value="px">px</option>
                    <option value="%">%</option>
                    <option value="vh">vh</option>
                  </select>
                </div>
              </div>
              <br>
              <br>
              <label>Number of Columns :</label>
              <input type="number" name="number_of_columns" id="number_of_columns" placeholder="Number of columns in row" min="1" max="8"  class="edit_fields row_edit_fields" value='1'>
              <br>
              <br>
              <br>
              <hr><br>
              <div class="PB_accordion">
                <h4>Background</h4>
                <div style="width: 100%; background: #fff;">
                  <div class="tabs">
                    <ul class="tab-links tabEditFields">
                      <li class="active"><a  href="#defaultRowBgOptions" class="tab_link">Default</a></li>
                      <li><a  href="#hoverRowBgOptions" class="tab_link">Hover</a></li>
                    </ul>
                    <div class="tab-content" style="box-shadow: none;">
                      <div id="defaultRowBgOptions" class="tab active">
                        <br><br>
                        <div id="pluginops_input_tabs" class="popbinputTabsWrapper POPBInputNormalRow">
                          <p style="display: inline;"> Background Type </p>
                          <div class="iputTabNav">
                            <div class="popbNavItem" data-inptabID='content_popb_tab_1' title="Simple">
                              <label for="inputID1"> <i class="fa fa-paint-brush"></i></label>
                              <input type="radio" name="rowBackgroundType" id="inputID1" value='solid' class="rowBackgroundType rowBackgroundTypeSolid tabbedInputRadio row_edit_fields">
                            </div>
                            <div class="popbNavItem" data-inptabID='content_popb_tab_2' title="Gradient">
                              <label for="inputID2 " class="GradientIcon"> <i class="fa fa-square"></i></label>
                              <input type="radio" name="rowBackgroundType" id="inputID2" class="rowBackgroundType rowBackgroundTypeGradient tabbedInputRadio row_edit_fields" value="gradient">
                            </div>
                          </div>
                          <div class="popb_input_tabContent">
                            <div class="content_popb_tab_1 popb_tab_content">
                              <br><br><br>
                              <label>Color :</label>
                              <input type="text" name="rowBgColor" class="color-picker_btn_two rowBgColor row_edit_fields" data-alpha='true' id="rowBgColor" value='#fff'>
                              <br> <br>
                              <label>Image :</label>
                              <input id="image_location1" type="text" class=" rowBgImg upload_image_button2992 row_edit_fields"  name='lpp_add_img_1' value='' placeholder='Insert Image URL here' /> <br> <br>
                              <label></label>
                              <input id="image_location1" type="button" class="upload_bg pb_upload_btn" data-id="2992" value="Upload"  style="" />
                              <br>
                              <br>
                              <br>
                              <label for="rowBackgroundParallax">Parallax Background</label>
                              <select class="rowBackgroundParallax row_edit_fields" id="rowBackgroundParallax">
                                <option value="">Select</option>
                                <option value="true">Yes</option>
                                <option value="false">No</option>
                              </select>
                              <br>
                              <br>
                              <br>
                            </div>
                            <div class="content_popb_tab_2 popb_tab_content">
                              <br><br><br>
                              <label>First Color </label>
                              <input type="text" name="rowGradientColorFirst" class="color-picker_btn_two rowGradientColorFirst row_edit_fields" data-alpha='true' id="rowGradientColorFirst" value='#fff'>
                              <p>Location</p>
                              <div class="PoPbrangeSlider PoPbnumberSlider" data-targetRangeInput='rowGradientLocationFirst'></div>
                              <input type="number" class="rowGradientLocationFirst row_edit_fields">
                              <br><br><hr>
                              <br><br>
                              <label>Second Color </label>
                              <input type="text" name="rowGradientColorSecond" class="color-picker_btn_two rowGradientColorSecond row_edit_fields" data-alpha='true' id="rowGradientColorSecond" value='#fff'>
                              <p>Location</p>
                              <div class="PoPbrangeSlider PoPbnumberSlider" data-targetRangeInput='rowGradientLocationSecond'></div>
                              <input type="number" class="rowGradientLocationSecond row_edit_fields">
                              <br><br>
                              <hr>
                              <br>
                              <br>
                              <label>Type </label>
                              <select class="rowGradientType row_edit_fields">
                                <option value="linear">Linear</option>
                                <option value="radial">Radial</option>
                              </select>
                              <br>
                              <br>
                              <div class="radialInput" style="display: none;">
                                <br>
                                <label>Position </label>
                                <select class="rowGradientPosition row_edit_fields">
                                  <option value="center center">Center Center</option>
                                  <option value="center left">Center Left</option>
                                  <option value="center right">Center Right</option>
                                  <option value="top center">Top Center</option>
                                  <option value="top left">Top Left</option>
                                  <option value="top right">Top Right</option>
                                  <option value="bottom center">Bottom Center</option>
                                  <option value="bottom left">Bottom Left</option>
                                  <option value="bottom right">Bottom Right</option>
                                </select>
                                <br><br>
                              </div>
                              <div class="linearInput" style="display: none;">
                              <p>Angle</p>
                                <div class="PoPbrangeSliderAngle PoPbnumberSlider" data-targetRangeInput='rowGradientAngle'></div>
                                <input type="number" class="rowGradientAngle row_edit_fields">
                              </div>
                              <br>
                              <br>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div id="hoverRowBgOptions" class="tab" >
                        <br><br>
                        <div id="pluginops_input_tabs" class="popbinputTabsWrapper POPBInputNormalRow POPBInputHoverRow">
                          <p style="display: inline;"> Background Type </p>
                          <div class="iputTabNav">
                            <div class="popbNavItem" data-inptabID='content_popb_tab_1' title="Simple">
                              <label for="inputIDHover1"> <i class="fa fa-paint-brush"></i></label>
                              <input type="radio" name="rowBackgroundTypeHover" id="inputIDHover1"  class="rowBackgroundTypeHover rowBackgroundTypeSolidHover tabbedInputRadio row_edit_fields" value='solid'>
                            </div>
                            <div class="popbNavItem" data-inptabID='content_popb_tab_2' title="Gradient">
                              <label for="inputIDHover2 " class="GradientIcon"> <i class="fa fa-square"></i></label>
                              <input type="radio" name="rowBackgroundTypeHover" id="inputIDHover2" class="rowBackgroundTypeHover rowBackgroundTypeGradientHover tabbedInputRadio row_edit_fields" value="gradient">
                            </div>
                          </div>
                          <div class="popb_input_tabContent">
                            <div class="content_popb_tab_1 popb_tab_content">
                              <br><br>
                              <label>Color :</label>
                              <input type="text" name="rowBgColorHover" class="color-picker_btn_two rowBgColorHover row_edit_fields" data-alpha='true' id="rowBgColorHover" value='#fff'>
                              <br>
                            </div>
                            <div class="content_popb_tab_2 popb_tab_content">
                              <br><br><br>
                              <label>First Color </label>
                              <input type="text" name="rowGradientColorFirstHover" class="color-picker_btn_two rowGradientColorFirstHover row_edit_fields" data-alpha='true' id="rowGradientColorFirstHover" value='#fff'>
                              <p>Location</p>
                              <div class="PoPbrangeSlider PoPbnumberSlider" data-targetRangeInput='rowGradientLocationFirstHover'></div>
                              <input type="number" class="rowGradientLocationFirstHover row_edit_fields">
                              <br><br><hr>
                              <br><br>
                              <label>Second Color </label>
                              <input type="text" name="rowGradientColorSecondHover" class="color-picker_btn_two rowGradientColorSecondHover row_edit_fields" data-alpha='true' id="rowGradientColorSecondHover" value='#fff'>
                              <p>Location</p>
                              <div class="PoPbrangeSlider PoPbnumberSlider" data-targetRangeInput='rowGradientLocationSecondHover'></div>
                              <input type="number" class="rowGradientLocationSecondHover row_edit_fields">
                              <br><br>
                              <hr>
                              <br>
                              <br>
                              <label>Type </label>
                              <select class="rowGradientTypeHover row_edit_fields">
                                <option value="linear">Linear</option>
                                <option value="radial">Radial</option>
                              </select>
                              <br>
                              <br>
                              <div class="radialInputHover" style="display: none;">
                                <br>
                                <label>Position </label>
                                <select class="rowGradientPositionHover row_edit_fields">
                                  <option value="center center">Center Center</option>
                                  <option value="center left">Center Left</option>
                                  <option value="center right">Center Right</option>
                                  <option value="top center">Top Center</option>
                                  <option value="top left">Top Left</option>
                                  <option value="top right">Top Right</option>
                                  <option value="bottom center">Bottom Center</option>
                                  <option value="bottom left">Bottom Left</option>
                                  <option value="bottom right">Bottom Right</option>
                                </select>
                                <br><br>
                              </div>
                              <div class="linearInputHover" style="display: none;">
                              <p>Angle</p>
                                <div class="PoPbrangeSliderAngle PoPbnumberSlider" data-targetRangeInput='rowGradientAngleHover'></div>
                                <input type="number" class="rowGradientAngleHover row_edit_fields">
                              </div>
                              <br>
                              <br>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <br>
                        <p>Transition Duration</p>
                        <div class="PoPbrangeSliderTransition PoPbnumberSlider" data-targetRangeInput='rowHoverTransitionDuration'></div>
                        <input type="number" class="rowHoverTransitionDuration row_edit_fields">
                        <br><br>
                      </div>
                    </div>
                  </div> 
                </div>
                <h4>Background Overlay</h4>
                <div style="width: 100%; background: #fff;">
                      <div id="defaultRowBgOptions">
                        <br><br>
                        <div id="pluginops_input_tabs" class="popbinputTabsWrapper POPBInputNormalRow POPBInputNormalRowOverlay">
                          <p style="display: inline;"> Overlay Type </p>
                          <div class="iputTabNav">
                            <div class="popbNavItem" data-inptabID='content_popb_tab_1' title="Simple">
                              <label for="inputID1"> <i class="fa fa-paint-brush"></i></label>
                              <input type="radio" name="rowOverlayBackgroundType" id="inputID1" value='solid' class="rowOverlayBackgroundType rowOverlayBackgroundTypeSolid tabbedInputRadio row_edit_fields">
                            </div>
                            <div class="popbNavItem" data-inptabID='content_popb_tab_2' title="Gradient">
                              <label for="inputID2 " class="GradientIcon"> <i class="fa fa-square"></i></label>
                              <input type="radio" name="rowOverlayBackgroundType" id="inputID2" class="rowOverlayBackgroundType rowOverlayBackgroundTypeGradient tabbedInputRadio row_edit_fields" value="gradient">
                            </div>
                          </div>
                          <div class="">
                            <div class="content_popb_tab_1 popb_tab_content">
                              <br><br><br>
                              <label>Color :</label>
                              <input type="text" name="rowBgOverlayColor" class="color-picker_btn_two rowBgOverlayColor row_edit_fields" data-alpha='true' id="rowBgOverlayColor" value='#fff'>
                              <br> <br>
                            </div>
                            <div class="content_popb_tab_2 popb_tab_content">
                              <br><br><br>
                              <label>First Color </label>
                              <input type="text" name="rowOverlayGradientColorFirst" class="color-picker_btn_two rowOverlayGradientColorFirst row_edit_fields" data-alpha='true' id="rowOverlayGradientColorFirst" value='#fff'>
                              <p>Location</p>
                              <div class="PoPbrangeSlider PoPbnumberSlider" data-targetRangeInput='rowOverlayGradientLocationFirst'></div>
                              <input type="number" class="rowOverlayGradientLocationFirst row_edit_fields">
                              <br><br><hr>
                              <br><br>
                              <label>Second Color </label>
                              <input type="text" name="rowOverlayGradientColorSecond" class="color-picker_btn_two rowOverlayGradientColorSecond row_edit_fields" data-alpha='true' id="rowOverlayGradientColorSecond" value='#fff'>
                              <p>Location</p>
                              <div class="PoPbrangeSlider PoPbnumberSlider" data-targetRangeInput='rowOverlayGradientLocationSecond'></div>
                              <input type="number" class="rowOverlayGradientLocationSecond row_edit_fields">
                              <br><br>
                              <hr>
                              <br>
                              <br>
                              <label>Type </label>
                              <select class="rowOverlayGradientType row_edit_fields">
                                <option value="linear">Linear</option>
                                <option value="radial">Radial</option>
                              </select>
                              <br>
                              <br>
                              <div class="radialInput" style="display: none;">
                                <br>
                                <label>Position </label>
                                <select class="rowOverlayGradientPosition row_edit_fields">
                                  <option value="center center">Center Center</option>
                                  <option value="center left">Center Left</option>
                                  <option value="center right">Center Right</option>
                                  <option value="top center">Top Center</option>
                                  <option value="top left">Top Left</option>
                                  <option value="top right">Top Right</option>
                                  <option value="bottom center">Bottom Center</option>
                                  <option value="bottom left">Bottom Left</option>
                                  <option value="bottom right">Bottom Right</option>
                                </select>
                                <br><br>
                              </div>
                              <div class="linearInput" style="display: none;">
                              <p>Angle</p>
                                <div class="PoPbrangeSliderAngle PoPbnumberSlider" data-targetRangeInput='rowOverlayGradientAngle'></div>
                                <input type="number" class="rowOverlayGradientAngle row_edit_fields">
                              </div>
                              <br>
                              <br>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                <h4>Background Shapes</h4>
                <div style="width: 100%; background: #fff;">
                  <div class="tabs">
                      <ul class="tab-links tabEditFields">
                        <li class="active"><a  href="#bgShapeTop" class="tab_link">Top</a></li>
                        <li><a  href="#bgShapeBottom" class="tab_link">Bottom</a></li>
                      </ul>
                      <div class="tab-content" style="box-shadow: none;">
                        <div id="bgShapeTop" class="tab active">
                          <br>
                          <label>Shape Type </label>
                          <select class="rbgstType row_edit_fields">
                            <option value="none">none</option>
                            <option value="Mountains">Mountains</option>
                            <option value="Spikes">Spikes</option>
                            <option value="Pyramids">Pyramids</option>
                            <option value="Triangle">Triangle</option>
                            <option value="TriangleInvert">Triangle Inverted</option>
                            <option value="TriangleAssym">Triangle Asymmetrical</option>
                            <option value="TriangleAssymInvert">Triangle Asymmetrical Inverted</option>
                            <option value="Slope">Slope</option>
                            <option value="FanOpaque">Fan Opaque</option>
                            <option value="Curve">Curve</option>
                            <option value="CurveInvert">Curve Inverted</option>
                            <option value="Waves">Waves</option>
                            <option value="Arrow">Arrow</option>
                            <option value="ArrowInvert">Arrow Inverted</option>
                            <option value="Book">Book</option>
                            <option value="BookInvert">Book Inverted</option>
                            <option value="Clouds">Clouds</option>
                            <option value="Skyline">Skyline</option>
                          </select>
                          <br><br><br>
                          <label>Shape Color</label>
                          <input type="text" name="rbgstColor" class="color-picker_btn_two rbgstColor row_edit_fields" data-alpha='true' id="rbgstColor" value='#fff'>
                          <br><br><br>
                          <div>
                            <h4>Width   
                              <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                              <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                              <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                            </h4>
                            <div class="responsiveOps responsiveOptionsContainterLarge">
                              <label></label>
                              <input type="number" class="rbgstWidth row_edit_fields" min="100" max="300">
                            </div>
                            <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                              <label></label>
                              <input type="number" class="rbgstWidtht row_edit_fields" min="100" max="300">
                            </div>
                            <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                              <label></label>
                              <input type="number" class="rbgstWidthm row_edit_fields" min="100" max="300">
                            </div>
                          </div>
                          <br><br><br>
                          <div>
                            <h4>Height   
                              <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                              <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                              <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                            </h4>
                            <div class="responsiveOps responsiveOptionsContainterLarge">
                              <label></label>
                              <input type="number" class="rbgstHeight row_edit_fields">
                            </div>
                            <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                              <label></label>
                              <input type="number" class="rbgstHeightt row_edit_fields">
                            </div>
                            <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                              <label></label>
                              <input type="number" class="rbgstHeightm row_edit_fields">
                            </div>
                          </div>
                          <br><br><br>
                          <label>Flipped </label>
                          <select class="rbgstFlipped row_edit_fields">
                            <option value="false">No</option>
                            <option value="true">Yes</option>
                          </select>
                          <br><br><br>
                          <label>Bring To Front </label>
                          <select class="rbgstFront row_edit_fields">
                            <option value="false">No</option>
                            <option value="true">Yes</option>
                          </select>
                          <br><br><br>
                        </div>
                        <div id="bgShapeBottom" class="tab">
                          <br>
                          <label>Shape Type </label>
                          <select class="rbgsbType row_edit_fields">
                            <option value="none">none</option>
                            <option value="Mountains">Mountains</option>
                            <option value="Spikes">Spikes</option>
                            <option value="Pyramids">Pyramids</option>
                            <option value="Triangle">Triangle</option>
                            <option value="TriangleInvert">Triangle Inverted</option>
                            <option value="TriangleAssym">Triangle Asymmetrical</option>
                            <option value="TriangleAssymInvert">Triangle Asymmetrical Inverted</option>
                            <option value="Slope">Slope</option>
                            <option value="FanOpaque">Fan Opaque</option>
                            <option value="Curve">Curve</option>
                            <option value="CurveInvert">Curve Inverted</option>
                            <option value="Waves">Waves</option>
                            <option value="Arrow">Arrow</option>
                            <option value="ArrowInvert">Arrow Inverted</option>
                            <option value="Book">Book</option>
                            <option value="BookInvert">Book Inverted</option>
                            <option value="Clouds">Clouds</option>
                            <option value="Skyline">Skyline</option>
                          </select>
                          <br><br><br>
                          <label>Shape Color</label>
                          <input type="text" name="rbgsbColor" class="color-picker_btn_two rbgsbColor row_edit_fields" data-alpha='true' id="rbgsbColor" value='#fff'>
                          <br><br><br>
                          <div>
                            <h4>Width   
                              <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                              <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                              <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                            </h4>
                            <div class="responsiveOps responsiveOptionsContainterLarge">
                              <label></label>
                              <input type="number" class="rbgsbWidth row_edit_fields" min="100" max="300">
                            </div>
                            <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                              <label></label>
                              <input type="number" class="rbgsbWidtht row_edit_fields" min="100" max="300">
                            </div>
                            <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                              <label></label>
                              <input type="number" class="rbgsbWidthm row_edit_fields" min="100" max="300">
                            </div>
                          </div>
                          <br><br><br>
                          <div>
                            <h4>Height   
                              <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                              <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                              <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                            </h4>
                            <div class="responsiveOps responsiveOptionsContainterLarge">
                              <label></label>
                              <input type="number" class="rbgsbHeight row_edit_fields">
                            </div>
                            <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                              <label></label>
                              <input type="number" class="rbgsbHeightt row_edit_fields">
                            </div>
                            <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                              <label></label>
                              <input type="number" class="rbgsbHeightm row_edit_fields">
                            </div>
                          </div>
                          <br><br><br>
                          <label>Flipped </label>
                          <select class="rbgsbFlipped row_edit_fields">
                            <option value="false">No</option>
                            <option value="true">Yes</option>
                          </select>
                          <br><br><br>
                          <label>Bring To Front </label>
                          <select class="rbgsbFront row_edit_fields">
                            <option value="false">No</option>
                            <option value="true">Yes</option>
                          </select>
                          <br><br><br>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <br><hr><br>
              <div class="PB_accordion">
                <h4>Margin</h4>
                <div style="width: 100%; background: #fff;" >
                  <h4>Row Margin   
                    <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>   
                    <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                    <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                  </h4>
                  <div class="responsiveOps responsiveOptionsContainterLarge">
                    <input type="number" name="rowMarginTop" class="padding_inline_inp linkedField  rowMarginTop row_edit_fields" id="rowMarginTop"  placeholder="Top" >
                    
                    <input type="number" name="rowMarginBottom" class="padding_inline_inp linkedField  rowMarginBottom row_edit_fields" id="rowMarginBottom"  placeholder="Bottom">
                    
                    <input type="number" name="rowMarginLeft" class="padding_inline_inp linkedField  rowMarginLeft row_edit_fields" id="rowMarginLeft"  placeholder="Left">
                    
                    <input type="number" name="rowMarginRight" class="padding_inline_inp linkedField  rowMarginRight row_edit_fields" id="rowMarginRight"  placeholder="Right">

                    <span class="linkfieldBtn rowLinkBtn linkBtn" > <i class="fa fa-link"></i> </span>
                  </div>
                  <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                    <input type="number" name="rowMarginTopTablet" class="padding_inline_inp linkedField  rowMarginTopTablet row_edit_fields" id="rowMarginTopTablet"  placeholder="Top" >
                    
                    <input type="number" name="rowMarginBottomTablet" class="padding_inline_inp linkedField  rowMarginBottomTablet row_edit_fields" id="rowMarginBottomTablet"  placeholder="Bottom">
                    
                    <input type="number" name="rowMarginLeftTablet" class="padding_inline_inp linkedField  rowMarginLeftTablet row_edit_fields" id="rowMarginLeftTablet"  placeholder="Left">
                    
                    <input type="number" name="rowMarginRightTablet" class="padding_inline_inp linkedField  rowMarginRightTablet row_edit_fields" id="rowMarginRightTablet"  placeholder="Right">

                    <span class="linkfieldBtn rowLinkBtn linkBtn" > <i class="fa fa-link"></i> </span>
                  </div>
                  <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                    <input type="number" name="rowMarginTopMobile" class="padding_inline_inp linkedField  rowMarginTopMobile row_edit_fields" id="rowMarginTopMobile"  placeholder="Top" >
                    
                    <input type="number" name="rowMarginBottomMobile" class="padding_inline_inp linkedField  rowMarginBottomMobile row_edit_fields" id="rowMarginBottomMobile"  placeholder="Bottom">
                    
                    <input type="number" name="rowMarginLeftMobile" class="padding_inline_inp linkedField  rowMarginLeftMobile row_edit_fields" id="rowMarginLeftMobile"  placeholder="Left">
                    
                    <input type="number" name="rowMarginRightMobile" class="padding_inline_inp linkedField  rowMarginRightMobile row_edit_fields" id="rowMarginRightMobile"  placeholder="Right">

                    <span class="linkfieldBtn rowLinkBtn linkBtn" > <i class="fa fa-link"></i> </span>
                  </div>
                  <br>
                  <br>
                  <span class="ulp-note">The unit is percentage so set values accordingly.</span>
                </div>
                <h4>Padding</h4>
                <div style="width: 100%; background: #fff;">
                  <h4>Row Padding
                    <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>
                    <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                    <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                  </h4>
                  <div class="responsiveOps responsiveOptionsContainterLarge">
                    <input type="number" name="rowPaddingTop" class="padding_inline_inp linkedField  rowPaddingTop row_edit_fields" id="rowPaddingTop"  placeholder="Top">
                    
                    <input type="number" name="rowPaddingBottom" class="padding_inline_inp linkedField  rowPaddingBottom row_edit_fields" id="rowPaddingBottom"  placeholder="Bottom">
                    
                    <input type="number" name="rowPaddingLeft" class="padding_inline_inp linkedField  rowPaddingLeft row_edit_fields" id="rowPaddingLeft"  placeholder="Left">
                    
                    <input type="number" name="rowPaddingRight" class="padding_inline_inp linkedField  rowPaddingRight row_edit_fields" id="rowPaddingRight"  placeholder="Right">

                    <span class="linkfieldBtn rowLinkBtn linkBtn" > <i class="fa fa-link"></i> </span>
                  </div>
                  <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                    <input type="number" name="rowPaddingTopTablet" class="padding_inline_inp linkedField  rowPaddingTopTablet row_edit_fields" id="rowPaddingTopTablet"  placeholder="Top">
                    
                    <input type="number" name="rowPaddingBottomTablet" class="padding_inline_inp linkedField  rowPaddingBottomTablet row_edit_fields" id="rowPaddingBottomTablet"  placeholder="Bottom">
                    
                    <input type="number" name="rowPaddingLeftTablet" class="padding_inline_inp linkedField  rowPaddingLeftTablet row_edit_fields" id="rowPaddingLeftTablet"  placeholder="Left">
                    
                    <input type="number" name="rowPaddingRightTablet" class="padding_inline_inp linkedField  rowPaddingRightTablet row_edit_fields" id="rowPaddingRightTablet"  placeholder="Right">

                    <span class="linkfieldBtn rowLinkBtn linkBtn" > <i class="fa fa-link"></i> </span>
                  </div>
                  <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                    <input type="number" name="rowPaddingTopMobile" class="padding_inline_inp linkedField  rowPaddingTopMobile row_edit_fields" id="rowPaddingTopMobile"  placeholder="Top">
                    
                    <input type="number" name="rowPaddingBottomMobile" class="padding_inline_inp linkedField  rowPaddingBottomMobile row_edit_fields" id="rowPaddingBottomMobile"  placeholder="Bottom">
                    
                    <input type="number" name="rowPaddingLeftMobile" class="padding_inline_inp linkedField  rowPaddingLeftMobile row_edit_fields" id="rowPaddingLeftMobile"  placeholder="Left">
                    
                    <input type="number" name="rowPaddingRightMobile" class="padding_inline_inp linkedField  rowPaddingRightMobile row_edit_fields" id="rowPaddingRightMobile"  placeholder="Right">

                    <span class="linkfieldBtn rowLinkBtn linkBtn" > <i class="fa fa-link"></i> </span>
                  </div>
                  <br>
                  <br>
                  <span class="ulp-note">The unit is percentage so set values accordingly.</span>
                </div>
              </div>
              <br>
              <br>
              <hr>
              <br>
              <label>Custom Row Class : </label>
              <input type="text" class="rowCustomClass row_edit_fields">
              <br>
              <br>  
              <br>
              <hr>
              <br>
              <div>
                <h4>Hide Row  
                  <span class="responsiveBtn rbt-l " > <i class="fa fa-desktop"></i> </span>
                  <span class="responsiveBtn rbt-m " > <i class="fa fa-tablet"></i> </span>
                  <span class="responsiveBtn rbt-s " > <i class="fa fa-mobile-phone"></i> </span>
                </h4>
                <div class="responsiveOps responsiveOptionsContainterLarge">
                  <label>DeskTop </label>
                  <select class="row_edit_fields rowHideOnDesktop">
                    <option value="show">Show</option>
                    <option value="hide">Hide</option>
                  </select>
                </div>
                <div class="responsiveOps responsiveOptionsContainterMedium" style="display: none;">
                  <label>Tablet </label>
                  <select class="row_edit_fields rowHideOnTablet">
                    <option value="show">Show</option>
                    <option value="hide">Hide</option>
                  </select>
                </div>
                <div class="responsiveOps responsiveOptionsContainterSmall" style="display: none;">
                  <label>Mobile </label>
                  <select class="row_edit_fields rowHideOnMobile">
                    <option value="show">Show</option>
                    <option value="hide">Hide</option>
                  </select>
                </div>
              </div>
              </div>
            </div>
          <div id="tabRowVideo" class="tab" style="min-height:400px;">
            <div class="pbp_form" style="margin: 10px; width: 400px;">
            <label>Background Video :</label> 
            <select class="rowBgVideoEnable">
              <option value="false">Disable</option>
              <option value="true">Enable</option>
            </select>
            <br>
            <br>
            <label>Loop</label> 
            <select class="rowBgVideoLoop">
              <option value="no">No</option>
              <option value="loop">Yes</option>
            </select>
            <br>
            <br>
            <hr>
            <br>
            <label>Video (MP4) :</label>
            <input id="image_location9" type="text" class="rowVideoMpfour upload_image_button9"  name='lpp_add_img_1' value='' placeholder='Insert Video URL here' /> <br> <br>
            <label></label>
            <input id="image_location9" type="button" class="upload_bg" data-id="9" value="Upload" />
            <br><br> <hr><br>
            <label>Video (WebM) :</label>
            <input id="image_location10" type="text" class="rowVideoWebM upload_image_button10"  name='lpp_add_img_1' value='' placeholder='Insert Video URL here' /> <br> <br>
            <label></label>
            <input id="image_location10" type="button" class="upload_bg" data-id="10" value="Upload" />
            <br><br> <hr><br>
            <label>Video Thumbnail :</label>
            <input id="image_location11" type="text" class="rowVideoThumb upload_image_button11"  name='lpp_add_img_1' value='' placeholder='Insert Image URL here' /> <br> <br>
            <label></label>
            <input id="image_location11" type="button" class="upload_bg" data-id="11" value="Upload" />
            <br>
            <br>
            <br>
            <p><i>Note : </i> The background video will only be displayed in front end.</p>
            </div>
          </div>
          <div id="tabCustomCss" class="tab">
            <div class="pbp_form" style="width: 400px; margin: 10px;">
              <h4>Custom CSS</h4>
              <div style="height: 388px; margin-bottom: 150px;">
                <div id="PbaceEditorCSS"  class="rowCustomStyling"></div>
              </div>
              <h4>Custom JS</h4>
              <div style="height: 388px;">
                <div id="PbaceEditorJS"  class="rowCustomJS"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <h3 class="nonPremUserNotice"> Tip You can edit your row at one place and changes will appear everywhere : <a href="https://pluginops.com/page-builder-global-row/" target="_blank"> Learn More </a></h3>
    </div>
  </div>
</div>








<div class="lpp_modal_row insert_Global_row">
  <div class="lpp_modal_wrapper_row">
    <div class="edit_options_left_row">
      <h1 class="banner-h1">Select Global Row</h1>
      <?php 
        $ULP_GlobalRow_args = array(
          'post_type' => 'ulpb_global_rows',
          'orderby' => 'date',
          'post_status'   => 'any',
          'posts_per_page'    => 100,
        );
        $ULPB_GlobalRow_posts = get_posts( $ULP_GlobalRow_args );

        echo "<br><br><br>
            <label style='margin-right:7%;'> Select a Global Row to Insert </label>
            <select class='selectGlobalRowToInsert' name='selectGlobalRowToInsert'>
            <option value=''  > Select Row </option>
        ";
        foreach ($ULPB_GlobalRow_posts as  $ulpost) {
          $currentPostId = $ulpost->ID;
          $currentPostName = get_the_title( $currentPostId);
          $currentPostLink = get_permalink($currentPostId);
          echo "<option value='$currentPostId' data-pagelink='$currentPostLink' > $currentPostName </option>";
        }

        echo "</select> 
        ";

      ?>
    </div>
    <div  class="addNewGlobalRowClosebutton" style="">
        <div ><span class="dashicons dashicons-arrow-left editSaveVisibleIcon" ></span></div><p></p><br>
    </div>
  </div>
</div>