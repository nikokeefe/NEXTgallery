( function( $ ) {


$('.linkfieldBtn').click(function(ev){
  var clickedEl = $(this);
  if (clickedEl.is('span')) {
    if (clickedEl.hasClass('linkedBtn') ) {
      clickedEl.removeClass('linkedBtn');
    }else{
      clickedEl.addClass('linkedBtn');
    }
  }else{
    clickedEl = $(this).parent('span');
    if (clickedEl.hasClass('linkedBtn') ) {
      clickedEl.removeClass('linkedBtn');
    }else{
      clickedEl.addClass('linkedBtn');
    }
  }
});

$('.linkedField').on('change', function(ev){
  changedField = $(ev.target);
  linkedBtn = changedField.siblings('.linkfieldBtn');
  if ( linkedBtn.hasClass('linkedBtn') ) {
    changedFieldVal = $(changedField).val();
    changedField.siblings('.linkedField').val(changedFieldVal);
    if (linkedBtn.hasClass('rowLinkBtn') ) {
      $('.rowCustomClass ').trigger('change');
    }else if(linkedBtn.hasClass('colLinkBtn')){
      $('.columnCustomClass ').trigger('change');
    } else{
      $('.closeWidgetPopup').trigger('click');
    }
  }
});

$('.widgetAnimateBtn').click(function(){
  currentSelectedAnimation = $('.widgetAnimation').val();
  $('#'+pageBuilderApp.currentlyEditedColId+' '+'.widget-'+pageBuilderApp.currentlyEditedWidgId).addClass('animated '+currentSelectedAnimation);
});

$('.openPageOpsBtn').click(function(){
  $('.pageops_modal').show("slide", { direction: "left" }, 500);
});

$('.closePageOpsBtn').click(function(){

  $('.pageBgImage').trigger('change');

  $('.pageops_modal').hide("slide", { direction: "left" }, 500);
});

$('.pageOpsField').on('change',function(){
  
  var pageBgImage = $('.pageBgImage').val();
  var pageBgColor = $('.pageBgColor').val();
  var pagePaddingTop = $('.pagePaddingTop').val();
  var pagePaddingBottom = $('.pagePaddingBottom').val();
  var pagePaddingLeft = $('.pagePaddingLeft').val();
  var pagePaddingRight = $('.pagePaddingRight').val(); 
  var POPBDefaultsEnable = $('.POPBDefaultsEnable').val(); 
  if ($('.pb_fullScreenEditorButton').hasClass('EditorActive') ) {
    displayEditor = 'display:block;';
  }else{
    displayEditor = 'display:none;';
  }

  var selectedOptinType = pageBuilderApp.PageBuilderModel.get('optinType');
  pbWrapperHeight = '';
  if (selectedOptinType == 'Full Page') {
    pbWrapperHeight = 'height:95vh;';
  }

  $('#pbWrapper').css({
      'padding-top': pagePaddingTop+'%',
      'padding-bottom': pagePaddingBottom+'%',
      'padding-left': pagePaddingLeft+'%',
      'padding-right': pagePaddingRight+'%',
      'background-image' : 'url("'+pageBgImage+'")',
      'background-size': 'cover',
      'background-color' : pageBgColor,
      'display':'block',
      'height':pbWrapperHeight,
  });

  var currentVPSPageOps = $('.currentViewPortSize').val();
    if (currentVPSPageOps == 'rbt-l') {
      $('#pbWrapper').css({
        'padding-top': $('.pagePaddingTop').val()+'%',
        'padding-bottom':$('.pagePaddingBottom').val()+'%',
        'padding-left':$('.pagePaddingLeft').val()+'%',
        'padding-right':$('.pagePaddingRight').val()+'%',
      });
    }

    if (currentVPSPageOps == 'rbt-m') {
      $('#pbWrapper').css({
        'padding-top': $('.pagePaddingTopTablet').val()+'%',
        'padding-bottom':$('.pagePaddingBottomTablet').val()+'%',
        'padding-left':$('.pagePaddingLeftTablet').val()+'%',
        'padding-right':$('.pagePaddingRightTablet').val()+'%',
      });
    }

    if (currentVPSPageOps == 'rbt-s') {
      $('#pbWrapper').css({
        'padding-top': $('.pagePaddingTopMobile').val()+'%',
        'padding-bottom':$('.pagePaddingBottomMobile').val()+'%',
        'padding-left':$('.pagePaddingLeftMobile').val()+'%',
        'padding-right':$('.pagePaddingRightMobile').val()+'%',
      });
    }



  if (POPBDefaultsEnable == 'true') {

    var POPB_typefaces =  {
      typefaceHOne:$('.typefaceHOne').val(),
      typefaceHTwo:$('.typefaceHTwo').val(),
      typefaceParagraph:$('.typefaceParagraph').val(),
      typefaceButton:$('.typefaceButton').val(),
      typefaceAnchorLink:$('.typefaceAnchorLink').val()
    };

    var POPB_typeSizes = {
      typeSizeHOne:$('.typeSizeHOne').val(),
      typeSizeHTwo:$('.typeSizeHTwo').val(),
      typeSizeParagraph:$('.typeSizeParagraph').val(),
      typeSizeButton:$('.typeSizeButton').val(),
      typeSizeAnchorLink:$('.typeSizeAnchorLink').val(),
    };

    $('#fontLoaderContainer').html('<link rel="stylesheet"href="https://fonts.googleapis.com/css?family='+POPB_typefaces['typefaceHOne']+'|'+POPB_typefaces['typefaceHTwo']+'|'+POPB_typefaces['typefaceParagraph']+'|'+POPB_typefaces['typefaceButton']+'|'+POPB_typefaces['typefaceAnchorLink']+' ">');

          var POPBGlobalStylesTag = '\n'+

            '#pbWrapper h1 { font-family:'+POPB_typefaces['typefaceHOne'].replace(/\+/g, ' ')+'; font-size:'+POPB_typeSizes['typeSizeHOne']+'px; }  \n'+

            '#pbWrapper h2 { font-family:'+POPB_typefaces['typefaceHTwo'].replace(/\+/g, ' ')+'; font-size:'+POPB_typeSizes['typeSizeHTwo']+'px; }  \n'+

            '#pbWrapper p { font-family:'+POPB_typefaces['typefaceParagraph'].replace(/\+/g, ' ')+'; font-size:'+POPB_typeSizes['typeSizeParagraph']+'px; }  \n'+

            '#pbWrapper button { font-family:'+POPB_typefaces['typefaceButton'].replace(/\+/g, ' ')+'; font-size:'+POPB_typeSizes['typeSizeButton']+'px; }  \n'+
            
            '#pbWrapper a { font-family:'+POPB_typefaces['typefaceAnchorLink'].replace(/\+/g, ' ')+'; font-size:'+POPB_typeSizes['typeSizeAnchorLink']+'px; } \n';


          if (currentVPSPageOps == 'rbt-m') {

            var POPBGlobalStylesTag = '\n'+

            '#pbWrapper h1 { font-family:'+POPB_typefaces['typefaceHOne'].replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeHOneTablet').val()+'px; }  \n'+

            '#pbWrapper h2 { font-family:'+POPB_typefaces['typefaceHTwo'].replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeHTwoTablet').val()+'px; }  \n'+

            '#pbWrapper p { font-family:'+POPB_typefaces['typefaceParagraph'].replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeParagraphTablet').val()+'px; }  \n'+

            '#pbWrapper button { font-family:'+POPB_typefaces['typefaceButton'].replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeButtonTablet').val()+'px; }  \n'+
            
            '#pbWrapper a { font-family:'+POPB_typefaces['typefaceAnchorLink'].replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeAnchorLinkTablet').val()+'px; } \n';

          }
          if (currentVPSPageOps == 'rbt-s') {

            var POPBGlobalStylesTag = '\n'+

            '#pbWrapper h1 { font-family:'+POPB_typefaces['typefaceHOne'].replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeHOneMobile').val()+'px; }  \n'+

            '#pbWrapper h2 { font-family:'+POPB_typefaces['typefaceHTwo'].replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeHTwoMobile').val()+'px; }  \n'+

            '#pbWrapper p { font-family:'+POPB_typefaces['typefaceParagraph'].replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeParagraphMobile').val()+'px; }  \n'+

            '#pbWrapper button { font-family:'+POPB_typefaces['typefaceButton'].replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeButtonMobile').val()+'px; }  \n'+
            
            '#pbWrapper a { font-family:'+POPB_typefaces['typefaceAnchorLink'].replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeAnchorLinkMobile').val()+'px; } \n';

          }
          

          $('#POPBGlobalStylesTag').html(POPBGlobalStylesTag);

  }else{
    $('#POPBGlobalStylesTag').html('');
  }


  var pageOptions = {
    bodyBackgroundType: $('.bodyBackgroundType:checked').val(),
    bodyGradient: {
      bodyGradientColorFirst: $('.bodyGradientColorFirst').val(),
      bodyGradientLocationFirst: $('.bodyGradientLocationFirst').val(),
      bodyGradientColorSecond: $('.bodyGradientColorSecond').val(),
      bodyGradientLocationSecond: $('.bodyGradientLocationSecond').val(),
      bodyGradientType: $('.bodyGradientType').val(),
      bodyGradientPosition: $('.bodyGradientPosition').val(),
      bodyGradientAngle: $('.bodyGradientAngle').val(),
    },
    bodyHoverOptions: {
      bodyBgColorHover: $('.bodyBgColorHover').val(),
      bodyBackgroundTypeHover: $('.bodyBackgroundTypeHover:checked').val(),
      bodyHoverTransitionDuration: $('.bodyHoverTransitionDuration').val(),
      bodyGradientHover: {
        bodyGradientColorFirstHover: $('.bodyGradientColorFirstHover').val(),
        bodyGradientLocationFirstHover: $('.bodyGradientLocationFirstHover').val(),
        bodyGradientColorSecondHover: $('.bodyGradientColorSecondHover').val(),
        bodyGradientLocationSecondHover: $('.bodyGradientLocationSecondHover').val(),
        bodyGradientTypeHover: $('.bodyGradientTypeHover').val(),
        bodyGradientPositionHover: $('.bodyGradientPositionHover').val(),
        bodyGradientAngleHover: $('.bodyGradientAngleHover').val(),
      }
    },
    bodyOverlayBackgroundType: $('.bodyOverlayBackgroundType:checked').val(),
    bodyOverlayGradient: {
      bodyOverlayGradientColorFirst: $('.bodyOverlayGradientColorFirst').val(),
      bodyOverlayGradientLocationFirst: $('.bodyOverlayGradientLocationFirst').val(),
      bodyOverlayGradientColorSecond: $('.bodyOverlayGradientColorSecond').val(),
      bodyOverlayGradientLocationSecond: $('.bodyOverlayGradientLocationSecond').val(),
      bodyOverlayGradientType: $('.bodyOverlayGradientType').val(),
      bodyOverlayGradientPosition: $('.bodyOverlayGradientPosition').val(),
      bodyOverlayGradientAngle: $('.bodyOverlayGradientAngle').val(),
    },
    bodyBgOverlayColor: $('.bodyBgOverlayColor').val(),
    bodyBorderType:$('.bodyBorderType').val(),
    bodyBorderWidth:$('.bodyBorderWidth').val(),
    bodyBorderColor:$('.bodyBorderColor').val(),
    bodyBorderRadius:{
      bbrt:$('.bbrt').val(),
      bbrb:$('.bbrb').val(),
      bbrl:$('.bbrl').val(),
      bbrr:$('.bbrr').val(),
    },
  };
  var bodyID = 'pbWrapper';
  var bodyBackgroundOptions = 'background-color:' + pageBgColor + ';';
  if (pageBgImage != '') {
    bodyBackgroundOptions = 'background: url(' + pageBgImage + '); background-size: cover; ';
  }
  if (typeof (pageOptions['bodyBackgroundType']) !== 'undefined') {
    if (pageOptions['bodyBackgroundType'] == 'gradient') {
      var bodyGradient = pageOptions['bodyGradient'];
      if (bodyGradient['bodyGradientType'] == 'linear') {
        bodyBackgroundOptions = 'background: linear-gradient(' + bodyGradient['bodyGradientAngle'] + 'deg, ' + bodyGradient['bodyGradientColorFirst'] + ' ' + bodyGradient['bodyGradientLocationFirst'] + '%,' + bodyGradient['bodyGradientColorSecond'] + ' ' + bodyGradient['bodyGradientLocationSecond'] + '%);';
      }
      if (bodyGradient['bodyGradientType'] == 'radial') {
        bodyBackgroundOptions = 'background: radial-gradient(at ' + bodyGradient['bodyGradientPosition'] + ', ' + bodyGradient['bodyGradientColorFirst'] + ' ' + bodyGradient['bodyGradientLocationFirst'] + '%,' + bodyGradient['bodyGradientColorSecond'] + ' ' + bodyGradient['bodyGradientLocationSecond'] + '%);';
      }
    }
  }
  var thisbodyHoverStyleTag = '';
  var thisbodyHoverOption = '';
  if (typeof (pageOptions['bodyHoverOptions']) !== 'undefined') {
    var bodyHoverOptions = pageOptions['bodyHoverOptions'];
    if (bodyHoverOptions['bodyBackgroundTypeHover'] == 'solid') {
      var thisbodyHoverOption = ' #' + bodyID + ':hover { background:' + bodyHoverOptions['bodyBgColorHover'] + ' !important; transition: all ' + bodyHoverOptions['bodyHoverTransitionDuration'] + 's; }';
    }
    if (bodyHoverOptions['bodyBackgroundTypeHover'] == 'gradient') {
      var bodyGradientHover = bodyHoverOptions['bodyGradientHover'];
      if (bodyGradientHover['bodyGradientTypeHover'] == 'linear') {
        thisbodyHoverOption = ' #' + bodyID + ':hover { background: linear-gradient(' + bodyGradientHover['bodyGradientAngleHover'] + 'deg, ' + bodyGradientHover['bodyGradientColorFirstHover'] + ' ' + bodyGradientHover['bodyGradientLocationFirstHover'] + '%,' + bodyGradientHover['bodyGradientColorSecondHover'] + ' ' + bodyGradientHover['bodyGradientLocationSecondHover'] + '%) !important; transition: all ' + bodyHoverOptions['bodyHoverTransitionDuration'] + 's; }';
      }
      if (bodyGradientHover['bodyGradientTypeHover'] == 'radial') {
        thisbodyHoverOption = ' #' + bodyID + ':hover { background: radial-gradient(at ' + bodyGradientHover['bodyGradientPositionHover'] + ', ' + bodyGradientHover['bodyGradientColorFirstHover'] + ' ' + bodyGradientHover['bodyGradientLocationFirstHover'] + '%,' + bodyGradientHover['bodyGradientColorSecondHover'] + ' ' + bodyGradientHover['bodyGradientLocationSecondHover'] + '%) !important; transition: all ' + bodyHoverOptions['bodyHoverTransitionDuration'] + 's; }';
      }
    }
    $('#POPBBodyHoverStylesTag').html(thisbodyHoverOption);
  }
  bodyOverlayBackgroundOptions = '';
  if (typeof (pageOptions['bodyBgOverlayColor']) !== 'undefined') {
    var bodyOverlayBackgroundOptions = 'background:' + pageOptions['bodyBgOverlayColor'] + '; background-color:' + pageOptions['bodyBgOverlayColor'] + ';';
  }
  if (typeof (pageOptions['bodyOverlayBackgroundType']) !== 'undefined') {
    if (pageOptions['bodyOverlayBackgroundType'] == 'gradient') {
      var bodyOverlayGradient = pageOptions['bodyOverlayGradient'];
      if (bodyOverlayGradient['bodyOverlayGradientType'] == 'linear') {
        bodyOverlayBackgroundOptions = 'background: linear-gradient(' + bodyOverlayGradient['bodyOverlayGradientAngle'] + 'deg, ' + bodyOverlayGradient['bodyOverlayGradientColorFirst'] + ' ' + bodyOverlayGradient['bodyOverlayGradientLocationFirst'] + '%,' + bodyOverlayGradient['bodyOverlayGradientColorSecond'] + ' ' + bodyOverlayGradient['bodyOverlayGradientLocationSecond'] + '%);';
      }
      if (bodyOverlayGradient['bodyOverlayGradientType'] == 'radial') {
        bodyOverlayBackgroundOptions = 'background: radial-gradient(at ' + bodyOverlayGradient['bodyOverlayGradientPosition'] + ', ' + bodyOverlayGradient['bodyOverlayGradientColorFirst'] + ' ' + bodyOverlayGradient['bodyOverlayGradientLocationFirst'] + '%,' + bodyOverlayGradient['bodyOverlayGradientColorSecond'] + ' ' + bodyOverlayGradient['bodyGradientLocationSecond'] + '%);';
      }
    }
  }
  $('#pbWrapperContainerOverlay').attr('style', bodyOverlayBackgroundOptions);

    if (typeof(bodyBorderRadius)  == 'undefined') { bodyBorderRadius = ''; }
    bodyBorderType = ''; bodyBorderWidth = ''; bodyBorderColor = '';
    if (typeof(pageOptions['bodyBorderType'])  != 'undefined') {
      bodyBorderType = pageOptions['bodyBorderType'];
      bodyBorderWidth = pageOptions['bodyBorderWidth'];
      bodyBorderColor = pageOptions['bodyBorderColor'];
      bodyBorderRadius = pageOptions['bodyBorderRadius'];
      if ( typeof(bodyBorderRadius['bbrt']) != 'undefined') {
      }else{
        bodyBorderRadius['bbrt'] = bodyBorderRadius;
        bodyBorderRadius['bbrb'] = bodyBorderRadius;
        bodyBorderRadius['bbrl'] = bodyBorderRadius;
        bodyBorderRadius['bbrr'] = bodyBorderRadius;
      }
    }

    $('#pbWrapper').css('border',bodyBorderWidth+'px '+bodyBorderType+' '+bodyBorderColor);
    $('#pbWrapper').css('border-top-left-radius',bodyBorderRadius['bbrt']+'px');
    $('#pbWrapper').css('border-top-right-radius',bodyBorderRadius['bbrr']+'px');
    $('#pbWrapper').css('border-bottom-right-radius',bodyBorderRadius['bbrb']+'px');
    $('#pbWrapper').css('border-bottom-left-radius',bodyBorderRadius['bbrl']+'px');

  var pbWrapperExistingStyles = $('#pbWrapper').attr('style');
  $('#pbWrapper').attr('style', pbWrapperExistingStyles+bodyBackgroundOptions);




  $('.isChagesMade').val('true');

});

