<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title></title>
  <link href="style.css" rel="stylesheet" />
</head>
<body>
    <form action="/print" method="get">
        @csrf
        <label for="letters">letters</label>
        <input type="text" id="letters" name="letters">
        <input type="submit" value="Submit">
    </form>
</body>
</html>