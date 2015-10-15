<!DOCTYPE html>

<html>
<head>
    <title>Case Manager App</title>
</head>

<body>

<h3>Hello <?php echo empty($ln)?$fn:$fn.' '.$ln?>,</h3>
<p>As you have required to respond to this mail as there is a legal case on your by our client.</p>
<p>Credentails for account login</p>
<p>UserName/Email: <?php echo $email?></p>
<p>Password: <?php echo $password?></p>
<p>Website: <u><?php echo base_url()."login"?></u></p>
<p>If You have any queries regarding this case feel free to ask about this.</p>
<p>Regards,</p>
<p>Case Manager App</p>
<h6>This is system generated mail, please do not reply to this mail.</h6>
</body>
</html>
