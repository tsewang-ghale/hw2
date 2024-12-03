<h1>Songs</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th> ID </th>
        <th> Song Name </th>
        <th> Release Date </th>
        <th> Idol Group ID </th>
        <th> </th>
      </tr>
    </thead>
    <tbody> 
<?php
while ($song = $songs->fetch_assoc()) {
?>
  <tr>
    <td><?php echo $song['song_id']; ?> </td>
    <td><?php echo $song['song_name']; ?></td>
    <td><?php echo $song['release_date']; ?></td> 
    <td><?php echo $song['idol_group_id']; ?></td>
    <td><a href="song-details.php?id=<?php echo $song['song_id']; ?>">Details</a></td>
  </tr>
<?php
}
?>
    </tbody>
  </table>
</div>
