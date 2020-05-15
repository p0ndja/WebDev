<?php require '../global/connect.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require '../global/head.php'; ?>
    <style>
    body{
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100vh;
  background: #000;
  font-family: 'Oswald', sans-serif;
}

#text {
  display: flex;
  height: 100vh;
  align-items: center;
  justify-content: center;
  text-align: center;
}

h2{
  color: #fff;
  font-size: 47px;
  line-height: 40px;
}

#container {
  left: 0px;
  top: -100px;
  height: calc(100vh + 100px);
  overflow: hidden;
  position: relative;
}

#animate{
  margin: 0 auto;
  width: 20px;
  overflow: visible;
  position: relative;
}

#all{
  overflow: hidden;
  height: 100vh;
  width: 100%;
  position: fixed;
}

#footer{
  color: #808080;
  text-decoration: none;
  position: fixed;
  width: 752px;
  bottom: 20px;
  align-content: center;
  float: none;
  margin-left: calc(50% - 376px);
}

a, p{
  text-decoration: none;
  color: #808080;
  letter-spacing: 6px;
  transition: all 0.5s ease-in-out;
  width: auto;
  float: left;
  margin: 0;
  margin-right: 9px;
}

a:hover{
  color: #fff;
  letter-spacing: 2px;
  transition: all 0.5s ease-in-out;
}
    </style>
</head>

<body class="admin">
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal scrolling-navbar admin" id="nav" role="navigation">
        <?php require '../global/navbar.php'; ?>
    </nav>
    <?php require '../global/admin_sideNav.php'; ?>
    <div class="container-fluid" id="main" style="padding-top: 19px">
    <link href="https://fonts.googleapis.com/css?family=Oswald:600,700" rel="stylesheet"> 
<div id="all">
<div id="container">
  <div id="animate">
  </div>
</div>
</div>
<div id="text">
<h2>EMOJI RAIN</h2>
</div>
<div id="footer">
  <p>modified version by</p><a href="https://www.behance.net/robertheiser" target="_blank">Robert Heiser</a><p>, original by</p><a href="https://codepen.io/rachsmith/pen/xwbLWg" target="_blank">Rachel Smith</a>
</div>
    </div>
</div>
    </div>

    <?php require '../global/popup.php'; ?>
    <footer class="d-none">
        <?php require '../global/footer.php' ?>
    </footer>
</body>
<script>
var container = document.getElementById('animate');
var emoji = ['🌽', '🍇', '🍌', '🍒', '🍕', '🍷', '🍭', '💖', '💩', '🐷', '🐸', '🐳', '🎃', '🎾', '🌈', '🍦', '💁', '🔥', '😁', '😱', '🌴', '👏', '💃'];
var circles = [];

for (var i = 0; i < 15; i++) {
  addCircle(i * 150, [10 + 0, 300], emoji[Math.floor(Math.random() * emoji.length)]);
  addCircle(i * 150, [10 + 0, -300], emoji[Math.floor(Math.random() * emoji.length)]);
  addCircle(i * 150, [10 - 200, -300], emoji[Math.floor(Math.random() * emoji.length)]);
  addCircle(i * 150, [10 + 200, 300], emoji[Math.floor(Math.random() * emoji.length)]);
  addCircle(i * 150, [10 - 400, -300], emoji[Math.floor(Math.random() * emoji.length)]);
  addCircle(i * 150, [10 + 400, 300], emoji[Math.floor(Math.random() * emoji.length)]);
  addCircle(i * 150, [10 - 600, -300], emoji[Math.floor(Math.random() * emoji.length)]);
  addCircle(i * 150, [10 + 600, 300], emoji[Math.floor(Math.random() * emoji.length)]);
}



function addCircle(delay, range, color) {
  setTimeout(function() {
    var c = new Circle(range[0] + Math.random() * range[1], 80 + Math.random() * 4, color, {
      x: -0.15 + Math.random() * 0.3,
      y: 1 + Math.random() * 1
    }, range);
    circles.push(c);
  }, delay);
}

function Circle(x, y, c, v, range) {
  var _this = this;
  this.x = x;
  this.y = y;
  this.color = c;
  this.v = v;
  this.range = range;
  this.element = document.createElement('span');
  /*this.element.style.display = 'block';*/
  this.element.style.opacity = 0;
  this.element.style.position = 'absolute';
  this.element.style.fontSize = '26px';
  this.element.style.color = 'hsl('+(Math.random()*360|0)+',80%,50%)';
  this.element.innerHTML = c;
  container.appendChild(this.element);

  this.update = function() {
    if (_this.y > 800) {
      _this.y = 80 + Math.random() * 4;
      _this.x = _this.range[0] + Math.random() * _this.range[1];
    }
    _this.y += _this.v.y;
    _this.x += _this.v.x;
    this.element.style.opacity = 1;
    this.element.style.transform = 'translate3d(' + _this.x + 'px, ' + _this.y + 'px, 0px)';
    this.element.style.webkitTransform = 'translate3d(' + _this.x + 'px, ' + _this.y + 'px, 0px)';
    this.element.style.mozTransform = 'translate3d(' + _this.x + 'px, ' + _this.y + 'px, 0px)';
  };
}

function animate() {
  for (var i in circles) {
    circles[i].update();
  }
  requestAnimationFrame(animate);
}

animate();
</script>

</html>