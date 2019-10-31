import { connect, play } from './networking';
import { startRendering, stopRendering, getInfo } from './render';
import { startCapturingInput, stopCapturingInput } from './input';
import { initState } from './state';
import { setLeaderboardHidden } from './leaderboard';
import { setGameinfoHidden } from './gameinfo';
import configs from "./configs";

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

Promise.all([
  connect(onGameOver)
]).then(() => {
    play(username, userAbility);
    initState();
    startCapturingInput();
    startRendering();
    setLeaderboardHidden(false);
    setGameinfoHidden(false);

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
    setTimeout( function () {
        if(form) form.submit();
        setLeaderboardHidden(true);
        setGameinfoHidden(true);
        stopRendering();
        stopCapturingInput();
    }, 100);
}
