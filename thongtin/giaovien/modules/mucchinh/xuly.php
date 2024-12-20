
<?php 
include('../../config/config.php');

require 'execl/vendor/autoload.php'; 
use PhpOffice\PhpSpreadsheet\IOFactory;

$quatrinh = $_POST['quatrinh'];
$magv = $_GET['magv'];
$cuoiky = $_POST['cuoiky'];
$sua = 1;
$thilai = 1;
$malhp = isset($_GET['malhp']) ? $_GET['malhp'] : ''; 

if(isset($_POST['gvthemdiem'])){
    $sql_themdiem = "UPDATE bangdiem SET quatrinh='".$quatrinh."',cuoiky='".$cuoiky."',sua='".$sua."' 
    WHERE madiem = '$_GET[madiem]'";
    mysqli_query($mysqli,$sql_themdiem);
    header("Location:../../index.php?action=sv-lop-hoc-phan&malhp=$malhp&magv=$magv");


    exit();
}elseif(isset($_POST['themexcel'])){
    if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $fileType = $_FILES['file']['type'];

        $allowedTypes = ['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-excel'];

        if (in_array($fileType, $allowedTypes)) {
            $spreadsheet = IOFactory::load($fileTmpPath);
            $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

           
            foreach ($sheetData as $rowIndex => $row) {
                if ($rowIndex == 1) continue; 

                $masv = isset($row['B']) ? $row['B'] : null;
                $quatrinh = isset($row['D']) ? $row['D'] : null;
                $cuoiky = isset($row['E']) ? $row['E'] : null;
                $diemthilai = isset($row['F']) ? $row['F'] : null;
             
                $checkSql = "SELECT masv, sua, diemthilai FROM bangdiem WHERE masv = '$masv' AND malhp = '$malhp'";
                $result = $mysqli->query($checkSql);
                
                if ($result->num_rows > 0) {
                  $row = $result->fetch_assoc();
                    if($row['sua'] == 0){
                        if($row['thilai'] == 0){
                            if(!is_null($diemthilai)){
                                if(!is_null($quatrinh)){
                                    if(!is_null($cuoiky)){
                                        $updateSql = "UPDATE bangdiem SET diemthilai = '$diemthilai', quatrinh = '$quatrinh', cuoiky = '$cuoiky', sua = '$sua', thilai = '$thilai' WHERE masv = '$masv' AND malhp = '$malhp'";
                                        $mysqli->query($updateSql);
                                    }else{
                                        $updateSql = "UPDATE bangdiem SET diemthilai = '$diemthilai', quatrinh = '$quatrinh', thilai = '$thilai' WHERE masv = '$masv' AND malhp = '$malhp'";
                                        $mysqli->query($updateSql);
                                    }
                                }else{
                                    if(!is_null($quatrinh)){
                                        $updateSql = "UPDATE bangdiem SET diemthilai = '$diemthilai', cuoiky = '$cuoiky', sua = '$sua', thilai = '$thilai' WHERE masv = '$masv' AND malhp = '$malhp'";
                                        $mysqli->query($updateSql);
                                    }else{
                                        $updateSql = "UPDATE bangdiem SET diemthilai = '$diemthilai', thilai = '$thilai' WHERE masv = '$masv' AND malhp = '$malhp'";
                                        $mysqli->query($updateSql);
                                    }
                                }     
                            }else{      
                                if(!is_null($quatrinh)){
                                    if(!is_null($cuoiky)){
                                        $updateSql = "UPDATE bangdiem SET quatrinh = '$quatrinh', cuoiky = '$cuoiky', sua = '$sua' WHERE masv = '$masv' AND malhp = '$malhp'";
                                        $mysqli->query($updateSql);
                                    }else{
                                        $updateSql = "UPDATE bangdiem SET quatrinh = '$quatrinh' WHERE masv = '$masv' AND malhp = '$malhp'";
                                        $mysqli->query($updateSql);
                                    }
                                }else{
                                    if(!is_null($quatrinh)){
                                        $updateSql = "UPDATE bangdiem SET cuoiky = '$cuoiky', sua = '$sua' WHERE masv = '$masv' AND malhp = '$malhp'";
                                        $mysqli->query($updateSql);
                                    }else{
                                        echo $masv;
                                    }
                                }
                            }
                        }else{
                            if(!is_null($quatrinh)){
                                if(!is_null($cuoiky)){
                                    $updateSql = "UPDATE bangdiem SET quatrinh = '$quatrinh', cuoiky = '$cuoiky', sua = '$sua' WHERE masv = '$masv' AND malhp = '$malhp'";
                                    $mysqli->query($updateSql);
                                }else{
                                    $updateSql = "UPDATE bangdiem SET quatrinh = '$quatrinh' WHERE masv = '$masv' AND malhp = '$malhp'";
                                    $mysqli->query($updateSql);
                                }
                            }else{
                                if(!is_null($quatrinh)){
                                    $updateSql = "UPDATE bangdiem SET cuoiky = '$cuoiky', sua = '$sua' WHERE masv = '$masv' AND malhp = '$malhp'";
                                    $mysqli->query($updateSql);
                                }else{
                                    echo $masv;
                                }
                            } 
                        }
                    }elseif($row['thilai'] === 0 ){
                        if(!is_null($diemthilai)){
                            $updateSql = "UPDATE bangdiem SET diemthilai = '$diemthilai', thilai = '$thilai' WHERE masv = '$masv' AND malhp = '$malhp'";
                            $mysqli->query($updateSql);
                        }else{
                            echo $masv;
                        }
                    }
                } else {
                    $error[] = " echo $masv;";
                    
                }
            }

            $error[] = " echo $masv;";
        } else {
            $error[] = " echo $masv;";
        }
    } else {
        $error[] = " echo $masv;";
    }
    
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("Location:../../index.php?action=sv-lop-hoc-phan&malhp=$malhp&magv=$magv");
    }
    if (!empty($error)) {
        $_SESSION['error'] = $error;
        header("Location:../../index.php?action=sv-lop-hoc-phan&malhp=$malhp&magv=$magv");
    }
    exit;
}

?>