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
        <canvas id="myChart" width="100" height="500"></canvas>
    </div>

    <div class="container">
        <ul id="assessmentList">

        </ul>
    </div>

    <div id="accordion">
        <h3>First header</h3>
        <div>First content panel</div>
        <h3>Second header</h3>
        <div>Second content panel</div>
    </div>

    <script defer>
        const myTable = document.getElementById('myTable');
        const context = document.getElementById('myChart').getContext('2d');
        const assessmentList = document.getElementById('assessmentList');

        //console.log("Responses: " + JSON.stringify(responses, null, 1));

        // Get the array of assessment ids from the json response
        let assessmentIds = responses.map(function(response) {
            return response.assessment_id;
        });

        // Get the unique set of assessment id's from the array of assessment ids.
        let uniqueAssessmentIds = Array.from(new Set(assessmentIds));

        // For each unique ids create a list element and append to the list
        uniqueAssessmentIds.forEach(function(element) {
            let found = responses.find(function(el) {
                return el.assessment_id === element;
            });

            let assessment = found.assessment;

            let listItem = document.createElement('LI');

            let text = "Otsikko: " + assessment.title + " Sisältö: " + assessment.body;

            let textNode = document.createTextNode(text);

            listItem.appendChild(textNode);

            assessmentList.appendChild(listItem);
        });

        const myChart = new Chart(context, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Numero',
                    data: []
                }]
            },
            options: {
                maintainAspectRatio: false,
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

        //Create the table
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
            let filteredResponses = responses.filter(response => {
                return response.assessment_id === assessmentId;
            });

            let datesGrades = filteredResponses.map(response => {
               return { 'date': response.created_at, 'grade': response.grade };
            });

            //Sort the dates and grades by the earliest date
            datesGrades.sort(function(a, b) {
               a = new Date(a.date);
               b = new Date(b.date);

               if(a < b)
               {
                   return -1;
               }
               else
               {
                   if(a > b)
                   {
                       return 1;
                   }
                   else
                   {
                       return 0;
                   }
               }

               //Ternary version
               //return a < b ? -1 : a > b ? 1 : 0;
            });

            let dates = datesGrades.map(function(dateGrade) {
                return dateGrade.date;
            });

            let grades = datesGrades.map(function(dateGrade) {
                return dateGrade.grade;
            });

            myChart.data.labels = dates;
            myChart.data.datasets[0].data = grades;

            myChart.update();
        }
    </script>

    <script defer>var accordions = bulmaAccordion.attach();</script>
@endsection
