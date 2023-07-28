function getRandomNumber(max) {
    return Math.floor(Math.random() * max) + 1;
}

function setTargetPosition() {
    $('#alvo').attr('src', 'assets/images/alvo.png');

    let x = $('.game-container').innerWidth();
    let y = $('.game-container').innerHeight();
    
    let styles = {
        top: getRandomNumber(y - 144) + 'px',
        left: getRandomNumber(x - 144) + 'px'
    };

    $('.target').css(styles);
}

let tentativas = 0, acertos = 0, erros = 0;

function handleTentativas() {
    tentativas++;
    $('#tentativas').html('Tentativas: ' + tentativas); 
}

function handleErros() {
    erros++;
    $('#erros').html('Erros: ' + erros + "/5");

    if (erros >= 5) {
        window.location.href = 'gameOver.html';
    }
}

function handleAcertos() {
    $('#alvo').attr('src', 'assets/images/alvo-acertado.png');

    acertos++;
    $('#acertos').html('Acertos: ' + acertos);

    setTimeout(function() {
        setTargetPosition();
    }, 300);
}

let interval; 
function handleTemporizador() {
    const tempoTotal = 5;
    let segundosRestantes = tempoTotal;
    
    if (interval) {
        clearInterval(interval);
    }

    interval = setInterval(function() {
        $('#tempo_bar').width(`${(segundosRestantes / tempoTotal) * 100}%`);
        if (segundosRestantes > 0) {
            segundosRestantes -= 1;
        } else {
            clearInterval(interval);
            handleTentativas();
            handleErros();
            handleTemporizador();
        }
    }, 1000);
}

$(document).ready(function() {
    let nomeJogador = "";
    let campo = $("#nome");
    let comecarBtn = $('#play');
    let jogarNovamente = $("#replay");

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

    $(jogarNovamente).click(function(){
        window.location.href = `index.html`;
    });
    
    $('#player').ready(function() {
        let urlParams = window.location.search;

        if (urlParams) {
            let urlParamsJogador = urlParams.split('=')[1];
            $('#player').html(urlParamsJogador);
        }
    });

    $('.game-container').ready(function() {
        $('.game-container').html('<img id="alvo" src="assets/images/alvo.png" class="target">');

        $('#explosao').hide();

        setTargetPosition();

        handleTemporizador();

        $('.game-container').on('click', function(event) {
            handleTentativas();
            
            if (event.target.id == 'alvo') {
                handleAcertos();
                handleTemporizador();
            } else if (event.target.id == 'game-container') {
                handleErros();
            }
        });

    });

});