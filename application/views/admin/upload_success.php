<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 2018-07-04
 * Time: 3:36 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>
<head>
<title>Upload Song</title>
</head>
<body>

<h3>Your song was successfully uploaded!</h3>

<ul>
<?php foreach ($upload_data as $item => $value):?>
    <li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>

<p><?php echo anchor('upload', 'Upload Another File!'); ?></p>

</body>
</html>