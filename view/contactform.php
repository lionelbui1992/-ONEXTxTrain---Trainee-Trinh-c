<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/styles.css">
</head>
<body>
<div class="container">
    <h2>Contact Form</h2>
  <form action="../index.php">

    <label for="fname">Họ</label>
    <input type="text" id="fname" name="firstname" placeholder="Nhập họ" required>

    <label for="lname">Tên</label>
    <input type="text" id="lname" name="lastname" placeholder="Nhập tên" required>

    <label for="country">Quốc gia</label>
    <select id="country" name="country">
      <option value="australia">Việt Nam</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select>

    <label for="subject">Nội dung</label>
    <textarea id="subject" name="subject" placeholder="Viết nội dung" style="height:200px"></textarea>

    <input type="submit" value="Submit">

  </form>
</div>
</body>
</html>