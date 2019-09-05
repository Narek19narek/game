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
    this.x = ((this.x - obj.x) * 300 / dist > 3000) ? 3000 : obj.x + (this.x - obj.x) * 300 / dist;
    this.y = ((this.y - obj.y) * 300 / dist > 3000) ? 3000 : obj.y + (this.y - obj.y) * 300 / dist;
  }

  distanceTo(object) {
    const dx = this.x - object.x;
    const dy = this.y - object.y;
    return Math.sqrt(dx * dx + dy * dy);
  }

  setDirection(dir) {
    this.direction = dir;
  }

  setRotate(angle) {
    this.rotate = angle;
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
