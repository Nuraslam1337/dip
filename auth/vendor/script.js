document.getElementById('imag').onchange = function () {
    var src = URL.createObjectURL(this.files[0])
    document.getElementById('image').src = src
  }