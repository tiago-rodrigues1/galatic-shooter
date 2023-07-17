let qtdTentativas = 0;

$("#container").click(function() {
    qtdTentativas++;
    $("#tentativas").html("Tentativas: " + qtdTentativas);
    console.log(qtdTentativas);
});