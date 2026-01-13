<?php 
    require_once 'utils/session.php';
    require_once 'db/functions.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // <!-- Cas où le formulaire a été rempli et soumis -->
        $email = $_POST["email"];
        $password = $_POST["password"];

        //Récupérer l'utilisateur avec cet email
        $user = getUserByEmail($email);

        if($user and password_verify($password, $user['password'])){
            $_SESSION['idUser'] = $user['idUser'];
            header('Location: index.php');
        }
        else{
            echo "Mot de passe incorrect";
        }

    }
?>

<?php require_once "includes/header.php"; ?>

    <section id="login" class="min-h-screen flex items-center justify-center py-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Se Connecter</h2>
                <div class="w-24 h-1 bg-indigo-500 mx-auto"></div>
            </div>

            <div class="max-w-xl mx-auto bg-gray-800 rounded-lg shadow-xl" data-aos="fade-up">
                <form action="" method="POST" class="p-10">
                    <div class="mb-8">
                        <label for="email" class="block text-gray-300 mb-2 text-base">Email</label>
                        <input type="email" name="email" id="email" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded focus:outline-none focus:border-indigo-400" required>
                    </div>

                    <div class="mb-8">
                        <label for="password" class="block text-gray-300 mb-2 text-base">Mot de passe</label>
                        <input type="password" name="password" id="password" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded focus:outline-none focus:border-indigo-400" required>
                    </div>

                    <div class="flex justify-center">
                        <button type="submit" class="px-10 py-3 bg-indigo-600 hover:bg-indigo-700 rounded-md font-medium transition">Me connecter</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="/script/script.js"></script>
</body>
</html>