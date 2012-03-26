<h1>Authors List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>First name</th>
      <th>Last name</th>
      <th>Email</th>
      <th>Active</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($authors as $author): ?>
    <tr>
      <td><a href="<?php echo url_for('author/edit?id='.$author->getId()) ?>"><?php echo $author->getId() ?></a></td>
      <td><?php echo $author->getFirstName() ?></td>
      <td><?php echo $author->getLastName() ?></td>
      <td><?php echo $author->getEmail() ?></td>
      <td><?php echo $author->getActive() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('author/new') ?>">New</a>
