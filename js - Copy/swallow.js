/*
* Plugin Swallow
* version: 1.2
* requires jQuery and bootstrap 4
* Copyright (c) 2020 Franck BROCHET
*/

infoPhp = [];
postfiles = [];
formData = new FormData();

$(function() {

    $.fn.swallow = function (options){

    //Config path by default
        var pat = $.extend({
            imgPath             : "img/",
            phpPath             : "php/",         
            targetPath          : "nest/"
        }, options);   

    //Search on the PHP server configuration items
        $.ajax({url:pat.phpPath + 'info.php',async:false,
            success: (s) => {infoPhp.push(JSON.parse(s));},
            error: () => {alert('require ==> info.php');return false;},
        })

    //Config options user
        var ext = $.extend({ 
            swallowTag          : false,   
            targetTag           : infoPhp[0]['tag_swallow'],            
            method              : "POST",
            enctype             : "multipart/form-data",
            acceptFiles         : "*",
            maxFileSize         : infoPhp[0]['upload_max_filesize'],
            maxFileCount        : infoPhp[0]['max_file_uploads'],
            postMaxSize         : infoPhp[0]['post_max_size'],
            maxImgQuality       : 100,
            defaultImg          : "file.png",
            labelInput1         : "Add your files",
            labelInput2         : "Number of files",
            labelName           : "Name",
            labelType           : "Type file",
            labelModified       : "Modified",
            labelSize           : "Size",
            labelSaveBtn        : "Save",
            labelDeleteBtn      : "Delete",
            labelLoadingBtn     : "Loading...",
            labelSuccess        : "File upload successful",
            labelAcceptFiles    : "Accepted formats",
            labelMaxFileSize    : "Max size accept",
            labelMaxFileCount   : "Max files accept",
            labelAllDenied      : "Denied !",
            onSuccess           : function (response, statut) {},
            onError             : function (response, statut, erreur) {}
        }, options);

        

    //Form input bootstrap 4
        $(this).append('\
        <div class="row">\
            <div class="col-12 mb-2">\
                <form method="post" enctype="'+ ext.enctype +'">\
                    <div class="alert alert-danger d-none fade show" role="alert" id="ErrUpload"></div>\
                        <div class="custom-file">\
                            <input type="file" class="custom-file-input" id="swallow" name="swallow[]" multiple>\
                            <label class="custom-file-label" for="swallow">'+ ext.labelInput1 +'</label>\
                        </div>\
                        <div class="mt-1">\
                            <button class="btn btn-block btn-success d-none" id="SaveFiles" type="button">'+ ext.labelSaveBtn +'</button>\
                            <button class="btn btn-block btn-info WaitSpinner d-none" disabled><span class="spinner-grow spinner-grow-sm"></span> '+ ext.labelLoadingBtn +'</button>\
                        </div>\
                </form>\
            </div>\
            <div class="col-12 mt-2">\
                <ul class="list-unstyled gallery"></ul>\
                <div class="toast d-none" aria-atomic="true" data-delay="2000" id="SuccUpload">\
                <div class="toast-header">\
                <img src="'+ pat.imgPath + ext.defaultImg +'" class="rounded mr-2" height="15" width="15">\
                <strong class="mr-auto">Swallow</strong>\
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">\
                  <span aria-hidden="true">&times;</span>\
                </button>\
                </div>\
                <div class="toast-body">'+ ext.labelSuccess +'</div>\
                </div>\
            </div>\
        </div>\
        ')

    //Tag file or multiple files
        $("#swallow").on("change", function(e) {

            const files = e.currentTarget.files;
            $("#ErrUpload").empty().removeClass('d-block').addClass('d-none');
            $("#SaveFiles").removeClass('d-block').addClass('d-none');

        //Defaut save formData
            $.each($(this)[0].files, function(i, file) {formData.append('swallow[]', file);});

            Object.keys(files).forEach(i => {

                const file = files[i];

            //Option type files
                if(ext.acceptFiles != "*"){
                    afAccept = false;
                    afArray = ext.acceptFiles.split(',');
                    afArray.forEach(element => {if(file.type === element){afAccept = true;}});
                        if(afAccept === false){
                            $("#ErrUpload").removeClass('d-none').addClass('d-block')
                            $("#ErrUpload").html(ext.labelAcceptFiles + ' : <b>' + ext.acceptFiles + ' :</b> <span class="text-danger">'+ file.name+ ' </span><b>'+ ext.labelAllDenied +'</b>');                        
                        }
                }else{afAccept = true;}

            //Option max size
                if(parseInt(ext.maxFileSize) > parseInt(file.size)){mfsAccept = true;}else{
                    $("#ErrUpload").removeClass('d-none').addClass('d-block')
                    $("#ErrUpload").html(ext.labelMaxFileSize + ' : <b>' + Math.round((ext.maxFileSize / 1000000)*100)/100 + 'Mo :</b> <span class="text-danger">'+ file.name+ ' </span><b>'+ ext.labelAllDenied +'</b>');                    
                    mfsAccept = false;
                }

            //Option max files
                if(parseInt(postfiles.length) < parseInt(ext.maxFileCount)){mfcAccept = true;}else{
                    $("#ErrUpload").removeClass('d-none').addClass('d-block')
                    $("#ErrUpload").html(ext.labelMaxFileCount + ' : <b>' + ext.maxFileCount);                    
                    mfcAccept = false;
                }

                var doublon = Object.keys(postfiles).some(function(k) {return postfiles[k] === file.name;});

                if(doublon === false && afAccept === true && mfsAccept === true && mfcAccept === true){
                    
                    postfiles.push(file.name);

                    const reader = new FileReader();
                    
                    reader.onload = (e) => {

                        var $LastModified = new Date(file.lastModified).toISOString().split('T')[0]
                        var ReaderResultat= pat.imgPath + ext.defaultImg;                        
                        Object.keys($mimeType).forEach(m => {
                            if($mimeType[m].type === file.type){
                                switch ($mimeType[m].source) {
                                    case 'img'          :ReaderResultat = reader.result;break;
                                    case 'no-img' :ReaderResultat;break;
                                    default          :ReaderResultat = pat.imgPath + $mimeType[m].source;
                                }
                            }
                        })
              
                        $(".gallery").append('\
                            <li class="border border-right-0 border-top-0 border-success shadow py-1 mb-1" style="border-width:3px !important;">\
                                <img src="'+ ReaderResultat +'" class="rounded p-2" height="100" width="100">\
                                <div class="p-2">\
                                <h6 class="text-break">'+ ext.labelName +': '+ file.name+'</h6>\
                                <h6 class="text-break">'+ ext.labelType +': '+ file.type +'</h6>\
                                <h6 class="text-break">'+ ext.labelModified +': '+ new Date(file.lastModified).toISOString().split('T')[0] +'</h6>\
                                <h6 class="text-break">'+ ext.labelSize +': '+ Math.round((file.size / 1000000)*100)/100 +' Mo</h6>\
                                <button data-id="'+ file.name +'" class="btn btn-danger Erase">'+ ext.labelDeleteBtn +'</button>\
                                </div>\
                            </li>\
                        ')

                    }
                        
                    reader.readAsDataURL(file);
                }
                
            })

            if(postfiles.length === 0){
                $("#SaveFiles").removeClass('d-block').addClass('d-none');
                $(".custom-file-label").html(ext.labelInput1);
            }else{
                $("#SaveFiles").removeClass('d-none').addClass('d-block');
                $(".custom-file-label").html(ext.labelInput2 + ': ' + postfiles.length);
            }

        });
        
    //Delete File
        $("div ul").on("click", ".Erase", function(){

            DataId = $(this).attr('data-id');
            tmp_postfiles = [];

            Object.keys(postfiles).forEach(i => {
                if(DataId != postfiles[i]){tmp_postfiles.push(postfiles[i]);}
            })

            postfiles = tmp_postfiles;

            $(this).parent().parent().remove();

            if(postfiles.length === 0){
                $("#SaveFiles").removeClass('d-block').addClass('d-none');
                $("#ErrUpload").removeClass('d-block').addClass('d-none');
                $(".custom-file-label").html(ext.labelInput1);
            }else{
                $("#SaveFiles").removeClass('d-none').addClass('d-block');
                $(".custom-file-label").html(ext.labelInput2 + ': ' + postfiles.length);
            }

        });

    //Upload files
        $("#SaveFiles").on("click", function(){

            formData.append('userFile',postfiles);
            formData.append('target',pat.targetPath);
            if(ext.swallowTag === true){formData.append('targetTag',ext.targetTag + '/');}
            formData.append('maxImgQuality',ext.maxImgQuality);

            $("#SaveFiles").removeClass('d-block').addClass('d-none');
            $("#ErrUpload").removeClass('d-block').addClass('d-none');
            $(".Erase").prop("disabled", true );
            $(".WaitSpinner").removeClass('d-none').addClass('d-block');            
            
            $.ajax({
                    url: pat.phpPath + 'upload.php',
                    type: ext.method,                    
                    cache: false,
                    contentType: false,
                    processData: false,
                    data : formData,
                    success: function(response,statut){

                        ext.onSuccess.call(this, response, statut);

                        $(".gallery").empty();
                        $(".Erase").prop( "disabled", false );                       
                        $(".WaitSpinner").removeClass('d-block').addClass('d-none'); 
                        $(".custom-file-label").html(ext.labelInput1);
                        $("#SuccUpload").removeClass('d-none').addClass('d-block');
                        $('#SuccUpload').toast('show');    
                        $('#SuccUpload').on('hidden.bs.toast', function () {
                            $('#SuccUpload').removeClass('d-block').addClass('d-none');
                          })               
                        postfiles = [];

                    },
                    error: function(response, statut, erreur){

                        $(".WaitSpinner").removeClass('d-block').addClass('d-none'); 
                        ext.onError.call(this, response, statut, erreur);

                    }
            })
        });

    }
})


