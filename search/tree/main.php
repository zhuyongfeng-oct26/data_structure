<?php

require_once 'Tree.php';
require_once 'TreeNode.php';

$tree = new Tree();
$tree->insert('1');
$tree->insert('2');
$tree->insert('3');
$tree->insert('4');
$tree->insert('5');
$tree->insert('6');
//$tree->preOrder($tree->head);
//$tree->inOrder($tree->head);
$tree->postOrder($tree->head);