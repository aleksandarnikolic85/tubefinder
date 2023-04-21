CKEDITOR.plugins.add( 'ledvance', {
    init: function( editor ) {
        editor.addCommand( 'insertArrow', {
            exec: function( editor ) {
                editor.insertHtml( "<i class=\"a-icon icon-arrow-right-filled-positive-24px -color-orange\">\n" +
                    "<svg preserveAspectRatio=\"xMaxYMin\">\n" +
                    "<use xlink:href=\"/static/images/svg/sprite.svg#icon-arrow-right-filled-positive-24px\"></use>\n" +
                    "</svg>\n" +
                    "</i>" );
            }
        });
        editor.ui.addButton( 'insertArrow', {
            label: 'Add arrow',
            command: 'insertArrow',
            toolbar: 'insert',
            icon:  this.path + 'icons/arrow.png',
        });
    }
});