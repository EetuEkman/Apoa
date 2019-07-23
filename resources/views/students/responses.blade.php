@extends('layouts/layout')
@section('title', 'Omat opiskelijat')
@section("content")
    <div class="columns is-centered is-vcentered">
        <div class="column is-half">
            <h2>{{$user->first_name." ".$user->last_name}}</h2>

            <div id="responseList">
                <responses ></responses>
            </div>
            
            <table class="table is-bordered is-narrow">
                <thead></thead>
                <tbody>
                    @foreach($responses as $response)
                    <tr>
                        <td>Otsikko</td>
                        <td>Sisältö</td>
                    </tr>
                    <tr>
                        <td>{{$response->assessment->title}}</td>
                        <td>{{$response->assessment->body}}</td>
                    </tr>
                    <tr>
                        <table class="table is-bordered is-narrow">
                            <thead>
                                <tr>
                                    <th>Arvosana</th>
                                    <th>Arvio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$response->grade}}</td>
                                    <td>{{$response->body}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </tr>
                    <tr></tr>
                    @endforeach
                </tbody>
            </table>
    
            <script defer>
                // Goal here is to transform the json from the server
                // to more logical form for looping and displaying 

                // Get the array of all the assessment_ids in the responses

                var assessmentIds = responses.map(function(response) {
                    return response.assessment_id;
                });
                
                // Create an array from the set of assessment ids

                var uniqueAssessmentIds = Array.from(new Set(assessmentIds));

                // Create an array of assessment objects
                // loop through the assessment ids
                // pushing into the array
                // the first found assessment object with the matching assessment_id
                
                var assessments = [];

                uniqueAssessmentIds.forEach(function(uniqueAssessmentId) {
                    let response = responses.find(function(element) {
                        return element.assessment_id == uniqueAssessmentId;
                    });

                    assessments.push(response.assessment);
                });

                // Create an array of responses for each assessment
                // and append the responses for that assessment

                assessments.forEach(function(assessment) {
                    let assessmentResponses = responses.filter(function(response) {
                        return response.assessment_id == assessment.id;
                    });

                    assessment.responses = assessmentResponses;
                });

                // Delete the assessments from the responses to avoid circular structure

                assessments.map(function(assessment) {
                    assessment.responses.map(function(response) {
                        delete response.assessment;
                    });
                });

                console.log(JSON.stringify(assessments, null, 2));

                var wm = new Vue({
                    el: '#responseList',
                    data: {
                        assessments: assessments
                    },
                    methods: {

                    }
                });
            </script>
        </div>
    </div>
@endsection
