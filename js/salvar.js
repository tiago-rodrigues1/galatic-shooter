function getRandomNumber(max) {
    return Math.floor(Math.random() * max) + 1;
}


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

    $('.game-container').ready(function() {
        $('.game-container').html(`<img id="alvo" src='assets/images/alvo.png' class='target'>`);

        let x = $('.game-container').innerWidth();
        let y = $('.game-container').innerHeight();
    
        let styles = {
            top: getRandomNumber(y - 144) + 'px',
            left: getRandomNumber(x - 144) + 'px'
        };

        $('.target').css(styles);

        let tentativas = 0, acertos = 0, erros = 0;

        $('.game-container').on('click', function(event) {
            tentativas++;
            $('#tentativas').html('Tentativas: ' + tentativas);
            
            if (event.target.id == 'alvo') {
                acertos++;
                $('#acertos').html('Acertos: ' + acertos);
            } else if (event.target.id == 'game-container') {
                erros++;
                $('#erros').html('Erros: ' + erros);
            }
        });

    });

});