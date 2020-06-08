    </div>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

<!-- Moment JS -->
<script src="../assets/js/plugin/moment/moment.min.js"></script>

<!-- Chart JS -->
<script src="../assets/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="../assets/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="../assets/js/plugin/datatables/datatables.min.js"></script>
<script type="text/javascript">
   

    $(document).ready(function () {
        $('#patientt-datatables').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo base_url('Home/listPatient') ?>",
                "dataType": "json",
                "type": "POST",
                data: function (d) {
                    d.filter = $('#filter').val();
                },

                "complete": function (json, type) {

                    //console.log(json);
                    temp = json['responseText'].substr(json['responseText'].indexOf('token') + 8);
                    temp2 = temp.split('"');
                    $token = temp2[0];
                    // $('#token').val(temp2[0]);

                },
                "error": function (xhr, ajaxOptions, thrownError) {
                    //alert(xhr.status);
                    // alert(xhr.responseText);
                    console.log(xhr.responseText);
                    // alert(thrownError);
                }
            },
            "columns": [
           		{"data": 'RegistrationNo'},
            	{"data": 'PatientName'},
                {"data": 'MedicalNo'},
                {"data": 'ServiceUnitName'},
              	{"data": 'DischargeDate'},
                {
                	data: 'MedicalNo',
                	render: function (data, type, full, meta) {
                        temp = '<button name="btnBag1" class="btnBag1 btn btn-primary btn-round" data-id="'+data+'">Identitas Pasien</button>';
                        return temp;
                    }
            	},

                {
                    data: "MedicalNo",
                    render: function (data, type, full, meta) {
                    temp = '<button name="btnBag2" class="btnBag2 btn btn-info btn-round" data-id="'+data+'">Pemeriksaan Penunjang</button>';
                    return temp;
                    }
                },
                {
                    data: "MedicalNo",

                    render: function (data, type, full, meta) {
                        temp = '<button name="btnBag3" class="btnBag3 btn btn-warning btn-round" data-id="'+data+'">Kondisi Pasien</button>';
                        return temp;
                    }
                },
            ]

        });
    });
