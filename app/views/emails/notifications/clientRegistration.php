<html>
    <head>
        <title>Client Registration</title>
    </head>
    <body>
        Dear <?php echo $data->entity->first_name . ' ' . $data->entity->last_name; ?> (<?php echo $data->entity->company_name; ?>),<br /><br />

        Thank you for registering at the New Exchange, where you will find a monitored and transparent marketplace to find the professionals you need.<br /><br />

        We are looking forward to see you closing your first successful search and please remember that you can always email your questions at: <a href="mailto:customers@new-exchange.com">customers@new-exchange.com</a><br />
        <br />
        Best Regards,<br /><br />

        The Customers Management Team
    </body>
</html>

