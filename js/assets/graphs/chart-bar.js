// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';


// Bar Chart Example

  $.ajax({
    dataType: "json",//'application/json',
    url: 'http://178.128.48.225:60/pricing_decision/state_group',
    type: 'POST',
    contentType: 'application/json; charset=utf-8',
    success: function (data) {
        console.log("Data!");
        console.log(data.data.length);
        var state = [];
        var quantity = [];
        for (var i = 0; i < data.data.length; i++){
          state[i]=data.data[i].state;
          quantity[i]=data.data[i].quantity;
          console.log(state[i]);
        }
        console.log(state)
        console.log(Math.max.apply(null,quantity))
        var ctx = document.getElementById("myBarChart");
        var myLineChart = new Chart(ctx, {
        
          type: 'bar',
          data: {
            labels: state,//["January", "February", "March", "April", "May", "June"],
            datasets: [{
              label: "Quantity of Signages",
              backgroundColor: "rgba(2,117,216,1)",
              borderColor: "rgba(2,117,216,1)",
              data: quantity,
            }],
          },
          options: {
            scales: {
              xAxes: [{

                gridLines: {
                  display: false
                },
                ticks: {
                  maxTicksLimit: data.data.length
                }
              }],
              yAxes: [{
                ticks: {
                  min: 0,
                  max: Math.max.apply(null,quantity),
                  stepSize : 5,
                  maxTicksLimit: 11
                },
                gridLines: {
                  display: true
                }
              }],
            },
            legend: {
              display: true
            }
          }
        });

    },
    error: function (errMsg) {
        console.log(errMsg);
        alert("Data Failed!")
    }
  })
