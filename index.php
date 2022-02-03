<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>A Simple Page with CKEditor 4</title>
        <!-- Make sure the path to CKEditor is correct. -->
        <script src="./ckeditor/ckeditor.js"></script>
    </head>
    <body>
        <form>
            <textarea name="editor1" id="editor1" rows="10" cols="80">
                This is my textarea to be replaced with CKEditor 4.
            </textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor 4
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1', {
                    height: 500,
    filebrowserBrowseUrl: './browse.php',
    filebrowserUploadUrl: './upload.php',
    filebrowserUploadMethod :'form',
    extraPlugins : 'uploadimage',
    imageUploadUrl :'./upload.php?type=ImagesDrop',


// Advanced File Manager Configuration
    // filebrowserBrowseUrl: '/browser/browse.php',
    // filebrowserImageBrowseUrl: '/browser/browse.php?type=Images',
    // filebrowserUploadUrl: '/uploader/upload.php',
    // filebrowserImageUploadUrl: '/uploader/upload.php?type=Images'
    filebrowserWindowWidth: '500',
    filebrowserWindowHeight: '480',
     extraPlugins : ['image2','justify'],
});

            </script>
        </form>
    </body>
</html>
