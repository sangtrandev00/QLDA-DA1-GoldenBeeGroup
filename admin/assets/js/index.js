$(function() {
	"use strict";
	
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
			// dataType: "dataType",
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

function drawReportSaleByMonths(year) {

	$.ajax({
		type: "POST",
		url: "./logic/revenue.php?act=allmonth",
		data: {
			year: year
		},
		// dataType: "dataType",
		success: function (response) {
			const {result} = JSON.parse(response);
			const revenueList = result
	
			console.log('rev: ', revenueList);
			
			for(const [key,value] in revenueList) {
	
			}
			
			var options = {
		
				series: [{
					name: "Revenue",	
					data: [revenueList['jan'], revenueList['feb'], revenueList['mar'], revenueList['apr'], revenueList['may'], revenueList['jun'], revenueList['july'], revenueList['aug'], revenueList['sep'], revenueList['oct'],revenueList['nov'],revenueList['dec']]
				}],
				chart: {
					 type: "area",
				   // width: 130,
					stacked: true,
					height: 280,
					toolbar: {
						show: !1
					},
					zoom: {
						enabled: !1
					},
					dropShadow: {
						enabled: 0,
						top: 3,
						left: 14,
						blur: 4,
						opacity: .12,
						color: "#3461ff"
					},
					sparkline: {
						enabled: !1
					}
				},
				markers: {
					size: 0,
					colors: ["#3461ff"],
					strokeColors: "#fff",
					strokeWidth: 2,
					hover: {
						size: 7
					}
				},
				grid: {
					row: {
						colors: ["transparent", "transparent"],
						opacity: .2
					},
					borderColor: "#f1f1f1"
				},
				plotOptions: {
					bar: {
						horizontal: !1,
						columnWidth: "25%",
						//endingShape: "rounded"
					}
				},
				dataLabels: {
					enabled: !1
				},
				stroke: {
					show: !0,
					width: [2.5],
					//colors: ["#3461ff"],
					curve: "smooth"
				},
				fill: {
					type: 'gradient',
					gradient: {
					  shade: 'light',
					  type: 'vertical',
					  shadeIntensity: 0.5,
					  gradientToColors: ['#3461ff'],
					  inverseColors: false,
					  opacityFrom: 0.5,
					  opacityTo: 0.1,
					 // stops: [0, 100]
					}
				},
				colors: ["#3461ff"],
				xaxis: {
					categories: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"]
				},
				grid:{
					show: true,
					borderColor: 'rgba(66, 59, 116, 0.15)',
				},
				responsive: [
					{
					  breakpoint: 1000,
					  options: {
						chart: {
							type: "area",
						   // width: 130,
							stacked: true,
						}
					  }
					}
				  ],
				legend: {
					show: false
				  },
				tooltip: {
					theme: "dark"        
				}
			  };
			
			  var chart = new ApexCharts(document.querySelector("#reportSaleByMonths"), options);
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


// Change year event select
function changeYearSaleReport() {
	const years = document.querySelectorAll(".change-year-sale-report");

	console.log(years);
	let currentSelectedYear = "";

	const currentYears = document.querySelectorAll(".report-year-selected");
	console.log(currentYears);
	if(!currentYears) return;
	if(!years) return;
	[...years].forEach((yearElement) => {
		yearElement.addEventListener("click", (e) => {
			e.preventDefault();
			console.log(e.currentTarget.dataset.year);
			currentSelectedYear = +e.currentTarget.dataset.year;
						
			const url = new URL(location.href);
			url.searchParams.set("year", currentSelectedYear);
			// location.reload();
			history.pushState({}, "", url);
			location.reload();
			

			[...currentYears].forEach((yearElement) => {
				yearElement.textContent = currentSelectedYear;
			})

		})
	})

}

function changeMonthSaleReport() {
	const months = document.querySelectorAll(".change-month-sale-selected");
	// console.log(months);
	const currentMonths = document.querySelectorAll(".report-month-selected");
	if(!months) return;
	// console.log(currentMonths);

	for (const month of months) {
		month.addEventListener("click", (e) => {
			e.preventDefault();
			const url = new URL(location.href);
			const currentSelectedMonth = e.currentTarget.dataset.month;
			
			[...currentMonths].forEach((month) => {
				month.textContent = currentSelectedMonth;
			})

			// currentMonths.textContent = currentSelectedMonth;
			url.searchParams.set("month", currentSelectedMonth);
			// location.reload();
			history.pushState({}, "", url);
			location.reload();
		})
	}
}

changeMonthSaleReport();
changeYearSaleReport();


// worl map

jQuery('#geographic-map').vectorMap(
	{
		map: 'world_mill_en',
		backgroundColor: 'transparent',
		borderColor: '#818181',
		borderOpacity: 0.25,
		borderWidth: 1,
		zoomOnScroll: false,
		color: '#009efb',
		regionStyle : {
			initial : {
			  fill : '#3461ff'
			}
		  },
		markerStyle: {
		  initial: {
					r: 9,
					'fill': '#fff',
					'fill-opacity':1,
					'stroke': '#000',
					'stroke-width' : 5,
					'stroke-opacity': 0.4
					},
					},
		enableZoom: true,
		hoverColor: '#009efb',
		markers : [{
			latLng : [21.00, 78.00],
			name : 'Lorem Ipsum Dollar'
		  
		  }],
		hoverOpacity: null,
		normalizeFunction: 'linear',
		scaleColors: ['#b6d6ff', '#005ace'],
		selectedColor: '#c9dfaf',
		selectedRegions: [],
		showTooltip: true,
	});
    

	const url = new URL(location.href);

    // console.log('url', url.searchParams.get('act'));

    // if(!url.searchParams.get('year')) {
	// 	url.searchParams.append("year", 2023);
	// 	history.pushState({}, "", url);
	// }
	// if(!url.searchParams.get('month')) {
	// 	url.searchParams.append("month",3);
	// 	history.pushState({}, "", url);
	// }

	const currentMonth = url.searchParams.get("month") || 3;
	const currentYear = url.searchParams.get("year") || 2023;

	console.log('log: ', currentMonth, currentYear);
	drawReportSaleByMonths(currentYear);
	drawReportWeekOfYears(currentYear);
	drawReportDayOfMonthOfYear(currentMonth, currentYear);
	$('.report-year-selected').text(currentYear);
	$('.report-month-selected').text(currentMonth);
        // switch (url.searchParams.get('year')) {
        //     case '2022':
		// 		drawReportSaleByMonths(2022);
		// 		drawReportWeekOfYears(2022);
		// 		drawReportDayOfMonthOfYear(currentMonth, 2022);
		// 		$('.report-year-selected').text(2022);
        //         break;
		// 	case '2023':
		// 		drawReportSaleByMonths(2023);
		// 		drawReportWeekOfYears(2023);
		// 		drawReportDayOfMonthOfYear(currentMonth, 2023);
		// 		$('.report-year-selected').text(2023);
		// 		break;
		// 	case '2024':
		// 		drawReportSaleByMonths(2024);
		// 		drawReportWeekOfYears(2024);
		// 		drawReportDayOfMonthOfYear(currentMonth, 2024);
		// 		$('.report-year-selected').text(2024);
		// 		break;
        //     default:

        //         break;
        // }


});
	
function scrollToReview(height) {
    document.getElementById('reviews-tab-btn').click();
    $("html, body").animate({ scrollTop: height }, "slow");
}
// Init Dashboard
document.addEventListener('DOMContentLoad', () => {
    const url = new URL(location.href);
    const currentYear = url.searchParams.get('year');

    console.log('mlem!!!')
    $(".report-year-selected").text(currentYear);
})