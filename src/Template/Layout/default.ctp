<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('custom.css') ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"/>  
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <header>
        <div class="header-title">
            <span>
            <?php  
            	echo $this->Html->link(__("Penya quinialistica LC"), ['controller' => 'FootballDays', 'action' => 'today'])	;
            ?>
            </span>
                    <span><?php //$this->fetch('title') ?></span>
        </div>
        <div class="header-help">
            <?php echo $this->Html->image('logoQuinielaGrande.png', array('alt' => 'CakePHP'));?>
            <?php 
            	$userId = $this->request->session()->read('Auth.User.id');
            	if ($userId != null) {
            		echo '<span>'.$this->Html->link(__($this->request->session()->read('Auth.User.name')), 
            				['controller' => 'Users','action' => 'view', $userId]).'</span>';
            		echo '<span>'.$this->Html->link(__('Sortir'), ['controller' => 'Users', 'action' => 'logout']).'</span>';
            	} else {
            		echo $this->Html->link(__('Entrar'), ['controller' => 'Users', 'action' => 'login']);
            	}
            ?>
            
        </div>
    </header>
    <div id="container" class="column large-10 large-push-1 medium-10 medium-push-1 small-12">
            <?= $this->Flash->render() ?>

        <div id="content">

            <div class="row">
                <?= $this->fetch('content') ?>
            </div>
        </div>
        <footer>
        </footer>
    </div>
</body>
</html>
