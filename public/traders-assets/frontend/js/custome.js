/*-----------------------------------------------------------------------------------

   

    /* ----------------------------------

    JS Active Code Index
            
        01. Preloader
        02. Scroll to Top
        03. Page options
        04. Page Elements
        05. Boxed Page
        06. Fixed Header
        07. Sidebar
        08. Accordion menu
        09. Fulscreen Function
        10. Navbar
        11. Popover
        12. Tooltips
        13. Right Sidebar
        14. Copy to clipboard
        15. Plugins
        
    ---------------------------------- */

$(document).ready(function() {

    "use strict";

    // Preloader
    $('#preloader').fadeOut('normall', function() {
        $(this).remove();
    });

    // Scroll to Top
    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 500) {
            $(".scroll-to-top").fadeIn(400);
        } else {
            $(".scroll-to-top").fadeOut(400);
        }
    });

    $(".scroll-to-top").on('click', function(event) {
        event.preventDefault();
        $("html, body").animate({
            scrollTop: 0
        }, 600);
    });

    // DataTable
    $('#example').DataTable({
        "language": {
            "paginate": {
                "previous": '<i class="fas fa-chevron-left"></i>',
                "next": '<i class="fas fa-chevron-right"></i>'
            }
        }
    });
    $('#exampleone').DataTable({
        "language": {
            "paginate": {
                "previous": '<i class="fas fa-chevron-left"></i>',
                "next": '<i class="fas fa-chevron-right"></i>'
            }
        }
    });
    $('#exampletwo').DataTable({
        "language": {
            "paginate": {
                "previous": '<i class="fas fa-chevron-left"></i>',
                "next": '<i class="fas fa-chevron-right"></i>'
            }
        }
    });
    $('#examplethree').DataTable({
        "language": {
            "paginate": {
                "previous": '<i class="fas fa-chevron-left"></i>',
                "next": '<i class="fas fa-chevron-right"></i>'
            }
        }
    });




    //   image select
    $(document).on("click", ".browse", function() {
        var file = $(this).parents().find(".file");
        file.trigger("click");
    });
    $('input[type="file"]').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#file").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });

    // chart js charts 
    const chartOptions = {
        maintainAspectRatio: false,
        legend: {
            display: false,
        },
        tooltips: {
            enabled: false,
        },
        elements: {
            point: {
                radius: 0
            },
        },
        scales: {
            xAxes: [{
                gridLines: false,
                scaleLabel: false,
                ticks: {
                    display: false
                }
            }],
            yAxes: [{
                gridLines: false,
                scaleLabel: false,
                ticks: {
                    display: false,
                    suggestedMin: 0,
                    suggestedMax: 10
                }
            }]
        }

    };

    //chart-1
    var ctx = document.getElementById('chart1').getContext('2d');
    // var canvas1 = document.getElementById('chart1');
    // var ctx = canvas1.getContext('2d');
    // const gradient = ctx.createLinearGradient(0, 0, 820, 0);
    // gradient.addColorStop(0, 'rgba(116, 102, 240, 1)');
    // gradient.addColorStop(.5, 'rgba(255, 255, 255, 0.0001)');
    // gradient.addColorStop(.5, 'rgba(255, 255, 255, 0)');
    // gradient.addColorStop(.8, 'rgba(0, 0, 0, 0.0001)');
    // ctx.fillStyle = gradient;

    var chart = new chart(ctx, {
        type: "line",
        data: {
            labels: [1, 2, 1, 3, 5, 4, 7],
            datasets: [{
                backgroundColor: "rgba(116, 102, 240, 0.1)",
                borderColor: "rgba(116, 102, 240, 1)",
                borderWidth: 2,
                data: [1, 5, 4, 6, 5, 6, 10],
            }, ],
        },
        options: chartOptions
    });
    //chart-2
    var ctx = document.getElementById('chart2').getContext('2d');
    var chart = new chart(ctx, {
        type: "line",
        data: {
            labels: [2, 3, 2, 9, 7, 7, 4],
            datasets: [{

                backgroundColor: "rgba(0, 203, 101, 0.1)",
                borderColor: "rgba(0, 203, 101, 1)",
                borderWidth: 2,
                data: [5, 2, 8, 2, 4, 2, 10],
            }, ],
        },
        options: chartOptions
    });
    //chart-3
    var ctx = document.getElementById('chart3').getContext('2d');
    var chart = new chart(ctx, {
        type: "line",
        data: {
            labels: [2, 5, 1, 3, 2, 6, 7],
            datasets: [{
                backgroundColor: "rgba(253, 68, 78, 0.1)",
                borderColor: "rgba(253, 68, 78, 1)",
                borderWidth: 2,
                data: [1, 5, 4, 6, 5, 6, 10],
            }, ],
        },
        options: chartOptions
    });
    //chart-4
    var ctx = document.getElementById('chart4').getContext('2d');
    var chart = new chart(ctx, {
        type: "line",
        data: {
            labels: [2, 5, 1, 3, 2, 6, 7],
            datasets: [{
                backgroundColor: "rgba(255, 153, 32, 0.1)",
                borderColor: "rgba(255, 153, 32, 1)",
                borderWidth: 2,
                data: [2, 5, 1, 3, 2, 6, 7],
            }, ],
        },
        options: chartOptions
    });
    //chart-5
    var ctx = document.getElementById('chart5').getContext('2d');
    var chart = new chart(ctx, {
        type: "line",
        data: {
            labels: [2, 5, 1, 3, 2, 6, 7],
            datasets: [{
                fill: false,
                borderColor: "rgba(172, 160, 249, 1)",
                borderWidth: 5,
                // boxshadow: "0px 4px 8px rgba(0, 0, 0, 0.23249)",
                data: [2, 5, 1, 3, 2, 6, 7],

            }, ],
        },
        options: chartOptions
    });
    //chart-6
    var ctx = document.getElementById('chart6').getContext('2d');
    var chart = new chart(ctx, {
        type: "line",
        data: {
            labels: [2, 5, 1, 3, 2, 6, 7],
            datasets: [{
                fill: false,
                borderColor: "rgba(0, 231, 158, 1)",
                borderWidth: 5,
                // boxshadow: "0px 4px 8px rgba(0, 0, 0, 0.23249)",
                data: [2, 5, 1, 3, 2, 6, 7],

            }, ],
        },
        options: chartOptions
    });
    //chart-7
    var ctx = document.getElementById('chart7').getContext('2d');
    var chart = new chart(ctx, {
        type: "line",
        data: {
            labels: [2, 5, 1, 3, 2, 6, 7],
            datasets: [{
                fill: false,
                borderColor: "rgba(255, 202, 68, 1)",
                borderWidth: 5,
                // boxshadow: "0px 4px 8px rgba(0, 0, 0, 0.23249)",
                data: [2, 5, 1, 3, 2, 6, 7],

            }, ],
        },
        options: chartOptions
    });
    //chart-8
    var ctx = document.getElementById('chart8').getContext('2d');
    var chart = new chart(ctx, {
        type: "bar",
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Dataset 1',
                data: [0, 50, 100, 80, 60, 40, 0],
                minBarLength: 50,
                borderRadiustopLeft: 100,

                barThickness: 16,
                borderSkipped: true,
                backgroundColor: [
                    'rgba(248, 248, 248, 1)',
                    'rgba(248, 248, 248, 1)',
                    'rgba(115, 103, 240, 1)',
                    'rgba(248, 248, 248, 1)',
                    'rgba(248, 248, 248, 1)',
                    'rgba(248, 248, 248, 1)',
                    'rgba(248, 248, 248, 1)'
                ],
            }, ],
        },
        options: chartOptions
    });
    //chart-9
    var ctx = document.getElementById('chart9').getContext('2d');
    var chart = new chart(ctx, {
        type: "doughnut",
        data: {

            datasets: [{
                data: [1, 6, 4],
                borderWidth: 0,
                backgroundColor: [
                    'rgba(234, 84, 85, 1)',
                    'rgba(121, 54, 232, 1)',
                    'rgba(255, 159, 67, 1)',
                ],
            }],
        },
        options: {
            chartOptions,
            cutout: '20%',
            cutoutPercentage: 80,
        }
    });
    //chart-10
    var ctx = document.getElementById('chart10').getContext('2d');
    var chart = new chart(ctx, {
        type: "pie",
        data: {

            datasets: [{
                data: [1, 4, 3],
                borderWidth: 4,
                backgroundColor: [
                    'rgba(234, 84, 85, 1)',
                    'rgba(121, 54, 232, 1)',
                    'rgba(255, 159, 67, 1)',
                ],
            }],
        },
        options: chartOptions
    });


    //chart-11
    var randomScalingFactor = function() {
        return (Math.random() > 0.5 ? 1.0 : -1.0) * Math.round(Math.random() * 100);
    };
    var randomColorFactor = function() {
        return Math.round(Math.random() * 255);
    };

    var barChartData = {
        labels: ["January", "February", "March", "April", "May", "June", "July", "Aug", "Sep"],
        datasets: [{
            label: 'Dataset 1',
            backgroundColor: "#7367F0",
            data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()],

        }, {
            label: 'Dataset 2',
            backgroundColor: "#FF9F43",
            data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()],

        }, ]

    };
    window.myBar = new chart(ctx).Bar({
        data: barChartData,
        options: {
            responsive: true,
            scales: {
                xAxes: [{
                    gridLines: {
                        show: true
                    }
                }],
                yAxes: [{
                    gridLines: {
                        show: false
                    }
                }]
            }
        }
    });
    var myBar = null;

    var ctx = document.getElementById("charts11").getContext("2d");
    myBar = new chart(ctx, {
        type: 'bar',
        data: barChartData,
        options: {
            responsive: true,
        }
    });


    $('#randomizeData').click(function() {
        $.each(barChartData.datasets, function(i, dataset) {
            dataset.backgroundColor = 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',.7)';
            dataset.data = [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()];

        });
        myBar.update();
    });




    // apexchart1
    var options = {
        chart: {
            width: 180,
            type: "donut"
        },
        colors: ["#8fe2b4", "#d4f4e2", "#28C76F"],
        dataLabels: {
            enabled: false
        },
        plotOptions: {
            pie: {
                donut: {
                    labels: {
                        show: true,
                        name: {
                            show: true,
                            fontSize: '15px',

                            color: '#5E5873',
                            offsetY: -10
                        },

                        total: {
                            show: true,
                            label: 'Sales',
                            color: '#6E6B7B',
                            formatter: function(w) {
                                return w.globals.seriesTotals.reduce((a, b) => {
                                    return a + b
                                }, 0)
                            }
                        },
                        value: {
                            show: true,
                            fontSize: '14px',
                            color: undefined,
                            offsetY: -5,
                            formatter: function(val) {
                                return val
                            }
                        }
                    }
                }
            }
        },
        series: [80, 20, 40],
        tooltip: {
            enabled: true,
            y: {
                formatter: function(val) {
                    return val + ".00" + " Rs"
                },
                title: {
                    formatter: function(seriesName) {
                        return ''
                    }
                }
            }
        },
        legend: {
            show: false
        }
    };

    var chart = new ApexCharts(document.querySelector("#apexchart1"), options);

    chart.render();

    // apexchart2
    var options = {
        series: [83],
        chart: {
            height: 450,
            type: 'radialBar',
            offsetY: -10

        },
        plotOptions: {
            radialBar: {
                startAngle: -135,
                endAngle: 135,
                dataLabels: {
                    name: {
                        fontSize: '14px',
                        color: undefined,
                        offsetY: 0,
                        color: '#5E5873'

                    },
                    value: {
                        offsetY: 20,
                        fontSize: '24px',
                        color: '#5E5873',
                        formatter: function(val) {
                            return val + "%";
                        }
                    }

                }
            }
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'dark',
                shadeIntensity: 0.5,
                gradientToColors: undefined,
                inverseColors: true,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 50, 100],
                colorStops: [{
                        offset: 40,
                        color: "#E7555B"

                    },
                    {
                        offset: 60,
                        color: "#BD5C91"

                    },
                    {
                        offset: 100,
                        color: "#9263CA"

                    },
                ]

            },
        },
        stroke: {
            dashArray: 4

        },
        labels: ['Completed Tickets'],
    };

    var chart = new ApexCharts(document.querySelector("#apexchart2"), options);
    chart.render();

    // apexchart3
    var options = {
        series: [70, 50, 25],
        chart: {
            height: 330,

            offsetY: -10,
            type: 'radialBar',
        },
        fill: {
            colors: ['#7936E8', '#FF9F43', '#EA5455']
        },
        plotOptions: {
            radialBar: {
                dataLabels: {
                    name: {
                        fontSize: '22px',
                    },
                    value: {
                        fontSize: '16px',
                    },
                    total: {
                        show: true,
                        label: 'Total',
                        formatter: function(w) {
                            // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                            return 42459
                        }
                    }
                }
            }
        },
        labels: ['Primary', 'Warning', 'Danger'],
    };

    var chart = new ApexCharts(document.querySelector("#apexchart3"), options);
    chart.render();

    // apexchart4
    var options = {
        series: [{
            name: 'Sales',
            data: [80, 50, 30, 40, 100, 20],
        }, {
            name: 'Visitors',
            data: [44, 76, 78, 13, 43, 10],
        }],
        chart: {
            height: 350,

            type: 'radar',
            dropShadow: {
                enabled: true,
                blur: 1,
                left: 1,
                top: 1
            }
        },
        stroke: {
            width: 0
        },
        fill: {
            opacity: 1,
            colors: ['#7367F0', '#00CFE8']
        },
        markers: {
            size: 0
        },
        xaxis: {
            categories: ['2011', '2012', '2013', '2014', '2015', '2016']
        }
    };

    var chart = new ApexCharts(document.querySelector("#apexchart4"), options);
    chart.render();

    // apexchart5
    var options = {
        series: [{
                name: "This Month",
                data: [20, 35, 20, 40, 35, 25, 35, 20, 35, 40]
            },
            {
                name: "Last Month",
                data: [35, 41, 62, 42, 13, 18, 29, 37, 36, 51]
            }
        ],
        chart: {
            height: 350,
            type: 'line',
            zoom: {
                enabled: false
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: [2, 2],
            curve: 'smooth',
            dashArray: [0, 8]
        },
        legend: {
            tooltipHoverFormatter: function(val, opts) {
                return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
            }
        },
        markers: {
            size: 0,
            hover: {
                sizeOffset: 6
            },
            Borderradius: 100,
        },
        xaxis: {
            categories: ['10', '20', '30', '40', '50', '60', '70', '80', '90', '100'],
        },
        tooltip: {
            y: [{
                    title: {
                        formatter: function(val) {
                            return val + " (mins)"
                        }
                    }
                },
                {
                    title: {
                        formatter: function(val) {
                            return val + " per session"
                        }
                    }
                },
                {
                    title: {
                        formatter: function(val) {
                            return val;
                        }
                    }
                }
            ]
        },
        grid: {
            borderColor: '#EBE9F1',
        }
    };

    var chart = new ApexCharts(document.querySelector("#apexchart5"), options);
    chart.render();

    // apexchart6
    var options = {
        series: [{
                name: "This Month",
                data: [20, 35, 20, 40, 35, 25, 35, 20, 35, 40]
            }

        ],
        chart: {
            height: 350,
            type: 'line',
            zoom: {
                enabled: false
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: [2],
            curve: 'smooth',
            dashArray: [0]
        },
        legend: {
            tooltipHoverFormatter: function(val, opts) {
                return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
            }
        },
        markers: {
            size: 0,
            hover: {
                sizeOffset: 6
            },
            Borderradius: 100,
        },
        xaxis: {
            categories: ['10', '20', '30', '40', '50', '60', '70', '80', '90', '100'],
        },
        tooltip: {
            y: [{
                    title: {
                        formatter: function(val) {
                            return val + " (mins)"
                        }
                    }
                },
                {
                    title: {
                        formatter: function(val) {
                            return val + " per session"
                        }
                    }
                },
                {
                    title: {
                        formatter: function(val) {
                            return val;
                        }
                    }
                }
            ]
        },
        grid: {
            borderColor: '#EBE9F1',
        }
    };

    var chart = new ApexCharts(document.querySelector("#apexchart6"), options);
    chart.render();


    //   $(function () {
    //     if ($(".js-example-basic-single").length) {
    //         $(".js-example-basic-single").select2();
    //       }
    //       if ($(".js-example-basic-multiple").length) {
    //         $(".js-example-basic-multiple").select2();
    //       }
    //   })



    // select
    $(".js-example-basic-single").select2();


    $(".js-example-basic-multiple").select2();



    $('.js-example-basic-multiple').select2({
        placeholder: "Add Organizations!",
        minimumInputLength: 3,
        multiple: true,

    });

    $('.minus').click(function() {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });
    $('.plus').click(function() {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });

    var $removeItem = $(".btn-remove");




    $removeItem.on("click", function() {
        var $item = $(this).parents(".cart-body");
        $item.remove();


    });

    // range slider
    // const range = document.querySelector('.range')
    // const thumb = document.querySelector('.thumb')
    // const track = document.querySelector('.track-inner')

    // const updateSlider = (value) => {
    // thumb.style.left = `${value}%`
    // thumb.style.transform = `translate(-${value}%, -50%)`
    // track.style.width = `${value}%`
    // }

    // range.oninput = (e) =>
    // updateSlider(e.target.value)

    // updateSlider(50) // Init value

    // Page options
    var page_boxed = false,
        page_sidebar_fixed = false,
        page_sidebar_collapsed = false,
        page_header_fixed = false;


    // Page Elements
    var body = $('body'),
        page_header = $('.page-header'),
        page_sidebar = $('.page-sidebar'),
        page_content = $('.page-content');


    // Boxed Page 
    var boxed_page = function() {
        if (page_boxed === true) {
            $('.page-container').addClass('container');
        };
    };

    // Fixed Header
    var fixed_header = function() {
        if (page_header_fixed === true) {
            $('body').addClass('page-header-fixed');
        };
    };

    // Sidebar
    var page_sidebar_init = function() {

        // Slimscroll
        $('.page-sidebar-inner').slimScroll({
            height: '100%'
        });


        // Fixed Sidebar
        var fixed_sidebar = function() {
            if ((body.hasClass('page-sidebar-fixed')) && (page_sidebar_fixed === false)) {
                page_sidebar_fixed = true;
            };

            if (page_sidebar_fixed === true) {
                body.addClass('page-sidebar-fixed');
                $('#fixed-sidebar-toggle-button').removeClass('icon-radio_button_unchecked');
                $('#fixed-sidebar-toggle-button').addClass('icon-radio_button_checked');
            };

            var fixed_sidebar_toggle = function() {
                body.toggleClass('page-sidebar-fixed');
                if (body.hasClass('page-sidebar-fixed')) {
                    page_sidebar_fixed = true;
                } else {
                    page_sidebar_fixed = false;
                }
            };

            $('#fixed-sidebar-toggle-button').on('click', function() {
                fixed_sidebar_toggle();
                $(this).toggleClass('icon-radio_button_unchecked');
                $(this).toggleClass('icon-radio_button_checked');
                return false;
            });
        };


        // Collapsed Sidebar
        var collapsed_sidebar = function() {
            if (page_sidebar_collapsed === true) {
                body.addClass('page-sidebar-collapsed');
            };

            var collapsed_sidebar_toggle = function() {
                body.toggleClass('page-sidebar-collapsed');
                if (body.hasClass('page-sidebar-collapsed')) {
                    page_sidebar_collapsed = true;
                } else {
                    page_sidebar_collapsed = false;
                };
                $('.page-sidebar-collapsed .page-sidebar .accordion-menu').on({
                    mouseenter: function() {
                        $('.page-sidebar').addClass('fixed-sidebar-scroll')
                    },
                    mouseleave: function() {
                        $('.page-sidebar').removeClass('fixed-sidebar-scroll')
                    }
                }, 'li');
            };

            $('.page-sidebar-collapsed .page-sidebar .accordion-menu').on({
                mouseenter: function() {
                    $('.page-sidebar').addClass('fixed-sidebar-scroll')
                },
                mouseleave: function() {
                    $('.page-sidebar').removeClass('fixed-sidebar-scroll')
                }
            }, 'li');
            $('#collapsed-sidebar-toggle-button').on('click', function() {
                collapsed_sidebar_toggle();
                return false;
            });

        };

        var small_screen_sidebar = function() {
            if (($(window).width() < 768) && ($('#fixed-sidebar-toggle-button').hasClass('icon-radio_button_unchecked'))) {
                $('#fixed-sidebar-toggle-button').click();
            }
            $(window).on('resize', function() {
                if (($(window).width() < 768) && ($('#fixed-sidebar-toggle-button').hasClass('icon-radio_button_unchecked'))) {
                    $('#fixed-sidebar-toggle-button').click();
                }
            });
            $('#sidebar-toggle-button').on('click', function() {
                body.toggleClass('page-sidebar-visible');
                return false;
            });
            $('#sidebar-toggle-button-close').on('click', function() {
                body.toggleClass('page-sidebar-visible');
                return false;
            });
        };

        fixed_sidebar();
        collapsed_sidebar();
        small_screen_sidebar();
    };

    // Accordion menu
    var accordion_menu = function() {


        /*------------------------------------
            Menu Selector
        --------------------------------------*/

        $('.accordion-menu li ul li').parent().addClass('sub-menu');
        $('.accordion-menu li ul').parent().addClass('has-sub');

        var urlparam = window.location.pathname.split('/');
        var menuselctor = window.location.pathname;
        if (urlparam[urlparam.length - 1].length > 0)
            menuselctor = urlparam[urlparam.length - 1];
        else
            menuselctor = urlparam[urlparam.length - 2];

        $('.accordion-menu li').find('a[href="' + menuselctor + '"]').closest('li').addClass('active').parents().eq(1).addClass('active-page');
        $('.accordion-menu .active-page > a').addClass('active');

        $('.has-sub > a').on('click', function(e) {
            e.preventDefault();
            $(this).toggleClass('active');
            $(this).next('.sub-menu').slideToggle();
            return $(this).parents().siblings('.has-sub').children('.sub-menu').slideUp().prev('.active').removeClass('active');
        });

    };

    // Fulscreen Function
    function toggleFullScreen() {
        if (!document.fullscreenElement && // alternative standard method
            !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement) { // current working methods
            if (document.documentElement.requestFullscreen) {
                document.documentElement.requestFullscreen();
            } else if (document.documentElement.msRequestFullscreen) {
                document.documentElement.msRequestFullscreen();
            } else if (document.documentElement.mozRequestFullScreen) {
                document.documentElement.mozRequestFullScreen();
            } else if (document.documentElement.webkitRequestFullscreen) {
                document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
            }
        } else {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            }
        }
    };

    // Navbar
    var navbar_init = function() {

        $('#toggle-fullscreen').on('click', function() {
            toggleFullScreen();
            return false;

        });

        $('#search-button').on('click', function() {
            body.toggleClass('search-open')
            if (body.hasClass('search-open')) {
                $('.search-form input').focus();
            }
        });

        $('#close-search').on('click', function() {
            body.toggleClass('search-open')
        });

    };

    // Popover
    // $(function () {
    $('.right').popover({
        placement: 'right',
        html: true,
        content: '<p>This is a very beautiful popover, show some love.</p><div class="d-flex justify-content-between"><a href="#" class="btn-outline btn-sm btn-outline-primary me-0 close">Skip</a><a href="#" class="btn btn-sm btn-primary me-0">Read More</a></div>'
    });

    $('.top').popover({
        placement: 'top',
        html: true,
        content: '<p>This is a very beautiful popover, show some love.</p><div class="d-flex justify-content-between"><a href="#" class="btn-outline btn-sm btn-outline-primary me-0 close">Skip</a><a href="#" class="btn btn-sm btn-primary me-0">Read More</a></div>'
    });

    $('.bottom').popover({
        placement: 'bottom',
        html: true,
        content: '<p>This is a very beautiful popover, show some love.</p><div class="d-flex justify-content-between"><a href="#" class="btn-outline btn-sm btn-outline-primary me-0 close">Skip</a><a href="#" class="btn btn-sm btn-primary me-0">Read More</a></div>'
    });

    $('.left').popover({
        placement: 'left',
        html: true,
        content: '<p>This is a very beautiful popover, show some love.</p><div class="d-flex justify-content-between"><a href="#" class="btn-outline btn-sm btn-outline-primary me-0 close">Skip</a><a href="#" class="btn btn-sm btn-primary me-0">Read More</a></div>'
    });

    $(document).on("click", ".popover .close", function() {
        $(this).parents(".popover").popover('hide');
    });
    // })

    // Tooltips
    $(function() {
        $('[data-bs-toggle="tooltip"]').tooltip()
    })

    //Right Sidebar
    var right_sidebar = function() {
        $('.right-sidebar-toggle').on('click', function() {
            var sidebarId = $(this).data("sidebar-id");
            $('#' + sidebarId).toggleClass('visible');
        });

        var write_message = function() {
            $(".chat-write form input").on('keypress', function(e) {
                if ((e.which === 13) && (!$(this).val().length === 0)) {
                    if ($('.right-sidebar-chat .chat-bubbles .chat-bubble:last-child').hasClass('me')) {

                        $('<span class="chat-bubble-text">' + $(this).val() + '</span>').insertAfter(".right-sidebar-chat .chat-bubbles .chat-bubble:last-child span:last-child");
                    } else {
                        $('<div class="chat-bubble me"><div class="chat-bubble-text-container"><span class="chat-bubble-text">' + $(this).val() + '</span></div></div>').insertAfter(".right-sidebar-chat .chat-bubbles .chat-bubble:last-child");
                    };
                    $(this).val('');
                } else if (e.which === 13) {
                    return;
                }
                var scrollTo_int = $('.right-sidebar-chat').prop('scrollHeight') + 'px';
                $('.right-sidebar-chat').slimscroll({
                    allowPageScroll: true,
                    scrollTo: scrollTo_int
                });
            });
        };
        write_message();
    };

    // Copy to clipboard
    // if ($(".copy-clipboard").length !== 0) {
    //     new ClipboardJS('.copy-clipboard');
    //     $('.copy-clipboard').on('click', function() {
    //         var $this = $(this);
    //         var originalText = $this.text();
    //         $this.text('Copied');
    //         setTimeout(function() {
    //             $this.text('Copy')
    //             }, 2000);
    //     });
    // };    

    // Plugins
    var plugins_init = function() {

        // Slimscroll
        $('.slimscroll').slimScroll();

        // Uniform (Disable it if you want default check box and radio button)
        // var checkBox = $("input[type=checkbox]:not(.js-switch), input[type=radio]:not(.no-uniform)");
        // if (checkBox.length > 0) {
        //     checkBox.each(function() {
        //         $(this).uniform();
        //     });
        // };

        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        elems.forEach(function(html) {
            var switchery = new switchery(html, { size: 'small', color: '#526069' });
        });

    };

    $('.accordion-menu .has-sub.active-page > a').addClass('active');



    page_sidebar_init();
    boxed_page();
    accordion_menu();
    navbar_init();
    right_sidebar();
    plugins_init();


});