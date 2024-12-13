<h1>Songs Chart</h1>
<div>
  <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'doughnut',
    data: {
      datasets: [{
        data: [
          <?php
          // Fetch the data for song count by group
          $songs = selectSongs(); 
          while ($song = $songs->fetch_assoc()) {
            echo $song['count_songs'] . ", "; 
          }
          ?>
        ], 
        backgroundColor: ['#ff5733', '#33ff57', '#3357ff', '#ff33a8', '#f1c40f'], // You can customize the colors here
      }],
      labels: [
        <?php
        // Fetch the data for group names
        $songs = selectSongs(); 
        while ($song = $songs->fetch_assoc()) {
          echo "'" . $song['group_name'] . "', "; 
        }
        ?>
      ]
    },
  });
</script>