$('.responsiveBtn').click(function(){

  var POPBDeafaultResponsiveStyles = 'h1{font-size:2em ; } h2{ font-size:1.5em ; } h3{ font-size:1.3em ; } h4{ font-size:1em ; } h5{ font-size:1em ; } h6{ font-size:1em ; } p, p span, input, button, label{ font-size: 15px ; } p{  } video{ min-height: auto ; max-width: 100%; } }  .row {width:100% ; padding:30px  0 ; margin: 0 auto ;}  .column {width:99.9% ; margin-bottom: 30px ; } .column > div { padding:20px ; margin: 0 auto ; }';


  if ( $(this).hasClass('rbt-l') ) {
    $('#pbWrapper').css({
      'padding-top': $('.pagePaddingTop').val()+'%',
      'padding-bottom':$('.pagePaddingBottom').val()+'%',
      'padding-left':$('.pagePaddingLeft').val()+'%',
      'padding-right':$('.pagePaddingRight').val()+'%',
    });

    var POPBGlobalStylesTag = '\n'+

      '#pbWrapper h1 { font-family:'+$('.typefaceHOne').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeHOne').val()+'px; }  \n'+

      '#pbWrapper h2 { font-family:'+$('.typefaceHTwo').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeHTwo').val()+'px; }  \n'+

      '#pbWrapper p { font-family:'+$('.typefaceParagraph').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeParagraph').val()+'px; }  \n'+

      '#pbWrapper button { font-family:'+$('.typefaceButton').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeButton').val()+'px; }  \n'+
      
      '#pbWrapper a { font-family:'+$('.typefaceAnchorLink').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeAnchorLink').val()+'px; } \n';

    $('#POPBDeafaultResponsiveStylesTag').html(' ');
  }

  if ($(this).hasClass('rbt-m')) {
    $('#pbWrapper').css({
      'padding-top': $('.pagePaddingTopTablet').val()+'%',
      'padding-bottom':$('.pagePaddingBottomTablet').val()+'%',
      'padding-left':$('.pagePaddingLeftTablet').val()+'%',
      'padding-right':$('.pagePaddingRightTablet').val()+'%',
    });

    var POPBGlobalStylesTag = '\n'+

      '#pbWrapper h1 { font-family:'+$('.typefaceHOne').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeHOneTablet').val()+'px; }  \n'+

      '#pbWrapper h2 { font-family:'+$('.typefaceHTwo').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeHTwoTablet').val()+'px; }  \n'+

      '#pbWrapper p { font-family:'+$('.typefaceParagraph').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeParagraphTablet').val()+'px; }  \n'+

      '#pbWrapper button { font-family:'+$('.typefaceButton').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeButtonTablet').val()+'px; }  \n'+
      
      '#pbWrapper a { font-family:'+$('.typefaceAnchorLink').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeAnchorLinkTablet').val()+'px; } \n';

    $('#POPBDeafaultResponsiveStylesTag').html(POPBDeafaultResponsiveStyles);
  }

  if ($(this).hasClass('rbt-s')) {
    $('#pbWrapper').css({
      'padding-top': $('.pagePaddingTopMobile').val()+'%',
      'padding-bottom':$('.pagePaddingBottomMobile').val()+'%',
      'padding-left':$('.pagePaddingLeftMobile').val()+'%',
      'padding-right':$('.pagePaddingRightMobile').val()+'%',
    });

    var POPBGlobalStylesTag = '\n'+

      '#pbWrapper h1 { font-family:'+$('.typefaceHOne').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeHOneMobile').val()+'px; }  \n'+

      '#pbWrapper h2 { font-family:'+$('.typefaceHTwo').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeHTwoMobile').val()+'px; }  \n'+

      '#pbWrapper p { font-family:'+$('.typefaceParagraph').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeParagraphMobile').val()+'px; }  \n'+

      '#pbWrapper button { font-family:'+$('.typefaceButton').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeButtonMobile').val()+'px; }  \n'+
      
      '#pbWrapper a { font-family:'+$('.typefaceAnchorLink').val().replace(/\+/g, ' ')+'; font-size:'+$('.typeSizeAnchorLinkMobile').val()+'px; } \n';
      $('#POPBDeafaultResponsiveStylesTag').html(POPBDeafaultResponsiveStyles);
  }

  $('#POPBGlobalStylesTag').html(POPBGlobalStylesTag);
});


