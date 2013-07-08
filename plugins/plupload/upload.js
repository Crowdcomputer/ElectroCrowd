$(function() {
    var uploader = new plupload.Uploader({
        runtimes : 'gears,html5,flash,silverlight,browserplus',
        browse_button : 'pickfiles',
        container : 'container',
        max_file_size : '10mb',
        url : ajax_path+'&function=upload',
        flash_swf_url : 'plugins/plupload/js/plupload.flash.swf',
        silverlight_xap_url : 'plugins/plupload/js/plupload.silverlight.xap',
        filters : [
        {
            title : "Image files", 
            extensions : "jpg,gif,jpeg,png"
        },
        ],
        resize : {
            width : 400, 
            height : 200, 
            quality : 80
        }
    });
    uploader.bind('Init', function(up, params) {
        $('#filelist').html("<div>Current runtime: " + params.runtime + "</div>");
    });
    $('#uploadfiles').click(function(e) {
        uploader.start();
        e.preventDefault();
    });
    uploader.init();
    uploader.bind('FilesAdded', function(up, files) {
       
        $.each(files, function(i, file) {
            $('#filelist').append(
                '<div id="' + file.id + '">' +
                file.name + ' (' + plupload.formatSize(file.size) + ') <b></b>' +
                '</div>');
        });
        up.refresh(); // Reposition Flash/Silverlight
    });
    uploader.bind('UploadProgress', function(up, file) {
        $('#' + file.id + " b").html(file.percent + "%");
    });
    uploader.bind('Error', function(up, err) {
        $('#filelist').append("<div>Error: " + err.code +
            ", Message: " + err.message +
            (err.file ? ", File: " + err.file.name : "") +
            "</div>"
            );
        up.refresh(); // Reposition Flash/Silverlight
    });
    uploader.bind('FileUploaded', function(up, file, info) {
        //console.log(info.response);
        var json = jQuery.parseJSON(info.response);
        var resource = new Object();
        resource.id = json.id;
        resources.push(resource);
        $('#' + file.id + " b").html("100%");
        //console.log(resources);
    });
});

