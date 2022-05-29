<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<!-- extrack pdf -->
<?php
$pdfText = '';
if (isset($_POST['submit'])) {
    // If file is selected 
    if (!empty($_FILES["pdf_file"]["name"])) {
        // File upload path 
        $fileName = basename($_FILES["pdf_file"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats 
        $allowTypes = array('pdf');
        if (in_array($fileType, $allowTypes)) {
            // Include autoloader file 
            // include 'vendor/autoload.php';

            // Initialize and load PDF Parser library 
            $parser = new \Smalot\PdfParser\Parser();

            // Source PDF file to extract text 
            $file = $_FILES["pdf_file"]["tmp_name"];

            // Parse pdf file using Parser library 
            $pdf = $parser->parseFile($file);

            // Extract text from PDF 
            $text = $pdf->getText();

            // Add line break 
            $pdfText = nl2br($text);
        } else {
            $statusMsg = '<p>Sorry, only PDF file is allowed to upload.</p>';
        }
    } else {
        $statusMsg = '<p>Please select a PDF file to extract text.</p>';
    }
}

?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Halaman Validasi</h1>
        </div>
        <div class="section-body">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-input upload">
                                        <i class="bi bi-cloud-upload-fill text-primary" style="font-size: 50px;"></i>
                                        <button class="btn btn-primary ab">Upload file
                                            <input type="file" name="pdf_file" onchange="prevImg()" id="in" required>
                                        </button>
                                        <label for="pdf_file" class="label" style="font-size: medium;"></label>
                                    </div>
                                    <input type="submit" name="submit" class="btn btn-success mb-3" value="Validasi">
                                </form>

                                <hr>
                                <?= $pdfText; ?>
                                <?php
                                // varibel validasi
                                $ipk = '';
                                $sks = '';
                                $kp = '';
                                $mkAgama = '';
                                $mkBindo = '';
                                $mkKwn = '';
                                $mkBing1 = '';
                                $mkBing2 = '';
                                $mkapti1 = '';
                                $mkapti2 = '';
                                $mkKwu = '';
                                $mkPK = '';
                                $setik = '';
                                // regex ipk
                                if (preg_match("/(I(\s|)P(\s|)K(\s|):(\s|)(3.)[0-9]{0,2})|(I(\s|)P(\s|)K(\s|):(\s|)(2.)[5-9]{1,2})
                                |(IPK(\s|):(\s|)(4.)[0]{1,2})/imx", $pdfText)) {
                                    $ipk = 'bi bi-check-circle-fill text-success';
                                } else if ($pdfText == '') {
                                    $ipk = '';
                                } else {
                                    $ipk = 'bi bi-x-circle-fill text-danger';
                                }
                                // regex sks
                                if (preg_match("/T(\s|)o(\s|)t(\s|)a(\s|)l(\s|)S(\s|)K(\s|)S(\s|):(\s|)((13)[8-9])|T(\s|)o(\s|)t(\s|)a(\s|)l(\s|)S(\s|)K(\s|)S(\s|):(\s|)((14)[0-9])/mix", $pdfText)) {
                                    $sks = 'bi bi-check-circle-fill text-success';
                                } else if ($pdfText == '') {
                                    $sks = '';
                                } else {
                                    $sks = 'bi bi-x-circle-fill text-danger';
                                }
                                // regex KP
                                if (preg_match("/(K(\s|)e(\s|)r(\s|)j(\s|)a(\s|)P(\s|)r(\s|)a(\s|)k(\s|)t(\s|)i(\s|)k(\s|)3(\s|)[0-9]{0,2}(\s|)(\s|)(\d|){0,3}[A-B|a-b])/mix", $pdfText)) {
                                    $kp = 'bi bi-check-circle-fill text-success';
                                } else if ($pdfText == '') {
                                    $kp = '';
                                } else {
                                    $kp = 'bi bi-x-circle-fill text-danger';
                                }
                                // regex setik
                                if (preg_match("/(S(\s|)e(\s|)m(\s|)i(\s|)n(\s|)a(\s|)r(\s|)T(\s|)e(\s|)m(\s|)a(\s|)t(\s|)i(\s|)k(\s|)2(\s|)(\d|){0,2}(\s|)(\d|){0,3}(\s|)[A-B|a-b])/mix", $pdfText)) {
                                    $setik = 'bi bi-check-circle-fill text-success';
                                } else if ($pdfText == '') {
                                    $setik = '';
                                } else {
                                    $setik = 'bi bi-x-circle-fill text-danger';
                                }
                                // MINIMAL C
                                // regex matkul agama
                                if (preg_match("/(A(\s|)g(\s|)a(\s|)m(\s|)a(\s|)i(\s|)s(\s|)l(\s|)a(\s|)m(\s|)2(\s|)(\d|){0,2}(\s|)[0-9]{0,3}(\s|).(\d|){0,3}(\s|)[A-C|a-c])/imx", $pdfText)) {
                                    $mkAgama = 'bi bi-check-circle-fill text-success';
                                } else if ($pdfText == '') {
                                    $mkAgama = '';
                                } else {
                                    $mkAgama = 'bi bi-x-circle-fill text-danger';
                                }
                                // regex bhs indo
                                if (preg_match("/(B(\s|)a(\s|)h(\s|)a(\s|)s(\s|)a(\s|)I(\s|)n(\s|)d(\s|)o(\s|)n(\s|)e(\s|)s(\s|)i(\s|)a(\s|)2(\s|)(\d|){0,2}(\s|)[0-9]{0,3}(\s|).(\d|){0,3}(\s|)[A-C|a-c])/mix", $pdfText)) {
                                    $mkBindo = 'bi bi-check-circle-fill text-success';
                                } else if ($pdfText == '') {
                                    $mkBindo = '';
                                } else {
                                    $mkBindo = 'bi bi-x-circle-fill text-danger';
                                }
                                // regex kwn
                                if (preg_match("/(K(\s|)e(\s|)w(\s|)a(\s|)r(\s|)g(\s|)a(\s|)n(\s|)e(\s|)g(\s|)a(\s|)r(\s|)a(\s|)a(\s|)n(\s|)2(\s|)(\d|){0,2}(\s|)[0-9]{0,3}(\s|).(\d|){0,3}(\s|)[A-C|a-c])/mix", $pdfText)) {
                                    $mkKwn = 'bi bi-check-circle-fill text-success';
                                } else if ($pdfText == '') {
                                    $mkKwn = '';
                                } else {
                                    $mkKwn = 'bi bi-x-circle-fill text-danger';
                                }
                                // Mtkul minimal B
                                // Bhs inggris1
                                if (preg_match("/(B(\s|)a(\s|)h(\s|)a(\s|)s(\s|)a(\s|)i(\s|)n(\s|)g(\s|)g(\s|)r(\s|)i(\s|)s(\s|)I(\s|)[(]I(\s|)n(\s|)t(\s|)e(\s|)g(\s|)r(\s|)a(\s|)t(\s|)e(\s|)d[)](\s|)2(\s|)(\d|){0,2}(\s|)[0-9]{0,3}(\s|).(\d|){0,3}(\s|)[A-B|a-b])/mix", $pdfText)) {
                                    $mkBing1 = 'bi bi-check-circle-fill text-success';
                                } else if ($pdfText == '') {
                                    $mkBing1 = '';
                                } else {
                                    $mkBing1 = 'bi bi-x-circle-fill text-danger';
                                }
                                // Bhs inggris2
                                if (preg_match("/(B(\s|)a(\s|)h(\s|)a(\s|)s(\s|)a(\s|)i(\s|)n(\s|)g(\s|)g(\s|)r(\s|)i(\s|)s(\s|)I(\s|)I(\s|)[(]C(\s|)o(\s|)m(\s|)m(\s|)u(\s|)n(\s|)i(\s|)c(\s|)a(\s|)t(\s|)i(\s|)v(\s|)e[)](\s|)2(\s|)(\d|){0,2}(\s|)[0-9]{0,3}(\s|).(\d|){0,3}(\s|)[A-B|a-b])/mix", $pdfText)) {
                                    $mkBing2 = 'bi bi-check-circle-fill text-success';
                                } else if ($pdfText == '') {
                                    $mkBing2 = '';
                                } else {
                                    $mkBing2 = 'bi bi-x-circle-fill text-danger';
                                }
                                // Apti 1
                                if (preg_match("/(A(\s|)p(\s|)l(\s|)i(\s|)k(\s|)a(\s|)s(\s|)i(\s|)T(\s|)e(\s|)k(\s|)n(\s|)o(\s|)l(\s|)o(\s|)g(\s|)i(\s|)I(\s|)n(\s|)f(\s|)o(\s|)r(\s|)m(\s|)a(\s|)s(\s|)i(\s|)I(\s|)2(\s|)[0-9]{0,2}(\s|)[0-9]{0,3}(\s|).(\d|){0,3}(\s|)[A-B|a-b])/mix", $pdfText)) {
                                    $mkapti1 = 'bi bi-check-circle-fill text-success';
                                } else if ($pdfText == '') {
                                    $mkapti1 = '';
                                } else {
                                    $mkapti1 = 'bi bi-x-circle-fill text-danger';
                                }
                                // Apti 2
                                if (preg_match("/(A(\s|)p(\s|)l(\s|)i(\s|)k(\s|)a(\s|)s(\s|)i(\s|)T(\s|)e(\s|)k(\s|)n(\s|)o(\s|)l(\s|)o(\s|)g(\s|)i(\s|)I(\s|)n(\s|)f(\s|)o(\s|)r(\s|)m(\s|)a(\s|)s(\s|)i(\s|)I(\s|)I(\s|)2(\s|)[0-9]{0,2}(\s|)[0-9]{0,3}(\s|).(\d|){0,3}(\s|)[A-B|a-b])/mix", $pdfText)) {
                                    $mkapti2 = 'bi bi-check-circle-fill text-success';
                                } else if ($pdfText == '') {
                                    $mkapti2 = '';
                                } else {
                                    $mkapti2 = 'bi bi-x-circle-fill text-danger';
                                }
                                // KWU
                                if (preg_match("/(K(\s|)e(\s|)w(\s|)i(\s|)r(\s|)a(\s|)u(\s|)s(\s|)a(\s|)h(\s|)a(\s|)a(\s|)n(\s|)2(\s|)[0-9]{0,2}(\s|)[0-9]{0,3}(\s|).(\d|){0,3}(\s|)[A-B|a-b])/mix", $pdfText)) {
                                    $mkKwu = 'bi bi-check-circle-fill text-success';
                                } else if ($pdfText == '') {
                                    $mkKwu = '';
                                } else {
                                    $mkKwu = 'bi bi-x-circle-fill text-danger';
                                }
                                // PK
                                if (preg_match("/(P(\s|)e(\s|)n(\s|)g(\s|)e(\s|)m(\s|)b(\s|)a(\s|)n(\s|)g(\s|)a(\s|)n(\s|)K(\s|)e(\s|)p(\s|)r(\s|)i(\s|)b(\s|)a(\s|)d(\s|)i(\s|)a(\s|)n(\s|)2(\s|)[0-9]{0,2}(\s|)[0-9]{0,3}(\s|).(\d|){0,3}(\s|)[A-B|a-b])/mix", $pdfText)) {
                                    $mkPK = 'bi bi-check-circle-fill text-success';
                                } else if ($pdfText == '') {
                                    $mkPK = '';
                                } else {
                                    $mkPK = 'bi bi-x-circle-fill text-danger';
                                }
                                // nilai praktik minimal B
                                $dwPratik;
                                $sbdPraktik;
                                $soPraktik;
                                $strukturDataPraktik;
                                $jarkomPraktik;
                                $pboPraktik;
                                $pwPraktik;
                                $sbdlPraktik;
                                $pmPraktik;

                                // dw praktik
                                if (preg_match("/(D(\s|)e(\s|)s(\s|)a(\s|)i(\s|)n(\s|)W(\s|)e(\s|)b(\s|)P(\s|)r(\s|)a(\s|)k(\s|)t(\s|)i(\s|)k(\s|)u(\s|)m(\s|)1(\s|)[0-9]{0,2}(\s|)[0-9]{0,3}(\s|).(\d|){0,3}(\s|)[A-B|a-b])/mix", $pdfText)) {
                                    $dwPratik = 'bi bi-check-circle-fill text-success';
                                } else if ($pdfText == '') {
                                    $dwPratik = '';
                                } else {
                                    $dwPratik = 'bi bi-x-circle-fill text-danger';
                                }
                                // SBD praktik
                                if (preg_match("/(S(\s|)i(\s|)s(\s|)t(\s|)e(\s|)m(\s|)B(\s|)a(\s|)s(\s|)i(\s|)s(\s|)D(\s|)a(\s|)t(\s|)a(\s|)P(\s|)r(\s|)a(\s|)k(\s|)t(\s|)i(\s|)k(\s|)u(\s|)m(\s|)1(\s|)[0-9]{0,2}(\s|)[0-9]{0,3}(\s|).(\d|){0,3}(\s|)[A-B|a-b])/mix", $pdfText)) {
                                    $sbdPraktik = 'bi bi-check-circle-fill text-success';
                                } else if ($pdfText == '') {
                                    $sbdPraktik = '';
                                } else {
                                    $sbdPraktik = 'bi bi-x-circle-fill text-danger';
                                }
                                // So praktik
                                if (preg_match("/(S(\s|)i(\s|)s(\s|)t(\s|)e(\s|)m(\s|)O(\s|)p(\s|)e(\s|)r(\s|)a(\s|)s(\s|)i(\s|)P(\s|)r(\s|)a(\s|)k(\s|)t(\s|)i(\s|)k(\s|)u(\s|)m(\s|)1(\s|)[0-9]{0,2}(\s|)[0-9]{0,3}(\s|).(\d|){0,3}(\s|)[A-B|a-b])/mix", $pdfText)) {
                                    $soPraktik = 'bi bi-check-circle-fill text-success';
                                } else if ($pdfText == '') {
                                    $soPraktik = '';
                                } else {
                                    $soPraktik = 'bi bi-x-circle-fill text-danger';
                                }
                                // Struktur data praktik
                                if (preg_match("/(S(\s|)t(\s|)r(\s|)u(\s|)k(\s|)t(\s|)u(\s|)r(\s|)D(\s|)a(\s|)t(\s|)a(\s|)P(\s|)r(\s|)a(\s|)k(\s|)t(\s|)i(\s|)k(\s|)u(\s|)m(\s|)1(\s|)[0-9]{0,2}(\s|)[0-9]{0,3}(\s|).(\d|){0,3}(\s|)[A-B|a-b])/mix", $pdfText)) {
                                    $strukturDataPraktik = 'bi bi-check-circle-fill text-success';
                                } else if ($pdfText == '') {
                                    $strukturDataPraktik = '';
                                } else {
                                    $strukturDataPraktik = 'bi bi-x-circle-fill text-danger';
                                }
                                // Jarkom praktik
                                if (preg_match("/(J(\s|)a(\s|)r(\s|)i(\s|)n(\s|)g(\s|)a(\s|)n(\s|)K(\s|)o(\s|)m(\s|)p(\s|)u(\s|)t(\s|)e(\s|)r(\s|)P(\s|)r(\s|)a(\s|)k(\s|)t(\s|)i(\s|)k(\s|)u(\s|)m(\s|)1(\s|)[0-9]{0,2}(\s|)[0-9]{0,3}(\s|).(\d|){0,3}(\s|)[A-B|a-b])/mix", $pdfText)) {
                                    $jarkomPraktik = 'bi bi-check-circle-fill text-success';
                                } else if ($pdfText == '') {
                                    $jarkomPraktik = '';
                                } else {
                                    $jarkomPraktik = 'bi bi-x-circle-fill text-danger';
                                }
                                // PBO praktik
                                if (preg_match("/(P(\s|)e(\s|)m(\s|)r(\s|)o(\s|)g(\s|)r(\s|)a(\s|)m(\s|)a(\s|)n(\s|)B(\s|)e(\s|)r(\s|)o(\s|)r(\s|)i(\s|)e(\s|)n(\s|)t(\s|)a(\s|)s(\s|)i(\s|)O(\s|)b(\s|)j(\s|)e(\s|)k(\s|)P(\s|)r(\s|)a(\s|)k(\s|)t(\s|)i(\s|)k(\s|)u(\s|)m(\s|)1(\s|)[0-9]{0,2}(\s|)[0-9]{0,3}(\s|).(\d|){0,3}(\s|)[A-B|a-b])/mix", $pdfText)) {
                                    $pboPraktik = 'bi bi-check-circle-fill text-success';
                                } else if ($pdfText == '') {
                                    $pboPraktik = '';
                                } else {
                                    $pboPraktik = 'bi bi-x-circle-fill text-danger';
                                }
                                // Pw praktik
                                if (preg_match("/(P(\s|)e(\s|)m(\s|)r(\s|)o(\s|)g(\s|)r(\s|)a(\s|)m(\s|)a(\s|)n(\s|)W(\s|)e(\s|)b(\s|)P(\s|)r(\s|)a(\s|)k(\s|)t(\s|)i(\s|)k(\s|)u(\s|)m(\s|)2(\s|)[0-9]{0,2}(\s|)[0-9]{0,3}(\s|).(\d|){0,3}(\s|)[A-B|a-b])/mix", $pdfText)) {
                                    $pwPraktik = 'bi bi-check-circle-fill text-success';
                                } else if ($pdfText == '') {
                                    $pwPraktik = '';
                                } else {
                                    $pwPraktik = 'bi bi-x-circle-fill text-danger';
                                }
                                // Sbdl praktik
                                if (preg_match("/(S(\s|)i(\s|)s(\s|)t(\s|)e(\s|)m(\s|)B(\s|)a(\s|)s(\s|)i(\s|)s(\s|)D(\s|)a(\s|)t(\s|)a(\s|)L(\s|)a(\s|)n(\s|)j(\s|)u(\s|)t(\s|)P(\s|)r(\s|)a(\s|)k(\s|)t(\s|)i(\s|)k(\s|)u(\s|)m(\s|)1(\s|)[0-9]{0,2}(\s|)[0-9]{0,3}(\s|).(\d|){0,3}(\s|)[A-B|a-b])/mix", $pdfText)) {
                                    $sbdlPraktik = 'bi bi-check-circle-fill text-success';
                                } else if ($pdfText == '') {
                                    $sbdlPraktik = '';
                                } else {
                                    $sbdlPraktik = 'bi bi-x-circle-fill text-danger';
                                }
                                // pm praktik
                                if (preg_match("/(P(\s|)e(\s|)m(\s|)r(\s|)o(\s|)g(\s|)r(\s|)a(\s|)m(\s|)a(\s|)n(\s|)M(\s|)o(\s|)b(\s|)i(\s|)l(\s|)e(\s|)P(\s|)r(\s|)a(\s|)k(\s|)t(\s|)i(\s|)k(\s|)u(\s|)m(\s|)2(\s|)[0-9]{0,2}(\s|)[0-9]{0,3}(\s|).(\d|){0,3}(\s|)[A-B|a-b])/mix", $pdfText)) {
                                    $pmPraktik = 'bi bi-check-circle-fill text-success';
                                } else if ($pdfText == '') {
                                    $pmPraktik = '';
                                } else {
                                    $pmPraktik = 'bi bi-x-circle-fill text-danger';
                                }
                                // membuat regex presentasi nilai d

                                $alpro;
                                $dw;
                                $logicInf;
                                $pti;
                                $sbd;
                                $so;
                                $statistik;
                                $strukturData;
                                $tbo;
                                $ajbrLMtrk;
                                $aok;
                                $jarkom;
                                $pbo;
                                $pw;
                                $mtkDiskrit;
                                $mpa;
                                $sbdl;
                                $scr;
                                $si;
                                $tbo;
                                $mppl;
                                $pemjar;
                                $pml;
                                $pi;
                                $rekWeb;
                                $ro;
                                $bigData;
                                $iot;
                                $pmlLanjut;
                                $spk;
                                $webRes;
                                $di;
                                $ep;
                                // $kwu;
                                // nilai alpro
                                if (preg_match("/(Algoritma(\s|)dan(\s|)Pemrograman(\s|)3(\s|)(\d|){0,2}(\s|)(\d|){0,3}(\s|).(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                    $alpro = 3;
                                } else if ($pdfText == '') {
                                    $alpro = 0;
                                } else {
                                    $alpro = 0;
                                }
                                //nillai d dw
                                if (preg_match("/(Desain(\s|)W(\s|)eb(\s|)3(\s|)(\d|){0,2}(\s|)(\d|){0,3}(\s|).(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                    $dw = 3;
                                } else if ($pdfText == '') {
                                    $dw = 0;
                                } else {
                                    $dw = 0;
                                }
                                //nillai logic info
                                if (preg_match("/(Logika(\s|)Informatika(\s|)3(\s|)(\d|){0,2}(\s|)(\d|){0,3}(\s|).(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                    $logicInf = 3;
                                } else if ($pdfText == '') {
                                    $logicInf = 0;
                                } else {
                                    $logicInf = 0;
                                }
                                //nillai PTI
                                if (preg_match("/(Pengantar(\s|)T(\s|)eknologi(\s|)Informasi(\s|)2(\s|)(\d|){0,2}(\s|)(\d|){0,3}(\s|).(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                    $pti = 2;
                                } else if ($pdfText == '') {
                                    $pti = 0;
                                } else {
                                    $pti = 0;
                                }
                                //nillai SBD
                                if (preg_match("/(Sistem(\s|)Basis(\s|)Data(\s|)3(\s|)(\d|){0,2}(\s|)(\d|){0,3}(\s|).(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                    $sbd = 3;
                                } else if ($pdfText == '') {
                                    $sbd = 0;
                                } else {
                                    $sbd = 0;
                                }
                                //nillai So
                                if (preg_match("/(Sistem(\s|)Operasi(\s|)3(\s|)(\d|){0,2}(\s|)(\d|){0,3}(\s|).(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                    $so = 3;
                                } else if ($pdfText == '') {
                                    $so = 0;
                                } else {
                                    $so = 0;
                                }
                                //nillai Statistik
                                if (preg_match("/(Statistika(\s|)3(\s|)(\d|){0,2}(\s|)(\d|){0,3}(\s|).(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                    $statistik = 3;
                                } else {
                                    $statistik = 0;
                                }
                                //nillai Struktur data
                                if (preg_match("/(Struktur(\s|)Data(\s|)3(\s|)(\d|){0,2}(\s|)(\d|){0,3}(\s|).(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                    $strukturData = 3;
                                } else {
                                    $strukturData = 0;
                                }
                                //nillai TBO
                                if (preg_match("/(Teknologi(\s|)Berbasis(\s|)Objek(\s|)3(\s|)(\d|){0,2}(\s|)(\d|){0,3}(\s|).(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                    $tbo = 3;
                                } else {
                                    $tbo = 0;
                                }
                                //nillai Aljabar linear
                                if (preg_match("/(Aljabar (\s|)Linier(\s|)dan(\s|)Matriks(\s|)3(\s|)(\d|){0,2}(\s|)(\d|){0,3}(\s|).(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                    $ajbrLMtrk = 3;
                                } else {
                                    $ajbrLMtrk = 0;
                                }
                                //nillai Arsitektur Komputer
                                if (preg_match("/(Arsitektur(\s|)dan(\s|)Organisasi(\s|)Komputer(\s|)2(\s|)(\d|){0,2}(\s|)(\d|){0,3}(\s|).(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                    $aok = 2;
                                } else {
                                    $aok = 0;
                                }
                                //nillai Jarkom
                                if (preg_match("/(Jaringan(\s|)Komputer(\s|)3(\s|)(\d|){0,2}(\s|)(\d|){0,3}(\s|).(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                    $jarkom = 3;
                                } else {
                                    $jarkom = 0;
                                }
                                //nillai PBO
                                if (preg_match("/(Pemrograman(\s|)Berorientasi(\s|)Objek(\s|)3(\s|)(\d|){0,2}(\s|)(\d|){0,3}(\s|).(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                    $pbo = 3;
                                } else {
                                    $pbo = 0;
                                }
                                //nillai Pemrogaman web
                                if (preg_match("/(Pemrograman(\s|)W(\s|)eb(\s|)3(\s|)(\d|){0,2}(\s|)(\d|){0,3}(\s|).(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                    $pw = 3;
                                } else {
                                    $pw = 0;
                                }
                                //nillai mtk diskrit
                                if (preg_match("/(Matematika(\s|)Diskrit(\s|)3(\s|)(\d|){0,2}(\s|)(\d|){0,3}(\s|).(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                    $mtkDiskrit = 3;
                                } else {
                                    $mtkDiskrit = 0;
                                }
                                //nillai mpa
                                if (preg_match("/(Metodologi(\s|)Pengembangan(\s|)Aplikasi(\s|)3(\s|)(\d|){0,2}(\s|)(\d|){0,3}(\s|).(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                    $mpa = 3;
                                } else {
                                    $mpa = 0;
                                }
                                //nillai sbdl
                                if (preg_match("/(Sistem(\s|)Basis(\s|)Data(\s|)Lanjut(\s|)3(\s|)(\d|){0,2}(\s|)(\d|){0,3}(\s|).(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                    $sbdl = 3;
                                } else {
                                    $sbdl = 0;
                                }
                                //nillai scr
                                if (preg_match("/(Sistem(\s|)Cerdas(\s|)3(\s|)(\d|){0,2}(\s|)(\d|){0,3}(\s|).(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                    $scr = 3;
                                } else {
                                    $scr = 0;
                                }
                                //nillai si
                                if (preg_match("/(Sistem(\s|)Informasi(\s|)3(\s|)(\d|){0,2}(\s|)(\d|){0,3}.(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                    $si = 3;
                                } else {
                                    $si = 0;
                                }
                                //nillai tbo
                                if (preg_match("/(Teori(\s|)Bahasa(\s|)Otomata(\s|)3(\s|)(\d|){0,2}(\s|)(\d|){0,3}.(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                    $tbo = 3;
                                } else {
                                    $tbo = 0;
                                }
                                //nillai mpppl
                                if (preg_match("/(Manajemen(\s|)Proyek(\s|)Perangkat(\s|)Lunak(\s|)2(\s|)(\d|){0,2}(\s|)(\d|){0,3}.(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                    $mppl = 2;
                                } else {
                                    $mppl = 0;
                                }
                                //nillai pemjar
                                if (preg_match("/(Pemrograman(\s|)Jaringan(\s|)3(\s|)(\d|){0,2}(\s|)(\d|){0,3}.(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                    $pemjar = 3;
                                } else {
                                    $pemjar = 0;
                                }
                                //nillai pml
                                if (preg_match("/(Pemrograman(\s|)Mobile(\s|)3(\s|)(\d|){0,2}(\s|)(\d|){0,3}.(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                    $pml = 3;
                                } else {
                                    $pml = 0;
                                }
                                //nillai pi
                                if (preg_match("/(Penelitian(\s|)Informatika(\s|)2(\s|)(\d|){0,2}(\s|)(\d|){0,3}.(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                    $pi = 2;
                                } else {
                                    $pi = 0;
                                }
                                //nillai rekWeb
                                if (preg_match("/(Rekayasa(\s|)W(\s|)eb(\s|)3(\s|)(\d|){0,2}(\s|)(\d|){0,3}.(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                    $rekWeb = 3;
                                } else {
                                    $rekWeb = 0;
                                }
                                //nillai ro
                                if (preg_match("/(Riset(\s|)Operasi(\s|)3(\s|)(\d|){0,2}(\s|)(\d|){0,3}.(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                    $ro = 3;
                                } else {
                                    $ro = 0;
                                }
                                //nillai bigData
                                if (preg_match("/(Big(\s|)Data(\s|)dan(\s|)Data(\s|)Mining(\s|)3(\s|)(\d|){0,2}(\s|)(\d|){0,3}.(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                    $bigData = 3;
                                } else {
                                    $bigData = 0;
                                }
                                //nillai iot
                                if (preg_match("/(Internet(\s|)Of(\s|)Things(\s|)3(\s|)(\d|){0,2}(\s|)(\d|){0,3}.(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                    $iot = 3;
                                } else {
                                    $iot = 0;
                                }
                                //nillai pmlLanjut
                                if (preg_match("/(Pemrograman(\s|)Mobile(\s|)Lanjut(\s|)3(\s|)(\d|){0,2}(\s|)(\d|){0,3}.(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                    $pmlLanjut = 3;
                                } else {
                                    $pmlLanjut = 0;
                                }
                                //nillai spk
                                if (preg_match("/(Sistem(\s|)Pendukung(\s|)Keputusan(\s|)3(\s|)(\d|){0,2}(\s|)(\d|){0,3}.(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                    $spk = 3;
                                } else {
                                    $spk = 0;
                                }
                                //nillai webRes
                                if (preg_match("/(Web(\s|)Responsive(\s|)3(\s|)(\d|){0,2}(\s|)(\d|){0,3}.(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                    $webRes = 3;
                                } else {
                                    $webRes = 0;
                                }
                                //nillai di
                                if (preg_match("/(Desain(\s|)Interface(\s|)3(\s|)(\d|){0,2}(\s|)(\d|){0,3}.(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                    $di = 3;
                                } else {
                                    $di = 0;
                                }
                                //nillai ep
                                if (preg_match("/(Etika(\s|)Profesi(\s|)2(\s|)(\d|){0,2}(\s|)(\d|){0,3}.(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                    $ep = 2;
                                } else {
                                    $ep = 0;
                                }
                                //nillai kwu
                                // if (preg_match("/(Kewirausahaan(\s|)2(\s|)(\d|){0,2}(\s|)(\d|){0,3}.(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                //     $kwu = 2;
                                // } else {
                                //     $kwu = 0;
                                // }
                                // peminatan scr
                                $pcd;
                                $softComput;
                                $deepLearning;
                                $fuzziLogic;
                                $pengenalPola;

                                // nilai pengolah citra digital
                                if (preg_match("/(Pengolahan(\s|)Citra(\s|)Digital(\s|)3(\s|)(\d|){0,2}(\s|)(\d|){0,3}.(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                    $pcd = 3;
                                } else {
                                    $pcd = 0;
                                }
                                // nilai soft computing
                                if (preg_match("/(Soft(\s|)Computing(\s|)3(\s|)(\d|){0,2}(\s|)(\d|){0,3}.(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                    $softComput = 3;
                                } else {
                                    $softComput = 0;
                                }
                                // nilai Deep learning
                                if (preg_match("/(Deep(\s|)Learning(\s|)3(\s|)(\d|){0,2}(\s|)(\d|){0,3}.(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                    $deepLearning = 3;
                                } else {
                                    $deepLearning = 0;
                                }
                                // nilai Fuzzi Logic
                                if (preg_match("/(Fuzzy(\s|)Logic(\s|)3(\s|)(\d|){0,2}(\s|)(\d|){0,3}.(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                    $fuzziLogic = 3;
                                } else {
                                    $fuzziLogic = 0;
                                }
                                // nilai Pengenal pola
                                if (preg_match("/(Pengenalan(\s|)Pola(\s|)3(\s|)(\d|){0,2}(\s|)(\d|){0,3}.(\d|){0,3}(\s|)D)/mix", $pdfText)) {
                                    $pengenalPola = 3;
                                } else {
                                    $pengenalPola = 0;
                                }

                                //hasil jumlah nilai d
                                $hasilD;
                                if ($pdfText == '') {
                                    $hasilD = null;
                                } else {
                                    $hasilD = $alpro + $dw + $logicInf + $pti + $sbd + $so + $statistik + $strukturData + $tbo +
                                        $ajbrLMtrk + $aok + $jarkom + $pbo + $pw + $mtkDiskrit + $mpa + $sbdl + $scr + $si + $tbo
                                        + $mppl + $pemjar + $pml + $pi + $rekWeb + $ro + $bigData + $iot + $pmlLanjut + $spk + $webRes
                                        + $di + $ep + $pcd + $softComput + $deepLearning + $fuzziLogic + $pengenalPola;
                                }
                                // seleksi presentase D
                                $presentaseD = '';
                                if ($pdfText == '') {
                                    $presentaseD = '';
                                } elseif ($hasilD <= 14) {
                                    $presentaseD = 'bi bi-check-circle-fill text-success';
                                } else {
                                    $presentaseD = 'bi bi-x-circle-fill text-danger';
                                }
                                // hasil validasi
                                $hasilValidasi = '';

                                if (
                                    $ipk == 'bi bi-check-circle-fill text-success' &&
                                    $sks == 'bi bi-check-circle-fill text-success' &&
                                    $kp == 'bi bi-check-circle-fill text-success' &&
                                    $setik == 'bi bi-check-circle-fill text-success' &&
                                    $mkBindo == 'bi bi-check-circle-fill text-success' &&
                                    $mkAgama == 'bi bi-check-circle-fill text-success' &&
                                    $mkKwn == 'bi bi-check-circle-fill text-success' &&
                                    $mkBing1 == 'bi bi-check-circle-fill text-success' &&
                                    $mkBing2 == 'bi bi-check-circle-fill text-success' &&
                                    $mkapti1 == 'bi bi-check-circle-fill text-success' &&
                                    $mkapti2 == 'bi bi-check-circle-fill text-success' &&
                                    $mkKwu == 'bi bi-check-circle-fill text-success' &&
                                    $mkPK == 'bi bi-check-circle-fill text-success' &&
                                    $dwPratik == 'bi bi-check-circle-fill text-success' &&
                                    $sbdPraktik == 'bi bi-check-circle-fill text-success' &&
                                    $soPraktik == 'bi bi-check-circle-fill text-success' &&
                                    $strukturDataPraktik == 'bi bi-check-circle-fill text-success' &&
                                    $jarkomPraktik == 'bi bi-check-circle-fill text-success' &&
                                    $pboPraktik == 'bi bi-check-circle-fill text-success' &&
                                    $pwPraktik == 'bi bi-check-circle-fill text-success' &&
                                    $sbdlPraktik == 'bi bi-check-circle-fill text-success' &&
                                    $pmPraktik == 'bi bi-check-circle-fill text-success' &&
                                    $presentaseD == 'bi bi-check-circle-fill text-success'
                                ) {
                                    $hasilValidasi = 'lolos';
                                } elseif ($pdfText == '') {
                                    $hasilValidasi = '';
                                } else {
                                    $hasilValidasi = 'gagal';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <form action="/validasi/save" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="mb-3">
                                <label for="exampleInputName" class="form-label">Nama</label>
                                <input type="text" name="nama_mahasiswa" class="form-control" id="exampleInputName" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputNim" class="form-label">Nim</label>
                                <input type="text" name="nim_mahasiswa" class="form-control" id="exampleInputNim" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputProdi" class="form-label">Prodi</label>
                                <input type="text" name="prodi" class="form-control" id="exampleInputProdi" aria-describedby="emailHelp" value="Informatika" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputStatus" class="form-label">Status</label>
                                <input type="text" name="hasil_validasi" class="form-control" id="exampleInputStatus" aria-describedby="emailHelp" value="<?= $hasilValidasi ?>" readonly>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                        <!-- <hr>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col">
                                    <h5 class="text-success">Hasil Validasi</h5>
                                    <h6><?= $hasilValidasi ?></h6>
                                </div>
                            </div>
                        </div> -->
                        <hr>
                        <div class="container">
                            <div class="row justify-content-center scrollspy-example">
                                <div class="col">
                                    <h5 class="text-info">Aspek yang di lihat</h5>
                                    <p class="text-info">IPK minimal 2.5</p>
                                    <p><i class="<?= $ipk ?>"></i> Index Prestasi Kumulatif(IPK)</p>
                                    <p class="text-info">SKS yang di tempuh minimal 138</p>
                                    <p><i class="<?= $sks ?>"></i> Total Sks</p>
                                    <p class="text-info">lulus MK KP dan Setik</p>
                                    <p><i class="<?= $kp ?>"></i> Kerja Praktik</p>
                                    <p><i class="<?= $setik ?>"></i> Seminar Tematik</p>
                                    <p class="text-info">Mk wajib minimal C</p>
                                    <p><i class="<?= $mkAgama ?>"></i> Agama</p>
                                    <p><i class="<?= $mkBindo ?>"></i> Bahasa Indonesia</p>
                                    <p><i class="<?= $mkKwn ?>"></i> Kewarganegaaan</p>
                                    <p class="text-info">Mk wajib minimal B</p>
                                    <p><i class="<?= $mkBing1 ?>"></i> Bahasa Inggris I(Integrated)</p>
                                    <p><i class="<?= $mkBing2 ?>"></i> Bahasa Inggris II(Communicative)</p>
                                    <p><i class="<?= $mkapti1 ?>"></i> Aplikasi Teknologi Informasi I</p>
                                    <p><i class="<?= $mkapti2 ?>"></i> Aplikasi Teknologi Informasi II</p>
                                    <p><i class="<?= $mkKwu ?>"></i> Kewirausahaan</p>
                                    <p><i class="<?= $mkPK ?>"></i> Pengembangan Kepribadian</p>
                                    <p><i class="<?= $dwPratik ?>"></i> Desain Web Praktik</p>
                                    <p><i class="<?= $sbdPraktik ?>"></i> Sistem Basis Data Praktik</p>
                                    <p><i class="<?= $soPraktik ?>"></i> Sistem Operasi Praktik</p>
                                    <p><i class="<?= $strukturDataPraktik ?>"></i> Struktur Data Praktik</p>
                                    <p><i class="<?= $jarkomPraktik ?>"></i> Jaringan Komputer Praktik</p>
                                    <p><i class="<?= $pboPraktik ?>"></i> PBO Praktik</p>
                                    <p><i class="<?= $pwPraktik ?>"></i> Pemrograman Web Praktik</p>
                                    <p><i class="<?= $sbdlPraktik ?>"></i> SBDL Praktik</p>
                                    <p><i class="<?= $pmPraktik ?>"></i> Pemrograman Mobile Praktik</p>
                                    <p class="text-info">Total nilai D maksimal 14 sks</p>
                                    <p><i class="<?= $presentaseD ?>"></i> Total nilai D <?= $hasilD ?> SKS</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
<?= $this->endSection(); ?>