PbPOaceEditorCSS.getSession().on('change',function(e){
  POcustomCSS = PbPOaceEditorCSS.getValue();

  $('#PBPO_customCSS').text(POcustomCSS);
});


$('.checkIfWidgetsAreLoadedInColumn').val('false');
PbColaceEditorCSS.getSession().on('change',function(e){
  POcustomCSS = PbColaceEditorCSS.getValue();

  var checkIfWidgetsAreLoadedInColumn = $('.checkIfWidgetsAreLoadedInColumn').val();

  if (checkIfWidgetsAreLoadedInColumn == 'true') {
    ColcurrentEditableRowID = jQuery('.ColcurrentEditableRowID').val();
    currentEditableColId = jQuery('.currentEditableColId').val();
    jQuery('section[rowid="'+ColcurrentEditableRowID+'"]').children('.ulpb_column_controls'+currentEditableColId).children('#editColumnSave').click();
  }
    

});





$('.closeWidgetPopup').click(function(ev){
  var that = $(ev.target).attr('data-CurrWidget');
  $('div[data-saveCurrWidget="'+that+'"]').click();

  ColcurrentEditableRowID = jQuery('.ColcurrentEditableRowID').val();
    currentEditableColId = jQuery('.currentEditableColId').val();
    jQuery('section[rowid="'+ColcurrentEditableRowID+'"]').children('.ulpb_column_controls'+currentEditableColId).children('#editColumnSave').click();
});

