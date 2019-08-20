// import { debounce } from 'throttle-debounce';
// import { getAsset } from './assets';
import { getCurrentState } from './state';

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

  // Draw background
  renderBackground(me.x, me.y);

  // Draw boundaries
  context.strokeStyle = 'black';
  context.lineWidth = 1;
  context.strokeRect(canvas.width / 2 - me.x, canvas.height / 2 - me.y, MAP_SIZE, MAP_SIZE);

  // Draw all bullets
  // console.log(bullets);
  // bullets.forEach(renderBullet.bind(null, me));

  // Draw all players
  renderPlayer(me, me);
  others.forEach(renderPlayer.bind(null, me));
}

function renderBackground(x, y) {
  const backgroundX = MAP_SIZE / 2 - x + canvas.width / 2;
  const backgroundY = MAP_SIZE / 2 - y + canvas.height / 2;
  const backgroundGradient = context.createRadialGradient(
    backgroundX,
    backgroundY,
    MAP_SIZE / 10,
    backgroundX,
    backgroundY,
    MAP_SIZE / 2,
  );
  backgroundGradient.addColorStop(0, 'red');
  backgroundGradient.addColorStop(1, 'green');
  context.fillStyle = backgroundGradient;
  context.fillRect(0, 0, canvas.width, canvas.height);
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

  context.strokeStyle = '#ffffff';
  context.stroke();
  // context.fill();

  // const img = 'circle.svg';
  // context.drawImage(
  //   getAsset(img),
  //   0, 0,
  //   // -PLAYER_RADIUS,
  //   // -PLAYER_RADIUS,
  //   // PLAYER_RADIUS * 2,
  //   // PLAYER_RADIUS * 2,
  // );
  context.restore();

  // Draw health bar
  context.fillStyle = '#ffffff';
  context.font = '12px Verdana';
  // context.fillRect(
  //   canvasX - PLAYER_RADIUS,
  //   canvasY + PLAYER_RADIUS + 20,
  //   PLAYER_RADIUS * 2,
  //   2,
  // );
  const textX = canvasX - PLAYER_RADIUS + 15;
  let textPoint;
  if (player.point.toString().length === 1) {
    textPoint = textX - 1;
  } else if (player.point.toString().length === 2) {
    textPoint = textX - 4;
  } else if (player.point.toString().length === 3) {
    textPoint = textX - 8;
  } else if (player.point.toString().length === 4) {
    textPoint = textX - 12;
  } else {
    textPoint = textX - 15;
  }
  const textY = (player.status === 0) ? canvasY + PLAYER_RADIUS - 8 : canvasY + PLAYER_RADIUS;
  context.fillText(Math.floor(player.point), textPoint, canvasY - PLAYER_RADIUS - 15);
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

// function renderBullet(me, bullet) {
//   const { x, y } = bullet;
//   context.drawImage(
//     getAsset('bullet.svg'),
//     canvas.width / 2 + x - me.x - BULLET_RADIUS,
//     canvas.height / 2 + y - me.y - BULLET_RADIUS,
//     BULLET_RADIUS * 2,
//     BULLET_RADIUS * 2,
//   );
// }

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
