// Dashboard 1 Morris-chart
/*
Template Name: Monster Admin
Author: nimadeveloper.ir
Email: nima.bigham5@gmail.com
File: js
*/
$(function () {
    "use strict";
Morris.Area({
        element: 'morris-area-chart',
        data: [{
            period: '1389',
            iphone: 50,
            ipad: 80,
            itouch: 20
        }, {
            period: '1390',
            iphone: 130,
            ipad: 100,
            itouch: 80
        }, {
            period: '1391',
            iphone: 80,
            ipad: 60,
            itouch: 70
        }, {
            period: '1392',
            iphone: 70,
            ipad: 200,
            itouch: 140
        }, {
            period: '1393',
            iphone: 180,
            ipad: 150,
            itouch: 140
        }, {
            period: '1394',
            iphone: 105,
            ipad: 100,
            itouch: 80
        },
         {
            period: '1395',
            iphone: 250,
            ipad: 150,
            itouch: 200
        }],
        xkey: 'period',
        ykeys: ['iphone', 'ipad', 'itouch'],
        labels: ['آیفون', 'آیپد', 'آیپاد'],
        pointSize: 3,
        fillOpacity: 0,
        pointStrokeColors:['#55ce63', '#009efb', '#2f3d4a'],
        behaveLikeLine: true,
        gridLineColor: '#e0e0e0',
        lineWidth: 3,
        hideHover: 'auto',
        lineColors: ['#55ce63', '#009efb', '#2f3d4a'],
        resize: true
        
    });

Morris.Area({
        element: 'morris-area-chart2',
        data: [{
            period: '1390',
            SiteA: 0,
            SiteB: 0,
            
        }, {
            period: '1391',
            SiteA: 130,
            SiteB: 100,
            
        }, {
            period: '1392',
            SiteA: 80,
            SiteB: 60,
            
        }, {
            period: '1393',
            SiteA: 70,
            SiteB: 200,
            
        }, {
            period: '1394',
            SiteA: 180,
            SiteB: 150,
            
        }, {
            period: '1395',
            SiteA: 105,
            SiteB: 90,
            
        },
         {
            period: '1396',
            SiteA: 250,
            SiteB: 150,
           
        }],
        xkey: 'period',
        ykeys: ['SiteA', 'SiteB'],
        labels: ['سایت الف', 'سایت ب'],
        pointSize: 0,
        fillOpacity: 0.4,
        pointStrokeColors:['#b4becb', '#009efb'],
        behaveLikeLine: true,
        gridLineColor: '#e0e0e0',
        lineWidth: 0,
        smooth: false,
        hideHover: 'auto',
        lineColors: ['#b4becb', '#009efb'],
        resize: true
        
    });


// LINE CHART
        var line = new Morris.Line({
          element: 'morris-line-chart',
          resize: true,
          data: [
            {y: '1394 Q1', item1: 2666},
            {y: '1394 Q2', item1: 2778},
            {y: '1394 Q3', item1: 4912},
            {y: '1394 Q4', item1: 3767},
            {y: '1395 Q1', item1: 6810},
            {y: '1395 Q2', item1: 5670},
            {y: '1395 Q3', item1: 4820},
            {y: '1395 Q4', item1: 15073},
            {y: '1396 Q1', item1: 10687},
            {y: '1396 Q2', item1: 8432}
          ],
          xkey: 'y',
          ykeys: ['item1'],
          labels: ['آیتم 1'],
          gridLineColor: '#eef0f2',
          lineColors: ['#009efb'],
          lineWidth: 1,
          hideHover: 'auto'
        });
 // Morris donut chart
        
    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: "فروش دانلود",
            value: 12,

        }, {
            label: "فروش در فروشگاه",
            value: 30
        }, {
            label: "سفارش از طریق ایمیل",
            value: 20
        }],
        resize: true,
        colors:['#009efb', '#55ce63', '#2f3d4a']
    });

// Morris bar chart
    Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            y: '1389',
            a: 100,
            b: 90,
            c: 60
        }, {
            y: '1390',
            a: 75,
            b: 65,
            c: 40
        }, {
            y: '1391',
            a: 50,
            b: 40,
            c: 30
        }, {
            y: '1392',
            a: 75,
            b: 65,
            c: 40
        }, {
            y: '1393',
            a: 50,
            b: 40,
            c: 30
        }, {
            y: '1394',
            a: 75,
            b: 65,
            c: 40
        }, {
            y: '1395',
            a: 100,
            b: 90,
            c: 40
        }],
        xkey: 'y',
        ykeys: ['a', 'b', 'c'],
        labels: ['الف', 'ب', 'ج'],
        barColors:['#55ce63', '#2f3d4a', '#009efb'],
        hideHover: 'auto',
        gridLineColor: '#eef0f2',
        resize: true
    });
// Extra chart
 Morris.Area({
        element: 'extra-area-chart',
        data: [{
                    period: '1391',
                    iphone: 0,
                    ipad: 0,
                    itouch: 0
                }, {
                    period: '1392',
                    iphone: 50,
                    ipad: 15,
                    itouch: 5
                }, {
                    period: '1393',
                    iphone: 20,
                    ipad: 50,
                    itouch: 65
                }, {
                    period: '1394',
                    iphone: 60,
                    ipad: 12,
                    itouch: 7
                }, {
                    period: '1395',
                    iphone: 30,
                    ipad: 20,
                    itouch: 120
                }, {
                    period: '1396',
                    iphone: 25,
                    ipad: 80,
                    itouch: 40
                }, {
                    period: '1397',
                    iphone: 10,
                    ipad: 10,
                    itouch: 10
                }


                ],
                lineColors: ['#55ce63', '#2f3d4a', '#009efb'],
                xkey: 'period',
                ykeys: ['iphone', 'ipad', 'itouch'],
                labels: ['سایت الف', 'سایت ب', 'سایت ج'],
                pointSize: 0,
                lineWidth: 0,
                resize:true,
                fillOpacity: 0.8,
                behaveLikeLine: true,
                gridLineColor: '#e0e0e0',
                hideHover: 'auto'
        
    });
 });    