$('.closeWidgetPopupIcon').click(function(ev){
  var that = $(ev.target).attr('data-CurrWidget');
  $('div[data-saveCurrWidget="'+that+'"]').click();

  ColcurrentEditableRowID = jQuery('.ColcurrentEditableRowID').val();
  currentEditableColId = jQuery('.currentEditableColId').val();
    jQuery('section[rowid="'+ColcurrentEditableRowID+'"]').children('.ulpb_column_controls'+currentEditableColId).children('#editColumnSave').click();
});


$('.pageBgImage').change(function(){
    var pageBgImage = $('.pageBgImage').val();
    $('#container').attr('style','background-image: url("'+pageBgImage+'"); background-size:cover;');
  });

/*
$('.card-img').mouseover(function(ev) {
  //console.log($(ev.target).children());
  var tempprevbtn = $(ev.target).attr('class').split(' ')[1];
  //console.log(tempprevbtn);
  $('#'+tempprevbtn).width($(ev.target).width());
  $('#'+tempprevbtn).height($(ev.target).height());
  var tempPhieght = $(ev.target).height();
  $('.tempPrev p').css('margin-top',tempPhieght/2);
  $('#'+tempprevbtn).slideDown(100);
});

$('.card').mouseleave(function(ev){
  $('.tempPrev').slideUp('100');
});

*/

