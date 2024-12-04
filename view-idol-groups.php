<h1>Idol Groups</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th> ID </th>
        <th> Group Name </th>
        <th> Debut Date </th>
        <th> Members Count </th>
        <th> </th>
      </tr>
    </thead>
    <tbody> 
<?php
while ($idolGroup = $idolGroups->fetch_assoc()) {
?>
  <tr>
    <td><?php echo $idolGroup['group_id']; ?> </td>
    <td><?php echo $idolGroup['group_name']; ?></td>
    <td><?php echo $idolGroup['debut_year']; ?></td> 
    <td><?php echo $idolGroup['members_count']; ?></td>
    <td><a href="idol-group-details.php?id=<?php echo $idolGroup['group_id']; ?>">Details</a></td>
  </tr>
<?php
}
?>
    </tbody>
  </table>
</div>
