<html>
    <head>
        <title>Feedback Negative</title>
    </head>
    <body>
        Dear <?php echo $data->entity['contractor']->first_name . ' ' . $data->entity['contractor']->last_name; ?>,<br />
        <?php echo $data->entity['client']->first_name . ' ' . $data->entity['client']->last_name; ?> of <?php echo $data->entity['client']->company_name; ?> unfortunately returned a negative feedback on your interview.<br /><br />
        We will keep your reference in our database for future opportunities.<br /><br />
        Best regards,<br /><br />
        New Exchange Contractors Team
    </body>
</html>