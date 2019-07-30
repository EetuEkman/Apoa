const section = document.getElementById('assessments');

// Goal here is to transform the json from the server
// to more logical form for looping and displaying

// Get the array of all the assessment_ids in the responses

var assessmentIds = responses.map(function (response) {
    return response.assessment_id;
});

// Create an array from the set of assessment ids

var uniqueAssessmentIds = Array.from(new Set(assessmentIds));

// Create an array of assessment objects
// loop through the assessment ids
// pushing into the array
// the first found assessment object with the matching assessment_id

var assessments = [];

uniqueAssessmentIds.forEach(function (uniqueAssessmentId) {
    let response = responses.find(function (element) {
        return element.assessment_id == uniqueAssessmentId;
    });

    assessments.push(response.assessment);
});

// Create an array of responses for each assessment
// and append the responses for that assessment

assessments.forEach(function (assessment) {
    let assessmentResponses = responses.filter(function (response) {
        return response.assessment_id == assessment.id;
    });

    assessment.responses = assessmentResponses;
});

// Delete the assessments from the responses to avoid circular structure

assessments.map(function (assessment) {
    assessment.responses.map(function (response) {
        delete response.assessment;
    });
});

// Options for chart

const options = {
    legend: {
        position: 'bottom',
        display: false
    },
    maintainAspectRatio: true,
    scales: {
        yAxes: [{
            ticks: {
                fontStyle: 'bold',
                max: 5,
                maxTicksLimit: 6,
                beginAtZero: true
            },
            gridLines: {
            }
        }],
        xAxes: [{
            ticks: {
                fontStyle: 'bold',
            },
            gridLines: {
            }
        }]
    },
    elements: {
        line: {
            tension: 0
        }
    }
};

assessmentsToCharts(assessments, section);

// Create tables with elements and chart for each assessment
function assessmentsToCharts(jsonArray, parentElement) {
    jsonArray.forEach(function(assessment) {
        let div = document.createElement("div");

        let assessmentTable = document.createElement('table');
        assessmentTable.classList.add('table', 'is-bordered');

        // Thead for assessment table

        let assessmentTableHead = document.createElement('thead');
        let assessmentTableHeadRow = document.createElement('tr');
        let assessmentTableHeadColumn = document.createElement('th');
        let assessmentTableHeadText = document.createTextNode('Arviointi');

        assessmentTableHeadColumn.appendChild(assessmentTableHeadText);
        assessmentTableHeadRow.appendChild(assessmentTableHeadColumn);
        assessmentTableHead.appendChild(assessmentTableHeadRow);
        assessmentTable.appendChild(assessmentTableHead);

        // Tbody for assessment table

        // Title of assessment

        let assessmentTableBody = document.createElement('tbody');
        let assessmentTitleRow = document.createElement('tr');
        let assessmentTitleColumn = document.createElement('td');
        let assessmentTitle = document.createTextNode(assessment.title);

        assessmentTitleColumn.appendChild(assessmentTitle);
        assessmentTitleRow.appendChild(assessmentTitleColumn);
        assessmentTableBody.appendChild(assessmentTitleRow);

        let assessmentBodyRow = document.createElement('tr');
        let assessmentBodyColumn = document.createElement('td');
        let assessmentBody = document.createTextNode(assessment.body);

        // Body of assessment

        assessmentBodyColumn.appendChild(assessmentBody);
        assessmentBodyRow.appendChild(assessmentBodyColumn);
        assessmentTableBody.appendChild(assessmentBodyRow);

        assessmentTable.appendChild(assessmentTableBody);
        div.appendChild(assessmentTable);

        // Chart for responses

        let responses = assessment.responses;

        let datesGrades = responses.map(function(response) {
            return {date: response.created_at, grade: response.grade};
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
        })

        let canvas = document.createElement("canvas");
        canvas.setAttribute('width', '200');
        canvas.setAttribute('height', '50');

        let context = canvas.getContext('2d');

        // Interesting color gradient for the line

        let gradientStroke = context.createLinearGradient(800, 0, 400, 0);
        gradientStroke.addColorStop(0, "#86318C");
        gradientStroke.addColorStop(1, "#F69DB1");

        let myChart = new Chart(context, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [
                    {
                        label: 'Arvosana',
                        data: grades,
                        borderColor: gradientStroke,
                        pointBorderColor: gradientStroke,
                        pointBackgroundColor: gradientStroke,
                        pointHoverBackgroundColor: gradientStroke,
                        pointHoverBorderColor: gradientStroke,
                        borderWidth: 4,
                        pointRadius: 5,
                        fill: false,
                    }
                ]
            },
            options: options
        });

        div.appendChild(canvas);

        // Table for responses

        let responseTable = document.createElement('table');
        responseTable.classList.add('table', 'is-bordered', 'is-striped', 'is-hoverable', 'is-narrow');

        // Thead for response table

        let responseTableHead = document.createElement('thead');
        let responseTableHeadRow = document.createElement('tr');
        let responseTableHeadColumn = document.createElement('th');
        let responseTableHeadText = document.createTextNode('Vastaukset');
        responseTableHeadColumn.colSpan = 3;

        responseTableHeadColumn.appendChild(responseTableHeadText);
        responseTableHeadRow.appendChild(responseTableHeadColumn);
        responseTableHead.appendChild(responseTableHeadRow);
        responseTable.appendChild(responseTableHead);

        // Tbody for response table

        let responseTableBody = document.createElement('tbody');

        responses.forEach((response) => {
            let responseTableBodyRow = document.createElement('tr');

            let responseTableBodyColumnDate = document.createElement('td');
            let responseTableBodyColumnGrade = document.createElement('td');
            let responseTableBodyColumnBody = document.createElement('td');

            let responseTableBodyColumnDateText = document.createTextNode(response.created_at);
            let responseTableBodyColumnGradeText = document.createTextNode(response.grade);
            let responseTableBodyColumnBodyText = document.createTextNode(response.body);

            responseTableBodyColumnDate.appendChild(responseTableBodyColumnDateText);
            responseTableBodyColumnGrade.appendChild(responseTableBodyColumnGradeText);
            responseTableBodyColumnBody.appendChild(responseTableBodyColumnBodyText);

            responseTableBodyRow.appendChild(responseTableBodyColumnDate);
            responseTableBodyRow.appendChild(responseTableBodyColumnGrade);
            responseTableBodyRow.appendChild(responseTableBodyColumnBody);

            responseTableBody.appendChild(responseTableBodyRow);
        });

        responseTable.appendChild(responseTableBody);

        div.appendChild(responseTable);

        parentElement.appendChild(div);

        let br = document.createElement("br");
        parentElement.appendChild(br);
    });
}
