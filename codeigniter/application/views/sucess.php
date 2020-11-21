<html>
<head>
<title>My Form</title>
</head>
<body>

<h2>Hello <?php echo $username; ?></h2>
<h3>Your form was successfully submitted!</h3>

<p><?php echo anchor('test/register', 'Back to register page'); ?></p>
<p><?php echo anchor('test/login', 'Go to login page'); ?></p>


</body>
</html>