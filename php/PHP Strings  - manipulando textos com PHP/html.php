<?php

$nome = 'campo /> <script>alert("teste");</script>';
?>

<input
    type="text" 
    name="<?php echo htmlentities($nome);?>" 
/>