<html>
    <head>
        <title>Contact Us</title>
    </head>
    <body>
        Dear New Exchange, 
        you have received this private message from website:

        <?php echo $data->entity['first_name']; ?><br />
        <?php echo $data->entity['last_name']; ?><br />
        <?php echo $data->entity['email']; ?><br />
        <?php echo $data->entity['subject']; ?><br />
        <?php echo $data->entity['message']; ?>

    </body>
</html>

