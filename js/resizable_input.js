function resizable (el, factor) {
    let int = Number(factor);

    function resize() {
        el.style.width = ((el.value.length+4) * int) + 'px';
    }

    let e = 'keyup,keypress,focus,blur,change'.split(',');
    for (let i in e) 
        el.addEventListener(e[i],resize,false);
    resize();
  }

  resizable(document.getElementById('username'), 10);