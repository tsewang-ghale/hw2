<?php
$pageTitle = "Korean Music and Idols";
include "view_header.php";
?>
<div style="text-align: center; margin: 20px;">
    <h1>Welcome to the World of K-Pop</h1>
    <p>Explore your favorite Korean songs and idols here!</p>
</div>
<div style="display: flex; justify-content: space-around; margin: 20px;">
    <div style="width: 45%; text-align: left;">
        <h2>Korean Songs</h2>
        <ul>
            <li><a href="song.php?song=Butter">Butter - BTS</a></li>
            <li><a href="song.php?song=Ice_Cream">Ice Cream - BLACKPINK feat. Selena Gomez</a></li>
            <li><a href="song.php?song=Kill_This_Love">Kill This Love - BLACKPINK</a></li>
            <li><a href="song.php?song=Dynamite">Dynamite - BTS</a></li>
            <li><a href="song.php?song=Any_Song">Any Song - ZICO</a></li>
        </ul>
    </div>
    <div style="width: 45%; text-align: left;">
        <h2>Korean Idols</h2>
        <ul>
            <li><a href="idol.php?idol=BTS">BTS</a></li>
            <li><a href="idol.php?idol=BLACKPINK">BLACKPINK</a></li>
            <li><a href="idol.php?idol=TWICE">TWICE</a></li>
            <li><a href="idol.php?idol=IU">IU</a></li>
            <li><a href="idol.php?idol=EXO">EXO</a></li>
        </ul>
    </div>
</div>
<div style="text-align: center; margin: 20px;">
    <h3>Want to add more?</h3>
    <p>
        <a href="add_song.php">Add a New Song</a> | 
        <a href="add_idol.php">Add a New Idol</a>
    </p>
</div>
<?php
include "view_footer.php";
?>

