<?php
function upload_image($image_name, $action_type){
?>
    <form id="upload_image_form" action="../actions/action_upload_image_<?=$action_type?>.php" method="post" enctype="multipart/form-data"> 
        <input type="file" name="fileToUpload" value="../images/<?=$image_name?>" id="fileToUpload"/>
        <input type="submit" value="Upload Image"/> 
    </form>
<?php
}
?>