$('.card-img').mouseover(function(ev) {
  //console.log($(ev.target).children());
  var tempprevbtn = $(ev.target).attr('class').split(' ')[1];
  //console.log(tempprevbtn);
  $('#'+tempprevbtn).width($(ev.target).width());
  $('#'+tempprevbtn).height($(ev.target).height());
  var tempPhieght = $(ev.target).height();
  $('.tempPrev p').css('margin-top',tempPhieght/2);
  $('#'+tempprevbtn).slideDown(100);
});

$('.card').mouseleave(function(ev){
  $('.tempPrev').slideUp('100');
});


$('.pb_preview_container').click(function(){
  $('.pb_preview_container').attr('style','display:none;');
  $('.pb_temp_prev').html(' ');
});




//Responsive Options Buttons Global Script


$('.responsiveBtn').on('click',function(){
  $('.responsiveBtn').css('background','#a5a5a5');
  
  var selectedOptinType = pageBuilderApp.PageBuilderModel.get('optinType');
  tab1WidthL = '65%';
  tab1WidthM = '768px';
  tab1WidthS = '395px';
  if (selectedOptinType == 'Fly In') {
    tab1WidthL = '350px';
    tab1WidthM = '350px';
    tab1WidthS = '350px';
  }
  if (selectedOptinType == 'Bar' || selectedOptinType == 'Full Page') {
    tab1WidthL = '100%';
    tab1WidthM = '768px';
    tab1WidthS = '395px';
  }
  $('.responsiveOps').css('display','none');

  if ($(this).hasClass('rbt-l') ) {
    $('.rbt-l').css('background','#2196F3');
    $('.pb_editor_tab_content #tab1').animate({margin:'0 auto', width:tab1WidthL },500 );
    $('.responsiveOptionsContainterLarge').css('display','block');

    $('.currentViewPortSize').val('rbt-l');
    $('.pb_fullScreenEditorButtonClose').css('display','block');
    
  }

  if ($(this).hasClass('rbt-m') ) {
    $('.rbt-m').css('background','#2196F3');
    $('.pb_editor_tab_content #tab1').animate({margin:'0 auto', width:tab1WidthM },500 );
    $('.responsiveOptionsContainterMedium').css('display','block');

    $('.currentViewPortSize').val('rbt-m');
    
    
  }

  if ($(this).hasClass('rbt-s') ) {
    $('.rbt-s').css('background','#2196F3');
    $('.pb_editor_tab_content #tab1').animate({margin:'0 auto', width:tab1WidthS },500 );
    $('.responsiveOptionsContainterSmall').css('display','block');

    $('.currentViewPortSize').val('rbt-s');
    
    
  }


});




