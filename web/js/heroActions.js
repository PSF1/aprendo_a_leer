// Game chars.
let vocalsLowercase = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];
let vocalsUppercase = ['A', 'E', 'I', 'O', 'U', 'A', 'E', 'I', 'O', 'U'];
let consonantsLowercase = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'ñ', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'q', 'y', 'z'];
let consonantsUppercase = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'Ñ', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'Q', 'Y', 'Z'];
let level1 = vocalsLowercase.concat(vocalsUppercase).concat(consonantsLowercase).concat(consonantsUppercase);
// Char alternative name.
let level1Labels = {'y': 'Y griega'};

// Main NPC control.
let heroActions = [
    // Enter.
    {cmd: 'sound', sound: 'closeDoor'},
    {cmd: 'seedown'},
    {cmd: 'show'},
    {cmd: 'sleep', ms: 1000},
    {cmd: 'toy', y: 225},
    {cmd: 'tox', x: 500},
    {cmd: 'toy', y: 100},
    {cmd: 'seedown'},
    {cmd: 'speak', msg:'Hola, me llamo Micro'},
    {cmd: 'speak', msg:'No te veo bien desde aquí, '},

    // Ask gender.
    {
        cmd: 'ask',
        msg:'¿Qué eres?. ¿Un niño, o una niña?',
        help: 'Por favor, di solo niño o niña.',
        options: {
            'niño': function (npc) {
                npc.userIsMale = true;
            },
            'niña': function (npc) {
                npc.userIsMale = false;
            },
        }
    },

    // Tutorial.
    {
        cmd: 'ask',
        msg:'¿Te enseño a jugar?',
        help: 'Responde sí o no para que te entienda.',
        options: {
            'si': function (npc) {
                npc.goto('con_tuto');
            },
            'no': function (npc) {
                npc.goto('after_tuto');
            },
        }
    },

    // With tutorial.
    {cmd: 'speak', ref:'con_tuto', msg:'Soy un simple autómata, no puedo escucharte mientras hablo, y a veces no entiendo bien lo que dices.'},
    {cmd: 'speak', msg:'Podré escucharte cuando veas un cuadrado verde sobre mi casa, mientras hablo es rojo.'},
    {cmd: 'speak', msg:'no se lo digas a nadie, pero estoy un poco sordo. Dime las cosas alto y lo más claro que puedas.'},
    {cmd: 'speak', msg:'Es facil, ¡ya veras!.'},
    {cmd: 'speak', msg:'Cuando estés jugando, para decir una letra tienes que decir "Letra " y luego la letra.'},
    {cmd: 'speak', msg:'por ejemplo, si te pregunto por la A, tu dirias "Letra Á".'},
    {cmd: 'speak', msg:'Prueba tu ahora, '},
    {
        cmd: 'ask',
        msg:'dí "Letra Á".',
        help: 'Dilo alto y claro, haz una pequeña pausa despues de decir letra, prueba de nuevo.',
        options: {
            'letra a': function (npc) {
                npc.goto('end_tuto_'+(npc.userIsMale ? 'male' : 'female'));
            },
        }
    },
    {cmd: 'speak', ref: 'end_tuto_male', msg:'Muy bien!, ya lo tienes. Eres un campeon...'},
    {cmd: 'goto', label: 'after_tuto'},

    {cmd: 'speak', ref: 'end_tuto_female', msg:'Muy bien!, ya lo tienes. Eres una campeona...'},
    {cmd: 'sleep', ref: 'after_tuto', ms: 1},

    // Play the game.
    {cmd: 'gamechar', ref:'after_tuto', options: level1, labels: level1Labels, help: 'La letra es la que está delante de mi. Recuerda decir Letra antes, prueba de nuevo.'},

    {cmd: 'sleep', ref:'end_game'},
];

// Alternative messages.
let alternativeMessages = {
    '¿Qué letra estoy mostrando?': [
        '¿Qué letra estoy mostrando?',
        '¿Qué letra es esta?',
        '¿Y esta?',
        '¿Y esta otra?',
        '¿Te sabes esta?',
    ],
    'Muy bien !!.': [
        'Muy bien !!.',
        'Perfecto!.',
        'Que máquina.',
        'Ideal.',
        'Que buena memoria.',
    ],
    'Casi aciertas, pero no.': [
        'Casi aciertas, pero no.',
        'Eso no parece correcto.',
        'Un fallo lo tiene cualquiera.',
        'No es esa.',
        'No es correcto.',
    ]
};
// This array is used to always get the key the first time it's used.
let alternativeMessagesFirst = {};
