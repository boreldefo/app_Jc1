<?php
$currentUser=$currentUser??false;
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="public/css/style.css">


<script defer src="public/js/index.js"></script>

<?php if($currentUser): ?>

<script defer src="public/js/header.js"></script>


<?php endif ?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&family=Roboto&display=swap"
  rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script
  src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyAiWEtJPOIgOvLWbq-4ZTfonbfaGn1FvSg"
  defer>
</script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">