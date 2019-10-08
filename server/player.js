const ObjectClass = require('./object');
const Constants = require('../resources/js/constants');

class Player extends ObjectClass {
  constructor(id, username, x, y, status, switches, teleport, push, skin) {
    super(id, x, y, Math.random() * 2 * Math.PI, Constants.PLAYER_SPEED, status);
    this.username = username;
    this.hp = Constants.PLAYER_MAX_HP;
    this.score = 0;
    this.point = 0;
    this.kill = 0;
    this.switches = switches;
    this.teleport = teleport;
    this.pushPlayer = push;
    this.time = 0;
    this.skin = skin;
  }

  // Returns a newly created bullet, or null.
  updateSpeed() {
    if (this.point) {
      this.point--;
      this.speed = 400;
      setTimeout(() => {
        this.speed = 200;
      }, 3000);
    }
  }

  update(dt) {
    this.time += dt;
    super.update(dt);
    // Update score
    this.score += dt * Constants.SCORE_PER_SECOND;

    // Make sure the player stays in bounds
    this.x = Math.max(0, Math.min(Constants.MAP_SIZE, this.x));
    this.y = Math.max(0, Math.min(Constants.MAP_SIZE, this.y));

    return null;
  }

  killPlayer() {
    this.hp = 0;
  }

  onDealtDamage() {
    this.score += Constants.SCORE;
    this.kill += 1;
    this.point += 1;
    this.switches += 1;
    this.teleport += 0.1;
    this.pushPlayer += 0.2;
  }

  addSwitches(n) {
    this.switches += 11 - n;
  }

  updateSwitches() {
    this.switches -= 1;
  }

  updateTeleport() {
    this.teleport -= 1;
  }

  updatePushPlayer() {
    this.pushPlayer -= 1;
  }

  serializeForUpdate() {
    return {
      ...(super.serializeForUpdate()),
      username: this.username,
      direction: this.direction,
      hp: this.hp,
      switches: this.switches,
      teleport: this.teleport,
      pushPlayer: this.pushPlayer,
      skin: this.skin,
      time: this.time,
      score: this.score,
      kill: this.kill,
      point: this.point,
    };
  }
}

module.exports = Player;
