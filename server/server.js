// const http = require('http');
const Constants = require('../resources/js/constants');
const express = require('express');
const socketio = require('socket.io');

const Game = require('./game');
// const routes = require('../auth/routes/index');


// Setup an Express server
const app = express();

// app.use('/admin', routes);
// app.get('/admin', (req, res) => {
//   // req.path('../auth/html/index.html');
//   // res.render('../auth/html/index.html', (_err, html) => {
//   //   res.send(html);
//   // });
//   res.send('heloo');
// });

// Listen on port
const port = process.env.PORT || 3000;
// http.createServer(app).listen(8000);
const server = app.listen(port);
// const server = http.createServer(app).listen(8000);
console.log(`Server listening on port ${port}`);

// Setup socket.io
const io = socketio(server);

// Listen for socket.io connections
io.on('connection', socket => {
  console.log('Player connected!', socket.id);

  socket.on(Constants.MSG_TYPES.JOIN_GAME, joinGame);
  socket.on(Constants.MSG_TYPES.INPUT, handleInput);
  socket.on(Constants.MSG_TYPES.PLAYER_ROTATE, rotatePlayer);
  socket.on(Constants.MSG_TYPES.STATUS_UPDATE, changePlayerStatus);
  socket.on('teleport', teleport);
  socket.on('push_players', pushPlayers);
  socket.on('speed', updateSpeed);
  socket.on('disconnect', onDisconnect);
});

// Setup the Game
const game = new Game();

function joinGame(username) {
  game.addPlayer(this, username);
}

function handleInput(dir) {
  game.handleInput(this, dir);
}

function rotatePlayer(angle) {
  game.rotatePlayer(this, angle);
}

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

function onDisconnect() {
  game.removePlayer(this);
}
