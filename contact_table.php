<?php
// Retrieve all business contacts 
// this query does also not use user input, $facility_id set from the from the database through previous parameterized query
$contact_info = 'SELECT * FROM business_contacts;';
$data = mysqli_query($dbc, $contact_info);
echo '<table id="contacts">';
//table headers
echo '<thead>
    <tr> 
        <th>Full Name</th>
        <th>First Name</th>             
        <th>Last Name</th> 
        <th>Phone</th>
        <th>Email</th>
      </tr>
</thead>
<tbody>';
//while there are contacts to display
while ($row = mysqli_fetch_array($data)){
    //display each contact in a table row
    echo '<tr>
            <td>'. $row['full_name'] .'</td>
            <td>'. $row['first_name'] .'</td>
            <td>'. $row['last_name'] .'</td>
            <td>'. $row['phone'] .'</td>
            <td>'. $row['email'] .'</td>
          </tr>';
}
//finish off the table
echo '</tbody>
</table>';
?>
