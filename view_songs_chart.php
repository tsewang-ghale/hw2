<h1>Songs Chart</h1>
<div>
  <canvas id="myChart"></canvas>
</div>

<style>
  /* Set the background slideshow for the entire page */
  body {
    background-image: url('b1.jpeg'), url('b7.jpeg'); /* Multiple background images */
    background-size: cover; /* Make sure the background covers the entire page */
    background-position: center; /* Center the background */
    background-attachment: fixed; /* Keep the background fixed when scrolling */
    animation: slideBackground 15s infinite; /* Apply background slideshow animation */
    color: white; /* Adjust text color for better contrast */
  }

  /* Keyframe animation for background slideshow */
  @keyframes slideBackground {
    0% { background-image: url('b1.jpeg'); }
    50% { background-image: url('b7.jpeg'); }
    100% { background-image: url('b1.jpeg'); }
  }

  /* Chart container styling */
  #myChart {
    width: 50% !important; /* Adjust the width as per your needs */
    height: auto !important; /* Maintain aspect ratio */
    background-color: rgba(0, 0, 0, 0.5); /* Optional: Add slight transparency to the chart for better contrast */
    border-radius: 10px; /* Optional: Smooth edges */
    margin: 0 auto; /* Center the chart */
    display: block;
  }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'doughnut',  // Doughnut chart for displaying song counts by group
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
        backgroundColor: ['#ff5733', '#33ff57', '#3357ff', '#ff33a8', '#f1c40f'], // Customizable colors for each segment
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
