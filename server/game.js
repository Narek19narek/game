const Constants = require('../resources/js/constants');
const Player = require('./player');
const applyCollisions = require('./collisions');

class Game {
  constructor() {
    this.sockets = {};
    this.players = {};
    this.leaderboard = {};
    this.lastUpdateTime = Date.now();
    this.shouldSendUpdate = false;
    setInterval(this.update.bind(this), 1000 / 60);
  }

  getStatus() {
    let triangle = 0;
    let square = 0;
    let circle = 0;
    Object.values(this.players).map(player => {
      switch (player.status) {
        case 0: triangle++;
          break;
        case 2: square++;
          break;
        default: circle++;
          break;
      }
      return true;
    });
    let status;
    if (triangle > circle) {
      if (circle > square) {
        status = 2;
      } else if (circle < square) {
        status = 1;
      } else {
        status = Math.round(Math.random()) + 1;
      }
    } else if (triangle < circle) {
      if (triangle > square) {
        status = 2;
      } else if (triangle < square) {
        status = 0;
      } else {
        const arr = [0, 2];
        status = arr[Math.round(Math.random())];
      }
    } else if (triangle > square) {
      status = 2;
    } else if (triangle < square) {
      status = Math.round(Math.random());
    } else {
      status = Math.round(Math.random() * 2);
    }
    return status;
  }

  // eslint-disable-next-line class-methods-use-this
  getCordinates() {
    const x = Constants.MAP_SIZE * (0.25 + Math.random() * 0.5);
    const y = Constants.MAP_SIZE * (0.25 + Math.random() * 0.5);
    return { x, y };
  }

  addPlayer(socket, username, userAbility) {
    const switches = userAbility.isUser ? userAbility.userSwitches : Constants.PLAYER_SWITCHES;
    const push = userAbility.isUser ? userAbility.userPush : Constants.PLAYER_PUSH_PLAYERS;
    const teleport = userAbility.isUser ? userAbility.userTeleport : Constants.PLAYER_TELEPORTS;
    this.sockets[socket.id] = socket;
    const { x, y } = this.getCordinates();
    // Generate a position to start this player at.
    const status = this.getStatus();
    // const time = this.updateTime();
    // const score = 0;
    this.players[socket.id] = new Player(socket.id, username, x, y, status, switches, teleport, push);
  }

  removePlayer(socket) {
    delete this.sockets[socket.id];
    delete this.players[socket.id];
  }

  handleInput(socket, dir) {
    if (this.players[socket.id]) {
      this.players[socket.id].setDirection(dir);
    }
  }

  rotatePlayer(socket, angle) {
    if (this.players[socket.id]) {
      if (this.players[socket.id].rotate) {
        this.players[socket.id].rotate += angle;
      } else {
        this.players[socket.id].setRotate(angle);
      }
    }
  }

  changePlayerStatus(socket, status) {
    if (this.players[socket.id] && this.players[socket.id].switches !== 0) {
      const myStatus = this.players[socket.id].status + status;
      if (myStatus < 0) {
        this.players[socket.id].status = 2;
      } else if (myStatus > 2) {
        this.players[socket.id].status = 0;
      } else {
        this.players[socket.id].status = myStatus;
      }
      this.players[socket.id].updateSwitches();
    }
  }

  teleport(socket) {
    if (this.players[socket.id] && this.players[socket.id].teleport >= 1) {
      this.players[socket.id].x = Constants.MAP_SIZE * Math.random();
      this.players[socket.id].y = Constants.MAP_SIZE * Math.random();
      const obj = this.players[socket.id];
      Object.values(this.players).forEach(player => {
        if (obj.status !== player.status) {
          const dist = player.distanceTo(obj);
          if (dist <= 100) {
            obj.teleport(socket);
          }
        }
      });
      obj.updateTeleport();
    }
  }

  pushPlayers(socket) {
    const obj = this.players[socket.id];
    if (obj && obj.pushPlayer >= 1) {
      obj.updatePushPlayer();
      Object.values(this.players).forEach(player => {
        if (obj.status !== player.status) {
          // let condition;
          // switch (obj.status) {
          //   case 0: condition = player.status !== 1;
          //     break;
          //   case 1: condition = player.status !== 2;
          //     break;
          //   default: condition = player.status !== 0;
          //     break;
          // }
          // if (condition) {
          const dist = player.distanceTo(obj);
          if (dist <= 300) {
            player.updatePush(dist, obj);
          }
          // }
        }
      });
    }
  }

  updateSpeed(socket) {
    this.players[socket.id].updateSpeed();
  }


  update() {
    // Calculate time elapsed
    const now = Date.now();
    const dt = (now - this.lastUpdateTime) / 1000;
    this.lastUpdateTime = now;

    // Update each player
    Object.keys(this.sockets).forEach(playerID => {
      const player = this.players[playerID];
      player.update(dt);
    });

    const destroyedPlayers = applyCollisions(Object.values(this.players), this.players);
    destroyedPlayers.forEach(obj => {
      if (this.players[obj.id]) {
        this.players[obj.id].onDealtDamage();
      }
    });
    // this.players = this.players.filter(player => !destroyedPlayers.includes(player));

    // Check if any players are dead
    Object.keys(this.sockets).forEach(playerID => {
      const socket = this.sockets[playerID];
      const player = this.players[playerID];
      if (player.hp <= 0) {
        socket.emit(Constants.MSG_TYPES.GAME_OVER);
        this.removePlayer(socket);
      }
    });

    // Send a game update to each player every other time
    if (this.shouldSendUpdate) {
      const leaderBoard = this.getLeaderboard();
      Object.keys(this.sockets).forEach(playerID => {
        const socket = this.sockets[playerID];
        const player = this.players[playerID];
        socket.emit(Constants.MSG_TYPES.GAME_UPDATE, this.createUpdate(player, leaderBoard));
      });
      this.shouldSendUpdate = false;
    } else {
      this.shouldSendUpdate = true;
    }
  }

  // updateTime() {
  //   Object.keys(this.sockets).forEach(playerID => {
  //     const player = this.players[playerID];
  //     player.updateTime();
  //   });
  // }

  getLeaderboard() {
    let i = 1;
    const players = Object.values(this.players)
      .sort((p1, p2) => p2.score - p1.score)
      .map(p => ({ username: p.username, score: Math.floor(p.score), id: p.id, positionId: i++ }));

    Object.values(players).forEach(obj => {
      const player = Object.values(this.leaderboard).find(o => o.id === obj.id);
      if (player) {
        if (obj.score - player.score > 9) {
          if (player.positionId > obj.positionId && obj.positionId < 11) {
            this.players[obj.id].addSwitches(obj.positionId);
          }
        }
      }
    });
    this.leaderboard = players;
    return players;
  }

  createUpdate(player, leaderboard) {
    const nearbyPlayers = Object.values(this.players).filter(
      p => p !== player && p.distanceTo(player) <= Constants.MAP_SIZE / 2,
    );
    // console.log(this.bullets);
    // const nearbyBullets = this.bullets.filter(
    //   b => b.distanceTo(player) <= Constants.MAP_SIZE / 2,
    // );

    return {
      t: Date.now(),
      me: player.serializeForUpdate(),
      others: nearbyPlayers.map(p => p.serializeForUpdate()),
      leaderboard,
    };
  }
}

module.exports = Game;