// POPB Tabs 

$('.popbNavItem').on('click',function(){
  var clickedPOPBTab = $(this).attr('data-inptabID');
  var currentOptionType = $(this).children('input').attr("name");
  $(this).siblings('.popbNavItem').children('label').css({'background':'#f1f1f1', 'color':'#333'});
  $(this).children('label').css({'background':'#a5a5a5', 'color':'#fff'});
  $(this).parent().next('.popb_input_tabContent').children('.popb_tab_content').css('display','none');
  $(this).parent().next().children('.'+clickedPOPBTab).css('display','block');
  $("."+currentOptionType).prop("checked", false);
  $(this).children('input').prop("checked", true);
  $(this).children('input').trigger("change");
});


$('.popbinputTabsWrapper').tooltip({
  tooltipClass: "inp-tab-tooltip-styling"
});




// Number Sliders 
$('.rowGradientType').on('change',function(){
  var rowGradientType = $(this).val();
  if (rowGradientType == 'linear') {
    $('.radialInput').css('display','none');
    $('.linearInput').css('display','block');
  }else{
    $('.radialInput').css('display','block');
    $('.linearInput').css('display','none');
  }
});


$('.rowGradientTypeHover').on('change',function(){
  var rowGradientType = $(this).val();
  if (rowGradientType == 'linear') {
    $('.radialInputHover').css('display','none');
    $('.linearInputHover').css('display','block');
  }else{
    $('.radialInputHover').css('display','block');
    $('.linearInputHover').css('display','none');
  }
});


