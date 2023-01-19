<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://github.s3.amazonaws.com/downloads/lafeber/world-flags-sprite/flags32.css" />
</head>

<body style="width: 1080px; align-content: center;">

    <div id="sidebar">
        @include('master.partial.sidebar')
    </div>

    <div id="navbar">
        @include('master.partial.navbar')
    </div>
    <div id="content">
        @yield('content')
    </div>
    <div id="footer">
        @include('master.partial.footer')
    </div>

    <!--   <script type="text/javascript">
      window.getAddressData = "{{ route('getData') }}"
    </script>
 -->

    <script type="text/javascript">
        window.getAddressData = "{{ route('getDataBelanja') }}"
    </script>

    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/highcharts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/series-label.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/exporting.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/export-data.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/accessibility.js') }}"></script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>





    <script type="text/javascript">
        $(document).ready(function() {
            var chart = Highcharts.chart('belanja', {
                chart: {
                    type: 'column'
                },

                title: {
                    text: 'REALISASI BERDASARKAN BELANJA'
                },

                subtitle: {
                    text: ''
                },

                legend: {
                    align: 'right',
                    verticalAlign: 'middle',
                    layout: 'vertical'
                },

                xAxis: {
                    categories: ['OPERASI', 'MODAL', 'TAK TERDUGA', 'TRANSFER'],
                    labels: {
                        x: -10
                    }
                },

                yAxis: {
                    allowDecimals: false,
                    title: {
                        text: 'PERSENTASE'
                    }
                },

                series: [{
                    name: 'PAGU',
                    data: [38, 91, 34, 30]
                }, {
                    name: 'TARGET',
                    data: [31, 26, 27, 29]
                }, {
                    name: 'REALISASI',
                    data: [20, 23, 21, 24]
                }],

                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 600
                        },
                        chartOptions: {
                            legend: {
                                align: 'center',
                                verticalAlign: 'bottom',
                                layout: 'horizontal'
                            },
                            yAxis: {
                                labels: {
                                    align: 'left',
                                    x: 20,
                                    y: -5
                                },
                                title: {
                                    text: null
                                }
                            },
                            subtitle: {
                                text: null
                            },
                            credits: {
                                enabled: false
                            }
                        }
                    }]
                }
            });
        })
    </script>



    <script type="text/javascript">
        $(document).ready(function() {
            var chart = Highcharts.chart('sumberdana', {

                chart: {
                    type: 'column'
                },

                title: {
                    text: 'REALISASI BERDASARKAN SUMBER DANA'
                },

                subtitle: {
                    text: ''
                },

                legend: {
                    align: 'right',
                    verticalAlign: 'middle',
                    layout: 'vertical'
                },

                xAxis: {
                    categories: ['PAD', 'DAU', 'DAK', 'DOKA', 'DID', 'BPTHB'],
                    labels: {
                        x: -10
                    }
                },

                yAxis: {
                    allowDecimals: false,
                    title: {
                        text: 'PERSENTASE'
                    }
                },

                series: [{
                    name: 'PAGU',
                    data: [38, 91, 34, 30, 60, 70]
                }, {
                    name: 'TARGET',
                    data: [31, 26, 27, 29, 55, 68]
                }, {
                    name: 'REALISASI',
                    data: [20, 23, 21, 24, 30, 40]
                }],

                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 600
                        },
                        chartOptions: {
                            legend: {
                                align: 'center',
                                verticalAlign: 'bottom',
                                layout: 'horizontal'
                            },
                            yAxis: {
                                labels: {
                                    align: 'left',
                                    x: 20,
                                    y: -5
                                },
                                title: {
                                    text: null
                                }
                            },
                            subtitle: {
                                text: null
                            },
                            credits: {
                                enabled: false
                            }
                        }
                    }]
                }
            });
        })
    </script>





    <script type="text/javascript">
        $(document).ready(function() {


            var chart = Highcharts.chart('belanja_admin', {

                chart: {
                    type: 'column'
                },

                title: {
                    text: 'REKAPITULASI DAN TARGET BERDASARKAN BELANJA'
                },

                subtitle: {
                    text: ''
                },

                legend: {
                    align: 'right',
                    verticalAlign: 'middle',
                    layout: 'vertical'
                },

                xAxis: {
                    categories: ['OPERASI', 'MODAL', 'TAK TERDUGA', 'TRANSFER'],
                    labels: {
                        x: -10
                    }
                },

                yAxis: {
                    allowDecimals: false,
                    title: {
                        text: 'PERSENTASE'
                    }
                },

                series: [{
                    name: 'PAGU',
                    data: [38, 91, 34, 30]
                }, {
                    name: 'TARGET',
                    data: [31, 26, 27, 29]
                }],

                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 600
                        },
                        chartOptions: {
                            legend: {
                                align: 'center',
                                verticalAlign: 'bottom',
                                layout: 'horizontal'
                            },
                            yAxis: {
                                labels: {
                                    align: 'left',
                                    x: 20,
                                    y: -5
                                },
                                title: {
                                    text: null
                                }
                            },
                            subtitle: {
                                text: null
                            },
                            credits: {
                                enabled: false
                            }
                        }
                    }]
                }
            });


        })
    </script>



    <script type="text/javascript">
        $(document).ready(function() {


            var chart = Highcharts.chart('sumberdana_admin', {

                chart: {
                    type: 'column'
                },

                title: {
                    text: 'REKAPITULASI DAN TARGET BERDASARKAN SUMBER DANA'
                },

                subtitle: {
                    text: ''
                },

                legend: {
                    align: 'right',
                    verticalAlign: 'middle',
                    layout: 'vertical'
                },

                xAxis: {
                    categories: ['PAD', 'DAU', 'DAK', 'DOKA', 'DID', 'BPTHB'],
                    labels: {
                        x: -10
                    }
                },

                yAxis: {
                    allowDecimals: false,
                    title: {
                        text: 'PERSENTASE'
                    }
                },

                series: [{
                        name: 'PAGU',
                        data: [38, 91, 34, 30, 60, 70]
                    },
                    {
                        name: 'TARGET',
                        data: [31, 26, 27, 29, 55, 68]
                    }
                ],

                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 600
                        },
                        chartOptions: {
                            legend: {
                                align: 'center',
                                verticalAlign: 'bottom',
                                layout: 'horizontal'
                            },
                            yAxis: {
                                labels: {
                                    align: 'left',
                                    x: 20,
                                    y: -5
                                },
                                title: {
                                    text: null
                                }
                            },
                            subtitle: {
                                text: null
                            },
                            credits: {
                                enabled: false
                            }
                        }
                    }]
                }
            });


        })
    </script>




    <script type="text/javascript">
        $(document).ready(function() {


            var chart = Highcharts.chart('belanja_admin_realisasi', {

                chart: {
                    type: 'column'
                },

                title: {
                    text: 'REALISASI BERDASARKAN BELANJA'
                },

                subtitle: {
                    text: ''
                },

                legend: {
                    align: 'right',
                    verticalAlign: 'middle',
                    layout: 'vertical'
                },

                xAxis: {
                    categories: ['OPERASI', 'MODAL', 'TAK TERDUGA', 'TRANSFER'],
                    labels: {
                        x: -10
                    }
                },

                yAxis: {
                    allowDecimals: false,
                    title: {
                        text: 'PERSENTASE'
                    }
                },

                series: [{
                    name: 'PAGU',
                    data: [38, 91, 34, 30]
                }, {
                    name: 'TARGET',
                    data: [31, 26, 27, 29]
                }, {
                    name: 'REALISASI',
                    data: [20, 23, 21, 24]
                }],

                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 600
                        },
                        chartOptions: {
                            legend: {
                                align: 'center',
                                verticalAlign: 'bottom',
                                layout: 'horizontal'
                            },
                            yAxis: {
                                labels: {
                                    align: 'left',
                                    x: 20,
                                    y: -5
                                },
                                title: {
                                    text: null
                                }
                            },
                            subtitle: {
                                text: null
                            },
                            credits: {
                                enabled: false
                            }
                        }
                    }]
                }
            });


        })
    </script>



    <script type="text/javascript">
        $(document).ready(function() {


            var chart = Highcharts.chart('sumberdana_admin_realisasi', {

                chart: {
                    type: 'column'
                },

                title: {
                    text: 'REALISASI BERDASARKAN SUMBER DANA'
                },

                subtitle: {
                    text: ''
                },

                legend: {
                    align: 'right',
                    verticalAlign: 'middle',
                    layout: 'vertical'
                },

                xAxis: {
                    categories: ['PAD', 'DAU', 'DAK', 'DOKA', 'DID', 'BPTHB'],
                    labels: {
                        x: -10
                    }
                },

                yAxis: {
                    allowDecimals: false,
                    title: {
                        text: 'PERSENTASE'
                    }
                },

                series: [{
                    name: 'PAGU',
                    data: [38, 91, 34, 30, 60, 70]
                }, {
                    name: 'TARGET',
                    data: [31, 26, 27, 29, 55, 68]
                }, {
                    name: 'REALISASI',
                    data: [20, 23, 21, 24, 30, 40]
                }],

                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 600
                        },
                        chartOptions: {
                            legend: {
                                align: 'center',
                                verticalAlign: 'bottom',
                                layout: 'horizontal'
                            },
                            yAxis: {
                                labels: {
                                    align: 'left',
                                    x: 20,
                                    y: -5
                                },
                                title: {
                                    text: null
                                }
                            },
                            subtitle: {
                                text: null
                            },
                            credits: {
                                enabled: false
                            }
                        }
                    }]
                }
            });


        })
    </script>

</body>

</html>