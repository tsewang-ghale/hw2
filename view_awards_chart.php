<h1>Awards Chart</h1>
<div>
  <!-- Chart container -->
  <canvas id="myChart"></canvas>
</div>

<!-- Style to adjust the chart size -->
<style>
  /* Ensure that the canvas has specific width and height */
  #myChart {
    width: 70% !important; /* Adjust the width of the chart relative to its container */
    height: 500px !important; /* Fixed height for the chart */
  }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',  // Bar chart for displaying awards count
    data: {
      labels: [
        <?php
        // Fetch and display the group names (idol groups with the highest awards)
        $awards = select_top_award_winners(); 
        while ($award = $awards->fetch_assoc()) {
          echo "'" . $award['group_name'] . "', "; 
        }
        ?>
      ],
      datasets: [{
        label: 'Number of Awards', // Label for the bar chart
        data: [
          <?php
          // Fetch and display the award counts for the group with the highest awards
          $awards = select_top_award_winners(); 
          while ($award = $awards->fetch_assoc()) {
            echo $award['award_count'] . ", "; 
          }
          ?>
        ],
        // Array of colors for each bar
        backgroundColor: [
          <?php
          // Fetch and display the color for each bar dynamically
          $awards = select_top_award_winners(); 
          $colors = ["#ff5733", "#33ff57", "#3357ff", "#ff33a8", "#f1c40f"]; // Example color array
          $i = 0;
          while ($award = $awards->fetch_assoc()) {
            echo "'" . $colors[$i % count($colors)] . "', "; // Loop through colors array for each bar
            $i++;
          }
          ?>
        ],
        borderColor: [
          <?php
          // Same border colors as background colors (you can customize if needed)
          $awards = select_top_award_winners(); 
          $i = 0;
          while ($award = $awards->fetch_assoc()) {
            echo "'" . $colors[$i % count($colors)] . "', "; // Loop through colors array for each bar
            $i++;
          }
          ?>
        ],
        borderWidth: 1
      }]
    },
    options: {
      responsive: false, // Prevent Chart.js from overriding custom size
      scales: {
        y: {
          beginAtZero: true // Ensure the y-axis starts at zero
        }
      }
    }
  });
</script>
