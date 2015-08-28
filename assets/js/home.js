/**
 * Created by gmarten on 30/04/15.
 */
$(document).ready(function (e) {

    // initializing
    $('#loadinguploadimage').hide();
    $('#loadingtextedit').hide();

    // script that corrects background image fixed when mobile device
    var hgt = $(window).height();
    $("#main").css("height", hgt);

    // EVENTS //
    // Resets all form values
    $('#modalImageUpload').on('hidden.bs.modal', function () {
        $("#messageuploadimage").empty();
        $("form").each(function(){
            this.reset();
        });
        $("#previewing").attr("src", "/assets/img/placeholder.gif");
    });

    $('#modalTextEdit').on('hidden.bs.modal', function () {
        var name;
        $("#messagetextedit").empty();
        for(name in CKEDITOR.instances)
        {
            CKEDITOR.instances[name].destroy()
        }
    })

    // Functions to submit the image upload
    $("#modalImageUploadSubmit").on('click',(function(e) {
        var formdata = new FormData($('form')[0]);
        e.preventDefault();
        $("#messageuploadimage").empty();
        $('#loadinguploadimage').show();
        $.ajax({
            url: "/ajax-handlers/upload-image.php",     // Url to which the request is send
            type: "POST",                               // Type of request to be send, called as method
            data: formdata,                             // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,                         // The content type used when sending data to the server.
            cache: false,                               // To unable request pages to be cached
            processData:false,                          // To send DOMDocument or non processed data file it is set to false
            success: function(data)                     // A function to be called if request succeeds
            {
                $("#loadinguploadimage").hide();
                if (data == "success"){
                    //noinspection JSUnresolvedFunction
                    $("#"+ $("#uploadimage-filename").val()).attr("src", $("#"+ $("#uploadimage-filename").val()).attr("src") + "?" + Math.random());
                    $('#modalImageUpload').modal('toggle');
                }
                else{
                    $("#messageuploadimage").html(data);
                }
            }
        });
    }));

    // Functions to submit the text edit
    $("#modalTextEditSubmit").on('click',(function(e) {
        //config
        e.preventDefault();
        $("#messagetextedit").empty();
        $('#loadingtextedit').show();

        // POST DATA
        // tagname
        var formdata = new FormData($('form')[1]);

        // paragraph
        // retrieve the data from the ckeditor instance
        for(var i in CKEDITOR.instances) {
            // write the data to the website div
            var vEditorData = CKEDITOR.instances[i].getData();
        }
        formdata.append("textedit-textcontent", vEditorData);

        //locale
        //formdata.append("language", locale);

        //website


        $.ajax({
            url: "/ajax-handlers/text-edit.php",        // Url to which the request is send
            type: "POST",                               // Type of request to be send, called as method
            data: formdata,                             // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,                         // The content type used when sending data to the server.
            cache: false,                               // To unable request pages to be cached
            processData:false,                          // To send DOMDocument or non processed data file it is set to false
            success: function(data)                     // A function to be called if request succeeds
            {
                $('#loadingtextedit').hide();
                if (data == "success") {
                    // write the data to the website div
                    $("#" + $("#textedit-textid").val()).html(vEditorData);//.replace(/\r?\n/g, '<br/>'));
                    $('#modalTextEdit').modal('toggle');
                }
                else{
                    $("#messagetextedit").html(data);
                }
            }
        });
    }));

    // Function to preview image after validation
    $(function() {
        $("#uploadimage-file").change(function() {
            $("#messageuploadimage").empty(); // To remove the previous error message
            var file = this.files[0];
            var imagefile = file.type;
            var match= ["image/jpeg","image/png","image/jpg","image/gif"];
            if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
            {
                $("#messageuploadimage").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
                return false;
            }
            else
            {
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
    function imageIsLoaded(e) {
        $("#file").css("color","green");
        $('#image_preview').css("display", "block");
        $('#previewing').attr('src', e.target.result);
        $('#previewing').attr('width', '250px');
        $('#previewing').attr('height', '230px');
    };

    // Function to add a label with the filename upon selecting a file
    $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
    });
    $(document).on("click", ".imageUploadFilename", function () {
        var imageID = $(this).data('id');
        $("#uploadimage-filename").val(imageID);
        //noinspection JSUnresolvedFunction
        $("#modalImageUpload").modal('toggle');
    });
    $(document).on("click", ".textEditUpdate", function () {
        var textID = $(this).data('id');
        $("#textedit-textid").val('content_' + textID);
        CKEDITOR.appendTo( 'textedit-textcontent', {height:330}, $("#content_"+ textID).html().replace(/<br>/g,'\r\n'));
        $("#modalTextEdit").modal('toggle');
    });
});