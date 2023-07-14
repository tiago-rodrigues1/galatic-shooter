let campo = $("#nome");

  $('#nome[type=text]').on('input', function() {
    if ($(this).val() !== '0') {
        $('#play').removeAttr("disabled");
    }
    else {
        $('#play').attr('disabled', 'disabled');
    }
});

