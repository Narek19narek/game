import { updateDirection, updateStatus, teleport, pushPlayers, updateSpeed, addPoints } from './networking';

function onMouseInput(e) {
  handleInput(e.clientX, e.clientY);
}

let keyStatus = true;
let boom = 0;

function onKeyPress(e) {
    if((e.key === 'B' || e.key === 'b') && boom === 0) {
        boom = e.keyCode;
    } else if((e.key === 'O' || e.key === 'o') && (boom === 98 || boom === 209)) {
        boom += e.keyCode;
    } else if((e.key === 'M' || e.key === 'm') && boom === 320) {
        boom = 0;
        addPoints();
    } else {
        boom = 0;
    }

    if (keyStatus) {
        if (e.key === 'A' || e.key === 'a') {
            updateStatus(-1);
        }
        if (e.key === 'D' || e.key === 'd') {
            updateStatus(1);
        }
        if (e.key === 'W' || e.key === 'w') {
            teleport();
        }
        if (e.key === 'S' || e.key === 's') {
            pushPlayers();
        }
        if (e.key === ' ') {
            updateSpeed();
        }
        keyStatus = false;
    }
}

function onKeyUp() {
    keyStatus = true;
}

const switchBtn = document.getElementById('switch-btn');
switchBtn.addEventListener('click', function () {
    updateStatus(1);
});
const pushBtn = document.getElementById('push-btn');
pushBtn.addEventListener('click', function () {
    pushPlayers();
});
const teleportBtn = document.getElementById('teleport-btn');
teleportBtn.addEventListener('click', function () {
    teleport();
});

function onTouchInput(e) {
  const touch = e.touches[0];
  handleInput(touch.clientX, touch.clientY);
}

function handleInput(x, y) {
  const dir = Math.atan2(x - window.innerWidth / 2, window.innerHeight / 2 - y);
  updateDirection(dir);
}

export function startCapturingInput() {
  window.addEventListener('mousemove', onMouseInput);
  window.addEventListener('click', onMouseInput);
  window.addEventListener('touchstart', onTouchInput);
  window.addEventListener('touchmove', onTouchInput);
  window.addEventListener('keypress', onKeyPress);
  window.addEventListener('keyup', onKeyUp);
}

export function stopCapturingInput() {
  window.removeEventListener('mousemove', onMouseInput);
  window.removeEventListener('click', onMouseInput);
  window.removeEventListener('touchstart', onTouchInput);
  window.removeEventListener('touchmove', onTouchInput);
  window.removeEventListener('keypress', onKeyPress);
  window.removeEventListener('keyup', onKeyUp);
}
