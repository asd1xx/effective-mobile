<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Users</title>
</head>
<body>
    <h1>Список пользователей</h1>

    <?php foreach ($users as $user): ?>
        <p>Имя: <?= htmlspecialchars($user['name']) ?></p>
        <p>Email: <?= htmlspecialchars($user['email']) ?></p>
    <?php endforeach ?>

</body>
</html>
