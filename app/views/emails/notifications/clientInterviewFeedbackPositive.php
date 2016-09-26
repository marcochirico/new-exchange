<html>
    <head>
        <title>Feedback Positive</title>
    </head>
    <body>
        Dear <?php echo $data->entity['contractor']->first_name . ' ' . $data->entity['contractor']->last_name; ?>,<br />
        <?php echo $data->entity['client']->first_name . ' ' . $data->entity['client']->last_name; ?> of <?php echo $data->entity['client']->company_name; ?> returned a positive feedback on your interview!<br /><br />
        Please login as soon as possible and confirm your acceptance to start the project.<br /><br />
        Best regards,<br /><br />
        New Exchange Contractors Team
    </body>
</html>