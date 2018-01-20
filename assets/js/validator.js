$(".toValidate").parsley({
    errorClass: 'is-invalid',
    successClass: 'is-valid',
    classHandler: function(ParsleyField) {
        return ParsleyField.$element.parents('.form-control');
    },
    errorsContainer: function(ParsleyField) {
        return ParsleyField.$element.parents('.form-group');
    },
    errorsWrapper: '<div class="invalid-feedback"></div>',
    errorTemplate: '<span></span>'
  });