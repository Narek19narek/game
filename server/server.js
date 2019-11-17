const https         = require('https');
const request       = require('request');
const fs            = require('fs');
const Constants     = require('../resources/js/constants');
const express       = require('express');
const config        = require('../resources/js/game/configs');
const socketio      = require('socket.io');
const {execSync}    = require('child_process');
// Setup an Express server
const app = express();

//Out players from game
process.on('exit', (code) => {
    execSync("php artisan playing:off");
});

//Storing error logs in log file
process.on('uncaughtException', (err) => {
    const today = new Date();
    const date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();

    fs.appendFile(`./server/logs/node_log_${date}.log`, `${new Date()} \n ${err.stack} \n\n\n`, (error) => {
        console.log("Trows an error please read log file! {node_log.log} ", err);
    });
});

let rootCas = require('ssl-root-cas/latest').create();
https.globalAgent.options.ca = rootCas;
require('tls').createSecureContext({
    ca: rootCas
});

agentOptions = {
    host: config.BACKEND_HOST,
    path: '/game-close',
    rejectUnauthorized: false
};

const agent = new https.Agent(agentOptions);

const Game = require('./game');

const server = https.createServer({
    key : fs.readFileSync(config.SERVER_KEY),
    cert: fs.readFileSync(config.SERVER_CRT),
    requestCert: false,
    rejectUnauthorized: false
},app);

const port = process.env.PORT || 3000;

server.listen(port);

console.log(`Server listening on port ${port}`);

// Setup socket.io
const io = socketio.listen(server);

// Listen for socket.io connections
io.on('connection', socket => {
  console.log('Player connected!', socket.id);

  socket.on(Constants.MSG_TYPES.JOIN_GAME, joinGame);
  socket.on(Constants.MSG_TYPES.INPUT, handleInput);
  // socket.on(Constants.MSG_TYPES.PLAYER_ROTATE, rotatePlayer);
  socket.on(Constants.MSG_TYPES.STATUS_UPDATE, changePlayerStatus);
  socket.on('teleport', teleport);
  socket.on('push_players', pushPlayers);
  socket.on('speed', updateSpeed);
  socket.on('point', addPoints);
  socket.on('disconnect', onDisconnect);
});

// Setup the Game
const game = new Game();

setInterval(() => {
    const players = Object.keys(game.players);
    if (players.length < 10) {
        const k = 10 - players.length;
        for (let i = 0; i < k; i++) {
            game.addPlayer('player', {isUser: false} );
        }
    }
}, 1000);

function joinGame(username, userAbility) {
   game.addPlayer(username, userAbility, this);
}

function handleInput(dir) {
  game.handleInput(this, dir);
}

// function rotatePlayer(angle) {
//   game.rotatePlayer(this, angle);
// }

function changePlayerStatus(status) {
  game.changePlayerStatus(this, status);
}

function teleport() {
  game.teleport(this);
}

function pushPlayers() {
  game.pushPlayers(this);
}

function updateSpeed() {
  game.updateSpeed(this);
}

function addPoints() {
  game.addPoints(this);
}

function onDisconnect() {
    const player = game.getPlayer(this.id);
    request.post({
        url: config.BACKEND_URL + '/game-close',
        form: {player},
        agent: agent
    }, (err, res, body) => {
        console.log('socket ID => ' + this.id);
        game.removePlayer(this);
    });
}
