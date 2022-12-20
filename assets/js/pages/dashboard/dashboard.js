            /*
Template Name: Material Admin
Author: Wrappixel
Email: niravjoshi87@gmail.com
File: js
*/
$(function() {
    "use strict";
    
    generateCharts();
    setInterval(function () {
        generateCharts();
    }, 60000); //60 seconds

    function generateCharts() {

        $.ajax({
            url: base_url + 'Report_assessment/offenses_Chart',
            // data: { 'group_code': group_code, 'department_id': 0, 'division_id': 0},
            type: "POST",
            dataType: 'json'
        }).done(function (response) {
            var len = response.length;
            
            var data = {};
            var value = [];
            var colors = [];

            for (var i = 0; i < len; i++) {
                data[response[i].name] = response[i].count;
                value.push(response[i].name);
                colors.push(stringToColour(response[i].name));
            }
            
            var chart1 = c3.generate({
                bindto: '.status',
                data: {
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
                    // pattern: ['#760a31','#c0c295','#ea9382','#394009','#606AD2','#78DBEF']
                    json: [data],
                    keys: {
                        value : colors
                    },
                }
            });

            var chart2 = c3.generate({
                bindto: '.chart1',
                data: {
                    json: [data],
                    keys: {
                        value : value
                    },
                    // columns:[data],
                    type: 'bar',
                    onclick: function (d, i) { console.log("onclick", d, i); },
                    onmouseover: function (d, i) { console.log("onmouseover", d, i); },
                    onmouseout: function (d, i) { console.log("onmouseout", d, i); }
                },
                legend: {
                    hide: true
                },
                bar: {
                    width: {
                        ratio: 0.5 // this makes bar width 50% of length between ticks
                    }
                },
                axis: {
                    x: {
                        show: false
                    },
                    y: {
                        show: false 
                    }
                }
            });

        });

    }

});

function stringToColour(str) {
    var hash = 0;
    for (var i = 0; i < str.length; i++) {
        hash = str.charCodeAt(i) + ((hash << 5) - hash);
    }
    var colour = '#';
    for (var i = 0; i < 3; i++) {
        var value = (hash >> (i * 8)) & 0xFF;
        colour += ('00' + value.toString(16)).substr(-2);
    }
    return colour;
}
