@extends("layouts/layout")
@section("title", "Vastaukset")
@section("content")
    <div class="container">
       <table id="myTable">
          <tr>
              <th>Otsikko</th>
              <th>Kysymys</th>
              <th>Arvio</th>
              <th>Vastaus</th>
              <th>Toiminto</th>
          </tr>
        </table>
    </div>

    <div class="container">
        <canvas id="myChart" width="100" height="100"></canvas>
    </div>

    <script defer>
        const myTable = document.getElementById('myTable');
        const rawResponses = JSON.parse('{!! json_encode($responses) !!}');
        const context = document.getElementById('myChart').getContext('2d');

        //Substring out the dates from the datetimes

        const responses = rawResponses.map(function(response) {
            response.created_at = response.created_at.substring(0, response.created_at.indexOf(' '));

            return response;
        })

        //ToDo: make the chart work

        const myChart = new Chart(context, {
            type: 'bar',
            data: {
                labels: [],
                datasets: [{
                    label: 'Päivämäärä',
                    data: []
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 5,
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        responses.forEach(function(element) {
            let row = myTable.insertRow();
            let title = row.insertCell(0);
            title.innerHTML = element.assessment.title;
            let assessmentBody = row.insertCell(1);
            assessmentBody.innerHTML = element.assessment.body;
            let grade = row.insertCell(2);
            grade.innerHTML = element.grade;
            let responseBody = row.insertCell(3);
            responseBody.innerHTML = element.body;
            let action = row.insertCell(4);
            var button = document.createElement('BUTTON');
            button.innerHTML = "Näytä";
            action.appendChild(button);
            button.onclick = function() {
                updateChart(element.assessment_id)
            };
        });

        function updateChart(assessmentId)
        {
            console.log("A button is pressed. assessmentId: " + assessmentId);

            let filteredResponses = responses.filter(response => {
                return response.assessment_id === assessmentId;
            });

            console.log("Filtered responses: " + JSON.stringify(filteredResponses));

            let labels = filteredResponses.map(function(element) {
                return element.created_at;
            });

            console.log("Labels: " + labels);

            let grades = filteredResponses.map(function(element) {
                return element.grade;
            });

            console.log("Grades: " + grades);

            myChart.data.labels = labels;
            myChart.data.datasets[0].data = grades;
        }
    </script>
@endsection
