document.addEventListener("DOMContentLoaded", () => {
  const ctx = document.getElementById('expenseChart');
  if (ctx) {
    new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ['Food', 'Transport', 'Utilities'],
        datasets: [{
          data: [500, 200, 300],
          backgroundColor: ['#f87171', '#60a5fa', '#facc15']
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'bottom'
          }
        }
      }
    });
  }
});
