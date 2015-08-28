<?php
/**
 * Created by PhpStorm.
 * User: gmarten
 * Date: 28/08/15
 * Time: 23:20
 */
?>
<div id="modalTextEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalTextEditLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Edit content...</h4>
            </div>
            <div class="modal-body">
                <form id="form-textedit" action="" method="post">
                    <input type="hidden" id="textedit-textid" name="textedit-textid">
                    <div name="textedit-textcontent" id="textedit-textcontent"></div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-6">
                        <span id="loadingtextedit">Saving..</span>
                        <span id="messagetextedit"></span>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-default" data-dismiss="modal">Close</a>
                        <a class="btn btn-primary" id="modalTextEditSubmit">Save changes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

