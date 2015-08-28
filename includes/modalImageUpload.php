<?php
/**
 * Created by PhpStorm.
 * User: gmarten
 * Date: 28/08/15
 * Time: 23:20
 */
?>
<div id="modalImageUpload" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalImageUploadLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Upload image...</h4>
            </div>
            <div class="modal-body">
                <img src="/assets/img/placeholder.gif" class="img-responsive" id="previewing">
                <br>
                <form id="form-uploadimage" action="" method="post" enctype="multipart/form-data">
                    <div class="btn btn-default btn-file">Choose an image
                        <input type="file" name="file" id="uploadimage-file" required="">
                        <input type="hidden" name="filename" id="uploadimage-filename">
                        <input type="hidden" name="maxfilesize" value="1">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-6">
                        <span id="loadinguploadimage">Saving..</span>
                        <span id="messageuploadimage"></span>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-default" data-dismiss="modal">Close</a>
                        <a class="btn btn-primary" id="modalImageUploadSubmit">Save changes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

