$(document).on("click", '.btnInfo', function(e){
	var id = $(this).data('id');
	var reg = $(this).data('reg');
	var nama = $(this).data('nama');
	var type = $(this).data('type');
	var ukuran = $(this).data('ukuran');
	var bahan = $(this).data('bahan');
	var tahun = $(this).data('tahun');
	var nomor_mesin = $(this).data('nomor_mesin');
	var peroleh = $(this).data('peroleh');
	var dana = $(this).data('dana');
	var sbarang = $(this).data('sbarang');
	var kondisi = $(this).data('kondisi');
	var penggunaan = $(this).data('penggunaan');
	var harga = $(this).data('harga');
	var kontrak = $(this).data('kontrak');
	var ctt_baik = $(this).data('ctt_baik');
	var ctt_ringan = $(this).data('ctt_ringan');
	var ctt_berat = $(this).data('ctt_berat');
	var data_inven = $(this).data('data_inven');
	var nilai_inven = $(this).data('nilai_inven');
	var posisi = $(this).data('posisi');
	var pemakai_barang = $(this).data('pemakai_barang');
	var korelasi = $(this).data('korelasi');

	$(".kib_bId").val(id);
	$(".kib_bReg").val(reg);
	$(".kib_bNama").val(nama);
	$(".kib_bType").val(type);
	$(".kib_bUkuran").val(ukuran);
	$(".kib_bBahan").val(bahan);
	$(".kib_bTahun").val(tahun);
	$(".kib_bNomorMesin").val(nomor_mesin);
	$(".kib_bPeroleh").val(peroleh);
	$(".kib_bDana").val(dana);
	$(".kib_bBarang").val(sbarang);
	$(".kib_bKondisi").val(kondisi);
	$(".kib_bPenggunaan").val(penggunaan);
	$(".kib_bHarga").val(harga);
	$(".kib_bKontrak").val(kontrak);
	$(".kib_bBaik").val(ctt_baik);
	$(".kib_bRingan").val(ctt_ringan);
	$(".kib_bBerat").val(ctt_berat);
	$(".kib_bDInven").val(data_inven);
	$(".kib_bNInven").val(nilai_inven);
	$(".kib_bPosisi").val(posisi);
	$(".kib_bPemakai").val(pemakai_barang);
	$(".kib_bKorelasi").val(korelasi);
});

$(document).on( "click", '.btnEdit',function(e) {
	var id = $(this).data('id');
	var reg = $(this).data('reg');
	var nama = $(this).data('nama');
	var type = $(this).data('type');
	var ukuran = $(this).data('ukuran');
	var bahan = $(this).data('bahan');
	var tahun = $(this).data('tahun');
	var nomor_mesin = $(this).data('nomor_mesin');
	var peroleh = $(this).data('peroleh');
	var dana = $(this).data('dana');
	var sbarang = $(this).data('sbarang');
	var kondisi = $(this).data('kondisi');
	var penggunaan = $(this).data('penggunaan');
	var harga = $(this).data('harga');
	var kontrak = $(this).data('kontrak');
	var ctt_baik = $(this).data('ctt_baik');
	var ctt_ringan = $(this).data('ctt_ringan');
	var ctt_berat = $(this).data('ctt_berat');
	var data_inven = $(this).data('data_inven');
	var nilai_inven = $(this).data('nilai_inven');
	var posisi = $(this).data('posisi');
	var pemakai_barang = $(this).data('pemakai_barang');
	var korelasi = $(this).data('korelasi');

	$(".kibbId").val(id);
	$(".kibbReg").val(reg);
	$(".kibbNama").val(nama);
	$(".kibbType").val(type);
	$(".kibbUkuran").val(ukuran);
	$(".kibbBahan").val(bahan);
	$(".kibbTahun").val(tahun);
	$(".kibbNomorMesin").val(nomor_mesin);
	$(".kibbPeroleh").val(peroleh);
	$(".kibbDana").val(dana);
	$(".kibbBarang").val(sbarang);
	$(".kibbKondisi").val(kondisi);
	$(".kibbPenggunaan").val(penggunaan);
	$(".kibbHarga").val(harga);
	$(".kibbKontrak").val(kontrak);
	$(".kibbBaik").val(ctt_baik);
	$(".kibbRingan").val(ctt_ringan);
	$(".kibbBerat").val(ctt_berat);
	$(".kibbDInven").val(data_inven);
	$(".kibbNInven").val(nilai_inven);
	$(".kibbPosisi").val(posisi);
	$(".kibbPemakai").val(pemakai_barang);
	$(".kibbKorelasi").val(korelasi);
});

$(document).on("click", '.btnDelete', function(e) {
  var id = $(this).data('id');
  window.location.href = "http://localhost/asetsd/asset/deleteKibb/"+id;
});