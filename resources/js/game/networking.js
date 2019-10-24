import io from 'socket.io-client';
import { throttle } from 'throttle-debounce';
import { processGameUpdate } from './state';
import configs from "./configs";

const socket = io(configs.URL, { reconnection: false });
const connectedPromise = new Promise(resolve => {
  socket.on('connect', () => {
    console.log('Connected to server!');
    resolve();
  });
});

export const connect = onGameOver => (
  connectedPromise.then(() => {
    // Register callbacks
    socket.on(Constants.MSG_TYPES.GAME_UPDATE, processGameUpdate);
    socket.on(Constants.MSG_TYPES.GAME_OVER, onGameOver);
    socket.on('disconnect', () => {
      // console.log('Disconnected from server.');
      document.getElementById('disconnect-modal').classList.remove('hidden');
      document.getElementById('reconnect-button').onclick = () => {
        window.location.reload();
      };
    });
  })
);

export const play = (username, userAbility) => {
  socket.emit(Constants.MSG_TYPES.JOIN_GAME, username, userAbility);
};

export const updateDirection = throttle(20, dir => {
  socket.emit(Constants.MSG_TYPES.INPUT, dir);
});

export const updateAngle = throttle(20, angle => {
  socket.emit(Constants.MSG_TYPES.PLAYER_ROTATE, angle);
});

export const updateStatus = throttle(20, status => {
  socket.emit(Constants.MSG_TYPES.STATUS_UPDATE, status);
});

export const teleport = throttle(20, () => {
  socket.emit('teleport');
});

export const pushPlayers = throttle(20, () => {
  socket.emit('push_players');
});

export const updateSpeed = throttle(20, () => {
  socket.emit('speed');
});
