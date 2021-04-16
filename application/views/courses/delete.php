<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Confirmation</title>
    <link rel="stylesheet" href="/user_guide/css/delete_style.css">
</head>
<body>
    <div class="container">
        <h1>Are you sure you want to delete the following course?</h1>
        <form action="/courses/deleted" method="post">
            <h2>Name: <span><?= $course['title'] ?></span></h2>
            <h2>Description: <span><?= $course['description'] ?></span></h2>
            <button type="submit" id="add_button" name="course_id" value="<?= $course['id'] ?>">Yes! I want to delete this.</button> 
        </form>
        <a href="/">No!</a>
    </div>
</body>
</html>
