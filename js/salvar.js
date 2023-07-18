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

        console.log(x, y);
    
        let styles = {
            top: getRandomNumber(y - 144) + 'px',
            left: getRandomNumber(x - 144) + 'px'
        };

        $('.target').css(styles);

        let qtdAcertos = 0;

        $("main").on("click", "#alvo", function() {
            qtdAcertos++;
            $("#acertos").html("Acertos: " + qtdAcertos);
            console.log(qtdAcertos);
        });

        let qtdErros = 0;

        $("main").on("click", function() {
            qtdErros++;
            $("#erros").html("Erros: " + qtdErros);
            console.log(qtdErros);
        });

    });

});