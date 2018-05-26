$(document).on("click", '.btnInfo', function(e){
	var id = $(this).data('id');
	var reg = $(this).data('reg');
	var nama = $(this).data('nama');
	var luas = $(this).data('luas');
	var tahun = $(this).data('tahun');
	var alamat = $(this).data('alamat');
	var penggunaan = $(this).data('penggunaan');
	var peroleh = $(this).data('peroleh');
	var hak = $(this).data('hak');
	var harga = $(this).data('harga');
	var dana = $(this).data('dana');
	var sbarang = $(this).data('sbarang');
	var kondisi = $(this).data('kondisi');
	var korelasi = $(this).data('korelasi');
	var asal = $(this).data('asal');

	$(".kib_aId").val(id);
	$(".kib_aReg").val(reg);
	$(".kib_aNama").val(nama);
	$(".kib_aLuas").val(luas);
	$(".kib_aTahun").val(tahun);
	$(".kib_aAlamat").val(alamat);
	$(".kib_aPenggunaan").val(penggunaan);
	$(".kib_aPerolehan").val(peroleh);
	$(".kib_aHak").val(hak);
	$(".kib_aHarga").val(harga);
	$(".kib_aDana").val(dana);
	$(".kib_aBarang").val(sbarang);
	$(".kib_aKondisi").val(kondisi);
	$(".kib_aKorelasi").val(korelasi);
	$(".kib_aAsal").val(asal);
});

$(document).on( "click", '.btnEdit',function(e) {
	var id = $(this).data('id');
	var reg = $(this).data('reg');
	var nama = $(this).data('nama');
	var luas = $(this).data('luas');
	var tahun = $(this).data('tahun');
	var alamat = $(this).data('alamat');
	var penggunaan = $(this).data('penggunaan');
	var peroleh = $(this).data('peroleh');
	var hak = $(this).data('hak');
	var harga = $(this).data('harga');
	var dana = $(this).data('dana');
	var sbarang = $(this).data('sbarang');
	var kondisi = $(this).data('kondisi');
	var korelasi = $(this).data('korelasi');
	var asal = $(this).data('asal');

	$(".kibaId").val(id);
	$(".kibaReg").val(reg);
	$(".kibaNama").val(nama);
	$(".kibaLuas").val(luas);
	$(".kibaTahun").val(tahun);
	$(".kibaAlamat").val(alamat);
	$(".kibaPenggunaan").val(penggunaan);
	$(".kibaPerolehan").val(peroleh);
	$(".kibaHak").val(hak);
	$(".kibaHarga").val(harga);
	$(".kibaDana").val(dana);
	$(".kibaBarang").val(sbarang);
	$(".kibaKondisi").val(kondisi);
	$(".kibaKorelasi").val(korelasi);
	$(".kibaAsal").val(asal);
});

$(document).on("click", '.btnDelete', function(e) {
  var id = $(this).data('id');
  window.location.href = "http://localhost/asetsd/asset/deleteKiba/"+id;
});