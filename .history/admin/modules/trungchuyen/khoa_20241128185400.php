<?php 
$sql_danhsach = "SELECT*FROM qlkhoa ORDER BY idkhoa";
$query_danhsach = mysqli_query($mysqli,$sql_danhsach);

?>
<main id="main" class="main">
    <div class="pagetitle">
        <h3>Danh sach Khoa</h3>
    </div>
    <p>
        <a href="index.php?action=themkhoa" type="button" class="btn btn-success">
            <i class="bi bi-file-earmark-text me-1"></i>Thêm khoa
        </a>
    </p>
    <div class="error-box">

    </div>
    <?php
if (isset($_SESSION['errors'])) {
   
    foreach ($_SESSION['errors'] as $error) {
        echo '<p>' . htmlspecialchars($error) . '</p>';
    }
    echo '</div>';
    unset($_SESSION['errors']); // Xóa lỗi sau khi hiển thị
}
?>

        <div class="row">
            <div class="col-12">
                <div class="card recend-sales overflow-auto">
                    <div class="card-body mt-4">
                    <?php if ($query_danhsach->num_rows > 0): ?> 
                        <table class="table table-broderless datatable">
                            <thead>
                                <tr>
                                    <th class="col-1 text-center">Stt</th>
                                    <th class="col-1 text-center">Mã khoa</th>
                                    <th class="col-5 text-center">Tên Khoa</th>
                                   
                                </tr>
                            </thead>
                            <body>
                                <?php 
                                $i = 0;
                                while($row = mysqli_fetch_array($query_danhsach)){
                                    $i++;
                                ?>
                                <tr>
                                    <th class="text-center" scope="row"><?php echo $i ?> </th>
                                    <td class="text-center"><?php echo $row['idkhoa'] ?></td>
                                    <td class="text-center"><?php echo $row['tenkhoa'] ?></td>
                                    

                                    <td class="text-center">
                                        <a href="index.php?action=suakhoa&idkhoa=<?php echo $row['idkhoa'] ?>" class="btn btn-primary btn-sm" title="sua noi dung"><i class="bi bi-pencil"></i></a>
                                        <a href="javascript:void(0);" onclick="confirmDeletion(<?php echo $row['idkhoa']; ?>);" class="btn btn-danger btn-sm" title="xóa"><i class="bi bi-trash"></i></a>
                                        
                                    </td>
                                </tr>
    
                                <?php
                                }
                                ?>
                            </body>
                        </table>
                        <?php else: ?> 
          
          <h2>Chưa có khoa nào</h2>
      <?php endif; ?> 
                    </div>
                </div>
            </div>
        </div>  
    
</main>

<script>
function confirmDeletion(idkhoa) {
    var result = confirm("Bạn có chắc chắn muốn xóa khoa này?");
    if(result) {
        
        window.location.href = "modules/trungchuyen/quanlydanhmuctruyen/khoa/xulykhoa.php?idkhoa=" + idkhoa;
    }
}
</script>