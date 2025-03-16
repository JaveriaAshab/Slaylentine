<?php 

include("../config.php"); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slaylentine</title>
    <link rel="shortcut icon" href="../images/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <?php include("./header.php") ?>
    
    <div class="proposal-bg">
        <a href="../index.php">Home</a> / <span>Suprise</span>
    </div>

    <div id="proposal-container">
  <p id="message"><span>I’ve been thinking... and I can't imagine my life without you.</span><br>Will you marry me?</p>
  <img id="ring-image" src="../images/ring_box.png" alt="Ring Box">
  <div>
    <button id="yes-btn" class="btn" onclick="handleYes()">Yes</button>
    <button id="no-btn" class="btn" onmouseover="handleNoHover()">No</button>
  </div>
</div>
    <!-- <div class="proposal-container">
    <p>Why am I proposing? Because you are the love of my life, and I can't imagine a future without you. Will you marry me?</p>
    <img id="ringImage" src="../images/ring_box.png" alt="Ring Box">
    <div>
        <button id="yesButton">Will you marry me?</button>
        <button id="noButton">No</button>
    </div>
    <p id="hoverMessage" class="hidden"></p>
</div> -->
    <!-- <div class="proposal-container">
    <p class="proposal-message">My dearest bestie, I have something important to ask you...</p>
    <img src="../images/ring_box.png" alt="Ring Box" class="proposal-img" id="proposal-img">
    <p class="proposal-message" id="proposal-question">Will you marry me?</p>
    <div class="button-container">
        <button class="yes-button" id="yes-button" onclick="acceptProposal()">Yes</button>
        <div class="no-wrapper">
        <button class="no-button" id="no-button">No</button>
    </div>
    </div>
</div> -->

    <?php include("./footer.php") ?>
    <script src="suprise.js"></script>
</body>

</html>