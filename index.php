<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        img {
            width: 98%;
            }

        .accordion {
            background-color: #eee;
            color: #444;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: center;
            font-weight: bold;
            outline: none;
            font-size: 30px;
            transition: 0.4s;
            }

        .accordion_update {
            background-color: blue;
            color: yellow;
            cursor: pointer;
            padding: 14px 18px;
            border: none;
            text-align: center;
            font-weight: bold;
            outline: none;
            font-size: 16px;
            transition: 0.4s;
            }

        .active, .accordion:hover {
            background-color: #ccc; 
            }

        .panel {
            padding: 0 18px;
            display: none;
            background-color: white;
            overflow: hidden;
            }

        .feed_channel {
            background-color:powderblue;
            text-align:center;
            font-weight: bold;
            font-size: 20px;
        }

        .feed_title {
            background-color:Khaki;
            font-weight: bold;
            font-size: 14px;
        }
    </style>
</head>

<?php
// INDEX FILE

//timezone and dates.
date_default_timezone_set("America/Sao_Paulo");
$day_journal=date("d/m/Y");
$today=date("d_m_Y", strtotime("-1 Days"));

//button to previous news.
if(array_key_exists('btn_prev', $_POST)) { 
    $select_prev = true;
}

//button to today news.
if(array_key_exists('btn_today', $_POST)) { 
    $select_today = true;
}

//button to medicine update.
if(array_key_exists('btn_update_medicine', $_POST)) { 
    //refresh to page index.php
    header("refresh: 0; url = cron/medicine.php");
}

//button to culture update.
if(array_key_exists('btn_update_culture', $_POST)) { 
    //refresh to page index.php
    header("refresh: 0; url = cron/culture.php");
}

//button to linux update.
if(array_key_exists('btn_update_linux', $_POST)) { 
    //refresh to page index.php
    header("refresh: 0; url = cron/linux.php");
}

//select news of previous day.
if ($select_prev == true) {
    $today=date("d_m_Y", strtotime("-2 Days"));
    $day_journal=date("d/m/Y", strtotime("-1 Days"));
}

//select news of a specific day.
if ($select_today == true) {
    $today=date("d_m_Y", strtotime("-1 Days"));  
}

//title journal and date today.
echo " <img src='tmp/roma01.png'>";
echo "<h1 style='font-size: 40px; font-weight: bold;'><center>" . $day_journal . "</center></h1>";

//path and name files temps.
$file_today_m="tmp/" . $today . "_medicine.html";
$file_today_c="tmp/" . $today . "_culture.html";
$file_today_l="tmp/" . $today . "_linux.html";

?>

<form method="post"> 
    <input type="submit" name="btn_prev"
            class="accordion_update" value="Prev News" /> 
    
    <input type="submit" name="btn_today"
            class="accordion_update" value="Today News" /> 
</form> 

<button class="accordion_update">Updates</button>
<div class="panel">
    <form method="post"> 
        <input type="submit" name="btn_update_medicine"
                class="accordion_update" value="Medicine update" />
        <br>
        <input type="submit" name="btn_update_culture"
                class="accordion_update" value="Culture update" />
        <br>
        <input type="submit" name="btn_update_linux"
                class="accordion_update" value="Linux update" />
    </form>
</div>


<button class="accordion">Medicine</button>
<div class="panel">

<?php
//read feeds medicine and print.
$filem = fopen($file_today_m,"r");
$rfilem = fread($filem,filesize($file_today_m));
echo $rfilem;
fclose($filem);
?>

</div>

<button class="accordion">Culture</button>
<div class="panel">

<?php
//read feeds culture and print.
$filec = fopen($file_today_c,"r");
$rfilec = fread($filec,filesize($file_today_c));
echo $rfilec;
fclose($filec);
?>

</div>

<button class="accordion">Linux</button>
<div class="panel">

<?php
//read feeds linux and print.
$filel = fopen($file_today_l,"r");
$rfilel = fread($filel,filesize($file_today_l));
echo $rfilel;
fclose($filel);
?>

</div>

<button class="accordion">Others</button>
<div class="panel">

<?php
//read loose links and print.
$file_links="tmp/00_looselinks.html";
$file = fopen($file_links,"r");
$rfile = fread($file,filesize($file_links));
echo $rfile;
fclose($file);
?>

</div>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}

var acc = document.getElementsByClassName("accordion_update");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>

</html>
