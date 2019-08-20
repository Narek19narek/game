const Constants = require('../resources/js/constants');

function applyCollisions(players) {
  const destroyedPlayers = [];
  for (let i = 0; i < players.length; i++) {
    for (let j = 0; j < players.length; j++) {
      const player1 = players[i];
      const player2 = players[j];
      if (player1.status !== player2.status && player2.distanceTo(player1) <= 2 * Constants.PLAYER_RADIUS) {
        if (player1.status === 0) {
          if (player2.status === 1) {
            player2.killPlayer();
            destroyedPlayers.push(player1);
          } else {
            player1.killPlayer();
            destroyedPlayers.push(player2);
          }
        } else if (player1.status === 1) {
          if (player2.status === 2) {
            player2.killPlayer();
            destroyedPlayers.push(player1);
          }
        }
        break;
      }
    }
  }
  return destroyedPlayers;
}

module.exports = applyCollisions;
