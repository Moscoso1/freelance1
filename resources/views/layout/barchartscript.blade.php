<!-- Include Chart.js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Script for Net Income Bar Chart -->
<script>
  // Get the current date, current year, and current month
  const currentDate = new Date();
  const currentYear = currentDate.getFullYear(); // Get current year
  const currentMonth = currentDate.getMonth(); // Get current month (0-11, where 0 is January)

  // Example Net Income data for multiple years (replace with your dynamic data)
  // Data structure: each element is an array of 12 values representing each month's income
  const incomeData = [
    [40000,12000,12000,12000],  // 2023
    [12000,12000,12000,12000],
    // Add more years as needed
  ];

  // Create array of months (January = 0, December = 11)
  const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

  // Sort incomeData by year to ensure ascending order of years
  const sortedIncomeData = incomeData.map((data, index) => {
    return {
      year: currentYear - 1 + index,  // Derive the year based on the index and current year
      income: data
    };
  }).sort((a, b) => a.year - b.year);  // Sort the data by the year in ascending order

  // Add the sorted income data to extendedIncomeData
  let extendedIncomeData = [];
  sortedIncomeData.forEach(yearIncomeData => {
    extendedIncomeData.push({
      label: `Net Income (${yearIncomeData.year})`, // Label for the year
      data: yearIncomeData.income, // Yearly income data (12 months)
      backgroundColor: `rgba(60, 141, 188, 0.9)`, // Bar color
      borderColor: `rgba(60, 141, 188, 1)`, // Bar border color
      borderWidth: 1 // Border width
    });
  });

  // Get the canvas element
  var ctx = document.getElementById('barChart').getContext('2d');

  // Create a new bar chart for Net Income
  var barChart = new Chart(ctx, {
    type: 'bar', // Specifies that it's a bar chart
    data: {
      labels: months, // X-axis labels (all months from January to December)
      datasets: extendedIncomeData, // Data for multiple years
    },
    options: {
      responsive: true, // Make the chart responsive
      maintainAspectRatio: false, // Allow chart to resize based on container
      scales: {
        y: {
          beginAtZero: true, // Start Y-axis from 0
          title: {
            display: true,
            text: 'Net Income ($)' // Y-axis title
          },
          ticks: {
            stepSize: 5000 // Adjust the step size for readability
          }
        },
        x: {
          title: {
            display: true,
            text: 'Months' // X-axis title
          }
        }
      },
      plugins: {
        tooltip: {
          callbacks: {
            // Format the tooltip to display net income in a readable format
            label: function(tooltipItem) {
              return '$' + tooltipItem.raw.toLocaleString(); // Adds commas for thousands
            }
          }
        }
      }
    }
  });
</script>
