<?php
if($_FILES) {
     if(is_uploaded_file($_FILES['formImage']['tmp_name'])) {
          $sourcePath = $_FILES['formImage']['tmp_name'];
          $targetPath = "images/".$_FILES['formImage']['name'];
          if(move_uploaded_file($sourcePath,$targetPath)) {
              exit();
          }
     }
}
?>
