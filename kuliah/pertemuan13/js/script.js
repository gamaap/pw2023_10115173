const tombolCari = document.querySelector(".tombol-cari")
const keyword = document.querySelector('.keyword');
const container = document.querySelector('.container')

// hide tombol cari
tombolCari.style.display = 'none';

//event ketika kita menuliskan keyword
keyword.addEventListener('keyup', function() {
  // jalankan ajax menggunakan metode xmlhttprequest
  // const xhr = new XMLHttpRequest();
  // xhr.onreadystatechange = function () {
  //   if(xhr.readyState == 4 && xhr.status == 200) {
  //     container.innerHTML = xhr.responseText
  //   }
  // }

  // xhr.open('get', 'ajax/ajax_cari.php?keyword=' + keyword.value)
  // xhr.send()

  // menggunakan metode fetch
  fetch('ajax/ajax_cari.php?keyword=' + keyword.value)
    .then((response) => response.text())
    .then((response) => container.innerHTML = response)
});

// preview image untuk tambah dan ubah
function previewImage() {
  const gambar = document.querySelector('#gambar');
  const imgPrev = document.querySelector('#img-preview');

  const oFReader = new FileReader();
  oFReader.readAsDataURL(gambar.files[0]);

  oFReader.onload = function(oFREvent) {
    imgPrev.src = oFREvent.target.result;
  }
}