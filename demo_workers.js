let i = 0;

function timedCount() {
  i ++;
  postMessage(i); //postMessage se usa para devolver un msj a la página HTML
  setTimeout("timedCount()",500);
}

timedCount();