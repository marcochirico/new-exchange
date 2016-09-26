<html>
    <head>
        <title>Profile Updated</title>
    </head>
    <body>
        Dear <?php echo $data->entity->first_name . ' ' . $data->entity->last_name; ?>,<br /><br />

        This is to confirm your recent New Exchange profile update on <?php echo date('m/d/Y H:i:s'); ?><br />
        If you haven't modified your profile, please contact us at contractors@new-exchange.com quoting your username or contractor ID.<br /><br />

        The New Exchange Team. 
    </body>
</html>

