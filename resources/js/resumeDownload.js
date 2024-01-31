const resumeDownload = () => {
    $(document).ready(function () {
        // When the button is clicked
        $('#downloadResumeBtn').on('click', function () {
            // Get the candidate ID from a data attribute or another source
            var candidateId = $(this).closest('.team-details-btn').data('candidateId'); // Use the correct data attribute name
            // alert(candidateId);
            // Make an AJAX request to downloadResume route
            $.ajax({
                url: '/candidate/downloadResume' + '/' + candidateId,
                type: 'GET',
                data: {
                    id: candidateId
                },
                success: function (data) {
                    alert('Resume downloaded successfully');
                },
                error: function (xhr, status, error) {
                    console.error('Error downloading resume:', error);
                    // Handle the error, show a message, etc.
                }
            });
        });
    });
}
export default resumeDownload;
