<?php 
    require_once 'utils/session.php';
?>

<?php include 'includes/header.php'; ?>
    
    <!-- Contact Section -->
    <section id="contact" class="min-h-screen flex items-center justify-center py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Me Contacter</h2>
                <div class="w-20 h-1 bg-indigo-500 mx-auto"></div>
            </div>
            
            <div class="max-w-3xl mx-auto bg-gray-800 rounded-lg shadow-xl overflow-hidden" data-aos="fade-up">
                <div class="md:flex">
                    <div class="md:w-1/2 bg-indigo-900 p-8 text-center">
                        <h3 class="text-2xl font-bold mb-6">Information de Contact</h3>
                        <div class="space-y-4 text-left">
                            <div class="flex items-start">
                                <i class="fa-solid fa-envelope mr-4 text-indigo-300 mt-1"></i>
                                <div>
                                    <h4 class="font-semibold">Email</h4>
                                    <p class="text-gray-300">berthomath@hotmail.com</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fa-brands fa-github mr-4 text-indigo-300 mt-1"></i>
                                <div>
                                    <h4 class="font-semibold">GitHub</h4>
                                    <p class="text-gray-300">https://github.com/Niftysoar</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fa-brands fa-discord mr-4 text-indigo-300 mt-1"></i>
                                <div>
                                    <h4 class="font-semibold">Discord</h4>
                                    <p class="text-gray-300">niftysoar</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="md:w-1/2 p-8">
                        <form>
                            <div class="mb-4">
                                <label for="name" class="block text-gray-300 mb-2">Nom</label>
                                <input type="text" id="name" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded focus:outline-none focus:border-indigo-400">
                            </div>
                            <div class="mb-4">
                                <label for="email" class="block text-gray-300 mb-2">Email</label>
                                <input type="email" id="email" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded focus:outline-none focus:border-indigo-400">
                            </div>
                            <div class="mb-4">
                                <label for="subject" class="block text-gray-300 mb-2">Objet</label>
                                <select id="subject" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded focus:outline-none focus:border-indigo-400">
                                    <option value="web">Web Development</option>
                                    <option value="smash">Smash Modding</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="mb-6">
                                <label for="message" class="block text-gray-300 mb-2">Message</label>
                                <textarea id="message" rows="4" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded focus:outline-none focus:border-indigo-400"></textarea>
                            </div>
                            <button type="submit" class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 rounded-md font-medium transition">
                                Envoyer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="/script/script.js"></script>
</body>
</html>