<?php 
    require_once 'utils/session.php';
    require_once 'db/functions.php';
    if(isLoggedIn()){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // <!-- Cas où le formulaire (suppression) a été rempli et soumis -->
            $idProjectToDelete = $_POST["idProjectToDelete"];
            $success = deleteProject($idProjectToDelete);
        }
    }
?>

<?php include 'includes/header.php'; ?>

    <!-- Projects Section -->
    <section id="projects" class="min-h-screen flex items-center justify-center py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Mes Projects Web</h2>
                <div class="w-20 h-1 bg-indigo-500 mx-auto"></div>
            </div>

            <!-- Alert -->
            <?php if(isset($success)): ?>
                <div class="mb-8 text-center">
                    <?php if ($success): ?>
                        <div class="alert bg-green-400">Le projet a bien été supprimé</div>
                    <?php else: ?>
                        <div class="alert bg-red-400">Une erreur est survenue</div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                    $projects = getAllProjects(); 
                    $delay = 0;
                    $delayStep = 150;

                    foreach ($projects as $row) :
                ?>
                    <article 
                        class="project-card bg-gray-700 rounded-lg overflow-hidden shadow-lg transition duration-300"
                        data-aos="fade-up"
                        data-aos-delay="<?= $delay ?>"
                    >
                        <img src="<?php echoValue($row, 'image'); ?>" alt="<?php echoValue($row, 'title'); ?>" class="w-full h-48 object-cover">

                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2">
                                <?php echoValue($row, 'title'); ?>
                            </h3>

                            <p class="text-gray-300 mb-4">
                                <?php echoValue($row, 'description'); ?>
                            </p>

                            <div class="flex flex-wrap gap-2 mb-4">
                                <?php foreach($row['skills'] as $skill): ?>
                                    <div class="px-2 py-1 bg-gray-600 rounded text-xs">
                                        <?= $skill ?>
                                    </div>
                                <?php endforeach ?>
                            </div>

                            <div class="flex gap-4 mt-auto">
                                <a href="<?php echoValue($row, 'github_link'); ?>" class="group inline-flex items-center gap-2 px-4 py-2 rounded-full text-sm font-semibold bg-[#24292e] text-white border border-transparent transition-all duration-300 hover:-translate-y-0.5 hover:bg-black hover:shadow-lg" target="_blank">
                                    <i class="fab fa-github transition-transform duration-300 group-hover:rotate-12 group-hover:scale-110"></i> Github
                                </a>
                                <a href="<?php echoValue($row, 'project_link'); ?>" class="group inline-flex items-center gap-2 px-4 py-2 rounded-full text-sm font-semibold text-indigo-500 border border-indigo-500 transition-all duration-300 hover:-translate-y-0.5 hover:bg-indigo-500 hover:text-white hover:shadow-lg" target="_blank">
                                    <i class="fas fa-external-link-alt transition-transform duration-300 group-hover:rotate-12 group-hover:scale-110"></i> Voir
                                </a>

                                <?php if(isLoggedIn()):?>
                                    <form action="" method="POST" onsubmit="return confirm('Supprimer ce projet ?')">
                                        <input type="hidden" name="idProjectToDelete" value="<?php echoValue($row, 'idprojects'); ?>"/>
                                        <button type="submit" class="group inline-flex items-center gap-2 px-4 py-2 rounded-full text-sm font-semibold bg-red-600 text-white border border-transparent transition-all duration-300 hover:-translate-y-0.5 hover:bg-red-700 hover:shadow-lg">
                                            <i class="fas fa-trash-alt transition-transform duration-300 group-hover:rotate-12 group-hover:scale-110"></i>
                                            Delete
                                        </button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                    </article>
                <?php 
                    $delay += $delayStep;
                    endforeach; 
                ?>
            </div>
        </div>
    </section>

    <script src="/script/script.js"></script>
</body>
</html>