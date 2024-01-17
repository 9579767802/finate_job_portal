const editJobValidation = () => {
    $(document).ready(function () {
        $("#addJobs").validate({
            rules: {
                title: "required",
                job_type: "required",
                category: "required",
                posted_date: {
                    required: true,
                    date: true
                },
                application_end_date: {
                    required: true,
                    date: true
                },
                skills: "required",
                salary: {
                    required: true,
                    number: true
                },
                address: "required",
                experience: "required",
                gender: "required",
                qualification: "required",
                level: "required",
                description: "required",
            },
            messages: {
                title: "Please enter title.",
                job_type: "Please enter Job Type.",
                category: "Please enter category.",
                posted_date: "Please enter posted date.",
                application_end_date: "Please enter application end date.",
                skills: "Please enter skills.",
                salary: "Please enter salary.",
                address: "Please enter address.",
                experience: "Please enter experience.",
                gender: "Please enter gender.",
                qualification: "Please enter qualification.",
                level: "Please enter level.",
                description: "Please enter description.",
            },
            errorPlacement: function (error, element) {

                if (element.hasClass("title")) {
                    error.appendTo(".titleError");
                }
                if (element.hasClass("job_type")) {
                    error.appendTo(".job_typeError");
                }
                if (element.hasClass("category")) {
                    error.appendTo(".categoryError");
                }
                if (element.hasClass("posted_date")) {
                    error.appendTo(".posted_dateError");

                }
                if (element.hasClass("application_end_date")) {
                    error.appendTo(".application_end_dateError");

                }
                if (element.hasClass("salary")) {
                    error.appendTo(".salaryError");
                }
                if (element.hasClass("skills")) {
                    error.appendTo(".skillsError");

                }
                if (element.hasClass("address")) {
                    error.appendTo(".addressError");

                }
                if (element.hasClass("experience")) {
                    error.appendTo(".experienceError");

                }
                if (element.hasClass("gender")) {
                    error.appendTo(".genderError");

                }
                if (element.hasClass("qualification")) {
                    error.appendTo(".qualificationError");

                }
                if (element.hasClass("description")) {
                    error.appendTo(".descriptionError");

                }
                if (element.hasClass("level")) {
                    error.appendTo(".levelError");

                }

            }
        });
    });
};

export default editJobValidation;
