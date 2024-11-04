<?php 
$sql_danhsach = "SELECT*FROM background ORDER BY id";
$query_danhsach = mysqli_query($mysqli,$sql_danhsach);
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h3>danh sách Background</h3>
    </div>
    <p>
        
    </p>
    <section class="section dashboard">
        <div class="row">
            <div class="col-12">
                <div class="card recend-sales overflow-auto">
                    <div class="card-body mt-4">
                        <table class="table table-broderless datatable" >
                            <thead>
                                <tr>
                                    <th class="col-1 text-center">#</th>
                                    <th class="col-2 text-center">tên</th>
                                    
                                    <th class="col-2 text-center">ảnh bìa</th> 
                                    
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
                                    <td class="text-center"><?php echo $row['ten_brou'] ?></td>
                                                                   
                                    <td class="text-center" scope="row"> <img src="modules/trungchuyen/quanlydanhmuctruyen/uploads/<?php echo $row['anh_brou'] ?>" width="150px"></td>
                                        
                                    <td class="text-center">
                                        <a href="index.php?action=suaback&id=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm" title="sua noi dung"><i class="bi bi-pencil"></i></a>
                                        
                                    </td>
                                </tr>
    
                                <?php
                                }
                                ?>
                            </body>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>