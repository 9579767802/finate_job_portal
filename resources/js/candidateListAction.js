const candidateListAction = () => {
    $(document).ready(function () {
        $('#shortlistBtn').on('click', function () {
            var candidateDetailsId = $('.team-details-btn').data('candidate-id');

            $.ajax({
                type: 'POST',
                url: '/update-shortlist/' + candidateDetailsId,
                success: function (response) {
                    if (response.status === 'unshortlisted') {
                        alert('Candidate unshortlisted successfully');
                    } else if (response.status ==='shortlisted') {
                        alert('Candidate shortlisted successfully');
                    }
                },
                error: function (error) {
                    console.error('Error shortlisting candidate');
                }
            });
        });
    });
}

export default candidateListAction;

