const gameinfo = document.getElementById('game-info');
const rows = document.querySelectorAll('#game-info span');

const time = document.getElementById('time');

export function updateGameinfo(me) {
  rows[0].innerHTML = Math.floor(me.switches);
  rows[1].innerHTML = Math.floor(me.teleport);
  rows[2].innerHTML = Math.floor(me.pushPlayer);

  // Time
  time.innerHTML = me.time.toFixed(3);
}

export function setGameinfoHidden(hidden) {
  if (hidden) {
    gameinfo.classList.add('hidden');
    time.classList.add('hidden');
  } else {
    gameinfo.classList.remove('hidden');
    time.classList.remove('hidden');
  }
}
