<html>
    <head>
        <title>Interview Accepted</title>
    </head>
    <body>
        Dear <?php echo $data->entity['client']->first_name . ' ' . $data->entity['client']->last_name; ?>,<br /><br />
        The Interview has been accept from <?php echo $data->entity['contractor']->first_name . ' ' . $data->entity['contractor']->last_name; ?>.<br />
        Date: <?php echo $data->entity['interview']->date; ?>, Location: <?php echo $data->entity['interview']->location; ?>.<br /><br />
        
        Best Regards.<br />
        New Exchange.
    </body>
</html>