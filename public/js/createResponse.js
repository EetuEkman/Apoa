const assessmentField = document.getElementById('assessmentField');
const assessmentTitle = document.getElementById('assessmentTitle');
const assessmentBody = document.getElementById('assessmentBody');
const assessmentAuthor = document.getElementById('assessmentAuthor');

createAssessmentSelect(assessments, assessmentField);

// Create dynamic select for assessment
function createAssessmentSelect(jsonArray, parentElement) {
    // Label

    let assessmentLabel = document.createElement("label");
    assessmentLabel.classList.add('label');

    let assessmentLabelText = document.createTextNode('Arviointi');
    assessmentLabel.appendChild(assessmentLabelText);

    parentElement.appendChild(assessmentLabel);

    // Control

    let assessmentControl = document.createElement('div');
    assessmentControl.classList.add('control');

    let assessmentSelectContainer = document.createElement("div");
    assessmentSelectContainer.classList.add('select', 'is-primary');

    assessmentControl.appendChild(assessmentSelectContainer);

    let assessmentSelect = document.createElement('select');
    assessmentSelect.setAttribute('required', '');
    assessmentSelect.setAttribute('form', 'responseForm');
    assessmentSelect.setAttribute('name', 'assessment_id');
    assessmentSelect.setAttribute('autofocus', '');

    assessmentSelect.classList.add('select');
    assessmentSelect.addEventListener("change", function() {assessmentChanged(this)});

    // Assessment select empty default option

    let defaultOption = document.createElement('option');
    defaultOption.setAttribute('selected', '');
    defaultOption.setAttribute('disabled', '');
    defaultOption.setAttribute('hidden', '');

    let defaultOptionText = document.createTextNode('Valitse arviointi');
    defaultOption.appendChild(defaultOptionText);

    assessmentSelect.appendChild(defaultOption);

    // Dynamic options

    jsonArray.forEach(function(element) {
        let option = document.createElement("option");
        option.value = element.id;
        let optionText = document.createTextNode(element.title);
        option.appendChild(optionText);
        assessmentSelect.appendChild(option);
    });

    assessmentSelectContainer.appendChild(assessmentSelect);

    assessmentControl.appendChild(assessmentSelectContainer);

    parentElement.appendChild(assessmentControl);
}

function assessmentChanged(option) {
    let value = option.value;

    let selectedAssessment = assessments.filter(function(assessment) {
        return assessment.id == value;
    });

    assessmentTitle.innerHTML = selectedAssessment[0].title;

    assessmentBody.innerHTML = selectedAssessment[0].body;
    assessmentAuthor.innerHTML = selectedAssessment[0].user.first_name + " " + selectedAssessment[0].user.last_name;
};
