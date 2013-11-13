<?php
require_once('connect_vars.php');
// Connect to the database
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Retrieve all business contacts 
// this query does also not use user input
$contact_info = 'SELECT contact_id, CONCAT(first_name," ",last_name) AS full_name, first_name, last_name, phone, email FROM business_contacts';
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
        <th>Edit Contact</th>
        <th>Delete Contact</th>
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
            <td><a href="contact_edit.php?id='.$row['contact_id'].'">Edit Contact</a></td>
            <td><a href="contact_delete.php?id='.$row['contact_id'].'">Delete Contact</a></td>
          </tr>';
}
echo'<tr>
        <td>Create a new <a href="contact_new.php>Contact</a></td>
    </tr>';
//finish off the table
echo '</tbody>
</table>';
?>
