/* global Chart:false */

$(function() {
   'use strict'

   var ticksStyle = {
      fontColor: '#495057',
      fontStyle: 'bold'
   }

   var mode = 'index'
   var intersect = true

   var $salesChart = $('#sales-chart')
   // eslint-disable-next-line no-unused-vars
   var salesChart = new Chart($salesChart, {
      data: {
         labels: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'Mei',
            'Jun',
            'Jul',
            'Ags',
            'Sep',
            'Okt',
            'Nov',
            'Des'
         ],
         datasets: [
            {
               type: 'line',
               data: [
                  100,
                  120,
                  170,
                  167,
                  180,
                  177,
                  160
               ],
               backgroundColor: 'transparent',
               borderColor: '#007bff',
               pointBorderColor: '#007bff',
               pointBackgroundColor: '#007bff',
               fill: false
               // pointHoverBackgroundColor: '#007bff',
               // pointHoverBorderColor    : '#007bff'
            }
         ]
      },
      options: {
         maintainAspectRatio: false,
         tooltips: {
            mode: mode,
            intersect: intersect
         },
         hover: {
            mode: mode,
            intersect: intersect
         },
         legend: {
            display: false
         },
         scales: {
            yAxes: [
               {
                  // display: false,
                  gridLines: {
                     display: true,
                     lineWidth: '4px',
                     color: 'rgba(0, 0, 0, .2)',
                     zeroLineColor: 'transparent'
                  },
                  ticks: $.extend({
                     beginAtZero: true,
                     suggestedMax: 200
                  }, ticksStyle)
               }
            ],
            xAxes: [
               {
                  display: true,
                  gridLines: {
                     display: false
                  },
                  ticks: ticksStyle
               }
            ]
         }
      }
   })

   // The Calender
   $('#calendar').datetimepicker({format: 'L', inline: true})

})

// lgtm [js/unused-local-variable]