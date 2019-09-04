const gameinfo = document.getElementById('game-info');
const rows = document.querySelectorAll('#game-info span');

const kill = document.getElementById('kill');

export function updateGameinfo(me) {
  rows[0].innerHTML = Math.floor(me.switches);
  rows[1].innerHTML = Math.floor(me.teleport);
  rows[2].innerHTML = Math.floor(me.pushPlayer);

  // Time
  kill.innerHTML = me.kill;
}

export function setGameinfoHidden(hidden) {
  if (hidden) {
    gameinfo.classList.add('hidden');
    kill.classList.add('hidden');
  } else {
    gameinfo.classList.remove('hidden');
    kill.classList.remove('hidden');
  }
}
