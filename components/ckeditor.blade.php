<div class="main-container">
    <textarea class="editor" id="editor" placeholder="Type the content here!" name="{{ $name }}" {{ isset($required) ? 'required' : '' }}>
        <main class="main-ckeditor-content">
            <div class="content" id="capture">
                {!! old( $name , !empty($data) ? $data : '' ) !!}
            </div>
        </main>
    </textarea>
</div>
<script type="importmap">
			{
				"imports": {
					"ckeditor5": "{{asset('assets/web/lib/ckeditor/ckeditor5/ckeditor5.js')}}",
					"ckeditor5/": "{{asset('assets/web/lib/ckeditor/ckeditor5/')}}"
				}
			}
		</script>
<script type="module">
    // import { Mermaid } from '@ckeditor/ckeditor5-mermaid/dist/index.js';
    // import '@ckeditor/ckeditor5-mermaid/dist/index.css';
    import {
        ClassicEditor, Essentials, Paragraph, Bold, Italic, Font, Style, GeneralHtmlSupport, HtmlEmbed, FullPage, HtmlComment,
        SourceEditing, Markdown, Autoformat, Alignment, Plugin,TextTransformation, Code, Strikethrough, Subscript, Superscript, Underline, Heading,
        Title,HeadingButtonsUI, ParagraphButtonUI,HorizontalLine,Clipboard,FindAndReplace,TodoList,MediaEmbed,Mention, SpecialCharacters, SpecialCharactersEssentials,
        Table, TableToolbar, TableProperties, TableCellProperties,TextPartLanguage,SimpleUploadAdapter,Link, AutoLink,
        PasteFromOffice, Image, ImageCaption, ImageResize, ImageStyle, ImageToolbar, LinkImage,ImageInsert
    } from 'ckeditor5';

    ClassicEditor
        .create(document.querySelector('#editor'), {
            plugins: [Essentials, Autoformat, Paragraph, Bold, Italic, Font, Style, Alignment,
                GeneralHtmlSupport, FullPage, HtmlComment, SourceEditing ,Markdown, TextTransformation,
                Code, Strikethrough, Subscript, Superscript, Underline, Heading,HeadingButtonsUI, ParagraphButtonUI,
                HorizontalLine,Clipboard,FindAndReplace,TodoList,MediaEmbed,Mention, SpecialCharacters, SpecialCharactersEssentials,
                Table, TableToolbar, TableProperties, TableCellProperties,SimpleUploadAdapter, Link, AutoLink,
                PasteFromOffice,TextPartLanguage,Image, ImageCaption, ImageResize, ImageStyle, ImageToolbar, LinkImage,ImageInsert
                // Title,
            ],
            toolbar: {
                items: ['undo', 'redo', 'sourceEditing', '|', 'bold', 'italic', 'bidiLtr', 'bidiRtl',
                    'htmlEmbed','FullPage','htmlComment', 'alignment', "plugin", 'textPartLanguage',
                    'fontSize', 'fontFamily','|', 'fontColor', 'fontBackgroundColor', 'autoFormat', 'style',
                    "textTransformation","code", "strikethrough", "subscript", "superscript", "underline",
                    '|', 'bulletedList', 'numberedList', "heading","headingButtonsUI", "paragraphButtonUI",
                    "horizontalLine",'|',"clipboard",'findAndReplace','todoList','mediaEmbed',"mention",
                    "pasteFromOffice", "specialCharacters", "specialCharactersEssentials","table", "tableToolbar", "insertTable",
                    "title", 'imageTextAlternative', 'ckboxImageEdit','insertImage','link',
                ],
                shouldNotGroupWhenFull: true
            },

            language: {
                textPartLanguage: [
                    { title: 'Arabic', languageCode: 'ar' },
                    { title: 'English', languageCode: 'en' },
                ]
            },

            fontSize: {
                options: [ 10, 12, 14, 16, 'default', 18, 20, 24, 28, 32, 40, 48, 72 ],
                supportAllValues: false
            },
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                    { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                    { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                    { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                ]
            },
            image: {
                insert: {
                    // This is the default configuration, you do not need to provide
                    // this configuration key if the list content and order reflects your needs.
                    integrations: [ 'upload', 'assetManager', 'url' ]
                }
            },
            model: {
                name: 'table',
                key: 'class',
                values: [ 'big', 'small' ]
            },
            view: {
                big: {
                    name: 'figure',
                    key: 'class',
                    value: [ 'table', 'some-big-table' ]
                },

                small: {
                    name: 'figure',
                    key: 'class',
                    value: [ 'table', 'some-big-small' ]
                }
            },

            htmlSupport: {
                allow: [
                    {
                        name: /.*/,
                        attributes: true,
                        classes: true,
                        styles: true,
                        script: true,

                    }
                ]
            },
            style: {
                definitions: [
                    {
                        name: 'Article category',
                        element: 'h3',
                        classes: [ 'category' ]
                    },
                    {
                        name: 'Info box',
                        element: 'p',
                        classes: [ 'info-box' ]
                    },
                ]
            },

        })
        .then(editor => {
            window.editor = editor;
        })
        .catch(error => {
            console.error(error);
        });
</script>
<!-- A friendly reminder to run on a server, remove this during the integration. -->
<script>
    window.onload = function () {
        if (window.location.protocol === "file:") {
            alert("This sample requires an HTTP server. Please serve this file with a web server.");
        }
    };
</script>
