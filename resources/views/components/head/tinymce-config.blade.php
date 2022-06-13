<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea.tinymce', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | bold italic underline | link | alignleft aligncenter alignright | indent outdent | bullist numlist | table | code'
        + ' removeformat | help',
        branding: false,
        menubar: false,
    });
</script>
