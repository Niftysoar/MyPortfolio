<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mathéo Berthomé-Laurent | Web Developer & Smash Modder</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.globe.min.js"></script>
    <link rel="stylesheet" href="/styles/style.css">
</head>
<body class="bg-gray-900 text-gray-100 font-sans">
    <div id="vanta-bg"></div>
    
    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-gray-900 bg-opacity-80 backdrop-filter backdrop-blur-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <span class="text-xl font-bold gradient-text">MBL</span>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="../index.php" class="px-3 py-2 rounded-md text-sm font-medium hover:text-indigo-400 transition">Accueil</a>
                        <a href="../projects.php" class="px-3 py-2 rounded-md text-sm font-medium hover:text-indigo-400 transition">Projets</a>
                        <a href="../about.php" class="px-3 py-2 rounded-md text-sm font-medium hover:text-indigo-400 transition">A propos</a>
                        <a href="../contact.php" class="px-3 py-2 rounded-md text-sm font-medium hover:text-indigo-400 transition">Contact</a>
                        <?php if(isLoggedIn()):?>
                            <a href="../createproject.php" class="px-3 py-2 rounded-md text-sm font-medium hover:text-indigo-400 transition">Créer un projet</a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="cta">
                    <?php if(isLoggedIn()):?>
                            <a href="/logout.php" class="bg-indigo-600 hover:bg-indigo-700 rounded-md text-smfont-medium transition">Se déconnecter</a>
                    <?php else: ?>
                            <a href="/login.php" class="bg-indigo-600 hover:bg-indigo-700 rounded-md text-sm font-medium transition">Se connecter</a>
                    <?php endif; ?>
                </div>
                <div class="md:hidden">
                    <button class="mobile-menu-button p-2 rounded-md hover:bg-gray-700 focus:outline-none">
                        <i data-feather="menu"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>