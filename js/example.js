function sendEmail() {
    var id = '<?php echo $_POST['id']; ?>';
    var email = '<?php echo $_POST['customer_email']; ?>';
    var subject = 'KAUSHIK MANDAP SERVICES - Confirmation Receipt';
    var body = 'Dear ' + '<?php echo $_POST['customer_name']; ?>' + ',\n\nThank you for booking with KAUSHIK MANDAP SERVICES. Please find attached your Confirmation Receipt for the booking with ID ' + id + '.\n\nBest regards,\nKAUSHIK MANDAP SERVICES';

    // Send email
    window.location.href = 'mailto:' + email + '?subject=' + encodeURIComponent(subject) + '&body=' + encodeURIComponent(body);
}
