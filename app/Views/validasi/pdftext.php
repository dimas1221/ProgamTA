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
                                        <i class="bi bi-cloud-upload-fill text-info" style="font-size: 50px;"></i>
                                        <button class="btn btn-info ab">Upload file
                                        <input type="file" name="pdf_file" required >
                                        </button>
                                    </div>
                                    <input type="submit" name="submit" class="btn btn-success mb-3" value="Extract Text">
                                </form>
                                <!-- <script>
                                    const form = document.querySelector("form"),
                                    fileInput = form.querySelector(".file-input");

                                    form.addEventListener("click", ()=>{
                                        fileInput.click();
                                    });
                                </script> -->
                                <hr>
                                <?= $pdfText; ?>
                                <?php
                                // varibel validasi
                                $ipk ='';
                                $sks ='';
                                $kp='';
                                $mkAgama ='';
                                $mkBindo= '';
                                $mkKwn= '';
                                $mkBing1='';
                                $mkBing2='';
                                $mkapti1='';
                                $mkapti2='';
                                $mkKwu='';
                                $mkPK='';
                                $setik='';
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
                                // regex KP
                                if(preg_match("/(Kerja(\s|)Praktik(\s|)3(\s|)[0-9]{0,2}(\s|)(\s|)(\d|){0,3}[A-B|a-b])/mix", $pdfText)){
                                    $kp ='bi bi-check-circle-fill text-success';
                                }else if($pdfText == ''){
                                    $kp ='';
                                }else{
                                    $kp = 'bi bi-x-circle-fill text-danger';
                                }
                                // regex setik
                                if(preg_match("/(Seminar(\s|)T(\s|)ematik(\s|)2(\s|)(\d|){0,2}(\s|)(\d|){0,3}(\s|)[A-B|a-b])/mix", $pdfText)){
                                    $setik ='bi bi-check-circle-fill text-success';
                                }else if($pdfText == ''){
                                    $setik ='';
                                }else{
                                    $setik = 'bi bi-x-circle-fill text-danger';
                                }
                                // MINIMAL C
                                // regex matkul agama
                                if(preg_match("/(Agama(\s|)islam(\s|)2(\s|)(\d|){0,2}(\s|)[0-9]{0,3}(\s|)[A-C|a-c])/imx", $pdfText)){
                                    $mkAgama = 'bi bi-check-circle-fill text-success';
                                }else if($pdfText == ''){
                                    $mkAgama ='';
                                }else{
                                    $mkAgama ='bi bi-x-circle-fill text-danger';
                                }
                                // regex bhs indo
                                if(preg_match("/(Bahasa(\s|)Indonesia(\s|)2(\s|)(\d|){0,2}(\s|)[0-9]{0,3}(\s|)[A-C|a-c])/mix", $pdfText)){
                                    $mkBindo ='bi bi-check-circle-fill text-success';
                                }else if($pdfText == ''){
                                    $mkBindo ='';
                                }else{
                                    $mkBindo ='bi bi-x-circle-fill text-danger';
                                }
                                // regex kwn
                                if(preg_match("/(Kewarganegaraan(\s|)2(\s|)(\d|){0,2}(\s|)[0-9]{0,3}(\s|)[A-C|a-c])/mix", $pdfText)){
                                    $mkKwn ='bi bi-check-circle-fill text-success';
                                }else if($pdfText == ''){
                                    $mkKwn ='';
                                }else{
                                    $mkKwn ='bi bi-x-circle-fill text-danger';
                                }
                                // Mtkul minimal B
                                // Bhs inggris1
                                if(preg_match("/(Bahasa(\s|)inggris(\s|)I(\s|)[(]Integrated[)](\s|)2(\s|)(\d|){0,2}(\s|)[0-9]{0,3}(\s|)[A-B|a-b])/mix", $pdfText)){
                                    $mkBing1 ='bi bi-check-circle-fill text-success';
                                }else if($pdfText == ''){
                                    $mkBing1 ='';
                                }else{
                                    $mkBing1 ='bi bi-x-circle-fill text-danger';
                                }
                                // Bhs inggris2
                                if(preg_match("/(Bahasa(\s|)inggris(\s|)II(\s|)[(]Communicative[)](\s|)2(\s|)(\d|){0,2}(\s|)[0-9]{0,3}(\s|)[A-B|a-b])/mix", $pdfText)){
                                    $mkBing2 ='bi bi-check-circle-fill text-success';
                                }else if($pdfText == ''){
                                    $mkBing2 ='';
                                }else{
                                    $mkBing2 ='bi bi-x-circle-fill text-danger';
                                }
                                // Apti 1
                                if(preg_match("/(Aplikasi(\s|)T(\s|)eknologi(\s|)Informasi(\s|)I(\s|)2(\s|)[0-9]{0,2}(\s|)[0-9]{0,3}(\s|)[A-B|a-b])/mix", $pdfText)){
                                    $mkapti1 ='bi bi-check-circle-fill text-success';
                                }else if($pdfText == ''){
                                    $mkapti1 ='';
                                }else{
                                    $mkapti1 ='bi bi-x-circle-fill text-danger';
                                }
                                // Apti 2
                                if(preg_match("/(Aplikasi(\s|)T(\s|)eknologi(\s|)Informasi(\s|)II(\s|)2(\s|)[0-9]{0,2}(\s|)[0-9]{0,3}(\s|)[A-B|a-b])/mix", $pdfText)){
                                    $mkapti2 ='bi bi-check-circle-fill text-success';
                                }else if($pdfText == ''){
                                    $mkapti2 ='';
                                }else{
                                    $mkapti2 ='bi bi-x-circle-fill text-danger';
                                }
                                // KWU
                                if(preg_match("/(Kewirausahaan(\s|)2(\s|)[0-9]{0,2}(\s|)[0-9]{0,3}(\s|)[A-B|a-b])/mix", $pdfText)){
                                    $mkKwu ='bi bi-check-circle-fill text-success';
                                }else if($pdfText == ''){
                                    $mkKwu ='';
                                }else{
                                    $mkKwu ='bi bi-x-circle-fill text-danger';
                                }
                                // PK
                                if(preg_match("/(Pengembangan(\s|)Kepribadian(\s|)2(\s|)[0-9]{0,2}(\s|)[0-9]{0,3}(\s|)[A-B|a-b])/mixD", $pdfText)){
                                    $mkPK ='bi bi-check-circle-fill text-success';
                                }else if($pdfText == ''){
                                    $mkPK ='';
                                }else{
                                    $mkPK ='bi bi-x-circle-fill text-danger';
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
                                    <h5 class="text-success">Hasil Validasi</h5>
                                </div>
                            </div>
                        </div>
                    <hr>
                        <div class="container">
                             <div class="row justify-content-center">
                                <div class="col">
                                    <p class="text-info">Aspek yang di lihat</p>
                                    <p><i class="<?=$ipk ?>"></i> Index Prestasi Kumulatif(IPK)</p>
                                    <p><i class="<?=$sks ?>"></i> Total Sks</p>
                                    <p><i class="<?=$kp ?>"></i> Kerja Praktik</p>
                                    <p><i class="<?=$setik ?>"></i> Seminar Tematik</p>
                                    <p class="text-info">Mk wajib minimal C</p>
                                    <p><i class="<?=$mkAgama ?>"></i> Agama</p>
                                    <p><i class="<?=$mkBindo ?>"></i> Bahasa Indonesia</p>
                                    <p><i class="<?=$mkKwn ?>"></i> Kewarganegaaan</p>
                                    <p class="text-info">Mk wajib minimal B</p>
                                    <p><i class="<?=$mkBing1 ?>"></i> Bahasa Inggris I(Integrated)</p>
                                    <p><i class="<?=$mkBing2 ?>"></i> Bahasa Inggris II(Communicative)</p>
                                    <p><i class="<?=$mkapti1 ?>"></i> Aplikasi Teknologi Informasi I</p>
                                    <p><i class="<?=$mkapti2 ?>"></i> Aplikasi Teknologi Informasi II</p>
                                    <p><i class="<?=$mkKwu ?>"></i> Kewirausahaan</p>
                                    <p><i class="<?=$mkPK ?>"></i> Pengembangan Kepribadian</p>
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