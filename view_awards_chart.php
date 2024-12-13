<h1>Awards Chart</h1>
<div>
  <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',  // Bar chart for displaying awards count
    data: {
      labels: [
        <?php
        // Fetch and display the group names (idol groups with the highest awards)
        $awards = select_highest_award_winner(); 
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
          $awards = select_highest_award_winner(); 
          while ($award = $awards->fetch_assoc()) {
            echo $award['award_count'] . ", "; 
          }
          ?>
        ],
        backgroundColor: ['#ff5733'], // Customize colors for bars
        borderColor: ['#ff5733'], // Matching border colors
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true // Ensure the y-axis starts at zero
        }
      }
    }
  });
</script>
