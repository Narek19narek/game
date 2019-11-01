const constants = require('../resources/js/constants');

class Object {
  constructor(id, x, y, dir, speed, status) {
    this.id = id;
    this.x = x;
    this.y = y;
    this.direction = dir;
    this.speed = speed;
    this.status = status;
  }

  update(dt) {
    this.x += dt * this.speed * Math.sin(this.direction);
    this.y -= dt * this.speed * Math.cos(this.direction);
  }

  updatePush(dist, obj) {
      if (dist === 0) {
        this.x = this.x < constants.MAP_SIZE / 2 ? obj.x + 200 : obj.x - 200;
        this.y = this.y < constants.MAP_SIZE / 2 ? obj.y + 200 : obj.y - 200;
      } else {
        this.x = ((this.x - obj.x) * 300 / dist > constants.MAP_SIZE) ? constants.MAP_SIZE : obj.x + (this.x - obj.x) * 300 / dist;
        this.y = ((this.y - obj.y) * 300 / dist > constants.MAP_SIZE) ? constants.MAP_SIZE : obj.y + (this.y - obj.y) * 300 / dist;
      }
  }

  distanceTo(object) {
    const dx = this.x - object.x;
    const dy = this.y - object.y;
    return Math.sqrt(dx * dx + dy * dy);
  }

  setDirection(dir) {
    this.direction = dir;
  }

  serializeForUpdate() {
    return {
      id: this.id,
      x: this.x,
      y: this.y,
      status: this.status,
    };
  }
}

module.exports = Object;
