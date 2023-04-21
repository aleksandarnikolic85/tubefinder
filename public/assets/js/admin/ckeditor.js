CKEDITOR.stylesSet.add('default', [
    // Block Styles
    {name: 'Orange text', element: 'span', attributes: {class: '_color-orange'}},
    {name: 'Underline', element: 'u'},
    {name: 'Standard paragraph', element: 'p', styles: {"line-height": "1.5rem", "margin-bottom": "1rem"}},
    {name: 'Superscript', element: 'sup'},
    {name: 'Subscript', element: 'sub'},
    {name: 'Headline Large Bold', element: 'h2', attributes: {class: "headline -size-large -bold"}},
    {name: 'Headline Large Light', element: 'h3', attributes: {class: "headline -size-large -light"}},
    {name: 'Headline Medium Bold', element: 'h2', attributes: {class: "headline -size-medium -bold"}},
    {
        name: 'Image caption left',
        element: 'span',
        attributes: {'class': "image-caption-custom"}
    },
    {
        name: 'Image caption right',
        element: 'span',
        attributes: {'class': "image-caption-custom image-caption-custom__right"}
    },
    {name: 'Unordered list', element: 'ul', attributes: {class: "a-list -unordered"}},
    {
        name: 'Lightbox button',
        element: 'button',
        attributes: {
            class: "a-button",
            "data-require": "modal",
            "data-modal-click":"launch",
            "data-modal-content": "#modal-content"
        }
    },

    /*{name: 'Minimized', element: 'small'},
    {name: 'Highlighted', element: 'small', attributes: {class: 'highlight'}},
    {name: 'Highlighted Span', element: 'span', attributes: {class: 'highlight'}},
    {name: 'Paragraph lead', element: 'p', attributes: {class: 'lead'}},
    {name: 'Paragraph white', element: 'p', attributes: {class: 'white'}},
    {name: 'Paragraph info', element: 'p', attributes: {class: 'p-info'}},
    {name: 'Labelize', element: 'p', attributes: {class: 'label label-primary'}},
    {name: 'Label Default', element: 'span', attributes: {class: 'label label-default'}},
    {name: 'Label Primary', element: 'span', attributes: {class: 'label label-primary'}},
    {name: 'Label Success', element: 'span', attributes: {class: 'label label-success'}},
    {name: 'Label Info', element: 'span', attributes: {class: 'label label-info'}},
    {name: 'Label Warning', element: 'span', attributes: {class: 'label label-warning'}},
    {name: 'Label Danger', element: 'span', attributes: {class: 'label label-danger'}},
    {name: 'Email', element: 'span', attributes: {class: "data-obf"}},
    {name: 'Default Button (Small)', element: 'span', attributes: {class: 'btn btn-xs btn-default'}},
    {name: 'Primary Button (Small)', element: 'span', attributes: {class: 'btn btn-xs btn-primary'}},
    {name: 'Success Button (Small)', element: 'span', attributes: {class: 'btn btn-xs btn-success'}},
    {name: 'Info Button (Small)', element: 'span', attributes: {class: 'btn btn-xs btn-info'}},
    {name: 'Warning Button (Small)', element: 'span', attributes: {class: 'btn btn-xs btn-warning'}},
    {name: 'Danger Button (Small)', element: 'span', attributes: {class: 'btn btn-xs btn-danger'}},
    {name: 'Link Button (Small)', element: 'span', attributes: {class: 'btn btn-xs btn-link'}},

    {name: 'Default Button (Medium)', element: 'span', attributes: {class: 'btn btn-default'}},
    {name: 'Primary Button (Medium)', element: 'span', attributes: {class: 'btn btn-primary'}},
    {name: 'Success Button (Medium)', element: 'span', attributes: {class: 'btn btn-success'}},
    {name: 'Info Button (Medium)', element: 'span', attributes: {class: 'btn btn-info'}},
    {name: 'Warning Button (Medium)', element: 'span', attributes: {class: 'btn btn-warning'}},
    {name: 'Danger Button (Medium)', element: 'span', attributes: {class: 'btn btn-danger'}},
    {name: 'Link Button (Medium)', element: 'span', attributes: {class: 'btn btn-link'}},

    {name: 'Default Button (Large)', element: 'span', attributes: {class: 'btn btn-lg btn-default'}},
    {name: 'Primary Button (Large)', element: 'span', attributes: {class: 'btn btn-lg btn-primary'}},
    {name: 'Success Button (Large)', element: 'span', attributes: {class: 'btn btn-lg btn-success'}},
    {name: 'Info Button (Large)', element: 'span', attributes: {class: 'btn btn-lg btn-info'}},
    {name: 'Warning Button (Large)', element: 'span', attributes: {class: 'btn btn-lg btn-warning'}},
    {name: 'Danger Button (Large)', element: 'span', attributes: {class: 'btn btn-lg btn-danger'}},
    {name: 'Link Button (Large)', element: 'span', attributes: {class: 'btn btn-lg btn-link'}},

    {name: 'Square Bulleted List', element: 'ul', styles: {'list-style-type': 'square'}},
    {name: 'Ordinary List', element: 'ol', styles: {'list-style-type': 'decimal'}},
    {name: 'Check List 1', element: 'ul', attributes: {class: "check-list-1"}},
    {name: 'Check List 2', element: 'ul', attributes: {class: "check-list-2"}},
    {name: 'Check List 3', element: 'ul', attributes: {class: "check-list-3"}},
    {name: 'Chevron List 1', element: 'ul', attributes: {class: "chevron-list-1"}},
    {name: 'Chevron List 2', element: 'ul', attributes: {class: "chevron-list-2"}},
    {name: 'Dot Circle List', element: 'ul', attributes: {class: "dot-circle-list"}},


    /*{
        name: 'Image on Left',
        element: 'img',
        attributes: {
            style: 'padding: 5px; margin-right: 5px',
            border: '2',
            align: 'left'
        }
    }*/
]);
CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
CKEDITOR.editorConfig = function (config) {
    config.enterMode = CKEDITOR.ENTER_BR;
};

CKEDITOR.config.coreStyles_bold = {element: 'b', overrides: 'strong'};

CKEDITOR.config.forcePasteAsPlainText = true;
CKEDITOR.config.toolbarGroups = [
    /*{name: 'clipboard', groups: ['clipboard', 'undo']},
    {name: 'editing', groups: ['find', 'selection', 'spellchecker', 'editing']},
    {name: 'links', groups: ['links']},
    /!*{ name: 'insert', groups: [ 'insert' ] },*!/
    {name: 'forms', groups: ['forms']},
    {name: 'tools', groups: ['tools']},
    '/',
    {name: 'basicstyles', groups: ['basicstyles', 'cleanup']},
    {name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi', 'paragraph']},
    '/',
    {name: 'styles', groups: ['styles']},
    {name: 'document', groups: ['mode', 'document', 'doctools']}*/];
CKEDITOR.config.removePlugins = 'bidi,font,forms,flash,iframe,smiley,colorbutton';
CKEDITOR.plugins.addExternal('ledvance', "/static/js/admin/plugins/ledvance/", "plugin.js");
CKEDITOR.plugins.addExternal('lightboxButton', "/static/js/admin/plugins/lightboxButton/", "plugin.js");
CKEDITOR.config.extraPlugins = 'ledvance,lightboxButton';

CKEDITOR.editorConfig = function( config )
{
    config.extraPlugins = 'ledvance,lightboxButton';
};
CKEDITOR.editorConfig(CKEDITOR.config);
CKEDITOR.config.allowedContent = true;
var customObjCKEDITOR = CKEDITOR;

