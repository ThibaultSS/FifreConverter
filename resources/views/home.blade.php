<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title></title>
  <link href="style.css" rel="stylesheet" />
</head>
<body>
    <form action="/print/" method="post">
        @csrf
        <label for="letters">letters</label>
        <input type="text" id="letters" name="letters" pattern="[A-Ga-g ]+"
            title="Only letters from A to G are allowed" required>
        <input type="submit" value="Submit">
    </form>
</body>
</html>