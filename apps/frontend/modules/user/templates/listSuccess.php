﻿<?php
// auto-generated by sfPropelCrud
// date: 2007/08/18 23:00:02
?>
<h1>user</h1>

<table>
<thead>
<tr>
  <th>Id</th>
  <th>Email</th>
  <th>Display name</th>
  <th>Authenticated</th>
  <th>Deleted</th>
  <th>Created at</th>
  <th>Updated at</th>
  <th>Newsletter subscribe</th>
  <th>Dob</th>
  <th>Gender</th>
  <th>Country</th>
  <th>Profile</th>
  <th>First name</th>
  <th>Last name</th>
  <th>Zip code</th>
  <th>State</th>
  <th>City</th>
  <th>Password hash</th>
  <th>Profile private</th>
  <th>Personal private</th>
  <th>Image</th>
</tr>
</thead>
<tbody>
<?php foreach ($users as $user): ?>
<tr>
    <td><?php echo link_to($user->getId(), 'user/show?id='.$user->getId()) ?></td>
      <td><?php echo $user->getEmail() ?></td>
      <td><?php echo $user->getDisplayName() ?></td>
      <td><?php echo $user->getAuthenticated() ?></td>
      <td><?php echo $user->getDeleted() ?></td>
      <td><?php echo $user->getCreatedAt() ?></td>
      <td><?php echo $user->getUpdatedAt() ?></td>
      <td><?php echo $user->getNewsletterSubscribe() ?></td>
      <td><?php echo $user->getDob() ?></td>
      <td><?php echo $user->getGender() ?></td>
      <td><?php echo $user->getCountry() ?></td>
      <td><?php echo $user->getProfile() ?></td>
      <td><?php echo $user->getFirstName() ?></td>
      <td><?php echo $user->getLastName() ?></td>
      <td><?php echo $user->getZipCode() ?></td>
      <td><?php echo $user->getState() ?></td>
      <td><?php echo $user->getCity() ?></td>
      <td><?php echo $user->getPasswordHash() ?></td>
      <td><?php echo $user->getProfilePrivate() ?></td>
      <td><?php echo $user->getPersonalPrivate() ?></td>
      <td><?php echo $user->getImageId() ?></td>
  </tr>
<?php endforeach; ?>
</tbody>
</table>

<?php echo link_to ('create', 'user/create') ?>