$('.colGradientType').on('change',function(){
  var colGradientType = $(this).val();
  if (colGradientType == 'linear') {
    $('.radialInputCol').css('display','none');
    $('.linearInputCol').css('display','block');
  }else{
    $('.radialInputCol').css('display','block');
    $('.linearInputCol').css('display','none');
  }
});


$('.widgGradientType').on('change',function(){
  var widgGradientType = $(this).val();
  if (widgGradientType == 'linear') {
    $('.radialInputWidg').css('display','none');
    $('.linearInputWidg').css('display','block');
  }else{
    $('.radialInputWidg').css('display','block');
    $('.linearInputWidg').css('display','none');
  }
});


$('.colGradientTypeHover').on('change',function(){
  var colGradientTypeHover = $(this).val();
  if (colGradientTypeHover == 'linear') {
    $('.radialInputColHover').css('display','none');
    $('.linearInputColHover').css('display','block');
  }else{
    $('.radialInputColHover').css('display','block');
    $('.linearInputColHover').css('display','none');
  }
});

$('.widgGradientTypeHover').on('change',function(){
  var widgGradientTypeHover = $(this).val();
  if (widgGradientTypeHover == 'linear') {
    $('.radialInputWidgHover').css('display','none');
    $('.linearInputWidgHover').css('display','block');
  }else{
    $('.radialInputWidgHover').css('display','block');
    $('.linearInputWidgHover').css('display','none');
  }
});

$( ".PoPbrangeSlider" ).slider({
  value:0,
  min: 0,
  max: 100,
  step: 5,
  slide: function( event, ui ) {
    POPBtagerInput = $(this).attr('data-targetRangeInput');
    $('.'+POPBtagerInput).val(ui.value);
    $('.'+POPBtagerInput).trigger('change');
  }
});

$( ".PoPbrangeSliderAngle" ).slider({
  value:0,
  min: 0,
  max: 360,
  step: 5,
  slide: function( event, ui ) {
    POPBtagerInput = $(this).attr('data-targetRangeInput');
    $('.'+POPBtagerInput).val(ui.value);
    $('.'+POPBtagerInput).trigger('change');
  }
});

$( ".PoPbrangeSliderTransition" ).slider({
  value:1,
  min: 0.1,
  max: 3,
  step: 0.1,
  slide: function( event, ui ) {
    POPBtagerInput = $(this).attr('data-targetRangeInput');
    $('.'+POPBtagerInput).val(ui.value);
    $('.'+POPBtagerInput).trigger('change');
  }
});



  $('#pbWrapper').css('display','none');

  jQuery('.pb_fullScreenEditorButton').click(function(){
    $('.pb_editor_tab_content').attr('style','overflow: hidden;background:#5d5d5d;position: absolute;width: 100%;left: 0;right: 15;top: 0;');
    $('.pb_editor_tab_content #tab1').css('background', '#5d5d5d');
    $('#adminmenumain, .pb_fullScreenEditorButton, #wpadminbar, #postbox-container-2, .postbox').css('display','none');
    $('#wpcontent').attr('style','margin-left:0; padding-left:0;');
    $('.pb_fullScreenEditorButtonClose').show();
    $('#pbWrapper').css('display','block');

    $(this).addClass('EditorActive');
  });

  jQuery('.pb_fullScreenEditorButtonClose').click(function(){
    $('.pb_editor_tab_content').attr('style','overflow: hidden;background: #fff;');
    $('.pb_editor_tab_content #tab1').css('background', '#fff');
    $('.pb_fullScreenEditorButtonClose').css('display','none');
    $('#wpcontent').attr('style','');
    $('#adminmenumain, .pb_fullScreenEditorButton, #wpadminbar, #postbox-container-2 , .postbox').show();

    $('#submitdiv').css('display','none');
    $('#pbWrapper').css('display','none');
    $('.pb_fullScreenEditorButton').removeClass('EditorActive');
      $('.edit_row').hide("slide", { direction: "left" }, 500);
        $('.columnWidgetPopup').hide("slide", { direction: "left" }, 500);
        $('.pageops_modal').hide("slide", { direction: "left" }, 500);
        $('.edit_column').hide("slide", { direction: "left" }, 500);
        $('.ulpb_column_controls, .ulpb_row_controls').css('display','none');
  });

  $(document).ready(function(){
    $('.pb_fullScreenEditorButton').css('display','block');
    $('.pb_loader_container_pageload').css('display','none');
  });


