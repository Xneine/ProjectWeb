<?php
include("database.php");
?>
<div>
  <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: [
        <?php
        $produk = mysqli_query($conn, "SELECT * FROM produk");
        while ($data = mysqli_fetch_array($produk)) :
        ?> '<?= $data['nama_produk'] ?>',
        <?php endwhile; ?>
      ],
      datasets: [{
        label: 'stok',
        data: [
          <?php
          $produk = mysqli_query($conn, "SELECT * FROM produk");
          while ($data = mysqli_fetch_array($produk)) :
          ?> <?= $data['stok'] ?>,
          <?php endwhile; ?>
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
</script>