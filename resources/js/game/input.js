import { updateDirection, updateStatus, teleport, pushPlayers, updateSpeed } from './networking';

function onMouseInput(e) {
  handleInput(e.clientX, e.clientY);
}

function onKeyPress(e) {
  if (e.key === ' ') {
    updateSpeed();
  }
  // if (e.key === 'Q' || e.key === 'q') {
  //   updateAngle(1);
  // }
  // if (e.key === 'E' || e.key === 'e') {
  //   updateAngle(-1);
  // }
  if (e.key === 'A' || e.key === 'a') {
    updateStatus(-1);
  }
  if (e.key === 'D' || e.key === 'd') {
    updateStatus(1);
  }
  if (e.key === 'W' || e.key === 'w') {
    teleport();
  }
  if (e.key === 'H' || e.key === 'h') {
    pushPlayers();
  }
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
}

export function stopCapturingInput() {
  window.removeEventListener('mousemove', onMouseInput);
  window.removeEventListener('click', onMouseInput);
  window.removeEventListener('touchstart', onTouchInput);
  window.removeEventListener('touchmove', onTouchInput);
  window.removeEventListener('keypress', onKeyPress);
}
