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
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
<?= $this->endSection(); ?>