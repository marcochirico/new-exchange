<html>
    <head>
        <title>Interview Replaced</title>
    </head>
    <body>
        Dear <?php echo $data->entity['client']->first_name . ' ' . $data->entity['client']->last_name; ?><br /><br />
        the date of interview with <?php echo $data->entity['contractor']->first_name . ' ' . $data->entity['contractor']->last_name; ?> has been changed to Date: <?php echo $data->entity['interview']->date; ?><br /><br />
        Please login and confirm.<br /><br />
        New Exchange Staff.
    </body>
</html>