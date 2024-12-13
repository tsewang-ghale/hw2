<h1> songs Chart</h1>
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
          // Initialize the $songs variable to fetch the data from the database
          $songs = selectSongs(); 
          while ($song = $songs->fetch_assoc()) {
            echo $song['count_song'] . ", "; 
          }
          ?>
        ], 
        // The labels that will appear in the chart's legend and tooltips
        backgroundColor: ['#ff5733', '#33ff57', '#3357ff', '#ff33a8', '#f1c40f'], // You can customize the colors here
      }],
      labels: [
        <?php
        // Reset $songs and fetch the songs' names
        $songs = selectsongs(); 
        while ($song = $songs->fetch_assoc()) {
          echo "'" . $song['song_name'] . "', "; 
        }
        ?>
      ]
    },
  });
</script>
