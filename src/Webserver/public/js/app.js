;(function() {
    'use strict';
    
    window.db = window.db || {};

    window.db.Valgomat = (function($){

        var user = {
            guessedMunicipality: undefined,
            municipality: undefined,
            gender: undefined,
            age: undefined
        }

        var demographicQuestionElements = {
            gender: $('.demographic.genders'),
            municipality: $('.demographic.municipality') 
        }

        var politicalQuestionElements = {
            first: $('.political.question')
        }

        var sliderImg = '/public/img/slider.png';
        var sliderElement = document.getElementById('slider');
        var slider = new SmileySlider(sliderElement, sliderImg)

        function startGuessingMunicipality () {
            var jqxhr = $.get('/geolocate', function() {
            }).done(function(response) {
                user.guessedMunicipality = response.municipality;
            }).fail(function() {
                alert('Ohoh');
            })
        }

        function askForGender () {
            demographicQuestionElements.gender.show();

            var genderButtons = $('.gender.male, .gender.female');

            function answer (event) {
                user.gender = $(this).attr('value');
                demographicQuestionElements.gender.fadeOut(function () {
                    nextQuestion();
                });
            } 

            genderButtons.click(answer);
        };

        function firstDummyQuestion() {
            politicalQuestionElements.first.fadeIn(); 
            slider.position(1/2);
        }

        function askForMunicipality() {
            demographicQuestionElements.municipality.fadeIn();

            var agree = $('.municipality .agree');
            var disagree = $('.municipality .disagree');

            if (user.guessedMunicipality !== undefined) {
                $('#municipality').text(user.guessedMunicipality.name + ' kommune');
            }

            agree.click(function (event) {
                user.municipality = user.guessedMunicipality;
                demographicQuestionElements.municipality.fadeOut(function () {
                    nextQuestion();
                });
            });
                
            disagree.click(function (event) {
                alert('Her ville jeg implementert en lignende løsning som dere.');
                demographicQuestionElements.municipality.fadeOut(function () {
                    nextQuestion();
                });
            });
        }

        var questions = [
            askForGender,
            askForMunicipality,
            firstDummyQuestion
        ];

        function nextQuestion () {
            var nextQuestion = questions.shift();    
            nextQuestion();
        }

        function init () {
            startGuessingMunicipality();
            nextQuestion();
        };

        function destroy () {

        };

        return {
            init: init,
            reflow: init,
            destroy: destroy
        };

    })(jQuery);
})();

$(document).ready(function() {
    window.db.Valgomat.init();
});
