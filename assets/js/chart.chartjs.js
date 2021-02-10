
$(function(){
  'use strict'
  

  var values = [];
  $.ajax({
      type: "POST",
      url: "harvesting/getPieChartData1", 
      dataType:"json",//return type expected as json
      success: function(harv){
          values.push(parseFloat(harv[0]['matang']));        
          values.push(parseFloat(harv[0]['mentah']));

          /** PIE CHART **/

          var datapie = {
            labels: ['Matang', 'Mentah'],
            datasets: [{
              data: values,
              backgroundColor: ['#37B058', 'red']
            }]
          };
          

          var optionpie = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
              display: false,
            },
            animation: {
              animateScale: true,
              animateRotate: true
            },
            legend: {
              display: true,
              position: 'top',
              labels: {
                fontColor: "#000080",
              }
            }
          };

          // For a pie chart
          var ctx9 = document.getElementById('chartPie');
          
          var myPieChart = new Chart(ctx9, {
            type: 'pie',
            data: datapie,
            options: optionpie
          });
      },
  });
  


  var ctxLabel = [];
  var ctxData1 = [];
  var ctxData2 = [];
  var ctxColor2 = '#001737';
  var ctxColor1 = '#1ce1ac';
  $.ajax({
      type: "POST",
      url: "harvesting/getPieChartData2", 
      dataType:"json",//return type expected as json
      success: function(harv){
        ctxLabel.push(harv[0]['afdelingName']);        
        ctxData1.push(parseFloat(harv[0]['matang']));        
        ctxData2.push(parseFloat(harv[0]['mentah']));
          
          // Stacked chart
          var ctx3 = document.getElementById('chartBar3').getContext('2d');
          new Chart(ctx3, {
            type: 'bar',
            data: {
              labels: ctxLabel,
              datasets: [{
                label: 'Matang',
                data: ctxData1,
                backgroundColor: ctxColor1
              }, {
                label: 'Mentah',
                data: ctxData2,
                backgroundColor: ctxColor2
              }]
            },
            options: {
              maintainAspectRatio: false,
              responsive: true,
              legend: {
                display: false,
                labels: {
                  display: false
                }
              },
              scales: {
                yAxes: [{
                  stacked: true,
                  gridLines: {
                    color: '#e5e9f2'
                  },
                  ticks: {
                    beginAtZero:true,
                    fontSize: 10,
                    fontColor: '#182b49'
                  }
                }],
                xAxes: [{
                  stacked: true,
                  gridLines: {
                    display: false
                  },
                  barPercentage: 0.6,
                  ticks: {
                    beginAtZero:true,
                    fontSize: 11,
                    fontColor: '#182b49'
                  }
                }]
              }
            }
          });
      },
  });

})
