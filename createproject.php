<?php 
    require_once 'utils/session.php';
    require_once 'db/functions.php'; 
    requireLogin();

    $skills = getAllSkills();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $title        = trim($_POST['title']);
        $description  = trim($_POST['description']);
        $github_link  = trim($_POST['github_link']);
        $project_link = trim($_POST['project_link']);
        $skills       = $_POST['skills'] ?? [];

        // IMAGE UPLOAD
        $imagePath = null;

        if (!empty($_FILES['image']['name'])) {
            $uploadDir = 'image/projects/';
            $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $fileName  = uniqid('project_') . '.' . $extension;

            $allowed = ['jpg', 'jpeg', 'png', 'webp'];

            if (in_array(strtolower($extension), $allowed)) {
                move_uploaded_file(
                    $_FILES['image']['tmp_name'],
                    $uploadDir . $fileName
                );
                $imagePath = $uploadDir . $fileName;
            }
        }

        $success = insertProject(
            $title,
            $description,
            $imagePath,
            $github_link,
            $project_link,
            $skills
        );

        header("Location: projects.php");
        exit();
    }
?>

    <?php require_once "includes/header.php"; ?>

    <section id="createproject" class="min-h-screen flex items-center justify-center py-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <!-- Alert -->
            <?php if(isset($success)): ?>
                <div class="mb-8 text-center">
                    <?php if ($success): ?>
                        <div class="alert bg-green-400">Le projet a bien été créé</div>
                    <?php else: ?>
                        <div class="alert bg-red-400">Une erreur est survenue</div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Créer un projet</h2>
                <div class="w-24 h-1 bg-indigo-500 mx-auto"></div>
            </div>

            <div class="max-w-xl mx-auto bg-gray-800 rounded-lg shadow-xl" data-aos="fade-up">
                <form action="" method="POST" enctype="multipart/form-data" class="p-10">
                    <div class="mb-8">
                        <label for="title" class="block text-gray-300 mb-2 text-base">Titre du projet</label>
                        <input type="text" name="title" id="title" placeholder="Ex: Mon application web" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded focus:outline-none focus:border-indigo-400" required>
                    </div>

                    <div class="mb-8">
                        <label for="description" class="block text-gray-300 mb-2 text-base">Description</label>
                        <textarea name="description" id="description" placeholder="Ex: Une application pour gérer les tâches" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded focus:outline-none focus:border-indigo-400" required></textarea>
                    </div>

                    <div class="mb-8">
                        <label for="projectImage" class="block text-gray-300 mb-2 text-base">Image</label>
                        <input type="file" id="projectImage" name="image" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded focus:outline-none focus:border-indigo-400" accept="image/jpg, image/jpeg, image/png">
                    </div>

                    <div class="mb-8">
                        <label class="block text-gray-300 mb-2 text-base">Compétences</label>

                        <div class="flex flex-wrap gap-3">
                            <?php foreach ($skills as $skill): ?>
                            <label class="relative cursor-pointer">
                                <input type="checkbox" name="skills[]" value="<?= (int)$skill['idskills'] ?>" class="peer sr-only">
                                <span class="inline-flex items-center px-4 py-2 rounded-full border border-gray-600 text-sm font-medium text-gray-300 transition-all duration-200 peer-checked:bg-indigo-600 peer-checked:border-indigo-600 peer-checked:text-white hover:border-indigo-400">
                                    <?= htmlspecialchars($skill['name']) ?>
                                </span>
                            </label>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="mb-8">
                        <label for="github_link" class="block text-gray-300 mb-2 text-base">Lien GitHub</label>
                        <input type="url" name="github_link" id="github_link" placeholder="https://github.com/..." class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded focus:outline-none focus:border-indigo-400" required>
                    </div>

                    <div class="mb-8">
                        <label for="project_link" class="block text-gray-300 mb-2 text-base">Lien du projet</label>
                        <input type="url" name="project_link" id="project_link" placeholder="https://example.com" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded focus:outline-none focus:border-indigo-400" required>
                    </div>

                    <div class="flex justify-center">
                        <button type="submit" class="px-10 py-3 bg-indigo-600 hover:bg-indigo-700 rounded-md font-medium transition">Créer le projet</button>
                    </div>
                </form>
            </div>     
        </div>
    </div>

    <script src="/script/script.js"></script>
    </body>
</html>