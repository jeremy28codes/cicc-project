            /*
Template Name: Material Admin
Author: Wrappixel
Email: niravjoshi87@gmail.com
File: js
*/
$(function() {
    "use strict";
    

    // ============================================================== 
    // Offenses Donut Graph
    // ==============================================================   
    generateDonutChart();

    function generateDonutChart() {

        $.ajax({
            url: base_url + 'Report_assessment/offenses_Chart',
            // data: { 'group_code': group_code, 'department_id': 0, 'division_id': 0},
            type: "POST",
            dataType: 'json'
        }).done(function (response) {
            var len = response.length;
            
            var data = {};
            var value = [];

            for (var i = 0; i < len; i++) {
                data[response[i].name] = response[i].count;
                value.push(response[i].name);
            }

            c3.generate({
                bindto: '.status',
                data: {
                    // columns: [
                    //     ['Pending', 55],
                    //     ['Failed', 10],
                    //     ['Success', 18],
                    // ],
                    json: [data],
                    keys: {
                        value : value
                    },
                    // columns:[data],
                    type: 'donut',
                    onclick: function (d, i) { console.log("onclick", d, i); },
                    onmouseover: function (d, i) { console.log("onmouseover", d, i); },
                    onmouseout: function (d, i) { console.log("onmouseout", d, i); }
                },
                donut: {
                    label: {
                        show: false
                    },
                    title: "Offenses",
                    width: 35,
        
                },
        
                legend: {
                    //hide: true
                    //hide: 'data2'
                    //hide: ['data1', 'data2']
                },
                color: {
                    pattern: ['#137eff','#5ac146','#8b5edd','#778899','#606AD2','#78DBEF']
                }
            });
        });

    }


    // ============================================================== 
    // Yearly Comparison
    // ============================================================== 
    new Chartist.Bar('.chart1', {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        series: [
            [5, 4, 5, 3, 12, 4, 15, 8, 10, 8, 7, 5],
            [4, 10, 5, 4, 8, 3, 3, 4, 9, 7, 10, 4]
        ]
    }, {
        stackBars: true,
        axisY: {
            labelInterpolationFnc: function(value) {
                return (value / 1) + 'k';
            },
            scaleMinSpace: 55
        },  
        axisX: {
            showGrid: false
        },
        plugins: [
            Chartist.plugins.tooltip()
        ],
        seriesBarDistance: 1,
        chartPadding: {
            top: 15,
            right: 15,
            bottom: 5,
            left: 0
        }
    }).on('draw', function(data) {
        if (data.type === 'bar') {
            data.element.attr({
                style: 'stroke-width: 25px'
            });
        }
    });
});