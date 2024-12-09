<?php 
$user_id = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);
$sql_danhsach = "SELECT*FROM usergv g
                 left JOIN bangdiem b ON b.magv = g.idgv
                 JOIN qllophocphan p ON p.malhp = b.malhp
                 JOIN usersv s ON s.idsv = b.masv
                WHERE b.magv = '$_GET[idgv]'AND b.malhp = '$_GET[malhp]'ORDER BY b.madiem";         
$query_danhsach = mysqli_query($mysqli,$sql_danhsach);
$query_danhsach1 = mysqli_query($mysqli,$sql_danhsach);


?>


<div class="col-lg-9">

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Table with stripped rows</h5>

    <?php if ($query_danhsach->num_rows > 0): ?> 
    <table class="table table-striped">
      <thead>
        <tr>
          <th class="col-1 text-center">STT</th>
          <th class="col-2 text-center">Mã Sinh viên</th>
          <th class="col text-center">Tên sinh viên</th>
          <th class="col-1 text-center ">Quá trình</th>
          <th class="col text-center">Cuối kỳ</th>
          <?php $check = mysqli_fetch_array($query_danhsach1);
           $sua = $check['diemthilai']; 
            if($sua > 0){ ?>
             <th class="col text-center">Điểm thi lại</th>
              <?php }else{ ?>
            <?php } ?>
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
            <td class="text-center"><?php echo $row['masv'] ?></td>
            <td class="text-center"><?php echo $row['usernamesv'] ?></td>
            <th class="text-center" scope="row"> <?php echo $row['quatrinh'] ?> </th>  
            <th class="" scope="row"> <?php echo $row['cuoiky'] ?> </th>
            <?php $sua = $row['diemthilai']; 
                 if($sua > 0){
            ?> 
            <th class="" scope="row"> <?php echo $row['diemthilai'] ?> </th>
            <?php }else{ ?>
            <?php } ?>
            <td class="">
            <?php $sua = $row['sua']; 
            if($sua < 1){
            ?> 
            <a href="index.php?action=them-diem-sinh-vien&malhp=<?php echo $row['malhp'] ?>&masv=<?php echo $row['masv'] ?>" class="btn btn-primary btn-sm" title="sua noi dung"><i class="bi bi-file-earmark-text me-1"></i></a>
            <?php }else{ ?>
                                        
            <?php } ?>
            </td>
                                    
             </tr>
    
            <?php
            }
            ?>
        
        
        
      </body>
    </table>
    <?php else: ?> 

<h1>Chưa có lớp hành chính nào</h1>

<?php endif; ?> 

  </div>
</div>


</div>
</div>
</section>