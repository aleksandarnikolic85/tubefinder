CKEDITOR.plugins.add('lightboxButton', {


    init: function (editor) {

        /* Add Button in CKeditor tool bar */
        editor.ui.addButton('addProductPlaceholder', {
            label: 'Add a lightbox button',
            command: 'cmdAddButtonDialog',
            toolbar: 'insert',
            /*this command invoke function when you click button */
            icon: this.path + 'icons/icon.png' /* path of your icon image*/
        });

        /* addCommand - Bind our button event with Dialog */
        editor.addCommand('cmdAddButtonDialog', new CKEDITOR.dialogCommand('addButtonDialog'));

        /*create a DIALOG (addButtonDialog)*/
        CKEDITOR.dialog.add('addButtonDialog', function (editor) {
            return {
                title: 'Add a lightbox button',
                minWidth: 300,
                minHeight: 200,
                contents: /* tab of dialog*/ [
                    {
                        id: 'tab1',
                        label: 'Settings',
                        elements: [
                            {
                                id: "lightboxId",
                                type: "text",
                                widths: ["100%", "100%"],
                                style: "width:100%; margin-top:5px",
                                label: 'Lightbox ID',

                            },
                            {
                                id: "buttonText",
                                type: "text",
                                widths: ["100%", "100%"],
                                style: "width:100%; margin-top:5px",
                                label: 'Button text',

                            }
                        ]
                    }
                ],
                onOk: function () { /*event trigger when click OK Button*/

                    var dialog = this;

                    /*Get all input Values*/
                    var lightboxID = dialog.getValueOf('tab1', 'lightboxId');
                    var btnText = dialog.getValueOf('tab1', 'buttonText');

                    //insert your dialog fields to 'container'(a)
                    editor.insertHtml("<button class=\"a-button\" data-modal-click=\"launch\" data-modal-content=\"#"+ lightboxID +"\" data-require=\"modal\">"+ btnText +"</button>");
                }
            };
        }); //dialog end
    } //init end
}); //plugin.add end