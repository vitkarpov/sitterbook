// http://picturecut.tuyoshi.com.br/docs/

$("#cropContainerOutput").PictureCut({
    InputOfImageDirectory       : "image",
    PluginFolderOnServer        : "/js/vendor/",
    ActionToSubmitUpload        : "/act/jquery.picture.cut.upload.php",
    ActionToSubmitCrop          : "/act/jquery.picture.cut.crop.php",
    FolderOnServer              : "/images/picture.cut.temp/",
    EnableCrop                  : true,
    CropWindowStyle             : "jQueryUI"
});