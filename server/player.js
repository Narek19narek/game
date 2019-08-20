const ObjectClass = require('./object');
// const Bullet = require('./bullet');
const Constants = require('../resources/js/constants');

class Player extends ObjectClass {
  constructor(id, username, x, y, status, rotate) {
    super(id, x, y, Math.random() * 2 * Math.PI, Constants.PLAYER_SPEED, status, rotate);
    this.username = username;
    this.hp = Constants.PLAYER_MAX_HP;
    this.fireCooldown = 0;
    this.score = 0;
    this.point = 0;
    this.switches = Constants.PLAYER_SWITCHES;
    this.teleport = Constants.PLAYER_TELEPORTS;
    this.pushPlayer = Constants.PLAYER_PUSH_PLAYERS;
    this.time = 0;
  }

  // updateTime() {
  //   this.time = ;
  // }

  // Returns a newly created bullet, or null.
  updateSpeed() {
    if (this.point) {
      this.point--;
      this.speed = 400;
      setTimeout(() => {
        this.speed = 200;
      }, 1000);
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

    // Fire a bullet, if needed
    // this.fireCooldown -= dt;
    // if (this.fireCooldown <= 0) {
    //   this.fireCooldown += Constants.PLAYER_FIRE_COOLDOWN;
    //   return new Bullet(this.id, this.x, this.y, this.direction);
    // }

    return null;
  }

  killPlayer() {
    this.hp = 0;
  }

  onDealtDamage() {
    this.score += Constants.SCORE;
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
      time: this.time,
      score: this.score,
      point: this.point,
    };
  }
}

module.exports = Player;
