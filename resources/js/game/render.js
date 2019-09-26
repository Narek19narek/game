// import { debounce } from 'throttle-debounce';
// import { getAsset } from './assets';
import { getCurrentState } from './state';
import {getAsset} from "./assets";

// import { getScore } from './networking';

const { PLAYER_RADIUS, MAP_SIZE } = Constants;

// Get the canvas graphics context
const canvas = document.getElementById('game-canvas');
const context = canvas.getContext('2d');
// const canvasSquare = document.getElementById('game-object');
// const contextSquare = canvasSquare.getContext('2d');
setCanvasDimensions();

function setCanvasDimensions() {
  // On small screens (e.g. phones), we want to "zoom out" so players can still see at least
  // 800 in-game units of width.
  const scaleRatio = Math.max(1, 800 / window.innerWidth);
  canvas.width = scaleRatio * window.innerWidth;
  canvas.height = scaleRatio * window.innerHeight;
}

// window.addEventListener('resize', debounce(40, setCanvasDimensions));

function render() {
  const { me, others } = getCurrentState();
  if (!me) {
    return;
  }

  // console.log(others);

  // Draw background
  renderBackground(me.x, me.y);

  // Draw boundaries
    context.beginPath();
  context.strokeStyle = 'black';
  context.lineWidth = 5;
  context.strokeRect(canvas.width / 2 - me.x, canvas.height / 2 - me.y, MAP_SIZE, MAP_SIZE);

  // Draw all bullets
  // console.log(me);
  // bullets.forEach(renderBullet.bind(null, me));

  // Draw all players
  renderPlayer(me, me);
  others.forEach(renderPlayer.bind(null, me));
}

function renderBackground(x, y) {

  const backgroundX = MAP_SIZE / 2 - x + canvas.width / 2;
  const backgroundY = MAP_SIZE / 2 - y + canvas.height / 2;
  // context.drawImage(getAsset('bg.png'), backgroundX, backgroundY);
  const backgroundGradient = context.createRadialGradient(
    backgroundX,
    backgroundY,
    0,
    backgroundX,
    backgroundY,
    MAP_SIZE / 2,
  );
  backgroundGradient.addColorStop(1, 'rgba(255,255,255,0)');
  backgroundGradient.addColorStop(0, '#ffffff');
  context.fillStyle = backgroundGradient;
  context.fillRect(0, 0, canvas.width, canvas.height);
  context.clearRect(0, 0, MAP_SIZE, MAP_SIZE)
    context.beginPath();
    for (let i = 0; i < 250; i++) {
        context.moveTo(canvas.width / 2 - x + (i - 125) * 40, -y);
        context.lineTo(2 * (MAP_SIZE + canvas.width) - x + (i - 125) * 40,2 * (MAP_SIZE + canvas.height)- y);

        context.moveTo(2 * (MAP_SIZE + canvas.width) - x - i * 40, -y);
        context.lineTo(canvas.width / 2 - x - i * 40,2 * (MAP_SIZE + canvas.height) - y);

        context.moveTo(2 * (MAP_SIZE + canvas.width) + x ,-y + i * ((canvas.height + MAP_SIZE) * 43.8 / (MAP_SIZE + canvas.width)));
        context.lineTo(- x,-y  + i * ((canvas.height + MAP_SIZE) * 43.8 / (MAP_SIZE + canvas.width)));

        // context.moveTo(canvas.width / 2 - x - (i + 1) * 40, -y);
        // context.lineTo(2 * (MAP_SIZE + canvas.width) - x - (i + 1) * 40, 2 * (MAP_SIZE + canvas.height)- y);
        // context.moveTo(2 * (MAP_SIZE + canvas.width) - x - (i + 120) * 40, -y);
        // context.lineTo(canvas.width / 2 - x - (i + 120) * 40,2 * (MAP_SIZE + canvas.height) - y);
    }

    // console.log(canvas.width, canvas.height, MAP_SIZE, x, y);

    var grad= context.createRadialGradient(backgroundX,
        backgroundY,
        MAP_SIZE / 10,
        backgroundX,
        backgroundY,
        MAP_SIZE / 2,);
    grad.addColorStop(0, "#707070");
    grad.addColorStop(1, "rgba(112,112,112,0.1)");
    context.strokeStyle = grad;
    context.lineWidth = 1;
    context.stroke();
}

