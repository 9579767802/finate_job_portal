const employerToggle = () => {
    $(function () {

        $('body').on('change', '.employer-status', function () {
            var checkbox = $(this);
            var newStatus = checkbox.prop('checked') ? 1 : 0;
            var employerId = checkbox.data('id');

            $.ajax({
                url: '/update-status/' + employerId,
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
export default employerToggle;
