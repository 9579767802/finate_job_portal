const employers = () => {
    $(document).ready(function () {
        $("#employers-update-form").validate({
            rules: {
                name: {
                    required: true,
                },
                categories: {
                    required: true,
                },
                location: {
                    required: true,
                },
                contact_number: {
                    required: true,
                    number: true
                },
                since: {
                    required: true,
                    number: true
                },
                team_members: {
                    required: true,
                    number: true
                },
                logo: {
                    extension: "jpg|jpeg|png",
                },
                email: {
                    required: true,
                    email: true
                },
                website: {
                    required: true
                },
                page: {
                    required: true
                }
            },
            messages: {
                name: "Please enter the employer's name.",
                categories: "Please enter categories",
                location: "Please enter a location",
                contact_number: {
                    required: "Please enter a contact number",
                    number: "Please enter a valid number"
                },
                since: {
                    required: "Please enter a since value",
                    number: "Please enter a valid number"
                },
                team_members: {
                    required: "Please enter the number of team members",
                    number: "Please enter a valid number"
                },
                logo: "Please upload an image",
                email: {
                    required: "Please enter a valid email address",
                    email: "Please enter a valid email address"
                },
                website: "Please enter a website",
                page: "Please add information",
            },
            errorPlacement: function (error, element) {
                if (element.hasClass("name")) {
                    error.appendTo(".nameError");
                } else if (element.hasClass("categories")) {
                    error.appendTo(".categoriesError");
                } else if (element.hasClass("location")) {
                    error.appendTo(".locationError");
                } else if (element.hasClass("contact_number")) {
                    error.appendTo(".contact_numberError");
                } else if (element.hasClass("since")) {
                    error.appendTo(".sinceError");
                } else if (element.hasClass("team_members")) {
                    error.appendTo(".team_membersError");
                } else if (element.hasClass("logo")) {
                    error.appendTo(".logoError");
                } else if (element.hasClass("email")) {
                    error.appendTo(".emailError");
                } else if (element.hasClass("website")) {
                    error.appendTo(".websiteError");
                } else if (element.hasClass("page")) {
                    error.appendTo(".pageError");
                } else {
                    error.insertAfter(element);
                }
            },
        });
    });
}

export default employers;
