<h1>Companies</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th> ID </th>
        <th> Company Name </th>
        <th> Establishment Year </th>
        <th> Company CEO </th>
        <th> </th>
      </tr>
    </thead>
    <tbody> 
<?php
while ($company = $companies->fetch_assoc()) {
?>
  <tr>
    <td><?php echo $company['company_id']; ?> </td>
    <td><?php echo $company['company_name']; ?></td>
    <td><?php echo $company['establishment_year']; ?></td> 
    <td><?php echo $company['company_ceo']; ?></td>
    <td><a href="company-details.php?id=<?php echo $company['company_id']; ?>">Details</a></td>
  </tr>
<?php
}
?>
    </tbody>
  </table>
</div>
