// let htmlClasses1 = document.querySelector('html').classList;
//
// console.log(htmlClasses1.contains('dark'));
//
// if (htmlClasses1.contains('dark')) {
//     // htmlClasses.remove('dark');
//     console.log('dark = true');
//     toDark();
// } else {
//     // toDark();
//     // htmlClasses.add('dark');
//     console.log('dark = false');
// };
//
// function toDark()
// {
//     document.querySelectorAll('#chartContainer .apexcharts-yaxis-label')
//         .forEach(n => n.classList.add('dark-apexcharts-yaxis-label'));
//
//     document.querySelectorAll('.apexcharts-xaxis-texts-g .apexcharts-xaxis-label')
//         .forEach(n => n.classList.add('dark-apexcharts-xaxis-label'));
//
//     document.querySelectorAll('.apexcharts-legend-series .apexcharts-legend-text')
//         .forEach(n => n.classList.add('dark-apexcharts-legend-text'));
//
//     let container = document.getElementById('chartContainer')
//     let cont1 = container.getElementsByClassName('apexcharts-yaxis-title-text')
//     cont1[0].classList.add('dark-apexcharts-yaxis-title-text');
//     let cont2 = container.getElementsByClassName('apexcharts-title-text')
//     cont2[0].classList.add('dark-apexcharts-title-text');
//
//     let cont3 = container.getElementsByClassName('apexcharts-pie-area')
//     cont3[0].classList.add('dark-apexcharts-pie-area');
//
//     let cont4 = container.getElementsByClassName('apexcharts-series');
//     console.log(cont4[0]);
//     cont4[0].removeAttribute('SeriesName');
// }
