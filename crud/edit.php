<?php
require_once("config.php");
$data = new Config();
$id = $_GET['id'];
$data->setId($id);

if(isset($_POST['edit'])){
    $data->setTitre($_POST['title']);
    $data->setPrix($_POST['price']);
    $data->setDescription($_POST['description']);

    echo $data->update();
    echo "<script>alert('data updated successfuly');document.location='alldata.php'</script>";
}
$record = $data->fetchOne();
$val=$record[0];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Formulaire dannonce</title>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto mt-8">
        <form class="max-w-md mx-auto bg-white p-8 rounded shadow-md" action="addposter.php" method="post">
            <div class="mb-6">
                <label for="title" class="block text-gray-600 text-sm font-semibold mb-2">Titre</label>
                <input type="text" id="title" name="title"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required
                    value="<?php echo $val['title'];?>">
                </div>
            <div class="mb-6">
                <label for="price" class="block text-gray-600 text-sm font-semibold mb-2">Prix</label>
                <input type="number" id="price" name="price"
                   class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required
                   value="<?php echo $val['price'];?>">
                </div>
            <div class="mb-6">
                <label for="description" class="block text-gray-600 text-sm font-semibold mb-2">Description</label>
                <textarea id="description" name="description"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" rows="4"
                    required><?php echo $val['description'];?></textarea>
                    
                </div>
            <div class="flex items-center justify-center">
                <button type="submit"
                 name="edit"   class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600"  value="UPDATE" name='edit'>Poster</button>
                 
            </div>
        </form>
    </div>

</body>

</html>