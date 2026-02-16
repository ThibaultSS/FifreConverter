<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title></title>
  <link href="style.css" rel="stylesheet" />
</head>
<body>
    <form action="/pdf/" method="post" id="letterForm">
        @csrf
        <label for="letters">letters</label>
        <input type="text" name="letters[]" pattern="[A-Ga-g ]+"
            title="Only letters from A to G are allowed" required>
        <input type="submit" value="Submit">
    </form>
    <button id="addInput" onclick="addLine()" >New Line</button>
</body>

<script>
   function addLine() {
      const input = document.createElement('input');
      input.type = 'text';
      input.name = 'letters[]';
      input.pattern = '[A-Ga-g ]+';
      input.title = 'Only letters from A to G are allowed';
      input.required = true;
      document.getElementById('letterForm').appendChild(input);
   }
</script>
</html>
