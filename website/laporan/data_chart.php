
<?php
include("../database.php");
$hari = $_POST['nhari'];
$bulan = $_POST['nbulan'];
$tahun = $_POST['ntahun'];
if ($hari == 0) {
    if ($bulan == 0) {
        echo"    
        <script>
        const ctx = document.getElementById('myChart1');
        const ctz = document.getElementById('myChart2');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                datasets: [{
                    label: 'transaksi',
                    data: [
                        1, 2, 4, 1, 2, 7, 5, 2, 3, 1, 2, 6
                    ],
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
    else {

    }
} else if ($hari > 0 && $bulan > 0) {
} else {
    echo
    "<script>
            alert('bulan harus lebih dari 0 bila hari lebih dari 0');
        </script>";
}
echo 
'<script>
        document.location="data.php";
</script>';
?>