// Renders a ship at the given coordinates
function renderPlayer(me, player) {
  const { x, y } = player;
  const canvasX = canvas.width / 2 + x - me.x;
  const canvasY = canvas.height / 2 + y - me.y;
  // Draw ship
  context.save();
  context.translate(canvasX, canvasY);
  if (player.rotate) {
    context.rotate(player.rotate / 57 * 3);
  }

  // let img;
  // if (player.status === 2) {
  //   img = 'square.svg';
  // } else if (player.status === 0) {
  //   img = 'triangle.svg';
  // } else img = 'circle.svg';
  // contextSquare.clearRect(0, 0, 100, 100);
  // contextSquare.beginPath();
  context.beginPath();
  if (player.status === 2) {
    context.moveTo(-25, -25);
    context.lineTo(-25, 25);
    context.lineTo(25, 25);
    context.lineTo(25, -25);
    context.lineTo(-25, -25);
  } else if (player.status === 0) {
    context.moveTo(0, -29);
    context.lineTo(25, 14);
    context.lineTo(-25, 14);
    context.lineTo(0, -29);
  } else {
    context.arc(0, 0, 25, 0, 2 * Math.PI);
  }
  context.strokeStyle = 'blue';
    context.lineWidth = 4;
  context.stroke();
  context.restore();

  // Draw health bar
  context.fillStyle = 'blue';
  context.font = '12px Verdana';
  // context.fillRect(
  //   canvasX - PLAYER_RADIUS,
  //   canvasY + PLAYER_RADIUS + 20,
  //   PLAYER_RADIUS * 2,
  //   2,
  // );
  const textX = canvasX - PLAYER_RADIUS + 15;
  let textKill;
  if (player.kill.toString().length === 1) {
    textKill = textX - 1;
  } else if (player.kill.toString().length === 2) {
    textKill = textX - 4;
  } else if (player.kill.toString().length === 3) {
    textKill = textX - 8;
  } else if (player.kill.toString().length === 4) {
    textKill = textX - 12;
  } else {
    textKill = textX - 15;
  }
  const textY = (player.status === 0) ? canvasY + PLAYER_RADIUS - 8 : canvasY + PLAYER_RADIUS;
  context.fillText(Math.floor(player.kill), textKill, canvasY - PLAYER_RADIUS - 15);
  if (player.username) {
    let x1;
    if (player.username.length < 4) {
      x1 = player.username.length * player.username.length;
    } else {
      switch (player.username.length) {
        case 4: x1 = 10;
          break;
        case 5: x1 = 14;
          break;
        default: x1 = 18;
      }
    }
    const text = player.username.length > 6 ? player.username.slice(0, 6) : player.username;
    context.fillText(text, textX - x1, textY + 22);
  }
}

function renderMainMenu() {
  const t = Date.now() / 7500;
  const x = MAP_SIZE / 2 + 800 * Math.cos(t);
  const y = MAP_SIZE / 2 + 800 * Math.sin(t);
  renderBackground(x, y);
}

let renderInterval = setInterval(renderMainMenu, 1000 / 60);

// Replaces main menu rendering with game rendering.
export function startRendering() {
  clearInterval(renderInterval);
  renderInterval = setInterval(render, 1000 / 60);
}

// Replaces game rendering with main menu rendering.
export function stopRendering() {
  clearInterval(renderInterval);
  renderInterval = setInterval(renderMainMenu, 1000 / 60);
}

export function getInfo() {
    const { me } = getCurrentState();
    return me;
}
