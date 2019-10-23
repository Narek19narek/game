import { connect, play } from './networking';
import { startRendering, stopRendering, getInfo } from './render';
import { startCapturingInput, stopCapturingInput } from './input';
// import { downloadAssets } from './assets';
import { initState } from './state';
import { setLeaderboardHidden } from './leaderboard';
import { setGameinfoHidden } from './gameinfo';
import configs from "./configs";

const playMenu = document.getElementById('play-menu');
const playButton = document.getElementById('play-button');
const usernameInput = document.getElementById('username-input');
const username = usernameInput.value ? usernameInput.value : 'player';
const userInfo = document.getElementById('user_info');
const userAbility = {};
if (userInfo) {
    userAbility.isUser = true;
    userAbility.userSwitches = userInfo.dataset.switches;
    userAbility.userTeleport = userInfo.dataset.teleport;
    userAbility.userPush = userInfo.dataset.push;
    userAbility.userSkin = userInfo.dataset.skin;
    userAbility.hideName = userInfo.dataset.hideName;
    userAbility.hidePosition = userInfo.dataset.hidePosition;
    userAbility.userId = userInfo.dataset.userId;
} else {
    userAbility.isUser = false;
}

function initGameStart() {
    play(username, userAbility);
    playMenu.classList.add('hidden');
    initState();
    startCapturingInput();
    startRendering();
    setLeaderboardHidden(false);
    setGameinfoHidden(false);
}



Promise.all([
  connect(onGameOver),
  // downloadAssets(),
]).then(() => {
  playMenu.classList.remove('hidden');
  usernameInput.focus();
  playButton.onclick = () => {
    // Play!
      initGameStart()
  };
   usernameInput.addEventListener('keydown', (evt) => {
       if(evt.key === 'Enter') {
           initGameStart()
       }
   })

}).catch(console.error);

function createdForm(params) {
    let form = document.createElement('form');
    form.method = 'POST';
    form.action = `${configs.BACKEND_URL}/game-over`;
    for(let key in params) {
        if(params.hasOwnProperty(key)) {
            let input = document.createElement('input');
            input.type = 'hidden';
            input.name = key;
            input.value = params[key];
            form.appendChild(input)
        }
    }
    document.body.appendChild(form);
    return form;
}

function onGameOver() {
    const me = getInfo();
    const params = {time: Math.floor(me.time), kill: me.kill};
    const form = createdForm(params);
    if(form) form.submit();
    stopCapturingInput();
    stopRendering();
    setLeaderboardHidden(true);
    setGameinfoHidden(true);
}
