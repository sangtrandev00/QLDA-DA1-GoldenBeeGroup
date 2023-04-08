
$(function () {
	"use strict";
	// chart 1
	var options = {
		series: [{
			name: 'Likes',
			data: [14, 3, 10, 9, 29, 19, 22, 9, 12, 7, 19, 5]
		}],
		chart: {
			foreColor: '#9ba7b2',
			height: 360,
			type: 'line',
			zoom: {
				enabled: false
			},
			toolbar: {
				show: true
			},
			dropShadow: {
				enabled: true,
				top: 3,
				left: 14,
				blur: 4,
				opacity: 0.10,
			}
		},
		stroke: {
			width: 5,
			curve: 'smooth'
		},
		xaxis: {
			//type: 'datetime',
			categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
		},
		title: {
			text: 'Line Chart',
			align: 'left',
			style: {
				fontSize: "16px",
				color: '#666'
			}
		},
		fill: {
			type: 'gradient',
			gradient: {
				shade: 'light',
				gradientToColors: ['#3461ff'],
				shadeIntensity: 1,
				type: 'horizontal',
				opacityFrom: 1,
				opacityTo: 1,
				stops: [0, 100, 100, 100]
			},
		},
		markers: {
			size: 4,
			colors: ["#3461ff"],
			strokeColors: "#fff",
			strokeWidth: 2,
			hover: {
				size: 7,
			}
		},
		colors: ["#3461ff"],
		yaxis: {
			title: {
				text: 'Engagement',
			},
		}
	};
	var chart = new ApexCharts(document.querySelector("#chart1"), options);
	chart.render();
	
	
	// chart 2
	var optionsLine = {
		chart: {
			foreColor: '#9ba7b2',
			height: 360,
			type: 'line',
			zoom: {
				enabled: false
			},
			dropShadow: {
				enabled: true,
				top: 3,
				left: 2,
				blur: 4,
				opacity: 0.1,
			}
		},
		stroke: {
			curve: 'smooth',
			width: 5
		},
		colors: ["#e72e2e", '#0c971a'],
		series: [{
			name: "Music",
			data: [1, 15, 56, 20, 33, 27, 15, 56, 20, 56]
		}, {
			name: "Photos",
			data: [30, 33, 21, 42, 30, 33, 21, 42, 19, 32]
		}],
		title: {
			text: 'Multiline Chart',
			align: 'left',
			offsetY: 25,
			offsetX: 20
		},
		subtitle: {
			text: 'Statistics',
			offsetY: 55,
			offsetX: 20
		},
		markers: {
			size: 4,
			strokeWidth: 0,
			hover: {
				size: 7
			}
		},
		grid: {
			show: true,
			padding: {
				bottom: 0
			}
		},
		//labels: ['01/15/2002', '01/16/2002', '01/17/2002', '01/18/2002', '01/19/2002', '01/20/2002'],
		xaxis: {
			//type: 'datetime',
			categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
		},
		legend: {
			position: 'top',
			horizontalAlign: 'right',
			offsetY: -20
		}
	}

	var chartLine = new ApexCharts(document.querySelector('#chart2'), optionsLine);
	chartLine.render();
	
	// chart 3
	var options = {
		series: [{
			name: 'series1',
			data: [31, 40, 68, 31, 92, 55, 100]
		}, {
			name: 'series2',
			data: [11, 82, 45, 80, 34, 52, 41]
		}],
		chart: {
			foreColor: '#9ba7b2',
			height: 360,
			type: 'area',
			zoom: {
				enabled: false
			},
			toolbar: {
				show: true
			},
		},
		colors: ["#3461ff", '#0c971a'],
		title: {
			text: 'Area Chart',
			align: 'left',
			style: {
				fontSize: "16px",
				color: '#666'
			}
		},
		dataLabels: {
			enabled: false
		},
		stroke: {
			curve: 'smooth'
		},
		xaxis: {
			type: 'datetime',
			categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
		},
		tooltip: {
			x: {
				format: 'dd/MM/yy HH:mm'
			},
		},
	};
	var chart = new ApexCharts(document.querySelector("#chart3"), options);
	chart.render();
	
	// chart 4
	var options = {
		series: [{
			name: 'Net Profit',
			data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
		}, {
			name: 'Revenue',
			data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
		}, {
			name: 'Free Cash Flow',
			data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
		}],
		chart: {
			foreColor: '#9ba7b2',
			type: 'bar',
			height: 360
		},
		plotOptions: {
			bar: {
				horizontal: false,
				columnWidth: '55%',
				endingShape: 'rounded'
			},
		},
		dataLabels: {
			enabled: false
		},
		stroke: {
			show: true,
			width: 2,
			colors: ['transparent']
		},
		title: {
			text: 'Column Chart',
			align: 'left',
			style: {
				fontSize: '14px'
			}
		},
		colors: ["#6184ff", '#3461ff', '#c4d1ff'],
		xaxis: {
			categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
		},
		yaxis: {
			title: {
				text: '$ (thousands)'
			}
		},
		fill: {
			opacity: 1
		},
		tooltip: {
			y: {
				formatter: function (val) {
					return "$ " + val + " thousands"
				}
			}
		}
	};
	var chart = new ApexCharts(document.querySelector("#chart4"), options);
	chart.render();

	// chart totalOrderByWeeks

	function drawReportWeekOfYears(year) {
		const arrayNumberWeeksOfYear = [];

	for (let i = 1; i <= 52; i++) {
		// const element = array[i];
		// console.log('i', i.toString());
		arrayNumberWeeksOfYear.push(i.toString());
	}

	// console.log('arrayNumberWeeksOfYear', arrayNumberWeeksOfYear);

	const arrayNumberDaysOfMonth = [];

	$.ajax({
		type: "POST",
		url: "./logic/revenue.php?act=allweeks",
		
		data: {
			year: year
		},

		// dataType: "dataType",
		success: function (response) {
				const {result} = JSON.parse(response);

				console.log(result);
				// Render total orders by weeks here
				var options = {
					series: [
					{
						name: 'Revenue',
						data: result
					},
				],
					chart: {
						foreColor: '#9ba7b2',
						type: 'bar',
						height: 360
					},
					plotOptions: {
						bar: {
							horizontal: false,
							columnWidth: '30%',
							endingShape: 'rounded'
						},
					},
					dataLabels: {
						enabled: false
					},
					stroke: {
						show: true,
						width: 1,
						colors: ['transparent']
					},
					title: {
						text: 'Thống kê theo tuần (52 tuần )',
						align: 'left',
						style: {
							fontSize: '10'
						}
					},
					colors: ["#6184ff", '#3461ff', '#c4d1ff'],
					xaxis: {
						categories: arrayNumberWeeksOfYear,
					},
					yaxis: {
						title: {
							text: '(VND)'
						}
					},
					fill: {
						opacity: 1
					},
					tooltip: {
						y: {
							formatter: function (val) {
								return val + " VND"
							}
						}
					}
				};
				var chart = new ApexCharts(document.querySelector("#totalOrderByWeeks"), options);
				chart.render();
		}	
	});
	}

	function drawReportDayOfMonthOfYear(month, year) {
		$.ajax({
			type: "POST",
			url: "./logic/revenue.php?act=alldaysofmonth",
			data: {
				month: month,
				year: year
			},
			success: function (response) {
					const {days, result} = JSON.parse(response);
					
					var options = {
						series: [
						// 	{
						// 	name: 'Net Profit',
						// 	data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
						// }, 
						{
							name: 'Revenue',
							data: result
						},
						//  {
						// 	name: 'Free Cash Flow',
						// 	data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
						// }
						],
						chart: {
							foreColor: '#9ba7b2',
							type: 'bar',
							height: 360
						},
						plotOptions: {
							bar: {
								horizontal: false,
								columnWidth: '30%',
								endingShape: 'rounded'
							},
						},
						dataLabels: {
							enabled: false
						},
						stroke: {
							show: true,
							width: 1,
							colors: ['transparent']
						},
						title: {
							text: 'Column Chart',
							align: 'left',
							style: {
								fontSize: '10'
							}
						},
						colors: ["#6184ff", '#3461ff', '#c4d1ff'],
						xaxis: {
							categories: days,
						},
						yaxis: {
							title: {
								text: '(VND)'
							}
						},
						fill: {
							opacity: 1
						},
						tooltip: {
							y: {
								formatter: function (val) {
									return val + " VND"
								}
							}
						}
					};
						// chart totalOrderByDays
					var chart = new ApexCharts(document.querySelector("#totalOrderByDays"), options);
					chart.render();
			}
		});
	}
	// drawReportWeekOfYears(2023);
	// drawReportDayOfMonthOfYear(3, 2023);
	
	// chart 5
	var options = {
		series: [{
			data: [400, 430, 448, 470, 540, 580, 690, 610, 800, 980]
		}],
		chart: {
			foreColor: '#9ba7b2',
			type: 'bar',
			height: 350
		},
		colors: ["#f83030"],
		plotOptions: {
			bar: {
				horizontal: true,
				columnWidth: '35%',
				endingShape: 'rounded'
			}
		},
		dataLabels: {
			enabled: false
		},
		xaxis: {
			categories: ['South Korea', 'Canada', 'United Kingdom', 'Netherlands', 'Italy', 'France', 'Japan', 'United States', 'China', 'Germany'],
		}
	};
	var chart = new ApexCharts(document.querySelector("#chart5"), options);
	chart.render();
	
	
	// chart 6
	var options = {
		series: [{
			name: 'Website Blog',
			type: 'column',
			data: [440, 505, 414, 671, 227, 413, 201, 352, 752, 320, 257, 160]
		}, {
			name: 'Social Media',
			type: 'line',
			data: [23, 42, 35, 27, 43, 22, 17, 31, 22, 22, 12, 16]
		}],
		chart: {
			foreColor: '#9ba7b2',
			height: 350,
			type: 'line',
			zoom: {
				enabled: false
			},
			toolbar: {
				show: true
			},
		},
		stroke: {
			width: [0, 4]
		},
		plotOptions: {
			bar: {
				//horizontal: true,
				columnWidth: '35%',
				endingShape: 'rounded'
			}
		},
		colors: ["#0d6efd", "#212529"],
		title: {
			text: 'Traffic Sources'
		},
		dataLabels: {
			enabled: true,
			enabledOnSeries: [1]
		},
		labels: ['01 Jan 2001', '02 Jan 2001', '03 Jan 2001', '04 Jan 2001', '05 Jan 2001', '06 Jan 2001', '07 Jan 2001', '08 Jan 2001', '09 Jan 2001', '10 Jan 2001', '11 Jan 2001', '12 Jan 2001'],
		xaxis: {
			type: 'datetime'
		},
		yaxis: [{
			title: {
				text: 'Website Blog',
			},
		}, {
			opposite: true,
			title: {
				text: 'Social Media'
			}
		}]
	};
	var chart = new ApexCharts(document.querySelector("#chart6"), options);
	chart.render();
	
	
	// chart 7
	var options = {
		series: [{
			name: 'TEAM A',
			type: 'column',
			data: [23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 30]
		}, {
			name: 'TEAM B',
			type: 'area',
			data: [44, 55, 41, 67, 22, 43, 21, 41, 56, 27, 43]
		}, {
			name: 'TEAM C',
			type: 'line',
			data: [30, 25, 36, 30, 45, 35, 64, 52, 59, 36, 39]
		}],
		chart: {
			foreColor: '#9ba7b2',
			height: 350,
			type: 'line',
			stacked: false,
			zoom: {
				enabled: false
			},
			toolbar: {
				show: true
			},
		},
		colors: ["#0d6efd", "#17a00e", "#f41127"],
		stroke: {
			width: [0, 2, 5],
			curve: 'smooth'
		},
		plotOptions: {
			bar: {
				columnWidth: '50%'
			}
		},
		fill: {
			opacity: [0.85, 0.25, 1],
			gradient: {
				inverseColors: false,
				shade: 'light',
				type: "vertical",
				opacityFrom: 0.85,
				opacityTo: 0.55,
				stops: [0, 100, 100, 100]
			}
		},
		labels: ['01/01/2003', '02/01/2003', '03/01/2003', '04/01/2003', '05/01/2003', '06/01/2003', '07/01/2003', '08/01/2003', '09/01/2003', '10/01/2003', '11/01/2003'],
		markers: {
			size: 0
		},
		xaxis: {
			type: 'datetime'
		},
		yaxis: {
			title: {
				text: 'Points',
			},
			min: 0
		},
		tooltip: {
			shared: true,
			intersect: false,
			y: {
				formatter: function (y) {
					if (typeof y !== "undefined") {
						return y.toFixed(0) + " points";
					}
					return y;
				}
			}
		}
	};
	var chart = new ApexCharts(document.querySelector("#chart7"), options);
	chart.render();
	
	
	// chart 8
	var options = {
		series: [44, 55, 13, 43, 22],
		chart: {
			foreColor: '#9ba7b2',
			height: 330,
			type: 'pie',
		},
		colors: ["#0d6efd", "#6c757d", "#17a00e", "#f41127", "#ffc107"],
		labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
		responsive: [{
			breakpoint: 480,
			options: {
				chart: {
					height: 360
				},
				legend: {
					position: 'bottom'
				}
			}
		}]
	};
	var chart = new ApexCharts(document.querySelector("#chart8"), options);
	chart.render();

	// chart productsByCatePieChart

	$.ajax({
		type: "GET",
		url: "./logic/category.php?act=productsbycate",
		// data: "data",
		// dataType: "dataType",
		success: function (response) {
			const reportProduct = JSON.parse(response);
			// console.log('report: ', reportProduct);
			const cateNames = reportProduct.map((report) => report['ten_danhmuc']);
			const numberProductsOfCate = reportProduct.map((report) => +report['sl_sp']);
			// console.log('list', cateNames, numberProductsOfCate);
			var options = {
				series: numberProductsOfCate,
				chart: {
					foreColor: '#9ba7b2',
					height: 330,
					type: 'pie',
				},
				colors: ["#0d6efd", "#6c757d", "#17a00e", "#f41127", "#ffc107"],
				labels: cateNames,
				responsive: [{
					breakpoint: 480,
					options: {
						chart: {
							height: 360
						},
						legend: {
							position: 'bottom'
						}
					}
				}]
			};
			var chart = new ApexCharts(document.querySelector("#productsByCatePieChart"), options);
			chart.render();
		}
	});
	
	

	
});