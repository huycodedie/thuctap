
<div class="col-lg-9">

<div class="card">
  <div class="card-body">
    <h5 class="card-title">cần đổi</h5>
    <?php if ($query_danhsach->num_rows > 0): ?> 
    <table class="table table-striped">
      <thead>
        <tr>
          <th class="col-1 text-center">STT</th>
          <th class="col-2 text-center">MSV</th>
          <th class="col text-center">Tên sinh viên</th>
          <th class="col-2 text-center ">Quá trình</th>
          <th class="col text-center">Cuối kỳ</th>
          <?php $query_check = "SELECT COUNT(*) AS count FROM bangdiem WHERE malhp = '$_GET[malhp]' AND diemthilai > 0";
                $result_check = $mysqli->query($query_check);
                $row_check = $result_check->fetch_assoc();

                if ($row_check['count'] > 0) { ?>
               <th class="col text-center">Điểm thi lại</th>
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
            <th class="text-center" scope="row"> <?php echo $row['cuoiky'] ?> </th>
            <?php $sua = $row['diemthilai']; 
                 if($sua > 0){
            ?> 
            <th class="text-center" scope="row"> <?php echo $row['diemthilai'] ?> </th>
            <?php }else{ ?>
            <?php } ?>
            <td class="text-center">
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

<h3>Chưa có sinh viên nào</h3>

<?php endif; ?> 

  </div>
</div>


</div>
</div>
</section>