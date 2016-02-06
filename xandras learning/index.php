<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Cheetahs</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>

<h1>hello my name is xandra</h1>
<h2>hello my name is xandra</h2>
<h3>hello my name is xandra</h3>
<h4>hello my name is xandra</h4>
<h5>hello my name is xandra</h5>
<h6>hello my name is xandra</h6>

<p>i like animals</p>


<form action="send.php" method="post">
    <h1>Send Text Message:</h1>
    <select name="carrier" style="width: 130px" >
        <option selected="" value="1">Verizon Wireless</option>
        <option value="2">Alltel</option>
        <option value="3">Boost Mobile</option>
        <option value="4">Cingular</option>
        <option value="5">Nextel</option>
        <option value="6">Sprint</option>
        <option value="7">T-Mobile</option>
        <option value="8">Virgin Mobile</option>
        <option value="9">AT&T</option>
    </select><br><br><br>

    <label for="phone">Put in the phone you want to text:</label><br>
    <input type="text" id="phone" name="phone"><br><br>
    <label for="message">Put in your message</label><br>
    <textarea id="message" name="message"></textarea><br>
    <input type="submit" id="submit">
</form>

</body>
</html>