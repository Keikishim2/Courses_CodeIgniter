<!DOCTYPE html>
<html lang='en'>
<head>
    <title>Courses</title>
    <link rel='stylesheet' type='text/css' href='/assets/css/course.css'/>
</head>
<body>

    <div class='container'>
        <form action='courses/add' method='post'>
            <img src='/assets/images/2.png' alt='icon'/>
            <h1>Add a New Course</h1>
    <?php if(!empty($error)) { ?>
            <p class='red'><?= $error; ?></p>
    <?php } ?>
            <div class='row'>
                <div class='first'>Name: </div>
                <div class='sec'>
                <input class='input' type='text' name='name' placeholder='Course'>
                </div>
            </div>
            <div class='row'>
                <div class='first'>Description:</div>
                <div class='sec'>
                <textarea class='input' name='description' placeholder='Description'></textarea>
                </div>
            </div>
            <div class='row'>
                <input class='button' type='submit' name='submit' value='Add Course'/>
            </div>
    </div>
        </form>
        <h1>Courses</h1>
        <table class='tb'>
            <thead>
                <th>Course Name</th>
                <th>Description</th>
                <th>Date Added</th>
                <th>Actions</th>
            </thead>
            <tbody>
<?php       foreach ($courses as $course) { ?>
                <tr>
                    <td class='one'><?= $course['name']; ?></td>
                    <td class='one'><?= $course['description']; ?></td>
                    <td class='one'><?= $course['date_created']; ?></td>
                    <td><a href="/courses/destroy/<?= $course['id']?>">Remove</a></td>
                </tr>
<?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>