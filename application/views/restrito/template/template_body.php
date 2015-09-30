<?php
$side = $this->session->userdata('side') == null ? '' : $this->session->userdata('side');
?>
<body class="skin-blue sidebar-mini <?=$side?>">
    <div class="wrapper">
        <?php
        $this->load->view('restrito/template/body_header');
        $this->load->view('restrito/template/menu_lateral');
        $this->load->view('restrito/template/content');
        $this->load->view('restrito/template/body_footer');
        ?>
    </div>
</body>