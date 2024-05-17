<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ajouter Enseignant</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.tailwindcss.com"></script>
</head>


<body>
    <!-- Modal -->
    <div id="contactFormModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white w-1/2 p-6 rounded shadow-md">
                <div class="flex justify-end">
                    <!-- Close Button -->
                    <button id="closeContactForm" class="text-gray-700 hover:text-red-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <?php
                // Vérifie si le formulaire a été soumis
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Connexion à la base de données
                    $conn = new mysqli("localhost", "root", "", "myissat");

                    // Vérifie la connexion
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Récupérer les données du formulaire
                    $id = $_POST['id'];
                    $nom = $_POST['nom'];
                    $email = $_POST['email'];
                    $mot_de_passe = $_POST['mot_de_passe'];
                    $sexe = $_POST['sexe'];
                    $grade = $_POST['grade'];
                    $branche = $_POST['branche'];

                    // Préparer la requête SQL pour insérer les données dans la table enseignant
                    $sql_enseignant = "INSERT INTO `enseignant`(`id`, `nom`, `email`, `mot_de_passe`, `sexe`, `grade`, `branche`) VALUES('$id', '$nom', '$email', '$mot_de_passe', '$sexe', '$grade','$branche')";

                    // Préparer la requête SQL pour insérer les données dans la table login
                    $sql_login = "INSERT INTO `login`(`id`,`mot_de_passe`,`role`) VALUES('$id','$mot_de_passe', 'Enseignant')";

                    // Exécuter les requêtes et vérifier si elles se sont bien déroulées
                    if ($conn->query($sql_enseignant) === TRUE && $conn->query($sql_login) === TRUE) {
                        echo "Enregistrement de l'enseignant et création du compte de connexion réussis";
                    } else {
                        echo "Erreur: " . $sql_enseignant . "<br>" . $conn->error;
                        echo "Erreur: " . $sql_login . "<br>" . $conn->error;
                    }

                    // Fermer la connexion à la base de données
                    $conn->close();
                }
                ?>

                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                    <div class="py-8">
                        <center>
                            <span class="text-2xl font-semibold">Ajouter un Enseignant
                            </span>
                        </center>
                    </div>

                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700" for="id" value="id" />
                        <input type='number' name='id' placeholder='Votre Identifiant'
                            class="w-full rounded-md py-2.5 px-4 border text-sm outline-orange-500" />
                    </div>

                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700" for="nom" value="nom" />
                        <input type='text' name='nom' placeholder='Votre Nom et Prénom'
                            class="w-full rounded-md py-2.5 px-4 border text-sm outline-orange-500" />
                    </div>

                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700" for="email" value="email" />
                        <input type='email' name='email' placeholder='Votre Adresse Email'
                            class="w-full rounded-md py-2.5 px-4 border text-sm outline-orange-500" />
                    </div>

                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700" for="password" value="Password" />
                        <div class="relative">
                            <input id="password" type="password" name="mot_de_passe" placeholder="Mot de passe" required
                                autocomplete="current-password"
                                class='w-full rounded-md py-2.5 px-4 border text-sm outline-orange-500'>
                        </div>
                    </div>



                    <div class="mt-4">
                        <select id="sexe" name="sexe"
                            class="w-full rounded-md py-2.5 px-4 border text-sm outline-orange-500" required>
                            <option value="" disabled selected hidden>Genre</option>
                            <option value="Homme">Homme</option>
                            <option value="Femme">Femme</option>
                        </select>
                    </div>



                    <div class="mt-4">
                        <select id="grade" name="grade"
                            class="w-full rounded-md py-2.5 px-4 border text-sm outline-orange-500" required>
                            <option value="" disabled selected hidden>Grade</option>
                            <option value="Professeur">Professeur</option>
                            <option value="Maître de Conférence">Maître de Conférence</option>
                            <option value="Maître Assistant">Maître Assistant</option>
                            <option value="Assistant">Assistant</option>
                            <option value="PTC">PTC</option>
                            <option value="Autre">Autre</option>
                        </select>
                    </div>




                    <div class="mt-5">
                        <button type="submit" name="registerbtn"
                            class='ms-4 inline-flex items-center px-4 py-2 bg-orange-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'>
                            Ajouter Enseignant
                        </button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    </div>





    <script>
        // JavaScript to toggle the modal
        const openContactFormButton = document.getElementById('openContactForm');
        const closeContactFormButton = document.getElementById('closeContactForm');
        const contactFormModal = document.getElementById('contactFormModal');

        openContactFormButton.addEventListener('click', () => {
            contactFormModal.classList.remove('hidden');
        });

        closeContactFormButton.addEventListener('click', () => {
            contactFormModal.classList.add('hidden');
        });
    </script>


</body>

</html>