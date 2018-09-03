<head>
      <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="uploader.js"></script>
      <style type="text/css">
            #upload-area {
                border: 3px solid grey;
                width: 100%;
                height: 250px;
                z-index: 100;
                display: none;
                background: #fff;
                position: absolute;
            }
            h2 {
              text-align: center;
            }
            .focus-background {
                width: 100%;
                height: 100%;
                background: grey;
                opacity: 0.6;
                z-index: 90;
                display: none;
                position: absolute;
                left: 0px;
                top: 0px;
            }
     </style>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
    integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- end of bootstrap scripts -->
</head>
<body>
    <h1>Image uploader</h1>
    <div class="btn btn-block btn-success" id="show-upload">Upload Image</div>
    <div id="upload-area">
        <h2>Drag and drop file to upload</h2>
    </div>
    <div class="focus-background"></div>
    <form method="POST">
      <table class="table" id="image-table">
          <thead>
              <tr>
                  <th scope="col">#</th>
                  <th scope="col">Image Name</th>
                  <th scope="col">Image Size</th>
                  <th scope="col">Remove</th>
                  <th scope="col">Download</th>
              </tr>
          </thead>
          <tbody>

          </tbody>

      </table>
    </form>

    <script>
        getUploadedImages();
    </script>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        unlink('images/'.$_POST['remove-image']);
    }

     ?>

</body>
