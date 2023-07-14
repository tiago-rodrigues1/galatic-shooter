

$(document).ready(function() {
    let nomeJogador = "";
    let campo = $("#nome");
    let comecarBtn = $('#play');

    $(campo).on('input', function() {
        if ($(this).val() !== '0') {
            $(comecarBtn).removeAttr("disabled");
        }
        else {
            $(comecarBtn).attr('disabled');
        }

        nomeJogador = $(this).val();
    });

    $(comecarBtn).click(function() {
        window.location.href = `galatic.html?nome=${nomeJogador}`;
    });
    
    $('#player').ready(function() {
        let urlParams = window.location.search;

        if (urlParams) {
            let urlParamsJogador = urlParams.split('=')[1];
            $('#player').html(urlParamsJogador);
        }
    });


});