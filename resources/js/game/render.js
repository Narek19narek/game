import { getAsset } from './assets';
import { getCurrentState } from './state';

let player_data = null;
export function getPlayerData(data) {
    player_data = data;
}

const { PLAYER_RADIUS, MAP_SIZE } = Constants;

// Get the canvas graphics context
const canvas = document.getElementById('game-canvas');
const context = canvas.getContext('2d');

let gameMode;
if (document.getElementById('user_info')) {
    gameMode = document.getElementById('user_info').dataset.gameMode;
} else {
    gameMode = document.cookie.match('(^|;) ?game_mode=([^;]*)(;|$)') ? document.cookie.match('(^|;) ?game_mode=([^;]*)(;|$)')[2] : 0;
}
// if (document.cookie.match('(^|;) ?game_mode=([^;]*)(;|$)')[2] === '1') {
//
// }

setCanvasDimensions();

function setCanvasDimensions() {
    // On small screens (e.g. phones), we want to "zoom out" so players can still see at least
    // 800 in-game units of width.
    const scaleRatio = Math.max(1, 800 / window.innerWidth);
    canvas.width = scaleRatio * window.innerWidth;
    canvas.height = scaleRatio * window.innerHeight;
}

function render() {
    const { me, others } = getCurrentState();
    if (!me) {
        return;
    }
    // Draw background
    renderBackground(me.x, me.y);

    // Draw boundaries
    context.beginPath();
    context.strokeStyle = Constants.GAME_MODE.BORDER_COLOR[gameMode];
    context.lineWidth = 5;
    context.strokeRect(canvas.width / 2 - me.x, canvas.height / 2 - me.y, MAP_SIZE, MAP_SIZE);

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
        0,
        backgroundX,
        backgroundY,
        MAP_SIZE / 2,
    );
    backgroundGradient.addColorStop(1, Constants.GAME_MODE.BG_COLOR[gameMode]);
    backgroundGradient.addColorStop(0, Constants.GAME_MODE.BG_COLOR[gameMode]);
    context.fillStyle = backgroundGradient;
    context.clearRect(0, 0, MAP_SIZE, MAP_SIZE);
    context.fillRect(0, 0, canvas.width, canvas.height);
    context.beginPath();

    context.moveTo(-x + (MAP_SIZE + canvas.width) / 2, -y + canvas.height / 2);
    context.lineTo(-x + (MAP_SIZE + canvas.width) / 2, MAP_SIZE - y + canvas.height / 2);

    context.moveTo(-x + canvas.width / 2,-y + (MAP_SIZE + canvas.height) / 2);
    context.lineTo(MAP_SIZE - x + canvas.width / 2,-y  + (MAP_SIZE + canvas.height) / 2);

    context.strokeStyle = '#707070';
    context.lineWidth = 1;
    context.stroke();
    context.beginPath();
    for (let i = 0; i < 250; i++) {
        context.moveTo(-x + (i - 125) * 40, -y);
        context.lineTo(MAP_SIZE - x + canvas.width + (i - 125) * 40,MAP_SIZE - y + canvas.width);

        context.moveTo(MAP_SIZE - x + canvas.width + (i - 125) * 40, -y);
        context.lineTo(-x + (i - 125) * 40,MAP_SIZE - y + canvas.width);

        context.moveTo(-x ,-y + i * 40);
        context.lineTo(MAP_SIZE + canvas.width,-y  + i * 40 );
    }

    const grad = context.createRadialGradient(backgroundX,
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

    const bgImage = getAsset('bg-logo-' + gameMode + '.svg');
    if (bgImage) {
        const bg = context.drawImage(bgImage, -x + (MAP_SIZE + canvas.width) / 2 - bgImage.width / 2, -y + (MAP_SIZE + canvas.height) / 2 - bgImage.height / 2);
    }
}

// Renders a ship at the given coordinates
function renderPlayer(me, player) {
    const { x, y } = player;
    const canvasX = canvas.width / 2 + x - me.x;
    const canvasY = canvas.height / 2 + y - me.y;
    // Draw ship
    context.save();
    context.translate(canvasX, canvasY);
    // if (player.rotate) {
    //   context.rotate(player.rotate / 57 * 3);
    // }

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
        context.closePath();
    } else if (player.status === 0) {
        context.moveTo(-1, -30);
        context.lineTo(25, 14);
        context.lineTo(-25, 14);
        context.closePath();
        context.lineTo(0, -29);
    } else {
        context.arc(0, 0, 25, 0, 2 * Math.PI);
    }
    context.strokeStyle = Constants.SKINS[player.skin];
    context.lineWidth = 4;
    context.stroke();
    context.restore();

    // Draw health bar
    // context.fillRect(
    //   canvasX - PLAYER_RADIUS,
    //   canvasY + PLAYER_RADIUS + 20,
    //   PLAYER_RADIUS * 2,
    //   2,
    // );
    const textX = canvasX - PLAYER_RADIUS + 12;
    let textPos = textX;

    const getPlayer = player_data.find((obj) => {
        return  obj.id === player.id;
    });
    let playerPosition = getPlayer ? getPlayer.positionId : '';
    let playerName = player.username;

    if (player !== me) {
        if (player.hidePosition === '1') {
            playerPosition = '';
        }
        if (player.hideName === '1') {
            playerName = '';
        }
    }

    if (playerPosition === 1 ) {
        context.fillStyle = '#FFA200';
        context.font = '25px FuturaPress';
    } else if (playerPosition > 1) {
        context.fillStyle = Constants.SKINS[player.skin];
        context.font = '16px FuturaPress';
        if (playerPosition.toString().length === 2) {
            textPos = textX - 4;
        } else if (playerPosition.toString().length === 3) {
            textPos = textX - 8;
        }
    }
    const textY = (player.status === 0) ? canvasY + PLAYER_RADIUS - 8 : canvasY + PLAYER_RADIUS;
    context.fillText(playerPosition, textPos, canvasY - PLAYER_RADIUS - 18);
    context.fillStyle = Constants.SKINS[player.skin];
    context.font = '16px FuturaPress';


    let x1;
    if (playerName.length < 4) {
        x1 = playerName.length * playerName.length;
    } else {
        switch (playerName.length) {
            case 4: x1 = 10;
                break;
            case 5: x1 = 14;
                break;
            default: x1 = 18;
        }
    }
    const text = playerName.length > 6 ? playerName.slice(0, 6) : playerName;
    context.fillText(text, textX - x1, textY + 22);
}

function renderMainMenu() {
    const t = Date.now() / 7500;
    const x = MAP_SIZE / 2 + 800 * Math.cos(t);
    const y = MAP_SIZE / 2 + 800 * Math.sin(t);
    renderBackground(x, y);
}

let renderInterval = setInterval(renderMainMenu, 1000 / 50);

// Replaces main menu rendering with game rendering.
export function startRendering() {
    clearInterval(renderInterval);
    renderInterval = setInterval(render, 1000 / 50);
}

// Replaces game rendering with main menu rendering.
export function stopRendering() {
    clearInterval(renderInterval);
    renderInterval = setInterval(renderMainMenu, 1000 / 50);
}

export function getInfo() {
    const { me } = getCurrentState();
    return me;
}
