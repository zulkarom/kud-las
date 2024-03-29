<?php 

use yii\helpers\Url;
use common\widgets\MenuAdminLte;

$me = Yii::$app->user->identity->id;
$user = Yii::$app->user;

$items[] = ['label' => 'Dashboard', 'level' => 1, 'url' => ['/site/index'], 'icon' => 'fas fa-tachometer-alt', 'children' => []];

$items[] = ['label' => 'Pendaftaran', 'level' => 1, 'url' => ['/competition/index'], 'icon' => 'fas fa-edit', 'children' => []];

$items[] = ['label' => 'Pencapaian', 'level' => 1, 'url' => ['/competition/achievement'], 'icon' => 'fas fa-certificate', 'children' => []];

$items[] = ['label' => 'Vest Data', 'level' => 1, 'url' => ['/vest/index'], 'icon' => 'fas fa-tshirt', 'children' => []];


$items[] = ['label' => 'Kategori', 'level' => 1, 'url' => ['/category/index'], 'icon' => 'fas fa-cube', 'children' => []];

$items[] = ['label' => 'Riders Data', 'level' => 1, 'url' => ['/rider/index'], 'icon' => 'fas fa-users', 'children' => []];

$items[] = ['label' => 'Horse Data', 'level' => 1, 'url' => ['/horse/index'], 'icon' => 'fas fa-horse', 'children' => []];

$items[] = ['label' => 'Kejohanan', 'level' => 1, 'url' => ['/kejohanan/index'], 'icon' => 'fas fa-trophy', 'children' => []];

$items[] = ['label' => 'User Management', 'level' => 2, 'url' => ['/admin/user/index'], 'icon' => 'fas fa-users', 'visible' => Yii::$app->user->can('manage-user') ,'children' => [
    ['label' => 'Assignment', 'level' => 1, 'url' => ['/admin/assignment/index'], 'icon' => 'far fa-circle'],
    ['label' => 'Role List', 'icon' => 'far fa-circle', 'url' => ['/admin/role/index'],],
							
    ['label' => 'Route List', 'icon' => 'far fa-circle', 'url' => ['/admin/route/index'],],
    
    ['label' => 'Login As', 'icon' => 'far fa-circle', 'url' => ['/admin/loginas/index'],],
]];

$items[] = ['label' => 'Change Password', 'level' => 1, 'url' => ['/site/change-password'], 'icon' => 'fas fa-unlock-alt', 'children' => []];

$items[] = ['label' => 'Logout', 'level' => 1, 'url' => ['/site/logout'], ['data-method' => 'post'], 'icon' => 'fa fa-sign-out', 'children' => []];


?> 
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                

    <?=MenuAdminLte::widget($items)?>
            

        <!-- ['label' => 'All Candidate', 'level' => 1, 'url' => ['/candidate/index'], 'icon' => 'fas fa-users', 'children' => []],
            
        ['label' => 'EXAMPLES', 'level' => 0],
            
        ['label' => 'Example', 'level' => 2 , 'icon' => 'fas fa-th', 'children' => [
            ['label' => 'Example 1', 'url' => ['/account/invoice'], 'icon' => 'far fa-circle'],
            ['label' => 'Example 2', 'url' => ['/account/receipt'], 'icon' => 'far fa-circle'],
                
        ]], -->
    
    

                    
                    
                    
<br /><br /><br /><br /><br /><br />
                                  
    </ul>
</nav>