</script>
<script>
function update3()
{
	$faktor = document.getElementById('txtFaktorResiko').value;
	$medicalno = document.getElementById('medicalno').value;
	$penyakit = document.getElementById('txtPenyakit').value;
	var e = document.getElementById("statusRawat");
	$status_rawat= e.options[e.selectedIndex].value;
	$pindah = document.getElementById('txtPindahRuang').value;
	$sembuh = document.getElementById('txtSembuhKRS').value;
	$pulangpaksa = document.getElementById('txtPulangPaksa').value;
	$meninggal = document.getElementById('txtMeninggal').value;
	$entry = document.getElementById('txtEntryWeb').value;
	$keterangan2 = document.getElementById('txtKeterangan2').value;
	$keterangan = document.getElementById('txtKeterangan').value;
	$status = document.getElementById('txtStatus').value;
	data = new FormData();
	data.append("medicalno",$medicalno);
	data.append("faktor",$faktor);
	data.append("penyakit",$penyakit);
	data.append("status_rawat",$status_rawat);
	data.append("pindah",$pindah);
	data.append("sembuh",$sembuh);
	data.append("pulangpaksa",$pulangpaksa);
	data.append("meninggal",$meninggal);
	data.append("entry",$entry);
	data.append("keterangan",$keterangan);
	data.append("keterangan2",$keterangan2);
	data.append("status",$status);
     $.ajax({
            data: data,      
            type: "POST",
            url: '<?php echo base_url('Home/update3');?>',
            cache: false,
             dataType: "json",
            contentType: false,
            processData: false,
            // async: false,
            success: function (result) {
            	
            	console.log(result);
            
            },
            error: function (xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.Message);
            }
        });
}
function save3()
{
	$faktor = document.getElementById('txtFaktorResiko').value;
	$medicalno = document.getElementById('medicalno').value;
	$penyakit = document.getElementById('txtPenyakit').value;
	var e = document.getElementById("statusRawat");
	$status_rawat= e.options[e.selectedIndex].value;
	$pindah = document.getElementById('txtPindahRuang').value;
	$sembuh = document.getElementById('txtSembuhKRS').value;
	$pulangpaksa = document.getElementById('txtPulangPaksa').value;
	$meninggal = document.getElementById('txtMeninggal').value;
	$entry = document.getElementById('txtEntryWeb').value;
	$keterangan2 = document.getElementById('txtKeterangan2').value;
	$keterangan = document.getElementById('txtKeterangan').value;
	$status = document.getElementById('txtStatus').value;
	data = new FormData();
	data.append("medicalno",$medicalno);
	data.append("faktor",$faktor);
	data.append("penyakit",$penyakit);
	data.append("status_rawat",$status_rawat);
	data.append("pindah",$pindah);
	data.append("sembuh",$sembuh);
	data.append("pulangpaksa",$pulangpaksa);
	data.append("meninggal",$meninggal);
	data.append("entry",$entry);
	data.append("keterangan",$keterangan);
	data.append("keterangan2",$keterangan2);
	data.append("status",$status);
     $.ajax({
            data: data,      
            type: "POST",
            url: '<?php echo base_url('Home/save3');?>',
            cache: false,
             dataType: "json",
            contentType: false,
            processData: false,
            // async: false,
            success: function (result) {
            	
            	location.reload();
            
            },
            error: function (xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.Message);
            }
        });

}
function save2()
{
	$medicalno = document.getElementById('medicalno').value;
	$hasil1 ='';
	$hasil2='';
	$hasil3='';
	$hasil4='';
	$hasil5='';
	$hasil6='';
	$hasil7='';
	$hasil8='';
	$hasil9='';
	$hasil10='';
	$tanggal1='';
	$tanggal2='';
	$tanggal3='';
	$tanggal4='';
	$tanggal5='';
	$tanggal6='';
	$tanggal7='';
	$tanggal8='';
	$tanggal9='';
	$tanggal10='';
	if(document.getElementById('checkbox1').checked == true)
	{
		$tanggal1 = document.getElementById('tanggalSwab1').value;
		var e = document.getElementById("hasil1");
		$hasil1= e.options[e.selectedIndex].value;
		alert($tanggal1);
	}
	if(document.getElementById('checkbox2').checked == true)
	{
		$tanggal2 = document.getElementById('tanggalSwab2').value;
		var f = document.getElementById("hasil2");
		$hasil2= f.options[f.selectedIndex].value;
	}
	if(document.getElementById('checkbox3').checked == true)
	{
		$tanggal3 = document.getElementById('tanggalSwab3').value;
		var g = document.getElementById("hasil3");
		$hasil3= g.options[g.selectedIndex].value;
	}
	if(document.getElementById('checkbox4').checked == true)
	{
		$tanggal4 = document.getElementById('tanggalSwab4').value;
		var h = document.getElementById("hasil4");
		$hasil4= h.options[h.selectedIndex].value;
	}
	if(document.getElementById('checkbox5').checked == true)
	{
		$tanggal5 = document.getElementById('tanggalSwab5').value;
		var i = document.getElementById("hasil5");
		$hasil5= i.options[i.selectedIndex].value;
	}
	if(document.getElementById('checkbox6').checked == true)
	{
		$tanggal1 = document.getElementById('tanggalSwab6').value;
		var j = document.getElementById("hasil6");
		$hasil6= j.options[j.selectedIndex].value;
	}
	if(document.getElementById('checkbox7').checked == true)
	{
		$tanggal7 = document.getElementById('tanggalSwab7').value;
		var k = document.getElementById("hasil7");
		$hasil7= k.options[k.selectedIndex].value;
	}
	if(document.getElementById('checkbox8').checked == true)
	{
		$tanggal8 = document.getElementById('tanggalSwab8').value;
		var l = document.getElementById("hasil8");
		$hasil8= l.options[l.selectedIndex].value;
	}
	if(document.getElementById('checkbox9').checked == true)
	{
		$tanggal9 = document.getElementById('tanggalSwab9').value;
		var m = document.getElementById("hasil9");
		$hasil9= m.options[m.selectedIndex].value;
	}
	if(document.getElementById('checkbox10').checked == true)
	{
		$tanggal10 = document.getElementById('tanggalSwab10').value;
		var n = document.getElementById("hasil10");
		$hasil10= n.options[n.selectedIndex].value;
	}
	$ambilSpesimen = document.getElementById('ambilSpesimen').value;
	$nama_rs = document.getElementById('txtNamaRs').value;
	$tanggal_rs = document.getElementById('tanggalAmbil').value;
	$hasil_rs = document.getElementById('hasilRS').value;
	
	data = new FormData();
	data.append("medicalno",$medicalno);
    data.append("hasil1",$hasil1);
    data.append("hasil2",$hasil2);
    data.append("hasil3",$hasil3);
    data.append("hasil4",$hasil4);
    data.append("hasil5",$hasil5);
    data.append("hasil6",$hasil6);
    data.append("hasil7",$hasil7);
    data.append("hasil8",$hasil8);
    data.append("hasil9",$hasil9);
    data.append("hasil10",$hasil10);
    data.append("tanggal1",$tanggal1);
    data.append("tanggal2",$tanggal2);
    data.append("tanggal3",$tanggal3);
    data.append("tanggal4",$tanggal4);
    data.append("tanggal5",$tanggal5);
    data.append("tanggal6",$tanggal6);
    data.append("tanggal7",$tanggal7);
    data.append("tanggal8",$tanggal8);
    data.append("tanggal9",$tanggal9);
    data.append("tanggal10",$tanggal10);
    data.append("ambilSpesimen",$ambilSpesimen);
   	data.append("nama_rs",$nama_rs);
    data.append("tanggal_rs",$tanggal_rs);
    data.append("hasil_rs",$hasil_rs);
     $.ajax({
            data: data,      
            type: "POST",
            url: '<?php echo base_url('Home/save2');?>',
            cache: false,
             dataType: "json",
            contentType: false,
            processData: false,
            // async: false,
            success: function (result) {
            	
            	location.reload();
            
            },
            error: function (xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.Message);
            }
        });
}
function update2()
{
	$medicalno = document.getElementById('medicalno').value;
	
	
	$hasil1 ='';
	$hasil2='';
	$hasil3='';
	$hasil4='';
	$hasil5='';
	$hasil6='';
	$hasil7='';
	$hasil8='';
	$hasil9='';
	$hasil10='';
	$tanggal1='';
	$tanggal2='';
	$tanggal3='';
	$tanggal4='';
	$tanggal5='';
	$tanggal6='';
	$tanggal7='';
	$tanggal8='';
	$tanggal9='';
	$tanggal10='';
	if(document.getElementById('checkbox1').checked == true)
	{
		$tanggal1 = document.getElementById('tanggalSwab1').value;
		var e = document.getElementById("hasil1");
		$hasil1= e.options[e.selectedIndex].value;
		alert($tanggal1);
	}
	if(document.getElementById('checkbox2').checked == true)
	{
		$tanggal2 = document.getElementById('tanggalSwab2').value;
		var f = document.getElementById("hasil2");
		$hasil2= f.options[f.selectedIndex].value;
	}
	if(document.getElementById('checkbox3').checked == true)
	{
		$tanggal3 = document.getElementById('tanggalSwab3').value;
		var g = document.getElementById("hasil3");
		$hasil3= g.options[g.selectedIndex].value;
	}
	if(document.getElementById('checkbox4').checked == true)
	{
		$tanggal4 = document.getElementById('tanggalSwab4').value;
		var h = document.getElementById("hasil4");
		$hasil4= h.options[h.selectedIndex].value;
	}
	if(document.getElementById('checkbox5').checked == true)
	{
		$tanggal5 = document.getElementById('tanggalSwab5').value;
		var i = document.getElementById("hasil5");
		$hasil5= i.options[i.selectedIndex].value;
	}
	if(document.getElementById('checkbox6').checked == true)
	{
		$tanggal1 = document.getElementById('tanggalSwab6').value;
		var j = document.getElementById("hasil6");
		$hasil6= j.options[j.selectedIndex].value;
	}
	if(document.getElementById('checkbox7').checked == true)
	{
		$tanggal7 = document.getElementById('tanggalSwab7').value;
		var k = document.getElementById("hasil7");
		$hasil7= k.options[k.selectedIndex].value;
	}
	if(document.getElementById('checkbox8').checked == true)
	{
		$tanggal8 = document.getElementById('tanggalSwab8').value;
		var l = document.getElementById("hasil8");
		$hasil8= l.options[l.selectedIndex].value;
	}
	if(document.getElementById('checkbox9').checked == true)
	{
		$tanggal9 = document.getElementById('tanggalSwab9').value;
		var m = document.getElementById("hasil9");
		$hasil9= m.options[m.selectedIndex].value;
	}
	if(document.getElementById('checkbox10').checked == true)
	{
		$tanggal10 = document.getElementById('tanggalSwab10').value;
		var n = document.getElementById("hasil10");
		$hasil10= n.options[n.selectedIndex].value;
	}

	data = new FormData();
	$ambilSpesimen = document.getElementById('ambilSpesimen').value;
	if($ambilSpesimen == "Sudah")
	{
		$nama_rs = document.getElementById('txtNamaRs').value;
		$tanggal_rs = document.getElementById('tanggalAmbil').value;
		$hasil_rs = document.getElementById('hasilRS').value;
		data.append("nama_rs",$nama_rs);
   		data.append("tanggal_rs",$tanggal_rs);
   		data.append("hasil_rs",$hasil_rs);
	}
	data.append("medicalno",$medicalno);
    data.append("hasil1",$hasil1);
    data.append("hasil2",$hasil2);
    data.append("hasil3",$hasil3);
    data.append("hasil4",$hasil4);
    data.append("hasil5",$hasil5);
    data.append("hasil6",$hasil6);
    data.append("hasil7",$hasil7);
    data.append("hasil8",$hasil8);
    data.append("hasil9",$hasil9);
    data.append("hasil10",$hasil10);
    data.append("tanggal1",$tanggal1);
    data.append("tanggal2",$tanggal2);
    data.append("tanggal3",$tanggal3);
    data.append("tanggal4",$tanggal4);
    data.append("tanggal5",$tanggal5);
    data.append("tanggal6",$tanggal6);
    data.append("tanggal7",$tanggal7);
    data.append("tanggal8",$tanggal8);
    data.append("tanggal9",$tanggal9);
    data.append("tanggal10",$tanggal10);
    data.append("ambilSpesimen",$ambilSpesimen);
  
     $.ajax({
            data: data,      
            type: "POST",
            url: '<?php echo base_url('Home/update2');?>',
            cache: false,
             dataType: "json",
            contentType: false,
            processData: false,
            // async: false,
            success: function (result) {
            	location.reload();
            
            },
            error: function (xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.Message);
            }
        });
}
function save()
{
	$medicalno = document.getElementById('medicalno').value;
	
	$jumlah_kontak = document.getElementById('txtJumlahKontakErat').value;
	$nama_kontak = document.getElementById('txtNamaKontakErat').value;
	$umur_kontak = document.getElementById('txtUmurKontakErat').value;
	$jenis_kontak = document.getElementById('txtJenisKelamin').value;
	$alamat_kontak = document.getElementById('txtAlamatKontakErat').value;
	$hp_kontak = document.getElementById('txtHpKontakErat').value;
	$aktivitas_kontak = document.getElementById('txtAktivitas').value;
	var e = document.getElementById("statusAwal");
	$statusAwal= e.options[e.selectedIndex].value;
	var d = document.getElementById("statusDari");
	$statusDari= d.options[d.selectedIndex].value;
	
	$tanggalMasuk= document.getElementById("tanggalMasuk").value;
	$status = document.getElementById('mandiriRujukan').value;
	$petugas = document.getElementById('petugasKesehatan').value;
	data = new FormData();
	 data.append("medicalno",$medicalno);
    data.append("jumlah_kontak",$jumlah_kontak);
    data.append("nama_kontak",$nama_kontak);
    data.append("umur_kontak",$umur_kontak);
    data.append("jenis_kontak",$jenis_kontak);
    data.append("alamat_kontak",$alamat_kontak);
    data.append("hp_kontak",$hp_kontak);
    data.append("aktivitas_kontak",$aktivitas_kontak);
    data.append("statusAwal",$statusAwal);
    data.append("statusDari",$statusDari);
    data.append("tanggalMasuk",$tanggalMasuk);
    data.append("status",$status);
    data.append("petugas",$petugas);
    $.ajax({
            data: data,      
            type: "POST",
            url: '<?php echo base_url('Home/save1');?>',
            cache: false,
             dataType: "json",
            contentType: false,
            processData: false,
            // async: false,
            success: function (result) {
            	
            	location.reload();
            
            },
            error: function (xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.Message);
            }
        });

}
function update()
{
	$medicalno = document.getElementById('medicalno').value;
	
	$jumlah_kontak = document.getElementById('txtJumlahKontakErat').value;
	$nama_kontak = document.getElementById('txtNamaKontakErat').value;
	$umur_kontak = document.getElementById('txtUmurKontakErat').value;
	$jenis_kontak = document.getElementById('txtJenisKelamin').value;
	$alamat_kontak = document.getElementById('txtAlamatKontakErat').value;
	$hp_kontak = document.getElementById('txtHpKontakErat').value;
	$aktivitas_kontak = document.getElementById('txtAktivitas').value;
	var e = document.getElementById("statusAwal");
	$statusAwal= e.options[e.selectedIndex].value;
	var d = document.getElementById("statusDari");
	$statusDari= d.options[d.selectedIndex].value;
	
	$tanggalMasuk= document.getElementById("tanggalMasuk").value;
	$status = document.getElementById('mandiriRujukan').value;
	$petugas = document.getElementById('petugasKesehatan').value;
	data = new FormData();
	 data.append("medicalno",$medicalno);
    data.append("jumlah_kontak",$jumlah_kontak);
    data.append("nama_kontak",$nama_kontak);
    data.append("umur_kontak",$umur_kontak);
    data.append("jenis_kontak",$jenis_kontak);
    data.append("alamat_kontak",$alamat_kontak);
    data.append("hp_kontak",$hp_kontak);
    data.append("aktivitas_kontak",$aktivitas_kontak);
    data.append("statusAwal",$statusAwal);
    data.append("statusDari",$statusDari);
    data.append("tanggalMasuk",$tanggalMasuk);
    data.append("status",$status);
    data.append("petugas",$petugas);
    $.ajax({
            data: data,      
            type: "POST",
            url: '<?php echo base_url('Home/update');?>',
            cache: false,
             dataType: "json",
            contentType: false,
            processData: false,
            // async: false,
            success: function (result) {
            	
            	
            
            },
            error: function (xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.Message);
            }
        });

}
function tampilRS()
{
	var x = document.getElementById("ambilSpesimen").value;
	if(x =='Sudah')
	{
		var x = document.getElementById("info-rs");
		 x.style.display = "block";
		// $('#info-rs').html('<b>Swab dari RS Lain : </b><p>Nama RS : </p> <input type="text" id="txtNamaRs" class="form-control"><p>Tanggal <input type="date" id="tanggalAmbil"><select id="hasilRS"><option value="POSITIF">Positif</option><option value="NEGATIF">Negatif</option></select></p>');

	}
	else
	{
		 var x = document.getElementById("info-rs");
		 x.style.display = "none";
	}
}
</script>
<script type="text/javascript">
$(document).on('click','.btnBag3',function(){
	$role = document.getElementById('txtRole').value;
	 $no=$(this).data('id');
	 data = new FormData();
	  data.append("mrn",$no);
	  $("#modal_bagian_3").modal();
	 $.ajax({
            	data: data,      
		            type: "POST",
		            url: '<?php
		                    echo base_url('Home/getKondisi');

		                ?>',
		            dataType: "json",
		            cache: false,
		            contentType: false,
		            processData: false,
		              success: function (result2) {
		              			if(result2 != '')
		              			{
									 $temp = '';
									 $temp+='<input type="hidden" id="medicalno" value="'+$no+'"><b>Faktor Resiko </b><input type="text" class="form-control" id="txtFaktorResiko" value="'+result2[0].faktor_resiko+'">';
									 $temp+='<b>Penyakit Penyerta : </b><input type="text" class="form-control" id="txtPenyakit" value="'+result2[0].penyakit+'">';
									 $temp+='<b>Masih Dirawat : </b> <select id="statusRawat" class="form-control">'+
									 (result2[0].masih_dirawat == "Ya" ? '<option value="Ya" selected="selected">Ya</option>' : '<option value="Ya">Ya</option>')+(result2[0].masih_dirawat == "Tidak" ? '<option value="Tidak" selected="selected">Tidak</option>' : '<option value="Tidak">Tidak</option>')+'</select>';
									 $temp+='<b>Pindah ke ruangan : </b><input type="text" class="form-control" id="txtPindahRuang" value="'+result2[0].pindah_ke_ruangan+'">';
									 $temp+='<b>Sembuh KRS : </b><input type="date" class="form-control" id="txtSembuhKRS" value="'+result2[0].sembuh_krs+'">';
									 $temp+='<b>Pasien Pulang Paksa </b><input type="date" class="form-control" id="txtPulangPaksa" value="'+result2[0].pasien_pulang_paksa+'"><b> Keterangan : </b><input type="text" class="form-control" id="txtKeterangan" value="'+result2[0].keterangan_pulang+'">';
									 $temp+='<b>Meninggal : </b><input type="date" class="form-control" id="txtMeninggal" value="'+result2[0].meninggal+'">';
									 ($role == '1' ?  $temp+='<b>Tanggal entry web : </b><input type="date" class="form-control" id="txtEntryWeb" value="'+result2[0].entry_web+'">' : '');
									
									 $temp+='<b>Keterangan : </b><input type="text" class="form-control" id="txtKeterangan2" value="'+result2[0].keterangan+'">';
									 $temp+='<b>Status : </b><input type="text" class="form-control" id="txtStatus" value="'+result2[0].status+'">';
									 $('#info-pasien-3').html($temp);
									  $temp2 ='<button class="btn btn-warning btn-round" id="btnSave3" onclick="update3()" style="width:100%;">Update</button>';
									$('#footer3').html($temp2);
		              			}
		              			else
		              			{
									 $temp = '';
									 $temp+='<input type="hidden" id="medicalno" value="'+$no+'"><b>Faktor Resiko </b><input type="text" class="form-control" id="txtFaktorResiko">';
									 $temp+='<b>Penyakit Penyerta : </b><input type="text" class="form-control" id="txtPenyakit">';
									 $temp+='<b>Masih Dirawat : </b> <select id="statusRawat" class="form-control"><option value="Ya">Ya</option><option value="Tidak">Tidak</option></select>';
									 $temp+='<b>Pindah ke ruangan : </b><input type="text" class="form-control" id="txtPindahRuang">';
									 $temp+='<b>Sembuh KRS : </b><input type="date" class="form-control" id="txtSembuhKRS">';
									 $temp+='<b>Pasien Pulang Paksa </b><input type="date" class="form-control" id="txtPulangPaksa"><b> Keterangan : </b><input type="text" class="form-control" id="txtKeterangan">';
									 $temp+='<b>Meninggal : </b><input type="date" class="form-control" id="txtMeninggal">';
									 ($role == '1' ?  $temp+='<b>Tanggal entry web : </b><input type="date" class="form-control" id="txtEntryWeb">' : '');
									 $temp+='<b>Keterangan : </b><input type="text" class="form-control" id="txtKeterangan2">';
									 $temp+='<b>Status : </b><input type="text" class="form-control" id="txtStatus">';
									 $('#info-pasien-3').html($temp);
									  $temp2 ='<button class="btn btn-success btn-round" id="btnSave3" onclick="save3()" style="width:100%;">Save</button>';

										$('#footer3').html($temp2);
		              			}
		              	   },
		            error: function (xhr, status, error) {
		                var err = eval("(" + xhr.responseText + ")");
		                alert(err.Message);
		            }
	        	});
	

});
$(document).on('click','.btnBag2',function(){
	 $no=$(this).data('id');
	 	data = new FormData();
    data.append("mrn",$no);
	 $("#modal_bagian_2").modal();
	 $.ajax({
            	data: data,      
		            type: "POST",
		            url: '<?php
		                    echo base_url('Home/getPemeriksaan');

		                ?>',
		            dataType: "json",
		            cache: false,
		            contentType: false,
		            processData: false,
		              success: function (result2) {
		              
		              	if(result2 != '')
		              	{
		              	  $temp = '';
						  $temp+='<input type="hidden" id="medicalno" value="'+result2[0].mrn+'"><b> Ambil Spesimen </b> <select id="ambilSpesimen" class="form-control" onchange="tampilRS()">'+
						  (result2[0].ambil_spesimen == "Sudah" ? '<option value="Sudah" selected="selected">Sudah</option>' : '<option value"Sudah">Sudah</option>')+
						  (result2[0].ambil_spesimen == "Belum" ? '<option value="Belum" selected="selected">Belum</option>' : '<option value"Belum">Belum</option>')+
						  (result2[0].ambil_spesimen == "Tidak" ? '<option value="Tidak" selected="selected">Tidak</option>' : '<option value"Tidak">Tidak</option>')+'</select><br>';
						  $temp+=(result2[0].ambil_spesimen == "Sudah" ? '<div id="info-rs"><b>Swab dari RS Lain : </b><p>Nama RS : </p> <input type="text" id="txtNamaRs" class="form-control"><p>Tanggal <input type="date" id="tanggalAmbil"><select id="hasilRS"><option value="POSITIF">Positif</option><option value="NEGATIF">Negatif</option></select></p></div>' : '');
						  ;
					      $temp+=(result2[0].hasil_swab1 != null ? '<b>SWAB Ke 1 : </b><input type="checkbox" id="checkbox1" checked>' : '<input type="checkbox" id="checkbox1">');
					      $temp+=(result2[0].hasil_swab1 != null ? '<input type="date" id="tanggalSwab1" class="form-control" value="'+
					      			result2[0].tanggal_swab1+'"><select class="form-control" id="hasil1">' : '<input type="date" id="tanggalSwab1" class="form-control"><select class="form-control" id="hasil1">')+
					      		(result2[0].hasil_swab1 == "Positif" ? '<option value="Positif" selected="selected">Positif</option>' : '<option value="Positif">Positif</option>')+
					      		(result2[0].hasil_swab1 == "Negatif" ? '<option value="Negatif" selected="selected">Negatif</option>' : '<option value="Negatif">Negatif</option>')+
					      '</select><br><br>';

					       $temp+=(result2[0].hasil_swab2 != null ? '<b>SWAB Ke 2 : </b><input type="checkbox" id="checkbox2" checked>' : '<b>SWAB Ke 2 : </b><input type="checkbox" id="checkbox2">');
					       $temp+=(result2[0].hasil_swab2 !=null ? '<input type="date" id="tanggalSwab2" class="form-control" value="'+
					      			result2[0].tanggal_swab2+'"><select class="form-control" id="hasil2">' : '<input type="date" id="tanggalSwab2" class="form-control"><select class="form-control" id="hasil2">')+
					      		(result2[0].hasil_swab2 == "Positif" ? '<option value="Positif" selected="selected">Positif</option>' : '<option value="Positif">Positif</option>')+
					      		(result2[0].hasil_swab2 == "Negatif" ? '<option value="Negatif" selected="selected">Negatif</option>' : '<option value="Negatif">Negatif</option>')+
					      '</select><br><br>';

					       $temp+=(result2[0].hasil_swab3 != null ? '<b>SWAB Ke 3 : </b><input type="checkbox" id="checkbox3" checked>' : '<b>SWAB Ke 3 : </b><input type="checkbox" id="checkbox3">');
					       $temp+=(result2[0].hasil_swab3 != null ? '<input type="date" id="tanggalSwab3" class="form-control" value="'+
					      			result2[0].tanggal_swab3+'"><select class="form-control" id="hasil3">' : '<input type="date" id="tanggalSwab3" class="form-control"><select class="form-control" id="hasil3">')+
					      		(result2[0].hasil_swab3 == "Positif" ? '<option value="Positif" selected="selected">Positif</option>' : '<option value="Positif">Positif</option>')+
					      		(result2[0].hasil_swab3 == "Negatif" ? '<option value="Negatif" selected="selected">Negatif</option>' : '<option value="Negatif">Negatif</option>')+
					      '</select><br><br>';

					       $temp+=(result2[0].hasil_swab4 != null ? '<b>SWAB Ke 4 : </b><input type="checkbox" id="checkbox4" checked>' : '<b>SWAB Ke 4 : </b><input type="checkbox" id="checkbox4">');
					       $temp+=(result2[0].hasil_swab4 != null ? '<input type="date" id="tanggalSwab4" class="form-control" value="'+
					      			result2[0].tanggal_swab4+'"><select class="form-control" id="hasil4">' : '<input type="date" id="tanggalSwab4" class="form-control"><select class="form-control" id="hasil4">')+
					      		(result2[0].hasil_swab4 == "Positif" ? '<option value="Positif" selected="selected">Positif</option>' : '<option value="Positif">Positif</option>')+
					      		(result2[0].hasil_swab4 == "Negatif" ? '<option value="Negatif" selected="selected">Negatif</option>' : '<option value="Negatif">Negatif</option>')+
					      '</select><br><br>';

					       $temp+=(result2[0].hasil_swab5 != null ? '<b>SWAB Ke 5 : </b><input type="checkbox" id="checkbox5" checked>' : '<b>SWAB Ke 5 : </b><input type="checkbox" id="checkbox5">');
					       $temp+=(result2[0].hasil_swab5 != null ? '<input type="date" id="tanggalSwab5" class="form-control" value="'+
					      			result2[0].tanggal_swab5+'"><select class="form-control" id="hasil5">' : '<input type="date" id="tanggalSwab5" class="form-control"><select class="form-control" id="hasil5">')+
					      		(result2[0].hasil_swab5 == "Positif" ? '<option value="Positif" selected="selected">Positif</option>' : '<option value="Positif">Positif</option>')+
					      		(result2[0].hasil_swab5 == "Negatif" ? '<option value="Negatif" selected="selected">Negatif</option>' : '<option value="Negatif">Negatif</option>')+
					      '</select><br><br>';

					       $temp+=(result2[0].hasil_swab6 != null ? '<b>SWAB Ke 6 : </b><input type="checkbox" id="checkbox6" checked>' : '<b>SWAB Ke 6 : </b><input type="checkbox" id="checkbox6">');
					       $temp+=(result2[0].hasil_swab6 != null ? '<input type="date" id="tanggalSwab6" class="form-control" value="'+
					      			result2[0].tanggal_swab6+'"><select class="form-control" id="hasil6">' : '<input type="date" id="tanggalSwab6" class="form-control"><select class="form-control" id="hasil6">')+
					      		(result2[0].hasil_swab6 == "Positif" ? '<option value="Positif" selected="selected">Positif</option>' : '<option value="Positif">Positif</option>')+
					      		(result2[0].hasil_swab6 == "Negatif" ? '<option value="Negatif" selected="selected">Negatif</option>' : '<option value="Negatif">Negatif</option>')+
					      '</select><br><br>';

					      $temp+=(result2[0].hasil_swab7 != null ? '<b>SWAB Ke 7 : </b><input type="checkbox" id="checkbox7" checked>' : '<b>SWAB Ke 7 : </b><input type="checkbox" id="checkbox7">');
					       $temp+=(result2[0].hasil_swab7 != null ? '<input type="date" id="tanggalSwab7" class="form-control" value="'+
					      			result2[0].tanggal_swab7+'"><select class="form-control" id="hasil7">' : '<input type="date" id="tanggalSwab7" class="form-control"><select class="form-control" id="hasil7">')+
					      		(result2[0].hasil_swab7 == "Positif" ? '<option value="Positif" selected="selected">Positif</option>' : '<option value="Positif">Positif</option>')+
					      		(result2[0].hasil_swab7 == "Negatif" ? '<option value="Negatif" selected="selected">Negatif</option>' : '<option value="Negatif">Negatif</option>')+
					      '</select><br><br>';

					      $temp+=(result2[0].hasil_swab8 != null ? '<b>SWAB Ke 8 : </b><input type="checkbox" id="checkbox8" checked>' : '<b>SWAB Ke 8 : </b><input type="checkbox" id="checkbox8">');
					       $temp+=(result2[0].hasil_swab8 != null ? '<input type="date" id="tanggalSwab8" class="form-control" value="'+
					      			result2[0].tanggal_swab8+'"><select class="form-control" id="hasil8">' : '<input type="date" id="tanggalSwab8" class="form-control"><select class="form-control" id="hasil8">')+
					      		(result2[0].hasil_swab8 == "Positif" ? '<option value="Positif" selected="selected">Positif</option>' : '<option value="Positif">Positif</option>')+
					      		(result2[0].hasil_swab8 == "Negatif" ? '<option value="Negatif" selected="selected">Negatif</option>' : '<option value="Negatif">Negatif</option>')+
					      '</select><br><br>';

					       $temp+=(result2[0].hasil_swab9 != null ? '<b>SWAB Ke 9 : </b><input type="checkbox" id="checkbox9" checked>' : '<b>SWAB Ke 9 : </b><input type="checkbox" id="checkbox9">');
					       $temp+=(result2[0].hasil_swab9 != null? '<input type="date" id="tanggalSwab9" class="form-control" value="'+
					      			result2[0].tanggal_swab9+'"><select class="form-control" id="hasil9">' : '<input type="date" id="tanggalSwab9" class="form-control"><select class="form-control" id="hasil9">')+
					      		(result2[0].hasil_swab9 == "Positif" ? '<option value="Positif" selected="selected">Positif</option>' : '<option value="Positif">Positif</option>')+
					      		(result2[0].hasil_swab9 == "Negatif" ? '<option value="Negatif" selected="selected">Negatif</option>' : '<option value="Negatif">Negatif</option>')+
					      '</select><br><br>';

					      $temp+=(result2[0].hasil_swab10 != null ? '<b>SWAB Ke 10 : </b><input type="checkbox" id="checkbox10" checked>' : '<b>SWAB Ke 10 : </b><input type="checkbox" id="checkbox10">');
					       $temp+=(result2[0].hasil_swab10 != null ? '<input type="date" id="tanggalSwab10" class="form-control" value="'+
					      			result2[0].tanggal_swab10+'"><select class="form-control" id="hasil10">' : '<input type="date" id="tanggalSwab10" class="form-control"><select class="form-control" id="hasil10">')+
					      		(result2[0].hasil_swab10 == "Positif" ? '<option value="Positif" selected="selected">Positif</option>' : '<option value="Positif">Positif</option>')+
					      		(result2[0].hasil_swab10 == "Negatif" ? '<option value="Negatif" selected="selected">Negatif</option>' : '<option value="Negatif">Negatif</option>')+
					      '</select><br><br>';

					      // $temp+='<b>SWAB Ke 2 : </b><input type="checkbox" id="checkbox2">';
					      // $temp+='<input type="date" id="tanggalSwab2" class="form-control"><select class="form-control" id="hasil2"><option value="Positif">Positif</option><option value="Negatif">Negatif</option></select><br><br>';

					      // $temp+='<b>SWAB Ke 3 : </b><input type="checkbox" id="checkbox3">';
					      // $temp+='<input type="date" id="tanggalSwab3" class="form-control"><select class="form-control" id="hasil3"><option value="Positif">Positif</option><option value="Negatif">Negatif</option></select><br><br>';

					      // $temp+='<b>SWAB Ke 4 : </b><input type="checkbox" id="checkbox4">';
					      // $temp+='<input type="date" id="tanggalSwab4" class="form-control"><select class="form-control" id="hasil4"><option value="Positif">Positif</option><option value="Negatif">Negatif</option></select><br><br>';

					      // $temp+='<b>SWAB Ke 5 : </b><input type="checkbox" id="checkbox5">';
					      // $temp+='<input type="date" id="tanggalSwab1" class="form-control"><select class="form-control" id="hasil5"><option value="Positif">Positif</option><option value="Negatif">Negatif</option></select><br><br>';

					      // $temp+='<b>SWAB Ke 6 : </b><input type="checkbox" id="checkbox6">';
					      // $temp+='<input type="date" id="tanggalSwab1" class="form-control"><select class="form-control" id="hasil6"><option value="Positif">Positif</option><option value="Negatif">Negatif</option></select><br><br>';

					      // $temp+='<b>SWAB Ke 7 : </b><input type="checkbox" id="checkbox7">';
					      // $temp+='<input type="date" id="tanggalSwab7" class="form-control"><select class="form-control" id="hasil1"><option value="Positif">Positif</option><option value="Negatif">Negatif</option></select><br>';

					      // $temp+='<b>SWAB Ke 8 : </b><input type="checkbox" id="checkbox8">';
					      // $temp+='<input type="date" id="tanggalSwab8" class="form-control"><select class="form-control" id="hasil8"><option value="Positif">Positif</option><option value="Negatif">Negatif</option></select><br>';

					      // $temp+='<b>SWAB Ke 9 : </b><input type="checkbox" id="checkbox9">';
					      // $temp+='<input type="date" id="tanggalSwab9" class="form-control"><select class="form-control" id="hasil9"><option value="Positif">Positif</option><option value="Negatif">Negatif</option></select><br>';

					      // $temp+='<b>SWAB Ke 10 : </b><input type="checkbox" id="checkbox10">';
					      // $temp+='<input type="date" id="tanggalSwab10" class="form-control"><select class="form-control" id="hasil10"><option value="Positif">Positif</option><option value="Negatif">Negatif</option></select><br>';
					      $temp2 ='<button class="btn btn-warning btn-round" id="btnUpdate2" onclick="update2()" style="width:100%;">Update</button>';

						 	$("#info-pasien-2").html($temp);
						 	$('#footer2').html($temp2);
		              	}
		              	else
		              	{
		              	  $temp = '';
						  $temp+='<input type="hidden" id="medicalno" value="'+$no+'"><b> Ambil Spesimen </b> <select id="ambilSpesimen" class="form-control" onchange="tampilRS()"><option value"Sudah">Sudah</option><option value="Belum">Belum</option><option value="Tidak">Tidak</option></select><br>';
						  $temp+='<div id="info-rs"><b>Swab dari RS Lain : </b><p>Nama RS : </p> <input type="text" id="txtNamaRs" class="form-control"><p>Tanggal <input type="date" id="tanggalAmbil"><select id="hasilRS"><option value="POSITIF">Positif</option><option value="NEGATIF">Negatif</option></select></p></div>'
					      $temp+='<b>SWAB Ke 1 : </b><input type="checkbox" id="checkbox1">';
					      $temp+='<input type="date" id="tanggalSwab1" class="form-control"><select class="form-control" id="hasil1"><option value="Positif">Positif</option><option value="Negatif">Negatif</option></select><br><br>';

					      $temp+='<b>SWAB Ke 2 : </b><input type="checkbox" id="checkbox2">';
					      $temp+='<input type="date" id="tanggalSwab2" class="form-control"><select class="form-control" id="hasil2"><option value="Positif">Positif</option><option value="Negatif">Negatif</option></select><br><br>';

					      $temp+='<b>SWAB Ke 3 : </b><input type="checkbox" id="checkbox3">';
					      $temp+='<input type="date" id="tanggalSwab3" class="form-control"><select class="form-control" id="hasil3"><option value="Positif">Positif</option><option value="Negatif">Negatif</option></select><br><br>';

					      $temp+='<b>SWAB Ke 4 : </b><input type="checkbox" id="checkbox4">';
					      $temp+='<input type="date" id="tanggalSwab4" class="form-control"><select class="form-control" id="hasil4"><option value="Positif">Positif</option><option value="Negatif">Negatif</option></select><br><br>';

					      $temp+='<b>SWAB Ke 5 : </b><input type="checkbox" id="checkbox5">';
					      $temp+='<input type="date" id="tanggalSwab1" class="form-control"><select class="form-control" id="hasil5"><option value="Positif">Positif</option><option value="Negatif">Negatif</option></select><br><br>';

					      $temp+='<b>SWAB Ke 6 : </b><input type="checkbox" id="checkbox6">';
					      $temp+='<input type="date" id="tanggalSwab1" class="form-control"><select class="form-control" id="hasil6"><option value="Positif">Positif</option><option value="Negatif">Negatif</option></select><br><br>';

					      $temp+='<b>SWAB Ke 7 : </b><input type="checkbox" id="checkbox7">';
					      $temp+='<input type="date" id="tanggalSwab7" class="form-control"><select class="form-control" id="hasil1"><option value="Positif">Positif</option><option value="Negatif">Negatif</option></select><br>';

					      $temp+='<b>SWAB Ke 8 : </b><input type="checkbox" id="checkbox8">';
					      $temp+='<input type="date" id="tanggalSwab8" class="form-control"><select class="form-control" id="hasil8"><option value="Positif">Positif</option><option value="Negatif">Negatif</option></select><br>';

					      $temp+='<b>SWAB Ke 9 : </b><input type="checkbox" id="checkbox9">';
					      $temp+='<input type="date" id="tanggalSwab9" class="form-control"><select class="form-control" id="hasil9"><option value="Positif">Positif</option><option value="Negatif">Negatif</option></select><br>';

					      $temp+='<b>SWAB Ke 10 : </b><input type="checkbox" id="checkbox10">';
					      $temp+='<input type="date" id="tanggalSwab10" class="form-control"><select class="form-control" id="hasil10"><option value="Positif">Positif</option><option value="Negatif">Negatif</option></select><br>';
					      $temp2 ='<button class="btn btn-success btn-round" id="btnSave2" onclick="save2()" style="width:100%;">Save</button>';

						 	$("#info-pasien-2").html($temp);
						 	$('#footer2').html($temp2);
		              	}
		              },
		            error: function (xhr, status, error) {
		                var err = eval("(" + xhr.responseText + ")");
		                alert(err.Message);
		            }
	        	});
	  

});
  
