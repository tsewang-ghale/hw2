<h1>Awards</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th> ID </th>
        <th> Award Name </th>
        <th> Award Year </th>
        <th> Idol Group ID </th>
        <th> </th>
      </tr>
    </thead>
    <tbody> 
<?php
while ($award = $awards->fetch_assoc()) {
?>
  <tr>
    <td><?php echo $award['award_id']; ?> </td>
    <td><?php echo $award['award_name']; ?></td>
    <td><?php echo $award['award_year']; ?></td> 
    <td><?php echo $award['idol_group_id']; ?></td>
    <td><a href="award-details.php?id=<?php echo $award['award_id']; ?>">Details</a></td>
  </tr>
<?php
}
?>
    </tbody>
  </table>
</div>
