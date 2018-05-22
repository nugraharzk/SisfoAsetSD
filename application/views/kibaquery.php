$(document).on( "click", '.btnEdit',function(e) {
  var id = $(this).data('id');
  var nama = $(this).data('nama');
  var luas = $(this).data('luas');
  var tahun = $(this).data('tahun');
  var statusHak = $(this).data('statusHak');
  var penggunaan = $(this).data('penggunaan');

  $(".kibaId").val(id);
  $(".kibaNama").val(nama);
  $(".kibaLuas").val(luas);
  $(".kibaTahun").val(tahun);
  $(".kibaStatusHak").val(statusHak);
  $(".kibaPenggunaan").val(penggunaan);
});