<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Browsing Files</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
</head>
<body>
<div class="table-responsive">
<table class="table table-striped table-hover table-primary">
    <thead>
        <tr>
            <td>Photo</td>
            <td>Name</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
    <?php
    date_default_timezone_set("Asia/Bangkok");
$folder = "./uploads/";
if ($dir = opendir($folder))
{
 while (($file = readdir($dir)) !== false)
 {
     if($file != "." && $file != ".."){
        $fileUrl = $folder.$file;
        
        echo "<tr>";
        echo "<td>";
        echo "<img src=".$fileUrl." class='img-thumbnail' width='120'></img>";
        echo "</td>";
        echo "<td>";
        echo "<p class='mb-0'>$file</p>";
        echo "<p class='small text-muted'>".date ("m/d/Y H:i A", filemtime($fileUrl))."</p>";
        echo "</td>";
        echo "<td>";
        echo "<button type='button' class='btn btn-primary me-2' onclick=returnFileUrl('".$fileUrl."')>Select File</button>";
        echo "<form method='post' class='d-inline' action='delete_file.php' onclick='return confirm(\"Are you sure you want to Delete?\");'>";
        echo "<input type='hidden' name='file_name' value='".$file."'>";
        echo "<input type='submit' class='btn btn-danger' name='delete_file' value='Delete File'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
     }
 
 }
 closedir($dir);
}
?>
    </tbody>

</table>
</div>
    <!-- <button onclick="returnFileUrl()">Select File</button> -->
    <script>
        // Helper function to get parameters from the query string.
        function getUrlParam( paramName ) {
            var reParam = new RegExp( '(?:[\?&]|&)' + paramName + '=([^&]+)', 'i' );
            var match = window.location.search.match( reParam );

            return ( match && match.length > 1 ) ? match[1] : null;
        }
        // Simulate user action of selecting a file to be returned to CKEditor.
        function returnFileUrl(fileUrl) {
            var funcNum = getUrlParam( 'CKEditorFuncNum' );
            window.opener.CKEDITOR.tools.callFunction( funcNum, fileUrl, function() {
                // Get the reference to a dialog window.
                var dialog = this.getDialog();
                // Check if this is the Image Properties dialog window.
                if ( dialog.getName() == 'image' ) {
                    // Get the reference to a text field that stores the "alt" attribute.
                    var element = dialog.getContentElement( 'info', 'txtAlt' );
                    // Assign the new value.
                    if ( element )
                        element.setValue( 'alt text' );
                }
                // Return "false" to stop further execution. In such case CKEditor will ignore the second argument ("fileUrl")
                // and the "onSelect" function assigned to the button that called the file manager (if defined).
                // return false;
            } );
            window.close();
        }
    </script>
</body>
</html>
