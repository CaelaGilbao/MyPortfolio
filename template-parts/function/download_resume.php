<?php
function download_resume()
{
    $file_path = __DIR__ . '../assets/resume/gilbao-resume.pdf';

    if (file_exists($file_path)) {

        header('Content-Description: File Transfer');
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="resume.pdf"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_path));

        ob_clean();
        flush();
        readfile($file_path);
        exit;
    } else {
        echo "Resume file not found.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    download_resume();
}
?>