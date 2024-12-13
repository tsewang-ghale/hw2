
<h1>awards Per group</h1>
<div>
  <canvas id="awardsChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('awardsChart').getContext('2d');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [
        <?php
        // PHP code to generate group names as labels
        echo "'" . implode("', '", $groupNames) . "'"; // Join group names with commas
        ?>
      ],
      datasets: [{
        label: 'Number of awards',
        data: [
          <?php
          // PHP code to generate awards data for the chart
          echo implode(", ", $awardData); // Convert award data to a comma-separated string
          ?>
        ],
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        borderColor: 'rgba(75, 192, 192, 1)',
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
