<?php


require("assets/lib/fpdf/fpdf.php");

define('FPDF_FONTPATH','assets/lib/fpdf/font/');
require_once("koneksi.php");

// ambil dari database
$kode=$_GET['kode'];
$query1 = mysqli_query($konek, "SELECT * FROM aduan WHERE kode = '$kode'");
$query2 = mysqli_query($konek, "SELECT * FROM korban WHERE kode = '$kode'");
$query3 = mysqli_query($konek, "SELECT * FROM pelaku WHERE kode = '$kode'");

$aduan = mysqli_fetch_array($query1);
             
$np = $aduan['np'];
$query4 = mysqli_query($konek, "SELECT * FROM pelapor WHERE np = '$np'"); 

$korban = mysqli_fetch_array($query2);
$pelaku = mysqli_fetch_array($query3);
$pelapor = mysqli_fetch_array($query4);
                
class PDF extends FPDF
{
    // Page header
    function Header()
    {        
        $kode=$_GET['kode'];
        // Arial bold 15
    	$this->SetFont('Times','B',12);
    	// Move to the right
    	// $this->Cell(60);
    	// Title
        $this->Cell(190,5,'POLRI DAERAH SULAWESI SELATAN',0,1,'C');
        $this->Cell(190,5,'RESORT PALOPO',0,1,'C');
        $this->Cell(190,5,'SEKTOR WARA UTARA',0,1,'C');
        
        // Logo
        $this->Image('asset/img/lambang-polri.png',88,25,35);
    	$this->Ln(35);
        // Line break
        
    	$this->SetFont('Times','B',13);
        $this->Cell(208,5,'LAPORAN POLISI',0,1,'L');
        
    	$this->SetFont('Times','',12);
        $this->Cell(108,5,'Nomor : '.$kode,0,1,'L');

    	
    }

