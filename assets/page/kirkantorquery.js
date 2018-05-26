$(document).on("click", '.btnInfo', function(e){
	var id = $(this).data('id');
	var nama = $(this).data('nama');
	var tahun = $(this).data('tahun');
	var jumlah = $(this).data('jumlah');
	var harga = $(this).data('harga');

	$(".kir_Id").val(id);
	$(".kir_Nama").val(nama);
	$(".kir_Tahun").val(tahun);
	$(".kir_Jumlah").val(jumlah);
	$(".kir_Harga").val(harga);
});

$(document).on( "click", '.btnEdit',function(e) {
	var id = $(this).data('id');
	var nama = $(this).data('nama');
	var tahun = $(this).data('tahun');
	var jumlah = $(this).data('jumlah');
	var harga = $(this).data('harga');

	$(".kirId").val(id);
	$(".kirNama").val(nama);
	$(".kirTahun").val(tahun);
	$(".kirJumlah").val(jumlah);
	$(".kirHarga").val(harga);
});

$(document).on("click", '.btnDelete', function(e) {
  var id = $(this).data('id');
  window.location.href = "http://localhost/asetsd/asset/deleteKir/"+id;
});
