<!DOCTYPE html>
<html lang="en">
<?php
require_once("models/Partida.php");
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galactic Shooter</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/globals.css">
    <script src="js/jquery-3.7.0.min.js.js"></script>
    <script src="js/script.js" defer></script>

</head>
<body class="w-100 h-100 d-flex flex-column justify-content-between">
    
    <main class="flex-fill w-100 h-100 d-flex align-items-center vstack justify-content-center">
        <h1 class="w-100 m-0 p-4 fw-bold rounded-top text-center title-font txt-white">Game Over</h1>   
        <div class="bc-opaco d-flex flex-column card col-10 col-md-6 col-xl-4 rounded">
            <p class="w-100 m-0 p-4 fw-bold bc-yellow rounded-top title-font text-center txt-black">Ranking</p>
            <div class="vstack p-4">
                <table class="txt-white">
                    <tr>
                        <th>Ranking</th>
                        <th>Nome</th>
                        <th>Acertos</th>
                        <th>Erros</th>
                        <th>Data</th>
                    </tr>
                    <?php
                    
                    $partidas = Partida::listar();
                    $i = 1;

                    foreach($partidas as $p):
                    ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $p->jogador; ?></td>
                        <td><?= $p->acertos; ?></td>
                        <td><?= $p->erros; ?></td>
                        <td><?= $p->data_hora; ?></td>
                    </tr>
                    <?php
                    endforeach;
               
                    ?>
                </table>
            </div>
            
            <button id="replay" type="button" class="mt-5 btn p-4 bc-yellow title-font border-0 txt-black rounded-bottom" >Jogar Novamente</button>
        </div>
    </main>


    <footer class="p-3 bc-opaco txt-white d-flex justify-content-evenly hstack align-items-center" style="font-size: 14px;">
        <p class="m-0 text-center"> 
            <b>Atividade</b> <br>
            <b>Disciplina: </b> Programação Para Internet<br>
            <b>Professor: </b> Marcelo Figueiredo Barbosa Júnior <br>
            IFRN - Campus Santa Cruz
        </p>
        <p class="m-0 text-center">Todos os direitos reservados ©</p>
        <p class="m-0 text-center">
            <b>Desenvolvido por</b><br>
            Jamilly Emilly da Silva Campelo<br>
            Natálya Gabrielle Nunes de Azevedo<br>
            Tiago Rodrigues dos Santos
        </p>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>