$mimeType = [      
    {'name':'AAC audio','type':'audio/aac','extention':'.aac','source':'no-img'},
    {'name':'AbiWord document','type':'application/x-abiword','extention':'.abw','source':'no-img'},
    {'name':'Archive document (multiple files embedded)','type':'application/x-freearc','extention':'.arc','source':'no-img'},
    {'name':'AVI: Audio Video Interleave','type':'video/x-msvideo','extention':'.avi','source':'avi.png'},
    {'name':'Amazon Kindle eBook format','type':'application/vnd.amazon.ebook','extention':'.azw','source':'no-img'},
    {'name':'Any kind of binary data','type':'application/octet-stream','extention':'.bin','source':'no-img'},
    {'name':'Windows OS/2 Bitmap Graphics','type':'image/bmp','extention':'.bmp','source':'img'},
    {'name':'BZip archive','type':'application/x-bzip','extention':'.bz','source':'no-img'},
    {'name':'BZip2 archive','type':'application/x-bzip2','extention':'.bz2','source':'no-img'},
    {'name':'C-Shell script','type':'application/x-csh','extention':'.csh','source':'no-img'},
    {'name':'Cascading Style Sheets (CSS)','type':'text/css','extention':'.css','source':'no-img'},
    {'name':'Comma-separated values (CSV)','type':'text/csv','extention':'.csv','source':'csv.png'},
    {'name':'Microsoft Word','type':'application/msword','extention':'.doc','source':'word.png'},
    {'name':'Microsoft Word (OpenXML)','type':'application/vnd.openxmlformats-officedocument.wordprocessingml.document','extention':'.docx','source':'word.png'},
    {'name':'MS Embedded OpenType fonts','type':'application/vnd.ms-fontobject','extention':'.eot','source':'no-img'},
    {'name':'Electronic publication (EPUB)','type':'application/epub+zip','extention':'.epub','source':'no-img'},
    {'name':'GZip Compressed Archive','type':'application/gzip','extention':'.gz','source':'no-img'},
    {'name':'Graphics Interchange Format (GIF)','type':'image/gif','extention':'.gif','source':'img'},
    {'name':'HyperText Markup Language (HTML)','type':'text/html','extention':'.htm','source':'no-img'},
    {'name':'HyperText Markup Language (HTML)','type':'text/html','extention':'.html','source':'no-img'},
    {'name':'Icon format','type':'image/vnd.microsoft.icon','extention':'.ico','source':'img'},
    {'name':'iCalendar format','type':'text/calendar','extention':'.ics','source':'no-img'},
    {'name':'Java Archive (JAR)','type':'application/java-archive','extention':'.jar','source':'no-img'},
    {'name':'JPEG images','type':'image/jpeg','extention':'.jpeg','source':'img'},
    {'name':'JPEG images','type':'image/jpeg','extention':'.jpg','source':'img'},
    {'name':'JavaScript','type':'text/javascript','extention':'.js','source':'no-img'},
    {'name':'JSON format','type':'application/json','extention':'.json','source':'no-img'},
    {'name':'JSON-LD format','type':'application/ld+json','extention':'.jsonld','source':'no-img'},
    {'name':'Musical Instrument Digital Interface (MIDI)','type':'audio/midi audio/x-midi','extention':'.mid','source':'no-img'},
    {'name':'Musical Instrument Digital Interface (MIDI)','type':'audio/midi audio/x-midi','extention':'.midi','source':'no-img'},
    {'name':'JavaScript module','type':'text/javascript','extention':'.mjs','source':'no-img'},
    {'name':'MP3 audio','type':'audio/mpeg','extention':'.mp3','source':'no-img'},
    {'name':'MPEG Video','type':'video/mpeg','extention':'.mpeg','source':'no-img'},
    {'name':'Apple Installer Package','type':'application/vnd.apple.installer+xml','extention':'.mpkg','source':'no-img'},
    {'name':'OpenDocument presentation document','type':'application/vnd.oasis.opendocument.presentation','extention':'.odp','source':'odp.png'},
    {'name':'OpenDocument spreadsheet document','type':'application/vnd.oasis.opendocument.spreadsheet','extention':'.ods','source':'ods.png'},
    {'name':'OpenDocument text document','type':'application/vnd.oasis.opendocument.text','extention':'.odt','source':'odt.png'},
    {'name':'OGG audio','type':'audio/ogg','extention':'.oga','source':'no-img'},
    {'name':'OGG video','type':'video/ogg','extention':'.ogv','source':'no-img'},
    {'name':'OGG','type':'application/ogg','extention':'.ogx','source':'no-img'},
    {'name':'Opus audio','type':'audio/opus','extention':'.opus','source':'no-img'},
    {'name':'OpenType font','type':'font/otf','extention':'.otf','source':'no-img'},
    {'name':'Portable Network Graphics','type':'image/png','extention':'.png','source':'img'},
    {'name':'Adobe Portable Document Format (PDF)','type':'application/pdf','extention':'.pdf','source':'pdf.png'},
    {'name':'Hypertext Preprocessor (Personal Home Page)','type':'application/x-httpd-php','extention':'.php','source':'php.png'},
    {'name':'Microsoft PowerPoint','type':'application/vnd.ms-powerpoint','extention':'.ppt','source':'ppt.png'},
    {'name':'Microsoft PowerPoint (OpenXML)','type':'application/vnd.openxmlformats-officedocument.presentationml.presentation','extention':'.pptx','source':'ppt.png'},
    {'name':'RAR archive','type':'application/vnd.rar','extention':'.rar','source':'no-img'},
    {'name':'Rich Text Format (RTF)','type':'application/rtf','extention':'.rtf','source':'no-img'},
    {'name':'Bourne shell script','type':'application/x-sh','extention':'.sh','source':'no-img'},
    {'name':'Scalable Vector Graphics (SVG)','type':'image/svg+xml','extention':'.svg','source':'img'},
    {'name':'Small web format (SWF) or Adobe Flash document','type':'application/x-shockwave-flash','extention':'.swf','source':'no-img'},
    {'name':'Tape Archive (TAR)','type':'application/x-tar','extention':'.tar','source':'no-img'},
    {'name':'Tagged Image File Format (TIFF)','type':'image/tiff','extention':'.tif','source':'img'},
    {'name':'Tagged Image File Format (TIFF)','type':'image/tiff','extention':'.tiff','source':'img'},
    {'name':'MPEG transport stream','type':'video/mp2t','extention':'.ts','source':'no-img'},
    {'name':'TrueType Font','type':'font/ttf','extention':'.ttf','source':'no-img'},
    {'name':'Text, (generally ASCII or ISO 8859-n)','type':'text/plain','extention':'.txt','source':'no-img'},
    {'name':'Microsoft Visio','type':'application/vnd.visio','extention':'.vsd','source':'no-img'},
    {'name':'Waveform Audio Format','type':'audio/wav','extention':'.wav','source':'no-img'},
    {'name':'WEBM audio','type':'audio/webm','extention':'.weba','source':'no-img'},
    {'name':'WEBM video','type':'video/webm','extention':'.webm','source':'no-img'},
    {'name':'WEBP image','type':'image/webp','extention':'.webp','source':'img'},
    {'name':'Web Open Font Format (WOFF)','type':'font/woff','extention':'.woff','source':'no-img'},
    {'name':'Web Open Font Format (WOFF)','type':'font/woff2','extention':'.woff2','source':'no-img'},
    {'name':'XHTML','type':'application/xhtml+xml','extention':'.xhtml','source':'no-img'},
    {'name':'Microsoft Excel','type':'application/vnd.ms-excel','extention':'.xls','source':'excel.png'},
    {'name':'Microsoft Excel (OpenXML)','type':'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet','extention':'.xlsx','source':'excel.png'},
    {'name':'XML','type':'application/xml','extention':'.xml','source':'xml.png'},
    {'name':'XML','type':'text/xml','extention':'.xml','source':'xml.png'},
    {'name':'XUL','type':'application/vnd.mozilla.xul+xml','extention':'.xul','source':'xml.png'},
    {'name':'ZIP archive','type':'application/zip','extention':'.zip','source':'zip.png'},
    {'name':'3GPP audio/video container','type':'video/3gpp','extention':'.3gp','source':'no-img'},
    {'name':'3GPP audio/video container','type':'audio/3gpp','extention':'.3gp','source':'no-img'},
    {'name':'3GPP2 audio/video container','type':'video/3gpp2','extention':'.3g2','source':'no-img'},
    {'name':'3GPP2 audio/video container','type':'audio/3gpp2','extention':'.3g2','source':'no-img'},
    {'name':'7-zip archive','type':'application/x-7z-compressed','extention':'.7z','source':'no-img'}
]