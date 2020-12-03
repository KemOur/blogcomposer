<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <title><?=$this->e($title)?></title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
<header>
    <h1>Skateborderzz</h1>
</header>
<div class="container">
    <?php if(isset($_SESSION['alert']['content'])): ?>
        <?php foreach($_SESSION['alert']['content'] as $alert): ?>
            <div class="alert alert-<?= $_SESSION['alert']['success'] ? 'success' : 'danger' ?>"> <?= $alert ?></div>
        <?php endforeach; ?>
    <?php endif; ?>
    <?=$this->section('content')?>
</div>
</body>

</html>