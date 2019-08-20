import escape from 'lodash/escape';

const leaderboard = document.getElementById('leaderboard');
const rows = document.querySelectorAll('#leaderboard table tr');

export function updateLeaderboard(data, me) {
  // This is a bit of a hacky way to do this and can get dangerous if you don't escape usernames
  // properly. You would probably use something like React instead if this were a bigger project.
  const maxLeaders = (data.length < 10) ? data.length : 10;
  if (document.querySelector('.me')) {
    if (+document.querySelector('.me td').innerHTML <= 10) {
      document.querySelector('.me').classList.remove('me');
    } else {
      document.querySelector('.me').parentNode.removeChild(document.querySelector('.me'));
    }
  }
  for (let i = 0; i < maxLeaders; i++) {
    if (data[i].id === me.id) {
      rows[i + 1].classList.add('me');
      // console.log(document.querySelector('.me'));
    }
    rows[i + 1].innerHTML = `<td>${(i + 1)}<td>${escape(data[i].username.slice(0, 15)) || 'Anonymous'}</td><td>${
      data[i].score
    }</td>`;
  }
  for (let i = data.length; i < 10; i++) {
    rows[i + 1].innerHTML = `<td>${i + 1}</td><td>-</td><td>-</td>`;
  }
  if (!document.querySelector('.me')) {
    const mePos = data.find(obj => obj.id === me.id);
    const tr = document.createElement('tr');
    tr.classList.add('me');
    tr.innerHTML = `<td>${(data.indexOf(mePos) + 1)}<td>${escape(mePos.username.slice(0, 15)) || 'Anonymous'}</td><td>${
      mePos.score
    }</td>`;
    document.querySelector('#leaderboard table tbody').appendChild(tr);
  }
}

export function setLeaderboardHidden(hidden) {
  if (hidden) {
    leaderboard.classList.add('hidden');
  } else {
    leaderboard.classList.remove('hidden');
  }
}
