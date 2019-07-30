@extends("layouts/layout")
@section("title", "Vastaa")
@section("content")
    <div class="columns is-centered">
        <div class="column is-half">
            <section id="assessment">
                <table class="table is-narrow">
                    <tbody>
                        <tr>
                            <th>Otsikko</th>
                            <td id="assessmentTitle"></td>
                        </tr>
                        <tr>
                            <th>Kysymys</th>
                            <td id="assessmentBody"></td>
                        </tr>
                        <tr>
                            <th>Esittäjä</th>
                            <td id="assessmentAuthor"></td>
                        </tr>
                    </tbody>
                </table>
            </section>
            <section id="assessmentForm">
                <div id="assessmentField" class="field"></div>
                <div class="field">
                    <label class="label">Arvosana</label>
                    <div class="control">
                        <div class="select">
                            <select>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Arvio</label>
                    <div class="control">
                        <textarea class="textarea" placeholder=""></textarea>
                    </div>
                </div>
            </section>
            <form id="responseForm" method="post" action="/responses">
                @csrf
            </form>
        </div>
    </div>

    @isset($assessments)
    <script defer>
        const assessments = JSON.parse('{!!json_encode($assessments)!!}');
        const assessmentForm = document.getElementById('assessmentForm');
        const assessmentField = document.getElementById('assessmentField');
        const assessmentTitle = document.getElementById('assessmentTitle');
        const assessmentBody = document.getElementById('assessmentBody');
        const assessmentAuthor = document.getElementById('assessmentAuthor');

        console.log(JSON.stringify(assessments, null, 2));

        createAssessmentSelect(assessments, assessmentField);

        // Create dynamic select for assessment
        function createAssessmentSelect(jsonArray, parentElement) {
            // Label

            let assessmentLabel = document.createElement("label");

            let assessmentLabelText = document.createTextNode('Kysely');
            assessmentLabel.appendChild(assessmentLabelText);

            parentElement.appendChild(assessmentLabel);

            // Control

            let assessmentControl = document.createElement('div');
            assessmentControl.classList.add('control');

            let assessmentSelectContainer = document.createElement("div");
            assessmentSelectContainer.classList.add('select', 'is-primary');

            assessmentControl.appendChild(assessmentSelectContainer);

            let assessmentSelect = document.createElement('select');
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
    </script>
    @endisset
@endsection
