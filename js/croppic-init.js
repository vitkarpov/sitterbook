var croppicContainerOutputOptions = {
      uploadUrl: 'act/img_save_to_file.php',
      cropUrl: 'act/img_crop_to_file.php',
      outputUrlId: 'cropOutput',
      modal: false,
      doubleZoomControls: false,
      rotateControls: false,
      loaderHtml: '<div class="loader bubblingG">' +
                    '<span id="bubblingG_1"></span>' +
                    '<span id="bubblingG_2"></span>' +
                    '<span id="bubblingG_3"></span>' +
                  '</div>'
    },

    cropContaineroutput = new Croppic(
      'cropContainerOutput',
      croppicContainerOutputOptions
    );