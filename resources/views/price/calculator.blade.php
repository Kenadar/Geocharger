{{-- <!doctype html>

<?php

/*class Calculator{

    public $num;
    public $persent;

    public function __construct($num, $persent){
        $this->num = $num;
        $this->persent = $persent;
        $this->calculator = $calculator;

    }
    public function addPersentage(){
            $persent = ($this->num * $this->persent) / 100;
            $add = $this->num + $persent;
        }
}*/

?>

<html>

<head>

<meta charset="utf-8">

<title>Price Calculator</title>

<style>
p {
  font-size: 12px;
}
.alert {
  color: red;
}
</style>
</head>

<body>


<h2>Price calculator</h2>
<br>
  <form action="calc.php" method="POST">
      <input type="text" name="num1Inserted">
      <input type="text" name="num2Inserted">
      <select name="calInserted">
        <option value="add">Add</option>
        <option value="sub">Subtract</option>
        <option value="mul">Multiply</option>
      </select>
      <button type="submit">Calculate</button>
  </form>


</body>

</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Percentage Calculator</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>
    <h1>Percentage Calculator</h1>

    <div>

        <h2> What is <input type="number" id="percent" />% of
            <input type="number" id="num" />?
        </h2>

        <input type="text" id="value1" readonly />

        <button onclick="percentage_1()">Calculate</button><br>
    </div>

   

    <script type="text/javascript" src="script.js"></script>
</body>

</html>

<script>
    function percentage_1() {
    
    var percent = document.getElementById("percent").value;
    
    var num = document.getElementById("num").value;
    document.getElementById("value1")
        .value = (num / 100) * percent;
    }
    
</script>