$(document).ready(function () {
    $(".btn-tambah").click(function () {
        $(".form-edit").css("display", "none");
        $(".form-tambah").css("display", "inline");
    });
    $(".btn-edit").click(function () {
        $(".form-tambah").css("display", "none");
        $(".form-edit").css("display", "inline");
    });

    const baseurl = window.location.origin + window.location.pathname;
    const ambil = baseurl.substring(49, 55);
    if (baseurl == 'http://localhost/parking_system/transaksi/add') {
        $(".form-edit").css("display", "none");
        $(".form-tambah").css("display", "inline");
    }
    else if (baseurl == "http://localhost/parking_system/transaksi/update/" + ambil) {

        $(".form-tambah").css("display", "none");
        $(".form-edit").css("display", "inline");
    }
    else {
        $(".form-tambah").css("display", "none");
        $(".form-edit").css("display", "none");
        // $("#btnEditCancel").css("display","none"); 
        // $("#btnEditSave").css("display","none"); 
    }
});

function getdate() {
    let today = new Date();
    let h = today.getHours();
    let m = today.getMinutes();
    let s = today.getSeconds();
    let y = today.getFullYear();
    let mnth = today.getMonth() + 1;
    let d = today.getDate();
    if (s < 10) s = "0" + s;
    if (m < 10) m = "0" + m;
    if (h < 10) h = "0" + h;
    if (mnth < 10) mnth = "0" + mnth;
    if (d < 10) d = "0" + d;
    $("#dateTime").val(d + "/" + mnth + "/" + y + " " + h + ":" + m + ":" + s);

    setTimeout(function () { getdate() }, 500);
}
$(document).ready(function () {
    getdate();
});

const flashData = $('.flash-data').data('flashdata');
if (flashData) {
    Swal({
        title: 'Data Transaksi ',
        text: 'Berhasil ' + flashData,
        type: 'success'
    });
}

$('.tombol-hapus').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Apakah Anda Yakin',
        text: "Data Transaksi Akan Dihapus",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
});

$('#jamKeluarAdd').on('change', function () {
    hitungBiayaAndJam();
});


$('#jenisKendaraanAdd').on('change', function () {
    if ($('#jamKeluarAdd').val() != '') hitungBiayaAndJam();
});

function hitungBiayaAndJam() {
    const jamMasukRaw = $('#dateTime').val();
    const tahun = jamMasukRaw.substr(6, 4);
    const bulan = jamMasukRaw.substr(3, 2);
    const tanggal = jamMasukRaw.substr(0, 2);
    const hour = jamMasukRaw.substr(11, 2);
    const menit = jamMasukRaw.substr(14, 2);
    const detik = jamMasukRaw.substr(17, 2);
    let jamMasuk = tahun + '-' + bulan + '-' + tanggal + 'T' + hour + ':' + menit + ':' + detik;

    jamMasuk = new Date(jamMasuk);
    const jamKeluar = new Date($('#jamKeluarAdd').val());

    const timeMasuk = jamMasuk.getTime();
    const timeKeluar = jamKeluar.getTime();
    let min, sec, newHour;
    let diffInHours = (timeKeluar - timeMasuk) / (3600 * 1000);
    if (diffInHours < 0) {
        return Swal({
            title: 'Masukan Tanggal Yang Bener ',
            type: 'warning'
        });
    }

    newHour = diffInHours.toString().split('.')[0];
    if (diffInHours.toString().indexOf('.') != -1) {
        min = '0.' + (diffInHours.toString().split('.')[1]);
        min = min * 60;
    } else min = 0;

    if (min.toString().indexOf('.') != -1) {
        sec = '0.' + (min.toString().split('.')[1]);
        sec = sec * 60;
    } else sec = 0;

    min = Math.floor(min);
    sec = Math.floor(sec);

    if (sec < 10) sec = "0" + sec;
    if (min < 10) min = "0" + min;
    if (newHour < 10) newHour = "0" + newHour;

    let durasi = newHour + ':' + min + ':' + sec;
    $('#durasiAdd').val(durasi);

    if (diffInHours < 1) diffInHours = 1;

    let harga;
    if ($('#jenisKendaraanAdd').val() == 'Motor') harga = 2000
    else if ($('#jenisKendaraanAdd').val() == 'Mobil') harga = 3000
    else return Swal({
        title: 'Pilih Jenis Kendaraan',
        type: 'warning'
    });
    const biaya = Math.round(diffInHours) * harga;

    // $('#biayaAdd').val(biaya);

    const rupiah = document.getElementById("biayaAdd");
    rupiah.value = formatRupiah(biaya, "Rp. ");

    const tandaKoma = $('#biayaAdd').val();
    $('#biayaAdd').val(tandaKoma + ",00");
}

function formatRupiah(angka, prefix) {
    let number_string = angka.toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
    }

    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}

// update
$('#jamMasukUp').on('change', function () {
    hitungBiayaAndJamUp();
});

$('#jamKeluarUp').on('change', function () {
    hitungBiayaAndJamUp();
});

$('#jenisKendaraanUp').on('change', function () {
    if ($('#jamKeluarUp').val() != '') hitungBiayaAndJamUp();
});

function hitungBiayaAndJamUp() {
    const jamMasuk = new Date($('#jamMasukUp').val());
    const jamKeluar = new Date($('#jamKeluarUp').val());

    const timeMasuk = jamMasuk.getTime();
    const timeKeluar = jamKeluar.getTime();
    let min, sec, newHour;
    let diffInHours = (timeKeluar - timeMasuk) / (3600 * 1000);
    if (diffInHours < 0) {
        return Swal({
            title: 'Masukan Tanggal Yang Bener ',
            type: 'warning'
        });
    }

    newHour = diffInHours.toString().split('.')[0];
    if (diffInHours.toString().indexOf('.') != -1) {
        min = '0.' + (diffInHours.toString().split('.')[1]);
        min = min * 60;
    } else min = 0;

    if (min.toString().indexOf('.') != -1) {
        sec = '0.' + (min.toString().split('.')[1]);
        sec = sec * 60;
    } else sec = 0;

    min = Math.floor(min);
    sec = Math.floor(sec);

    if (sec < 10) sec = "0" + sec;
    if (min < 10) min = "0" + min;
    if (newHour < 10) newHour = "0" + newHour;

    let durasi = newHour + ':' + min + ':' + sec;
    $('#durasiUp').val(durasi);

    if (diffInHours < 1) diffInHours = 1;

    let harga;
    if ($('#jenisKendaraanUp').val() == 'Motor') harga = 2000
    else if ($('#jenisKendaraanUp').val() == 'Mobil') harga = 3000
    else return Swal({
        title: 'Pilih Jenis Kendaraan',
        type: 'warning'
    });

    const biaya = Math.round(diffInHours) * harga;

    // $('#biayaAdd').val(biaya);

    const rupiah = document.getElementById("biayaUp");
    rupiah.value = formatRupiah(biaya, "Rp. ");

    const tandaKoma = $('#biayaUp').val();
    $('#biayaUp').val(tandaKoma + ",00");
}