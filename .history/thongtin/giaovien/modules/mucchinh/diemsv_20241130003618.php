<?php 
$user_id = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);
// Lấy thông tin sinh viên (usernamesv)
$sql_sinhvien = "SELECT * FROM usersv WHERE idsv = '$_GET[idsv]'";
$query_sinhvien = mysqli_query($mysqli, $sql_sinhvien);
$sinhvien = mysqli_fetch_array($query_sinhvien);

// Lấy danh sách bảng điểm của sinh viên
$sql_danhsach = "SELECT * FROM bangdiem b
                JOIN qllophocphan p ON p.malhp = b.malhp 
                JOIN qlhocphan h ON h.mahp = p.mahp
                JOIN usersv s ON s.idsv = b.masv      
                WHERE masv ='$_GET[idsv]' ORDER BY madiem"; 
$query_danhsach = mysqli_query($mysqli, $sql_danhsach);
?>

<main id="main" class="main">
<?php if ($sinhvien): ?>  <!-- Kiểm tra xem có thông tin sinh viên không -->
    <div class="pagetitle">
        <h1>Danh sách điểm: <?php echo $sinhvien['usernamesv'] ?></h1> <!-- Hiển thị tên sinh viên -->
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?action=khoa&idgv=<?php echo $user_id ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="index.php?action=danh-sach-sv&idgv=<?php echo $user_id ?>&idlhc=<?php echo $row['malhc'] ?>">danh sách</a></li>
                <li class="breadcrumb-item"><a href="index.php?action=diem-sinh-vien&idsv=<?php echo $_GET['idsv'] ?>">Điểm</a></li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-12">
                <div class="card recend-sales overflow-auto">
                    <div class="card-body mt-4">
                        <?php if ($query_danhsach->num_rows > 0): ?> <!-- Nếu có dữ liệu bảng điểm -->
                            <table class="table table-broderless datatable">
                                <thead>
                                    <tr>
                                        <th class="col-1 text-center">STT</th>
                                        <th class="col-3 text-center">Tên HP</th>
                                        <th class="col-1 text-center">Số TC</th>
                                        <th class="col-3 text-center">Điểm quá trình</th>
                                        <th class="col-3 text-center">Điểm cuối kỳ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i = 0;
                                    while ($row = mysqli_fetch_array($query_danhsach)) {
                                        $i++;
                                    ?>
                                    <tr>
                                        <th class="text-center" scope="row"><?php echo $i ?> </th>
                                        <td class="text-center"><?php echo $row['tenlhp'] ?></td>
                                        <td class="text-center"><?php echo $row['sotinchi'] ?></td>
                                        <td class="text-center"><?php echo $row['quatrinh'] ?></td>
                                        <td class="text-center"><?php echo $row['cuoiky'] ?></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        <?php else: ?> <!-- Nếu không có bảng điểm, hiển thị thông báo -->
                            <h1>Chưa học môn nào</h1>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php else: ?> <!-- Nếu không tìm thấy sinh viên -->
    <h1>Không tìm thấy sinh viên</h1>
<?php endif; ?>
</main>
