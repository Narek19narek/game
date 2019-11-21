const Constants = require('../resources/js/constants');
const Player = require('./player');
const applyCollisions = require('./collisions');
// const request = require('request');
let bootId = 1;
let bootStatus = true;

class Game {
    constructor() {
        this.sockets = {};
        this.players = {};
        this.leaderboard = {};
        this.lastUpdateTime = Date.now();
        this.shouldSendUpdate = false;
        setInterval(this.update.bind(this), 1000 / 60);
    }

    static getSockets() {
        return this.sockets;
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

    addPlayer(username, userAbility, socket) {
        const switches      = userAbility.isUser ? userAbility.userSwitches : Constants.PLAYER_SWITCHES;
        const push          = userAbility.isUser ? userAbility.userPush : Constants.PLAYER_PUSH_PLAYERS;
        const teleport      = userAbility.isUser ? userAbility.userTeleport : Constants.PLAYER_TELEPORTS;
        const skin          = userAbility.isUser ? userAbility.userSkin : null;
        const hideName      = userAbility.isUser ? userAbility.hideName : 0;
        const hidePosition  = userAbility.isUser ? userAbility.hidePosition : 0;
        const userId        = userAbility.isUser ? userAbility.userId : 0;
        // Generate a position to start this player at.
        const { x, y }      = this.getCordinates();
        const status        = this.getStatus();
        if (socket) {
            this.sockets[socket.id] = socket;
            this.players[socket.id] = new Player(socket.id, username, x, y, status, +switches, +teleport, +push, skin, hideName, hidePosition, userId);
        }
        else {
            this.players['boot' + bootId] = new Player('boot' + bootId, username, x, y, status, +switches, +teleport, +push, skin, hideName, hidePosition, userId);
            bootId++;
        }
    }

    removePlayer(socket) {
        if (socket) {
            if (this.sockets[socket.id]) {
                delete this.sockets[socket.id];
            }
            delete this.players[socket.id];
        }
    }

    handleInput(socket, dir) {
        if(socket) {
            if (this.players[socket.id]) {
                this.players[socket.id].setDirection(dir);
            }
        }

    }

    bootDirection(player) {
        const time = Math.random() * 7 + 3;
        setTimeout(() => {
            player.setDirection(Math.random() * 2 * Math.PI);
        }, time * 1000);
    }

    changePlayerStatus(socket, status) {
        if (socket) {
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
    }

    teleport(socket) {
        if(socket) {
            if (this.players[socket.id] && this.players[socket.id].teleport > 0) {
                this.players[socket.id].x = Constants.MAP_SIZE * Math.random();
                this.players[socket.id].y = Constants.MAP_SIZE * Math.random();
                const obj = this.players[socket.id];
                Object.values(this.players).forEach(player => {
                    if (obj.status !== player.status) {
                        const dist = player.distanceTo(obj);
                        if (dist <= 200) {
                            this.teleport(socket);
                            return true;
                        }
                    }
                });
                obj.updateTeleport();
            }
        }

    }

    pushPlayers(socket) {
        if (socket) {
            const obj = this.players[socket.id];
            if (obj && obj.pushPlayer > 0) {
                obj.updatePushPlayer();
                Object.values(this.players).forEach(player => {
                    if (obj.id !== player.id) {
                        const dist = player.distanceTo(obj);
                        if (dist <= 300) {
                            player.updatePush(dist, obj);
                        }
                    }
                });
            }
        }

    }

    updateSpeed(socket) {
        if (socket) {
            if (this.players[socket.id]) {
                this.players[socket.id].updateSpeed();
            }
        }
    }

    addPoints(socket) {
        if (socket) {
            if (this.players[socket.id]) {
                this.players[socket.id].addPoints();
            }
        }

    }

    updatePosition(players, dt) {
        let newSocket;
        if (players) {
            newSocket = Object.keys(players);
            if (!newSocket.length) {
                // console.log('not a socket')
            } else {
                const bootPlayers = [];
                let leaderBoard;
                if (this.shouldSendUpdate) {
                    leaderBoard = this.getLeaderboard();
                }
                // const subSockets = newSocket.splice(0, 10);
                for (const playerID of newSocket) {
                    const player = this.players[playerID];
                    if (player.id.includes('boot')) {
                        bootPlayers.push(player);
                    }
                    player.update(dt);
                    const socket = this.sockets[playerID];
                    if(leaderBoard && socket) {
                        socket.emit(Constants.MSG_TYPES.GAME_UPDATE, this.createUpdate(player, leaderBoard));
                    }
                }
                if (bootStatus) {
                    bootStatus = false;
                    setTimeout(() => {
                        bootPlayers.forEach(bootPlayer => {
                            this.bootDirection(bootPlayer);
                        });
                        bootStatus = true;
                    }, 3000);
                }
                if (!bootPlayers.find(player => player.id.length < 6)) {
                    bootId = 1;
                }
                // setImmediate(this.updatePosition);
            }
            this.shouldSendUpdate = !this.shouldSendUpdate;
        }
    }


    update() {
        // Calculate time elapsed
        const now = Date.now();
        const dt = (now - this.lastUpdateTime) / 1000;
        this.lastUpdateTime = now;

        // Update each player
        this.updatePosition(this.players, dt);

        const {destroyedPlayers, killPlayers} = applyCollisions(Object.values(this.players));

        destroyedPlayers.forEach(obj => {
            if (this.players[obj.id]) {
                this.players[obj.id].onDealtDamage();
            }
        });

        // Check if any players are dead
        killPlayers.forEach(player => {
            const socket = this.sockets[player.id];
            if (socket) {
                socket.emit(Constants.MSG_TYPES.GAME_OVER);
            } else {
                this.removePlayer(player);
            }
            this.removePlayer(socket);
        });
    }

    getLeaderboard() {
        let i = 1;
        const players = Object.values(this.players)
            .sort((p1, p2) => p2.score - p1.score)
            .map(p => ({ username: p.username, score: Math.floor(p.kill), id: p.id, positionId: i++ }));

        Object.values(players).forEach(obj => {
            const player = Object.values(this.leaderboard).find(o => o.id === obj.id);
            if (player) {
                if (obj.score - player.score > 0) {
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

        return {
            t: Date.now(),
            me: player.serializeForUpdate(),
            others: nearbyPlayers.map(p => p.serializeForUpdate()),
            leaderboard,
        };
    }
    getPlayer(id) {
        return this.players[id];
    }
}

module.exports = Game;
