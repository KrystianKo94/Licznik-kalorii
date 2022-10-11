$(function () {
	
	            $.ajax({
                url: 'services/caloriesChart.php', 
                type: 'GET', 
                dataType: 'html', 
                success: function(data) {
					var parser = new DOMParser();
					var xmlDoc = parser.parseFromString(data,"text/xml");
					var caloriesEaten= new Array();
					var caloriesMax = new Array();
					var date = new Array();
					for( var i =0; i<xmlDoc.getElementsByTagName("date").length;i++){
						caloriesEaten.push(xmlDoc.getElementsByTagName("calc")[i].childNodes[0].nodeValue);
						caloriesMax.push(xmlDoc.getElementsByTagName("calcBMI")[i].childNodes[0].nodeValue);
						date.push(xmlDoc.getElementsByTagName("date")[i].childNodes[0].nodeValue);
					}
					new Chart(document.getElementById("line_chart").getContext("2d"), getChartJs('line',caloriesEaten,caloriesMax,date));
                },
                error: function(e) {
                    console.log(e)
                }
            });
	
	
	
    
});

function getChartJs(type,calcEaten,calcMax,date) {
    var config = null;
        config = {
            type: 'line',
            data: {
                labels: date,
                datasets: [{
                    label: "Spożyte kalorie",
                    data: calcEaten,
                    borderColor: 'rgba(0, 188, 212, 0.75)',
                    backgroundColor: 'rgba(0, 188, 212, 0.3)',
                    pointBorderColor: 'rgba(0, 188, 212, 0)',
                    pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                    pointBorderWidth: 1
                }, {
                        label: "Maksymalna liczba kalorii do spożycia",
                        data: calcMax,
                        borderColor: 'rgba(233, 30, 99, 0.75)',
                        backgroundColor: 'rgba(233, 30, 99, 0.3)',
                        pointBorderColor: 'rgba(233, 30, 99, 0)',
                        pointBackgroundColor: 'rgba(233, 30, 99, 0.9)',
                        pointBorderWidth: 1
                    }]
            },
            options: {
                responsive: true,
                legend: false
            }
        }

	
    return config;
}




