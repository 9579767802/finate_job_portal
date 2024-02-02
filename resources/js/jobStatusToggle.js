const jobStatusToggle = () => {
    $(function () {
        $('body').on('change', '.job-status-toggle', function () {
            var checkbox = $(this);
            var newStatus = checkbox.prop('checked') ? 1 : 0;
            var jobId = checkbox.data('id');
            console.log(checkbox);
            // console.log(newStatus);
            console.log(jobId);

            $.ajax({
                url: '/toggle-status/' + jobId,
                type: 'POST',
                data: {
                    status: newStatus,
                },
                success: function (response) {
                    console.log(response);
                    if (response.success) {
                        console.log('Status updated successfully');
                    } else {
                        console.error('Error updating status:', response.message);
                    }
                },
                error: function (error) {
                    console.error('Error updating status:', error);
                }
            });
        });
    });
}
export default jobStatusToggle;