$(document).on('click','.btnBag1',function(){
	
	$no=$(this).data('id');
	data = new FormData();
    data.append("mrn",$no);
	  $.ajax({
            data: data,      
            type: "POST",
            url: '<?php
                    echo base_url('Home/getInfoPasien');

                ?>',
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            // async: false,
            success: function (result) {
            	 $.ajax({
            	data: data,      
		            type: "POST",
		            url: '<?php
		                    echo base_url('Home/getIdentitas');

		                ?>',
		            dataType: "json",
		            cache: false,
		            contentType: false,
		            processData: false,
		              success: function (result2) {
		              		$sex = '';
			            	$ssn ='';
			            	if(result[0].GCSex == '0003^M')
			            	{
			            		$sex = 'Male';
			            	}
			            	else
			            	{
			            		$sex = 'Female';
			            	}
			            	if(result[0].SSN == null)
			            	{
			            		$ssn = 'Tidak ada';
			            	}
			            	else
			            	{
			            		$ssn = result[0].SSN;
			            	}
		              		if(result2!='')
		              		{
		              			
		              			 $temp = '';
				                 $temp+='<div class="row" style="margin: 5%;"><div class="column"><input type="hidden" id="medicalno" value="'+result[0].MedicalNo+'"><p><b>No.Rekam Medis : </b>'+result[0].MedicalNo+'</p>';
				                 $temp+='<p><b> NIK : </b>'+$ssn+'</p>';
				                 $temp+='<p><b> Nama Pasien : </b>'+result[0].FullName+'</p>';
				                 $temp+='<p><b> Jenis Kelamin : </b>'+$sex+'</p>';
				                 $temp+='<p><b> Pekerjaan : - </p>';
				                 $temp+='<p><b> Tanggal Lahir : </b>'+result[0].DateOfBirth+'</p>';
				                 $temp+='<p><b> Umur : </b>'+result[0].AgeInYear+'</p>';
				                 $temp+='<p><b> Kebangsaan : </b>'+result[0].StandardCodeName+'</p>';
				                 $temp+='<p><b> Alamat KTP : </b>'+result[0].jalanKTP+', '+result[0].kelurahanKTP+ ', ' +result[0].kecamatanKTP+', '+result[0].kotaKTP+'</p>';
				                 $temp+='<p><b> Alamat Domisili : </b>'+result[0].JalanDomisili+', '+result[0].kelurahanDomisili+ ', ' +result[0].kecamatanDomisili + ', '+result[0].kotaDomisili+'</p>';
				                 $temp+='<p><b> Nomor Telepon : </b>'+result[0].MobilePhoneNo1+'</p></div>';
				                 $temp+='<div class="column" style="margin-left:2%;"><p><b> Jumlah Kontak Erat  : </b><input type="number" id="txtJumlahKontakErat" class="form-control" value="'+result2[0].jumlah_kontak_erat+'"></p>';
				                 $temp+='<p><b> Nama  : </b><input type="text" id="txtNamaKontakErat" class="form-control" value="'+result2[0].nama_kontak+'"></p>';
				                 $temp+='<p><b> Umur  : </b><input type="number" id="txtUmurKontakErat" class="form-control" value="'+result2[0].umur+'"></p>';
				                 $temp+='<p><b> Jenis Kelamin  : </b><input type="text" id="txtJenisKelamin" class="form-control" value="'+result2[0].sex+'"></p>';
				                 $temp+='<p><b> Alamat Rumah  : </b><input type="text" id="txtAlamatKontakErat" class="form-control" value="'+result2[0].alamat+'"></p>';
				                 $temp+='<p><b> No Telp/Hp  : </b><input type="text" id="txtHpKontakErat" class="form-control" value="'+result2[0].no_hp+'"></p>';
				                 $temp+='<p><b> Aktivitas yang dilakukan di rumah  : </b><textarea id="txtAktivitas" class="form-control">'+result2[0].aktivitas+'</textarea></p></div></div>';
				                 $temp+='<p style="text-align:center;"><b> Status Awal  : </b><select id="statusAwal" class="form-control">'+
				                 (result2[0].status_awal == "ODR" ? '<option value="ODR" selected="selected">ODR</option>' : '<option value="ODR">ODR</option>')+
				                 (result2[0].status_awal == "PDP" ? '<option value="PDP" selected="selected">PDP</option>' : '<option value="PDP">PDP</option>')+
				                 (result2[0].status_awal == "OPD" ? '<option value="OPD" selected="selected">OPD</option>' : '<option value="OPD">OPD</option>')+
				                 (result2[0].status_awal == "Konfirmasi" ? '<option value="Konfirmasi" selected="selected">Konfirmasi</option>' : '<option value="Konfirmasi">Konfirmasi</option>')+'</select></p>';
				                 $temp+='<p style="text-align:center;"><select id="statusDari" class="form-control">'+
				                 (result2[0].asal_status == "Rawat Jalan" ? '<option value="Rawat Jalan" selected="selected">Rawat Jalan</option>' : '<option value="Rawat Jalan">Rawat Jalan</option>')+ 
				                 (result2[0].asal_status == "IGD" ? '<option value="IGD" selected="selected">IGD</option>' : '<option value="IGD">IGD</option>')+'</select></p>';
				                 $temp+='<input type="date" id="tanggalMasuk" name="tanggalMasuk" class="form-control" value="'+result2[0].tanggal_status+'">';
				                 $temp+='<p style="text-align:center;"><b>Apakah pasien tersebut Mandiri / Rujukan? </b><select id="mandiriRujukan" class="form-control">'+
				                 (result2[0].asal_status == "Mandiri" ? '<option value="Mandiri" selected="selected">Mandiri</option>' : '<option value="Mandiri">Mandiri</option>')+ 
				                 (result2[0].asal_status == "Rujukan" ? '<option value="Rujukan" selected="selected">Rujukan</option>' : '<option value="Rujukan">Rujukan</option>')+'</select></p>';
				                  $temp+='<p style="text-align:center;"><b>Apakah pasien petugas Kesehatan? </b><select id="petugasKesehatan" class="form-control">'+
				                 (result2[0].asal_status == "Ya" ? '<option value="Ya" selected="selected">Ya</option>' : '<option value="Ya">Ya</option>')+
				                 (result2[0].asal_status == "Tidak" ? '<option value="Tidak" selected="selected">Tidak</option>' : '<option value="Tidak">Tidak</option>')+
				                 (result2[0].asal_status == "Tidak Tahu" ? '<option value="Tidak Tahu" selected="selected">Tidak Tahu</option>' : '<option value="Tidak Tahu">Tidak Tahu</option>')+'</select></p>';
				                 $("#info-pasien").html($temp);
				                 $temp2 = '<button class="btn btn-warning btn-round" id="btnUpdate" onclick="update()" style="width: 100%;">Update</button>'
				                 $('#footer').html($temp2);
		              		}
		              		else
		              		{
		              			$temp = '';
				                 $temp+='<div class="row" style="margin: 5%;"><div class="column"><input type="hidden" id="medicalno" value="'+result[0].MedicalNo+'"><p><b>No.Rekam Medis : </b>'+result[0].MedicalNo+'</p>';
				                 $temp+='<p><b> NIK : </b>'+$ssn+'</p>';
				                 $temp+='<p><b> Nama Pasien : </b>'+result[0].FullName+'</p>';
				                 $temp+='<p><b> Jenis Kelamin : </b>'+$sex+'</p>';
				                 $temp+='<p><b> Pekerjaan : </b> -';
				                 $temp+='<p><b> Tanggal Lahir : </b>'+result[0].DateOfBirth+'</p>';
				                 $temp+='<p><b> Umur : </b>'+result[0].AgeInYear+'</p>';
				                 $temp+='<p><b> Kebangsaan : </b>'+result[0].StandardCodeName+'</p>';
				                 $temp+='<p><b> Alamat KTP : </b>'+result[0].jalanKTP+', '+result[0].kelurahanKTP+ ', ' +result[0].kecamatanKTP+', '+result[0].kotaKTP+'</p>';
				                 $temp+='<p><b> Alamat Domisili : </b>'+result[0].JalanDomisili+', '+result[0].kelurahanDomisili+ ', ' +result[0].kecamatanDomisili + ', '+result[0].kotaDomisili+'</p>';
				                 $temp+='<p><b> Nomor Telepon : </b>'+result[0].MobilePhoneNo1+'</p></div>';
				                 $temp+='<div class="column" style="margin-left:2%;"><p><b> Jumlah Kontak Erat  : </b><input type="number" id="txtJumlahKontakErat" class="form-control"></p>';
				                 $temp+='<p><b> Nama  : </b><input type="text" id="txtNamaKontakErat" class="form-control" valuie></p>';
				                 $temp+='<p><b> Umur  : </b><input type="number" id="txtUmurKontakErat" class="form-control"></p>';
				                 $temp+='<p><b> Jenis Kelamin  : </b><input type="text" id="txtJenisKelamin" class="form-control"></p>';
				                 $temp+='<p><b> Alamat Rumah  : </b><input type="text" id="txtAlamatKontakErat" class="form-control"></p>';
				                 $temp+='<p><b> No Telp/Hp  : </b><input type="text" id="txtHpKontakErat" class="form-control"></p>';
				                 $temp+='<p><b> Aktivitas yang dilakukan di rumah  : </b><textarea id="txtAktivitas" class="form-control"></textarea></p></div></div>';
				                 $temp+='<p style="text-align:center;"><b> Status Awal  : </b><select id="statusAwal" class="form-control" style="text-align"><option value="ODR">ODR</option><option value="PDP">PDP</option><option value="OPD">OPD</option><option value="Konfirmasi">Konfirmasi</option></select></p>';
				                 $temp+='<p style="text-align:center;"><select id="statusDari" class="form-control"><option value="RawatJalan">Rawat Jalan</option><option value="IGD">IGD</option></select></p>';
				                 $temp+='<input type="date" id="tanggalMasuk" name="tanggalMasuk" class="form-control">';
				                 $temp+='<p style="text-align:center;"><b>Apakah pasien tersebut Mandiri / Rujukan? </b><select id="mandiriRujukan" class="form-control"><option value="Mandiri">Mandiri</option><option value="Rujukan">Rujukan</option></select></p>';
				                  $temp+='<p style="text-align:center;"><b>Apakah pasien petugas Kesehatan? </b><select id="petugasKesehatan" class="form-control"><option value="Ya">Ya</option><option value="Tidak">Tidak</option><option>Tidak Tahu</option></select></p>';
				                 $("#info-pasien").html($temp);
				                  $temp2 = '<button class="btn btn-success btn-round" id="btnSave" onclick="save()" style="width: 100%;">Save</button>'
				                 $('#footer').html($temp2);
		              		}
		             },
		            error: function (xhr, status, error) {
		                var err = eval("(" + xhr.responseText + ")");
		                alert(err.Message);
		            }
	        	});
            
               	
                 $("#modal_bagian_1").modal();
                
                
            },
            error: function (xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.Message);
            }
        });
});
        

</script>

<!-- Bootstrap Notify -->
<script src="../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- Bootstrap Toggle -->
<script src="../assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="../assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="../assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

<!-- Google Maps Plugin -->
<script src="../assets/js/plugin/gmaps/gmaps.js"></script>

<!-- Sweet Alert -->
<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Azzara JS -->
<script src="../assets/js/ready.min.js"></script>

</body>
</html>