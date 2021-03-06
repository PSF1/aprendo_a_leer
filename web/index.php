<!doctype html>
<html lang="es">
    <head><!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Gochi+Hand&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <link rel="stylesheet" href="css/theme.css">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!--        <script type="text/javascript" src="https://rawgithub.com/craftyjs/Crafty/release/dist/crafty-min.js"></script>-->
        <script type="text/javascript" src="https://rawgithub.com/craftyjs/Crafty/release/dist/crafty.js"></script>
        <script type="text/javascript" src="js/nosleep.js"></script>
        <script type="text/javascript" src="js/speech.js"></script>
        <script type="text/javascript" src="js/sprites.js"></script>
        <script type="text/javascript" src="js/npc.js"></script>
        <script type="text/javascript" src="js/heroActions.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col">
                    <button id="btnStop" class="btn btn-info" style="display: none;">Parar</button>
                    <div class="row">
                        <div class="col">
                            <span id="lblSpeechSleep" class="badge bg-success invisible">Escuchando</span>
                            <span id="lblSpeech" class="badge bg-danger invisible">Hablando</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div id="game"></div>
                </div>
            </div>
            <div class="row">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#creditDialog">
                    Creditos
                </button>
            </div>
        </div>
        <!-- Modal start -->
        <div class="modal fade" id="startDialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="startDialogLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="startDialogLabel">Saludos</h5>
<!--                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                    </div>
                    <div class="modal-body">
                        <p>Este juego pretende ayudar ense??ando a leer a los ni??@s.</p>
                        <p>Se ofrece sin ning??n tipo de garant??a, y su uso es responsabilidad exclusiva de los tutores legales del ni??@. Por lo que es recomendable que lo usen antes que el menor para asegurarse que es adecuado.</p>
                        <p>El juego requiere de navegadores modernos compatibles con Web_Speech_API, como Chrome o Edge, y no se han probado otros que puedan ser compatibles en el futuro.</p>
                        <p>Funciona mejor con auriculares o cascos con poco volumen, para no confundir al escuchar.</p>
                        <p><strong>Importante</strong>: El reconocimiento de voz puede que se procese en la nube, depender?? del navegador. Lo que significa que la voz ser?? enviada al proveedor del navegador, no encontr?? indicios de que se use para otra cosa, pero no puedo asegurarlo.</p>
                        <p>Por favor, tengalo en cuenta y cierre el juego en aquellas situaciones que crea oportuno.</p>
                        <p><strong>Pulse "Empezar" para iniciar el juego.</strong></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="startDlgBtn" class="btn btn-info">Empezar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end Modal start -->
        <!-- Modal credits -->
        <div class="modal fade" id="creditDialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Creditos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ul class="list-group">
                            <il class="list-group-item">Autor: <a href="https://www.linkedin.com/in/pedro-pelaez" rel="nofollow" target="_blank">Pedro Pelaez (PSF)</a></il>
                            <il class="list-group-item">Servidor web: <a href="https://www.equilibrioybelleza.com" rel="nofollow" target="_blank">EquilibrioYBelleza.com</a></il>
                            <il class="list-group-item">Game engine: <a href="https://CraftyJs.com" rel="nofollow" target="_blank">CraftyJs.com</a></il>
                            <il class="list-group-item">CSS: <a href="https://getbootstrap.com" rel="nofollow" target="_blank">getbootstrap.com</a></il>
                            <il class="list-group-item">Control de voz: <a href="https://developer.mozilla.org/en-US/docs/Web/API/Web_Speech_API/Using_the_Web_Speech_API" rel="nofollow" target="_blank">Web_Speech_API</a></il>
                            <il class="list-group-item">Musica: <a href="https://uppbeat.io" rel="nofollow" target="_blank">uppbeat.io</a></il>
                            <il class="list-group-item">
                                "Door, Front, Closing, A.wav" by InspectorJ (<a href="http://www.jshaw.co.uk" rel="nofollow" target="_blank">www.jshaw.co.uk</a>) of <a href="http://Freesound.org" rel="nofollow" target="_blank">Freesound.org</a>
                            </il>
                            <il class="list-group-item">
                                "snd_footsteps_grass" by (<a href="https://freesound.org/people/jevans27/" rel="nofollow" target="_blank">jevans27</a>) of <a href="http://Freesound.org" rel="nofollow" target="_blank">Freesound.org</a>
                            </il>
                            <il class="list-group-item">Gr??ficos:
                                <ul>
                                    <il><a href="https://cypor.itch.io/12x12-rpg-tileset" rel="nofollow" target="_blank">12x12 rpg tileset by Cyporkador</a><br/></il>
                                    <il><a href="https://forums.rpgmakerweb.com/index.php?threads/whtdragons-animals-and-running-horses-now-with-more-dragons.53552/" rel="nofollow" target="_blank">Animals by whtdragon</a></il>
                                    <il></il>
                                </ul>
                            </il>
                            <il class="list-group-item">Fuente cursiva: <a href="https://fonts.google.com/share?selection.family=Gochi%20Hand" rel="nofollow" target="_blank">Gochi Hand by Juan Pablo del Peral for Huerta Tipogr??fica.</a></il>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end Modal credits -->
        <script type="text/javascript" src="js/game.js"></script>
    </body>
</html>