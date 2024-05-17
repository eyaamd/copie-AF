<!DOCTYPE html>
<html x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Enseignant Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/tailwind.output.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Desktop sidebar -->
        <aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
            <div class="py-4 text-gray-500 dark:text-gray-400">
                <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
                    Enseignant
                </a>
                <ul class="mt-6">
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="indexE.php">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                            <span class="ml-4">Dashboard</span>
                        </a>
                    </li>
                </ul>
                <ul>
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="Notes.php">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                </path>
                            </svg>

                            </svg>

                            <span class="ml-4">Enregistrement des notes</span>
                        </a>
                    </li>

                    <li class="relative px-6 py-3">
                  
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            href="./saisie_note_examen.php">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" >                                </path>
                            </svg>
                            <span class="ml-4">Saisie Note Examen</span>
                        </a>
                    </li>
                    

                    <li class="relative px-6 py-3">
                        <span class="absolute inset-y-0 left-0 w-1"
                            style="background-color: #fa8231; border-radius: 0 0.5rem 0.5rem 0;"></span>

                        <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                            href="Liste_Etudiants.php">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                </path>
                            </svg>
                            <span class="ml-4">Liste des Notes</span>
                        </a>
                    </li>



                </ul>
        </aside>

        <div class="flex flex-col flex-1 w-full">
            <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
                <div
                    class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300">

                    <div class="flex justify-center flex-1 lg:mr-32">
                        <div class="relative w-full max-w-xl mr-6 focus-within:text-purple-500">

                        </div>
                    </div>
                    <ul class="flex items-center flex-shrink-0 space-x-6">


                </div>
            </header>
            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    <h2 class="my-6 text-2xl ml-6 font-semibold text-gray-700 dark:text-gray-200">
                        Liste des Notes </h2>




                    <form method="POST">
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "myissat";
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Vérifie la connexion
                        if ($conn->connect_error) {
                            die("La connexion a échoué : " . $conn->connect_error);
                        }

                        // Requête pour récupérer les niveaux
                        $query_niveaux = "SELECT `id`, `nom` FROM `niveau`";
                        $result_niveaux = $conn->query($query_niveaux);
                        ?>
                        <select id="niveau" name="niveau" class='border rounded-md px-3 py-2 ml-4'>
                            <option value="">Sélectionnez un niveau</option>

                            <?php
                            // Affichage des options des niveaux
                            while ($row_niveau = $result_niveaux->fetch_assoc()) {
                                echo "<option value='" . $row_niveau['id'] . "'>" . $row_niveau['nom'] . "</option>";
                            }
                            ?>
                        </select>
                        <select id="groupe" name="groupe" disabled class='border rounded-md px-3 py-2 ml-4'>
                            <option value="">Sélectionnez d'abord un niveau</option>
                        </select>

                        <select id="semestre" name="semestre" disabled class='border rounded-md px-3 py-2 ml-4'>
                            <option value="">Sélectionnez d'abord un groupe</option>
                        </select>

                        <select id="matiere" name="matiere" disabled class='border rounded-md px-3 py-2 ml-4'>
                            <option value="">Sélectionnez d'abord un semestre</option>
                        </select>
                        <?php
                        $conn->close();
                        ?>

                    </form>


                    <div class="mt-5 ml-6 mb-5">

                        <button id="btnAfficherEtudiants"
                            class="inline-block rounded-full border-2 border-orange-500 text-orange-500 hover:border-orange-600 hover:bg-orange-400 hover:bg-opacity-10 hover:text-orange-600 focus:border-orange-700 focus:text-orange-700 active:border-orange-800 active:text-orange-800 dark:border-orange-300 dark:text-orange-300 dark:hover:hover:bg-orange-300 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal transition duration-150 ease-in-out focus:outline-none focus:ring-0">
                            Afficher la liste des étudiants
                        </button>
                    </div>
                    <!-- Zone pour afficher la liste des étudiants -->
                    <div id="listeEtudiants">

                    </div>


                    <script>

                        document.getElementById('niveau').addEventListener('change', function () {
                            var niveauId = this.value;
                            var groupeSelect = document.getElementById('groupe');

                            // Réinitialiser la liste des groupes
                            groupeSelect.innerHTML = '<option value="">Chargement...</option>';
                            groupeSelect.disabled = true;

                            // Exécuter une requête AJAX pour récupérer les groupes en fonction du niveau sélectionné
                            var xhr = new XMLHttpRequest();
                            xhr.open('GET', 'get_groupes.php?niveau=' + niveauId, true);
                            xhr.onload = function () {
                                if (xhr.status === 200) {
                                    groupeSelect.innerHTML = xhr.responseText;
                                    groupeSelect.disabled = false;
                                } else {
                                    alert('Une erreur s\'est produite. Veuillez réessayer.');
                                }
                            };
                            xhr.send();
                        });
                        /***********************************************************************************************************/
                        document.getElementById('groupe').addEventListener('change', function () {
                            var niveauId = this.value;
                            var semestreSelect = document.getElementById('semestre');

                            // Réinitialiser la liste des semestres
                            semestreSelect.innerHTML = '<option value="">Chargement...</option>';
                            semestreSelect.disabled = true;

                            // Exécuter une requête AJAX pour récupérer les semestres en fonction du niveau sélectionné
                            var xhr = new XMLHttpRequest();
                            xhr.open('GET', 'get_semestres.php?niveau=' + niveauId, true);
                            xhr.onload = function () {
                                if (xhr.status === 200) {
                                    semestreSelect.innerHTML = xhr.responseText;
                                    semestreSelect.disabled = false;
                                } else {
                                    alert('Une erreur s\'est produite. Veuillez réessayer.');
                                }
                            };
                            xhr.send();
                        });

                        /*********************************************************************************************************** */
                        document.getElementById('semestre').addEventListener('change', function () {
                            var niveauId = document.getElementById('niveau').value;
                            var semestreId = this.value;
                            var matiereSelect = document.getElementById('matiere'); // Récupérer l'élément lui-même, pas seulement sa valeur

                            // Réinitialiser la liste des matières
                            matiereSelect.innerHTML = '<option value="">Chargement...</option>';
                            matiereSelect.disabled = true;

                            // Exécuter une requête AJAX pour récupérer les matières en fonction du niveau et du semestre sélectionnés
                            var xhr = new XMLHttpRequest();
                            xhr.open('GET', 'get_matieres.php?niveau=' + niveauId + '&semestre=' + semestreId, true);
                            xhr.onload = function () {
                                if (xhr.status === 200) {
                                    matiereSelect.innerHTML = xhr.responseText;
                                    matiereSelect.disabled = false;
                                } else {
                                    alert('Une erreur s\'est produite. Veuillez réessayer.');
                                }
                            };
                            xhr.send();
                        });

                        /***********************************************************************************************************/
                        document.getElementById('btnAfficherEtudiants').addEventListener("click", function () {
                            var niveauId = document.getElementById('niveau').value;
                            var groupeNom = document.getElementById('groupe').value;
                            var semestreId = document.getElementById('semestre').value;
                            var matiereId = document.getElementById('matiere').value; // Récupérer l'ID de la matière sélectionnée

                            // Requête AJAX pour récupérer la liste des étudiants associés au niveau, groupe, semestre et matière sélectionnés
                            var xhr = new XMLHttpRequest();
                            xhr.onreadystatechange = function () {
                                if (xhr.readyState === XMLHttpRequest.DONE) {
                                    if (xhr.status === 200) {
                                        // Affichage de la liste des étudiants dans la zone prévue à cet effet
                                        document.getElementById("listeEtudiants").innerHTML = xhr.responseText;
                                    } else {
                                        console.error("Une erreur s'est produite lors de la récupération des étudiants.");
                                    }
                                }
                            };
                            xhr.open("GET", "get_etudiant1.php?niveau=" + niveauId + "&groupe=" + groupeNom + "&semestre=" + semestreId + "&matiere=" + matiereId, true);
                            xhr.send();
                        });

                    </script>
            </main>
        </div>
    </div>
</body>
</html>