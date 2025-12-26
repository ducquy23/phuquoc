{{-- resources/views/forms/components/ckeditor.blade.php --}}
<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    <div x-data="{
        state: $wire.$entangle('{{ $getStatePath() }}'),
        editorId: 'ckeditor-{{ $getId() }}',

        init() {
            this.$nextTick(() => {
                this.loadCKEditor();
            });
        },

        loadCKEditor() {
            // Load CKEditor nếu chưa có
            if (typeof CKEDITOR === 'undefined') {
                const script = document.createElement('script');
                script.src = 'https://cdn.ckeditor.com/4.17.2/full/ckeditor.js';
                script.onload = () => {
                    this.initEditor();
                };
                document.head.appendChild(script);
            } else {
                this.initEditor();
            }
        },

        initEditor() {
            try {
                var route_prefix = '/tony/filemanager'; // Thay đổi route này theo dự án của bạn

                CKEDITOR.replace(this.editorId, {
                    language: 'en',
                    uiColor: '#E0F2F4',
                    height: 450,
                    entities: false,
                    fullPage: false,
                    autoParagraph: false,
                    pasteFromWordRemoveFontStyles: true,
                    pasteFromWordRemoveStyles: true,
                    pasteFilter: 'semantic-content',
                    // Config file & image
                    filebrowserImageBrowseUrl: route_prefix + '?type=other',
                    filebrowserImageUploadUrl: route_prefix + '/upload?type=other&_token=',
                    filebrowserBrowseUrl: route_prefix + '?type=file',
                    filebrowserUploadUrl: '',
                    image_previewText: ' ',
                    uploadUrl: '',
                    clipboard_handleImages: false,
                    versionCheck: false,
                });


                const editor = CKEDITOR.instances[this.editorId];

                if (editor) {
                    editor.setData(this.state || '');

                    editor.on('change', () => {
                        this.state = editor.getData();
                    });

                    editor.on('blur', () => {
                        this.state = editor.getData();
                    });

                    editor.on('paste', (evt) => {
                        var data = evt.data.dataValue;

                        // Loại bỏ tất cả thẻ img
                        data = data.replace(/<img[^>]*>/gi, '');

                        evt.data.dataValue = data;
                    });
                }
            } catch (error) {
                console.error('CKEditor Error:', error);
            }
        }
    }" wire:ignore>
        <textarea :id="editorId" name="{{ $getName() }}"
                  class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500"></textarea>
    </div>
</x-dynamic-component>
