<?php
class Home extends CI_Controller {

  public function __construct()
    {
        parent::__construct();

        $this->load->model('Home_model' , 'home');
        $this->load->library('session');

    }

        public function index()
        {
        	$NIK = $this->input->cookie('NIK', TRUE);
                $data['NIK']=$this->input->cookie('NIK', TRUE);
                  $data['role']=$this->input->cookie('role', TRUE);
                $data['serviceUnitId']=$this->input->cookie('serviceUnitId', TRUE);
                if(isset($NIK))
                {
                	$this->load->view('templates/header');
	                $this->load->view('templates/navbar');
	                $this->load->view('home',$data);
	                $this->load->view('templates/sidebar',$data);
	                $this->load->view('templates/footer');
                }
                else
                {
                	 $this->load->view('templates/header');
	                $this->load->view('templates/navbar');
	                $this->load->view('Login');
	                $this->load->view('templates/sidebar');
	                $this->load->view('templates/footer');
                }
               
        }
        public function save1()
        {
                $medicalno = $this->input->post('medicalno');
                $jumlah_kontak = $this->input->post('jumlah_kontak');
                $nama_kontak = $this->input->post('nama_kontak');
                $umur_kontak = $this->input->post('umur_kontak');
                $jenis_kontak = $this->input->post('jenis_kontak');
                $alamat_kontak = $this->input->post('alamat_kontak');
                $hp_kontak = $this->input->post('hp_kontak');
                $aktivitas_kontak = $this->input->post('aktivitas_kontak');
                $statusAwal = $this->input->post('statusAwal');
                $statusDari = $this->input->post('statusDari');

                $tanggalMasuk2 = $this->input->post('tanggalMasuk');
                
                $tanggalMasuk = date("Y-m-d", strtotime($tanggalMasuk2));
                $status = $this->input->post('status');
                $petugas = $this->input->post('petugas');
                $data3 = array(
                        "mrn" => $this->input->post("medicalno"),
                        "jumlah_kontak_erat" => $this->input->post("jumlah_kontak"),
                        "nama_kontak"=>$this->input->post("nama_kontak"),
                        "umur" => $this->input->post("umur_kontak"),
                        "sex" => $this->input->post("jenis_kontak"),
                        "alamat"=> $this->input->post("alamat_kontak"),
                        "no_hp" => $this->input->post("hp_kontak"),
                        "aktivitas" => $this->input->post("aktivitas_kontak"),
                        "status_awal"=>$this->input->post("statusAwal"),
                        "asal_status" =>$this->input->post("statusDari"),
                        "tanggal_status" => $tanggalMasuk,
                        "status"=>$this->input->post("status"),
                        "is_petugas"=>$this->input->post("petugas"),
                );
                $data = $this->security->xss_clean($data3);
                $this->home->addData($data);
                echo json_encode("Sukses");
        }
         public function save2()
        {
                $medicalno = $this->input->post('medicalno');
                $hasil1 = $this->input->post('hasil1');
                $hasil2 = $this->input->post('hasil2');
                $hasil3 = $this->input->post('hasil3');
                $hasil4 = $this->input->post('hasil4');
                $hasil5 = $this->input->post('hasil5');
                $hasil6 = $this->input->post('hasil6');
                $hasil7 = $this->input->post('hasil7');
                $hasil8 = $this->input->post('hasil8');
                $hasil9 = $this->input->post('hasil9');
                $hasil10 = $this->input->post('hasil10');
                $tanggal1 = $this->input->post('tanggal1');
                $tanggal2 = $this->input->post('tanggal2');
                $tanggal3 = $this->input->post('tanggal3');
                $tanggal4 = $this->input->post('tanggal4');
                $tanggal5 = $this->input->post('tanggal5');
                $tanggal6 = $this->input->post('tanggal6');
                $tanggal7 = $this->input->post('tanggal7');
                $tanggal8 = $this->input->post('tanggal8');
                $tanggal9 = $this->input->post('tanggal9');
                $tanggal10 = $this->input->post('tanggal10');
                $tgl1 =null;
                $tgl2=null;
                $tgl3=null;
                $tgl4=null;
                $tgl5=null;
                $tgl6=null;
                $tgl7=null;
                $tgl8=null;
                $tgl9=null;
                $tgl10=null;

                if($tanggal1 != '')
                {
                    $tgl1 = date("Y-m-d", strtotime($tanggal1));
                }
                if($tanggal2 != '')
                {
                    $tgl2 = date("Y-m-d", strtotime($tanggal2));
                }
                if($tanggal3 != '')
                {
                        $tgl3 = date("Y-m-d", strtotime($tanggal3));
                }
                if($tanggal4 != '')
                {
                        $tgl4 = date("Y-m-d", strtotime($tanggal4));
                }
                if($tanggal5 != '')
                {
                        $tgl5 = date("Y-m-d", strtotime($tanggal5));
                }
                if($tanggal6 != '')
                {
                         $tgl6 = date("Y-m-d", strtotime($tanggal6));
                }
                if($tanggal7 != '')
                {
                        $tgl7 = date("Y-m-d", strtotime($tanggal7));
                }
                if($tanggal8 != '')
                {
                      $tgl8 = date("Y-m-d", strtotime($tanggal8));
                }
                if($tanggal9 != '')
                {
                       $tgl9 = date("Y-m-d", strtotime($tanggal9));
                }
                if($tanggal10 != '')
                {
                        $tgl10 = date("Y-m-d", strtotime($tanggal10));
                }

                $ambilSpesimen = $this->input->post('ambilSpesimen');
                $nama_rs = $this->input->post('nama_rs');
                $tanggal_rs = $this->input->post('tanggal_rs');
                $tglrs = date("Y-m-d", strtotime($tanggal_rs));
                $hasil_rs = $this->input->post('hasil_rs');
                 if(empty($nama_rs))
                {
                        $nama_rs = null;
                }
                if(empty($tanggal_rs))
                {
                        $tglrs = null;
                }
                if(empty($hasil_rs))
                {
                        $hasil_rs = null;
                }

                $data3 = array(
                        "ambil_spesimen" => $ambilSpesimen,
                        "mrn"=>$medicalno,
                      
                );
                if($ambilSpesimen == 'Sudah')
                {
                        $data3["nama_rs"]=$nama_rs;
                        $data3["tanggal"]=$tglrs;
                        $data3["hasil"]=$hasil_rs;
                }
                 if($tgl1 != null)
                {
                        $data3['tanggal_swab1'] = $tgl1;
                        $data3['hasil_swab1']=$hasil1;
                }
                 if($tgl2 != null)
                {
                        $data3['tanggal_swab2'] = $tgl2;
                        $data3['hasil_swab2']=$hasil2;
                }
                 if($tgl3 != null)
                {
                        $data3['tanggal_swab3'] = $tgl3;
                        $data3['hasil_swab3']=$hasil3;
                }
                 if($tgl4 != null)
                {
                        $data3['tanggal_swab4'] = $tgl4;
                        $data3['hasil_swab4']=$hasil4;
                }
                 if($tgl5 != null)
                {
                        $data3['tanggal_swab5'] = $tgl5;
                        $data3['hasil_swab5']=$hasil5;
                }
                 if($tgl6 != null)
                {
                        $data3['tanggal_swab6'] = $tgl6;
                        $data3['hasil_swab6']=$hasil6;
                }
                  if($tgl7 != null)
                {
                        $data3['tanggal_swab7'] = $tgl7;
                        $data3['hasil_swab7']=$hasil7;
                }
                 if($tgl4 != null)
                {
                        $data3['tanggal_swab8'] = $tgl8;
                        $data3['hasil_swab8']=$hasil8;
                }
                 if($tgl9 != null)
                {
                        $data3['tanggal_swab9'] = $tgl9;
                        $data3['hasil_swab9']=$hasil9;
                }
                 if($tgl6 != null)
                {
                        $data3['tanggal_swab10'] = $tgl10;
                        $data3['hasil_swab10']=$hasil10;
                }

                $data = $this->security->xss_clean($data3);
                $this->home->addData2($data);
                echo json_encode("Sukses");
               

        }
         public function save3()
        {
                $medicalno = $this->input->post('medicalno');
                $faktor = $this->input->post('faktor');
                $penyakit = $this->input->post('penyakit');
                $status_rawat = $this->input->post('status_rawat');
                $pindah = $this->input->post('pindah');
                $sembuh = $this->input->post('sembuh');
                $tglsembuh = date("Y-m-d", strtotime($sembuh));
                $pulangpaksa = $this->input->post('pulangpaksa');
                $tglpulangpaksa = date("Y-m-d", strtotime($pulangpaksa));
                $meninggal = $this->input->post('meninggal');
                $tglmeninggal = date("Y-m-d", strtotime($meninggal));
                $entry = $this->input->post('entry');
                $tglentry = date("Y-m-d", strtotime($entry));
                $keterangan = $this->input->post('keterangan');
                $keterangan2 = $this->input->post('keterangan2');
                $status = $this->input->post('status');
                if(empty($sembuh))
                {
                        $tglsembuh = NULL;
                }
                if(empty($meninggal))
                {
                        $tglmeninggal = NULL;
                }
                  if(empty($pulangpaksa))
                {
                        $tglpulangpaksa = NULL;
                }
                  if(empty($entry))
                {
                        $tglentry = NULL;
                }
               
                $data3 = array(
                        "faktor_resiko" => $faktor,
                        "mrn"=>$medicalno,
                        "masih_dirawat" => $status_rawat,
                        "pindah_ke_ruangan"=>$pindah,
                       "penyakit"=>$penyakit,
                        "keterangan_pulang"=> $keterangan,
                        
                     
                        "keterangan"=>$keterangan2,
                        "status" =>$status,
                     
                );
               
                if($tglsembuh != null)
                {
                        $data3['sembuh_krs'] = $tglsembuh;
                }
                if($tglpulangpaksa != null)
                {
                        $data3['pasien_pulang_paksa'] = $tglpulangpaksa;
                }
                if($tglmeninggal != null)
                {
                         $data3['meninggal'] = $tglmeninggal;
                }
                if($tglentry != null)
                {
                        $data3['date_entry'] = $tglentry;
                }
                $data = $this->security->xss_clean($data3);
                $this->home->addData3($data);
                 echo json_encode($data3);
               

        }
        public function update3()
        {
                $medicalno = $this->input->post('medicalno');
                $faktor = $this->input->post('faktor');
                $penyakit = $this->input->post('penyakit');
                $status_rawat = $this->input->post('status_rawat');
                $pindah = $this->input->post('pindah');
                $sembuh = $this->input->post('sembuh');
                $tglsembuh = date("Y-m-d", strtotime($sembuh));
                $pulangpaksa = $this->input->post('pulangpaksa');
                $tglpulangpaksa = date("Y-m-d", strtotime($pulangpaksa));
                $meninggal = $this->input->post('meninggal');
                $tglmeninggal = date("Y-m-d", strtotime($meninggal));
                $entry = $this->input->post('entry');
                $tglentry = date("Y-m-d", strtotime($entry));
                $keterangan = $this->input->post('keterangan');
                $keterangan2 = $this->input->post('keterangan2');
                $status = $this->input->post('status');
                if(empty($sembuh))
                {
                        $tglsembuh = NULL;
                }
                if(empty($meninggal))
                {
                        $tglmeninggal = NULL;
                }
                  if(empty($pulangpaksa))
                {
                        $tglpulangpaksa = NULL;
                }
                  if(empty($entry))
                {
                        $tglentry = NULL;
                }
               
                $data3 = array(
                        "faktor_resiko" => $faktor,
                        "mrn"=>$medicalno,
                        "masih_dirawat" => $status_rawat,
                        "pindah_ke_ruangan"=>$pindah,
                       
                        "keterangan_pulang"=> $keterangan,
                        
                        "date_entry" => $tglentry,
                        "keterangan"=>$keterangan2,
                        "status" =>$status,
                     
                );
               
                if($tglsembuh != null)
                {
                        $data3['sembuh_krs'] = $tglsembuh;
                }
                if($tglpulangpaksa != null)
                {
                        $data3['pasien_pulang_paksa'] = $tglpulangpaksa;
                }
                if($tglmeninggal != null)
                {
                         $data3['meninggal'] = $tglmeninggal;
                }
                if($tglentry != null)
                {
                        $data3['date_entry'] = $tglentry;
                }
                $data_lama = $this->home->getKondisi($medicalno);
                $nik=$this->input->cookie('NIK', TRUE);
                date_default_timezone_set("Asia/Jakarta");
                $tanggal_skg = date("Y-m-d H:i:s");
                foreach($data_lama as $row)
                {
                        if($row->faktor_resiko != $faktor)
                        {
                                 $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'kondisi',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'faktor_resiko',
                                        "changedValue"=>$row->faktor_resiko,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);  
                        }
                         if($row->penyakit != $penyakit)
                        {
                                 $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'kondisi',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'penyakit',
                                        "changedValue"=>$row->penyakit,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);  
                        }
                         if($row->masih_dirawat != $status_rawat)
                        {
                                 $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'kondisi',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'masih_dirawat',
                                        "changedValue"=>$row->masih_dirawat,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);  
                        }
                         if($row->pindah_ke_ruangan != $pindah)
                        {
                                 $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'kondisi',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'pindah_ke_ruangan',
                                        "changedValue"=>$row->pindah_ke_ruangan,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);  
                        }
                         if($row->sembuh_krs != $sembuh)
                        {
                                 $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'kondisi',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'sembuh_krs',
                                        "changedValue"=>$row->sembuh_krs,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);  
                        }
                         if($row->pasien_pulang_paksa != $tglpulangpaksa)
                        {
                                 $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'kondisi',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'pasien_pulang_paksa',
                                        "changedValue"=>$row->pasien_pulang_paksa,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);  
                        }
                         if($row->keterangan_pulang != $keterangan2)
                        {
                                 $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'kondisi',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'keterangan_pulang',
                                        "changedValue"=>$row->keterangan_pulang,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);  
                        }
                         if($row->meninggal != $meninggal)
                        {
                                 $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'kondisi',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'meninggal',
                                        "changedValue"=>$row->meninggal,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);  
                        }
                         if($row->keterangan != $keterangan)
                        {
                                 $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'kondisi',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'keterangan',
                                        "changedValue"=>$row->keterangan,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);  
                        }
                          if($row->date_entry != $tglentry)
                        {
                                 $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'kondisi',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'date_entry',
                                        "changedValue"=>$row->date_entry,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);  
                        }
                         if($row->status != $status)
                        {
                                 $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'kondisi',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'status',
                                        "changedValue"=>$row->status,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);  
                        }
                }

                $data = $this->security->xss_clean($data3);
                $this->home->editData3($data,$medicalno);
                 echo json_encode($data3);
        }
        public function update2()
        {
               $medicalno = $this->input->post('medicalno');
                $hasil1 = $this->input->post('hasil1');
                $hasil2 = $this->input->post('hasil2');
                $hasil3 = $this->input->post('hasil3');
                $hasil4 = $this->input->post('hasil4');
                $hasil5 = $this->input->post('hasil5');
                $hasil6 = $this->input->post('hasil6');
                $hasil7 = $this->input->post('hasil7');
                $hasil8 = $this->input->post('hasil8');
                $hasil9 = $this->input->post('hasil9');
                $hasil10 = $this->input->post('hasil10');
                $tanggal1 = $this->input->post('tanggal1');
                $tanggal2 = $this->input->post('tanggal2');
                $tanggal3 = $this->input->post('tanggal3');
                $tanggal4 = $this->input->post('tanggal4');
                $tanggal5 = $this->input->post('tanggal5');
                $tanggal6 = $this->input->post('tanggal6');
                $tanggal7 = $this->input->post('tanggal7');
                $tanggal8 = $this->input->post('tanggal8');
                $tanggal9 = $this->input->post('tanggal9');
                $tanggal10 = $this->input->post('tanggal10');
                $tgl1 =null;
                $tgl2=null;
                $tgl3=null;
                $tgl4=null;
                $tgl5=null;
                $tgl6=null;
                $tgl7=null;
                $tgl8=null;
                $tgl9=null;
                $tgl10=null;

                if($tanggal1 != '')
                {
                    $tgl1 = date("Y-m-d", strtotime($tanggal1));
                }
                if($tanggal2 != '')
                {
                    $tgl2 = date("Y-m-d", strtotime($tanggal2));
                }
                if($tanggal3 != '')
                {
                        $tgl3 = date("Y-m-d", strtotime($tanggal3));
                }
                if($tanggal4 != '')
                {
                        $tgl4 = date("Y-m-d", strtotime($tanggal4));
                }
                if($tanggal5 != '')
                {
                        $tgl5 = date("Y-m-d", strtotime($tanggal5));
                }
                if($tanggal6 != '')
                {
                         $tgl6 = date("Y-m-d", strtotime($tanggal6));
                }
                if($tanggal7 != '')
                {
                        $tgl7 = date("Y-m-d", strtotime($tanggal7));
                }
                if($tanggal8 != '')
                {
                      $tgl8 = date("Y-m-d", strtotime($tanggal8));
                }
                if($tanggal9 != '')
                {
                       $tgl9 = date("Y-m-d", strtotime($tanggal9));
                }
                if($tanggal10 != '')
                {
                        $tgl10 = date("Y-m-d", strtotime($tanggal10));
                }

                $ambilSpesimen = $this->input->post('ambilSpesimen');
                $nama_rs = $this->input->post('nama_rs');
                $tanggal_rs = $this->input->post('tanggal_rs');
                $tglrs = date("Y-m-d", strtotime($tanggal_rs));
                $hasil_rs = $this->input->post('hasil_rs');
                 if(empty($nama_rs))
                {
                        $nama_rs = null;
                }
                if(empty($tanggal_rs))
                {
                        $tglrs = null;
                }
                if(empty($hasil_rs))
                {
                        $hasil_rs = null;
                }

                $data3 = array(
                        "ambil_spesimen" => $ambilSpesimen,
                        "mrn"=>$medicalno,
                      
                );
                if($ambilSpesimen == 'Sudah')
                {
                        $data3["nama_rs"]=$nama_rs;
                        $data3["tanggal"]=$tglrs;
                        $data3["hasil"]=$hasil_rs;
                }
                 if($tgl1 != null)
                {
                        $data3['tanggal_swab1'] = $tgl1;
                        $data3['hasil_swab1']=$hasil1;
                }
                 if($tgl2 != null)
                {
                        $data3['tanggal_swab2'] = $tgl2;
                        $data3['hasil_swab2']=$hasil2;
                }
                 if($tgl3 != null)
                {
                        $data3['tanggal_swab3'] = $tgl3;
                        $data3['hasil_swab3']=$hasil3;
                }
                 if($tgl4 != null)
                {
                        $data3['tanggal_swab4'] = $tgl4;
                        $data3['hasil_swab4']=$hasil4;
                }
                 if($tgl5 != null)
                {
                        $data3['tanggal_swab5'] = $tgl5;
                        $data3['hasil_swab5']=$hasil5;
                }
                 if($tgl6 != null)
                {
                        $data3['tanggal_swab6'] = $tgl6;
                        $data3['hasil_swab6']=$hasil6;
                }
                  if($tgl7 != null)
                {
                        $data3['tanggal_swab7'] = $tgl7;
                        $data3['hasil_swab7']=$hasil7;
                }
                 if($tgl4 != null)
                {
                        $data3['tanggal_swab8'] = $tgl8;
                        $data3['hasil_swab8']=$hasil8;
                }
                 if($tgl9 != null)
                {
                        $data3['tanggal_swab9'] = $tgl9;
                        $data3['hasil_swab9']=$hasil9;
                }
                 if($tgl6 != null)
                {
                        $data3['tanggal_swab10'] = $tgl10;
                        $data3['hasil_swab10']=$hasil10;
                }
                $data_lama = $this->home->getPemeriksaan($medicalno);
                $nik=$this->input->cookie('NIK', TRUE);
                date_default_timezone_set("Asia/Jakarta");
                $tanggal_skg = date("Y-m-d H:i:s");
                foreach($data_lama as $row)
                {
                        if($row->ambil_spesimen != $ambilSpesimen)
                        {
                                 $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'pemeriksaan',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'ambil_spesimen',
                                        "changedValue"=>$row->ambil_spesimen,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);  
                        }
                         if($row->nama_rs != $nama_rs)
                        {
                                 $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'pemeriksaan',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'nama_rs',
                                        "changedValue"=>$row->nama_rs,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);  
                        }
                         if($row->tanggal != $tglrs)
                        {
                                 $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'pemeriksaan',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'tanggal',
                                        "changedValue"=>$row->tanggal,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);  
                        }
                         if($row->hasil != $hasil_rs)
                        {
                                 $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'pemeriksaan',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'hasil',
                                        "changedValue"=>$row->hasil,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);  
                        }
                         if($row->tanggal_swab1 != $tgl1)
                        {
                                 $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'pemeriksaan',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'tanggal_swab1',
                                        "changedValue"=>$row->tanggal_swab1,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);  
                        }
                         if($row->tanggal_swab2 != $tgl2)
                        {
                                 $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'pemeriksaan',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'tanggal_swab2',
                                        "changedValue"=>$row->tanggal_swab2,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);  
                        }
                         if($row->tanggal_swab3 != $tgl3)
                        {
                                 $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'pemeriksaan',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'tanggal_swab3',
                                        "changedValue"=>$row->tanggal_swab3,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);  
                        }
                         if($row->tanggal_swab4 != $tgl4)
                        {
                                 $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'pemeriksaan',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'tanggal_swab4',
                                        "changedValue"=>$row->tanggal_swab4,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);  
                        }
                         if($row->tanggal_swab5 != $tgl5)
                        {
                                 $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'pemeriksaan',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'tanggal_swab5',
                                        "changedValue"=>$row->tanggal_swab5,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);  
                        }
                         if($row->tanggal_swab6 != $tgl6)
                        {
                                 $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'pemeriksaan',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'tanggal_swab6',
                                        "changedValue"=>$row->tanggal_swab6,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);  
                        }
                         if($row->tanggal_swab7 != $tgl7)
                        {
                                 $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'pemeriksaan',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'tanggal_swab7',
                                        "changedValue"=>$row->tanggal_swab7,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);  
                        }
                         if($row->tanggal_swab8 != $tgl8)
                        {
                                 $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'pemeriksaan',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'tanggal_swab8',
                                        "changedValue"=>$row->tanggal_swab8,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);  
                        }
                         if($row->tanggal_swab9 != $tgl9)
                        {
                                 $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'pemeriksaan',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'tanggal_swab9',
                                        "changedValue"=>$row->tanggal_swab9,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);  
                        }
                         if($row->tanggal_swab10 != $tgl10)
                        {
                                 $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'pemeriksaan',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'tanggal_swab10',
                                        "changedValue"=>$row->tanggal_swab10,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);  
                        }
                         if($row->hasil_swab1 != $hasil1)
                        {
                                 $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'pemeriksaan',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'hasil_swab1',
                                        "changedValue"=>$row->hasil_swab1,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);  
                        }
                         if($row->hasil_swab2 != $hasil2)
                        {
                                 $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'pemeriksaan',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'hasil_swab2',
                                        "changedValue"=>$row->hasil_swab2,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);  
                        }
                          if($row->hasil_swab3 != $hasil3)
                        {
                                 $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'pemeriksaan',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'hasil_swab3',
                                        "changedValue"=>$row->hasil_swab3,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);  
                        }
                         if($row->hasil_swab4 != $hasil4)
                        {
                                 $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'pemeriksaan',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'hasil_swab4',
                                        "changedValue"=>$row->hasil_swab4,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);  
                        }
                          if($row->hasil_swab5 != $hasil5)
                        {
                                 $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'pemeriksaan',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'hasil_swab5',
                                        "changedValue"=>$row->hasil_swab5,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);  
                        }
                         if($row->hasil_swab6 != $hasil6)
                        {
                                 $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'pemeriksaan',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'hasil_swab6',
                                        "changedValue"=>$row->hasil_swab6,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);  
                        }
                          if($row->hasil_swab7 != $hasil7)
                        {
                                 $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'pemeriksaan',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'hasil_swab7',
                                        "changedValue"=>$row->hasil_swab7,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);  
                        }
                         if($row->hasil_swab8!= $hasil8)
                        {
                                 $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'pemeriksaan',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'hasil_swab8',
                                        "changedValue"=>$row->hasil_swab8,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);  
                        }
                          if($row->hasil_swab9 != $hasil9)
                        {
                                 $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'pemeriksaan',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'hasil_swab9',
                                        "changedValue"=>$row->hasil_swab9,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);  
                        }
                         if($row->hasil_swab10 != $hasil10)
                        {
                                 $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'pemeriksaan',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'hasil_swab10',
                                        "changedValue"=>$row->hasil_swab10,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);  
                        }
                }
                $data = $this->security->xss_clean($data3);
                $this->home->editData2($data,$medicalno);
                echo json_encode("Sukses");
        }
         public function update()
        {
                

                $medicalno = $this->input->post('medicalno');
                $jumlah_kontak = $this->input->post('jumlah_kontak');
                $nama_kontak = $this->input->post('nama_kontak');
                $umur_kontak = $this->input->post('umur_kontak');
                $jenis_kontak = $this->input->post('jenis_kontak');
                $alamat_kontak = $this->input->post('alamat_kontak');
                $hp_kontak = $this->input->post('hp_kontak');
                $aktivitas_kontak = $this->input->post('aktivitas_kontak');
                $statusAwal = $this->input->post('statusAwal');
                $statusDari = $this->input->post('statusDari');

                $tanggalMasuk2 = $this->input->post('tanggalMasuk');
                
                $tanggalMasuk = date("Y-m-d", strtotime($tanggalMasuk2));
                $status = $this->input->post('status');
                $petugas = $this->input->post('petugas');
                $data3 = array(
                        "mrn" => $this->input->post("medicalno"),
                        "jumlah_kontak_erat" => $this->input->post("jumlah_kontak"),
                        "nama_kontak"=>$this->input->post("nama_kontak"),
                        "umur" => $this->input->post("umur_kontak"),
                        "sex" => $this->input->post("jenis_kontak"),
                        "alamat"=> $this->input->post("alamat_kontak"),
                        "no_hp" => $this->input->post("hp_kontak"),
                        "aktivitas" => $this->input->post("aktivitas_kontak"),
                        "status_awal"=>$this->input->post("statusAwal"),
                        "asal_status" =>$this->input->post("statusDari"),
                        "tanggal_status" => $tanggalMasuk,
                        "status"=>$this->input->post("status"),
                        "is_petugas"=>$this->input->post("petugas"),
                );
              
             
                $data_lama = $this->home->getIdentitas($medicalno);
                $nik=$this->input->cookie('NIK', TRUE);
                date_default_timezone_set("Asia/Jakarta");
                $tanggal_skg = date("Y-m-d H:i:s");
                foreach($data_lama as $row)
                {
                        if($row->jumlah_kontak_erat != $jumlah_kontak)
                        {
                                $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'identitas',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'jumlah_kontak_erat',
                                        "changedValue"=>$row->jumlah_kontak_erat,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);
                        }
                         if($row->nama_kontak != $nama_kontak)
                        {
                                $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'identitas',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'nama_kontak',
                                        "changedValue"=>$row->nama_kontak,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);
                        }
                        if($row->umur != $umur_kontak)
                        {
                                $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'identitas',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'umur',
                                        "changedValue"=>$row->umur,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);
                        }
                        if($row->sex != $jenis_kontak)
                        {
                                $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'identitas',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'sex',
                                        "changedValue"=>$row->sex,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);
                        }
                        if($row->alamat != $alamat_kontak)
                        {
                                $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'identitas',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'alamat',
                                        "changedValue"=>$row->alamat,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);
                        }
                        if($row->no_hp != $hp_kontak)
                        {
                                $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'identitas',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'no_hp',
                                        "changedValue"=>$row->no_hp,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);
                        }
                          if($row->aktivitas != $aktivitas_kontak)
                        {
                                $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'identitas',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'aktivitas',
                                        "changedValue"=>$row->aktivitas,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);
                        }
                          if($row->status_awal != $statusAwal)
                        {
                                $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'identitas',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'status_awal',
                                        "changedValue"=>$row->status_awal,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);
                        }
                          if($row->asal_status != $statusDari)
                        {
                                $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'identitas',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'asal_status',
                                        "changedValue"=>$row->asal_status,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);
                        }
                          if($row->tanggal_status != $tanggalMasuk)
                        {
                                $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'identitas',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'tanggal_status',
                                        "changedValue"=>$row->tanggal_status,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);
                        }
                          if($row->status != $status)
                        {
                                $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'identitas',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'status',
                                        "changedValue"=>$row->status,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);
                        }
                          if($row->is_petugas != $petugas)
                        {
                                $data = array(
                                        "nik"=>$nik,
                                        "nama_bagian"=>'identitas',
                                        "id_bagian"=>$row->id,
                                        "action"=>'edit',
                                        "changedColumn"=>'is_petugas',
                                        "changedValue"=>$row->is_petugas,
                                        "createdDate"=>$tanggal_skg,
                                        "is_deleted"=>'0',
                                        
                                 );
                                $data2 = $this->security->xss_clean($data);
                                $this->home->addLog($data2);
                        }
                }
                $data = $this->security->xss_clean($data3);
                $this->home->editData($data,$medicalno);
                echo json_encode("Sukses");
               

        }
        public function getIdentitas()
        {
                $mrn = $this->input->post('mrn');
                $status = "0";
                $l = $this->home->getIdentitas($mrn);
                if($l == '0')
                {
                        echo json_encode($status);
                }
                else
                {
                        echo json_encode($l);
                }
        }
        public function getPemeriksaan()
        {
                $mrn = $this->input->post('mrn');
                $status = "0";
                $l = $this->home->getPemeriksaan($mrn);
                if($l == '0')
                {
                        echo json_encode($status);
                }
                else
                {
                        echo json_encode($l);
                }
        }
         public function getKondisi()
        {
                $mrn = $this->input->post('mrn');
                $status = "0";
                $l = $this->home->getKondisi($mrn);
                if($l == '0')
                {
                        echo json_encode($status);
                }
                else
                {
                        echo json_encode($l);
                }
        }
        public function getInfoPasien()
        {
                $mrn = $this->input->post('mrn');
                $l = $this->home->getInfoPasien($mrn);
                echo json_encode($l);
        }
        public function listPatient()
        {
            $id = $this->input->cookie('serviceUnitId', TRUE);
                $columns = array(
                0=>'RegistrationNo',
                1=>'patientName',
                2=>'MedicalNo',
                3=>'ServiceUnitName',
                4=>'DischargeDate',
            );
            $limit = $this->input->post('length');
            $start = $this->input->post('start');
            $order = $columns[$this->input->post('order')[0]['column']];
            $dir = $this->input->post('order')[0]['dir'];
            $temp=$this->input->post('filter');
            $totalData = $this->home->allposts_count($id);
            $totalFiltered = $totalData;
            if(empty($this->input->post('search')['value']))
            {
                $posts = $this->home->allposts($limit,$start,$order,$dir,$temp,$id);
            }
            else {
                $search = $this->input->post('search')['value'];

                $posts =  $this->home->posts_search($limit,$start,$search,$order,$dir,$id);

                $totalFiltered = $this->home->posts_search_count($search,$id);
            }
            $data = array();
            if(!empty($posts))
            {
                foreach ($posts as $post)
                {   
                        $nestedData['RegistrationNo'] = $post->RegistrationNo;
                        $nestedData['PatientName'] = $post->PatientName;
                        $nestedData['MedicalNo'] = $post->MedicalNo;
                        $nestedData['ServiceUnitName'] = $post->ServiceUnitName;
                        $nestedData['DischargeDate'] = $post->DischargeDate;
                        $data[] = $nestedData;
                }
            }
            $json_data = array(
                "draw"            => intval($this->input->post('draw')),
                "recordsTotal"    => intval($totalData),
                "recordsFiltered" => intval($totalFiltered),
                "data"            => $data,
                "token"           =>$this->security->get_csrf_hash()
            );

            echo json_encode($json_data);

        }
}