
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
          <th class="col-2 text-center ">Hệ 4</th>
          <th class="col text-center">Cuối kỳ</th>
          
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
            <th class="text-center" scope="row"> <?php if($row['so_mon']>0){echo (($row['tong']/ $row['tinchi'])*4)/10;}?> </th>  
            <th class="text-center" scope="row"> </th>
            <th class="text-center" scope="row"> <a href="index.php?action=diem-sinh-vien&idsv=<?php echo $row['masv'] ?>" class="btn btn-primary btn-sm" title="sua noi dung"><i class="bi bi-file-earmark-text me-1"></i></a>  </th>
            </td>
                                    
             </tr>
    
            <?php
            }
            ?>
      </body>
    </table>
    <?php else: ?> 

<h3>Không thể tìm thấy: <?php echo $tukhoa ?></h3>

<?php endif; ?> 

  </div>
</div>


</div>
</div>
</section>