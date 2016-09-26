<html>
    <head>
        <title>Interview Required</title>
    </head>
    <body>
        Dear <?php echo $data->entity['contractor']->first_name . ' ' . $data->entity['contractor']->last_name; ?>,<br /><br />

        You have been selected for an interview with of <?php echo $data->entity['interview']->reference; ?>.<br /><br />
        
        Time of the interview: <?php echo $data->entity['interview']->date; ?> in Call.<br /><br />

        Do you accept to take this interview?<br /><br />

        Is the proposed time OK with you or do you want to propose an alternative?<br />
        We wish you a successful interview!<br /><br />

        The Listed Contrators team of NEW EXCHANGE.
        
    </body>
</html>