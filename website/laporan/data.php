<?php
include("../database.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="produkStyle.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>DATA</title>
</head>
<!-- STOP -->
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php
            include("../header.php");
            ?>
            <div class="container col-9">
                <h1 class="text-center mt-3">DATA CHART</h1>
                <form class="mb-3 col-8" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-3">
                                <div class="mb-3">
                                    <label class="form-label">Bulan</label>
                                    <input type="number" class="form-control" name="nbulan" min="0" max="12" step="1" id="bulan" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label class="form-label">Tahun</label>
                                    <input type="number" class="form-control" name="ntahun" min="2023" max="2030" step="1" id="tahun" required>
                                </div>
                            </div>
                            <div class="col-6 d-flex justify-content-start">
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary m-3" name="bbuat" id="buat">Buat</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-6">
                        <div class="chart-container" style="position: relative; height:55vh; width:35vw">
                            <canvas id="myChart1"></canvas>
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="chart-container" style="position: relative; height:55vh; width:35vw">
                            <canvas id="myChart2"></canvas>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
</body>

</html>
<!-- <script>
    const ctx = document.getElementById('myChart1');
    const ctz = document.getElementById('myChart2');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [1,2],
            datasets: [{
                label: 'transaksi',
                data: [1,2],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script> -->
<?php
if (isset($_POST['bbuat'])) {
    $bulan = $_POST['nbulan'];
    $tahun = $_POST['ntahun'];
    if ($bulan == 0) {
        echo "    
            <script>
            const ctx = document.getElementById('myChart1');
            const ctz = document.getElementById('myChart2');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                    datasets: [{
                        label: 'transaksi',
                        data: [";
        for ($i = 1; $i <= 12; $i++) {
            $transaksi = mysqli_query($conn, "SELECT * FROM transaksi WHERE EXTRACT(YEAR FROM tanggal) = '$tahun' AND EXTRACT(MONTH FROM tanggal) = '$i'");
            $totall = 0;
            while ($data = mysqli_fetch_array($transaksi)) :
                $totall = $totall + $data['jumlah'];
            endwhile;
            echo $totall . ',';
        }
        echo "],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            new Chart(ctz, {
                type: 'doughnut',
                data: {
                    labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                    datasets: [{
                        label: 'transaksi',
                        data: [";
        for ($i = 1; $i <= 12; $i++) {
            $transaksi = mysqli_query($conn, "SELECT * FROM transaksi WHERE EXTRACT(YEAR FROM tanggal) = '$tahun' AND EXTRACT(MONTH FROM tanggal) = '$i'");
            $totall = 0;
            while ($data = mysqli_fetch_array($transaksi)) :
                $totall = $totall + $data['jumlah'];
            endwhile;
            echo $totall . ',';
        }
        echo "],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            </script>";
    } else {
        echo "    
            <script>
            const ctx = document.getElementById('myChart1');
            const ctz = document.getElementById('myChart2');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31],
                    datasets: [{
                        label: 'transaksi',
                        data: [";
        for ($i = 1; $i <= 30; $i++) {
            $transaksi = mysqli_query($conn, "SELECT * FROM transaksi WHERE EXTRACT(YEAR FROM tanggal) = '$tahun' AND EXTRACT(MONTH FROM tanggal) = '$bulan'AND EXTRACT(DAY FROM tanggal) = '$i'");
            $totall = 0;
            while ($data = mysqli_fetch_array($transaksi)) :
                $totall = $totall + $data['jumlah'];
            endwhile;
            echo $totall . ',';
        }
        echo "],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            new Chart(ctz, {
                type: 'doughnut',
                data: {
                    labels: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31],
                    datasets: [{
                        label: 'transaksi',
                        data: [";
        for ($i = 1; $i <= 30; $i++) {
            $transaksi = mysqli_query($conn, "SELECT * FROM transaksi WHERE EXTRACT(YEAR FROM tanggal) = '$tahun' AND EXTRACT(MONTH FROM tanggal) = '$bulan'AND EXTRACT(DAY FROM tanggal) = '$i'");
            $totall = 0;
            while ($data = mysqli_fetch_array($transaksi)) :
                $totall = $totall + $data['jumlah'];
            endwhile;
            echo $totall . ',';
        }
        echo "],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            </script>";
    }
}
?>