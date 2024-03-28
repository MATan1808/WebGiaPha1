<!DOCTYPE html>
<html>
    <head>
        <style>
         
        </style>
    </head>
<body>

<h2>A rectangle with rounded corners</h2>

<svg width="3000" height="165" xmlns="http://www.w3.org/2000/svg">
  <rect width="150" height="150" x="650" y="10" rx="20" ry="20" style="fill:white;stroke:black;stroke-width:5; " />
  <text x="725" y="80" text-anchor="middle" style="font-size: 20px; fill: blue; ">Trần Thánh Tông</text>
  <line x1="800" y1="100" x2="850" y2="100" style="stroke:black;stroke-width:5px; " />
  <text  x="90" y="70" style="font-size: 20px; fill: black; text-anchor: middle;"></text>
  <rect width="150" height="150" x="850" y="10" rx="20" ry="20"  style="fill:white;stroke:black;stroke-width:5; " />
  <!-- Đã sửa id="Text1" thành id="Text1" -->
  <text x="930" y="80" text-anchor="middle"  style="font-size: 20px;  ">Trần Thị Thiều  </text>

  <text x="800" y="100" id="plusSign" style="font-size: 30px; cursor: pointer;">+</text>
  <text x="800" y="100" id="starSign" style="font-size: 30px; display: none; cursor: pointer;">-</text>
  
    <line x1="820" y1="100" x2="820" y2="210" id="redLine" style="stroke:black;stroke-width:5px; display:none " />





</svg>
<svg width= "3000" height="1700" xmlns="http://www.w3.org/2000/svg" id="Text" style="display: none;">
 
  
   <line x1="820" y1="0" x2="820" y2="200" id="redLine"style="stroke:black;stroke-width:5px; " />
   <line x1="98" y1="200" x2="1502" y2="200" id="redLine" style="stroke:black;stroke-width:5px; " />


    <line x1="100" y1="300" x2="100" y2="200" id="redLine"style="stroke:black;stroke-width:5px; " />
    <rect width="150" height="150" x="20" y="300" rx="20" ry="20" id="redSquare" style="fill:white;stroke:black;  stroke-width:5; " />
  <text x="100" y="350" text-anchor="middle" id="Text1" style="font-size: 20px; fill: blue ;">Trần Khâm </text>
  <text x="100" y="370" text-anchor="middle" id="Text1" style="font-size: 20px; fill: blue ;">(con trai) </text>

  <line x1="170" y1="380" x2="220" y2="380" id="redLine"style="stroke:black;stroke-width:5px; " />
    <rect width="150" height="150" x="220" y="300" rx="20" ry="20" id="redSquare" style="fill:white;stroke:black;stroke-width:5; " />
  <text x="295" y="350" text-anchor="middle" id="Text1" style="font-size: 20px;  ;">Trần Chiêu</text>
  <text x="295" y="370" text-anchor="middle" id="Text1" style="font-size: 20px; ">(vợ) </text>

  <line x1="500" y1="300" x2="500" y2="200" id="redLine"style="stroke:black;stroke-width:5px; " />
    <rect width="150" height="150" x="420" y="300" rx="20" ry="20" id="redSquare" style="fill:white;stroke:black;stroke-width:5; " />
  <text x="500" y="350" text-anchor="middle" id="Text1" style="font-size: 20px; fill: blue; ;">Thiên Thụy</text>
  <text x="500" y="370" text-anchor="middle" id="Text1" style="font-size: 20px; fill: blue ;">(con gái) </text>
  <line x1="700" y1="300" x2="700" y2="200" id="redLine"style="stroke:black;stroke-width:5px; " />
    <rect width="150" height="150" x="620" y="300" rx="20" ry="20" id="redSquare" style="fill:white;stroke:black;stroke-width:5; " />
  <text x="700" y="350" text-anchor="middle" id="Text1" style="font-size: 20px; fill: blue; ;">Trần Đức Việp</text>
  <text x="700" y="370" text-anchor="middle" id="Text1" style="font-size: 20px; fill: blue ;">(con trai) </text>
  <line x1="820" y1="380" x2="770" y2="380" id="redLine"style="stroke:black;stroke-width:5px; " />
    <rect width="150" height="150" x="820" y="300" rx="20" ry="20" id="redSquare" style="fill:white;stroke:black;stroke-width:5; " />
  <text x="900" y="350" text-anchor="middle" id="Text1" style="font-size: 20px;  ;">Trần Thị Thiều</text>
  <text x="900" y="370" text-anchor="middle" id="Text1" style="font-size: 20px; ;">(vợ) </text>
  <line x1="1100" y1="300" x2="1100" y2="200" id="redLine"style="stroke:black;stroke-width:5px; " />
    <rect width="150" height="150" x="1020" y="300" rx="20" ry="20" id="redSquare" style="fill:white;stroke:black;stroke-width:5; " />
  <text x="1100" y="350" text-anchor="middle" id="Text1" style="font-size: 20px; fill: blue; ;">Bảo Châu</text>
  <text x="1100" y="370" text-anchor="middle" id="Text1" style="font-size: 20px; fill: blue ;">(con gái) </text>
  <line x1="1300" y1="300" x2="1300" y2="200" id="redLine"style="stroke:black;stroke-width:5px; " />
    <rect width="150" height="150" x="1220" y="300" rx="20" ry="20" id="redSquare" style="fill:white;stroke:black;stroke-width:5; " />
  <text x="1300" y="350" text-anchor="middle" id="Text1" style="font-size: 20px; fill: blue; ;">Chiêu Hoa</text>
  <text x="1300" y="370" text-anchor="middle" id="Text1" style="font-size: 20px; fill: blue ;">(con gái) </text>
  <line x1="1500" y1="300" x2="1500" y2="200" id="redLine"style="stroke:black;stroke-width:5px; " />
    <rect width="150" height="150" x="1420" y="300" rx="20" ry="20" id="redSquare" style="fill:white;stroke:black;stroke-width:5;" />
  <text x="1500" y="350" text-anchor="middle" id="Text1" style="font-size: 20px; fill: blue; ;">Chiêu Chinh</text>
  <text x="1500" y="370" text-anchor="middle" id="Text1" style="font-size: 20px; fill: blue ;">(con gái) </text>
</svg>
<script>
  // Lấy tham chiếu đến các phần tử HTML
  const redLine = document.getElementById("redLine");
  const redSquare = document.getElementById("redSquare");
  const plusSign = document.getElementById("plusSign");
  const starSign = document.getElementById("starSign");
  // Đã sửa id="Text1" thành id="Text1"
  const Text1 = document.getElementById("Text");

  // Bộ lắng nghe sự kiện cho dấu cộng
  plusSign.addEventListener("click", function() {
    redLine.style.display = "block";
    redSquare.style.display = "block";
    plusSign.style.display = "none";
    starSign.style.display = "block";
    // Hiển thị văn bản ở ô vuông thứ hai
    Text1.style.display = "block";
    // Đổi dấu cộng thành dấu trừ
    plusSign.style.display = "none";
    starSign.style.display = "block";
  });

  // Bộ lắng nghe sự kiện cho dấu trừ
  starSign.addEventListener("click", function() {
    redLine.style.display = "none";
    redSquare.style.display = "none";
    plusSign.style.display = "block";
    starSign.style.display = "none";
    // Ẩn văn bản ở ô vuông thứ hai
    Text1.style.display = "none";
    // Đổi dấu trừ thành dấu cộng
    plusSign.style.display = "block";
    starSign.style.display = "none";
  });
</script>
</body>
</html>
