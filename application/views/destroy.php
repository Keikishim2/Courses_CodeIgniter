<!DOCTYPE html>
<html lang='en'>
<head>
    <title>Delete</title>
</head>
<body>

    <div class='container'>
        <h1>Are you sure you want to delete the following course?</h1>
        <div class='row'>
            <h4 class='sec'>Name: </h4>
            <h4 class='third'><?= $course['name'] ?></h4>
        </div>
        <div class='row'>
            <h4 class='sec'>Description: </h4>
            <h4 class='third'>
<?php       if(!empty($course['description'])){
                echo $course['description'];
            }else{
                echo '(No Description Available)';
            }?>
            </h4>
        </div>
        <form class='del' action="/courses/delete/<?= $course['id']; ?>">
            <input class='sub1' type='submit' name='no' value='Cancel'>
            <input class='sub2' type='submit' name='yes' value='Delete'>
        </form>
        </div>
</body>
</html>