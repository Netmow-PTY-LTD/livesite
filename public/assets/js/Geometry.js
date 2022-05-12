var Geometry = {
	ORIGIN : new Coordinate(0, 0),
  INFINITY : new Coordinate(9999999,9999999),

	upperLeftPosition : function(element) {
		var x = parseInt(element.style.left);
		var y = parseInt(element.style.top);
		return new Coordinate(isNaN(x) ? 0 : x, isNaN(y) ? 0 : y);
	},

	lowerRightPosition : function(element) {
		return Geometry.upperLeftPosition(element).plus(
				new Coordinate(element.offsetWidth, element.offsetHeight));
	},

	upperLeftOffset : function(element) {
		var offset = new Coordinate(parseInt(element.offsetLeft), parseInt(element.offsetTop));
		var parent = element.offsetParent;
		while (parent) {
			offset = offset.plus(
					new Coordinate(parseInt(parent.offsetLeft), parseInt(parent.offsetTop)));
			parent = parent.offsetParent;
		}
		return offset;
	},

	lowerRightOffset : function(element) {
		return Geometry.upperLeftOffset(element).plus(
				new Coordinate(parseInt(element.offsetWidth), parseInt(element.offsetHeight)));
	},
  
  offsetBox : function(element){
    return new Box(Geometry.upperLeftOffset(element),Geometry.lowerRightOffset(element));
  },

  positionBox : function(element){
    return new Box(Geometry.upperLeftPosition(element),Geometry.lowerRightPosition(element));
  },
  
  reposition : function(element,coor) {coor.reposition(element);}
    
};

function Coordinate(x,y){
  this.x=x;
  this.y=y;
}

Coordinate.prototype.plus=function(coor){
  return new Coordinate(this.x+coor.x, this.y+coor.y);
}
Coordinate.prototype.minus = function(coor) {
	return new Coordinate(this.x-coor.x, this.y-coor.y);
}

Coordinate.prototype.distance = function(coor) {
	var deltaX = this.x - coor.x;
	var deltaY = this.y - coor.y;
	return Math.sqrt(Math.pow(deltaX, 2) + Math.pow(deltaY, 2));
}

Coordinate.prototype.max = function(coor) {
	var x = Math.max(this.x, coor.x);
	var y = Math.max(this.y, coor.y);
	return new Coordinate(x, y);
}

Coordinate.prototype.constrain = function(box) {
	if (box.upperLeft.x > box.lowerRight.x || box.upperLeft.y > box.lowerRight.y) return this;
	var x = this.x;
	var y = this.y;
	if (box.upperLeft.x != null) x = Math.max(x, box.upperLeft.x);
	if (box.lowerRight.x != null) x = Math.min(x, box.lowerRight.x);
	if (box.upperLeft.y != null) y = Math.max(y, box.upperLeft.y);
	if (box.lowerRight.y != null) y = Math.min(y, box.lowerRight.y);
	return new Coordinate(x, y);
}

Coordinate.prototype.reposition = function(element) {
	element.style["top"] = this.y + "px";
	element.style["left"] = this.x + "px";
}

Coordinate.prototype.repositionOffset = function(element) {
	element.style["offsetTop"] = this.y + "px";
	element.style["offsetLeft"] = this.x + "px";
}


Coordinate.prototype.equals = function(that) {
	if (this == that) return true;
	if (!that || that == null) return false;

	return this.x == that.x && this.y == that.y;
}

Coordinate.prototype.inside = function(box) {
	if ((this.x >= box.upperLeft.x) && (this.x <= box.lowerRight.x) &&
		(this.y >= box.upperLeft.y) && (this.y <= box.lowerRight.y)) {		
		return true;
	}
	return false;
}





function Box(x1,y1,x2,y2){
  if(x2==null){
    this.upperLeft=new Coordinate(x1.x,x1.y);
    this.lowerRight=new Coordinate(y1.x,y1.y);
  }else{
    this.upperLeft= new Coordinate(x1,y1);
    this.lowerRight= new Coordinate(x2,y2);
  }
}

Box.prototype.inside = function(coor) {
	if ((coor.x >= this.upperLeft.x) && (coor.x <= this.lowerRight.x) &&
		(coor.y >= this.upperLeft.y) && (coor.y <= this.lowerRight.y)) {		
		return true;
	}
	return false;
}

Box.prototype.constrain = function(coor) {
	if (this.upperLeft.x > this.lowerRight.x || this.upperLeft.y > this.lowerRight.y) return coor;
	var x = coor.x;
	var y = coor.y;
	if (this.upperLeft.x != null) x = Math.max(x, this.upperLeft.x);
	if (this.lowerRight.x != null) x = Math.min(x, this.lowerRight.x);
	if (this.upperLeft.y != null) y = Math.max(y, this.upperLeft.y);
	if (this.lowerRight.y != null) y = Math.min(y, this.lowerRight.y);
	return new Coordinate(x, y);
}

