// Slider Rules
Dropzone.options.sliderDropzone = { // camelized version of the `id`
    paramName: "file", // The name that will be used to transfer the file
    maxFilesize: 0.12, // MB =>100KB
    parallelUploads: 2,
    addRemoveLinks: true,
    acceptedFiles: '.jpg, .png',
    clickable: true,


    init: function() {
        this.on('complete', function(file) {
            // call livewire slider function to fill the images section after save file
            window.livewire.emit('ReloadItems');
            this.removeFile(file);
        });

        this.on("addedfile", file => {
            window.livewire.emit('ReloadItems');
        });

    },


};


// About Us Rules
Dropzone.options.aboutusDropzone = { // camelized version of the `id`
    paramName: "file", // The name that will be used to transfer the file
    maxFilesize: 6, // MB
    parallelUploads: 1,
    addRemoveLinks: true,
    acceptedFiles: '.jpg, .mp4',
    clickable: true,


    init: function() {
        this.on('complete', function(file) {
            this.removeFile(file);
            // call livewire slider mount to fill the images section after save file
            window.livewire.emit('ReloadItems');
        });

        // this.on("addedfile", file => {
        //     window.livewire.emit('ReloadItems');
        // });

    },


};


// Events Rules
Dropzone.options.eventsDropzone = { // camelized version of the `id`
    paramName: "file", // The name that will be used to transfer the file
    maxFilesize: 0.095, // MB => 90KB
    parallelUploads: 2,
    addRemoveLinks: true,
    acceptedFiles: '.jpg, .png',
    clickable: true,

    removedfile: function(file) {
        var fileName = file.name;
        $.ajax({
            type: 'get',
            url: '/dashboard/Events/tmp/' + fileName + '/delete',
        });

        var _ref;
        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
    }


};




// Ptypes Rules
Dropzone.options.ptypesDropzone = { // camelized version of the `id`
    paramName: "file", // The name that will be used to transfer the file
    maxFilesize: 0.095, // MB => 90KB
    parallelUploads: 1,
    maxFiles: 1,
    addRemoveLinks: true,
    acceptedFiles: '.jpg, .png',
    clickable: true,

    removedfile: function(file) {
        var fileName = file.name;
        $.ajax({
            type: 'get',
            url: '/dashboard/Ptypes/tmp/' + fileName + '/delete',
        });

        var _ref;
        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
    }
};




// Products Rules
Dropzone.options.productsDropzone = { // camelized version of the `id`
    paramName: "file", // The name that will be used to transfer the file
    maxFilesize: 0.095, // MB => 90KB
    parallelUploads: 1,
    maxFiles: 2,
    addRemoveLinks: true,
    acceptedFiles: '.jpg, .png',
    clickable: true,

    removedfile: function(file) {
        var fileName = file.name;
        $.ajax({
            type: 'get',
            url: '/dashboard/Product/tmp/' + fileName + '/delete',
        });

        var _ref;
        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
    }
};




// Gallery Rules
Dropzone.options.galleryDropzone = { // camelized version of the `id`
    paramName: "file", // The name that will be used to transfer the file
    maxFilesize: 0.095, // MB => 90KB
    parallelUploads: 1,
    // maxFiles: 2,
    addRemoveLinks: true,
    acceptedFiles: '.jpg, .png',
    clickable: true,

    removedfile: function(file) {
        var fileName = file.name;
        $.ajax({
            type: 'get',
            url: '/dashboard/gallery/tmp/' + fileName + '/delete',
        });

        var _ref;
        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
    }
};