    // Page footer
    function Footer()
    {
    	// Position at 1.5 cm from bottom
    	$this->SetY(-15);
    	// Arial italic 8
    	//$this->SetFont('Arial','I',8);
    	// Page number
    	//$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

// ambil dari database
/*$query = "SELECT * FROM kartu_keluarga LEFT JOIN warga ON kartu_keluarga.id_kepala_keluarga = warga.id_warga";
$hasil = mysqli_query($db, $query);
$data_kartu_keluarga = array();
while ($row = mysqli_fetch_assoc($hasil)) {
  $data_kartu_keluarga[] = $row;
}*/

$pdf = new PDF('P', 'mm', [297, 210]);
$pdf->AliasNbPages();
$pdf->AddPage();

// set font
$pdf->SetFont('Times','',9);


        $pdf->Ln(2);

        $pdf->SetFont('Times','U',10);
        for ($i=0; $i < 10; $i++) {
            $pdf->Cell(190,0,'',1,1,'C');
        }

        $pdf->SetFont('Times','',12);
        $pdf->Cell(108,5,'YANG MELAPORKAN',0,1,'L');
        $pdf->SetFont('Times','U',10);
        for ($i=0; $i < 10; $i++) {
            $pdf->Cell(190,0,'',1,1,'C');
        }

        $pdf->SetFont('Times','',12);

        // header tabel
        $pdf->cell(10,7,' ',0,0,'L');
        $pdf->cell(60,7,'JENIS IDENTITAS',0,1,'L');

        $pdf->cell(10,7,' ',0,0,'L');
        $pdf->cell(50,7,'NAMA',0,0,'L');
        $pdf->cell(60,7,': '.$pelapor['nama'],0,1,'L');
        
        $pdf->cell(10,7,' ',0,0,'L');
        $pdf->cell(50,7,'TEMPAT/TGL LAHIR',0,0,'L');
        $pdf->cell(60,7,': '.$pelapor['ttl'],0,1,'L');

        $pdf->cell(10,7,' ',0,0,'L');
        $pdf->cell(50,7,'JENIS KELAMIN',0,0,'L');
        $pdf->cell(60,7,': '.$pelapor['jk'],0,1,'L');

        $pdf->cell(10,7,' ',0,0,'L');
        $pdf->cell(50,7,'PEKERJAAN',0,0,'L');
        $pdf->cell(60,7,': '.$pelapor['pekerjaan'],0,1,'L');

        $pdf->cell(10,7,' ',0,0,'L');
        $pdf->cell(50,7,'ALAMAT/TEMPAT',0,0,'L');
        $pdf->cell(60,7,': '.$pelapor['alamat'],0,1,'L');

        $pdf->cell(10,7,' ',0,0,'L');
        $pdf->cell(50,7,'NO.TELP/FAX/TEMPAT',0,0,'L');
        $pdf->cell(60,7,': '.$pelapor['nohp'],0,1,'L');

        $pdf->SetFont('Times','U',10);
        for ($i=0; $i < 10; $i++) {
            $pdf->Cell(190,0,'',1,1,'C');
        }

        $pdf->SetFont('Times','',12);
        $pdf->Cell(108,5,'PERISTIWA YANG DI LAPORAKAN',0,1,'L');
        $pdf->SetFont('Times','U',10);
        for ($i=0; $i < 10; $i++) {
            $pdf->Cell(190,0,'',1,1,'C');
        }

        $pdf->SetFont('Times','',12);

        // header tabel
        
        $pdf->cell(10,7,' ',0,0,'L');
        $pdf->cell(7,7,'1.',0,0,'L');
        $pdf->cell(43,7,'WAKTU KEJADIAN',0,0,'L');
        $pdf->cell(60,7,': '.$aduan['datetime'],0,1,'L');
        
        $pdf->cell(10,7,' ',0,0,'L');
        $pdf->cell(7,7,'2. ',0,0,'L');
        $pdf->cell(43,7,'TEMPAT KEJADIAN',0,0,'L');
        $pdf->cell(60,7,': '.$aduan['tkp'],0,1,'L');
        
        $pdf->cell(10,7,' ',0,0,'L');
        $pdf->cell(7,7,'3.',0,0,'L');
        $pdf->cell(43,7,'APA YANG TERJADI',0,0,'L');
        $pdf->cell(60,7,': '.$aduan['kategori'],0,1,'L');

        $pdf->cell(10,7,' ',0,0,'L');
        $pdf->cell(7,7,'4.',0,0,'L');
        $pdf->cell(43,7,'SIAPA TERLAPOR',0,1,'L');

        $pdf->cell(10,7,' ',0,0,'L');
        $pdf->cell(7,7,' ',0,0,'L');
        $pdf->cell(43,7,'NAMA',0,0,'L');
        $pdf->cell(60,7,': '.$pelaku['nama'],0,1,'L');

        $pdf->cell(10,7,' ',0,0,'L');
        $pdf->cell(7,7,' ',0,0,'L');
        $pdf->cell(43,7,'JENIS KELAMIN',0,0,'L');
        $pdf->cell(60,7,': '.$pelaku['jk'],0,1,'L');

        $pdf->cell(10,7,' ',0,0,'L');
        $pdf->cell(7,7,' ',0,0,'L');
        $pdf->cell(43,7,'ALAMAT',0,0,'L');
        $pdf->cell(60,7,': '.$pelaku['alamat'],0,1,'L');

        $pdf->cell(10,7,' ',0,0,'L');
        $pdf->cell(7,7,' ',0,0,'L');
        $pdf->cell(43,7,'CIRI-CIRI',0,0,'L');
        $pdf->SetFillColor(255,255,255);
        $a = substr($pelaku['ciri'],3,-4);
        $pdf->multicell(100,7,': '.$a,0,1,'L');

        $pdf->cell(10,7,' ',0,0,'L');
        $pdf->cell(7,7,'5.',0,0,'L');
        $pdf->cell(43,7,'KORBAN<',0,1,'L');
        //$pdf->cell(60,7,': '.$pelaku['alamat'],0,1,'L');

        $pdf->cell(10,7,' ',0,0,'L');
        $pdf->cell(7,7,' ',0,0,'L');
        $pdf->cell(43,7,'NAMA',0,0,'L');
        $pdf->cell(60,7,': '.$korban['nama'],0,1,'L');

        $pdf->cell(10,7,' ',0,0,'L');
        $pdf->cell(7,7,' ',0,0,'L');
        $pdf->cell(43,7,'JENIS KELAMIN',0,0,'L');
        $pdf->cell(60,7,': '.$korban['jk'],0,1,'L');

        $pdf->cell(10,7,' ',0,0,'L');
        $pdf->cell(7,7,' ',0,0,'L');
        $pdf->cell(43,7,'ALAMAT',0,0,'L');
        $pdf->cell(60,7,': '.$korban['alamat'],0,1,'L');

        $pdf->cell(10,7,' ',0,0,'L');
        $pdf->cell(7,7,' ',0,0,'L');
		$pdf->SetFillColor(255,255,255);
        $pdf->cell(43,7,'CIRI-CIRI',0,0,'L');
        $b = substr($korban['ciri'],3,-4);
        $pdf->multicell(100,7,': '.$b,0,1,'L');

//===================================================================

        $pdf->SetFont('Times','U',10);
        for ($i=0; $i < 10; $i++) {
            $pdf->Cell(190,0,'',1,1,'C');
        }

        $pdf->SetFont('Times','',12);
        $pdf->Cell(190,5,'URAIAN KEJADIAN',0,1,'C');
        $pdf->SetFont('Times','U',10);
        for ($i=0; $i < 10; $i++) {
            $pdf->Cell(190,0,'',1,1,'C');
        }

        $pdf->SetFont('Times','B',12);

        // header tabel
        $pdf->cell(45,7,'WAKTU KEJADIAN',0,0,'L');
        $pdf->cell(5,7,':',0,0,'C');
        
        $pdf->SetFont('Times','',12);
		$pdf->SetFillColor(255,255,255);
        $c = substr($aduan['isi'],3,-4);
        $pdf->multicell(100,7,$c,0,'L',1);

        
        $pdf->cell(60,7,'ADUAN',0,0,'C');
        $pdf->cell(60,7,'PELAKU',0,0,'C');
        $pdf->cell(60,7,'KORBAN',0,1,'C');

        
        $pdf->Image('asset/img/aduan/'.$aduan['gambar'],25,260,30,30);
        $pdf->Image('asset/img/pelaku/'.$pelaku['gambar'],85,260,30,30);
        $pdf->Image('asset/img/korban/'.$korban['gambar'],145,260,30,30);


/*foreach ($data_kartu_keluarga as $kartu_keluarga) {

    // hitung anggota
    $query_jumlah_anggota = "SELECT COUNT(*) AS total FROM warga_has_kartu_keluarga WHERE id_keluarga = ".$kartu_keluarga['id_keluarga'];
    $hasil_jumlah_anggota = mysqli_query($db, $query_jumlah_anggota);
    $jumlah_jumlah_anggota = mysqli_fetch_assoc($hasil_jumlah_anggota);

    $pdf->cell(10, 7, $nomor++ . '.', 1, 0, 'C');
    $pdf->cell(30, 7, strtoupper($kartu_keluarga['nomor_keluarga']), 1, 0, 'C');
    $pdf->cell(75, 7, strtoupper($kartu_keluarga['nama_warga']), 1, 0, 'L');
    $pdf->cell(30, 7, strtoupper($kartu_keluarga['nik_warga']), 1, 0, 'C');
    $pdf->cell(35, 7, strtoupper($jumlah_jumlah_anggota['total']), 1, 0, 'C');
    $pdf->cell(98, 7, strtoupper($kartu_keluarga['alamat_keluarga']), 1, 0, 'L');
    $pdf->cell(15, 7, strtoupper($kartu_keluarga['rt_keluarga']), 1, 0, 'C');
    $pdf->cell(15, 7, strtoupper($kartu_keluarga['rw_keluarga']), 1, 1, 'C');

}*/

	$pdf->Ln(10);

$pdf->Output();
?>
