<div class="sidebar" data-background-color="white" data-active-color="danger">
<!--
Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
-->

    <div class="sidebar-wrapper" >
    <?php
        $role_id = (isset($_SESSION['Auth']['User'])) ? $_SESSION['Auth']['User']['role_id']: 0;
        $is_superuser = (isset($_SESSION['Auth']['User'])) ? $_SESSION['Auth']['User']['is_superuser']: 0;

        if ($is_superuser){
            if (isset($role_id) != true) {
              $role_id = true;
            }
        }
        if($role_id ==! 0)
        {
        ?>
            <div class="logo text-center">
                <img style="max-height:37px;" src="<?php echo $this->request->webroot?>Paper/img/partidos/frentexqroo.jpg">
            </div>

         <?php
            if($is_superuser){
                echo $this->element('Paper.xmf/sidebar/superadmin');
            }else{
                switch($role_id)
                {
                    /*
                    5197c80d-2d30-4225-a757-b31592c9e0f0 | Monitoreo  |
                    80687266-6761-43a2-bd98-f42349a9bb63 | Captura    |
                    e687cb91-4cdf-4ab2-992f-e76584199c2e | Validacion |
                    */


                    case '80687266-6761-43a2-bd98-f42349a9bb63':
                        echo $this->element('Paper.xmf/sidebar/capturista');
                    break;

                    case 'e687cb91-4cdf-4ab2-992f-e76584199c2e':
                        echo $this->element('Paper.xmf/sidebar/representante_general');
                    break;
                }
            }
        }
        ?>
    </div>
</div>
