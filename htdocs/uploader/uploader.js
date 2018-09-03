$(document).ready(function () {
    $("#show-upload").click(function () {
        $('.focus-background').show();
        $('#upload-area').show();
        $('.focus-background').click(function(){
            $('.focus-background').hide();
            $('#upload-area').hide();
        })
    });

    $("#upload-area").on('dragover', function (event){
        event.preventDefault();
    });

    $("#upload-area").on('drop', function (event){
          event.preventDefault();
          var imageToUpload = event.originalEvent.dataTransfer.files;
          passFormData(imageToUpload);
          $('.focus-background').hide();
          $('#upload-area').hide();
          getUploadedImages();
     });
});

function passFormData (image) {
    var dataForm = new FormData();
    dataForm.append('formImage', image[0]);
    uploadFormData(dataForm);
}

function uploadFormData(dataForm) {
    $.ajax({
        url: "uploader.php",
        type: "POST",
        data: dataForm,
        contentType:false,
        cache: false,
        processData: false,
        success: function(data){
            $('#upload-area').html(data);
        }
    })
}

function getUploadedImages() {
    $('#image-table tbody tr').remove();
    $('#dirSize').remove();
    var response = '';
    $.ajax({ type: "GET",
             url: "getImages.php",
             async: false,
             success : function(text)
             {
                 response = text;
             }
    });
    var totalSize = 0;
    $.each( response, function(  ) {
        var imageRow = '<tr><th scope="row">#</th><td name="file-name">' + $(this)[0].name + '</td><td>' + $(this)[0].size + '</td><td><button type="submit" class="btn btn-primary btn-sm" name="remove-image" value="' + $(this)[0].name + '">Remove</td><td><a href="/images/' + $(this)[0].name + '" class="btn btn-success btn-sm" download>Download</td></tr>';
        totalSize = totalSize + $(this)[0].size;
        $('#image-table').append(imageRow);
    });
    totalSize = totalSize / 50000;
    var progressBar = '<h3>Storage space:</h3><div class="progress" id="dirSize"><div class="progress-bar" role="progressbar" style="width: ' + totalSize + '%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div></div>'
    $('#image-table').after(progressBar);
}
