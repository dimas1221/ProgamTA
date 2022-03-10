<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
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
                                    <div class="form-input">
                                        <label for="pdf_file">PDF File</label>
                                        <input type="file" name="pdf_file" placeholder="Select a PDF file" required class="form-control mb-3">
                                    </div>
                                    <input type="submit" name="submit" class="btn btn-success mb-3" value="Extract Text">
                                </form>
                                <hr>
                                <?= $pdfText; ?>
                                <?php
                               
                                $ipk ='';
                                $sks ='';
                                $mkAgama ='';
                                // regex ipk
                                if(preg_match("/(IPK(\s|):(\s|)(3.)[0-9]{0,2})|(IPK(\s|):(\s|)(2.)[5-9]{1,2})
                                |(IPK(\s|):(\s|)(4.)[0]{1,2})/imx", $pdfText)){
                                    $ipk ='bi bi-check-circle-fill text-success';
                                }else if($pdfText == ''){
                                    $ipk ='';
                                }else{
                                    $ipk = 'bi bi-x-circle-fill text-danger';
                                }
                                // regex sks
                                if(preg_match("/Total(\s|)SKS(\s|):(\s|)((13)[8-9])|Total(\s|)SKS(\s|):(\s|)((14)[0-9])/mix", $pdfText)){
                                    $sks ='bi bi-check-circle-fill text-success';
                                }else if($pdfText == ''){
                                    $sks ='';
                                }else{
                                    $sks = 'bi bi-x-circle-fill text-danger';
                                }
                                // regex matkul agama
                                if(preg_match("/(Agama(\s|)islam(\s|)2(\s|)[1-8](\s|)[0-9]{0,2}(\s|)[A-C])/imx", $pdfText)){
                                    $mkAgama = 'bi bi-check-circle-fill text-success';
                                }else if($pdfText == ''){
                                    $mkAgama ='';
                                }else{
                                    $mkAgama ='bi bi-x-circle-fill text-danger';
                                }

                                // membuat regex presentasi nilai d
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                    <hr>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col">
                                    <h2>Hasil Validasi</h2>
                                </div>
                            </div>
                        </div>
                    <hr>
                        <div class="container">
                             <div class="row justify-content-center">
                                <div class="col">
                                    <p><i class="<?=$ipk ?>"></i> ipk</p>
                                    <p><i class="<?=$sks ?>"></i> total sks</p>
                                    <h6 class="text-info">mk wajib minimal C</h6>
                                    <p><i class="<?=$mkAgama ?>"></i> mk agama</p>
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