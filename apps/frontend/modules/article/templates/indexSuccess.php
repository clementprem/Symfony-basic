<h1>Articles List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Title</th>
      <th>Content</th>
      <th>Status</th>
      <th>Author</th>
      <th>Category</th>
      <th>Published at</th>
      <th>Slug</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($articles as $article): ?>
    <tr>
      <td><a href="<?php echo url_for('article/edit?id='.$article->getId()) ?>"><?php echo $article->getId() ?></a></td>
      <td><?php echo $article->getTitle() ?></td>
      <td><?php echo $article->getContent() ?></td>
      <td><?php echo $article->getStatus() ?></td>
      <td><?php echo $article->getAuthorId() ?></td>
      <td><?php echo $article->getCategoryId() ?></td>
      <td><?php echo $article->getPublishedAt() ?></td>
      <td><?php echo $article->getSlug() ?></td>
      <td><?php echo $article->getCreatedAt() ?></td>
      <td><?php echo $article->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('article/new') ?>">New</a>
