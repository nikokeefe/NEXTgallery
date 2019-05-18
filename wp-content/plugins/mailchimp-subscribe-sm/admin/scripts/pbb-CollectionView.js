( function( $ ) {
pageBuilderApp.rowList = new pageBuilderApp.RowCollection();
pageBuilderApp.widgetList = new pageBuilderApp.WidgetCollection();
pageBuilderApp.PageBuilderModel = new pageBuilderApp.ULPBPage();

var pbWrapperHeight  = '';
var row = new pageBuilderApp.Row();
var widget = new pageBuilderApp.ColWidget();
//var savedPage = pageBuilderApp.PageBuilderModel.fetch();
pageBuilderApp.PageBuilderModel.fetch({
    success: function() {
      templateLoadedSucessfully();
      var Rows = pageBuilderApp.PageBuilderModel.get('Rows');

      _.each( Rows, function(Row, index ) {
        pageBuilderApp.rowList.add(Row);
      });
      //console.log(JSON.stringify(pageBuilderApp.PageBuilderModel) );
    },
    error: function() {
        console.log('Failed to fetch!');
    }
});


var PgCollectionView = new Backbone.CollectionView( {
    el : $( "#container" ),
    modelView : pageBuilderApp.RowView,
    collection : pageBuilderApp.rowList,
    sortable: true,
    selectable: false,
    emptyListCaption: '<div class="newRowBtnContainerVisible" > <div class="newRowBtnContainerSections"> <div class="addNewRowVisible  row-section-btn" style="background:#5AB1F7;" > ADD NEW SECTION</div> </div> <div class="newRowBtnContainerSections" style="display: none;">    <div class="addNewGlobalRowVisible  row-section-btn" style="background:#F1D204;" > INSERT GLOBAL ROW</div> </div> </div> <br> <br> <br> <h3>Add a section to design your own template or select a template and start editing.</h3>'
} );

/*
var PgFullWidthCollectionView = new Backbone.CollectionView( {
    el : $( "#fullWidthContainer" ),
    modelView : pageBuilderApp.RowView,
    collection : pageBuilderApp.rowList,
    sortable: true,
    selectable: false,
    emptyListCaption: '<h3>Add some rows.</h3>'
} );
*/

var widgetCollectionView = new Backbone.CollectionView( {
    el : $( "#widgets" ),
    modelView : pageBuilderApp.WidgetView,
    collection : pageBuilderApp.widgetList,
    sortable: true,
    selectable: false,
    emptyListCaption: 'Add some widgets.',

} );

widgetCollectionView.on('sortStop',function(){
    ColcurrentEditableRowID = jQuery('.ColcurrentEditableRowID').val();
    currentEditableColId = jQuery('.currentEditableColId').val();
    jQuery('section[rowid="'+ColcurrentEditableRowID+'"]').children('.ulpb_column_controls'+currentEditableColId).children('#editColumnSave').click();
});

PgCollectionView.render();
//PgFullWidthCollectionView.render();
widgetCollectionView.render();


pageBuilderApp.rowUndoManager = new Backbone.UndoManager({
  track: true, // changes will be tracked right away
  register: [pageBuilderApp.rowList ] // pass an object or an array of objects
});



$(document).ready(function(){
  $('#pbbtnUndo').click(function(){
    $('.pb_loader_container').css('display','block');
    pageBuilderApp.rowUndoManager.undo();
    PgCollectionView.render();
    setTimeout(function(){
      $('.pb_loader_container').css('display','none');
    },300);
  });

  $('#pbbtnRedo').click(function(){
    $('.pb_loader_container').css('display','block');
    pageBuilderApp.rowUndoManager.redo();
    PgCollectionView.render();
    setTimeout(function(){
      $('.pb_loader_container').css('display','none');
    },300);
  });

});


}( jQuery ) );