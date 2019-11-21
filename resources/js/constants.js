module.exports = Object.freeze({
    PLAYER_RADIUS: 18,
    PLAYER_MAX_HP: 100,
    PLAYER_SPEED: 150,
    PLAYER_SWITCHES: 3,
    PLAYER_TELEPORTS: 1,
    PLAYER_PUSH_PLAYERS: 1,
    PLAYER_SKIN: 1,

    PLAYER_COLOR: '#1b00ff',

    GAME_MODE: {
        BG_COLOR: ['#fff', '#000'],
        BORDER_COLOR: ['#262626', '#9c9c9c'],
    },

    SCORE: 10,
    SCORE_PER_SECOND: 1 / 60,

    MAP_SIZE: 3000,
    MSG_TYPES: {
        JOIN_GAME: 'join_game',
        GAME_UPDATE: 'update',
        INPUT: 'input',
        GAME_OVER: 'dead',
        PLAYER_ROTATE: 'rotate_player',
        STATUS_UPDATE: 'status_update',
    },
});
