const Constants = require('../resources/js/constants');

function applyCollisions(players) {
    const destroyedPlayers = [];
    const killPlayers = [];

    for (let i = 0; i < players.length; i++) {
        for (let j = 0; j < players.length; j++) {
            const player1 = players[i];
            const player2 = players[j];
            if (player1.status !== player2.status && player2.distanceTo(player1) <= 2 * Constants.PLAYER_RADIUS) {
                if (player1.status === 0) {
                    if (player2.status === 1) {
                        killPlayers.push(player2);
                        destroyedPlayers.push(player1);
                    } else {
                        killPlayers.push(player1);
                        destroyedPlayers.push(player2);
                    }
                } else if (player1.status === 1) {
                    if (player2.status === 2) {
                        killPlayers.push(player2);
                        destroyedPlayers.push(player1);
                    }
                }
                break;
            }
        }
    }
    return {destroyedPlayers, killPlayers};
}

module.exports = applyCollisions;
