
const candidate = () => {
    $(document).ready(function () {
        $("#candidate-update-form").validate({
            rules: {
                name: {
                    required: true
                },
                designation: {
                    required: true
                },
                location: {
                    required: true
                },
                contact_number: {
                    required: true,
                    digits: true
                },
                professional_skill: {
                    required: true
                },
                software_skill: {
                    required: true
                },
                age: {
                    required: true,
                    digits: true
                },
                gender: {
                    required: true
                },
                experience: {
                    required: true,
                    digits: true
                },
                qualification: {
                    required: true
                },
                language: {
                    required: true
                },
                level: {
                    required: true
                },
                description: {
                    required: true
                },
                page: {
                    required: true
                },
                
            },
            messages: {
                name: "Please enter name.",
                designation: "Please enter the candidate's designation.",
                location: "Please enter the candidate's location.",
                contact_number: {
                    required: "Please enter the candidate's contact number.",
                    digits: "Please enter only digits for the contact number."
                },
                professional_skill: "Please enter the candidate's professional skill.",
                software_skill: "Please enter the candidate's software skill.",
                age: {
                    required: "Please enter the candidate's age.",
                    digits: "Please enter only digits for the age."
                },
                gender: "Please select the candidate's gender.",
                experience: {
                    required: "Please enter the candidate's experience.",
                    digits: "Please enter only digits for the experience."
                    
                },
                qualification: "Please select the candidate's qualification.",
                language: "Please select the candidate's language.",
                level: "Please select the candidate's level.",
                description: "Please select the description.",
                page: "Please select the candidate's page.",
            },
            errorPlacement: function (error, element) {

               
                if (element.hasClass("name")) {
                    error.appendTo(".nameError");
                }
                if(element.hasClass("designation")){
                    error.appendTo(".designationError");
                }
                if (element.hasClass("location")) {
                    error.appendTo(".locationError");

                }
                if (element.hasClass("contact_number")) {
                    error.appendTo(".contact_numberError");

                }
                if (element.hasClass("professional_skill")) {
                    error.appendTo(".professional_skillError");

                }
                if (element.hasClass("software_skill")) {
                    error.appendTo(".software_skillError");

                }
                if (element.hasClass("age")) {
                    error.appendTo(".ageError");

                }
                if (element.hasClass("gender")) {
                    error.appendTo(".genderError");

                }
                if (element.hasClass("user_profile")) {
                    error.appendTo(".user_profileError");

                }
                if (element.hasClass("experience")) {
                    error.appendTo(".experienceError");

                }
                if (element.hasClass("qualification")) {
                    error.appendTo(".qualificationError");

                }
                if (element.hasClass("language")) {
                    error.appendTo(".languageError");

                }
                if (element.hasClass("level")) {
                    error.appendTo(".levelError");

                }

                if (element.hasClass("description")) {
                    error.appendTo(".descriptionError");

                }

                if (element.hasClass("experience")) {
                    error.appendTo(".experienceError");

                }
                if (element.hasClass("page")) {
                    error.appendTo(".pageError");

                }
            }
        });
    });
}

export default candidate;