<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload_file</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<button class="btnsub" onclick="window.location.href='/Page/about.php'">About</button>
  <div id="imagePreview"></div> 
  <form action="../Webroot/upload_fixed.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="imgss" id='file' onchange="return fileValidation()" multiple>
    <p>Drag your files here or click in this area.</p>
    <button type="submit">Upload</button>
  </form>
</body>
<script>
  function fileValidation() { 
    let fileInput = document.getElementById('file');
    let filePath = fileInput.value;
    let allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
    if (!allowedExtensions.exec(filePath)) {
      alert('Invalid file type');
      fileInput.value = '';
      return false;
    }
    else 
    {
      if (fileInput.files && fileInput.files[0]) { 
        let reader = new FileReader(); 
        reader.onload = function(e) { 
          document.getElementById( 
            'imagePreview').innerHTML = 
            '<img src="' + e.target.result 
            + '"/>';
        };
        reader.readAsDataURL(fileInput.files[0]); 
      }
    }
  }
</script>
</html>