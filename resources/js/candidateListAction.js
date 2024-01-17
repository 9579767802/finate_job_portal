const candidateListAction = () => {
    $(document).ready(function () {

        $('#shortlistBtn').on('click', function () {
            var candidateId = $('.team-details-btn').data('candidate-id');

            $.ajax({
                type: 'POST',
                url: '/update-shortlist/' + candidateId,
                success: function (response) {
                    console.log('Candidate shortlisted successfully');
                    toastr.success('Candidate shortlisted successfully');
                },
                error: function (error) {
                    console.error('Error shortlisting candidate');
                    toastr.error('Error shortlisting candidate');
                }
            });
        });


    });
}
export default candidateListAction;