jQuery('#pbCountDownDate').datepicker({
  dateFormat: 'yy/mm/dd'
});






}( jQuery ) );
















(function ($) {

  // Detect touch support
  $.support.touch = 'ontouchend' in document;

  // Ignore browsers without touch support
  if (!$.support.touch) {
    return;
  }

  var mouseProto = $.ui.mouse.prototype,
      _mouseInit = mouseProto._mouseInit,
      _mouseDestroy = mouseProto._mouseDestroy,
      touchHandled;

  /**
   * Simulate a mouse event based on a corresponding touch event
   * @param {Object} event A touch event
   * @param {String} simulatedType The corresponding mouse event
   */
  function simulateMouseEvent (event, simulatedType) {

    // Ignore multi-touch events
    if (event.originalEvent.touches.length > 1) {
      return;
    }

    event.preventDefault();

    var touch = event.originalEvent.changedTouches[0],
        simulatedEvent = document.createEvent('MouseEvents');
    
    // Initialize the simulated mouse event using the touch event's coordinates
    simulatedEvent.initMouseEvent(
      simulatedType,    // type
      true,             // bubbles                    
      true,             // cancelable                 
      window,           // view                       
      1,                // detail                     
      touch.screenX,    // screenX                    
      touch.screenY,    // screenY                    
      touch.clientX,    // clientX                    
      touch.clientY,    // clientY                    
      false,            // ctrlKey                    
      false,            // altKey                     
      false,            // shiftKey                   
      false,            // metaKey                    
      0,                // button                     
      null              // relatedTarget              
    );

    // Dispatch the simulated event to the target element
    event.target.dispatchEvent(simulatedEvent);
  }

  /**
   * Handle the jQuery UI widget's touchstart events
   * @param {Object} event The widget element's touchstart event
   */
  mouseProto._touchStart = function (event) {

    var self = this;

    // Ignore the event if another widget is already being handled
    if (touchHandled || !self._mouseCapture(event.originalEvent.changedTouches[0])) {
      return;
    }

    // Set the flag to prevent other widgets from inheriting the touch event
    touchHandled = true;

    // Track movement to determine if interaction was a click
    self._touchMoved = false;

    // Simulate the mouseover event
    simulateMouseEvent(event, 'mouseover');

    // Simulate the mousemove event
    simulateMouseEvent(event, 'mousemove');

    // Simulate the mousedown event
    simulateMouseEvent(event, 'mousedown');
  };

  /**
   * Handle the jQuery UI widget's touchmove events
   * @param {Object} event The document's touchmove event
   */
  mouseProto._touchMove = function (event) {

    // Ignore event if not handled
    if (!touchHandled) {
      return;
    }

    // Interaction was not a click
    this._touchMoved = true;

    // Simulate the mousemove event
    simulateMouseEvent(event, 'mousemove');
  };

  /**
   * Handle the jQuery UI widget's touchend events
   * @param {Object} event The document's touchend event
   */
  mouseProto._touchEnd = function (event) {

    // Ignore event if not handled
    if (!touchHandled) {
      return;
    }

    simulateMouseEvent(event, 'mouseup');

    simulateMouseEvent(event, 'mouseout');

    if (!this._touchMoved) {

      simulateMouseEvent(event, 'click');
    }

    touchHandled = false;
  };

  
  mouseProto._mouseInit = function () {
    
    var self = this;

    self.element.bind({
      touchstart: $.proxy(self, '_touchStart'),
      touchmove: $.proxy(self, '_touchMove'),
      touchend: $.proxy(self, '_touchEnd')
    });

    _mouseInit.call(self);
  };

  
  mouseProto._mouseDestroy = function () {
    
    var self = this;

    // Delegate the touch handlers to the widget's element
    self.element.unbind({
      touchstart: $.proxy(self, '_touchStart'),
      touchmove: $.proxy(self, '_touchMove'),
      touchend: $.proxy(self, '_touchEnd')
    });

    // Call the original $.ui.mouse destroy method
    _mouseDestroy.call(self);
  };

})(jQuery);