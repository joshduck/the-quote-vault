﻿<?php
// auto-generated by sfPropelCrud
// date: 2007/08/18 22:59:45
?>
<?php use_helper('Object') ?>

<?php echo form_tag('category/update') ?>

<?php echo object_input_hidden_tag($category, 'getId') ?>

<table>
<tbody>
<tr>
  <th>Parent category:</th>
  <td><?php echo object_input_tag($category, 'getParentCategoryId', array (
  'size' => 7,
)) ?></td>
</tr>
<tr>
  <th>Name*:</th>
  <td><?php echo object_input_tag($category, 'getName', array (
  'size' => 80,
)) ?></td>
</tr>
<tr>
  <th>Slug*:</th>
  <td><?php echo object_input_tag($category, 'getSlug', array (
  'size' => 80,
)) ?></td>
</tr>
<tr>
  <th>Listed*:</th>
  <td><?php echo object_input_tag($category, 'getListed', array (
  'size' => 7,
)) ?></td>
</tr>
</tbody>
</table>
<hr />
<?php echo submit_tag('save') ?>
<?php if ($category->getId()): ?>
  &nbsp;<?php echo link_to('delete', 'category/delete?id='.$category->getId(), 'post=true&confirm=Are you sure?') ?>
  &nbsp;<?php echo link_to('cancel', 'category/show?id='.$category->getId()) ?>
<?php else: ?>
  &nbsp;<?php echo link_to('cancel', 'category/list') ?>
<?php endif; ?>
</form>