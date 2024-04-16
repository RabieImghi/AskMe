export const planetChartData = {
    type: "bar",
    data: {
        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        datasets: [
            {
                label: "Number of Usre / Month",
                backgroundColor: "rgba(71, 123, 183, 0.5)",
                borderColor: "#477fb7",
                borderWidth: 3
            },
        ]
    },
    options: {
      responsive: true,
      lineTension: 1,
      scales: {
        yAxes: [
          {
            ticks: {
              beginAtZero: true,
              padding: 25
            }
          }
        ]
      }
    }
  };
  
  export default planetChartData;