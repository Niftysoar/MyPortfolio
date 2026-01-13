<?php 
    require_once 'utils/session.php';
?>

<?php include 'includes/header.php'; ?>

    <!-- About Section -->
    <section id="about" class="min-h-screen flex items-center justify-center py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">A Propos</h2>
                <div class="w-20 h-1 bg-indigo-500 mx-auto"></div>
            </div>
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0" data-aos="fade-right">
                    <img src="image/moi.png" alt="Mathéo" class="rounded-lg shadow-xl w-full max-w-md mx-auto">
                </div>
                <div class="md:w-1/2 md:pl-12" data-aos="fade-left">
                    <p class="text-lg text-gray-300 mb-6">
                        I'm a full-stack web developer with 5+ years of experience building modern web applications. 
                        When I'm not coding, you'll find me modding Super Smash Bros. Ultimate, creating new characters, 
                        stages, and gameplay mechanics for the community.
                    </p>
                    <div class="mb-6">
                        <h3 class="text-xl font-semibold mb-3">Web Development Skills</h3>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-gray-700 rounded-full text-sm">HTML</span>
                            <span class="px-3 py-1 bg-gray-700 rounded-full text-sm">CSS</span>
                            <span class="px-3 py-1 bg-gray-700 rounded-full text-sm">JavaScript</span>
                            <span class="px-3 py-1 bg-gray-700 rounded-full text-sm">PHP</span>
                            <span class="px-3 py-1 bg-gray-700 rounded-full text-sm">SQL</span>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="line my-16">

            <div class="text-align-left" data-aos="fade-up">
                <h3 class="text-2xl font-bold mb-6">Education</h3>

                <div class="space-y-6">
                    <div>
                        <h4 class="text-lg font-semibold text-white">
                            Bachelor – Développement Web & Digital <span class="text-gray-400">(En Cours)</span>
                        </h4>
                        <p class="text-gray-300">
                            Domaine du numérique / développement
                        </p>
                    </div>

                    <div>
                        <h4 class="text-lg font-semibold text-white">
                            Web & Mobile Web Developer (DWWM)
                        </h4>
                        <p class="text-gray-300">
                            <span class="text-indigo-500">STUDI</span> — Conception et développement d’applications web et mobiles, intégration front-end, bases de données, logique back-end et bonnes pratiques du développement.
                        </p>
                    </div>

                    <div>
                        <h4 class="text-lg font-semibold text-white">
                            Baccalauréat Général
                        </h4>
                        <p class="text-gray-300">
                            Spécialités Mathématiques & NSI (Numérique et Sciences Informatiques).
                            Acquisition de solides bases en logique, algorithmique et programmation.
                        </p>
                    </div>
                </div>

                <h3 class="text-2xl font-bold mt-12 mb-6">Expérience Professionnelle</h3>

                <p class="text-lg text-gray-300 max-w-3xl">
                    À ce jour, je n’ai pas encore d’expérience professionnelle en entreprise.
                    <br><br>
                    Cependant, mon parcours de formation m’a permis de développer des compétences concrètes en développement web, à travers des projets pédagogiques et personnels, ainsi qu’une forte capacité d’apprentissage, d’autonomie et de résolution de problèmes.
                </p>
            </div>
        </div>
    </section>

    <script src="/script/script.js"></script>
</body>
</html>